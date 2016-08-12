<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'url'];

    /*Get the user that owns the article.*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*Get all of the comments for the article.*/
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /*Get all of the votes for the article.*/
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
