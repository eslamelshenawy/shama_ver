<?php

namespace App\Http\Controllers;

use App\BestDiamond;
use App\Cart;
use App\FavouriteProduct;
use App\WebmasterSection;
use Illuminate\Http\Request;

class FavController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
        $user_id=@\Auth::user()->id;

        if($user_id == null ){
            return redirect('http://anotherdomain.com/');
            dd("dsds");
        }
    }


    /**
     * Create fav.
     *
     * @return fav
     */
    public function fav($id){
        $user_id=@\Auth::user()->id;
        $product_fav= FavouriteProduct::where("product_id",$id)->where("user_id",$user_id)->first();
        if($product_fav == null){
            $produc_fav=new FavouriteProduct;
            $produc_fav->status= 1;
            $produc_fav->user_id= $user_id;
            $produc_fav->product_id= $id;
            $produc_fav->save();
            return response()->json(['ok' => 'successfully Add Favourite',"data"=>$produc_fav->status]); // Return OK to user's browser
        }else{
            $status=$product_fav->status;
            if($status == 1){
                $product_fav_id=$product_fav->id;
                $product_fav= FavouriteProduct::find($product_fav_id);
                $product_fav->status= 0;
                $product_fav->save();
                return response()->json(['ok' => 'successfully remove Favourite',"data"=>$product_fav->status]); // Return OK to user's browser
            }else{
                $product_fav_id=$product_fav->id;
                $product_fav= FavouriteProduct::find($product_fav_id);
                $product_fav->status= 1;
                $product_fav->save();
                return response()->json(['ok' => 'successfully Add Favourite',"data"=>$product_fav->status]); // Return OK to user's browser
            }

        }

    }


    /**
     *  wishlist.
     *
     * @return wishlist
     */
    public function wishlist(){
        $products_fav=  BestDiamond::select("product_id")->get();
        $a=array();

        foreach ($products_fav as  $products_f){
            array_push($a,$products_f->product_id);
        }
        $count_sell =array_count_values($a);

        $B=array();

        foreach ($count_sell as $key=> $count_se){
            if($count_se > 4 ){
                array_push($B,$key);
            }
        }
        $c=array();

        foreach ($products_fav as $key=> $products_f){
            if ( $key < count($B)){
                $product_best=$products_f->product_details($B[$key]);
                array_push($c,$product_best);
            }
        }

        $user_id=@\Auth::user()->id;
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $products_fav=  FavouriteProduct::where("favourite_products.user_id",$user_id)->where("status","1")
            ->orderBy('id', 'desc')->get();

        return view("frontEnd.wishlist",compact("GeneralWebmasterSections","products_fav","c"));

    }

    /**
     *  add cart .
     *
     * @return cart
     */
    public function cart(Request $request){
//                 dd($request->all());

        $user_id=@\Auth::user()->id;
        if($request->stand != null && $request->size != null ){
            $cart=Cart::where("user_id",$user_id)->where("product_id",$request->product_id)->where("standard_gold_id",$request->stand)
                ->where("size_id",$request->size)->first();
        }elseif ($request->cart_stand != null && $request->cart_size != null ){
            $cart=Cart::where("user_id",$user_id)->where("product_id",$request->product_id)->where("standard_gold_id",$request->cart_stand)
                ->where("size_id",$request->cart_size)->first();
        }elseif ($request->cart_stand == null && $request->cart_size != null ){
            $cart=Cart::where("user_id",$user_id)->where("product_id",$request->product_id)->where("standard_gold_id",$request->stand)
                ->where("size_id",$request->cart_size)->first();
        }elseif ($request->cart_stand != null && $request->cart_size == null ){
            $cart=Cart::where("user_id",$user_id)->where("product_id",$request->product_id)->where("standard_gold_id",$request->cart_stand)
                ->where("size_id",$request->size)->first();
        }

//        dd(empty($cart));
        if(empty($cart)){
            $cart=new Cart;
            $cart->product_id= $request->product_id;
            if($request->stand != null){
                $cart->standard_gold_id= $request->stand;
            }else{
                $cart->standard_gold_id= $request->cart_stand;
            }
            if($request->size != null){
                $cart->size_id= $request->size;
            }else{
                $cart->size_id= $request->cart_size;
            }
            $cart->price_sp= $request->price_sp;
            $cart->qty= 1;
            $cart->user_id= $user_id;
            $cart->save();
            return response()->json(['ok' => 'successfully  added to Cart ',"data"=>$cart]); // Return OK to user's browser
        }
        else{
            return response()->json(['ok' => 'Has been added to Cart ',"data"=>$cart]); // Return OK to user's browser
        }

    }


    /**
     *  add cart .
     *
     * @return cart
     */
    public function view_cart(){
        $user_id=@\Auth::user()->id;
        if($user_id == null ){
            return redirect('/');
        }
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $carts =\App\Cart::where("user_id",@\Auth::user()->id)->get();
        return view("frontEnd.view_cart",compact("GeneralWebmasterSections","carts"));

    }

 /**
     *  remove  cart .
     *
     * @return cart
     */
    public function remove_cart($id,Request $request){
        $carts =Cart::where("product_id",$id)->where("standard_gold_id",$request->data_stand)->where("size_id",$request->data_size)->
        where("user_id",@\Auth::user()->id)->first();
        $carts->delete();
        return response()->json(['ok' => 'successfully  Remove to Cart ',"data"=>$carts]); // Return OK to user's browser

    }

 /**
     *  remove  cart .
     *
     * @return cart
     */
    public function min_cart($id,Request $request){
        $carts =Cart::where("product_id",$id)->
            where("standard_gold_id",$request->data_stand)->where("size_id",$request->data_size)->where("user_id",@\Auth::user()->id)->first();
        if($carts->qty < 0){
            $carts->qty=$carts->qty*0;
            $carts->save();

        }else{
            $carts->qty=$carts->qty-1;
            $carts->save();

        }

        return response()->json(['ok' => 'successfully  Min to Cart ',"data"=>$carts]); // Return OK to user's browser

    }

    /**
     *  remove  cart .
     *
     * @return cart
     */
    public function plus_cart($id,Request $request){
        $carts =Cart::where("product_id",$id)->
        where("standard_gold_id",$request->data_stand)->where("size_id",$request->data_size)
            ->where("user_id",@\Auth::user()->id)->first();
        $carts->qty=$carts->qty+1;
        $carts->save();

        return response()->json(['ok' => 'successfully  Plus to Cart ',"data"=>$carts]); // Return OK to user's browser

    }



}
