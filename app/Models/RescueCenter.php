<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class RescueCenter extends Eloquent{
    
    public $timestamps = false;
    protected $fillable = array('name','telephone','type');    

}
?>