@extends('backend.master')
@section('content')

 <!-- Main content -->
 <section class="content">
    <div class="row">



        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Category List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Show In Top Nav</th>
                                    <th>Show In Home Page</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->category_name }}</td>
                                        <td>
                                            @if($category->showInTopNav == 1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($category->showInHome == 1)
                                                    <span class="badge badge-pill badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($category->position == 1)
                                                    <span class="badge badge-pill badge-success">First</span>
                                            @elseif($category->position == 2)
                                                <span class="badge badge-pill badge-success">Second</span>
                                            @else
                                                <span class="badge badge-pill badge-success">No Position</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info"> <i class="fa fa-pencil"></i> </a>
                                            <a href="{{ route('category.delete', $category->id) }}" id="delete-brand" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.box -->
        </div>

        {{-- add brand name --}}
        <div class="col-4">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="POST" action="{{ route('category.store') }}" >
                            @csrf


                            <div class="form-group">
                                <h5>Category Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name" class="form-control" required=""
                                    >
                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_1" value="1" name="showInTopNav" >
                                            <label for="checkbox_1">Show In Top Nav</label>
                                        </fieldset>
                                    </div>
                                </div>
                                @if($positionTracker->positionAvailable != 0)
                                <div class="form-group mt-2">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_2" value="1" name="showInHome" >
                                            <label for="checkbox_2">Show In Home Page</label>
                                        </fieldset>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group mt-2">
                                    <h5 class="my-10">Select box</h5>
                                    <select class="selectpicker" name="position">
                                        <option value="">No Position</option>
                                        <option value="1" {{ $positionTracker->bookedPosition === 'first'?'disabled':'' }}>First</option>
                                        <option value="2" {{ $positionTracker->bookedPosition === 'second'?'disabled':'' }}>Second</option>
                                    </select>
                                </div>
                            </div>









                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

@endsection
