<?php

namespace App\Http\Controllers\WEB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{

  public function index()
  {
    return view('auth.login');
  }
  public function submitLogin(Request $request)
  {
    $request = Request::create('/api/v1/login', 'POST',['name'=>Input::get('email'),'password'=>Input::get('password')]);

    $response = Route::dispatch($request);
      dd($response->getOriginalContent());
  }

}
