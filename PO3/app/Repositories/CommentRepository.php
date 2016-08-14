<?php

namespace App\Repositories;

use App\Comment;

class CommentRepository
{
    /**
     * Get all of the comments
     *
     * @return Collection
     */
    public function all()
    {
        return Comment::orderBy('created_at', 'asc')
                        ->get();
    }

    public function commentsById( $article_id )
    {

        return Comment::where( 'article_id', $article_id )
                    ->get();

    }
}