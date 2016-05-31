<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Victim extends Eloquent{
    
    public $timestamps = false;
    protected $fillable = array('user_id','victims_amount','lat','lan','contact_number','date','action','type','address');    

}
?>