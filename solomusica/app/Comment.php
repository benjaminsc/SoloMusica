<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $table = "comments";
  protected $fillable = ['date','question','user_id','response','publication_id','updated_at'];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function publication(){
    return $this->belongsTo('App\Publication');
  }
	public static function comments($id){//todos los datos de la descripcion nav2
    $query = DB::table('comments')
    ->where('publication_id','=',$id)->orderBy('created_at', 'desc')->get();
    return $query;
  }

	public static function questions_all($id)
	{

		 $query = DB::table('comments')
	 	->join('publications','comments.publication_id','=','publications.id')
	 	->join('users','comments.user_id','=','users.id')
	 	->join('images','images.publication_id','=','publications.id')
    ->where('publications.user_id',$id)
	 	->whereNull('comments.response')
		->orWhere('comments.response', '')

	 	->select('images.images_route','comments.id','comments.date','comments.question','comments.user_id','comments.publication_id','publications.name as pname','users.name')
	 	->groupBy('comments.id')->get();
		   return $query;
	}
	public static function response_all($id)
	{
		$query = DB::table('comments')->join('publications','comments.publication_id','=','publications.id')
		->join('images','images.publication_id','=','publications.id')
		->where('comments.user_id',$id)
		->where('comments.response','!=','')
		->select('images.images_route','comments.id','comments.date','comments.updated_at','comments.question','comments.response','comments.user_id','comments.publication_id','publications.name as pname')
		->groupBy('comments.id')->get();
		  return $query;
	}
}
