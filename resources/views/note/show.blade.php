@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Notes</div>
                <div class="panel-body">
                    <h3>{{ $info->title }}</h3>
                    <hr>
                    <p>{{ $info->body }}</p>
                </div>
                <div class="panel-body">
                    <form action='/notes/{{ $info->id }}/edit' method='GET'>
                        <button>Edit</button>
                        {{ csrf_field() }}
                    </form>
                    <br>
                    <form action='/notes/delete/{{ $info->id }}' method='POST'>
                        <button>Delete</button>
                        {{ csrf_field() }}
                    </form>
                    <br>
                    <form action='/' method='GET'>
                        <button>Back</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection