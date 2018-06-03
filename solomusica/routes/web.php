<?php
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Route::get('home', [ //es para el resultado de paypal
	'as' => 'home',
	'uses' => 'LoginController@home',
]);*/
/*Route::get('exito-paypal', function () {
    return view('exito');
});*/
Route::resource('publicar','PublicateController');
Route::get('sectors/{id}','PublicateController@getSectors');

Route::resource('registro','UserController');

Route::resource('ingresar','LoginController');
Route::get('logout','LoginController@logout');
// ruta limpiar paginador
Route::get('paginar1', function () {
	return View('index.paginar1');
});

Route::resource('micuenta','UsercountController');
Route::get('UPdate_estado/{id}','UsercountController@UPdate_estado');
Route::get('/getImage','UsercountController@getImage');
Route::get('user_publications', 'UsercountController@publication_all');//trae todas las imagenes de publicaciones del usuario
Route::get('user_resumen', 'UsercountController@user_resumen');
Route::get('user_sales', 'UsercountController@sales_all');
Route::get('user_mark_sold', 'UsercountController@mark_sold');
Route::get('user_mark_disponible', 'UsercountController@mark_disponible');
Route::get('show_favorites', 'FavoriteController@show');
Route::get('Delete_favorites', 'FavoriteController@destroy');
Route::get('questions_all', 'UsercountController@questions_all');
Route::get('response_all', 'UsercountController@response_all');
Route::get('to_response', 'UsercountController@to_response');
Route::get('delete_comment', 'UsercountController@delete_comment');
Route::get('micuentaR', [ //es para el resultado de paypal
	'as' => 'micuentaR',
	'uses' => 'PaypalController@micuentaR',
]);
Route::get('updatesubir2/{id}','UsercountController@updatesubir2');



Route::resource('home','IndexController');
Route::get('image/{id}','IndexController@Images_all');
Route::get('data_home/{id}','IndexController@data_home');//aqui si es qe no funciona nada
Route::get('data_nav2/{id}','IndexController@data_nav2');
Route::get('comments/{id}','IndexController@comments');
Route::get('about/{id}','IndexController@about'); //en el nav2 en la parte de "acerca del vendedor"
//-------------------------------CATEGORIAS
Route::get('image_piano','IndexController@image_piano'); //en el nav2 en la parte de "acerca del vendedor"
Route::get('image_guitarra','IndexController@image_guitarra');
Route::get('image_bateria','IndexController@image_bateria');
Route::get('image_bajo','IndexController@image_bajo');
Route::get('image_accesorios','IndexController@image_accesorios');

Route::get('search','IndexController@search');
Route::get('search_article/{name}','IndexController@search_article');
Route::resource('favoritos','FavoriteController');
Route::get('favoritos2/{idpub}/{iduser}','FavoriteController@favoritos2');


//rutas para pagar con paypal
Route::get('payment', array(   //configuramos los datos a enviar a paypal y le paso el id de la publicación
	'as' => 'payment',
	'uses' => 'PaypalController@postPayment',
));

Route::get('payment/status', array(  //recibimos lo que nos conteste paypal
	'as' => 'payment.status',
	'uses' => 'PaypalController@getPaymentStatus',
));
//rutas para pagar con paypal2
Route::get('payment2', array(   //configuramos los datos a enviar a paypal y le paso el id de la publicación
	'as' => 'payment2',
	'uses' => 'PaypalController@postPayment2',
));

Route::get('payment/status2', array(  //recibimos lo que nos conteste paypal
	'as' => 'payment.status2',
	'uses' => 'PaypalController@getPaymentStatus2',
));
Route::get('sesionData', array(  //recibimos lo que nos conteste paypal
	'as' => 'sesionData',
	'uses' => 'RegisterController@sesionData',
));
//rutas khipu
Route::get('/khipu', array(   //configuramos los datos a enviar a paypal y le paso el id de la publicación
	'as' => '/Khipu',
	'uses' => 'KhipuController@postPayment',
));
Route::get('/exito', function () {
	if (\Session::has('id_publication')) {
		$id= \Session::get('id_publication');

		$publication=App\Publication::find($id);
		$publication->type="premium";
		$pay = new App\Payments();//crear pago para registrarlo en BD
		$pay->user_id= \Auth::User()->id;
		$pay->publication_id=$publication->id;
		$pay->quantity=1;
		$pay->price=2000;
		$pay->through="Khipu";
		$pay->total=2000;
		$publication->save();
		$pay->save();
		}

		if (\Session::has('id_publication')) {
			\Session::put('message','Pago completado con éxito por medio de Khipu');
			\Session::forget('id_publication');
		}

		return View('user_count.user_count');
});
Route::get('/fracaso', function () {
		// $message="no se pudo realizar el pago";
		// \Session::forget('id_publication');
		if (\Session::has('id_publication')) {
			\Session::put('message','Pago no completado por medio de Khipu');
			\Session::forget('id_publication');
		}
		return View('user_count.user_count');
});




Route::get('khipu2', array(   //configuramos los datos a enviar a paypal y le paso el id de la publicación
	'as' => 'khipu2',
	'uses' => 'KhipuController@postPayment2',
));
Route::get('/exito2', function () {
	 $user = new User();
	$name= \Session::get('name');
	$lastname= \Session::get('lastname');
	$email = \Session::get('email');
	$phone = \Session::get('phone');
	$password = \Session::get('password');
	$userprofile_id="2";

	$user->name = $name;
	$user->lastname = $lastname;
	$user->email=$email;
	$user->password= bcrypt($password);
	$user->phone=$phone;
	$user->userprofile_id=$userprofile_id;
	$user->save();

		return Redirect::to('ingresar');
		\Session::flush();

});
Route::get('/fracaso2', function () {
		// $message="no se pudo realizar el pago";
		// \Session::forget('id_publication');
\Session::flush();
		return View('error2');
});

//rutas nuevas Diego******************************************************************************************************

//Mail enviar emails
Route::resource('mail','MailController');
Route::get('/resetP', function () {
		return View('PasswordReset.mail');
});
// rutas de contacto emails
/*Route::get('contacto', function () {
		return View('contacto.contacto');
});*/
/*Route::get('contacto', [
   'as'=>'contacto',
   'uses'=>'ForgotPasswordController@Contacto'
]);
Route::post('contactoEmail', [
   'as'=>'contactoEmail',
   'uses'=>'ForgotPasswordController@mailContacto'
]);*/

//recover Password
Route::get('Forgot-Password','ForgotPasswordController@getForgotPassword');//vista de cambiar contraseña
Route::post('postmail', [
   'as'=>'postmail',
   'uses'=>'ForgotPasswordController@postForgotPassword'
]);

Route::get('reset-pass/{email}',[
'as'=>'reset-pass',
'uses'=>'ForgotPasswordController@changePassword'
]);//ruta de vista resetear contraseña

// Route::post('resetPassword','ForgotPasswordController@changePass');//ruta de actualizar cntraseña en DB

Route::post('resetPassword', [
   'as'=>'resetPassword',
   'uses'=>'ForgotPasswordController@changePass'
]);

//iniciar con facebook
// Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook', [
   'as'=>'login/facebook',
   'uses'=>'Auth\LoginController@redirectToProvider'
]);
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('home/share/{id}', 'ProductController@showShared');
// Route::get('show_footer', 'IndexController@show_footer');
//fin rutas nuevas Diego*********************************************************************************************************
