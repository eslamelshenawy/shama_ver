<?php

namespace App\Http\Controllers;

use App\BestDiamond;
use App\Cart;
use App\Order;
use App\OrderDetails;
use App\product;
use App\Banner;
use App\Setting;
use App\Subscribe;
use App\Topic;
use App\Rate;
use App\category;
use App\PromoCode;
use App\subcategory;
use App\Helpers\Helper;
use App\User;
use App\Webmail;
use App\WebmasterSection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\FavouriteProduct;
use Illuminate\Support\Facades\Session;

class JewelryController extends Controller
{

    /**
     * get products.
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
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $stand=Topic::where("webmaster_id",15)->get();
        $style=Topic::where("webmaster_id",16)->get();

        return view("frontEnd\jewelry\jewelry",compact("GeneralWebmasterSections","stand","style","id",'price_sel','max',"products","limit","id"));
    }

    /**
     * get details.
     *
     * @return void
     */
    public function details($id){
        $banner=Banner::where("section_id","3")->where("status","1")->first();
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $products=  product::with("images","standardgold","rate","favourite_product","promo_code")->where("status","1")
            ->orderBy('id', 'asc')->where("id",$id)->first();
        $user_id=@\Auth::user()->id;
        dd($products);
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

        return view("frontEnd\jewelry\details",compact("GeneralWebmasterSections","products","prod_related","c","banner","id"));
    }

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
        return view("frontEnd\jewelry\subcate",compact("GeneralWebmasterSections","subcats","banner","id"));
    }
 /**
     * get collection.
     *
     * @return void
     */
    public function collection($id){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $collection = Topic::find($id);
        return view("frontEnd\jewelry\collection",compact("GeneralWebmasterSections","collection"));
    }
 /**
     * get collection.
     *
     * @return void
     */
    public function Gallery(){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $Gallery = \App\Topic::where("webmaster_id",22)->get();
        return view("frontEnd\jewelry\Gallery",compact("GeneralWebmasterSections","Gallery"));
    }

 /**
     * get profile.
     *
     * @return void
     */
    public function profile(){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $Gallery = \App\Topic::where("webmaster_id",22)->get();
        return view("frontEnd\jewelry\profile",compact("GeneralWebmasterSections","Gallery"));
    }

 /**
     * get edit_profile.
     *
     * @return void
     */
    public function edit_profile(Request $request,$id){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $edit_profile=user::find($id);
        $edit_profile->name =$request->username;
        $edit_profile->email =$request->email;
        $edit_profile->address =$request->address;
        $edit_profile->phone =$request->phone;
        $edit_profile->save();
        return redirect()->back()->with('success', 'Successfully,  Edit Your Profile');
    }

 /**
     * get edit_profile.
     *
     * @return void
     */
    public function rate_create(Request $request){
//        dd($request->all());
        $user_id=@\Auth::user()->id;
        $check_rate=Rate::where("order_id",$request->order_id)->where("user_id",$user_id)->first();
        if($check_rate == null ){
            $Rate=new Rate;
            $Rate->user_id =$user_id;
            $Rate->order_id =$request->order_id;
            $Rate->stars =$request->star;
//            dd($Rate);
            $Rate->save();
            return response()->json(['ok' => 'Successfully   Rate ']); // Return OK to user's browser

        }else{
//            $Rate= Rate::find($check_rate->id);
//            $Rate->user_id =$user_id;
//            $Rate->order_id =$request->order_id;
//            $Rate->stars =$request->star;
//            $Rate->save();
//            return response()->json(['ok' => 'Successfully   Rate ']); // Return OK to user's browser

        }
    }
 /**
     * get delete_order.
     *
     * @return void
     */
    public function delete_order(Request $request){
        $user_id=@\Auth::user()->id;
        $check_rate=Order::find($request->order_id);
        $check_rate->status ="cancel";
        $check_rate->save();
        return response()->json(['ok' => 'Canceled Order ']); // Return OK to user's browser


    }

 /**
     * get profile_order.
     *
     * @return void
     */
    public function profile_order(){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $user_id=@\Auth::user()->id;
        $orders=  Order::with("user","orderDetails")->where("user_id",$user_id)->where('status','!=','cancel')->get();
        foreach( $orders as $order){
            if($order->orderDetails->isEmpty()){
                $price=0;
                $photo=null;
            }else{
                $price=$order->orderDetails[0]->product_details->special_price ?
                    $order->orderDetails[0]->product_details->special_price : $order->orderDetails[0]->product_details->price;
                $photo =$order->orderDetails[0]->product_details->photo;
            }
        }        return view("frontEnd\jewelry\profile_order",compact("GeneralWebmasterSections","orders","photo","price"));
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
        foreach( $orders as $order){
            if($order->orderDetails->isEmpty()){
                $price=0;
                $photo=null;
            }else{
                $price=$order->orderDetails[0]->product_details->special_price ?
                    $order->orderDetails[0]->product_details->special_price : $order->orderDetails[0]->product_details->price;
                $photo =$order->orderDetails[0]->product_details->photo;
            }
        }        return view("frontEnd\jewelry\details_orders",compact("GeneralWebmasterSections","orders","photo","price"));
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

        return view("frontEnd\jewelry\category",compact("GeneralWebmasterSections","cats","banner","id"));
    }


    /**
     * get products.
     *
     * @return void
     */
     public function test(){
         $price = Helper::formatNumber(23323, 'IDR');
         return $price;
     }


    /**
     * about .
     *
     * @return void
     */
     public function about(){
         $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
         $about = Topic::find(37);
         $setting = Setting::first();
         return view("frontEnd.about",compact("GeneralWebmasterSections","about","setting"));

     }

    /**
     * terms_conditions .
     *
     * @return void
     */
     public function terms_conditions(){
         $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
         $terms_conditions = Topic::find(130);
//         dd($terms_conditions);
         return view("frontEnd.terms_conditions",compact("GeneralWebmasterSections","terms_conditions"));

     }

    /**
     * policy .
     *
     * @return void
     */
     public function policy(){
         $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
         $policy = Topic::find(131);
         return view("frontEnd.privacy_policy",compact("GeneralWebmasterSections","policy"));

     }

    /**
     * Accessibility .
     *
     * @return void
     */
     public function Accessibility(){
         $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
         $Accessibility = Topic::find(132);
         return view("frontEnd.Accessibility",compact("GeneralWebmasterSections","Accessibility"));

     }


     /**
     * checkout .
     *
     * @return void
     */
     public function checkout(){
         $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
         $user_id=@\Auth::user()->id;
         $carts =\App\Cart::where("user_id",@\Auth::user()->id)->get();

         return view("frontEnd.checkout",compact("GeneralWebmasterSections","carts"));

     }

    public  function  check_promo(Request $request){
//    dd($request->all());

    }

    /**
     * storeOrder .
     *
     * @return void
     */
    public function storeOrder(Request $request){
        $validator = \Validator::make($request->all(), [
            'payment_type' => 'required',

        ]);

        if($validator->fails()) {
            return \Redirect::back()->withErrors($validator);
        }

//         dd($request->all());
        if($request->promocode != null){

            $array = explode(',', $request->data_product);
            $a=array();
            foreach ($array as  $product_id){

                $check_promo= PromoCode::where("code",$request->promocode)->where("product_id",$product_id)
                    ->where("end_date",">", \Carbon\Carbon::now())->get();
                if($check_promo->isEmpty()){
                    $a[]="em";

                }else{

                    $a[]="suc";
                }
            }
            if (in_array("em", $a, TRUE))
            {

                return response()->json(["status"=>"Invalid",'ok' => 'Invalid discount code']); // Return OK to user's browser

            }else{

                $amount_promo= PromoCode::where("code",$request->promocode)->first();

                $user_id=@\Auth::user()->id;
                $cart = Cart::where('user_id',\Auth::guard('web')->user()->id)->get();
                if ($cart->isEmpty())
                {
                    return redirect()->back()->with('error', 'Cart is Empty ');

                }

                $orders=new Order ;
                $orders->user_id =$user_id;
                $orders->total_price =($request->totalPrice) -($amount_promo->amount);
                $orders->total_price_b_ch_vat =$request->totalPrice_before_vat_char;
                $orders->payment_type =$request->payment_type;
                $orders->taxes =$request->taxes;
                $orders->delivery_fees =$request->ship_cost;
                $orders->order_date = Carbon::now();
                $orders->save();

                foreach($cart  as  $car){
                    $orderDetails = new OrderDetails();
                    $orderDetails->order_id =$orders->id;
                    $orderDetails->price =$car->price;
                    $orderDetails->product_id =$car->product_id;
                    $orderDetails->qty =$car->qty;
                    $orderDetails->price_sp =$car->price_sp;
                    $orderDetails->standard_gold_id =$car->standard_gold_id;
                    $orderDetails->size_id =$car->size_id;
                    $orderDetails->save();
                    $BestDiamond=new BestDiamond;
                    $BestDiamond->product_id= $car->product_id;
                    $BestDiamond->user_id= $user_id;
                    $BestDiamond->save();
                    Cart::where("user_id",$user_id)->where("product_id",$car->product_id)->delete();
                }
                return redirect()->back()->with('success', 'your Order, Send Successfully ');


//                return response()->json(["status"=>"Success",'ok' => 'Success discount code']); // Return OK to user's browser
            }

        }else{

            $user_id=@\Auth::user()->id;
            $cart = Cart::where('user_id',\Auth::guard('web')->user()->id)->get();
            if ($cart->isEmpty())
            {
                return redirect()->back()->with('error', 'Cart is Empty ');

            }

            $orders=new Order ;
            $orders->user_id =$user_id;
            $orders->total_price =($request->totalPrice) ;
            $orders->total_price_b_ch_vat =$request->totalPrice_before_vat_char;
            $orders->payment_type =$request->payment_type;
            $orders->taxes =$request->taxes;
            $orders->delivery_fees =$request->ship_cost;
            $orders->order_date = Carbon::now();
            $orders->save();

            foreach($cart  as  $car){
                $orderDetails = new OrderDetails();
                $orderDetails->order_id =$orders->id;
                $orderDetails->price =$car->price;
                $orderDetails->product_id =$car->product_id;
                $orderDetails->qty =$car->qty;
                $orderDetails->price_sp =$car->price_sp;
                $orderDetails->standard_gold_id =$car->standard_gold_id;
                $orderDetails->size_id =$car->size_id;
                $orderDetails->save();
                $BestDiamond=new BestDiamond;
                $BestDiamond->product_id= $car->product_id;
                $BestDiamond->user_id= $user_id;
                $BestDiamond->save();
                Cart::where("user_id",$user_id)->where("product_id",$car->product_id)->delete();
            }
            return redirect()->back()->with('success', 'your Order, Send Successfully ');

        }





     }

    /**
     * about .
     *
     * @return void
     */
     public function contact_us(){
         $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
         $setting = Setting::first();
//         dd($setting);
         return view("frontEnd.contact_us",compact("GeneralWebmasterSections","setting"));

     }

    /**
     * subscribe .
     *
     * @return void
     */
     public function subscribe(Request $request){
        //  $validator = \Validator::make($request->all(), [
        //      'email' => 'unique:subscribe,email,'
        //  ]);

        //  if($validator->fails()){
        //  return response()->json(['ok' => $validator->getMessageBag()->toArray()]); // Return OK to user's browser
        //  }
       $subscribe = Subscribe::where("email",$request->email)->get();
           if(!$subscribe->isEmpty()){
             return response()->json(['ok' => 'Successfully  Send  your email']); // Return OK to user's browser

           }else{
             $subscribe = new Subscribe();
             $subscribe->email =$request->email;
             $subscribe->save();

           }

         return response()->json(['ok' => 'Successfully  Send  your email']); // Return OK to user's browser

     }

    public function contactUsPost(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
//          'contact_subject' => 'required',
            'message' => 'required'
        ]);

        if (env('NOCAPTCHA_STATUS', false)) {
            $this->validate($request, [
                'g-recaptcha-response' => 'required|captcha'
            ]);
        }
        // SITE SETTINGS
        $WebsiteSettings = Setting::find(1);
        $site_title_var = "site_title_" . trans('backLang.boxCode');
        $site_email = $WebsiteSettings->site_webmails;
        $site_url = $WebsiteSettings->site_url;
        $site_title = $WebsiteSettings->$site_title_var;
