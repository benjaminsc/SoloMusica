<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\Region;
use App\Image;
use App\Sale;
use App\Comment;
use App\User;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsercountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $publications = Publication::all();
			if (Auth::user()!=null) {
				  return view('user_count.user_count');
			}else{
				return view('login.login');
			}


    }

    public function publication_all(){
      //LISTAMOS UNA IMAGEN POR CADA PUBLICACION
      $regions = Region::all();
      $images = Image::all_images( Auth::user()->id);

      return view('user_count.user_publications')->with(array('images' => $images
      , 'regions' => $regions));
    }
		public function sales_all()
		{
		$imag = Image::all_sales( Auth::user()->id);
		return view('user_count.sales',compact('imag'));


		}
		public function UPdate_estado($id)
		{
				$publication=Publication::find($id);
				$publication->state="inactivo";
				$publication->save();
		}
    public function updatesubir2($id)
		{
				$publication=Publication::find($id);
				$publication->type="premium";
				$publication->save();

        $user=User::find(Auth::user()->id);
        $user->pubAmount+=1;
        $user->save();
		}
		public function mark_sold(Request $request)
		{
			$publication= Publication::find($request->id);
			$publication->state="vendido";
			$publication->cantView=0;
			$publication->save();
			// return $publication;
		}
		public function mark_disponible(Request $request)
		{
			$publication= Publication::find($request->id);
			$publication->state="activo";
			$publication->save();
			// return $publication;
		}

		public function postPayment($id)
		{
			$publication = new Publication();
			$publication->find($id);

			Session::put('id_publication',$publication->id);//ingresamos id de la publicación a a Sessión

      return response()->json($publication);
		}
		public function getImage(Request $request){
			$id=$request->id_img;
			$img1=Image::where('publication_id',$id)->first();
			return response()->json($img1);
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
        return response()->json($request);
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
        $publication = Publication::find($id);
				return response()->json($publication);
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

      if ($request->ajax()) {
             $publication = Publication::find($id);
             $publication->category_id = $request->category;
             $publication->sector_id = $request->sector;
             $publication->name = $request->title;
             $publication->price = $request->price;
             $publication->quantity = $request->quantity;
             $publication->description = $request->description;
             $publication->save();
           }

     }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


      Publication::destroy($id);
      return response()->json(['mensaje' => 'borrado']);

    }
		public function questions_all(Request $request)
		{
			$questions=Comment::questions_all($request->id);
			return response($questions);
		}
		public function response_all(Request $request)
		{
			$response=Comment::response_all($request->id);
			return response()->json($response);
		}

		public function to_response(Request $request)
		{
			$Comment=Comment::find($request->id);
			$Comment->response=$request->resp;
			$Comment->save();
		}
		public function delete_comment(Request $request)
		{
			$Comment=Comment::find($request->id);
			$Comment->delete();
		}
		public function user_resumen()
		{
			$id=Auth::user()->id;   //consultas para crear grafico tipo Donut
			$p_a=count(DB::table('publications')->where('publications.user_id',$id)->where('publications.type','premium')->where('publications.state','activo')->get());
			$p_v=count(DB::table('publications')->where('publications.user_id',$id)->where('publications.type','premium')->where('publications.state','vendido')->get());
			$g_a=count(DB::table('publications')->where('publications.user_id',$id)->where('publications.type','gratis')->where('publications.state','activo')->get());
			$g_v=count(DB::table('publications')->where('publications.user_id',$id)->where('publications.type','gratis')->where('publications.state','vendido')->get());
			$pub_gratis=count(DB::table('publications')->where('publications.user_id',$id)->where('publications.type','gratis')->get());
			$pub_premium=count(DB::table('publications')->where('publications.user_id',$id)->where('publications.type','premium')->get());

			$cp=$p_a+$p_v;   //total de publicaciones
			$cg=$g_a+$g_v;
			if ($cp !=0 ) {
				$pre_activas=round( (($p_a*100)/$cp), 2, PHP_ROUND_HALF_UP); //conversion a porcentaje
				$pre_vendidas=round( (($p_v*100)/$cp), 2, PHP_ROUND_HALF_UP);
			}else {
				$pre_activas=0; //conversion a porcentaje
				$pre_vendidas=0;
			}
			if ($cg != 0) {
				$gra_activas=round( (($g_a*100)/$cg), 2, PHP_ROUND_HALF_UP);
				$gra_vendidas=round( (($g_v*100)/$cg), 2, PHP_ROUND_HALF_UP);
			} else {
				$gra_activas=0;
				$gra_vendidas=0;
			}



			return view('user_count.resumen',compact('pre_activas','pre_vendidas','gra_activas','gra_vendidas'));


		}

}
