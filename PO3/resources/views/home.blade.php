@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <!-- Display Validation Errors -->
            @include('common.delete')
            @include('common.errors')
            @include('common.success')
        
            <div class="panel panel-default">
                <div class="panel-heading">Articles Overview</div>

                <div class="panel-content">

                    <ul class="article-overview">
                        @foreach ($articles as $article)
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

                                    @if (Auth::check())

                                        @if($article->user_id == Auth::user()->id)

                                            <a href="{{ url('/article/edit/'.$article->id) }}" class ="btn btn-primary btn-xs edit-btn">edit</a>

                                            <a href="{{ url('/article/delete/'.$article->id) }}" class="btn btn-danger btn-xs">
                                                <i class="fa fa-btn fa-trash" title="delete"></i> delete article
                                            </a>

                                        @endif

                                    @endif

                                </div>

                                <div class="info">
                                
                                    {{$points[$article->id]}}

                                    points

                                    |

                                    posted by

                                     @foreach ($users as $user)
                                        @if ($user->id == $article->user_id)
                                            {{$user->name}}
                                        @endif
                                     @endforeach

                                    |

                                     <a href="{{ url('/comments/'.$article->id) }}">   
                                        {{$comments->where('article_id', $article->id)->count()}}

                                     comments</a>

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