//    dd($request->all());

        $Webmail = new Webmail;
        $Webmail->cat_id = 0;
        $Webmail->group_id = null;
        $Webmail->title = $request->contact_subject;
        $Webmail->details = $request->message;
        $Webmail->date = date("Y-m-d H:i:s");
        $Webmail->from_email = $request->email;
        $Webmail->from_name = $request->name;
        $Webmail->from_phone = $request->contact_phone;
        $Webmail->to_email = $WebsiteSettings->site_webmails;
        $Webmail->to_name = $site_title;
        $Webmail->status = 0;
        $Webmail->flag = 0;
        $Webmail->save();

        // SEND Notification Email
        if ($WebsiteSettings->notify_messages_status) {
            if (env('MAIL_USERNAME') != "") {
                Mail::send('backEnd.emails.webmail', [
                    'title' => "NEW MESSAGE:" . $request->contact_subject,
                    'details' => $request->contact_message,
                    'websiteURL' => $site_url,
                    'websiteName' => $site_title
                ], function ($message) use ($request, $site_email, $site_title) {
                    $message->from(env('NO_REPLAY_EMAIL', $request->contact_email), $request->contact_name);
                    $message->to($site_email);
                    $message->replyTo($request->contact_email, $site_title);
                    $message->subject($request->contact_subject);

                });
            }
        }
        return redirect()->back()->with('success', 'your message, Send Successfully ');

        return "OK";
    }






}
