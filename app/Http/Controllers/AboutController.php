<?php

namespace App\Http\Controllers;
use App\Models\HomeAbout;
use Illuminate\Http\Request;

class AboutController extends Controller
{
 public function HomeAbout(){
  $abouts = HomeAbout::latest()->get();
  return view('admin.home.about',compact('abouts'));
 }
 public function CreateAbout(){
    return view('admin.home.create');
   }
 public function StoreAbout(Request $request){
     $abouts = new HomeAbout();
     $abouts->name = $request->name;
     $abouts->short_des = $request->short_des;
     $abouts->long_des = $request->long_des;
     $abouts->save();
     return redirect()->route('all.home.about')->with('success','about added successfully');
 }
 public function EditAbout($id){
     $about = HomeAbout::find($id);
     return view('admin.home.edit',compact('about'));
 }
 public function UpdateAbout(Request $request,$id){
    HomeAbout::find($id)->update([
        'name' => $request->name,
        'short_des' => $request->short_des,
        'long_des' => $request->long_des
    ]);
    return redirect()->route('all.home.about')->with('success','About Updated successfully');
 }
 public function Deleteabout($id)
 {
     HomeAbout::find($id)->delete();
     return redirect()->route('all.home.about')->with('success','About Deleted successfully');
 }
}
