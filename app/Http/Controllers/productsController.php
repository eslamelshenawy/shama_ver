<?php

namespace App\Http\Controllers;

use App\Photo;
use App\setting_filter;
use App\WebmasterSection;
use App\category;
use App\subcategory;
use App\StandardGold;
use App\product;
use App\OrderDetails;
use App\Order;
use App\Price;
use App\Size;
use Auth;
use File;
use Helper;
use Illuminate\Http\Request;
use Redirect;

class productsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }

    private $uploadPath = "uploads/topics/";


    public function getUploadPath()
    {
        return $this->uploadPath;
    }


    //all products
    public function products(){
        $products=  product::where('status', '=', '1')->orderBy('id','desc')->paginate(10);
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('backEnd.products.products',compact('products','GeneralWebmasterSections'));
    }
    
    
    //all orders
    public function orders(){
        
        $orders=  Order::with("user","orderDetails")->get();
        $total_price=0;
        foreach( $orders as $key=> $order) {
            $order_deils = \App\OrderDetails::where("order_id", $order->id)->get();
        }
        for ($i=0;$i<count($orders) ;++$i ){
            $order_deils = \App\OrderDetails::where("order_id", $orders[$i]->id)->get();
            $details [] =$order_deils;
        }
        foreach( $details as $key=> $detail) {
            foreach( $detail as $key=> $det) {
                $qyt= $det->qty;
                $product_deils=\App\product::where("id",$det->product_id)->first();
                if($product_deils == null){
                    $price=0;
                    $photo=null;
                }else{
                    $price= $product_deils->special_price ?
                        ($product_deils->special_price)*$qyt : ($product_deils->price)*$qyt;
                    $photo =$product_deils->photo;
                }
                $total_price +=$price;
                $taxes_percent = \App\Helpers\Helper::Taxes();
                $taxes = $taxes_percent*$total_price;
                $shipping=  \App\Helpers\Helper::shipping();
                $percent_org= $shipping->percent_org *$total_price ;
                $percent_deliver=  $shipping->percent_delivery * $total_price ;
                $ship_cost=$percent_org+$percent_deliver;
            }
        }
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('backEnd.orders',compact('orders','price','total_price','ship_cost','taxes','photo','GeneralWebmasterSections','qyt'));
    }
    //all orders
    public function orders_details($id){

        $orders=  Order::with("user","orderDetails")->where("id",$id)->get();
        $total_price=0;
        foreach( $orders as $key=> $order) {
            $order_deils = \App\OrderDetails::where("order_id", $order->id)->get();
        }
        for ($i=0;$i<count($orders) ;++$i ){
            $order_deils = \App\OrderDetails::where("order_id", $orders[$i]->id)->get();
            $details [] =$order_deils;
        }
        foreach( $details as $key=> $detail) {
            foreach( $detail as $key=> $det) {
                $qyt= $det->qty;
                $product_deils=\App\product::where("id",$det->product_id)->first();
                if($product_deils == null){
                    $price=0;
                    $photo=null;
                }else{
                    $price= $product_deils->special_price ?
                        ($product_deils->special_price)*$qyt : ($product_deils->price)*$qyt;
                    $photo =$product_deils->photo;
                }
                $total_price +=$price;
                $taxes_percent = \App\Helpers\Helper::Taxes();
                $taxes = $taxes_percent*$total_price;
                $shipping=  \App\Helpers\Helper::shipping();
                $percent_org= $shipping->percent_org *$total_price ;
                $percent_deliver=  $shipping->percent_delivery * $total_price ;
                $ship_cost=$percent_org+$percent_deliver;
            }
        }
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('backEnd.orders_details',compact('orders','price','total_price','ship_cost','taxes','photo','GeneralWebmasterSections','qyt'));
    }

    
    
  //create  products
    public function create_products(){
        $setting_filter = setting_filter::find(1);
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('backEnd.products.create_products',compact('GeneralWebmasterSections','setting_filter'));
    }

 /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param  int $webmasterId
     * @return   store_categories
     */
   
    public function store_products(Request $request){
        
      
        $validator = \Validator::make($request->all(), [
                'name_heb' => 'required|unique:products',
                'name_en' => 'required|unique:products',
                'photo' => 'required',
          'date_end_price' => 'date|date_format:Y-m-d|after:today',
                    'spcialprice' => 'required|numeric|min:price',

        ]);

        if($validator->fails()) {
                            // dd($request->all(),$validator);
                    return Redirect::back()->withErrors($validator);
            }


        $formFileName = "photo";
        $fileFinalName = "";
        $products= new product;
        if ($request->$formFileName != "") {
            $fileFinalName = time() .rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
            $products->photo= $fileFinalName;
        }
//dd($request->all());
        $products->category_id= $request->section_id ;
        $products->subcategory_id= $request->subcate_id ;
        $products->name_heb= $request->name_heb;
        $products->details_il= $request->details_il;
        $products->details_en= $request->details_en;
        $products->brand_id= $request->type_id;
        $products->name_en= $request->name_en;
        $products->status= $request->status;
        $products->icon= $request->icon;
        $products->style_id= $request->style_id;
//        $products->special_price= $request->spcialprice;
//        $products->date_end_price= $request->date_end_price;
        $products->type_men= $request->type_men;
        $products->seller= $request->seller;
        $products->natural= $request->natural;
        $products->save();

        $size_id=[];
        $stand_id=[];
        foreach (@$request->size_id as  $size_id) {
            $size = new Size;
            $size->size_id = $size_id;
            $size->product_id = $products->id;
            $size->save();
            $size_id=[$size->id];
        }
        foreach (@$request->standard_gold as  $standard_gold){
            $standardGold= new StandardGold;
             $standardGold->standard_gold_id= $standard_gold;
             $standardGold->product_id= $products->id ;
             $standardGold->save();
            $stand_id=[$standardGold->id];

        }

        foreach (@$request->price as $index=> $pric) {
            $price = new Price;
            $price->price = $pric;
            $price->product_id = $products->id;
            $price->standard_id = $request->standard_gold[$index];
            $price->size_id = $request->size_id[$index];
            $price->date_end_price = $request->date_end_price[$index];
            $price->special_price = $request->spcialprice[$index];
            $price->save();

        }

        return redirect()->route('products')->with('message',  trans("backLang.addDone"));
    }

    //edit products
    public function edit_products($id){
        $products=  product::with("standardgold","prices","size","images")->find($id);
//         dd($products);
        $setting_filter = setting_filter::find(1);

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        return view('backEnd.products.edit_products',compact('products','GeneralWebmasterSections','setting_filter'));

    }
    
    
    //edit store_categories
    public function store_products_edit(Request $request,$id){
//
      $validator = \Validator::make($request->all(), [
                     'date_end_price' => 'date|date_format:Y-m-d|after:today',
        ]);
      if($request->spcialprice){
          if($request->price < $request->spcialprice){
              $validator = \Validator::make($request->all(), [
                  'spcialprice' => 'required|numeric|min:price',
              ]);

          }
      }
        if($validator->fails()) {
                    return Redirect::back()->withErrors($validator);
            }
        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            $fileFinalName = time() .rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
        }
        $products=product::find($id);
        if($request->photo){
         $products->photo= $fileFinalName;
        }
        $products->category_id= $request->section_id ;
        $products->subcategory_id= $request->subcate_id ;
        $products->name_heb= $request->name_heb;
        $products->brand_id= $request->type_id;
        $products->name_en= $request->name_en;
        $products->details_il= $request->details_il;
        $products->details_en= $request->details_en;
        $products->status= $request->status;
        $products->icon= $request->icon;
