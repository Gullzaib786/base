<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{    public function __construct()
    {
    $this->middleware('auth');
    }

  public function Allcat(){
      $categories = Category::latest()->paginate(3);
      $cattrash = Category::onlyTrashed()->latest()->paginate(3);
      return view('admin.category.index',compact('categories','cattrash'));
  }
  public function Addcat(request $request){
      $validatedData = $request->validate([
           'category_name' => 'required|unique:categories|max:255'
      ],[
          'category_name.required' => 'This field is required'
      ]);

    $category = new Category();
    $category->user_id = Auth::user()->id;
    $category->category_name = $request->category_name;
    $category->save();
    return redirect()->back()->with('success','Category added successfully');

  }
  public function edit($id){
     $category = Category::find($id);
     return view('admin.category.edit',compact('category'));
  }

  public function update(Request $request,$id){
      $category = Category::find($id)->update([
        "category_name" => $request->category_name,
        "user_id" => Auth::user()->id
      ]);
      return redirect()->route('allcat')->with('success','Category updated successfully');
  }
  public function softDelete($id){
      $delete = Category::find($id)->delete();
      return redirect()->back()->with('success','Category Deletted succesfully');

  }
  public function restore($id){
    $delete = Category::withTrashed()->find($id)->restore();
    return redirect()->back()->with('success','Category Restored succesfully');

}
public function permanentDelete($id){
    $delete = Category::onlyTrashed()->find($id)->forceDelete();
    return redirect()->back()->with('success','Category Deletted Permanently');

}
}
