
@php
$categories = App\Models\backend\Category::latest()->get();

@endphp


<div class="flex min-[700px]:flex-row max-[699px]:flex-col max-[699px]:gap-4 mt-6">
    <div class="min-[700px]:basis-1/4">
        <h3 class="dancing-script-regular text-5xl">Eagle</h3>
        <h3 class="dancing-script-regular text-5xl">International</h3>
    </div>
    <div class="min-[700px]:basis-1/2  flex flex-row justify-start items-center ">
        <input type="text" placeholder="Type here" class="input input-bordered rounded-none min-[700px]:w-[30vw]  " />
        <button class="btn rounded-none "><span class="material-symbols-outlined max-[698px]:text-[20px]">
            search
            </span></button>
    </div>
    <div class="basis-1/4 max-[699px]:hidden">

    </div>
</div>
<div class="navbar flex flex-row justify-between bg-[#011c2a] min-h-2 max-[699px]:hidden mt-4">
    <div>

    </div>
    <div>
        <a href="{{ url('/') }}" class="text-[18px] text-white px-4 cursor-pointer">Home</a>
        @foreach($categories as $category)
        @if($category->showInTopNav == 1)
        <a href="{{ url('all/product'.$category->id.'/'.$category->category_slug) }}" class="text-[18px] text-white px-4 cursor-pointer">{{ $category->category_name }}</a>
        @endif
        @endforeach
    </div>
</div>
<!-- mobile drawer -->
<div class="drawer min-[699px]:hidden mt-2 z-30">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col">
      <!-- Navbar -->
      <div class="w-full navbar bg-base-300">
        <div class="flex-none lg:hidden">
          <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
          </label>
        </div>
        <div class="flex-none hidden lg:block">
          <ul class="menu menu-horizontal">
            <!-- Navbar menu content here -->
            <li><a>Navbar Item 1</a></li>
            <li><a>Navbar Item 2</a></li>
          </ul>
        </div>
      </div>
      <!-- Page content here -->

    </div>
    <div class="drawer-side">
      <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
      <ul class="p-4 pt-16 accordion-menu w-80 min-h-full bg-base-200">
        <!-- Sidebar content here -->

        @foreach($categories as $category)
        @php
        $subcategories = App\Models\backend\SubCategory::where('category_id',$category->id)->get();
        @endphp
        <li class="link">
            <div class="dropdown">

                <p>{{ $category->category_name }}
                    @if(count($subcategories)>0)
                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    @endif
                </p>
            </div>
            @if(count($subcategories)>0)
            <ul class="submenuItems">
                @foreach($subcategories as $subcategory)
                <li><a href="#">{{ $subcategory->subcategory_name }}</a></li>
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach

      </ul>
    </div>
</div>
