<?php

namespace App\Http\Controllers\API;

use App\Banner;
use App\category;
use App\Jobs\SendEmailJob;
use App\OrderDetails;
use App\product;
use App\subcategory;
use App\FavouriteProduct;
use App\User;
use App\Order;
use App\Topic;
use App\Rate;
use App\Password_Reset;
use App\Cart;
use App\ContactUs;
use App\BestDiamond;
use App\WebmasterBanner;
use App\WebmasterSection;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Carbon\Carbon;

class ApiController extends   BaseController
{

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories(Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if($request->lang == "en"){
            $category=  category::select("name_en as name","photo","id")->where("status","1")->get();
        }else{

            $category=  category::select("name_heb as name","photo","id")->where("status","1")->get();
        }
        return $this->sendResponse($category, 'All Categories');
    }


    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function subcategories(Request $request){
//        dd($request->all());
        $validator = Validator::make($request->all(),[
            'lang' => 'required',
            'category_id' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        if($request->lang == "en"){
            $subcategory=  subcategory::where('category_id',$request->category_id)->where("status","1")->select("name_en as name","photo","id")->get();
        }else {
            $subcategory=  subcategory::where('category_id',$request->category_id)->where("status","1")->select("name_heb as name","photo","id")->get();
        }
        return $this->sendResponse($subcategory, 'All Categories');
    }

    /**
     * success response method.
     *
     * @return products
     */
    public function products(Request $request){

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
            'subcategory_id' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if($request->lang == "en"){

            $products_rate=  product::with("images","standardgold","rate","favourite_product","promo_code")->where("status","1")
                ->orderBy('id', 'asc')->get();

            if($products_rate->isEmpty()){
                return $this->sendResponse($details="", 'Not found  products');
            }
            $total = 0;
            for ($i = 0; $i<count($products_rate); $i++)
            {
                $user_id=$request->user()->id;

                $imags=@$products_rate[$i]->images[$i];
                // dd($products_rate[$i]->standard_gold);
                $standardgold=@$products_rate[$i]->standardgold[0];
                $rate=@$products_rate[$i]->rate[0];

                if($rate != null){
                    $rate2 =$rate->where("rates.product_id",$products_rate[$i]->id)->get();
                    $rat3=$rate2[0]->stars;
                    $count1=count($rate2);
                    $sumrate=0;
                    foreach($rate2 as $count=> $rat){
                        $rate=$rat->stars;
                        $sumrate +=$rate;
                    }
                    $varage=round($sumrate/$count1);
                }else{
                    $count1=0;
                    $rate2 = null;
                }

                $favourite_product=@$products_rate[$i]->favourite_product;
                if($favourite_product != null){
                    $status2=$favourite_product->where("favourite_products.user_id",$user_id)->where("favourite_products.product_id",$products_rate[$i]->id)
                    ->where("status","1")
                    ->first();
                }else{
                    $status2 =null;
                    
                }
                $promo_code=@$products_rate[$i]->promo_code;
                $details [] =
                    [
                        'id'=>@$products_rate[$i]->id,
                        'name'=>@$products_rate[$i]->name_en,
                        'details'=>@strip_tags($products_rate[$i]->details_en),
                        'photo'=>@$products_rate[$i]->photo,
                        'SalesPrice'=>@$products_rate[$i]->price,
                        'OriginalPrice'=>@$products_rate[$i]->special_price,
                        'offer'=>@$promo_code->amount == null ? "0" : "1",
                        'caliber'=>@$products_rate[$i]->topic_name($products_rate[$i]->standard_gold,"en") ,
                        'favorite'=>@$status2 == null ? "0" : "1",
                        'Rate'=>$rate == null ? "0" : $count1,
                        'total_rate_av'=>$rate == null ? "0" : $varage,

                    ];
//                dd($details);

            }



        }else {
            $user_id=$request->user()->id;

            $products_rate=  product::with("images","standardgold","rate","favourite_product","promo_code")->where("status","1")
                ->orderBy('id', 'asc')->get();

            if($products_rate->isEmpty()){
                return $this->sendResponse($details="", 'Not found  products');
            }

            $total = 0;
            for ($i = 0; $i<count($products_rate); $i++)
            {

                $imags=@$products_rate[$i]->images[$i];
                $standardgold=@$products_rate[$i]->standardgold[0];
                $rate=@$products_rate[$i]->rate[0];


                if($rate != null){
                    $rate2 =$rate->where("rates.product_id",$products_rate[$i]->id)->get();
                    $rat3=$rate2[0]->stars;
                    $count1=count($rate2);

                    $sumrate=0;
                    foreach($rate2 as $count=> $rat){
                        $rate=$rat->stars;
                        $sumrate +=$rate;
                    }
                    $varage=round($sumrate/$count1);
                }else{
                    $count1=0;
                    $rate2 = null;
                }



                $favourite_product=@$products_rate[$i]->favourite_product;
                if($favourite_product != null){
                    $status2=$favourite_product->where("favourite_products.user_id",$user_id)->where("favourite_products.product_id",$products_rate[$i]->id)
                   ->where("status","1")->first();
                    //   dump($products_rate[$i]->id);
                }else{

                    $status2 =null;
                }

                $promo_code=@$products_rate[$i]->promo_code;
                $details [] =
                    [
                        'id'=>@$products_rate[$i]->id,
                        'name'=>@$products_rate[$i]->name_heb,
                        'details'=>@strip_tags($products_rate[$i]->details_il),
                        'photo'=>@$products_rate[$i]->photo,
                        'SalesPrice'=>@$products_rate[$i]->price,
                        'OriginalPrice'=>@$products_rate[$i]->special_price,
                        'offer'=>@$promo_code->amount == null ? "0" : "1",
                        'caliber'=>@$products_rate[$i]->topic_name($products_rate[$i]->standard_gold,"en") ,
                        'favorite'=>@$status2 == null ? "0" : "1",
                        'Rate'=>$rate == null ? "0" : $count1,
                        'total_rate_av'=>$rate == null ? "0" : $varage,
                    ];
            }
        }

        return $this->sendResponse($details, 'All Products');
    }

    /**
     * success response method.
     *
     * @return products_detalis
     */
    public function products_detalis(Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required',
            'product_id' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if($request->lang == "en"){
            $products=  product::where("id",$request->product_id)->with("images","rate")->where("status","1")
                ->select("name_en as name","details_en as details","photo","price as SalesPrice","special_price as OriginalPrice","id")->get();
        }else {
            $products=  product::where("id",$request->product_id)->with("images","rate")->where("status","1")
                ->select("name_heb as name","details_en as details","photo","price as SalesPrice","special_price as OriginalPrice","id")->get();
        }
        return $this->sendResponse($products, ' Product details ');
    }

    /**
     * success response method.
     *
     * @return Banner
     */

    public function Banner (Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        if($request->lang == "en"){
            $Banners = Banner::select("file_en as image","id")->where('section_id', '=', '1')->get();
        }else {
            $Banners = Banner::select("file_ar as image","id")->where('section_id', '=', '1')->get();
        }
        return $this->sendResponse($Banners, 'Banner');
    }


    /**
     * success response method.
     *
     * @return style
     */

    public function style (Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if($request->lang == "en"){
            $styles = Topic::select("topics.title_en as style_name","topics.id as style_id","topics.photo_file as style_image")->where('webmaster_id', '=', '16')->get();
        }else {
            $styles = Topic::select("topics.title_il as style_name","topics.id as style_id","topics.photo_file as style_image")->where('webmaster_id', '=', '16')->get();
        }
        return $this->sendResponse($styles, 'style');
    }

    /**
     * success response method.
     *
     * @return style
     */

    public function style_id (Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required',
            'product_id' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        if($request->lang == "en"){
            $styles = Topic::select("title_en as title","photo_file")->join("products","products.style_id","=","topics.id")
                ->where("products.id",$request->product_id)
                ->where('webmaster_id', '=', '16')->get();
        }else {
            $styles = Topic::select("title_il as title","photo_file")->join("products","products.style_id","=","topics.id")
                ->where("products.id",$request->product_id)
                ->where('topics.webmaster_id', '=', '16')->select("topics.title_il as style_name","topics.id as style_id","topics.photo_file as style_image")->get();
        }
        return $this->sendResponse($styles, 'style');
    }
    /**
     * success response method.
     *
     * @return style
     */

    public function standard_gold (Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        if($request->lang == "en"){
            $styles = Topic::select("title_en as name","photo_file as image","id")->where('webmaster_id', '=', '15')->get();
        }else {
            $styles = Topic::select("title_il as name","photo_file as image","id")->where('webmaster_id', '=', '15')->get();
        }
        return $this->sendResponse($styles, 'style');
    }

    /**
     * success response method.
     *
     * @return style
     */

    public function standard_gold_product (Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required',
            'product_id' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if($request->lang == "en"){
            $standard = Topic::select("title_en as title","photo_file")->join("products","products.standard_gold","=","topics.id")
                ->where("products.id",$request->product_id)
                ->where('webmaster_id', '=', '15')
                ->select("topics.title_en as name","topics.id as id","products.price as price")->get();
        }else {
            $standard = Topic::select("title_il as title","photo_file")->join("products","products.standard_gold","=","topics.id")
                ->where("products.id",$request->product_id)
                ->where('topics.webmaster_id', '=', '15')->
                select("topics.title_il as name","topics.id as id","products.price as price")->get();

        }
        return $this->sendResponse($standard, 'standard_gold_product');
    }

    /**
     * success response method.
     *
     * @return size
     */

    public function size (Request $request){
        $validator = Validator::make($request->all(),[
            'lang' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        if($request->lang == "en"){
            $sizes = Topic::select("title_en as title","photo_file")->where('webmaster_id', '=', '18')->get();
        }else {
            $sizes = Topic::select("title_il as title","photo_file")->where('webmaster_id', '=', '18')->get();
        }
        return $this->sendResponse($sizes, 'style');
    }

    /**
     * success response method.
     *
     * @return size
     */

    public function size_product_id (Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required',
            'product_id' => 'required',

        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if($request->lang == "en"){
            $sizes = Topic::select("topics.id as id","topics.size as size")->join("products","products.size_id","=","topics.id")
                ->where("products.id",$request->product_id)->where('webmaster_id', '=', '18')->get();
        }else {
            $sizes = Topic::select("topics.id as id","topics.size as size")->join("products","products.size_id","=","topics.id")
                ->where("products.id",20)->where('topics.webmaster_id', '=', '18')->get();


        }
        return $this->sendResponse($sizes, 'style');
    }

    /**
     * success response method.
     *
     * @return fave_product
     */

    public function fave_product (Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user_id=$request->user()->id;

        if($request->lang == "en"){

            $products_fav=  FavouriteProduct::where("favourite_products.user_id",$user_id)->where("status","1")
                ->orderBy('id', 'desc')->get();

            if($products_fav->isEmpty()){
                return $this->sendResponse($details="", 'Not found Favourit products');
            }
            $total = 0;
            for ($i = 0; $i<count($products_fav); $i++)
            {
                $productes_details= $products_fav[$i]->product_details($products_fav[$i]->product_id);
                $productes_fav_status= $products_fav[$i]->favourit_product_status($products_fav[$i]->product_id);
                $promo_code=@$productes_details[$i]->promo_code;
                $standardgold=@$productes_details[0]->standardgold[0];

                if($standardgold !=null){
                    $cliber=   $productes_details[0]->topic_name(@$standardgold->standard_gold,"en");
                }

//                $favourite_product_status=@$products_fav[$i]->status;

                $rate=@$productes_details[0]->rate[0];


                if($rate != null){
                    $rate2 =$rate->where("rates.product_id",$productes_details[0]->id)->get();
                    $rat3=$rate2[0]->stars;
                    $count1=count($rate2);

                    $sumrate=0;
                    foreach($rate2 as $count=> $rat){
                        $rate=$rat->stars;
                        $sumrate +=$rate;
                    }
                    $varage=round($sumrate/$count1);
                    // dump($varage,$count1);
                }else{
                    $count1=0;
                    $rate2 = null;
                }


                $details [] =
                    [
                        'id'=>@$productes_details[0]->id,
                        'name'=>@$productes_details[0]->name_en,
                        'details'=>@strip_tags(@$productes_details[0]->details_en),
                        'photo'=>@$productes_details[0]->photo,
                        'SalesPrice'=>@$productes_details[0]->price,
                        'OriginalPrice'=>@$productes_details[0]->special_price,
                        'offer'=>@$promo_code->amount == null ? "0" : "1",
                        'caliber'=> @$standardgold ?@$cliber :"0" ,
                        'favorite'=>@$productes_fav_status == null ? "0" : "1",
                        'Rate'=>$rate == null ? "0" : $count1,
                        'total_rate_av'=>$rate == null ? "0" : $varage,

                    ];
            }

        }else {

            $products_fav=  FavouriteProduct::where("favourite_products.user_id",$user_id)->where("status","1")
                ->orderBy('id', 'desc')->get();


            if($products_fav->isEmpty()){
                return $this->sendResponse($details="", 'Not found Favourit products');
            }
            $total = 0;
            for ($i = 0; $i<count($products_fav); $i++)
            {
                $productes_details= $products_fav[$i]->product_details($products_fav[$i]->product_id);
                $productes_fav_status= $products_fav[$i]->favourit_product_status($products_fav[$i]->product_id);
                $promo_code=@$productes_details[$i]->promo_code;
                $standardgold=@$productes_details[0]->standardgold[0];

                if($standardgold !=null){
                    $cliber=   $productes_details[0]->topic_name(@$standardgold->standard_gold,"ar");
                }
//                $favourite_product_status=@$products_fav[$i]->status;


                $rate=@$productes_details[0]->rate[0];


                if($rate != null){
                    $rate2 =$rate->where("rates.product_id",$productes_details[0]->id)->get();
                    $rat3=$rate2[0]->stars;
                    $count1=count($rate2);

                    $sumrate=0;
                    foreach($rate2 as $count=> $rat){
                        $rate=$rat->stars;
                        $sumrate +=$rate;
                    }
                    $varage=round($sumrate/$count1);
                    // dump($varage,$count1);
                }else{
                    $count1=0;
                    $rate2 = null;
                }


                $details [] =
                    [
                        'id'=>@$productes_details[0]->id,
                        'name'=>@$productes_details[0]->name_heb,
                        'details'=>@$productes_details[0]->details_il,
                        'photo'=>@$productes_details[0]->photo,
                        'SalesPrice'=>@$productes_details[0]->price,
                        'OriginalPrice'=>@$productes_details[0]->special_price,
                        'offer'=>@$promo_code->amount == null ? "0" : "1",
                        'caliber'=> @$standardgold ?@$cliber :"0" ,
                        'favorite'=>@$productes_fav_status == null ? "0" : "1",
                        'Rate'=>$rate == null ? "0" : $count1,
                        'total_rate_av'=>$rate == null ? "0" : $varage,

                    ];
            }

        }
        return $this->sendResponse($details, 'All products');
    }



    /**
     * success response method.
     *
     * @return fave_product
     */

    public function best_diamond (Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user_id=$request->user()->id;

        if($request->lang == "en"){

            $products_fav=  BestDiamond::select("product_id")->distinct()->get();
                
                // dd($products_fav);

            if($products_fav->isEmpty()){
                return $this->sendResponse($details="", 'Not found  products');
            }
            $total = 0;
            for ($i = 0; $i<count($products_fav); $i++)
            {
                $productes_details= $products_fav[$i]->product_details($products_fav[$i]->product_id);
                $productes_fav_status= $products_fav[$i]->favourit_product_status_user($products_fav[$i]->product_id,$user_id);
                 if($productes_fav_status == null || $productes_fav_status == "0" ){
                    $productes_fav_status= null;
                }

                $promo_code=@$productes_details[$i]->promo_code;
                $standardgold=@$productes_details[0]->standardgold[0];
                if($standardgold !=null){
                    $cliber=   $productes_details[0]->topic_name(@$standardgold->standard_gold,"en");
                }

                $rate=@$productes_details[0]->rate[0];


                if($rate != null){
                    $rate2 =$rate->where("rates.product_id",$productes_details[0]->id)->get();
                    $rat3=$rate2[0]->stars;
                    $count1=count($rate2);

                    $sumrate=0;
                    foreach($rate2 as $count=> $rat){
                        $rate=$rat->stars;
                        $sumrate +=$rate;
                    }
                    $varage=round($sumrate/$count1);
                    // dump($varage,$count1);
                }else{
                    $count1=0;
                    $rate2 = null;
                }


                $details [] =
                    [
                        'id'=>@$productes_details[0]->id,
                        'name'=>@$productes_details[0]->name_en,
                        'details'=>@strip_tags(@$productes_details[0]->details_en),
                        'photo'=>@$productes_details[0]->photo,
                        'SalesPrice'=>@$productes_details[0]->price,
                        'OriginalPrice'=>@$productes_details[0]->special_price,
                        'offer'=>@$promo_code->amount == null ? "0" : "1",
                        'caliber'=> @$standardgold ?@ $cliber :"0" ,
                        'favorite'=>@$productes_fav_status == null ? "0" : "1",
                        'Rate'=>$rate == null ? 0 : $count1,
                        'total_rate_av'=>$rate == null ? 0 : $varage,
                    ];
            }

        }else {

            $products_fav=  BestDiamond::select("product_id")->distinct()->get();

   if($products_fav->isEmpty()){
                return $this->sendResponse($details="", 'Not found Favourit products');
            }
            $total = 0;
            for ($i = 0; $i<count($products_fav); $i++)
            {
                $productes_details= $products_fav[$i]->product_details($products_fav[$i]->product_id);
                $productes_fav_status= $products_fav[$i]->favourit_product_status_user($products_fav[$i]->product_id,$user_id);
                // dump($productes_fav_status);
                if($productes_fav_status == null || $productes_fav_status == "0" ){
                    $productes_fav_status= null;
                }
               
                $promo_code=@$productes_details[$i]->promo_code;
                $standardgold=@$productes_details[0]->standardgold[0];
                if($standardgold !=null){
                    $cliber=   $productes_details[0]->topic_name(@$standardgold->standard_gold,"ar");
                }

                $rate=@$productes_details[0]->rate[0];


                if($rate != null){
                    $rate2 =$rate->where("rates.product_id",$productes_details[0]->id)->get();
                    $rat3=$rate2[0]->stars;
                    $count1=count($rate2);

                    $sumrate=0;
                    foreach($rate2 as $count=> $rat){
                        $rate=$rat->stars;
                        $sumrate +=$rate;
                    }
                    $varage=round($sumrate/$count1);
                    // dump($varage,$count1);
                }else{
                    $count1=0;
                    $rate2 = null;
                }

                $details [] =
                    [
                        'id'=>@$productes_details[0]->id,
                        'name'=>@$productes_details[0]->name_heb,
                        'details'=>@$productes_details[0]->details_il,
                        'photo'=>@$productes_details[0]->photo,
                        'SalesPrice'=>@$productes_details[0]->price,
                        'OriginalPrice'=>@$productes_details[0]->special_price,
                        'offer'=>@$promo_code->amount == null ? "0" : "1",
                        'caliber'=> @$standardgold ?@$cliber :"0" ,
                        'favorite'=>@$productes_fav_status == null ? "0" : "1",
                        'Rate'=>$rate == null ? 0 : $count1,
                        'total_rate_av'=>$rate == null ? 0 : $varage,

                    ];
            }

        }
        return $this->sendResponse($details, 'All products');
    }

    /**
     * success response method.
     *
     * @return add_fave_product
     */

    public function add_fave_product (Request $request){
        $validator = Validator::make($request->all(), [
            'lang' => 'required',
            'product_id' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user_id=$request->user()->id;
        $product_id=$request->product_id;

        $product_fav= FavouriteProduct::where("product_id",$product_id)->where("user_id",$user_id)->first();

        if (empty($product_fav)){
            $product_fav=new FavouriteProduct;
            $product_fav->status= 1;
            $product_fav->user_id= $user_id;
            $product_fav->product_id= $request->product_id;
            $product_fav->save();
            return $this->sendResponse($product_fav, 'successfully Add Fav');

        }else{
            $status=$product_fav->status;
            if($status == 1){
                $product_fav_id=$product_fav->id;
                $product_fav= FavouriteProduct::find($product_fav_id);
                $product_fav->status= 0;
                $product_fav->save();
                return $this->sendResponse($product_fav, 'successfully remove Fav');

            }else{
                $product_fav_id=$product_fav->id;
                $product_fav= FavouriteProduct::find($product_fav_id);
                $product_fav->status= 1;
                $product_fav->save();
                return $this->sendResponse($product_fav, 'successfully Add Fav');

            }



        }
    }


    /**
     * success response method.
     *
     * @return Banner
     */

    public function filter (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $a=$request->type_men;
        $b=$request->style_id;
        $c=$request->type_cliber;
        $d=$request->max_price;
        $e=$request->min_price;
        $q = product::with("images","standardgold","rate","favourite_product","promo_code")->where("status","1")
            ->where(function ($query)use ($a,$b,$c,$d,$e) {

                if (!empty($a)) {
                    $query->Where('type_men', '=',$a);
                }
                if (!empty($b)) {
                    $query->Where('style_id', '=',$b);
                }
                if (!empty($c)) {
                    $query->Where('standard_gold', '=',$c);
                }
                if (!empty($d)) {
                    $query->Where('price', '<',$d);
                }
                if (!empty($e)) {
                    $query->Where('price', '>',$e);
                }
                if (!empty($a) && !empty($b)&& !empty($c)&& !empty($d)&& !empty($e)) {
                    $query->Where('type_men', '=',$a)
                        ->Where('style_id', '=', $b)
                        ->Where('standard_gold', '=', $c)
                        ->Where('price', '<=', $d)
                        ->Where('price', '>=', $e);
                }

            })->orderBy('id', 'asc')->get();

        $user_id=$request->user()->id;
       
        if($q->isEmpty()){
                    return $this->sendResponse($details="", 'product');

        }else{
            
        
        for ($i = 0; $i<count($q); $i++)
        {

            $imags=@$q[$i]->images[$i];
            $standardgold=@$q[$i]->standardgold[0];
            $rate=@$q[$i]->rate[0];

            if($rate != null){
                $rate2 =$rate->where("rates.product_id",$q[$i]->id)->get();
                $rat3=$rate2[0]->stars;
                $count1=count($rate2);

                $sumrate=0;
                foreach($rate2 as $count=> $rat){
                    $rate=$rat->stars;
                    $sumrate +=$rate;
                }
                $varage=round($sumrate/$count1);
            }else{
                $count1=0;
                $rate2 = null;
            }

            $favourite_product=@$q[$i]->favourite_product;
            
            if($favourite_product != null){
                
                $status2=$favourite_product->where("favourite_products.user_id",$user_id)
                    ->where("favourite_products.product_id",$q[$i]->id)->get();
                    // dump($favourite_product);
                    
                    if($status2->isEmpty() || $status2 == "0" ){
                        //  dump($q);
                        $status2=null;
                    }
                    }

            $promo_code=@$q[$i]->promo_code;
            
            
            
                    if($request->lang == "en"){
                        // dd($q[$i]->id);
         $details [] =
                [
                    'id'=>@$q[$i]->id,
                    'name'=>@$q[$i]->name_en,
                    'details'=>@strip_tags($q[$i]->details_en),
                    'photo'=>@$q[$i]->photo,
                    'SalesPrice'=>@$q[$i]->price,
                    'OriginalPrice'=>@$q[$i]->special_price,
                    'offer'=>@$promo_code->amount == null ? 0 : 1,
                    'caliber'=>@$q[$i]->topic_name($standardgold->standard_gold,"en") ,
                    'favorite'=>@$status2 == null ? 0 : "1",
                    'Rate'=>$rate == null ? 0 : $count1,
                    'total_rate_av'=>$rate == null ? 0 : $varage,
                ];

                        
                        
                        
                    }else{

            $details [] =
                [
                    'id'=>@$q[$i]->id,
                    'name'=>@$q[$i]->name_heb,
                    'details'=>@strip_tags($q[$i]->details_il),
                    'photo'=>@$q[$i]->photo,
                    'SalesPrice'=>@$q[$i]->price,
                    'OriginalPrice'=>@$q[$i]->special_price,
                    'offer'=>@$promo_code->amount == null ? 0 : 1,
                    'caliber'=>@$q[$i]->topic_name($standardgold->standard_gold,"ar") ,
                    'favorite'=>@$status2 == null ? 0 : 1,
                    'Rate'=>$rate == null ? 0 : $count1,
                    'total_rate_av'=>$rate == null ? 0 : $varage,
                ];
                
                    }
        }

        return $this->sendResponse($details, 'product');
        }
    }


    /**
     * success response method.
     *
     * @return edit_profile
     */

    public function edit_profile (Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'lang' => 'required',

        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user_id=$request->user()->id;
        $users=User::find($user_id);
        $users->name= $request->name;
        $users->email= $request->email;
        $users->phone= $request->phone;
        $users->password= $request->password;
        $users->save();
        return $this->sendResponse($users, 'User modification successfully.');


    }



    /**
     * success response method.
     *
     * @return edit_profile
     */

    public function add_rate_comment (Request $request){

        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'stars' => 'required',
            'comment' => 'required',
            'lang' => 'required',

        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user_id=$request->user()->id;
        $rates=Rate::where("user_id",$user_id)->where("product_id",$request->product_id)->first();
        if (empty($rates)){
            $rates=new Rate;

            $rates->product_id= $request->product_id;
            $rates->stars= $request->stars;
            $rates->comment= $request->comment;
            $rates->user_id= $user_id;
            $rates->save();

        }
        else{
            $rates=Rate::find($rates->id);
            $rates->product_id= $request->product_id;
            $rates->stars= $request->stars;
            $rates->comment= $request->comment;
            $rates->user_id= $user_id;
            $rates->save();

        }
        return $this->sendResponse($rates,'User rate successfully.');


    }

    /**
     * success response method.
     *
     * @return edit_profile
     */

    public function profile (Request $request){


        $user_id=$request->user()->id;
        $users=User::where("users.id",$user_id)->select("users.name","users.email",
            "users.phone","users.photo","orders.total_price as paid")
            ->leftjoin("orders", "orders.user_id", "=", "users.id")
            ->get();
        $order= Order::where("user_id",$user_id)->count();
        $order_id= Order::where("orders.user_id",$user_id)->select("order_details.product_id","order_details.order_id","orders.user_id")->join("order_details","order_details.order_id","orders.id")->get();
        
        // dump($order_id);
        $a=array();
        $paid=0;
        foreach ($order_id as$key=> $ord){
            // dump($ord);
            array_push($a,$ord->product_id);
            $paid1= $users[$key]->paid;
            $paid+=$paid1;
        }
        $total=array_unique($a);
        $totalProduct=count($total);
        $totalOrder=($order);

        for ($i = 0; $i<1; $i++) {
            $totalPro=@count($users[$i]->productId);
            $totalProduct+=$totalPro;

            $details [] =
                [
                    'totalOrder'=>@$totalOrder,
                    'totalProduct'=>@$totalProduct,
                    'paid'=>@$paid,
                    'name'=>@$users[$i]->name,
                    'email'=>@$users[$i]->email,
                    'phone'=>@$users[$i]->phone,
                    'photo'=>@$users[$i]->photo,
                ];
        }
        return $this->sendResponse($details, 'User Profile.');
    }

    /**
     * success response method.
     *
     * @return add_cart
     */

    public function add_cart (Request $request){

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
            'product_id' => 'required',
            'qty' => 'required',
            // 'standard_gold_id' => 'required',
            // 'size_id' => 'required',
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        
        $user_id=$request->user()->id;
        
        $array = explode(',', $request->product_id);

        if($request->standard_gold_id && $request->size_id && $request->product_id){
              $cart=Cart::where("user_id",$user_id)->where("standard_gold_id",$request->standard_gold_id)
              ->where("product_id",$request->product_id)->where("size_id",$request->size_id)->first();
        }elseif($request->standard_gold_id){
              $cart=Cart::where("user_id",$user_id)->where("standard_gold_id",$request->standard_gold_id)->first();
        }elseif($request->size_id){
             $cart=Cart::where("user_id",$user_id)->where("size_id",$request->size_id)->first();
        }elseif($request->product_id){
             $cart=Cart::where("user_id",$user_id)->where("product_id",$request->product_id)->first();
        }else{
             $cart=Cart::where("user_id",$user_id)->first();
        }
            // dd($cart);
            
            
            if(empty($cart)){
                $cart=new Cart;
                $cart->product_id= $request->product_id;
                $cart->qty= $request->qty;
                $cart->user_id= $user_id;
                $cart->standard_gold_id= $request->standard_gold_id;
                $cart->size_id= $request->size_id;
                // $cart->color_id= $request->color_id;
                $cart->save();

            }
            else{

                return $this->sendResponse( "message",' Has been added to Cart ');
                $cart=Cart::find($cart->id);
                $cart->product_id= $request->product_id;
                $cart->qty= $request->qty;
                $cart->user_id= $user_id;
                $cart->standard_gold_id= $request->standard_gold_id;
                $cart->size_id= $request->size_id;
                $cart->save();
            }

        

        return $this->sendResponse( $cart,'User add Cart successfully.');


    }


    /**
     * success response method.
     *
     * @return add_cart
     */

    public function plusCart(Request $request){

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
            'cart_id' => 'required',

        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user_id=$request->user()->id;
                $cart_id =$request->cart_id;
        $cart =  Cart::find($cart_id);


        if (empty($cart))
        {
            return $this->sendResponse('cart is empty','',400);
        }
        elseif ( $cart->qty == 0)
        {
            Cart::find($cart_id)
                ->delete();

            return $this->sendResponse('delete all cart success','',200);

        }
        else
        {
            $action = Cart::
            where('user_id','=',$user_id)->where("id",$request->cart_id)->get();
            foreach ($action as  $cart){
                $cart->qty=$cart->qty + 1;
                $cart->save();
            }
            if ( $cart->save())
            {
                return $this->sendResponse('plus qty cart success','',200);
            }
            else
            {
                return $this->sendResponse('please try again','',200);
            }
        }
    }

    /**
     * success response method.
     *
     * @return add_cart
     */

    public function minCart(Request $request){

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
            'cart_id' => 'required',

        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user_id=$request->user()->id;
        $cart_id =$request->cart_id;
        $cart =  Cart::find($cart_id);
        if (empty($cart))
        {
            return $this->sendResponse('cart is empty','',400);
        }
        elseif ( $cart->qty == 0)
        {
             Cart::find($cart_id)
                ->delete();

            return $this->sendResponse('delete all cart success','',200);

        }
        else
        {
            $action = Cart::
            where('user_id','=',$user_id)->where("id",$request->cart_id)->get();
            foreach ($action as  $cart){
                $cart->qty=$cart->qty-1;
                $cart->save();
            }
            if ( $cart->save())
            {
                return $this->sendResponse('min qty cart success','',200);
            }
            else
            {
                return $this->sendResponse('please try again','',200);
            }
        }
    }


    /**
     * success response method.
     *
     * @return deleteCart
     */

    public function deleteCart(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
            'cart_id' => 'required',
            
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user_id=$request->user()->id;
        $cart_id=$request->cart_id;
        $dataCart = Cart::find($cart_id);
        
        if ($dataCart == null)
        {
            return $this->sendResponse('','cart is empty',404);
        }
        else
        {
            $action =  Cart::find($cart_id)
                ->delete();
            if ($action)
            {
                return $this->sendResponse('delete success','',200);
            }
            else
            {
                return $this->sendResponse('please try again','',500);
            }
        }
    }


    /**
     * success response method.
     *
     * @return cart
     */

    public function cart (Request $request){

        $validator = Validator::make($request->all(), [
            'lang' => 'required',

        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user_id=$request->user()->id;

        if($request->lang == "en") {


        $cart=  Cart::where("user_id",$user_id)
                        ->orderBy('id', 'desc')->get();
                
            $products_fav=  Cart::where("user_id",$user_id)
                ->orderBy('id', 'desc')->get();

            if($products_fav->isEmpty()){
                return $this->sendResponse($details="", 'Cart Empty');
            }
            $total = 0;
            for ($i = 0; $i<count($products_fav); $i++)
            {
                $productes_details= $products_fav[$i]->product_details($products_fav[$i]->product_id);
                 
                $productes_fav_status= $products_fav[$i]->favourit_product_status($products_fav[$i]->product_id);
                $promo_code=@$productes_details[$i]->promo_code;
                $standardgold=@$productes_details[0]->standardgold[0];
                $size=@$products_fav[$i]->size_id;
                if($standardgold !=null){
                    $cliber=   $productes_details[0]->topic_name(@$standardgold->standard_gold,"en");
                }
                if($size !=null){
                    $siz=   @$productes_details[0]->topic_size(@$size,"en");
                }

           
                $rate=@$productes_details[0]->rate[0];


                if($rate != null){
                    $rate2 =$rate->where("rates.product_id",$productes_details[0]->id)->get();
                    $rat3=$rate2[0]->stars;
                    $count1=count($rate2);

                    $sumrate=0;
                    foreach($rate2 as $count=> $rat){
                        $rate=$rat->stars;
                        $sumrate +=$rate;
                    }
                    $varage=round($sumrate/$count1);
                    // dump($varage,$count1);
                }else{
                    $count1=0;
                    $rate2 = null;
                }
                
                // dump($productes_details[0]->special_price );
                if(@$productes_details[0]->special_price == null){
                    $price=@$productes_details[0]->price;
                    $totalprice=(@$productes_details[0]->price*$products_fav[$i]->qty)+@$productes_details[0]->delivery_fees+@$productes_details[0]->taxes;
                }
                else{
                    $price=$productes_details[0]->special_price;
                    $totalprice=(@$productes_details[0]->special_price*$products_fav[$i]->qty)+@$productes_details[0]->delivery_fees+@$productes_details[0]->taxes;

                }


                $details [] =
                    [
                        'id'=>@$products_fav[$i]->id,
                        'name'=>@$productes_details[0]->name_en,
                        'details'=>@strip_tags(@$productes_details[0]->details_en),
                        'photo'=>@$productes_details[0]->photo,
                        'totalprice'=>@$totalprice,
                        'price'=>@$price,
                        'qty'=>@$products_fav[$i]->qty,
                        'caliber'=> @$standardgold ?@ $cliber :"0" ,
                        'taxes'=>@$productes_details[0]->taxes,
                        'delivery_fees'=>$productes_details[0]->delivery_fees,
                        'size'=>@$siz ? $siz : 0,

                    ];
            }
            


        }else{

        $cart=  Cart::where("user_id",$user_id)
                        ->orderBy('id', 'desc')->get();
                
            $products_fav=  Cart::where("user_id",$user_id)
                ->orderBy('id', 'desc')->get();

            if($products_fav->isEmpty()){
                return $this->sendResponse($details="", 'Cart Empty');
            }
            $total = 0;
            for ($i = 0; $i<count($products_fav); $i++)
            {
                $productes_details= $products_fav[$i]->product_details($products_fav[$i]->product_id);
                 
                $productes_fav_status= $products_fav[$i]->favourit_product_status($products_fav[$i]->product_id);
                $promo_code=@$productes_details[$i]->promo_code;
                $standardgold=@$productes_details[0]->standardgold[0];
                $size=@$products_fav[$i]->size_id;
                if($standardgold !=null){
                    $cliber=   $productes_details[0]->topic_name(@$standardgold->standard_gold,"ar");
                }
                if($size !=null){
                    $siz=   @$productes_details[0]->topic_size(@$size,"ar");
                }

           
                $rate=@$productes_details[0]->rate[0];


                if($rate != null){
                    $rate2 =$rate->where("rates.product_id",$productes_details[0]->id)->get();
                    $rat3=$rate2[0]->stars;
                    $count1=count($rate2);

                    $sumrate=0;
                    foreach($rate2 as $count=> $rat){
                        $rate=$rat->stars;
                        $sumrate +=$rate;
                    }
                    $varage=round($sumrate/$count1);
                    // dump($varage,$count1);
                }else{
                    $count1=0;
                    $rate2 = null;
                }


                $details [] =
                    [
                        'id'=>@$products_fav[$i]->id,
                        'name'=>@$productes_details[0]->name_en,
                        'details'=>@strip_tags(@$productes_details[0]->details_en),
                        'photo'=>@$productes_details[0]->photo,
                        'totalprice'=>@$productes_details[0]->price,
                        'price'=>@$productes_details[0]->special_price,
                        'qty'=>@$products_fav[$i]->qty,
                        'caliber'=> @$standardgold ?@ $cliber :"0" ,
                        'taxes'=>@$productes_details[0]->taxes,
                        'delivery_fees'=>$productes_details[0]->delivery_fees,
                        'size'=>@$siz ? $siz : 0,

                    ];
            }

        }

        if($cart->isEmpty()){
            return $this->sendResponse("",'Cart Empty','500');

        }
        
            return $this->sendResponse($details ,'User  Cart.');


        




    }

    /**
     * success response method.
     *
     * @return myorder
     */

    public function myorder (Request $request){

        $user_id=$request->user()->id;
        $orders=Order::where("user_id","$user_id")->select("id","total_price as totalPrice",
            "order_date as orderDate","status","address","payment_type","delivery_fees as deliveryFees","city","taxes")->get();
        return $this->sendResponse($orders, 'User orders.');
    }
    /**
     * success response method.
     *
     * @return add_order
     */

    public function add_order (Request $request){

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
            'payment_type' => 'required',
            'city' => 'required',
            'totalPrice' => 'required',
            'phone' => 'required',
            'address'=>'required|min:3',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user_id=$request->user()->id;
        $cart = Cart::where('user_id',$user_id)->join("products","products.id","=","carts.product_id")
            ->select("product_id as productId","qty","products.name_en as title","carts.qty","products.price as price")->get();
        $user = User::find($request->user()->id);

    //   dd($cart);
        if ($cart->isEmpty())
        {
            return $this->sendResponse("", 'We cant find a cart with that this users  ');
        }
        
            $orders=new Order ;
            $orders->user_id =$user_id;
            $orders->total_price =$request->totalPrice;
            $orders->payment_type =$request->payment_type;
            $orders->order_date = Carbon::now();
            $orders->city =$request->city;
            $orders->address =$request->address;
            $orders->phone =$request->phone;
            $orders->delivery_fees ="20";
            $orders->save();
            
        foreach($cart  as  $car){

            $orderDetails = new OrderDetails();
            $orderDetails->order_id =$orders->id;
            $orderDetails->price =$car->price;
            $orderDetails->product_id =$car->productId;
            $orderDetails->qty =$car->qty;
            $orderDetails->save();
            
                $BestDiamond=new BestDiamond;
                $BestDiamond->product_id= $car->productId;
                $BestDiamond->user_id= $user_id;
                $BestDiamond->save();


            Cart::where("user_id",$user_id)->where("product_id",$car->productId)->delete();

        }


        return $this->sendResponse("", ' orders add successfully.');

    }

    /**
     * success response method.
     *
     * @return order_details
     */

    public function order_details (Request $request){

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
            'order_id' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user_id=$request->user()->id;
        $order_id=$request->order_id;
        if($request->lang == "en") {
            $order_details = Order::where("orders.id",$order_id)->join("order_details","order_details.order_id","=","orders.id")
            ->join("products", "products.id", "=", "order_details.product_id")->
            select("products.name_en as name", "products.id as  id", "products.photo as photo","products.price as price")->get();
        }else{
            $order_details = Order::where("orders.id",$order_id)->join("order_details","order_details.order_id","=","orders.id")
            ->join("products", "products.id", "=", "order_details.product_id")->
            select("products.name_heb as name", "products.id as  id", "products.photo as photo","products.price as price")->get();
        }
        return $this->sendResponse($order_details, 'User orders details.');


    }
    /**
     * success response method.
     *
     * @return order_details
     */

    public function forget_pass (Request $request){

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
            'email' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $email=$request->email;
        $check_email=User::where("email",$email)->first();
        if(!empty($check_email)){
            $rest_password=new Password_Reset;
            $rest_password->token=\Str::random(32);
            $rest_password->email=$request->email;
            $rest_password->save();
            $details['email'] = $request->email;

            dispatch(new \App\Jobs\SendEmailJob($details));

            return $this->sendResponse("email", 'check your Email to reset Password .');

        }else{
            return $this->sendResponse("email", 'This email not Correct.');

        }
    }


    public function contact_us (Request $request){

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user_id=$request->user()->id;

        $contactus=new ContactUs;
        $contactus->name= $request->name;
        $contactus->phone= $request->phone;
        $contactus->user_id= $user_id;
        $contactus->message= $request->message;
        $contactus->save();


        return $this->sendResponse( $contactus,'Send successfully.');


    }






}
