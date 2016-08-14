<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    /**
     * Get all of the users
     *
     * @return Collection
     */
    public function all()
    {
        return User::orderBy('id', 'asc')
                        ->get();
    }

    public function userById( $user_id )
    {

        return User::where( 'id', $user_id )
                    ->get();

    }
}