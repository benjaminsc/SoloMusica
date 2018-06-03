<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
	protected $table = "payments";
	protected $fillable = ['id','user_id','publication_id','through','quantity','price','total'];

	/*public function sectors(){
		return $this->hasMany('App\Sector');
	}*/
}
