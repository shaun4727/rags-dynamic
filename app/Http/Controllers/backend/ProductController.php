<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Category;
use App\Models\backend\SubCategory;
use App\Models\backend\Product;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
        return view('backend.product.product_add',compact('categories'));
    }
    public function storeProduct(Request $request){
        // return $request;
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'description' => 'required'
        ],[
            'category_id.required' => 'Please select a category',
            'product_name.required' => 'Product name is undefined',
            'description.required' => 'description is undefined'
        ]);

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $save_url = 'upload/product/'.$name_gen;


        $manager = new ImageManager(Driver::class);
        $imageInt = $manager->read($request->file('product_thumbnail'));
        $conImg = $imageInt->scale(970, 300);
        Storage::put('public/upload/product/'.$name_gen,$conImg->encode());



        Product::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'description' => $request->description,
            'status' => $request->status?1:0,
            'thumbnail' => $save_url
        ]);

        return redirect()->back();
    }


    public function updateProduct(Request $request){
        // return $request;
        $product_id = $request->id;
        $old_img = $request->old_image;
        if($request->file('product_thumbnail')){
            unlink('storage/'.$old_img);
            $image = $request->file('product_thumbnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();


            $manager = new ImageManager(Driver::class);
            $imageInt = $manager->read($request->file('product_thumbnail'));
            $conImg = $imageInt->cover(970, 300);
            Storage::put('public/upload/product/'.$name_gen,$conImg->encode());


            $save_url = 'upload/product/'.$name_gen;

            Product::findOrfail($product_id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'product_name' => $request->product_name,
                'description' => $request->description,
                'thumbnail' => $save_url,
                'status' => $request->status?1:0,
            ]);
        }else{
            Product::findOrfail($product_id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'product_name' => $request->product_name,
                'description' => $request->description,
                'status' => $request->status?1:0,
            ]);
        }

        return redirect()->route('manage.product');

    }

    public function viewProducts(){
        $products = Product::latest()->get();
        return view('backend.product.product_view',compact('products'));
    }
    public function editProduct($id){
        $product = Product::where('id',$id)->first();
        $categories = Category::latest()->get();
        $subCategories = SubCategory::latest()->get();

        return view('backend.product.product_edit',compact('product','categories','subCategories'));
    }
    public function deleteProduct(){
        return "";
    }
}
