<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Slider;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function sliderView(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view',compact('sliders'));
    }

    public function sliderStore(Request $request){
        // return $request;
        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $save_url = 'upload/slider/'.$name_gen;


        $manager = new ImageManager(Driver::class);
        $imageInt = $manager->read($request->file('slider_img'));
        $conImg = $imageInt->cover(970, 300);
        Storage::put('public/upload/slider/'.$name_gen,$conImg->encode());


        Slider::insert([
            'slider_img' => $save_url,
            'status' => $request->status?1:0
        ]);


        return redirect()->back();
    }

    public function sliderEdit($id){
        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider_edit',compact('slider'));
    }

    public function sliderUpdate(Request $request){
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('slider_img')){
            unlink('storage/'.$old_img);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();


            $manager = new ImageManager(Driver::class);
            $imageInt = $manager->read($request->file('slider_img'));
            $conImg = $imageInt->cover(970, 300);
            Storage::put('public/upload/slider/'.$name_gen,$conImg->encode());


            $save_url = 'upload/slider/'.$name_gen;

            Slider::findOrFail($slider_id)->update([
                'slider_img' => $save_url,
                'status' => $request->status?$request->status:0,
            ]);
        }else{
            Slider::findOrFail($slider_id)->update([
                'status' => $request->status?$request->status:0,
            ]);
        }

        return redirect()->route('manage.slider');
    }

    public function sliderDelete($id){
        $slider = Slider::findOrFail($id);
        unlink('storage/'.$slider->slider_img);

        Slider::findOrFail($id)->delete();

        return redirect()->route('manage.slider');
    }
}
