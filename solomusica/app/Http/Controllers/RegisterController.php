<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;



class RegisterController extends Controller
{
  public function sesionData(Request $request)
  {

		Session::put('name',$request->name);
		Session::put('lastname',$request->lastname);
		Session::put('email',$request->email);
		Session::put('phone',$request->phone);
		Session::put('password',$request->password);
		return "success";
  }
}
