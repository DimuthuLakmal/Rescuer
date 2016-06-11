<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Subscriber extends Eloquent{
    
    public $timestamps = false;
    protected $fillable = array('id','tag_number');    

}
?>