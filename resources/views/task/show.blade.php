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
                <div class="col-sm-6 text-right">

                </div>

            </div>

            <div class="card-body">
                <div class="text-right">
                    <a href="/task" class="btn btn-success mb-2">All</a>
                    <a href="/task/create" class="btn btn-success mb-2">Add</a>
                    <form class="d-inline-block" action="/task/{{ $task->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </div>

                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Task Name</td>
                        <td>{{$task->task_name}}</td>
                    </tr>
                    <tr>
                        <td>Category Name</td>
                        <td>{{$task->category->name}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            @if($task->status == 'created')
                                {!! "<span class='btn btn-sm btn-primary'>Created</span>" !!}
                            @elseif($task->status == 'in_progress')
                                {!! "<span class='btn btn-sm btn-warning'>In Progress</span>" !!}
                            @else
                                {!! "<span class='btn btn-sm btn-success'>Completed</span>" !!}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{$task->description}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- TODO: CurrentTasksk -->
@endsection
