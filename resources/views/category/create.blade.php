@extends('layouts.app')

@section('content')


    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <div class="card-header">
            <div class="col-sm-6 text-left">
                {{ __('Categories') }}
            </div>
        </div>

        <div class="card-body">
            <form action="/category" method="POST" class="form-horizontal">
            {{ csrf_field() }}

                <div class="form-group">
                    <label for="Category" class="col-sm-3 control-label">Category Name</label>

                    <div class="col-sm-6">
                        <input type="text" name="category_name" id="category-name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Category" class="col-sm-3 control-label">Display Name</label>

                    <div class="col-sm-6">
                        <input type="text" name="display_name" id="Display-name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Category" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-6">
                        <textarea class="form-control" col="4" id="category-description" name="description"
                                  placeholder="Enter Description"></textarea>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Add Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
