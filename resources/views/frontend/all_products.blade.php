@extends('frontend.master')
@section('content')
<!-- category starts -->
<div class="cate flex flex-row justify-between mt-4 border-b-4 border-[#000]">
    <h3 class="font-extrabold">{{ $catName1->category_name }}</h3>
</div>
<div class="flex flex-wrap mt-2 product ">
    <!-- all products starts -->
    @foreach($products as $product)
    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 p-4">
        <div class="border-4 border-[#000]">
            <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="">
        </div>
        <div>
            <h3 class="text-xs tracking-widest mt-2">{{ $catName1->category_name }}</h3>
            <a href="{{ url('product/detail/'.$product->id.'/'.$product->product_slug) }}" class="font-bold cursor-pointer">{{ $product->product_name }}</a>
        </div>
    </div>
    @endforeach

    <!-- all products ends -->
</div>
<!-- category ends -->
@endsection
