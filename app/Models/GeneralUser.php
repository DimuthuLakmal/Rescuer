<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class GeneralUser extends Eloquent {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    public $timestamps = false;

    public function user() {
        return $this->hasOne('\App\User', 'id');
    }
    
//    public function appUser() {
//        return $this->hasOne('\App\User', 'id');
//    }

}
