<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class AuthenticationController extends Controller
{

	public function getLogin()
	{

		return view( "login" );

	}

	public function postLogin()
	{

		$rules		= array( "username" => "required", "password" => "required" );
		$validator	= Validator::make( Input::all(), $rules );

		if( $validator->fails() )
		{

			return Redirect::route( "login" ) -> withErrors( $validator );

		}

		$auth = Auth::attempt( array(	"name"		=> Input::get( "username" ),
										"password"	=> Input::get( "password" )
									) );

		if( !$auth )
		{

			return Redirect::route( "login" )->withErrors( array(
																	"The username and/or password are incorrect"
																) );

		}

		return Redirect::route( "home" );

	}

}