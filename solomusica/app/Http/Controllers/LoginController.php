<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Sesion;
use Redirect;
use Cookie;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.login');
    }
		public function home()
		{
			// return View('user_count.user_count');
		}
		public function logout()
		{
			 Auth::logout();
			 return Redirect::to('home')->with('msg', 'Gracias por visitarnos!.');
		}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $email = $request->input('email');
      $password = $request->input('password');

      if (Auth::attempt(['email' => $email, 'password' => $password])) {

            return Redirect::to('home');

        }else{
          return Redirect::to('ingresar')->with('message', 'Datos inválidos');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
