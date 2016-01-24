<?php

use Illuminate\Database\Seeder;


class TodosTableSeeder extends Seeder
{
    
    public function run()
    {
        
    	DB::table( "todos" )->delete();

    	$todos = array(
    				array(	"owner_id"   => "9",
    						"name"       => "Do something funny",
    						"done"       => "false"
    				),

                    array(  "owner_id"   => "9",
                            "name"       => "Eat pizza",
                            "done"       => "true"
                    ),

                    array(  "owner_id"   => "9",
                            "name"       => "Do Backend exam",
                            "done"       => "true"
                    )
    	);

    	DB::table( "todos" )->insert( $todos );

    }

}
