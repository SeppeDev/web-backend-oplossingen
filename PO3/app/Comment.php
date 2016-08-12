<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content'];

    /*Get the user that owns the vote.*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*Get the article that owns the article.*/
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
