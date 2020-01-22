@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tag Page</div>

                <div class="panel-body">
                    Create new tag
                    <form action="/tags" method='POST'>
                        <input type="text" name="tag_name" autocomplete='off' value="">
                        <button type='submit'>Add Tag</button>
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

                @forelse($tags as $tag)
                    <div class="panel-body">
                        {{ $tag->tag_name}}
                        <span style='float: right'>
                            <form action='/tags/delete/{{ $tag->id }}' method='POST'>
                                <button>DELETE</button>
                                {{ csrf_field() }}
                            </form>
                        </span>
                    </div>
                @empty
                    <div class="panel-body">
                        No additional tags
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection