<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class AppUser extends Eloquent{
    
    public $timestamps = false;
    protected $fillable = array('id','username','password');    

}
?>