<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    function show()
    {
        if (Auth::check()) {
            $result = \App\Tweet::all();
            return view('profile', ['tweets' => $result]);
        } else {
            return view('profile');
        }
    }

    function validateNewTweet(Request $request)
    {
        // $data = $request->validate([
        //     'author' => 'required|min:8|max:30',
        //     'content' => 'required|min:8|max:130',
        // ]);
        if (Auth::check()) {
            $tweet = new \App\Tweet;
            $tweet->author = $request->author;
            $tweet->content = $request->content;
            $tweet->save();

            $result = \App\Tweet::all();
            return view('profile', ['tweets' => $result]);
        } else {
            return view('profile');
        }
    }
}
