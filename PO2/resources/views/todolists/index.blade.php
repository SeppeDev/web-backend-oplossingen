@extends( "layouts.app" )

@section( "content" )

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include( 'common.errors' )


        <!-- New Todolist Form -->
        <form action="{{ url( 'todolist' ) }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- Todolist Name -->
            <div class="form-group">
                <label for="todolist-name" class="col-sm-3 control-label">Todolist</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="todolist-name" class="form-control">
                </div>
            </div>

            <!-- Add Todolist Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add ToDolist
                    </button>
                </div>
            </div>
        </form>

    </div>

    <div class="panel-body">
        
        <!-- Current Todolists -->
        @if (count($todolists) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current todolists
                </div>

                <div class="panel-body">
                    <table class="table table-striped todolist-table">

                        <!-- Table Body -->
                        <tbody>
                            @foreach ($todolists as $todolist)
                                <tr>
                                    <!-- Todolist Name -->
                                    <td class="table-text">
                                        <a href="{{ url('todolists/'.$todolist->id) }}">{{ $todolist->name }}</a>
                                    </td>

                                    <!-- Delete Button -->
                                    <td>
                                        <form action="{{ url('todolist/'.$todolist->id) }}" method="POST">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}

                                            <button>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        

        @else
            <div class="notAList">
                <p>
                    There you go, that's it, all done!
                </p>
            </div>
        @endif

    </div>

    

    
@endsection

@section( "todolists" )

    @if (count($todolists) > 0)
        @foreach ($todolists as $todolist)
            <li><a href="{{ url('todolists/'.$todolist->id) }}">{{ $todolist->name }}</a></li>
        @endforeach
    @endif

@endsection