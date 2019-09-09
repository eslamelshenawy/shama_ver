<?php

namespace App\Http\Controllers;

use App\BestDiamond;
use App\Cart;
use App\Order;
use App\OrderDetails;
use App\Price;
use App\product;
use App\Banner;
use App\Setting;
use App\Subscribe;
use App\Topic;
use App\Rate;
use App\category;
use App\subcategory;
use App\Helpers\Helper;
use App\User;
use App\Webmail;
use App\WebmasterSection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\FavouriteProduct;
use Illuminate\Support\Facades\Session;

class shamaController extends Controller
{
    /**
     * get subcat.
     *
     * @return void
     */
   public function subcat($id){
               $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $subcats=  subcategory::where("status","1")
            ->orderBy('id', 'asc')->where("category_id",$id)->paginate(10);
        $user_id=@\Auth::user()->id;
        $banner=Banner::where("section_id","3")->where("status","1")->first();

       return view("subcat",compact("GeneralWebmasterSections","subcats","banner","id"));
   }

    /**
     * get subcat.
     *
     * @return void
     */
    public function index(Request $request,$id,$type="",$stand="",$style="",$price="",$max=""){

        if($type == 1){
            $products=  product::with("images","standardgold","rate","favourite_product","promo_code")->where("status","1")
                ->orderBy('id', 'asc')
                ->where("type_men",1)
                ->where("subcategory_id",$id)->paginate(10);
            $count= count($products);
            $limit=(int)round($count/3);
            $user_id=@\Auth::user()->id;
            $price_sel="";

        }elseif ($type == 2){

            $products=  product::with("images","standardgold","rate","favourite_product","promo_code")->where("status","1")
                ->orderBy('id', 'asc')
                ->where("type_men",2)
                ->where("subcategory_id",$id)->paginate(10);
            $count= count($products);
            $limit=(int)round($count/3);
            $user_id=@\Auth::user()->id;
            $price_sel="";

        }elseif(is_numeric($stand)){

            $products=  product::with("images","standardgold","rate","favourite_product","promo_code")->where("status","1")
                ->orderBy('id', 'asc')
                ->where("standard_gold",$stand)
                ->where("subcategory_id",$id)->paginate(10);
            $count= count($products);
            $limit=(int)round($count/3);
            $user_id=@\Auth::user()->id;
            $price_sel="";

        }elseif (is_numeric($style)){
            $products=  product::with("images","standardgold","rate","favourite_product","promo_code")->where("status","1")
                ->orderBy('id', 'asc')
                ->where("style_id",$style)
                ->where("subcategory_id",$id)->paginate(10);
            $count= count($products);
            $limit=(int)round($count/3);
            $user_id=@\Auth::user()->id;
            $price_sel="";


        }elseif (is_numeric($price)&& is_numeric($max)){
            $products=  product::with("images","standardgold","rate","favourite_product","promo_code")->where("status","1")
                ->orderBy('id', 'asc')
                ->whereBetween('price', [$price, $max])
                ->where("subcategory_id",$id)->paginate(10);
            $count= count($products);
            $limit=(int)round($count/3);
            $user_id=@\Auth::user()->id;
            $price_sel=$price;

        }
        else{

            $products=  product::with("images","standardgold","rate","favourite_product","promo_code")->where("status","1")
                ->orderBy('id', 'asc')->where("subcategory_id",$id)->paginate(10);
            $count= count($products);
            $limit=(int)round($count/3);
            $user_id=@\Auth::user()->id;
            $price_sel="";

        }


        foreach (@$products as $index=>  $product){
            $check = BestDiamond::where("product_id",$product->id)->select('product_id')->distinct()->get();
            if(!$check->isEmpty()){
                $products_fav=  BestDiamond::select("product_id")->where("product_id",$check[0]->product_id)->get();

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

        $x=array();
        foreach ($count_sell as $key=> $count_se){
            if($count_se < 4 ){
                array_push($x,$key);
            }
        }
        $y=array();
        foreach ($count_sell as $key=> $count_se){
            if($count_se == 4 ){
                array_push($y,$key);
            }
        }


        $c=array(); // c= 4;
        $c3=array();
        $c4=array();

        foreach ($products_fav as $key=> $products_f){
            if ( $key < count($B)){
                $product_best=$products_f->product_details($B[$key]);
                array_push($c,$product_best);
            }
        }
        foreach ($products_fav as $key=> $products_f){
            if ( $key < count($x)){
                $product_best=$products_f->product_details($x[$key]);
                array_push($c3,$product_best);
            }
        }
        foreach ($products_fav as $key=> $products_f){
            if ( $key < count($y)){
                $product_best=$products_f->product_details($y[$key]);
                array_push($c4,$product_best);
            }
        }
            }
            else{
                $c=array();
                $c3=array();
                $c4=array();

            }
        }
//        dd($c);
        if($products->isEmpty()){
            $c=array();
            $c3=array();
            $c4=array();
         }
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $stand=Topic::where("webmaster_id",15)->get();
        $style=Topic::where("webmaster_id",16)->get();

        return view("jewelry",compact("c","c3","c4","GeneralWebmasterSections","stand","style","id",'price_sel','max',"products","limit","id"));
   }
   
