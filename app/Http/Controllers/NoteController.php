<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function create() {
        $user = auth()->user();
        $tags = \App\Tag::where('user_id', $user->id)->get();
        return view('note.create')->with(compact('tags'));
    }

    public function store() {
        $data = request()->validate([
            'title' => 'required|max:10',
            'body' => 'max:255'
        ]);

        $user = auth()->user();
        $note = new \App\Note();
        
        $note->title = request('title');
        $note->user_id = $user->id;

        if (request('tag') != 'None') {
            $note->tag_id = request('tag');
        }

        if (request('body') == null) {
            $note->body = '';
        } else {
            $note->body = request('body');
        }
        
        $note->save();
        $note->refresh();
        return redirect('/notes/'.$note->id);
    }

    public function show($note) {
        $info = \App\Note::where('id', $note)->first();
        return view('note.show')->with(compact('info'));
    }

    public function edit($note) {
        $info = \App\Note::where('id', $note)->first();
        return view('note.edit')->with(compact('info'));
    }

    public function update($note) {
        $data = request()->validate([
            'title' => 'required|max:10',
            'body' => 'max:255'
        ]);

        \App\Note::where('id', $note)->
            update(['title' => request('title'),
                'body' => request('body')
            ]);

        $info = \App\Note::where('id', $note)->first();
        return view('note.show')->with(compact('info'));
    }

    public function destroy($note) {
        $notes = \App\Note::where('id', $note)->delete();
        return redirect('home');
    }
}
