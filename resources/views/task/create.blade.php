@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <div class="card-header">
            <div class="col-sm-6 text-left">
                {{ __('Tasks') }}
            </div>
        </div>

        <div class="card-body">
            <!-- New Task Form Tasks   -->
            <form action="/task" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Task Name</label>

                    <div class="col-sm-6">
                        <input type="text" name="task_name" id="task-name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Task Description</label>

                    <div class="col-sm-6">
                        <textarea class="form-control" col="4" id="task-description" name="description"
                                  placeholder="Enter Description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Task</label>

                    <div class="col-sm-6">
                        <select name="category" id="task-category" class="form-control">
                            <option selected>Choose Category...</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Add Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
