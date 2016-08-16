<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Policies\CommentPolicy;

class EditCommentController extends Controller
{
    public function index(Request $request, Comment $comment)
    {
    	$this->authorize( "destroy", $comment );

        return view('editComment/index', [
            'comment' => $comment,
        ]);
    }
}