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

    private function points()
    {
        $pointArray = [];

        foreach ($this->articles->all() as $article)
        {
            $points = 0;

            foreach ($this->votes->all() as $vote)
            {
                if ($vote->article_id == $article->id)
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
            }

            $pointArray = array_add($pointArray, $article->id, $points);
        }

        return $pointArray;
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
            'comments' => $this->comments->all(),
            'points' => $this->points()
        ]);
    }
}
