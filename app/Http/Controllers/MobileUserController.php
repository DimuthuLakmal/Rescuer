<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\GeneralUser as GeneralUser;
use Illuminate\Support\Facades\Input;

class MobileUserController extends Controller {

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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

    public function checklogin($username, $password) {
        $user = \DB::table('app_users')
                ->select('id', 'password')
                ->where('username', $username)
                ->get();
        foreach ($user as $u) {
            if (\Hash::check($password, $u->password)) {
                echo $_GET['callback'] . "(" . json_encode("Success") . ")";
                break;
            }else{
                echo $_GET['callback'] . "(" . json_encode("Fail") . ")";
                break;
            }
        }
//        if (\Hash::check($user->password, $password)) {
//            echo 'A';
//        }
//        if (Hash::check('secret', $hashedPassword))
//{
//    // The passwords match...
//}
    }

}
