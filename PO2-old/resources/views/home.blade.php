@extends( "layouts.main" )


@section( "content" )

	<h1>Your Items</h1>

	<ul>

		@foreach( $todos as $todo )

			<li>
				{{ Form::open() }}

					{{ $todo->name }}

				{{ Form::close() }}</li>

		@endforeach

	</ul>

@stop