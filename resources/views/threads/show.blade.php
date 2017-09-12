@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Forum Threads</div>
                <div class="panel-body">
                    <article>                    
                        <h4>
                            <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> posted: 
                            {{ $thread->title }}
                        </h4>
                        <div class="body">{{ $thread->body }}</div>
                    </article>                        
                </div>
            </div>

            @foreach($replies as $reply)             
                @include('threads.reply')
            @endforeach 

            {{ $replies->links() }}

            @if(auth()->check())
                <form method="POST" action="{{ $thread->path() . '/replies' }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" id="body" class="form-control" placeholder="Have something to say?" rows="5">
                        </textarea>
                    </div>                    

                    <button class="btn btn-default" type="submit">Post</button>

                </form>
            @endif
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>
                        This thread was published {{ $thread->created_at->diffForHumans() }}. by <a href="#">{{ $thread->creator->name }}</a>, and currently has {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}. 
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
