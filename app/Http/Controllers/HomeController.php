<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Session;

class HomeController extends Controller {

//    public function __construct() {
//        $this->middleware('auth.basic', ['only' => ['getIndex']]);
//    }
    public function getIndex() {
        if (\Auth::check() && \Auth::user()->accepted==1) {
            return \View::make('index');
        } else {
            return \View::make('login');
        }
    }

    public function getLogin() {
        return \View::make('login');
    }

    public function postLogin() {
        $creds = array('username' => Input::get('username'), 'password' => Input::get('password'));
        if (\Auth::attempt($creds)) {
            return \Illuminate\Support\Facades\Redirect::intended();
        } else {
            return \Illuminate\Support\Facades\Redirect::to('login')->withInput()->withErrors("Fail");;
        }
    }

    //Add Warnings Page route
    public function getAddwarnings() {
        if (\Auth::check() && \Auth::user()->accepted==1) {
            return \View::make('addwarnings');
        } else {
            return \View::make('login');
        }
    }
    
    //Add Rescue Centers Page route
    public function getAddrescuecenters() {
        if (\Auth::check() && \Auth::user()->accepted==1) {
            return \View::make('addrescuecenters');
        } else {
            return \View::make('login');
        }
    }

    //Add ReliefCenter Page route
    public function getAddreliefcenter() {
        if (\Auth::check() && \Auth::user()->accepted==1) {
            return \View::make('addreliefcenter');
        } else {
            return \View::make('login');
        }
    }

    //View Warning Page route
    public function getViewwarnings() {
        if (\Auth::check() && \Auth::user()->accepted==1) {
            return redirect('warnings');
        } else {
            return \View::make('login');
        }
    }

    //Update Warning Page route
    public function getUpdatewarnings() {
        if (\Auth::check() && \Auth::user()->accepted==1) {

            return \View::make('updatewarnings')->withWarning(session('warning'));
        } else {
            return \View::make('login');
        }
    }
    
    //Update Add news route
    public function getAddnews() {
        return \View::make('addnews');
        if (\Auth::check()) {

            return \View::make('addnews');
        } else {
            return \View::make('login');
        }
    }

}
