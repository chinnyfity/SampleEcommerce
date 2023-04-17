<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Setting;
use App\Models\Product;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;
use App\Http\Controllers\HomeController;
use DB;


class CronJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    private $home;
    protected $signature = 'rate:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->home = new HomeController;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = time();

        $bookeds = DB::select("SELECT bookeds.id, bookeds.uuid, users.firstname, bookeds.user, products.user as lister, products.title, bookeds.product, bookeds.booker_has_reviewed, bookeds.lister_has_reviewed FROM bookeds 
        RIGHT JOIN products ON products.uuid=bookeds.product 
        RIGHT JOIN users ON users.uuid=products.user 
        WHERE 
        bookeds.approved_by_seller = 'approved'
        AND bookeds.duration < $now 
        AND bookeds.user != products.user 
        AND (bookeds.booker_has_reviewed = 0 OR bookeds.lister_has_reviewed = 0)
        AND show_dialog_every < $now
        GROUP BY bookeds.user, products.user
        ORDER BY bookeds.id ASC");

        if(count($bookeds) > 0){
            foreach($bookeds as $booked){
                
                if($booked->booker_has_reviewed == 0){ //send booker email to rate the seller
                    $booker_details = User::whereUuid($booked->user)->first();
                    $product_details = Product::whereUuid($booked->product)->whereApproved(1)->first();
                    $firstname = $booker_details->firstname;
                    if(strlen($firstname) <= 4){
                        $firstname = "Chief";
                    }

                    $email_data = [
                        'post_type' => 'service_booked',
                        'user_type' => 'booker',
                        'product'   => $product_details->title,
                    ];
                    
                    $details['subj'] = "Hi ".ucwords($firstname).", please rate your seller";
                    $details['isArray'] = 0; // 1=array, 0=not_array
                    $details['data'] = $email_data;
                    $details['email_template'] = "other_emails";
                    $details['emails'] = $booker_details->email;
                    $this->home->dispatchEmails($details);
                }

                if($booked->lister_has_reviewed == 0){ //send booker email to rate the customer
                    // $user_emails = User::whereUuid($booked->lister)->value('email');
                    $lister_details = User::whereUuid($booked->lister)->first();
                    $product_details = Product::whereUuid($booked->product)->whereApproved(1)->first();
                    $firstname = $lister_details->firstname;
                    if(strlen($firstname) <= 4){
                        $firstname = "Chief";
                    }

                    $email_data = [
                        'post_type' => 'service_booked',
                        'user_type' => 'lister',
                        'product'   => $product_details->title,
                    ];

                    $details['subj'] = "Hi ".ucwords($firstname).", please rate your customer";
                    $details['isArray'] = 0; // 1=array, 0=not_array
                    $details['data'] = $email_data;
                    $details['email_template'] = "other_emails";
                    $details['emails'] = $lister_details->email;
                    $this->home->dispatchEmails($details);
                }
            }
        }
        
        \Log::info("Cron is working!");   
    }
}
