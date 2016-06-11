<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class VictimController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {      
        return \View::make('viewvictims')->withVictims(\App\Models\Victim::all());
    }
    
    public function getForMap() {      
        $victims = \App\Models\Victim::all();
        $result = array();
        
        foreach ($victims as $victim){
            $result[] = $victim->lat.' '.$victim->lan;
        }
        
        echo json_encode($result);
        
    }

    public function store($user_id, $victims_amount, $lat, $lan, $contact_number, $type, $address) {
        $data = array('user_id' => $user_id, 'victims_amount' => $victims_amount, 'lat' => $lat, 'lan' => $lan, 'contact_number' => $contact_number, 'type'=>$type,'address'=>$address);
        $rules = array(
            'user_id' => 'required',
            'lat' => 'required',
            'lan' => 'required',
            'address' => 'required'
        );
        //$inputData = array('type' => Input::get('type'), 'start_time' => $startandendtime[0], 'end_time' => $startandendtime[1], 'lat' => Input::get('lat'), 'lng' => Input::get('lng'), 'address' => Input::get('address'));
        $validator = \Validator::make($data, $rules);
        if ($validator->fails()) {
            echo $_GET['callback'] . "(" . json_encode("Failed") . ")";
        } else {
            \App\Models\Victim::create(array(
                'user_id' => $user_id,
                'victims_amount' => $victims_amount,
                'lat' => $lat,
                'lan' => $lan,
                'contact_number' => $contact_number,
                'date' => date('Y-m-d'),
                'type'=> $type,
                'address'=>$address,
                'action' => 0));
            echo $_GET['callback'] . "(" . json_encode("Success") . ")";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $victim = \App\Models\Victim::find($id);
        $victim->action = $request->input('action');
        $victim->save();
        echo json_encode('successfully_updated');
    }
    
    public function victimCount(){
        $count = \Illuminate\Support\Facades\DB::select('SELECT count(id) as count FROM victims WHERE action=0');
        echo json_encode($count[0]->count);
    }
    
    public function victimAllCount(){
        $count = \Illuminate\Support\Facades\DB::select('SELECT count(id) as count FROM victims');
        echo json_encode($count[0]->count);
    }

}
