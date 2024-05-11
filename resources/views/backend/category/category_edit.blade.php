@extends('backend.master')

@section('content')
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">





            {{-- add brand name --}}
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{ route('category.update') }}" >
                                @csrf

                                <input type="hidden" value="{{  $category->id}}" name="id">
                                <div class="form-group">
                                    <h5>Category Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" required=""
                                        >
                                        @error('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_1" value="1" name="showInTopNav" {{ $category->showInTopNav == 1?'checked':'' }}>
                                            <label for="checkbox_1">Show In Top Nav</label>
                                        </fieldset>
                                    </div>
                                </div>
                                @if($positionTracker->positionAvailable != 0)
                                <div class="form-group mt-2">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_2" value="1" name="showInHome" {{ $category->showInHome == 1?'checked':'' }} >
                                            <label for="checkbox_2">Show In Home Page</label>
                                        </fieldset>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group mt-2">
                                    <h5 class="my-10">Select box</h5>
                                    <select class="selectpicker" name="position">
                                        <option value="" {{ $category->position == 0?'selected':'' }}>No Position</option>
                                        <option value="1" {{ $category->position == 1?'selected':'' }} {{ $positionTracker->bookedPosition === 'first'?'disabled':'' }}>First</option>
                                        <option value="2" {{ $category->position == 2?'selected':'' }} {{ $positionTracker->bookedPosition === 'second'?'disabled':'' }}>Second</option>
                                    </select>
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update">
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
