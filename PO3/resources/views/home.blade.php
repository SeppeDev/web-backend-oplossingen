@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Articles Overview</div>

                <div class="panel-content">
                    You are logged in!

                    <ul class="article-overview">
                        @foreach ($articles as $article)
                            <li>

                                <div class="vote">

                                    @if (Auth::check())

                                        <form action="{{ url('/vote/up/'.$article->id) }}" method="POST" class="form-inline upvote">
                                            {!! csrf_field() !!}

                                            <button>

                                                <i class="fa fa-btn fa-caret-up" title="upvote"></i>

                                            </button>

                                        </form>

                                    @else

                                        <div class="form-inline upvote">

                                            <i class="fa fa-btn fa-caret-up disabled upvote" title="You need to be logged in to upvote"></i>

                                        </div>

                                    @endif

                                    @if (Auth::check())

                                        <form action="{{ url('/vote/down/'.$article->id) }}" method="POST" class="form-inline downvote">
                                            {!! csrf_field() !!}

                                            <button>

                                                <i class="fa fa-btn fa-caret-down" title="downvote"></i>

                                            </button>

                                        </form>

                                    @else

                                        <div class="form-inline upvote">

                                            <i class="fa fa-btn fa-caret-down disabled downvote" title="You need to be logged in to downvote"></i>

                                        </div>

                                    @endif

                                </div>

                                <div class="url">

                                    <a href="{{ $article->url }}" class="urlTitle">{{ $article->title }}</a>

                                </div>

                                <div class="info">

                                    {{$article->points}} | {{$article->user_id}} | <a href="{{ url('/comments/'.$article->id) }}">{{$article->comments}} comments</a>

                                </div>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
