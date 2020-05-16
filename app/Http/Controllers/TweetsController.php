<?php

namespace App\Http\Controllers;
use App\User;
use App\Tweets;
use Illuminate\Http\Request;

class TweetsController extends Controller{
    public function index(){
        $tweets = Tweets::orderBy('id', 'DESC')->get();
        $user_current = \Auth::user()->id;
        foreach($tweets as $tweet){
            // $tweet->user = $tweet->user();
            $user = $tweet->user;
            $tweet->user = $user->name;
            // $tweet->user_id = $tweet->user->name;
        }
        return response()->json(['tweets' => $tweets, 'current_user' => $user_current]);
    }
    public function show($id){
        $user = User::findOrFail($id);
        $tweets = $user->tweets;
        return $tweets;
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
        $tweet = Tweets::findOrFail($id);

        $tweet->content = $content;
        $tweet->update();
    }
    public function delete($id){
        $tweet = Tweets::findOrFail($id);
        $tweet->delete();
    }
}
