<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class News extends Eloquent{
    
    public $timestamps = false;
    protected $fillable = array('user_id','title','description','date','type');    

}
?>