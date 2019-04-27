<?php

namespace App\Http\Controllers\WEB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;

class TopupController extends Controller
{
    public function index()
    {
      return view('topup');
    }

    public function topUp(Request $request)
    {
      //dd(auth()->user()->api_token);
      $request=Request::create('/api/v1/transactions/topup','POST',[
        'amount'=>$request->madeTo,

      ]);
      $request->headers->set('Authorization','Bearer '.auth()->user()->api_token);

      $response=app()->handle($request);
      dd($response->getOriginalContent());
    }
}
