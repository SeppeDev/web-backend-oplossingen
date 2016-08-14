@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <!-- Bootstrap Boilerplate... -->

            <!-- Display Validation Errors -->
            @include('common.errors')
            @include('common.success')

            <div class="breadcrumb">

                <a href="{{ url('/') }}">← back to overview</a>
            </div>

            <div class="panel panel-default">

                <div class="panel-heading">Article: {{$article->title}}

                    @if($article->user_id == Auth::user()->id)

                        <a href="{{ url('/article/delete/'.$article->id) }}" class="btn btn-danger btn-xs pull-right">
                            <i class="fa fa-btn fa-trash" title="delete"></i> delete article
                        </a>

                    @endif

                </div>

                <div class="panel-content">

                    <ul class="article-overview">
                        <li>

                            <div class="vote">

                                    @if (Auth::check())
                                        
                                        <?php $canVote = true ?>

                                        @if($article->user_id == Auth::user()->id)
                                        
                                            <div class="form-inline upvote">

                                                <i class="fa fa-btn fa-caret-up disabled upvote" title="You cant upvote your own articles"></i>

                                            </div>

                                        @else
                                        
                                            @foreach($votes as $vote)

                                                @if(Auth::user()->id == $vote->user_id && $article->id == $vote->article_id && $vote->vote == true)

                                                    <div class="form-inline upvote">

                                                        <i class="fa fa-btn fa-caret-up disabled upvote" title="You can only upvote once"></i>

                                                    </div>

                                                    <?php $canVote = false ?>

                                                @endif

                                            @endforeach

                                            @if($canVote)

                                                <form action="{{ url('/vote/up/'.$article->id) }}" method="POST" class="form-inline upvote">
                                                    {!! csrf_field() !!}

                                                    <button>

                                                        <i class="fa fa-btn fa-caret-up" title="upvote"></i>

                                                    </button>

                                                </form>

                                            @endif

                                        @endif

                                    @else

                                        <div class="form-inline upvote">

                                            <i class="fa fa-btn fa-caret-up disabled upvote" title="You need to be logged in to upvote"></i>

                                        </div>

                                    @endif

                                    @if (Auth::check())

                                        <?php $canVote = true ?>

                                        @if($article->user_id == Auth::user()->id)
                                        
                                            <div class="form-inline upvote">

                                                <i class="fa fa-btn fa-caret-down disabled upvote" title="You cant downvote your own articles"></i>

                                            </div>

                                        @else
                                        
                                            @foreach($votes as $vote)

                                                @if(Auth::user()->id == $vote->user_id && $article->id == $vote->article_id && $vote->vote == false)

                                                    <div class="form-inline downvote">

                                                        <i class="fa fa-btn fa-caret-down disabled downvote" title="You can only downvote once"></i>

                                                    </div>

                                                    <?php $canVote = false ?>
                                                    
                                                @endif

                                            @endforeach

                                            @if($canVote)

                                                <form action="{{ url('/vote/down/'.$article->id) }}" method="POST" class="form-inline downvote">
                                                    {!! csrf_field() !!}

                                                    <button>

                                                        <i class="fa fa-btn fa-caret-down" title="downvote"></i>

                                                    </button>

                                                </form>

                                            @endif

                                        @endif

                                    @else

                                        <div class="form-inline upvote">

                                            <i class="fa fa-btn fa-caret-down disabled downvote" title="You need to be logged in to downvote"></i>

                                        </div>

                                    @endif

                                </div>

                            <div class="url">

                                <a href="{{ $article->url }}" class="urlTitle">{{ $article->title }}</a>

                                @if($article->user_id == Auth::user()->id)

                                        <a href="{{ url('/article/edit/'.$article->id) }}" class ="btn btn-primary btn-xs edit-btn">edit</a>

                                    @endif

                            </div>

                            <div class="info">
                            
                                <?php
                                    $points = 0;
                                    foreach ($votes as $vote)
                                    {
                                        if ($vote->vote == true)
                                        {
                                            $points = $points + 1;
                                        }
                                        else
                                        {
                                            $points = $points - 1;
                                        }
                                    }
                                    echo $points;
                                ?>

                                points

                                | 

                                posted by

                                @foreach ($users as $user)
                                    @if ($user->id == $article->user_id)
                                        {{$user->name}}
                                    @endif
                                @endforeach

                                |
 
                                {{$comments->where('article_id', $article->id)->count()}}
                                comments

                            </div>

                            <div class="comments">
                            
                                <ul>

                                <?php $hasComments = false ?>

                                    @foreach($comments as $comment)

                                        <li>

                                            <div class="comment-body">{{$comment->content}}</div>

                                            <div class="comment-info">

                                                Posted by

                                                @foreach ($users as $user)
                                                    @if ($user->id == $comment->user_id)
                                                        {{$user->name}}
                                                    @endif
                                                @endforeach

                                                on

                                                {{$comment->updated_at}}

                                                @if($comment->user_id == Auth::user()->id)

                                                    <a href="{{ url('/article/edit/'.$article->id) }}" class ="btn btn-primary btn-xs edit-btn">edit</a>

                                                    <a href="{{ url('/article/delete/'.$article->id) }}" class="btn btn-danger btn-xs">
                                                        <i class="fa fa-btn fa-trash" title="delete"></i> delete
                                                    </a>

                                                @endif

                                            </div>

                                        </li>

                                        <?php $hasComments = true ?>

                                    @endforeach

                                </ul>

                                @if($hasComments == false)

                                    No comments yet

                                @endif

                            </div>

                        </li>
                    </ul>
                </div>

                <form action="{{ url('comments/add') }}" method="POST" class="form-horizontal">

                    {{ csrf_field() }}

                    <div class="form-group">

                        <label for="content" class="col-sm-3 control-label">Comment</label>

                        <div class="col-sm-6">

                            <textarea type="text" name="content" id="content" class="form-control"></textarea>
                        
                        </div>

                    </div>

                    <input type="hidden" name="article_id" value="{{$article->id}}">

                    <div class="form-group">

                        <div class="col-sm-offset-3 col-sm-6">

                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> Add Comment
                            </button>

                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
