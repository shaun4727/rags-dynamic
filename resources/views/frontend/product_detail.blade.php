@extends('frontend.master')

@section('content')

<div>
    <img src="{{ asset('storage/'.$product->thumbnail) }}" class="w-full" alt="">
</div>







<div class="mt-4 text-justify description">
    {!! $product->description !!}
</div>
@endsection


@section('contact')
<div class="cate flex flex-row justify-between mt-4 border-b-4 border-[#000]">
    <h3 class="font-extrabold">Similar Products</h3>
</div>
<div class="flex flex-wrap mt-2 similar-product">
    <!-- all products starts -->
    @foreach($similarProducts as $product)
    <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4 p-4">
        <div class="border-4 border-[#000]">
            <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="">
        </div>
        <div>
            <h3 class="text-xs tracking-widest mt-2">{{ $product['category']['category_name'] }}</h3>
            <a class="font-bold cursor-pointer">{{ $product->product_name }}</a>
        </div>
    </div>
    @endforeach
    <!-- all products ends -->
</div>
<!-- cat

@endsection
