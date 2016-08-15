<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\VoteRepository;
use App\Repositories\CommentRepository;
use App\Policies\CommentPolicy;

class CommentController extends Controller
{
    protected $users;
    protected $articles;
    protected $votes;
    protected $comments;

    public function __construct(UserRepository $users, ArticleRepository $articles, VoteRepository $votes, CommentRepository $comments)
    {
        $this->users = $users;
        $this->articles = $articles;
        $this->votes = $votes;
        $this->comments = $comments;
    }

    public function index(Request $request, Article $article)
    {
        return view('comments/index', [
            'users' => $this->users->all(),
            'article' => $article,
            'votes' => $this->votes->votesById($article->id),
            'comments' => $this->comments->commentsById($article->id)
        ]);
    }

    public function store( Request $request )
	{

		$request->user()->comments()->create( [	"content" => $request->content,
												"article_id" => $request->article_id
												] );

		return redirect()->back()->with("success", "Comment added succesfully.");

	}

    public function delete( Request $request, Comment $comment )
    {

        return redirect()->back()->with('delete', $comment);

    }

    public function destroy( Request $request, Comment $comment )
    {

        if($request->delete)
        {
            $this->authorize( "destroy", $comment );
            $comment->delete();

            return redirect()->back()->with('success', 'Comment succesfully deleted.');
        }
        else
        {
            return redirect()->back();
        }
    }
}
