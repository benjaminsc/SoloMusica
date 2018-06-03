<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use Illuminate\Support\Facades\Input;
use BlenderDeluxe\Khipu\Khipu;
use Khipu\KhipuApiClient\lib\ApiClient;
use khipu\KhipuApiClient\lib\Configuration;
use khipu\KhipuApiClient\lib\Client\PaymentsApi;
use Session;


class KhipuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


      public function postPayment(Request $request){
			$id=$request->id;
			Session::put('id_publication',$id);
      $Khipu = new Khipu();
      $Khipu->authenticate(127810,'3b516afae90937b2eeed43c8d31eeda8f22b7eff');
      $khipu_service = $Khipu->loadService('CreatePaymentPage');

      $data = array(
        'subject' => 'Publicación Premium',
        'body' => 'Aumenta la posibilidad de exito de tus ventas',
        'amount' => 2000,
        // Página de exito
        'return_url' => 'http://localhost:8000/exito',
        // Página de fracaso
        'cancel_url' => 'http://localhost:8000/fracaso',
        'transaction_id' => 1,
        // Dejar por defecto un correo para recibir el comprobante
        'payer_email' => \Auth::User()->email,
        // url de la imagen del producto o servicio
        'picture_url' => 'https://static-pss-eu.gcdn.co/shop/media/items/c7/c7/c7c7ea349fe04222b617413c80c95ee4.png',
        // Opcional
        'custom' => 'Custom Variable',
        // definimos una url en donde se notificará del pago
        'notify_url' => '',
      );
      // Recorremos los datos y se lo asignamos al servicio.
      foreach ($data as $name => $value) {
        $khipu_service->setParameter($name, $value);
      }
      // Luego imprimimos el formulario html
    // echo  $khipu_service->renderForm();

    $data = $khipu_service->renderForm();

    return response($data);
    }



    public function postPayment2(Request $request){
      Session::put('name',$request->name);
      Session::put('lastname',$request->lastname);
      Session::put('email',$request->email);
      Session::put('phone',$request->phone);
      Session::put('password',$request->password);

    $Khipu = new Khipu();
    $Khipu->authenticate(127810,'3b516afae90937b2eeed43c8d31eeda8f22b7eff');
    $khipu_service = $Khipu->loadService('CreatePaymentPage');

    $data = array(
      'subject' => 'Cuenta Premium',
      'body' => 'Disfruta 12 publicaciones Premium!',
      'amount' => 13000,
      // Página de exito
      'return_url' => 'http://localhost:8000/exito2',
      // Página de fracaso
      'cancel_url' => 'http://localhost:8000/fracaso2',
      'transaction_id' => 1,
      // Dejar por defecto un correo para recibir el comprobante
      /* 'payer_email' => $request->nombre,*/
      // url de la imagen del producto o servicio
      'picture_url' => 'https://static-pss-eu.gcdn.co/shop/media/items/c7/c7/c7c7ea349fe04222b617413c80c95ee4.png',
      // Opcional
      'custom' => 'Custom Variable',
      // definimos una url en donde se notificará del pago
      'notify_url' => '',

    );
    // Recorremos los datos y se lo asignamos al servicio.
    foreach ($data as $name => $value) {
      $khipu_service->setParameter($name, $value);
    }
    // Luego imprimimos el formulario html
  // echo  $khipu_service->renderForm();

  $data = $khipu_service->renderForm();

  return response($data);
  }




}
