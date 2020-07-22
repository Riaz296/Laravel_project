<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        return view('backend.page.category.index');
    }
    public function create()
    {
      $main_categories=Category::orderby('name','desc')->get();
       return view('backend.page.category.create',compact('main_categories'));
       ;
    }
}
