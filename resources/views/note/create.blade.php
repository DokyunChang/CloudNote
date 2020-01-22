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
                    <form action="/notes" method='POST'>
                        <h2>Title</h2>
                        <input type="text" name="title" autocomplete='off'>
                        <h3>Tag</h3>
                        <select id='tagSelect' name='tag'>
                            <option value='None'>None</option>
                            @foreach($tags as $tag)
                                <option value='{{ $tag->id }}'>{{ $tag->tag_name}}</option>
                            @endforeach
                        </select>
                        <h3>Body</h3>
                        <textarea style='width:100%' rows='10' name='body'></textarea>
                        <button type='submit'>Save</button>
                        {{ csrf_field() }}
                    </form> 
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li style='color: red'>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @include('note.script')
@endsection