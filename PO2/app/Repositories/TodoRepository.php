<?php

namespace App\Repositories;

use App\User;
use App\Todolist;
use App\Todo;

class TodoRepository
{

    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */

    public function todoForUser( User $user )
    {

        return Todo::where( 'user_id', $user->id )
                    ->where( "done", 0 )
                    ->orderBy( 'created_at', 'asc' )
                    ->get();

    }

    public function doneForUser( User $user )
    {

        return Todo::where( 'user_id', $user->id )
                    ->where( "done", 1 )
                    ->orderBy( 'created_at', 'asc' )
                    ->get();

    }


    public function todoForList( User $user, Todolist $todolist )
    {

        return Todo::where( 'user_id', $user->id )
                    ->where( "todolist_id", $todolist->id )
                    ->where( "done", 0 )
                    ->orderBy( 'created_at', 'asc' )
                    ->get();

    }

    public function doneForList( User $user, Todolist $todolist )
    {

        return Todo::where( 'user_id', $user->id )
                    ->where( "todolist_id", $todolist->id )
                    ->where( "done", 1 )
                    ->orderBy( 'created_at', 'asc' )
                    ->get();

    }

}