<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;

class HomeController extends Controller
{
    /**
     * The article repository instance.
     *
     * @var ArticleRepository
     */
    protected $articles;

    /**
     * Create a new controller instance.
     *
     * @param  ArticleRepository  $articles
     * @return void
     */
    public function __construct(ArticleRepository $articles)
    {
        $this->articles = $articles;
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
            'articles' => $this->articles->all(),
        ]);
    }
}
