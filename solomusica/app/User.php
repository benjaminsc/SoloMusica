<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use Notifiable;


    protected $table = "users";
    protected $fillable = [
        'name', 'lastname', 'email','phone', 'password','pubAmount', 'userprofile_id'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function publications(){
      return $this->hasMany('App\Publication');
    }
    public function comments(){
      return $this->hasMany('App\Comment');
    }

    public function sales(){
      return $this->hasMany('App\Sale');
    }

    public function favorites(){
      return $this->hasMany('App\Favorite');
    }

    public static function about($id){ //informacion del vendedor en "acerca del vendedor" en index

      $query = DB::table('users')
			->select('users.id','users.name', 'users.lastname', 'users.email','users.phone' )
			->join('publications', 'publications.user_id', '=', 'users.id')
			->where('publications.id', '=', $id)->get();
			return $query;


    }


}
