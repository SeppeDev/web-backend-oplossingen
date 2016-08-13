<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\VoteRepository;
use App\Repositories\CommentRepository;

class HomeController extends Controller
{
    /**
     * The article repository instance.
     *
     * @var ArticleRepository
     */
    protected $users;
    protected $articles;
    protected $votes;
    protected $comments;

    /**
     * Create a new controller instance.
     *
     * @param  ArticleRepository  $articles
     * @return void
     */
    public function __construct(UserRepository $users, ArticleRepository $articles, VoteRepository $votes, CommentRepository $comments)
    {
        $this->users = $users;
        $this->articles = $articles;
        $this->votes = $votes;
        $this->comments = $comments;
    }

    /**
     * Display a list of all of the articles.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('home', [
            'users' => $this->users->all(),
            'articles' => $this->articles->all(),
            'votes' => $this->votes->all(),
            'comments' => $this->comments->all()
        ]);
    }
}
