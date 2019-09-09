<?php

namespace App\Http\Controllers;

use App\setting_filter;
use App\WebmasterSection;
use Auth;
use File;
use Helper;
use Illuminate\Http\Request;
use Redirect;
use App\category;
use App\subcategory;
use App\product;
use App\PromoCode;

class BackendController extends Controller
{
    //
    
    
       public function store(Request $request){
        // dd($request->all());
        $validator = \Validator::make($request->all(), [
           'statdate' => 'date|date_format:Y-m-d|after:today',
           'enddate' => 'date|date_format:Y-m-d|after:statdate',
        //   'code' => 'required|unique:promo_codes',
        ]);
        if($validator->fails()) {
                    return Redirect::back()->withErrors($validator);
            }
        $promo_code= new PromoCode;
        $promo_code->category_id= $request->section_id ;
        $promo_code->subcategory_id= $request->subcate_id ;
        $promo_code->product_id= $request->product_id ;
        $promo_code->code= str_random(6) ;
        $promo_code->details= $request->details ;
        $promo_code->amount= $request->amount ;
        $promo_code->start_date= $request->statdate ;
        $promo_code->end_date= $request->enddate ;
        $promo_code->status= $request->status ;
        $promo_code->save();
        return redirect()->route('promo.code',$promo_code->id)->with('message',  trans("backLang.saveDone"));
        
        }
        
        
    public function update(Request $request,$id){
            
        }
    
}
