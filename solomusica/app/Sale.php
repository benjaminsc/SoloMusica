<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = "sales";
    protected $fillable = ['sales_date','cantidad','total','user_id','publication_id'];

    public function publication(){
      return $this->belongsTo('App\Publication');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }


		
}
