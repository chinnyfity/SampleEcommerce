<?php
namespace App\Http\Controllers\APIs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use DB;
use Cart;


class ApiHomeController extends Controller
{

    public function __construct(){
        $this->middleware(function ($request, $next) {
            
            $this->user = auth('user')->user();            
            $this->notifys = 0;
            \View::share('user_details', "");
            \View::share('product_count', count(\Cart::getContent()));
            return $next($request);
        });
    }


    function index(Request $request){
        $orderBy = "id desc";
        if($request->sort != ""){
            if($request->sort == "random"){
                $orderBy = "RAND()";
            }else if($request->sort == "old"){
                $orderBy = "id asc";
            }else if($request->sort == "new"){
                $orderBy = "id desc";
            }
        }

        if($request->price != ""){
            if($request->price == "recommended"){
                $orderBy = "id desc";
            }else if($request->price == "lowest-price"){
                $orderBy = "price asc";
            }else if($request->price == "highest-price"){
                $orderBy = "price desc";
            }
        }
        $products = Product::take(50)->orderByRaw($orderBy)->get();
        
        if($request->category != '' && $request->category > 0){
            $products = Product::whereRaw("sha1(category) = '$request->category'")->take(50)->orderByRaw($orderBy)->get();
        }

        $data['products'] = $products;
        $data['categories'] = Category::get();
        
        return response()->json([
            'status' => 'success',
            'message' => 'data retrieved',
            'data' => $data
        ],200);
    }

    
    function view_product($id, $name){
        $id = substr($id, 0, -5);
        $product = Product::where('id', $id)->first();
        $key = explode(' ', $product->title);

        $related_products = DB::Table('products')
        ->where('id', '!=', $id)
        ->Where(function ($query) use($key) {
            for ($i = 0; $i < count($key); $i++){
                $query->orwhere('title', 'like',  '%' . $key[$i] .'%');
            }      
        })->take(8)->get();

        $data['relateds'] = $related_products;
        $data['product'] = $product;
        
        return response()->json([
            'status' => 'success',
            'message' => 'data retrieved',
            'data' => $data
        ],200);
    }

}
