<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Session;

/**
 * 
 * This controller class to route to main interfaces.
 * 
 * @author Dimuthu <kjtdimuthu@gmail.com>
 * 
 * @copyright (c) 2016, Titans
 */

class HomeController extends Controller {


    /**
     * Used to route "/index" after authentication
     * 
     * @return \Illuminate\View
     */
    public function getIndex() {
        if (\Auth::check() && \Auth::user()->accepted==1) {
            return \View::make('index');
        } else {
            return \View::make('login');
        }
    }

    /**
     * route for login interface
     * 
     * @return \Illuminate\View
     */
    public function getLogin() {
        return \View::make('login');
    }

    /**
     * route for authentication
     * 
     * @return \Illuminate\View
     */
    public function postLogin() {
        $creds = array('username' => Input::get('username'), 'password' => Input::get('password'));
        if (\Auth::attempt($creds)) {
            return \Illuminate\Support\Facades\Redirect::intended();
        } else {
            return \Illuminate\Support\Facades\Redirect::to('login')->withInput()->withErrors("Fail");;
        }
    }

    /**
     * Add Warnings Page route
     * 
     * @return \Illuminate\View
     */
    public function getAddwarnings() {
        if (\Auth::check() && \Auth::user()->accepted==1) {
            return \View::make('addwarnings');
        } else {
            return \View::make('login');
        }
    }
    
    /**
     * Add Rescue Centers Page route
     * 
     * @return \Illuminate\View
     */
    public function getAddrescuecenters() {
        if (\Auth::check() && \Auth::user()->accepted==1) {
            return \View::make('addrescuecenters');
        } else {
            return \View::make('login');
        }
    }

    /**
     * Add ReliefCenter Page route
     * 
     * @return \Illuminate\View
     */
    public function getAddreliefcenter() {
        if (\Auth::check() && \Auth::user()->accepted==1) {
            return \View::make('addreliefcenter');
        } else {
            return \View::make('login');
        }
    }

    /**
     * View Warning Page route
     * 
     * @return \Illuminate\View
     */
    public function getViewwarnings() {
        if (\Auth::check() && \Auth::user()->accepted==1) {
            return redirect('warnings');
        } else {
            return \View::make('login');
        }
    }

    /**
     * Update Warning Page route
     * 
     * @return \Illuminate\View
     */
    public function getUpdatewarnings() {
        if (\Auth::check() && \Auth::user()->accepted==1) {

            return \View::make('updatewarnings')->withWarning(session('warning'));
        } else {
            return \View::make('login');
        }
    }
    
    /**
     * Update Add news route
     * 
     * @return \Illuminate\View
     */
    public function getAddnews() {
        return \View::make('addnews');
        if (\Auth::check()) {

            return \View::make('addnews');
        } else {
            return \View::make('login');
        }
    }

}