//        $products->price= $request->price;
//        $products->size_id= $request->size_id;
        $products->style_id= $request->style_id;
//        $products->standard_gold= $request->standard_gold;
//        $products->special_price= $request->spcialprice;
//        $products->date_end_price= $request->date_end_price;
        $products->type_men= $request->type_men;
        $products->seller= $request->seller;
        $products->natural= $request->natural;
        $products->save();
//        dd($request->all());

        foreach (@$request->price as $inde=> $pric) {

            $check_price = Price::where("price",$pric)->where("product_id",$id)->first();

            if($check_price != null){
                $price=Price::find($check_price->id);
                $price->price = $pric;
                $price->product_id = $id;
                $price->standard_id = $request->standard_gold[$inde];
                $price->size_id = $request->size_id[$inde];
                $price->date_end_price = $request->date_end_price[$inde];
                $price->special_price = $request->spcialprice[$inde];

                $price->save();

            }else{
                $price = new Price;
                $price->price = $pric;
                $price->product_id = $id;
                $price->standard_id = $request->standard_gold[$inde];
                $price->size_id = $request->size_id[$inde];
                $price->date_end_price = $request->date_end_price[$inde];
                $price->special_price = $request->spcialprice[$inde];

                $price->save();
            }

        }

        foreach (@$request->size_id as $index=>  $size_id) {
            $check_size = Size::where("size_id",$size_id)->where("product_id",$id)->first();
            if($check_size != null){
                $size=Size::find($check_size->id);
                $size->size_id = $size_id;
                $size->product_id = $id;
                $size->save();
            }else{
                $size = new Size;
                $size->size_id = $size_id;
                $size->product_id = $id;
                $size->save();
            }
        }
        foreach (@$request->standard_gold as $index=>  $standard_gold){

            $check_standard_gold = StandardGold::where("standard_gold_id",$standard_gold)->where("product_id",$id)->first();
            if($check_standard_gold != null){

                $standardGold=StandardGold::find($check_standard_gold->id);
                $standardGold->standard_gold_id = $standard_gold;
                $standardGold->product_id = $id;
                $standardGold->save();
            }else{
                $standardGold= new StandardGold;
                $standardGold->standard_gold_id= $standard_gold;
                $standardGold->product_id= $id ;
                $standardGold->save();

            }
        }



        return redirect()->route('products')->with('message',  trans("backLang.saveDone"));
    }



