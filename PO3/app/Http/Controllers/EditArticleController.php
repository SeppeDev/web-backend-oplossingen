<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Policies\ArticlePolicy;

class EditArticleController extends Controller
{
    public function index(Request $request, Article $article)
    {
    	$this->authorize( "destroy", $article );

        return view('editArticle/index', [
            'article' => $article,
        ]);
    }
}
