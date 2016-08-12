<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*Get all of the articles for the user.*/
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /*Get all of the comments for the user.*/
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /*Get all of the votes for the user.*/
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
