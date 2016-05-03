<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User as User;

use App\Models\GeneralUser as GeneralUser;

use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            GeneralUser::create();
            $user = \Illuminate\Support\Facades\DB::table('general_users')->orderBy('id','desc')->take(1)->get();
            User::create(array(
                'id'=>$user[0]->id,
                'username' => Input::get('username'),
                'password' => \Hash::make(Input::get('password')),
                'firstname' => Input::get('firstname'),
                'middlename' => Input::get('middlename'),
                'lastname' => Input::get('lastname'),
                'mobile' => Input::get('mobile'),
                'email' => Input::get('email'),
                'post' => Input::get('post'),
            ));
            return \Illuminate\Support\Facades\Redirect::to('users');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
