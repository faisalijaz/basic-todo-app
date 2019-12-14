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
            <form action="/category/update/{{$category->id}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                @method("PUT")
                <div class="form-group">
                    <label for="Category" class="col-sm-3 control-label">Category Name</label>

                    <div class="col-sm-6">
                        <input type="text" name="category_name" id="category-name" class="form-control"
                               value="{{$category->name}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Category" class="col-sm-3 control-label">Display Name</label>

                    <div class="col-sm-6">
                        <input type="text" name="display_name" id="Display-name" class="form-control"
                               value="{{$category->display_name}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Category" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-6">
                        <textarea class="form-control" col="4" id="category-description" name="description"
                                  placeholder="Enter Description">{{$category->description}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Status</label>

                    <div class="col-sm-6">
                        <select name="is_active" id="task-category" class="form-control">
                            <option selected>Choose Status..</option>
                            <option value="1" <?php if ($category->is_active) {
                                echo 'selected';
                            }?> > Active
                            </option>
                            <option value="0" <?php if (!$category->is_active) {
                                echo 'selected';
                            }?>>In Active
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Update Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
