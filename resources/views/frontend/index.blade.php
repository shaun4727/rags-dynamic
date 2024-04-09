@extends('frontend.master')
@section('content')

<div class="slideshow-container">
    @foreach($sliders as $slider)
    <div class="mySlides fade">
        <!-- <div class="numbertext">1 / 3</div> -->
        <img src="{{ asset('storage/'.$slider->slider_img) }}" alt="">
        <!-- <div class="text">Caption Text</div> -->
    </div>
    @endforeach

    <!-- <a href="#" class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a href="#" class="next" onclick="plusSlides(1)">&#10095;</a> -->
</div>
<!-- carousel ends -->
<!-- category starts -->
<div class="cate flex flex-row justify-between mt-4 border-b-4 border-[#000]">
    <h3 class="font-extrabold">{{ $catName1->category_name }}</h3>
    <a href="{{ url('all/product/'.$catName1->id.'/'.$catName1->category_slug) }}" class="flex flex-row justify-center items-center cursor-pointer">See All <span class="material-symbols-outlined">
        line_end_arrow_notch
        </span></a>
</div>
<div class="cat-detail flex min-[1000px]:flex-row max-[999px]:flex-col my-4">
    <div class="min-[1000px]:basis-1/2 min-[1000px]:border-r-2 min-[1000px]:border-[#000] min-[1000px]:border-dotted ">
        <div class="py-6 border-b-2 border-[#000]  min-[1000px]:w-[80%] border-dotted flex flex-row">
            <div class=" border-4 border-[#000] mr-2 overflow-hidden">
                <img src="{{ asset('storage/'.$chemicals[0]->thumbnail) }}" alt="">
            </div>
            <div>
                <h3 class="text-xs tracking-widest mt-2">{{ $catName1->category_name }}</h3>
                <p class="font-bold">{{ $chemicals[0]->product_name }}</p>
            </div>
        </div>
        <div class="py-6 min-[1000px]:w-[80%] flex flex-row-reverse max-[999px]:border-b-2 max-[999px]:border-[#000] max-[999px]:border-dotted">
            <div class=" border-4 w-[55%] min-[1000px]:mr-2 border-[#000] overflow-hidden">
                <img class="narrow" src="{{ asset('storage/'.$chemicals[1]->thumbnail) }}" alt="">
            </div>
            <div class="min-[999px]:mr-2">
                <h3 class="text-xs tracking-widest mt-2">{{ $catName1->category_name }}</h3>
                <p class="font-bold">{{ $chemicals[1]->product_name }}</p>
            </div>
        </div>
    </div>
    <div class="min-[1000px]:basis-1/2">
        <div class="py-6 min-[1000px]:w-[80%] border-b-2 border-[#000] border-dotted flex flex-row min-[1000px]:ml-[20%]">
            <div class=" border-4 w-[55%] mr-2 border-[#000] overflow-hidden">
                <img class="narrow" src="{{ asset('storage/'.$chemicals[2]->thumbnail) }}" alt="">
            </div>
            <div>
                <h3 class="text-xs tracking-widest mt-2">{{ $catName1->category_name }}</h3>
                <p class="font-bold">{{ $chemicals[2]->product_name }}</p>
            </div>
        </div>
        <div class="py-6 min-[1000px]:w-[80%] border-b-2 border-[#000] border-dotted flex flex-row min-[1000px]:ml-[20%]">
            <div class="mr-2">
                <h3 class="text-xs tracking-widest mt-2">{{ $catName1->category_name }}</h3>
                <p class="font-bold">{{ $chemicals[3]->product_name }}</p>
            </div>
            <div class=" border-4 w-[55%] mr-2 border-[#000] overflow-hidden">
                <img class="narrow" src="{{ asset('storage/'.$chemicals[3]->thumbnail) }}" alt="">
            </div>
        </div>
        <div class="py-6 min-[1000px]:w-[80%] min-[1000px]:ml-[20%] flex flex-row">
            <div class=" border-4 border-[#000] mr-2 overflow-hidden">
                <img src="{{ asset('storage/'.$chemicals[4]->thumbnail) }}" alt="">
            </div>
            <div>
                <h3 class="text-xs tracking-widest mt-2">Chemical</h3>
                <p class="font-bold">{{ $chemicals[4]->product_name }}</p>
            </div>
        </div>
    </div>
</div>
<!-- category ends -->
<!-- category starts -->
<div class="cate flex flex-row justify-between mt-4 border-b-4 border-[#000]">
    <h3 class="font-extrabold">{{ $catName2->category_name }}</h3>
    <a href="{{ url('all/product/'.$catName2->id.'/'.$catName1->category_slug) }}" class="flex flex-row justify-center items-center cursor-pointer">See All <span class="material-symbols-outlined">
        line_end_arrow_notch
        </span></a>
