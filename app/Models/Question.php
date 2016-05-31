<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Question extends Eloquent{
    
    public $timestamps = false;
    protected $fillable = array('user_id','description','type');    

}
?>