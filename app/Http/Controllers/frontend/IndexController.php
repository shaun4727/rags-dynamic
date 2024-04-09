<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Slider;
use App\Models\backend\Product;
use App\Models\backend\Category;
use App\Models\backend\SubCategory;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class IndexController extends Controller
{
    public function index(){
        $sliders = Slider::where('status',1)->get();

        $chemicals = Product::where('category_id',1)->take(5)->get();
        $catName1 = Category::where('id',1)->first();
        $catName2 = Category::where('id',2)->first();

        $rags = Product::where('category_id',2)->take(5)->get();


        return view('frontend.index',compact('sliders','chemicals','rags','catName1','catName2'));
    }

    public function sendMail(Request $request){
        $array = [
            "username"=> $request->username,
            "from" => $request->from,
            "message" => $request->message,
            "subject" => $request->subject
        ];
        Mail::to('hossain.shaun27@gmail.com')->send(new MailNotify($array));
        return redirect()->back();
    }

    public function getAllProducts($id,$slug){
        $products = Product::where('category_id',$id)->get();
        $catName1 = Category::where('id',$id)->first();
        return view('frontend.all_products',compact('products','catName1'));
    }

    public function getProductDetail($id,$slug){
        $product = Product::where('id',$id)->first();
        $similarProducts = Product::getAllExcept($id)->where('category_id',$product->category_id);
        return view('frontend.product_detail',compact('product','similarProducts'));
    }

    public function getAllSubProducts($id,$slug){
        $products = Product::where('subcategory_id',$id)->get();
        $subcategory = SubCategory::where('id',$id)->first();

        $catName1 = Category::where('id',$subcategory->category_id)->first();
        return view('frontend.all_products',compact('products','catName1'));
    }
}
