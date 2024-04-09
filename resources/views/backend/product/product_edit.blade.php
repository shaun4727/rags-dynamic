@extends('backend.master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Main content -->
<section class="content">

 <!-- Basic Forms -->
  <div class="box">
    <div class="box-header with-border">
      <h4 class="box-title">Add Product</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col">
            <form method="POST" action="{{ route('product.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="old_image" value="{{ $product->thumbnail }}">
              <div class="row">
                <div class="col-12">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Category Select</h5>
                                <div class="controls">
                                    <select name="category_id" id="select" class="form-control" >
                                        <option value="" selected="" disabled>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id?'selected':'' }}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Sub Category Select</h5>
                                <div class="controls">
                                    <select name="subcategory_id" id="select" class="form-control" >
                                        <option value="" selected="" disabled>Select SubCategory</option>
                                        @foreach($subCategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcategory_id?'selected':'' }}>{{ $subcategory->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Name</h5>
                                <div class="controls">
                                    <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Description</h5>
                                <div class="controls">
                                    <textarea type="text" id="editor1" name="description" class="form-control" >{{ $product->description }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Product Thumbnail</h5>
                                <div class="controls">
                                    <input type="file" name="product_thumbnail" class="form-control">
                                </div>
                                <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

              </div>
              <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_4" value="1" name="status" {{ $product->status == 1?'checked':'' }} >
                                    <label for="checkbox_4">Status</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-info" value="Update Product">
                </div>
            </form>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>

<script type="text/javascript">
$(document).ready(function(){
    $('select[name="category_id"]').on('change', function(){
              var category_id = $(this).val();
              if(category_id) {
                  $.ajax({
                      url: "{{  url('/subcategory/subcategory/ajax') }}/"+category_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {

                         var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');
                            });
                      },
                  });
              } else {
                  alert('danger');
              }
          });



})



</script>



@endsection

