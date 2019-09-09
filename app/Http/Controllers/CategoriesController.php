<?php

namespace App\Http\Controllers;

use App\Photo;
use App\WebmasterSection;
use App\category;
use App\subcategory;
use App\product;
use Auth;
use File;
use Helper;
use Illuminate\Http\Request;
use Redirect;

class CategoriesController extends Controller
{

    private $uploadPath = "uploads/topics/";

    public function __construct()
    {
        $this->middleware('auth');

    }


    public function getUploadPath()
    {
        return $this->uploadPath;
    }
    
     /*
     * 
     * 
     * all category
     */
    public function index(){
        $category=  category::orderBy('id','desc')->paginate(10);

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        return view('backEnd.categories.categories',compact('category','GeneralWebmasterSections'));

    }

 /*
     * 
     * 
     * create category
     */   
     
     public function categories(){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        return view('backEnd.categories.create_gategory',compact('GeneralWebmasterSections'));

    }

    
    
     /*
     * 
     * 
     * edit category
     */   
    public function categories_edit($id){
        $category=  category::find($id);
        $GeneralWebmasterSections = WebmasterSection::orderby('row_no', 'asc')->get();

        return view('backEnd.categories.edit_gategory',compact('category','GeneralWebmasterSections'));

    }



    //edit store_categories_edit
    public function update_categories(Request $request,$id){
        // dd($request->all());
        $category=  category::find($id);
        $category->name_heb= $request->name_heb;
        $category->name_en= $request->name_en;
        $category->type_id= $request->section_id;
        $category->status= $request->status;
        $category->icon= $request->icon;

        if($request->photo == null){

        }
        else{
            $formFileName = "photo";
            $fileFinalName = "";
            if ($request->$formFileName != "") {
                $fileFinalName = time() . rand(1111,
                        9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
                $path = $this->getUploadPath();
                $request->file($formFileName)->move($path, $fileFinalName);
            }

            $category->photo= $fileFinalName;

        }
        $category->save();
        return redirect()->route('categories')->with('message',  trans("backLang.saveDone"));

    }


    //create store_categories
    public function store_categories(Request $request){
        $validator = \Validator::make($request->all(), [
                'name_heb' => 'required|unique:categories',
                'name_en' => 'required|unique:categories',
                'photo' => 'required',
                'section_id' => 'required',
        ],[
                'section_id.required' => 'Section is required'

            ]);
        
        if($validator->fails()) {
               return Redirect::back()->withErrors($validator);
            }

        $category= new category;
        $category->name_heb= $request->name_heb;
        $category->name_en= $request->name_en;
        $category->status= $request->status;
        $category->icon= $request->icon;
        $category->type_id= $request->section_id;

        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            $fileFinalName = time() . rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
        }

        $category->photo= $fileFinalName;
        $category->save();
        return redirect()->route('categories')->with('message',  trans("backLang.addDone"));

    }


    //delete_categories
    public function delete_categories($id){
        $category=  category::find($id);
        $category->delete();
        return redirect()->route('categories')->with('message',  trans("backLang.deleteDone"));


    }
    
     /*
     * 
     * 
     * get category after select section 
     */   
    public function select_cate($id=""){
        
       
        if(\App::getLocale()  == 'en'){
             	$category = category::where('type_id',$id)->pluck("name_en","id")->all();
        }else{
        	$category = category::where('type_id',$id)->pluck("name_heb","id")->all();
        }
        
       
    		$data = view('backEnd.ajax_select',compact('category'))->render();
    
    		return response()->json(['options'=>$data]);

    }
    
    
    /*
     * 
     * 
     * get sub category after select section 
     */   
    public function select_subcate($id=""){
        
       
        if(\App::getLocale()  == 'en'){
             	$subcategory = subcategory::where('category_id',$id)->pluck("name_en","id")->all();
        }else{
        	$subcategory = subcategory::where('category_id',$id)->pluck("name_heb","id")->all();
        }
        
        
    		$data = view('backEnd.ajax_subselect',compact('subcategory'))->render();
    
    		return response()->json(['options'=>$data]);

    }
    
     /*
     * 
     * 
     * get sub category after select product 
     */   
    public function select_product($id=""){
        
       
        if(\App::getLocale()  == 'en'){
             	$product = product::where('subcategory_id',$id)->pluck("name_en","id")->all();
        }else{
        	$product = product::where('subcategory_id',$id)->pluck("name_heb","id")->all();
        }
        
        
    		$data = view('backEnd.ajax_productselect',compact('product'))->render();
    
    		return response()->json(['options'=>$data]);

    }

}
