<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Faker\Provider\File;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        $categories=Category::orderby('name','desc')->get();

        return view('backend.page.category.index',compact('categories'));
    }
    public function create()
    {
      $main_categories=Category::orderby('name','desc')->where('parent_id',null)->get();
       return view('backend.page.category.create',compact('main_categories'));
       ;
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
            ],[
              'name.required'=>'Please Provide a Category Name'
        ]);
        $category=new Category();
        $category->name=$request->name;
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;

        if ($request->hasFile('image')){
            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/category/'.$img);
            \Intervention\Image\Facades\Image::make($image)->save($location);
            $category->image=$img;
        }
        $category->save();

        session()->flash('success','A Category Added Successful');
        return redirect()->back();

    }

   public function categories_edit($id)
   {
       $main_categories=Category::orderby('name','desc')->where('parent_id',null)->get();
       $category=Category::find($id);
       return view('backend.page.category.edit',compact('category','main_categories'));
   }
   public function category_update(Request $request,$id)
   {

       $request->validate([
           'name'=>'required'
       ],[
           'name.required'=>'Please Provide a Category Name'
       ]);
       $category=Category::find($id);
       $category->name=$request->name;
       $category->description=$request->description;
       $category->parent_id=$request->parent_id;

       if ($request->hasFile('image')){

           if (\Illuminate\Support\Facades\File::exists('images/category/'.$category->image)){
               \Illuminate\Support\Facades\File::delete('images/category/'.$category->image);
           }
           $image=$request->file('image');
           $img=time().'.'.$image->getClientOriginalExtension();
           $location=public_path('images/category/'.$img);
           \Intervention\Image\Facades\Image::make($image)->save($location);
           $category->image=$img;
       }
       $category->save();

       session()->flash('success','Category Updated Successful');
       return redirect()->back();
   }

   public function category_delete(Request $request,$id)
   {
       $category=Category::find($id);
       if (!is_null($category)){
           if ($category->parent_id==null){
               $sub_categories=Category::orderby('name','desc')->where('parent_id',$category->id)->get();
               foreach ($sub_categories as $sub){
                   if (\Illuminate\Support\Facades\File::exists('images/category/'.$category->image)){
                       \Illuminate\Support\Facades\File::delete('images/category/'.$category->image);
                   }
               $sub->delete();
               }

           }
           if (\Illuminate\Support\Facades\File::exists('images/category/'.$category->image)){
               \Illuminate\Support\Facades\File::delete('images/category/'.$category->image);
           }
       }
       $category->delete();


       session()->flash('success','Category Delete Successful');
       return redirect()->back();
   }
}