    /**
     * get cat.
     *
     * @return void
     */
    public function catgory($id){

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $cats=  category::where("status","1")
            ->orderBy('id', 'asc')->where("type_id",$id)->paginate(10);
        $user_id=@\Auth::user()->id;
        $banner=Banner::where("section_id","3")->where("status","1")->first();

        return view("cat",compact("GeneralWebmasterSections","cats","banner","id"));
    }

    /**
     * get profile.
     *
     * @return void
     */
    public function profile(){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $Gallery = \App\Topic::where("webmaster_id",22)->get();
        return view("profile",compact("GeneralWebmasterSections","Gallery"));
    }
    

 /**
     * get profile_order.
     *
     * @return void
     */
    public function profile_order(){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $user_id=@\Auth::user()->id;
        $orders=  Order::with("user","orderDetails","rate")->where("user_id",$user_id)->where('status','!=','cancel')->get();

        foreach( $orders as $order){
            if($order->orderDetails->isEmpty()){
                $price=0;
                $photo=null;
            }else{

//                dd($order);
            }

        }        return view("profile_order",compact("GeneralWebmasterSections","orders","photo","price"));
    }
    
    
    
    
     /**
     * get profile_order.
     *
     * @return void
     */
    public function details_orders($id){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $user_id=@\Auth::user()->id;
        $orders=  Order::with("user","orderDetails")->where("user_id",$user_id)->where("id",$id)
            ->where('status','!=','cancel')->get();
//        dd($orders);
        foreach( $orders as $order){
            if($order->orderDetails->isEmpty()){
                $price=0;
                $photo=null;
            }else{
//                $price=$order->orderDetails[0]->product_details->special_price ?
//                    $order->orderDetails[0]->product_details->special_price : $order->orderDetails[0]->product_details->price;
//                $photo =$order->orderDetails[0]->product_details->photo;
            }
        }        return view("details_orders",compact("GeneralWebmasterSections","orders","photo","price"));
    }


    /**
     * get details.
     *
     * @return void
     */
    public function details($id){
        $banner=Banner::where("section_id","3")->where("status","1")->first();
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $products=  product::with("images","standardgold","rate","size","favourite_product","promo_code")->where("status","1")
            ->orderBy('id', 'asc')->where("id",$id)->first();
//        dd($products);
        $user_id=@\Auth::user()->id;
        $prod_related=  product::with("images","rate","favourite_product","promo_code")->where("status","1")
            ->orderBy('id', 'asc')->where('id','!=',$id)->where("subcategory_id",$products->subcategory_id)->paginate(3);
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

        return view("details",compact("GeneralWebmasterSections","products","prod_related","c","banner","id"));
    }
    
    
     /**
     * get collection.
     *
     * @return void
     */
    public function Gallery(){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $Gallery = \App\Topic::where("webmaster_id",22)->get();
        return view("Gallery",compact("GeneralWebmasterSections","Gallery"));
    }
    

     /**
     * get collection.
     *
     * @return void
     */
    public function search_general(Request $request){
        // dd($request->all());
        $search= $request->q;
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
                $licenses = product::where('name_en','like','%'.$search.'%')
            ->orWhere('name_heb','like','%'.$search.'%')
            ->orderBy('id')
            ->paginate(10);

            // dd($licenses);
        return view("search_general",compact("GeneralWebmasterSections","licenses"));
    }


      /**
     * get collection.
     *
     * @return void
     */
    public function get_price(Request $request){
//         dd($request->all());
        $price=Price::where("standard_id",$request->data)->select("price","special_price","date_end_price")->first();
        if($price->date_end_price > \Carbon\Carbon::now()){
            return  $price->special_price;
        }else{
            return  $price->price;
        }

    }
      /**
     * get collection.
     *
     * @return void
     */
    public function get_price_size(Request $request){
//         dd($request->all());
        $price=Price::where("size_id",$request->data)->select("price","special_price","date_end_price")->first();
        if($price->date_end_price > \Carbon\Carbon::now()){
            return  $price->special_price;
        }else{
            return  $price->price;
        }


    }




   
}
