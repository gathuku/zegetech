<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\User;
use Validator;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request){
       //validate Request
       $rules=[
         'name' => 'required',
         'email' => 'required'
       ];

       $validator=Validator::make($request->all(),$rules);

       if ($validator->fails()) {
         return $validator->messages();
       }else{
        // Attempt Auth
            $auth= Auth::attempt(['email'=>$request['email'],'password'=>$request['password']]);
            if ($auth) {
              return 'Authenticated';
            }else{
              return ['error'=>'Credentials Dont match', 'code'=>'401'];
            }

       }
    //  return $request;
    }

    public function register(Request $request)
    {
      //validate
      $validator=Validator::make($request->all(),[
        'name'=>'required|max:255',
        'email' =>'required|unique:users|string',
        'phone' => 'required',
        'password'=>'required|string|confirmed'
      ]);

      if ($validator->fails()) {
        return $validator->messages();
      }else {
        //Create user
        User::create([
          'name'=>$request->name,
          'email' =>$request->email,
          'phone'=>$request->phone,
          'password'=>bcrypt($request->password),
          'api_token' =>str_random(60),
        ]);

        return 'User Created';
      }
    }
}
