<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;
use App\Todolist;
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
						[ "todos" => $this->todos->todoForUser( $request->user() ),
						  "dones" => $this->todos->doneForUser( $request->user() ),
						] );

	}

	public function indexList( Request $request, Todolist $todolist )
	{

		return view(	"todos.index",
						[ "todos" => $this->todos->todoForList( $request->user(), $todolist ),
						  "dones" => $this->todos->doneForList( $request->user(), $todolist ),
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


	public function update( Request $request, Todo $todo )
	{

		$this->authorize( "destroy", $todo );

		$todo->done = !($todo->done);
		$todo->save();

		return redirect( "/todos" );

	}


	public function destroy( Request $request, Todo $todo )
	{

		$this->authorize( "destroy", $todo );

		$todo->delete();

		return redirect( "/todos" );

	}

	public function destroyFromList( Request $request, Todo $todo )
	{

		$this->authorize( "destroyFromList", $todo );

		$todo->delete();

		return redirect( "/todos" );

	}

}