/*
   *
   *delete_products
   *
   *
   */
    public function delete_products($id){
        $category=  product::find($id);
        $category->delete();
        return redirect()->route('products')->with('message',  trans("backLang.deleteDone"));
    }
    
    
   /*
   *
   *delete_product_images
   *
   *
   */
     public function delete_product_images($id){
        $category=  Photo::find($id);
        $category->delete();
        return redirect()->back()->with('message',  trans("backLang.deleteDone"));
    }

    
    
    
    

    public function photos(Request $request, $id){

        $next_nor_no = Photo::where('product_id', '=', $id)->max('row_no');
        if ($next_nor_no < 1) {
            $next_nor_no = 1;
        } else {
            $next_nor_no++;
        }

        // Start of Upload Files
        $formFileName = "file";
        $fileFinalName = "";
        $fileFinalTitle = ""; // Original file name without extension
        if ($request->$formFileName != "") {
            $fileFinalTitle = basename($request->file($formFileName)->getClientOriginalName(),
                '.' . $request->file($formFileName)->getClientOriginalExtension());
            $fileFinalName = time() . rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
        }
        // End of Upload Files
        if ($fileFinalName != "") {
            $Photo = new Photo;
            $Photo->row_no = $next_nor_no;
            $Photo->file = $fileFinalName;
            $Photo->title = $fileFinalTitle;
            $Photo->product_id = $id;
            $Photo->created_by = Auth::user()->id;
            $Photo->save();

            return response()->json('success', 200);
        } else {
            return response()->json('error', 400);
        }

    }


}
