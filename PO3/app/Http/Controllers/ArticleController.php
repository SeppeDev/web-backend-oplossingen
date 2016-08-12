<?php

namespace App\Http\Controllers;

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

	    return redirect('/');
	}
}
