<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}
