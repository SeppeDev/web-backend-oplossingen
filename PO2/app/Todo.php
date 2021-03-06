<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [	"name",
    						];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [	"remember_token",
    						];




    /**
    *   Getting the todos user
    */
    public function user()
    {

        return $this->belongsTo( User::class );

    }


    /**
    *   Getting the todos todolist
    */
    public function todolist()
    {

        return $this->belongsTo( User::class );

    }
}
