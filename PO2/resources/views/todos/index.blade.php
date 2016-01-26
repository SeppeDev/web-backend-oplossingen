@extends( "layouts.app" )

@section( "content" )

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include( 'common.errors' )


        <!-- New Todo Form -->
        <form action="{{ url( 'todo' ) }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- Todo Name -->
            <div class="form-group">
                <label for="todo-name" class="col-sm-3 control-label">Todo</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="todo-name" class="form-control">
                </div>
            </div>

            <!-- Add Todo Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add ToDo
                    </button>
                </div>
            </div>
        </form>

    </div>

    <div class="panel-body">
        
        <!-- Current Todos -->
        @if (count($todos) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current todos
                </div>

                <div class="panel-body todoTable">
                    <table class="table table-striped todo-table">

                        <!-- Table Body -->
                        <tbody>
                            @foreach ($todos as $todo)
                                <tr>
                                    <!-- Todo Done -->
                                    <td class="table-text">
                                        <a href="{{ url('todos/'.$todo->id) }}" class="notDoneCheckBox"></a>
                                    </td>

                                    <!-- Todo Name -->
                                    <td class="table-text">
                                        <div class="notDoneText">{{ $todo->name }}</div>
                                    </td>

                                    <!-- Delete Button -->
                                    <td>
                                        <form action="{{ url('todo/'.$todo->id) }}" method="POST">
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
        @elseif ( count( $dones ) == 0 && count( $todos ) == 0 )

        @else
            <div class="notAList">
                <p>
                    There you go, that's it, all done!
                </p>
            </div>
        @endif

    </div>

    <div class="panel-body">
        
        <!-- Current Todos -->
        @if (count($dones) > 0)
            <div class="panel panel-default">
                <div class="panel-heading tableHeading">
                    Done
                </div>

                <div class="panel-body doneTable">
                    <table class="table table-striped todo-table">

                        <!-- Table Body -->
                        <tbody>
                            @foreach ($dones as $todo)
                                <tr>
                                    <!-- Todo Done -->
                                    <td class="table-text">
                                        <a href="{{ url('todos/'.$todo->id) }}" class="doneCheckBox"></a>
                                    </td>

                                    <!-- Todo Name -->
                                    <td class="table-text">
                                        <div class="doneText">{{ $todo->name }}</div>
                                    </td>

                                    <!-- Delete Button -->
                                    <td>
                                        <form action="{{ url('todo/'.$todo->id) }}" method="POST">
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
        @elseif ( count( $dones ) == 0 && count( $todos ) == 0 )

        @else
            <div class="notAList">
                <p>
                    Damn man, need to step it up!!!
                </p>
            </div>
        @endif

    </div>

    
@endsection