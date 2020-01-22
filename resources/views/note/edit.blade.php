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
                    <form action="/notes/{{ $info->id }}" method='POST'>
                        <input type="text" name="title" autocomplete='off' value='{{ $info->title }}'>
                        <br></br>
                        <textarea style='width:100%' rows='10' name='body'>{{ $info->body }}</textarea>
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