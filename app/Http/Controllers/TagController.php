<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $user = auth()->user();
        $tags = \App\Tag::where('user_id', $user->id)->get();
        return view('tag.index')->with(compact('tags'));
    }

    public function store(){
        $data = request()->validate([
            'tag_name' => 'required|max:10'

        ]);
        $user = auth()->user();
        $tag = new \App\Tag();

        $tag->tag_name = request('tag_name');
        $tag->user_id = $user->id;
        $tag->save();
        return redirect()->back();
    }

    public function destroy($tag){
        $notes = \App\Note::where('tag_id', $tag)->delete();
        \App\Tag::destroy($tag);
        return redirect()->back();
    }
}