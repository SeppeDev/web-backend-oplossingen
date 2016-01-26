<?php

namespace App\Policies;

use App\User;
use App\Todolist;
use App\Todo;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodolistPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }




    public function destroy( User $user, Todolist $todolist )
    {

        return $user->id === $todolist->user_id;

    }
}
