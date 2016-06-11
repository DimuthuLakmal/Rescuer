<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User as User;
use App\Models\GeneralUser as GeneralUser;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return \View::make('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return \View::make('signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = array(
            'username' => 'required',
            'password' => 'required|min:8',
            'repassword' => 'required:same:password',
            'post' => 'required',
            'mobile' => 'required',
            'firstname' => 'required'
        );
        $validator = \Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return \Illuminate\Support\Facades\Redirect::to('users/create')->withInput()->withErrors($validator->messages());
        } else {
            $general_user = GeneralUser::create(array('user_level' => 2));
            User::create(array(
                'id' => $general_user->id,
                'username' => Input::get('username'),
                'password' => \Hash::make(Input::get('password')),
                'firstname' => Input::get('firstname'),
                'middlename' => Input::get('middlename'),
                'lastname' => Input::get('lastname'),
                'mobile' => Input::get('mobile'),
                'email' => Input::get('email'),
                'post' => Input::get('post'),
                'accepted' => 0
            ));
            return \Illuminate\Support\Facades\Redirect::to('users');
        }
    }

    public function storeSubscribers() {

        $notification = json_decode(file_get_contents('php://input'), true);
        error_log($notification['status'], $notification['subscriberId']);

        $tag_number = $notification['subscriberId'];

        $data = array('tag_number'=>$tag_number);
        $rules = array(
            'tag_number' => 'required',
        );
        $validator = \Validator::make($data, $rules);
        if ($validator->fails()) {
           
        } else {
            $general_user = GeneralUser::create(array('user_level' => 3));
            \App\Models\Subscriber::create(array(
                'id' => $general_user->id,
                'tag_number' => $tag_number
            ));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::find($id);
        if (\Auth::check()) {
            return \View::make('viewuser')->with('user', $user);
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
        $user = User::find($id);
        if (Input::has('accepted'))
            $user->accepted = Input::get('accepted');

        $user->save();

        return \Illuminate\Support\Facades\Redirect::to('users/' . $id)->withInput();
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

    public function viewAllUsers() {
        return \View::make('viewusers')->withUsers(User::all());
    }

    public function countUnaccepted() {
        $count = \Illuminate\Support\Facades\DB::select('SELECT count(id) as count FROM users WHERE accepted=0');
        echo json_encode($count[0]->count);
    }

    public function signout() {

        \Auth::logout();
        return \Illuminate\Support\Facades\Redirect::to('login');
    }

}
