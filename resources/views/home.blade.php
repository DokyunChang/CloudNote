@extends('layouts.app')

@section('style')
    @include('note.style')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Notes</div>

                <div class="panel-body">
                    <input type="text" id="noteFilter" onkeyup="filterFunction()" placeholder="Search for note..">
                    <span style='font-size: 16px;'>
                        &nbsp Tag:
                        <select id='tagSelect' onchange='filterFunction()'>
                            <option value="All">All</option>
                            @foreach($tags as $tag)
                                <option value='{{ $tag->tag_name }}'>{{ $tag->tag_name }}
                            @endforeach
                            
                        </select>
                        <form action='/notes/create' method='GET'>
                            <button type='submit'>New</button>
                        </form>
                    </span>
                    <table id="noteTable">
                    <tr class="header">
                        <th style="width:60%;">Note</th>
                        <th style="width:40%;">Tag</th>
                    </tr>
                    @forelse($notes as $note)
                    <tr>
                        <td><a href='/notes/{{ $note->id }}'>{{ $note->title }}<a></td>
                        <td>{{ $note->tag_name }}</td>
                    </tr>
                    @empty
                        <tr><td>Cloud Note is empty</td></tr>
                    @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @include('note.script')
@endsection