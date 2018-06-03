<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Favorite;

class Favorite extends Model
{

	protected $table = "favorites";
  protected $fillable = ['user_id','publication_id'];

  public function publication(){
    return $this->belongsTo('App\Publication');
  }
	public function user(){
		return $this->belongsTo('App\User');
	}
	public static function favorites_all($id)
	{
		$query = DB::table('images')->join('publications','images.publication_id', '=', 'publications.id')
		->join('favorites','favorites.publication_id', '=', 'publications.id')
		->where('favorites.user_id', '=',$id)
		->where('publications.state', '=', 'activo')
		->select('favorites.id','images.images_route','images.publication_id','publications.name','publications.price')
		->groupBy('images.publication_id')->get();

		return $query;
	}
	public static function favoritos2($idpub,$iduser)
	{
		$query = DB::table('favorites')
		->where('publication_id', '=', $idpub)
		->where('user_id', '=', $iduser)->get();
		return $query;
	}
	// JOIN favorites ON favorites.publication_id = publications.id WHERE favorites.user_id = 1 AND publications.state = "vendido" GROUP by favorites.id;
	// images INNER JOIN publications on images.publication_id = publications.id INNER
	// SELECT publications.name,publications.state,images.images_route FROM images INNER JOIN publications on images.publication_id = publications.id inner join favorites on favorites.publication_id=publications.id AND publications.state="activo" WHERE publications.user_id = 1 GROUP by images.publication_id

// SELECT images.id ,images.images_route, publications.name,favorites.user_id FROM images INNER JOIN publications on images.publication_id = publications.id INNER JOIN favorites ON favorites.publication_id = publications.id WHERE favorites.user_id = 1 AND publications.state = "vendido" GROUP by favorites.id;
}
