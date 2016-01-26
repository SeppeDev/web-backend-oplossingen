<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
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
    *   Getting the todolists user
    */
    public function user()
    {

        return $this->belongsTo( User::class );

    }

    public function todos()
    {

        return $this->hasMany( Todo::class );

    }

}
