<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;
use App\Repositories\TodoRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{

	protected $todos;




    
	public function __construct( TodoRepository $todos )
	{

		$this->middleware( "auth" );

		$this->todos =$todos;

	}






	public function index( Request $request )
	{

		return view(	"todos.index",
						[ "todos" => $this->todos->forUser( $request->user() ),
						] );

	}


	public function store( Request $request )
	{

		$this->validate( $request, [			"name" => "required|max:255",
												] );

		$request->user()->todos()->create( [	"name" => $request->name,
												] );

		return redirect( "/todos" );

	}


	public function destroy( Request $request, Todo $todo )
	{

		$this->authorize( "destroy", $todo );

		$todo->delete();

		return redirect( "/todos" );

	}

}
