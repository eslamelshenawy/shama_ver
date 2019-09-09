<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends BaseController
{

    public $successStatus = 200;
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'address'=>'sometimes|nullable|string',
            'phone'=>'sometimes|nullable|unique:users',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        $success['email'] =  $user->email;
        $success['phone'] =  $user->phone;


        return $this->sendResponse($success, 'User register successfully.');
    }


    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            $success['name'] =  $user->name;
            $success['email'] =  $user->email;
            $success['phone'] =  $user->phone;

            return $this->sendResponse($success, 'User login successfully.');

        } else{
            return $this->sendError('Validation Error.',"Wrong email/password combination.'" );

        }

    }



}
