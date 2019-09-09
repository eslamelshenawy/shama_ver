<?php

namespace App\Http\Controllers;

use App\BestDiamond;
use App\User;
use App\WebmasterSection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\Auth;

class Log extends Controller
{
    //

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register_veiw(Request $request)
    {
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

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view("frontEnd.reg",compact("GeneralWebmasterSections","c"));

    }
/**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login_veiw(Request $request)
    {
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

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view("frontEnd.login",compact("GeneralWebmasterSections","c"));

    }


    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // dd($request->all());
        $messages = [
            'email.required' => 'We need to know your e-mail address!',
            'password.required' => 'We need to know your password',
        ];
        $validator = Validator::make($request->all(), [
            'password' => 'min:3|required',
            'email'=>'required|email|string|exists:users,email',

        ],$messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $email = \request('email');
        $password = \request('password');
        if(\Auth::guard('web')->attempt(array('email'=> $email, 'password' => $password)))
        {
            $user = User::where('email',$email)->where("staus_dashboard",0)->first();

        //   dd($user);
            if (empty($user))
            {
                return redirect()->back()->with('warning',trans('admin.Login failed please try again'));
            }
            else
            {
                if (\Session::has('CurrentUrl'))
                {
                    return redirect((\Session::get('CurrentUrl')));
                }
                else
                {
                    return redirect("home");
                }
            }
        }
//        return redirect()->back()->with('message', 'You have successfully registered !');



    }
/**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'phone'=>'sometimes|nullable|unique:users',
            'user_name' => 'required|min:3|max:50',
            'password' => 'required|confirmed|min:6',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $input = $request->all();
        $user = new User();
        $user->name = $request->user_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->api_token = Str::random(60);
        $user->save();
        return redirect()->back()->with('message', 'You have successfully registered !');

    }

    public function logoutUsers(Request $request)
    {
        \Auth::guard('web')->logout();
        return redirect('/');
    }


}
