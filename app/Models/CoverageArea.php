<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class CoverageArea extends Eloquent{
    
    public $timestamps = false;
    protected $fillable = array('rescuer_center_id','town');    

}
?>