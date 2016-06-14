<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * 
 * This controller class is used for handle answers table in db. Basically used for store data in db.
 * 
 * @author Dimuthu <kjtdimuthu@gmail.com>
 * 
 * @copyright (c) 2016, Titans
 */

class AnswerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
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
        $data = $request->all();
        $rules = array(
            'q_id' => 'required',
            'user_id' => 'required',
            'description' => 'required'
        );
        //$inputData = array('type' => Input::get('type'), 'start_time' => $startandendtime[0], 'end_time' => $startandendtime[1], 'lat' => Input::get('lat'), 'lng' => Input::get('lng'), 'address' => Input::get('address'));
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('addwarnings')->withInput()->withErrors($validator->messages());
        } else {
            \App\Models\Answer::create(array(
                'q_id' => $request->get('q_id'),
                'user_id' => $request->get('user_id'),
                'description' => $request->get('description')));
            return redirect('forum')->with('success', 'Successfully Added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
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
