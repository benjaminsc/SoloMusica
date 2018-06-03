<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Publication;
use App\Comment;
use Carbon\Carbon ;
use App\User;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $images = Image::all_premium();
      return view('index.index')->with('images',$images);

    }
/*public function show_footer()
{
	return view('index.foot');
}*/
    public function images_all(Request $request, $id){
      if ($request->ajax()) {
        $images = Image::images_all($id);

        return response()->json($images);
      }
    }
    public function data_home(Request $request, $id){
      if ($request->ajax()) {
        $publication = Publication::data_home($id);
        return response()->json($publication);
      }
    }

    public function data_nav2(Request $request, $id){
      if ($request->ajax()) {
        $publication = Publication::data_nav2($id);
        return response()->json($publication);
      }
    }

    public function comments(Request $request, $id){

      if ($request->ajax()) {
      $comment = Comment::comments($id);
        return response()->json($comment);
      }
    }

    public function about(Request $request, $id){

      if ($request->ajax()) {
      $user = User::about($id);
        return response()->json($user);
      }
    }
    public function image_piano(Request $request){

      if ($request->ajax()) {
      $images = Image::image_piano();
        return response()->json($images);
      }
    }
    public function image_guitarra(Request $request){

      if ($request->ajax()) {
      $images = Image::image_guitarra();
        return response()->json($images);
      }
    }
    public function image_bajo(Request $request){

      if ($request->ajax()) {
      $images = Image::image_bajo();
        return response()->json($images);
      }
    }
    public function image_bateria(Request $request){

      if ($request->ajax()) {
      $images = Image::image_bateria();
        return response()->json($images);
      }
    }
		public function image_accesorios(Request $request){

      if ($request->ajax()) {
      $images = Image::image_accesorios();
        return response()->json($images);
      }
    }
    public function search(Request $request){

      if ($request->ajax()) {
      $publication = Publication::search($request->q);
      $datos = array();
      foreach ($publication as $value) {
        $datos[] = $value->name;

      }
      return response()->json($datos);

      }
    }
    public function search_article(Request $request, $name){

      if ($request->ajax()) {
      $image = Image::search_article($name);
        return response()->json($image);
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
			 $date =  Carbon::now();

           if ($request->ajax()) {
                 $comment = new Comment();
                 $comment->question = $request->question;
                 $comment->user_id = $request->idusuario;
								 $comment->date= $date;
                 $comment->publication_id = $request->idpublicacion;
                 $comment->save();

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
