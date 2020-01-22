<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $notes = \App\Note::select('notes.id', 'notes.title', 'notes.body', 'tags.tag_name')->
            leftJoin('tags', 'notes.tag_id', '=', 'tags.id')->
            where('notes.user_id', $user->id)->
            get();
            
        $tags = \App\Tag::where('user_id', $user->id)->get();
        return view('home')->with(compact('notes'))->with(compact('tags'));
    }
}
?>