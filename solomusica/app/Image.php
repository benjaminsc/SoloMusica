<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Publication;
use Auth;

class Image extends Model
{
  protected $table = "images";
  protected $fillable = ['images_route','publication_id'];

  public function publication(){
    return $this->belongsTo('App\Publication');
  }


	public static function images_all($id){//vista home id de la publicación, para mostrar imagenes en ventana moda
		$user1 = DB::table('users')->join('publications','users.id', '=', 'publications.user_id')
		    ->where('publications.id', '=', $id)
				->select('users.email' )->get();
		// aumentar contador de visitas
		foreach ($user1 as $usuario) {
			$user=$usuario->email;
		}
				if (Auth::user()==null) {
					$publication = Publication::find($id);
					$publication->cantView=$publication->cantView+1;
					// $publication->name= $user."otro";
					$publication->save();

				}elseif ($user != Auth::user()->email) {
					$publication = Publication::find($id);
					$publication->cantView=$publication->cantView+1;
					// $publication->name= $user."otro";
					$publication->save();
				}

		$query = DB::table('images')->where('publication_id', '=', $id)->get();
//seleccionar usuario dueño de la publicación


		return $query;
	}
	//vista
	public static function all_images($user_id){ // la primera imagen de cada publicacion de un usuario
    $query = DB::table('images')->join('publications','images.publication_id', '=', 'publications.id')
    ->join('users', 'publications.user_id' , '=', 'users.id')
    ->where('publications.user_id', '=', $user_id)
		->where('publications.state', '=', 'activo')
		->select('images.images_route','images.publication_id','publications.cantView','publications.type', 'users.userprofile_id', 'users.pubAmount' )
		->groupBy('images.publication_id')->get();
    return $query;
//SELECT * FROM images INNER JOIN publications on images.publication_id = publications.id WHERE publications.user_id = 1 GROUP by images.publication_id ASC
  }//estes es...SELECT * FROM images INNER JOIN publications on images.publication_id = publications.id inner join favorites on favorites.publication_id=publications.id WHERE publications.user_id = 1 GROUP by images.publication_id
	// mostrar articulo compartido
		public static function Shared($id){
	    $query = DB::table('images')->join('publications','images.publication_id', '=', 'publications.id')
	    ->where('publications.id', '=', $id)
			->where('publications.state', '=', 'activo')
			->groupBy('images.publication_id')->get();
	    return $query;
	  }
	  // ver si articulo en la ruta de compartido existe
		public static function validateShared($id){
	    $query = DB::table('publications')
	    ->where('publications.id', '=', $id)
			->where('publications.state', '=', 'activo')
			->get()
			->count();;

			if ($query>0) {
				return true;
			}else {
				return false;
			}

	  }
	public static function all_sales($user_id){ // la primera imagen de cada publicacion de un usuario
		$query = DB::table('images')->join('publications','images.publication_id', '=', 'publications.id')
		->where('publications.user_id', '=', $user_id)
		->where('publications.state', '=', 'vendido')
		->select('images.images_route','images.publication_id','publications.name')
		->groupBy('images.publication_id')->get();

		return $query;
//SELECT images.images_route, images.publication_id  FROM images INNER JOIN publications on images.publication_id = publications.id WHERE publications.user_id = 1 AND publications.state = "vendido" GROUP by images.publication_id
	}


  public static function all_premium(){
    $query = DB::table('images')->join('publications','images.publication_id', '=', 'publications.id')
    ->where('publications.type', '=', 'premium')
		->where('publications.state', '=', 'activo')
		->groupBy('images.publication_id')
		->orderBy('images.publication_id', 'desc')->paginate(12);
    return $query;
  }

  //--------------------------------------CATEGORIAS
      public static function image_piano(){
  			$query = DB::table('images')
  			->join('publications','images.publication_id', '=', 'publications.id')
        ->where('publications.name', 'like', 'pia%')
        ->orWhere('publications.name', 'like', 'yam%')
				->orWhere('publications.name', 'like', 'teclado%')
        ->where('state', '=','activo')
        ->groupBy('images.publication_id')->get();
  			return $query;
  		}
      public static function image_guitarra(){
        $query = DB::table('images')
        ->join('publications','images.publication_id', '=', 'publications.id')
        ->where('publications.name', 'like', '%gui%')
        ->where('state', '=','activo')
        ->groupBy('images.publication_id')->get();
        return $query;
      }
      public static function image_bateria(){
        $query = DB::table('images')
        ->join('publications','images.publication_id', '=', 'publications.id')
				->where('publications.name', 'like', 'bat%')
				->orWhere('publications.name', 'like', '%Bat%')
				->where('publications.category_id', '=', 3)
        ->where('state', '=','activo')
        ->groupBy('images.publication_id')->get();
        return $query;
      }
      public static function image_bajo(){
        $query = DB::table('images')
        ->join('publications','images.publication_id', '=', 'publications.id')
        ->where('publications.name', 'like', 'baj%')
        ->where('state', '=','activo')
        ->groupBy('images.publication_id')->get();
        return $query;
      }
			public static function image_accesorios(){
        $query = DB::table('images')
        ->join('publications','images.publication_id', '=', 'publications.id')
        ->where('publications.category_id', '=', 4)
        ->where('state', '=','activo')
        ->groupBy('images.publication_id')->get();
        return $query;
      }
      public static function search_article($name){ //para mostrar el resultado de la busqueda
        $query = DB::table('images')
        ->join('publications','images.publication_id', '=', 'publications.id')
				->join('categories','publications.category_id', '=', 'categories.id')
				->where('publications.state', '=','activo')
        ->where('publications.name', 'like', '%'.$name.'%')
        ->orWhere('categories.name', 'like','%'.$name.'%')
				->select('images.publication_id','images.images_route','publications.name','publications.price')
        ->groupBy('images.publication_id')
        ->limit(10)->get();
         return $query;
      }


}
