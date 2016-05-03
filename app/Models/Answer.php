<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Answer extends Eloquent{
    
    public $timestamps = false;
    protected $fillable = array('q_id','user_id','description');    

}
?>