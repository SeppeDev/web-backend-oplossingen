<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'article_id',  'vote'];

    /*Get the user that owns the vote.*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*Get the article that owns the vote.*/
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
