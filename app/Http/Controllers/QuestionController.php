<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class QuestionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (\Auth::check()) {
            $result = array();
            $questions = \DB::table('questions')
                    ->join('app_users', 'app_users.id', '=', 'questions.user_id')
                    ->select('app_users.username', 'questions.id', 'questions.description', 'questions.type')
                    ->get();
            foreach ($questions as $question) {
                $replies_by_authority = \DB::table('answers')
                        ->join('general_users', 'answers.user_id', '=', 'general_users.id')
                        ->join('users', 'general_users.id', '=', 'users.id')
                        ->select('answers.id', 'answers.q_id', 'answers.user_id', 'answers.description', 'users.username')
                        ->where('answers.q_id', $question->id)
                        ->get();
                $replies_by_app_users = \DB::table('answers')
                        ->join('general_users', 'answers.user_id', '=', 'general_users.id')
                        ->join('app_users', 'general_users.id', '=', 'app_users.id')
                        ->select('answers.id', 'answers.q_id', 'answers.user_id', 'answers.description', 'app_users.username')
                        ->where('answers.q_id', $question->id)
                        ->get();
                $result[] = array_merge((array) $question, $replies_by_app_users, $replies_by_authority);
            }
            //var_dump($result);
            return \View::make('forum')->withResult($result);
        } else {
            return \View::make('login');
        }
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
        //
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
    
    public function getNotification(){
        
        $forumnotification = \Illuminate\Support\Facades\DB::select('SELECT u.username,q.description FROM answers a right join questions q on a.q_id=q. id left join app_users u on q.user_id=u.id where a.description is null');
        echo json_encode($forumnotification);
    }

}
