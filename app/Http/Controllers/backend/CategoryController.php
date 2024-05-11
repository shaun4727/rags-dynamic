<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Category;
use App\Models\backend\CategoryPositionTracker;

class CategoryController extends Controller
{
    public function CategoryView(){
        $categories = Category::latest()->get();
        $positionTracker = CategoryPositionTracker::first();
        return view('backend.category.category_view',compact('categories','positionTracker'));
    }

    public function CategoryStore(Request $request){
        $positionTracker =  CategoryPositionTracker::first();

        $request->validate([
            'category_name' => 'required',
        ],[
            'category_name.required' => 'Input Category Name required',
        ]);



        Category::insert([
            'category_name' => $request->category_name,
            'showInTopNav' => $request->showInTopNav?1:0,
            'showInHome' => $request->showInHome?1:0,
            'position' => $request->position?$request->position:0,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
        ]);


        if($request->position){
            CategoryPositionTracker::insert([
                'bookedPosition' => $request->position == 1?'first':'second',
                'positionAvailable' => $positionTracker?0:1,
            ]);
        }




        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        $positionTracker = CategoryPositionTracker::first();
        return view('backend.category.category_edit',compact('category','positionTracker'));
    }

    public function CategoryUpdate(Request $request){
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'showInTopNav' => $request->showInTopNav?1:0,
            'showInHome' => $request->showInHome?1:0,
            'position' => $request->position?$request->position:0,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
        ]);


        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryDelete($id){
        $category = Category::findOrFail($id);

        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.category')->with($notification);
    }
}
