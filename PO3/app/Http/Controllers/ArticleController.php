<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
	{
	    return view('addArticle.index');
	}

	public function store(Request $request)
	{
	    $this->validate($request, [				'title' => 'required|max:255',
	    										'url' => 'required|active_url'
	    										]);

	    $request->user()->articles()->create([	'title' => $request->title,
	    										'url' => $request->url,
	    										]);

	    return redirect('/')->with("success", "Article '$request->title' created succesfully");
	}

	public function delete( Request $request, 	Article $article )
    {

        return redirect()->back()->with('delete', $article);

    }

    public function destroy( Request $request, Article $article )
    {

        if($request->delete)
        {
            $this->authorize( "destroy", $article );
            $article->delete();

            return redirect()->back()->with('success', 'Article succesfully deleted.');
        }
        else
        {
            return redirect()->back();
        }
    }
}
