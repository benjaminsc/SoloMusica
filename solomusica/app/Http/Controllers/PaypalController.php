<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\Publication;
use App\Payments;
use Redirect;
use App\User;

class PaypalController extends BaseController
{
	private $_api_context;
	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = \Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}
	public function postPayment()
	{

		$id=Session::get('id_publication');
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
		$items = array();
		$publication=Publication::find($id);
		$subtotal = 0; //luego asigno sus valores al pago de paypal
		// dd($publication);

		$name=$publication['name'];
		$extract=$publication['description'];
		$quantity=1;
		$price=3.02;
    $currency = 'USD';
		/*if (($quantity*$price)*0.02>20000) { //maximo cobro por publication
			$quantity=1;
			$price=20000;
		}else {
			$quantity=1;
			$price=($quantity*$price)*0.02;
		}
*/
			$item = new Item();
			$item->setName($name)
			->setCurrency($currency)
			->setDescription($extract)
			->setQuantity($quantity)
			->setPrice($price);

			$items[] = $item;

		$subtotal = $quantity * $price;


		$item_list = new ItemList();
		$item_list->setItems($items);
		$details = new Details();
		$details->setSubtotal($subtotal)
		->setShipping(0);
		$total = $subtotal+0;



		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total)
			->setDetails($details);
		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription('Pago de publicación priviligiada');
		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));
		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));
		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				Session::forget('id_publication');
				die('Ups! Algo salió mal');
			}
		}
		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}
		// add payment ID to session
		\Session::put('paypal_payment_id', $payment->getId());
		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}
		Session::forget('id_publication');
		return \Redirect::route('micuentaR')
			->with('error', 'Ups! Error desconocido.');
	}
	public function getPaymentStatus() //obtenemos la respuesta de paypal
	{
		// Get the payment ID before session clear
		$payment_id = Session::get('paypal_payment_id');
		// clear the session payment ID
		Session::forget('paypal_payment_id');
		$payerId = Input::get('PayerID');
		$token = Input::get('token');
		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token)) {
			Session::forget('id_publication');
			return \Redirect::route('micuentaR')
				->with('message', 'Hubo un problema al intentar pagar con PayPal');
		}
		$payment = Payment::get($payment_id, $this->_api_context);
		// PaymentExecution object includes information necessary
		// to execute a PayPal account payment.
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(\Input::get('PayerID'));
		//Execute the payment
		if (Session::has('id_publication'))
{
	// dd(Session::get('id_publication'));
    $result = $payment->execute($execution, $this->_api_context);

}else {
	return "Debe iniciar sesión";
}

		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later
		if ($result->getState() == 'approved') { // payment made
			// Registrar el pedido --- ok
			// Registrar el Detalle del pedido  --- ok
			// Eliminar carrito
			// Enviar correo a user
			// Enviar correo a admin
			// Redireccionar
			// $this->saveOrder(\Session::get('cart'));
			// \Session::forget('cart');
			$publication = Publication::find(Session::get('id_publication'));//obtenemos la publicacion que se esta pagando
			$publication->type ="premium"; //modificamos el tipo de la publicacion
			$pay = new Payments();//crear pago para registrarlo en BD
			$pay->user_id= \Auth::User()->id;
			$pay->publication_id=$publication->id;
			$pay->quantity=1;
			$pay->price=3.02;
			$pay->through="PayPal";
			$pay->total=3.02;

			$pay->save();
			$publication->save();
			Session::forget('id_publication');
			return \Redirect::route('micuentaR')
				->with('message', 'Pago exitoso');
		}
		return \Redirect::route('micuentaR')
			->with('message', 'El pago fue cancelado');
	}
	public function micuentaR()
	{
			return View('user_count.user_count');
	}

	public function postPayment2(Request $request){

		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$items = array();
		$subtotal = 0;
		$currency = 'USD';
		$price = 20.59200;
		$quantity=1;

		$item = new Item();
		$item->setName('Cuenta Premium')
		->setCurrency($currency)
		->setDescription('Una tienda de publicaciones Premium ')
		->setQuantity($quantity)
		->setPrice($price);
		$items[] = $item;

		$subtotal = $quantity * $price;

		$item_list = new ItemList();
		$item_list->setItems($items);

		$details = new Details();
		$details->setSubtotal($subtotal)
		->setShipping(0);

		$total = $subtotal;

		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total)
			->setDetails($details);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription('Pago de cuenta priviligiada');

		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.status2'))
			->setCancelUrl(\URL::route('payment.status2'));

		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));

			try {
				$payment->create($this->_api_context);
			} catch (\PayPal\Exception\PPConnectionException $ex) {
				if (\Config::get('app.debug')) {
					echo "Exception: " . $ex->getMessage() . PHP_EOL;
					$err_data = json_decode($ex->getData(), true);
					exit;
				} else{
					die("ups! algo salio mal");
				}


	}

	foreach($payment->getLinks() as $link) {
		if($link->getRel() == 'approval_url') {
			$redirect_url = $link->getHref();
			break;
		}
	}

	// add payment ID to session
	\Session::put('paypal_payment_id', $payment->getId());
	if(isset($redirect_url)) {
		// redirect to paypal
		return \Redirect::away($redirect_url);
	}
	return Redirect::to('404')
		->with('error', 'Ups! Error desconocido.');
}

public function getPaymentStatus2() //obtenemos la respuesta de paypal
{
	// Get the payment ID before session clear
	$payment_id = Session::get('paypal_payment_id');

	// clear the session payment ID
	Session::forget('paypal_payment_id');

	$payerId = Input::get('PayerID');
	$token = Input::get('token');

	//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
	if (empty($payerId) || empty($token)) {
		Session::flush();
		return Redirect::to('404')
			->with('message', 'Hubo un problema al intentar pagar con PayPal');
	}
	$payment = Payment::get($payment_id, $this->_api_context);

	$execution = new PaymentExecution();
	$execution->setPayerId(\Input::get('PayerID'));

	$result = $payment->execute($execution, $this->_api_context);

	if ($result->getState() == 'approved') { // payment made
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

		return Redirect::to('ingresar') //cambiar ruta mi cuenta con sesion iniciada
			->with('message', 'Registro realizado de forma correcta');
			\Session::flush();
	}
	return Redirect::to('404')
		->with('message', 'El registro fue cancelado');
}




}

 ?>
