<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todolist;
use App\Repositories\TodolistRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TodolistController extends Controller
{
    
	protected $todolists;




    
	public function __construct( TodolistRepository $todolists )
	{

		$this->middleware( "auth" );

		$this->todolists =$todolists;

	}






	public function index( Request $request )
	{

		return view(	"todolists.index",
						[ "todolists" => $this->todolists->todolistForUser( $request->user() ),
						] );

	}


	public function store( Request $request )
	{

		$this->validate( $request, [			"name" => "required|max:255",
												] );

		$request->user()->todolists()->create( [	"name" => $request->name,
												] );

		return redirect( "/todolists" );

	}


	public function update( Request $request, Todolist $todolist )
	{

		$this->authorize( "destroy", $todolist );

		$todolist->done = !($todolist->done);
		$todolist->save();

		return redirect( "/todolists" );

	}


	public function destroy( Request $request, Todolist $todolist )
	{

		$this->authorize( "destroy", $todolist );

		$todolist->delete();

		return redirect( "/todolists" );

	}

}
