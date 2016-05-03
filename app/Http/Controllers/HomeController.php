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
        if (\Auth::check()) {
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
            return \Illuminate\Support\Facades\Redirect::intended('index');
        } else {
            return \Illuminate\Support\Facades\Redirect::to('login')->withInput();
        }
    }

    //Add Warnings Page route
    public function getAddwarnings() {
        if (\Auth::check()) {
            return \View::make('addwarnings');
        } else {
            return \View::make('login');
        }
    }
    
    //View Warning Page route
    public function getViewwarnings() {
        if (\Auth::check()) {
            return redirect('warnings');
        } else {
            return \View::make('login');
        }
    }
    
    //Update Warning Page route
    public function getUpdatewarnings() {
        if (\Auth::check()) {
            
            return \View::make('updatewarnings')->withWarning(session('warning'));
        } else {
            return \View::make('login');
        }
    }

}
