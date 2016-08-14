<?php

namespace App\Http\Controllers;

use App\Article;
use App\Vote;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VoteController extends Controller
{

	/*Upvote*/
    public function up(Request $request, Article $article)
	{
		/*Create a new entry if it doesn't already exist or updates it*/
	    $vote = Vote::updateOrCreate([
	    		'user_id' => auth()->user()->id,
	        	'article_id' => $article->id
	    	],
	    	[
	    		'vote' => true
	    	]);

		return redirect()->back()->with("success", "You have upvoted '$article->title'");
	}

	/*Downvote*/
	public function down(Request $request, Article $article)
	{
	    /*Create a new entry if it doesn't already exist or updates it*/
	    $vote = Vote::updateOrCreate([
	    		'user_id' => auth()->user()->id,
	        	'article_id' => $article->id
	    	],
	    	[
	    		'vote' => false
	    	]);

		return redirect()->back()->with("success", "You have downvoted '$article->title'");
	}
}
