@php
$categories = App\Models\backend\Category::latest()->get();
@endphp

<div class="min-[699px]:basis-1/5 mr-2 max-[699px]:hidden">
    <ul class="menu bg-[#3c434e] text-white w-56 p-0 [&_li>*]:rounded-none">
        {{-- <li class="sidebar_menu active"><a>Home</a></li> --}}
        @foreach($categories as $category)
        @php
        $subcategories = App\Models\backend\SubCategory::where('category_id',$category->id)->get();
        @endphp
        <li class="sidebar_menu">
            <a href="{{ url('all/product/'.$category->id.'/'.$category->category_slug) }}">{{ $category->category_name }}
                @if(count($subcategories)>0)
                <span class="material-symbols-outlined flex flex-row justify-end">
                navigate_next</span>
                @endif
            </a>
            <ul class="child_menu">
                @foreach($subcategories as $subcategory)
                <li class="sidebar_menu_child"><a href="{{ url('/all/SubCategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a></li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
</div>
