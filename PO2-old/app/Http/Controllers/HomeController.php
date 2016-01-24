<?php

namespace App\Http\Controllers;


use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class HomeController extends Controller{

	public function getIndex()
	{

		$todos = Auth::user()->todos;


		return view(	"home",
						array(
								"todos" => $todos
								)
					);

	}

}