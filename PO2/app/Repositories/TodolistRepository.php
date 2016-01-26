<?php

namespace App\Repositories;

use App\User;
use App\Todolist;
use App\Todo;

class TodolistRepository
{

    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */

    public function todolistForUser( User $user )
    {

        return Todolist::where( 'user_id', $user->id )
                        ->where( "done", 0 )
                        ->orderBy( 'created_at', 'asc' )
                        ->get();

    }

    public function donelistForUser( User $user )
    {

        return Todolist::where( 'user_id', $user->id )
                        ->where( "done", 1 )
                        ->orderBy( 'created_at', 'asc' )
                        ->get();

    }

}