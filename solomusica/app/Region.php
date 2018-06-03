<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
  protected $table = "regions";
  protected $fillable = ['name'];

  public function sectors(){
    return $this->hasMany('App\Sector');
  }
}
