<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;
class SliderController extends Controller
{
  public function HomeSlider(){
      $sliders = Slider::latest()->get();
      return view('admin.slider.index',compact('sliders'));
  }
  public function CreateSlider(){
      return view('admin.slider.create');
  }
  public function StoreSlider(Request $request){
    $validation =$request->validate([
        'title' => 'required|unique:sliders|min:4',
        'image' => 'required|unique:sliders|mimes:png,jpg,jpeg'
     ]);
   $image = $request->file('image');


    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(1920,1088)->save('image/slider/'.'.'.$name_gen);
    $final_path ='image/slider/'.'.'.$name_gen;

   $sliders =new Slider();
   $sliders->title = $request->title;
   $sliders->description = $request->description;
   $sliders->image = $final_path;
   $sliders->save();
   return redirect()->route('all.slider')->with('success','Brands added succesfully');
  }
}
