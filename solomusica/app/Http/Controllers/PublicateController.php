<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Region;
use App\Sector;
use App\Image;
use App\Publication;
use Illuminate\Support\Facades\Input;
use Storage;
use File;
use Carbon\Carbon ;
use Auth;
use Sesion;
use Redirect;

class PublicateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $regions = Region::all();
        $sectors = Sector::all();

      //  return view('publicate.publicate')->with(array('categories'=>$categories));
      if (Auth::user()!=null) {
      return view('publicate.publicate')->with(array('categories' => $categories,
       'regions' => $regions, 'sectors' => $sectors));
     }else{
      return view('login.login');
     }
    }

    public function getSectors(Request $request, $id){
      if($request->ajax()){
        $sectors = Sector::sectors($id);
        return response()->json($sectors);
      }

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
				try {
					$date =  Carbon::now();
					$fecha=Carbon::now();
					$end_date=$date->addDays(30);
					$publication = new Publication();

	        $publication->name = $request->Input('name');
					// $publication->name = "de prueba 1";
	        $publication->quantity = $request->Input('quantity');
	        $publication->price = $request->Input('price');
	        $publication->type = "gratis";
	        $publication->start_date = $fecha;
	        $publication->end_date = $end_date;
	        $publication->description = $request->Input('description');
	        $publication->user_id = Auth::User()->id;//desde la sesion
	        $publication->category_id = $request->Input('category');
	        $publication->sector_id = $request->Input('sector');
	        $publication->save();



	        if (Input::hasFile('images')) {

	            $files = Input::file('images');

	              foreach ($files as  $file) {

	                $image = new Image();
	                $carbon =  Carbon::now();

	                $url= $carbon->minute.'_'.$carbon->second.$file->getClientOriginalName();
	                Storage::disk('local')->put($url, File::get($file));
	                $image->images_route=$url;
	                $image->publication_id=$publication->id;

	                $image->save();




	            }


	        }
				return Redirect::to('micuenta')->with('message', 'Su artículo fue publicado con éxito');
				} catch (Exception $e) {
				return Redirect::to('publicar')->with('message', 'Lo sentimos ha ocurriodo un error inesperado, intente más tarde');
				}


/*$images->move('images/', $images->getClientOriginalName());
$url='images/'.$file->getClientOriginalName();

$image= new Image();
$image->images_route=$url;
$image->publication_id=$publication->id;
$image->save();*/







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
