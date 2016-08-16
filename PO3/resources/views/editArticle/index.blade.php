@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

        <!-- Bootstrap Boilerplate... -->

            <!-- Display Validation Errors -->
            @include('common.delete')
            @include('common.errors')
            @include('common.success')

            <div class="breadcrumb">

                <a href="{{ url('/') }}">← back to overview</a>
            </div>

            <div class="panel panel-default">

                <div class="panel-heading">

                    Edit Article

                    <a href="{{ url('/article/delete/'.$article->id) }}" class="btn btn-danger btn-xs pull-right">
                        <i class="fa fa-btn fa-trash" title="delete"></i> delete article
                    </a>

                </div>

                <div class="panel-content">

                <!-- Edit Article Form -->
                <form action="{{ url('article/editNow/'.$article->id) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Article Title -->
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Title (max. 255 characters)</label>

                        <div class="col-sm-6">
                            <input type="text" name="title" id="title" class="form-control" value="{{$article->title}}">
                        </div>
                    </div>

                    <!-- Article url -->
                    <div class="form-group">
                        <label for="url" class="col-sm-3 control-label">URL</label>

                        <div class="col-sm-6">
                            <input type="text" name="url" id="url" class="form-control" value="{{$article->url}}">
                        </div>
                    </div>

                    <!-- Edit Article Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> Edit Article
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection