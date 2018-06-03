<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Image;
use App\Publication;
use App\Comment;
use Carbon\Carbon ;
use App\User;
use Redirect;

class ProductController extends Controller
{



	public function showShared(Request $request){

		$id=$request->id;
		if ($id==null) {
			return View('errors.404');
		}
		//ver si existe el producto
		$response = Image::validateShared($id);

		if ($response==false) {
			return View('errors.404');
		}

		                 //id del articulo compartido
		$images = Image::Shared($id);
		$modal_img=Image::images_all($id);
		// dd($modal_img);
		if ($images!=null) {

			return View('shared.index',compact("images","modal_img"));
			// ->with('images', $images)->with('modal_img', $modal_img);
				// return view('index.index')->with('images',$images);
		} else {
				return view('index.index')->with('msg','Este producto ya no esta disponible');
		}


	}



}
