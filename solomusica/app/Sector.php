<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
  protected $table = "sectors";
  protected $fillable = ['name','region_id'];

  public function region(){
    return $this->belongsTo('App\Region');
  }

  public function publications(){
    return $this->hasMany('App\Publication');
  }

  public static function sectors($id){

    return Sector::where('region_id','=', $id )->get();
  }
}
