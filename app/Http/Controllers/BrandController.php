<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\multipic;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
   public function Allbrand(){
       $brands = Brand::latest()->paginate(3);
       return view('admin.brand.index',compact('brands'));
   }

   public function store(Request $request){
       $validation =$request->validate([
          'brand_name' => 'required|unique:brands|min:4',
          'brand_image' => 'required|unique:brands|mimes:png,jpg,jpeg'
       ]);
     $image = $request->file('brand_image');
    //    $code = hexdec(uniqid());
    //    $image_ext = $image->getClientOriginalExtension();
    //    $img_path = "image/brand/";
    //    $image_path = $code.'.'.$image_ext;
    //    $final_path = $img_path.$image_path;
    //    $image->move($img_path,$image_path);

      $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(300,200)->save('image/brand/'.'.'.$name_gen);
      $final_path ='image/brand/'.'.'.$name_gen;

     $brands =new Brand();
     $brands->brand_name = $request->brand_name;
     $brands->brand_image = $final_path;
     $brands->save();
     return redirect()->back()->with('success','Brands added succesfully');
   }

   public function edit($id){
        $brands = Brand::find($id);
        return view('admin.brand.edit',compact('brands'));
   }

   public function update(Request $request,$id){
       if($request->brand_image){
        $validation =$request->validate([
            'brand_name' => 'required|min:4',
         ]);
         $image = $request->file('brand_image');
         $code = hexdec(uniqid());
         $image_ext = $image->getClientOriginalExtension();
         $img_path = "image/brand/";
         $image_path = $code.'.'.$image_ext;
         $final_path = $img_path.$image_path;
         $image->move($img_path,$image_path);
         unlink($request->old_image);
        Brand::find($id)->update([
        'brand_name'=> $request->brand_name,
        'brand_image'=> $final_path

       ]);
       return redirect()->back()->with('success','Brands updated succesfully');
       }else{
       $brands= Brand::find($id)->update([
            'brand_name'=> $request->brand_name
           ]);
           return redirect()->back()->with('success','Brands updated succesfully');
       };
   }

   public function delete($id){
      $brands = Brand::find($id);
      $image = $brands->brand_image;
      unlink($image);
      Brand::find($id)->delete();
      return redirect()->back()->with('success','Deleted succesfully');
   }
   ///multi pic starts
   public function multipic(){
       $images = Multipic::all();
       return view('admin.multipic.index',compact('images'));
   }
   public function storePics(Request $request){
    $image = $request->file('brand_image');
    //    $code = hexdec(uniqid());
    //    $image_ext = $image->getClientOriginalExtension();
    //    $img_path = "image/brand/";
    //    $image_path = $code.'.'.$image_ext;
    //    $final_path = $img_path.$image_path;
    //    $image->move($img_path,$image_path);
    foreach($image as $multi_pic){
      $name_gen = hexdec(uniqid()).'.'.$multi_pic->getClientOriginalExtension();
      Image::make($multi_pic)->resize(300,200)->save('image/multi/'.'.'.$name_gen);
      $final_path ='image/multi/'.'.'.$name_gen;

     $brands =new Multipic();
     $brands->image = $final_path;
     $brands->save();
    };
     return redirect()->back()->with('success','Pics added succesfully');

   }
}
