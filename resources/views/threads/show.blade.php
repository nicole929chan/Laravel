@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Forum Threads</div>
                <div class="panel-body">
                    <article>                    
                        <h4>
                            <a href="#">{{ $thread->creator->name }}</a> posted: 
                            {{ $thread->title }}
                        </h4>
                        <div class="body">{{ $thread->body }}</div>
                    </article>                        
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($thread->replies as $reply)             
                @include('threads.reply')

            @endforeach
        </div>
    </div>

    @if(auth()->check())
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="POST" action="{{ $thread->path() . '/replies' }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" id="body" class="form-control" placeholder="Have something to say?" rows="5">
                        </textarea>
                    </div>                    

                    <button class="btn btn-default" type="submit">Post</button>

                </form>
            </div>
        </div>
    @endif

</div>
@endsection
