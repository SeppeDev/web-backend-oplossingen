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

                    Edit Comment

                    <a href="{{ url('/comment/delete/'.$comment->id) }}" class="btn btn-danger btn-xs pull-right">
                        <i class="fa fa-btn fa-trash" title="delete"></i> delete comment
                    </a>

                </div>

                <div class="panel-content">

                <!-- Edit Comment Form -->
                <form action="{{ url('comment/editNow/'.$comment->id) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Comment Content -->
                    <div class="form-group">
                        <label for="content" class="col-sm-3 control-label">Comment</label>

                        <div class="col-sm-6">
                            <textarea type="text" name="content" id="content" class="form-control">{{$comment->content}}</textarea>
                        </div>
                    </div>

                    <!-- Edit Comment Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> Edit Comment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection