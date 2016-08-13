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
}