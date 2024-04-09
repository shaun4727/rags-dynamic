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
            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
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
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Sub Category Select</h5>
                                <div class="controls">
                                    <select name="subcategory_id" id="select" class="form-control" >
                                        <option value="" selected="" disabled>Select SubCategory</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Name</h5>
                                <div class="controls">
                                    <input type="text" name="product_name" class="form-control"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Description</h5>
                                <div class="controls">
                                    <textarea type="text" id="editor1" name="description" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Product Thumbnail</h5>
                                <div class="controls">
                                    <input type="file" name="product_thumbnail" onChange="mainThamUrl(this)" class="form-control">
                                </div>
                                <img src="" id="mainThmb">
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
                                    <input type="checkbox" id="checkbox_4" value="1" name="status" >
                                    <label for="checkbox_4">Status</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-info" value="Add Product">
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

function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(150).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}

</script>



@endsection

