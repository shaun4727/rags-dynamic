@extends('backend.master')

@section('content')
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">



            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Status </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td><img src="{{ asset('storage/'.$product->thumbnail) }}" alt="" style="width:60px; height:40px;"></td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>
                                                @if($product->status == 1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                <span class="badge badge-pill badge-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info"> <i class="fa fa-pencil"></i> </a>
                                                <a href="{{ route('product.delete', $product->id) }}" id="delete-brand" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
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

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection

