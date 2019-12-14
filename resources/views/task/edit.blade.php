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
            <form action="/task/update/{{$task->id}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                @method("PUT")
                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Task Name</label>

                    <div class="col-sm-6">
                        <input type="text" name="task_name" id="task-name" class="form-control"
                               value="{{$task->task_name}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Task Description</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" col="4" id="task-description" name="description"
                                  placeholder="Enter Description">{{$task->description}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Category</label>

                    <div class="col-sm-6">
                        <select name="category" id="task-category" class="form-control">
                            <option selected>Choose Category...</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" <?php if ($category->id == $task->category_id) {
                                    echo 'selected';
                                }?> >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Status</label>

                    <div class="col-sm-6">
                        <select name="status" id="task-category" class="form-control">
                            <option selected>Choose Status..</option>
                            <option value="created" <?php if ($task->status == 'created') {
                                echo 'selected';
                            }?> >created
                            </option>
                            <option value="in_progress" <?php if ($task->status == 'in_progress') {
                                echo 'selected';
                            }?>>In Progress
                            </option>
                            <option value="completed" <?php if ($task->status == 'completed') {
                                echo 'selected';
                            }?>>Completed
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Update Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
