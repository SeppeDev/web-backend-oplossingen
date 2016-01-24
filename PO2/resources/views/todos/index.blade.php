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

                <div class="panel-body">
                    <table class="table table-striped todo-table">

                        <!-- Table Headings -->
                        <thead>
                            <th>Todo</th>
                            <th>&nbsp;</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            @foreach ($todos as $todo)
                                <tr>
                                    <!-- Todo Name -->
                                    <td class="table-text">
                                        <div>{{ $todo->name }}</div>
                                    </td>

                                    <!-- Delete Button -->
                                    <td>
                                        <form action="{{ url('todo/'.$todo->id) }}" method="POST">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}

                                            <button>Delete Todo</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </div>

    <!-- TODO: Current Todos -->
@endsection