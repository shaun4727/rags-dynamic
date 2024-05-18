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
            if(isset($positionTracker)){
                if($positionTracker->bookedPosition == ''){
                    CategoryPositionTracker::findOrFail($positionTracker->id)->update([
                        'bookedPosition' => $request->position == 1?'first':'second',
                        'positionAvailable' => 1,
                    ]);

                }else{
                    CategoryPositionTracker::findOrFail($positionTracker->id)->update([
                        'bookedPosition' => 'both',
                        'positionAvailable' => 0,
                    ]);
                }

            }else{
                CategoryPositionTracker::insert([
                    'bookedPosition' => $request->position == 1?'first':'second',
                    'positionAvailable' => 1,
                ]);
            }

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
        $category = Category::findOrFail($request->id);
        $positionTracker = CategoryPositionTracker::first();


        //if category does not need to show in home page, it should not have any position
        //hence updated position made 0

        $category->update([
            'category_name' => $request->category_name,
            'showInTopNav' => $request->showInTopNav?1:0,
            'showInHome' => $request->showInHome?1:0,
            'position' => $request->showInHome == 1?$request->position:0,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
        ]);
        $availableHomeCategory = Category::where('showInHome',1)->get();
        if($request->showInHome == 1){

            if(isset($positionTracker)){
                if($positionTracker->bookedPosition == ''){
                    CategoryPositionTracker::findOrFail(CategoryPositionTracker::first()->id)->update([
                        'bookedPosition' => $request->position == 1?'first':'second',
                        'positionAvailable' => 1,
                    ]);
                }else if($positionTracker->bookedPosition == 'first' || $positionTracker->bookedPosition == 'second'){
                    if(count($availableHomeCategory) == 2){
                        CategoryPositionTracker::findOrFail(CategoryPositionTracker::first()->id)->update([
                            'bookedPosition' => 'both',
                            'positionAvailable' => 0,
                        ]);
                    }else{
                        CategoryPositionTracker::findOrFail(CategoryPositionTracker::first()->id)->update([
                            'bookedPosition' => $request->position == 1?'first':'second',
                            'positionAvailable' => 1,
                        ]);
                    }

                }
            }else{
                CategoryPositionTracker::insert([
                    'bookedPosition' => $request->position == 1?'first':'second',
                    'positionAvailable' => 1,
                ]);
            }

        }else{
            if(isset($positionTracker)){
                if($positionTracker->bookedPosition == 'both'){
                    $tempPosition = $availableHomeCategory[0]->position == 1?'first':'second';
                    CategoryPositionTracker::findOrFail(CategoryPositionTracker::first()->id)->update([
                        'bookedPosition' => $tempPosition,
                        'positionAvailable' => 1,
                    ]);
                }else if(count($availableHomeCategory) == 0){
                    CategoryPositionTracker::findOrFail(CategoryPositionTracker::first()->id)->update([
                        'bookedPosition' => '',
                        'positionAvailable' => 2,
                    ]);
                }

            }
        }



        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryDelete($id){
        $positionTracker = CategoryPositionTracker::first();
        $category = Category::findOrFail($id);
        if($category && $category->position){
            if($positionTracker->bookedPosition == 'both'){
                CategoryPositionTracker::findOrFail(CategoryPositionTracker::first()->id)->update([
                    'bookedPosition' => $category->position == 1?'second':'first',
                    'positionAvailable' => 1,
                ]);
            }else{
                CategoryPositionTracker::findOrFail(CategoryPositionTracker::first()->id)->update([
                    'bookedPosition' => '',
                    'positionAvailable' => 2,
                ]);
            }

        }

        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.category')->with($notification);
    }
}
