<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class WarningController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return \View::make('viewwarnings')->withWarnings(\App\Models\Warning::all());
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $startandendtime = explode(' - ', Input::get('startandendtime'));
        if (count($startandendtime) < 2) {
            return redirect('addwarnings')->withInput()->with('dateerror', 'Time period is invalid!');
        } else {
            $rules = array(
                'type' => 'required',
                'start_time' => 'required|date|date_format:Y/m/d H:i:s',
                'end_time' => 'required|date|date_format:Y/m/d H:i:s',
                'address' => 'required',
                'lat' => 'required',
                'lng' => 'required'
            );
            $inputData = array('type' => Input::get('type'), 'start_time' => $startandendtime[0], 'end_time' => $startandendtime[1], 'lat' => Input::get('lat'), 'lng' => Input::get('lng'), 'address' => Input::get('address'));
            $validator = \Validator::make($inputData, $rules);
            if ($validator->fails()) {
                return redirect('addwarnings')->withInput()->withErrors($validator->messages());
            } else {
                \App\Models\Warning::create(array(
                    'type' => Input::get('type'),
                    'start_time' => $startandendtime[0],
                    'end_time' => $startandendtime[1],
                    'address' => Input::get('address'),
                    'lat' => Input::get('lat'),
                    'lng' => Input::get('lng'),
                    'level' => Input::get('level')));
                return redirect('addwarnings')->with('success', 'Successfully Added!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $warning = \App\Models\Warning::find($id);
        if (\Auth::check()) {
            return \View::make('\updatewarnings')->with('warning', $warning);
        } else {
            return \View::make('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $startandendtime = explode(' - ', Input::get('startandendtime'));
        if (count($startandendtime) < 2) {
            return redirect('warnings/' . $id)->withInput()->with('dateerror', 'Time period is invalid!');
        } else {
            $rules = array(
                'type' => 'required',
                'start_time' => 'required|date|date_format:Y/m/d H:i:s',
                'end_time' => 'required|date|date_format:Y/m/d H:i:s',
                'address' => 'required',
                'lat' => 'required',
                'lng' => 'required'
            );
            $inputData = array('type' => Input::get('type'), 'start_time' => $startandendtime[0], 'end_time' => $startandendtime[1], 'lat' => Input::get('lat'), 'lng' => Input::get('lng'), 'address' => Input::get('address'));
            $validator = \Validator::make($inputData, $rules);
            if ($validator->fails()) {
                return \Illuminate\Support\Facades\Redirect::to('warnings/' . $id)->withInput()->withErrors($validator->messages());
            }
            $warning = \App\Models\Warning::find($id);
            if (Input::has('type'))
                $warning->type = Input::get('type');
            if (Input::has('startandendtime')){
                $warning->start_time = $startandendtime[0];
                $warning->end_time = $startandendtime[1];
            }
            if (Input::has('address'))
                $warning->address = Input::get('address');
            if (Input::has('lat'))
                $warning->lat = Input::get('lat');
            if (Input::has('lng'))
                $warning->lng = Input::get('lng');
            if (Input::has('level'))
                $warning->level = Input::get('level');
            $warning->save();

            return \Illuminate\Support\Facades\Redirect::to('warnings/' . $id)->withSuccess('success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
