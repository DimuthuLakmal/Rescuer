<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\GeneralUser as GeneralUser;
use Illuminate\Support\Facades\Input;

/**
 * 
 * This controller class used to store and retrieve loing details and user account details of mobile users.
 * 
 * @see \App\User
 * @see \Illuminate\Routing\Controller
 * 
 * @author Dimuthu <kjtdimuthu@gmail.com>
 * 
 * @copyright (c) 2016, Titans
 */
class MobileUserController extends Controller {

    /**
     * Store a newly created mobile user in storage.
     *
     * @param  string $username
     * @param string $password
     * @param string repassword
     * @param string mobile
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($username, $password, $repassword, $mobile) {
        $data = array('username' => $username, 'password' => $password, 'repassword' => $repassword, 'mobile' => $mobile);
        $rules = array(
            'username' => 'required',
            'password' => 'required|min:8',
            'repassword' => 'required:same:password',
            'mobile' => 'required'
        );
        $validator = \Validator::make($data, $rules);
        if ($validator->fails()) {
            echo $_GET['callback'] . "(" . json_encode("Fail") . ")";
        } else {
            $general_user = GeneralUser::create(array('user_level' => 3));
            \App\Models\AppUser::create(array(
                'id' => $general_user->id,
                'username' => $username,
                'password' => \Hash::make($password)
            ));
            echo $_GET['callback'] . "(" . json_encode("Success") . ")";
        }
    }

    /**
     * Used for authenticate mobile users
     *
     * @param  string $username
     * @param string $password
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function checklogin($username, $password) {
        $user = \DB::table('app_users')
                ->select('id', 'password')
                ->where('username', $username)
                ->get();
        foreach ($user as $u) {
            if (\Hash::check($password, $u->password)) {
                echo $_GET['callback'] . "(" . json_encode("Success") . ")";
                break;
            } else {
                echo $_GET['callback'] . "(" . json_encode("Fail") . ")";
                break;
            }
        }
    }

}
