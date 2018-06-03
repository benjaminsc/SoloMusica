<?php
// Diego CC
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;
use Session;
use Redirect;
class ForgotPasswordController extends Controller
{

	public function getForgotPassword() //mostrar vista de enviar link a email
	{
		return View('resetPass.resetPassword');
	}
	public function postForgotPassword(Request $request )// enviar link al email
	{
		if (User::where('email', $request->email)->first() !=null){

			Mail::send('emails.contact',$request->all(),function($msj) use ($request){ //uso de la clase mail de Laravel
				$msj->Subject('Correo de contacto');
				$msj->to($request->email);
				});
				Session::flash('message','link enviado correctamente');
		  	return View('login.login');

		}else {

				Session::flash('message','La cuenta no existe');
				return View('login.login');
		}



	}



	public function changePassword(Request $request) //redirige a la vista para cambiar las contraseñas con el email encriptado
	{
		$email=$request->email;
		// return view('resetPass.changePass');
		return view('resetPass.changePass',compact('email'));
	}
	public function changePass(Request $request)// actualizar contraseña y redirige a login para iniciar Session
	{
		$email=decrypt($request->email); //este metodo que trae Laravel decencripta el email del usuario

		$user=User::where('email','=', $email)->first();
		// dd($request->password);
		$user->password= bcrypt($request->password);
		$user->save();
		return View('login.login');
	}

	public function Contacto()
	{
		return View('contacto.contacto');
	}
	public function mailContacto(Request $request)
	{

		$email=$request->email;
		$descripcion=$request->descripcion;


		Mail::send('emails.contact',$request->all(),function($msj) use ($request){ //uso de la clase mail de Laravel
			$msj->Subject($description);
			$msj->to('cisterna.diegohernan@gmail.com');
			});



		Session::flash('message','Información enviada');
		return View('contacto.contacto');

	}


}
