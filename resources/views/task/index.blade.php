@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <div class="card">
            <div class="card-header">
                <div class="col-sm-6 text-left">
                    {{ __('Tasks') }}
                </div>

            </div>

            <div class="card-body">
                <div class="text-right">
                    <a href="/task/create" class="btn btn-success mb-2 ">Add</a>
                </div>
                <!-- NewTasksk Form -->
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{$task->task_name}}</td>
                            <td>{{substr($task->description .'...', 0, 50)}}</td>
                            <td>{{$task->category_name}}</td>
                            <td>
                                @if($task->status == 'created')
                                    {!! "<span class='btn btn-sm btn-primary'>Created</span>" !!}
                                @elseif($task->status == 'in_progress')
                                    {!! "<span class='btn btn-sm btn-warning'>In Progress</span>" !!}
                                @else
                                    {!! "<span class='btn btn-sm btn-success'>Completed</span>" !!}
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-sm btn-success" href="/task/{{$task->id}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-primary" href="/task/{{$task->id}}/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form class="d-inline-block" action="/task/{{ $task->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button onclick="return confirm('Are you sure?')" class="btn-sm btn btn-danger"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- TODO: Current TTask-->
@endsection
