<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class RescueCenterController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return \View::make('viewrescuecenters')->withRescuecenters(\App\Models\RescueCenter::all());
    }

    public function getMobile($town, $type) {

        $rescuecenters = \DB::table('rescue_centers')
                ->join('coverage_areas', 'rescue_centers.id', '=', 'coverage_areas.rescuer_center_id')
                ->select('rescue_centers.id', 'rescue_centers.name', 'rescue_centers.telephone')
                ->where('rescue_centers.type',$type)
                ->where('coverage_areas.town',$town)
                ->get();

        echo $_GET['callback']."(".json_encode($rescuecenters).")";
    }

    public function store(Request $request) {
        $rules = array(
            'name' => 'required',
            'telephone' => 'required|max:10',
            'type' => 'required'
        );
        $validator = \Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect('addrescuecenters')->withInput()->withErrors($validator->messages());
        } else {
            $selected_areas = explode('%', Input::get('selected_areas'));

            $rescue_center = \App\Models\RescueCenter::create(array(
                        'telephone' => Input::get('telephone'),
                        'type' => Input::get('type'),
                        'name' => Input::get('name')));
            if ($rescue_center != null) {
                foreach ($selected_areas as $selected_area) {
                    if ($selected_area != "") {
                        \App\Models\CoverageArea::create(array(
                            'rescuer_center_id' => $rescue_center->id,
                            'town' => $selected_area
                        ));
                    }
                }
            }
            return redirect('addrescuecenters')->with('success', 'Successfully Added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (\Auth::check()) {
            $rescuecenter = \App\Models\RescueCenter::find($id);
            $result = array();
            $coverage_areas = \DB::table('coverage_areas')
                    ->select('id', 'rescuer_center_id', 'town')
                    ->where('rescuer_center_id', $id)
                    ->get();
            return \View::make('viewrescuecenter')->with('rescuecenter', $rescuecenter)->with('coverage_areas', $coverage_areas);
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
            'name' => 'required',
            'telephone' => 'required|max:10',
            'type' => 'required'
        );

        $validator = \Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return \Illuminate\Support\Facades\Redirect::to('rescuecenter/' . $id)->withInput()->withErrors($validator->messages());
        }
        $rescue_center = \App\Models\RescueCenter::find($id);
        if (Input::has('name'))
            $rescue_center->name = Input::get('name');
        if (Input::has('telephone'))
            $rescue_center->telephone = Input::get('telephone');
        if (Input::has('type'))
            $rescue_center->type = Input::get('type');

        $selected_areas = explode('%', Input::get('deleted_selected_areas'));
        foreach ($selected_areas as $selected_area) {
            if ($selected_area != "") {
                \Illuminate\Support\Facades\DB::delete('delete from coverage_areas where rescuer_center_id=' . $id . ' and town=\'' . $selected_area . '\'');
            }
        }

        $selected_areas = explode('%', Input::get('selected_areas'));

        foreach ($selected_areas as $selected_area) {
            if ($selected_area != "") {
                \App\Models\CoverageArea::create(array(
                    'rescuer_center_id' => $id,
                    'town' => $selected_area
                ));
            }
        }
        //DB::delete('delete from users');
        $rescue_center->save();

        return redirect('rescuecenter/' . $id)->with('success', 'Successfully Added!');
    }

}
