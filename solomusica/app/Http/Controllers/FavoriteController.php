<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorite;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

		
    public function index()
    {
        //
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
      if ($request->ajax()) {
            $favorite = new Favorite();
            $favorite->user_id = $request->iduser;
            $favorite->publication_id = $request->idpub;
            $favorite->save();

         }
    }
    public function favoritos2(Request $request, $idpub, $iduser){
      if ($request->ajax()) {
      $favorite = Favorite::favoritos2($idpub, $iduser);
        return response()->json($favorite);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $favorites=Favorite::favorites_all(\Auth::User()->id);
			return view('user_count.favorites',compact('favorites'));

    }
	/*	public function sales_all()
		{
		$imag = Image::all_sales( Auth::user()->id);
		return view('user_count.sales',compact('imag'));


		}*/
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
    public function destroy(Request $request)
    {
      Favorite::destroy($request->id);
    }
}
