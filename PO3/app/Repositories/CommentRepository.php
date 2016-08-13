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
}