<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MobileAnswerController extends Controller
{
    public function store($description,$user_id,$q_id){
        $data = array('q_id'=>$q_id,'user_id'=>$user_id,'description'=>$description);
        $rules = array(
            'q_id' => 'required',
            'user_id' => 'required',
            'description' => 'required'
        );
        //$inputData = array('type' => Input::get('type'), 'start_time' => $startandendtime[0], 'end_time' => $startandendtime[1], 'lat' => Input::get('lat'), 'lng' => Input::get('lng'), 'address' => Input::get('address'));
        $validator = \Validator::make($data, $rules);
        if ($validator->fails()) {
            echo $_GET['callback']."(".json_encode("Failed").")";
        } else {
            \App\Models\Answer::create(array(
                'q_id' => $q_id,
                'user_id' => $user_id,
                'description' => $description));
            echo $_GET['callback']."(".json_encode("Success").")";
        }
    }
}
