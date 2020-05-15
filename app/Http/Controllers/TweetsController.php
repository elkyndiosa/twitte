<?php

namespace App\Http\Controllers;

use App\Tweets;
use Illuminate\Http\Request;

class TweetsController extends Controller{
    public function index(){
        $tweets = Tweets::orderBy('id', 'DESC')->get();
        return $tweets;
    }
    public function show($id){
        $tweet = Tweets::findOrFail($id)
        return $tweet;
    }




    public function store(Request $request){
        $this->validate($request, [
            'content' => ['required'],
        ]);
        //get data of frontend
        $content = $request->content;
        $user_id = \Auth::user()->id;

        $tweets = new Tweets();
        $tweets->content = $content;
        $tweets->user_id = $user_id;
        $tweets->save();
    }

    public function update(Request $request){
        $this->validate($request, [
            'content' => ['required'],
        ]);
        //get data of frontend
        $content = $request->content;
        $id = $request->id;
        $tweet = Tweets::findOrFail($id)

        $tweet->content = $content;
        $tweets->update();
    }
    public function delete($id){
        $tweet = Tweets::findOrFail($id)
        $tweet->delete();
    }
}
