<?php

namespace App\Repositories;

use App\Vote;

class VoteRepository
{
    /**
     * Get all of the votes
     *
     * @return Collection
     */
    public function all()
    {
        return Vote::orderBy('article_id', 'asc')
                        ->get();
    }

    public function votesById( $article_id )
    {

        return Vote::where( 'article_id', $article_id )
                    ->get();

    }
}