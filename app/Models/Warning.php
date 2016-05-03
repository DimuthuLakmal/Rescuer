<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Warning extends Eloquent{
    
    public $timestamps = false;
    protected $fillable = array('type','start_time','end_time','address','lat','lng','level');    

}
?>