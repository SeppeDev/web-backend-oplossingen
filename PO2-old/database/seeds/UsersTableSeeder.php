<?php

use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    
    public function run()
    {
        
    	DB::table( "users" )->delete();

    	$users = array(
    				array(	"name"		=> "Jos",
    						"password"	=> Hash::make( "Jos" ),
    						"email"		=> "jos@jos.com"
    				)
    	);

    	DB::table( "users" )->insert( $users );

    }

}
