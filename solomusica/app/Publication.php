<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Publication extends Model
{
  protected $table = "publications";
  protected $fillable = ['name','quantity','price','type','state','cantView','start_date','end_date','description','video',
                        'user_id','category_id'];

    public function user(){
    return $this->belongsTo('App\User');
    }

    public function comments(){
      return $this->hasMany('App\Comment');
    }

    public function images(){
      return $this->hasMany('App\Image');
    }

    public function category(){
      return $this->belongsTo('App\Category');
    }

    public function sales(){
      return $this->hasMany('App\Sale');
    }

    public function favorites(){
      return $this->hasMany('App\Favorite');
    }

    public function sector(){
      return $this->belongsTo('App\Sector');
    }

		public static function data_home($id){//todos los datos de la publicacion en home
			$query = DB::table('publications')
			->select('publications.id','publications.name', 'price', 'description','type', 'quantity', 'sectors.name as sector_name', 'regions.name as region_name' )
			->join('sectors', 'publications.sector_id', '=', 'sectors.id')
			->join('regions', 'sectors.region_id', '=', 'regions.id')
			->where('publications.id','=',$id)->get();
			return $query;
		}
    public static function data_home2($id){//todos los datos de la publicacion en home
			$query = DB::table('publications')
			->select('publications.id','publications.name', 'price', 'description','type', 'quantity', 'sectors.name as sector_name', 'regions.name as region_name' )
			->join('sectors', 'publications.sector_id', '=', 'sectors.id')
			->join('regions', 'sectors.region_id', '=', 'regions.id')
			->where('publications.id','=',$id)->get();
			return $query;
		}

		public static function data_nav2($id){//todos los datos de la descripcion nav2
			$query = DB::table('publications')
			->select( 'description' )
			->where('id','=',$id)->get();
			return $query;
		}
    public static function search($name){//para desplegar la tabla de sugerencias
			$query = DB::table('publications')
      ->select('publications.name')
			->where('publications.state','=', 'activo')
			->where('publications.name','like', "%$name%" )->get();
			return $query;
		}








}
