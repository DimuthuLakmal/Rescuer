<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ReliefCenter extends Eloquent{
    
    public $timestamps = false;
    protected $fillable = array('address','lat','lan','capacity','current_amount');    

}
?>