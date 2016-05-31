<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class NewsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return \View::make('viewnews')->withNews(\App\Models\News::all());
    }

    public function store(Request $request) {
        $rules = array(
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required'
        );
        //$inputData = array('type' => Input::get('type'), 'start_time' => $startandendtime[0], 'end_time' => $startandendtime[1], 'lat' => Input::get('lat'), 'lng' => Input::get('lng'), 'address' => Input::get('address'));
        $validator = \Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect('addnews')->withInput()->withErrors($validator->messages());
        } else {
            \App\Models\News::create(array(
                'user_id' => Input::get('user_id'),
                'title' => Input::get('title'),
                'description' => Input::get('description'),
                'date' => date('Y-m-d H:i:s'),
                'type' => Input::get('type')));
            return redirect('addnews')->with('success', 'Successfully Added!');
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
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required'
        );

        $validator = \Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return \Illuminate\Support\Facades\Redirect::to('news/' . $id)->withInput()->withErrors($validator->messages());
        }
        $news = \App\Models\News::find($id);
        if (Input::has('title'))
            $news->title = Input::get('title');
        if (Input::has('description'))
            $news->description = Input::get('description');
        $news->save();

        return \Illuminate\Support\Facades\Redirect::to('news/' . $id)->withInput()->withErrors($validator->messages());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $news = \App\Models\News::find($id);
        if (\Auth::check()) {
            return \View::make('\updatenews')->with('news', $news);
        } else {
            return \View::make('login');
        }
    }

    public function getMobileAll() {
        $result = array();
        $news = \DB::table('news')
                ->join('general_users', 'news.user_id', '=', 'general_users.id')
                ->join('users', 'general_users.id', '=', 'users.id')
                ->select('news.id', 'news.title', 'news.description', 'news.date', 'users.username')
                ->where('news.type', 'News')
                ->get();
        foreach ($news as $n) {
            $pos = strpos($n->description, "src=");
            $end_pos = strpos($n->description, '"', $pos + 5);
            $img_url = array();
            $summary = array();
            $img_url['img_url'] = substr($n->description, $pos + 5, $end_pos - 13);
            $summary['summary'] = substr(preg_replace("/\<img(.*?)>/", "", $n->description), 0, 200);
            
            $result[] = array_merge((array) $n, $summary, $img_url);
            
        }
        echo $_GET['callback']."(".json_encode($result).")";
    }
    
    public function getMobile($id) {
        $result = array();
        $news = \DB::table('news')
                ->join('general_users', 'news.user_id', '=', 'general_users.id')
                ->join('users', 'general_users.id', '=', 'users.id')
                ->select('news.id', 'news.title', 'news.description', 'news.date', 'users.username')
                ->where('news.id', $id)
                ->get();
        foreach ($news as $n) {
            $pos = strpos($n->description, "src=");
            $end_pos = strpos($n->description, '"', $pos + 5);
            $img_url = array();
            $summary = array();
            $img_url['img_url'] = substr($n->description, $pos + 5, $end_pos - 13);
            $summary['summary'] = substr(preg_replace("/\<img(.*?)>/", "", $n->description), 0, 200);
            
            $result[] = array_merge((array) $n, $summary, $img_url);
            
        }
        echo $_GET['callback']."(".json_encode($result).")";
    }

}
