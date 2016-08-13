<?php

namespace App\Repositories;

use App\Article;

class ArticleRepository
{
    /**
     * Get all of the articles
     *
     * @return Collection
     */
    public function all()
    {
        return Article::orderBy('created_at', 'asc')
                        ->get();
    }
}