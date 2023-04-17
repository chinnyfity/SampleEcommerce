<?php
// namespace App\Http\Controllers\Auth;


namespace App\Http\Controllers\APIs;
use App\Http\Controllers\Controller;
use illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Transaction;
use App\Models\MyCart;
use Validator;
use DB;
use Redirect;
use Hash;
use Illuminate\Http\Request;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;


class ApiCartController extends Controller
{

    use AuthenticatesUsers;

    public function __construct(){
        $this->middleware(function ($request, $next) {
            
            $this->user = auth('user')->user();            
            $this->notifys = 0;
            \View::share('user_details', $this->user);
            \View::share('product_count', count(\Cart::getContent()));
            return $next($request);
        });
    }

    function dispatchEmails($details){
        $receiver = $details['emails'];
        $isArray = $details['isArray'];
        try{
            if($isArray == 1) // array
                Mail::to('noreply@companyname.com')->bcc($receiver)->send(new SendEmail($details));
            else
                Mail::to($receiver)->send(new SendEmail($details));
            return 'email was sent';
        }catch(\Swift_TransportException  $e){
            return 'fail to send email';
        }
    }

    function add_cart(Request $request){
        $cart = \Cart::add([
            'id' => $request->product,
            'name' => $request->title,
            'price' => $request->price,
            'quantity' => $request->qty,
            'attributes' => array(
                'image' => $request->image,
                'main_qty' => $request->main_qty,
            )
        ]);
        if($cart){
            $cartItems = \Cart::getContent();
            return response()->json([
                'status' => 'success',
                'message' => 'Item added to cart',
                'data' => count($cartItems)
            ],200);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Unable to add item to cart',
            'data' => ''
        ],200);
    }

    function cart(){
        $data['subtotal'] = \Cart::getTotal();        
        $data['carts'] = \Cart::getContent();
        
        return response()->json([
            'status' => 'success',
            'message' => 'data retrieved',
            'data' => $data
        ],200);
    }

    function checkout(){
        $data['subtotal'] = \Cart::getTotal();        
        $data['carts'] = \Cart::getContent();

        return response()->json([
            'status' => 'success',
            'message' => 'data retrieved',
            'data' => $data
        ],200);
    }


    function remove_item(Request $request){
        $attributes = [
            'ids'       => 'ID',
        ];
        $rules = [
            'ids'       => 'required',
        ];
        $messages = [
            'required' => 'The :attribute field is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->setAttributeNames($attributes);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all(),
                'data' => ''
            ],500);
        }

        if($request->ids=="all"){
            $remove_cart = \Cart::clear();
        }else{
            $remove_cart = \Cart::remove($request->ids);
        }
        if($remove_cart){
            return response()->json([
                'status' => 'success',
                'message' => $request->ids=="all" ? 'Cart items have been cleared' : 'An item has been removed',
                'data' => ''
            ],200);
        }
        return response()->json([
            'status' => 'error',
            'message' => $request->ids=="all" ? 'Error in clearing items from cart' : 'Error in removing item from cart',
            'data' => ''
        ],200);
    }


    function update_qty(Request $request){
        $attributes = [
            'product'       => 'Product',
            'qty'           => 'Quantity',
        ];
        $rules = [
            'product'       => 'required|numeric',
            'qty'           => 'required|numeric|gt:0',
        ];
        $messages = [
            'required' => 'The :attribute field is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->setAttributeNames($attributes);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all(),
                'data' => ''
            ],500);
        }

        $update_cart = \Cart::update(
            $request->product,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->qty
                ],
            ]
        );
        if($update_cart){
            return response()->json([
                'status' => 'success',
                'message' => 'Cart updated',
                'data' => ''
            ],200);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Unable to update card',
            'data' => ''
        ],200);
    }


    function store_details(Request $request){
        $attributes = [
            'password1'     => 'Password',
            'password2'     => 'Confirm password',
        ];
        $rules = [
            'firstname'    => 'required|regex:/^[a-zA-Z-]+$/',
            'lastname'     => 'required|regex:/^[a-zA-Z-]+$/',
            'phone'        => 'required|numeric|regex:/[0-9]{9}/',
            'email'        => 'required|email',
            'address'      => 'required',
            'password1'    => "required_if:user,==,",
            'password2'    => 'required_if:user,==,|min:5|same:password1',
        ];
        $messages = [
            'required'      => 'The :attribute space is required',
        ];

        $validate = Validator::make($request->all(), $rules, $messages)->setAttributeNames($attributes);
        
        if($validate->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validate->errors()->all(),
                'data' => ''
            ],200);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'validated',
            'data' => ''
        ],200);
    }


    function submit_details(Request $request){
        $attributes = [
            'password1'     => 'Password',
            'password2'     => 'Confirm password',
        ];
        $rules = [
            'firstname'    => 'required|regex:/^[a-zA-Z-]+$/',
            'lastname'     => 'required|regex:/^[a-zA-Z-]+$/',
            'phone'        => 'required|numeric|regex:/[0-9]{9}/',
            'email'        => 'required|email',
            'address'      => 'required',
            'password1'    => "required_if:user,==,",
            'password2'    => 'required_if:user,==,|min:5|same:password1',
        ];
        $messages = [
            'required'      => 'The :attribute space is required',
        ];

        $validate = Validator::make($request->all(), $rules, $messages)->setAttributeNames($attributes);
        
        if($validate->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validate->errors()->all(),
                'data' => ''
            ],200);
        }

        $passwords = Hash::make(trim($request->password1));
        $data=[];
        $data2=[];

        $data = array(
            'fname'        => $request->firstname,
            'lname'        => $request->lastname,
            'email'        => $request->email,
            'phone'        => trim($request->phone),
            'countrys'     => $request->country, 
            'states'       => $request->state, 
            'address'      => $request->address,
        );
        $data2 = array(
            'password'     => $passwords,
        );

        
        $user_id="";
        if(auth('user')->user()){
            $user_id = auth('user')->user()->id;
            $users = User::where('id', $user_id)->first();
            $create_user = $users->update($data);
        }else{
            $allData = array_merge($data, $data2); 

            $existing_users = User::where('email', $request->email)->where('phone', trim($request->phone))->first();
            if(!$existing_users){
                $create_user = User::create($allData);
            }else{
                $create_user = $existing_users;
            }
        }

        $users = auth('user')->user() ? auth('user')->user()->id : $create_user->id;

        if($create_user){
            $cartItems = \Cart::getContent();
            $products_ids = "";
            if(count($cartItems)){
                foreach ($cartItems as $item){
                    $total = $item->quantity * $item->price;
                    $carts = array(
                        'invoice'       => substr(time(), 5),
                        'user'          => $users,
                        'product'       => $item->id,
                        'qty'           => $item->quantity,
                        'price'         => $item->price,
                        'total'         => $total,
                        'payment_type'  => "card",
                        'paid'          => 1,
                    );
                    MyCart::create($carts);
                    $products_ids .= "$item->id,"; // get product ids for transaction purposes
                }
                $products_ids = substr($products_ids, 0, -1); // remove the last comma
            }

            $transaction = Transaction::create([
                'user'          => $users,
                'product_ids'   => $products_ids,
                'amount'        => \Cart::getTotal(),
                'status'        => 'completed',
                'payment_mthd'  => 'card', // card or deposit
                'response'      => '', // response coming from payment gateway, very important
                'narration'     => 'you purchase some products',
            ]);
            if($transaction){

                $userData = User::find($users);
                Auth::guard('user')->login($userData, true);

                $token = $userData->createToken('authToken')->accessToken;
                $response = ['accessToken' => $token];

                $fullname = "$request->firstname $request->lastname";

                $email_data = [
                    'name' => "Admin",
                    'message' => "
                    <div><b>Congratulations!</b></div>
                    <div>A customer <b>".ucwords($fullname)."</b> just ordered a product(s).</p>
                    <p style='font-size:13px; margin-top:5px'>Kindly check your dashboard to view the order details.</div>",
                ];
                $details['subj'] = "New Order From A Customer @ CompanyName";
                $details['data'] = $email_data;
                $details['isArray'] = 0; // 1=array, 0=not_array
                $details['email_template'] = "email_templates";
                $details['emails'] = "donchibobo@gmail.com"; // notify the admin
                $result = $this->dispatchEmails($details);

                \Cart::clear(); // clear cart

                return response()->json([
                    'status' => 'success',
                    'message' => 'you details have been recorded',
                    'data' => $response
                ],200);
            }
        }
        return response()->json([
            'status' => 'error',
            'message' => 'unable to submit your details',
            'data' => ''
        ],200);
    }

}
