@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <p>
                        Welcome {{ Auth::user()->name }}
                    </p>

                        <br />
                
                    <a href="{{ url('/todos') }}">Go to your TODOs</a>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