</div>
<div class="cat-detail flex min-[1000px]:flex-row max-[999px]:flex-col my-4">
    <div class="min-[1000px]:basis-1/2 min-[1000px]:border-r-2 min-[1000px]:border-[#000] min-[1000px]:border-dotted ">
        <div class="py-6 border-b-2 border-[#000]  min-[1000px]:w-[80%] border-dotted flex flex-row">
            <div class=" border-4 border-[#000] mr-2 overflow-hidden">
                <img src="{{ asset('storage/'.$rags[0]->thumbnail) }}" alt="">
            </div>
            <div>
                <h3 class="text-xs tracking-widest mt-2">{{ $catName2->category_name }}</h3>
                <p class="font-bold">{{ $rags[0]->product_name }}</p>
            </div>
        </div>
        <div class="py-6 min-[1000px]:w-[80%] flex flex-row-reverse max-[999px]:border-b-2 max-[999px]:border-[#000] max-[999px]:border-dotted">
            <div class=" border-4 w-[55%] min-[1000px]:mr-2 border-[#000] overflow-hidden">
                <img class="narrow" src="{{ asset('storage/'.$rags[1]->thumbnail) }}" alt="">
            </div>
            <div class="min-[999px]:mr-2">
                <h3 class="text-xs tracking-widest mt-2">{{ $catName2->category_name }}</h3>
                <p class="font-bold">{{ $rags[1]->product_name }}</p>
            </div>
        </div>
    </div>
    <div class="min-[1000px]:basis-1/2">
        <div class="py-6 min-[1000px]:w-[80%] border-b-2 border-[#000] border-dotted flex flex-row min-[1000px]:ml-[20%]">
            <div class=" border-4 w-[55%] mr-2 border-[#000] overflow-hidden">
                <img class="narrow" src="{{ asset('storage/'.$rags[2]->thumbnail) }}" alt="">
            </div>
            <div>
                <h3 class="text-xs tracking-widest mt-2">{{ $catName2->category_name }}</h3>
                <p class="font-bold">{{ $rags[2]->product_name }}</p>
            </div>
        </div>
        <div class="py-6 min-[1000px]:w-[80%] border-b-2 border-[#000] border-dotted flex flex-row min-[1000px]:ml-[20%]">
            <div class="mr-2">
                <h3 class="text-xs tracking-widest mt-2">{{ $catName2->category_name }}</h3>
                <p class="font-bold">{{ $rags[3]->product_name }}</p>
            </div>
            <div class=" border-4 w-[55%] mr-2 border-[#000] overflow-hidden">
                <img class="narrow" src="{{ asset('storage/'.$rags[3]->thumbnail) }}" alt="">
            </div>
        </div>
        <div class="py-6 min-[1000px]:w-[80%] min-[1000px]:ml-[20%] flex flex-row">
            <div class=" border-4 border-[#000] mr-2 overflow-hidden">
                <img src="{{ asset('storage/'.$rags[4]->thumbnail) }}" alt="">
            </div>
            <div>
                <h3 class="text-xs tracking-widest mt-2">{{ $catName2->category_name }}</h3>
                <p class="font-bold">{{ $rags[4]->product_name }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('contact')
<div class="flex flex-row gap-4 mt-8 ">
    <div class="max-[699px]:hidden basis-[35%] contact-img min-[700px]:flex min-[700px]:flex-col min-[700px]:justify-center min-[700px]:items-start min-[700px]:gap-24 p-12">

        <div class="">
            <h3 class="text-xl font-extrabold">Contact Information</h3>
            <p>Say something to start chat</p>
        </div>
        <div>
            <div class="flex flex-row gap-5">
                <img src="./images/email.png" alt="">
                <p>demo@gmail.com</p>
            </div>
            <div class="flex flex-row gap-5">
                <img src="./images/carbon_location-filled.png" class="h-6" alt="">
                <p>132 Dortmouth Street Boston, United States</p>
            </div>
        </div>

    </div>
    <div class="min-[700px]:basis-[65%] max-[699px]:basis-[100%] ">
        <form action="{{ route('send.mail') }}" method="POST">
            @csrf
        <div class="flex flex-col gap-4">
            <h3 class="text-xl font-extrabold tracking-[8px]">GET IN TOUCH</h3>

            <label class="input input-bordered flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" /></svg>
                <input type="text" class="grow" placeholder="Username" name="username"/>
              </label>
              <label class="input input-bordered flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" /><path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" /></svg>
                <input type="text" class="grow" placeholder="Your Email" name="from" />
              </label>
              <label class="input input-bordered flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" /><path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" /></svg>
                <input type="text" class="grow" placeholder="Subject" name="subject" />
              </label>
              <textarea class="textarea textarea-bordered h-64" placeholder="Message " name="message"></textarea>
              <div class="flex flex-row justify-end">
                <button class="btn btn-wide btn-neutral" type="submit">Send Message</button>
              </div>

        </div>
    </form>
    </div>
</div>
@endsection
