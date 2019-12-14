@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <div class="card">
            <div class="card-header">

                <div class="col-sm-6 text-left">
                    {{ __('Categories') }}
                </div>
                <div class="col-sm-6 text-right">

                </div>

            </div>

            <div class="card-body">
                <div class="text-right">
                    <a href="/category" class="btn btn-success mb-2">All</a>
                    <a href="/category/create" class="btn btn-success mb-2">Add</a>
                    <form class="d-inline-block" action="/category/{{ $category->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </div>

                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Category Name</td>
                        <td>{{$category->name}}</td>
                    </tr>
                    <tr>
                        <td>Display Name</td>
                        <td>{{$category->display_name}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            @if($category->is_active)
                                {!! "<span class='btn btn-sm btn-success'>Active</span>" !!}
                            @else
                                {!! "<span class='btn btn-sm btn-warning'>Active</span>" !!}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{$category->description}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- TODO: Current Tasks -->
@endsection
