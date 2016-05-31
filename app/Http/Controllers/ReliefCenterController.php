<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ReliefCenterController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return \View::make('viewreliefcenters')->withReliefcenters(\App\Models\ReliefCenter::all());
    }

    public function getMobile($lat, $lan, $max) {
        $reliefcenters = \App\Models\ReliefCenter::all();

        $result = array();

        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        $txt = $max;
        fwrite($myfile, $txt);
        fclose($myfile);

        foreach ($reliefcenters as $reliefcenter) {
            $distance = ReliefCenterController::real_distance($lat, $lan, $reliefcenter->lat, $reliefcenter->lan);
            if ($distance <= $max) {

                $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
                $txt = $distance;
                fwrite($myfile, $txt);
                fclose($myfile);

                $result[] = $reliefcenter->address . '%' . $reliefcenter->lat . '%' . $reliefcenter->lan . '%' . $reliefcenter->capacity . '%' . $reliefcenter->current_amount . '%' . $distance;
            }
        }

        echo $_GET['callback'] . "(" . json_encode($result) . ")";
    }

    //Get Distance between two locations
    public function real_distance($lat1, $lon1, $lat2, $lon2) {
        $url_new = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins=' . $lat1 . ',' . $lon1 . '&destinations=' . $lat2 . ',' . $lon2 . '&mode=driving&language=en&sensor=false&key=AIzaSyDq1_JABbF4d85yAUh1psNLxN0xNHyU3rA';
        $dat = file_get_contents($url_new);
        $dat = utf8_decode($dat);
        $ob = json_decode($dat);
        return ($ob->rows[0]->elements[0]->distance->text); //km
    }

    public function store(Request $request) {
        $rules = array(
            'address' => 'required',
            'lat' => 'required',
            'lan' => 'required',
            'capacity' => 'numeric',
            'current_amount' => 'numeric'
        );
        $validator = \Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect('addreliefcenter')->withInput()->withErrors($validator->messages());
        } else {
            \App\Models\ReliefCenter::create(array(
                'address' => Input::get('address'),
                'lat' => Input::get('lat'),
                'lan' => Input::get('lan'),
                'capacity' => Input::get('capacity'),
                'current_amount' => Input::get('current_amount')));
            return redirect('addreliefcenter')->with('success', 'Successfully Added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $reliefcenter = \App\Models\ReliefCenter::find($id);
        if (\Auth::check()) {
            return \View::make('\updatereliefcenter')->with('reliefcenter', $reliefcenter);
        } else {
            return \View::make('login');
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
        $rules = array(
            'address' => 'required',
            'lat' => 'required',
            'lan' => 'required',
            'capacity' => 'numeric',
            'current_amount' => 'numeric'
        );

        $validator = \Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return \Illuminate\Support\Facades\Redirect::to('reliefcenter/' . $id)->withInput()->withErrors($validator->messages());
        }
        $reliefcenter = \App\Models\ReliefCenter::find($id);
        if (Input::has('address'))
            $reliefcenter->address = Input::get('address');
        if (Input::has('lat'))
            $reliefcenter->lat = Input::get('lat');
        if (Input::has('lan'))
            $reliefcenter->lan = Input::get('lan');
        if (Input::has('capacity'))
            $reliefcenter->capacity = Input::get('capacity');
        if (Input::has('current_amount'))
            $reliefcenter->current_amount = Input::get('current_amount');
        $reliefcenter->save();

        return \Illuminate\Support\Facades\Redirect::to('reliefcenter/' . $id)->withInput()->withErrors($validator->messages());
    }

}
