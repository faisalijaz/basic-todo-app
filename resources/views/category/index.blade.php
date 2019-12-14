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
                    <a href="/category/create" class="btn btn-success mb-2">Add</a>
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->display_name}}</td>

                            <td>
                                @if($category->is_active)
                                    {!! "<span class='btn btn-sm btn-primary'>Active</span>" !!}
                                @else
                                    {!! "<span class='btn btn-sm btn-danger'>In Active</span>" !!}
                                @endif
                            </td>

                            <td>

                                <a class="btn btn-sm btn-success" href="/category/{{$category->id}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-primary" href="/category/{{$category->id}}/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form class="d-inline-block" action="/category/{{ $category->id }}" method="POST">
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
        <!-- TODO: Current Tasks -->
@endsection
