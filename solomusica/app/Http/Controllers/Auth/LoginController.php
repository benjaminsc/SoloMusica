<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

		//inicio con facebook
		/**
		* Redirect the user to the GitHub authentication page.
		*
		* @return Response
		*/
	 public function redirectToProvider()
	 {
			 return Socialite::driver('facebook')->redirect();
			 /*return Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
        ])->scopes([
            'email', 'user_birthday'
        ])->redirect();*/
	 }

	 /**
		* Obtain the user information from GitHub.
		*
		* @return Response
		*/
	 public function handleProviderCallback(Request $request)
	 {
			 $user = Socialite::driver('facebook')->user();
/*			 dd($user);*/
			 if($user->email ==null){
				//  mensaje de error
				Session::flash('message','Problemas al iniciar sesion');
				return View('login.login');

			 }elseif (User::where('email', $user->email)->first() !=null) {
				 			//iniciar sesion
							$User= User::where('email',$user->email)->first();
	            return $this->authAndRedirect($User); // Login y redirección

	         }else{
						 $newUser= new User();
						 $newUser->name= $user->name;
						 $newUser->email=$user->email;
						 $newUser->password=bcrypt($user->email);
						 $newUser->save();

						 return $this->authAndRedirect($newUser); // Login y redirección

	         }
			// return $user->email;
	 }

    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);

       return Redirect::to('home');
    }

}
