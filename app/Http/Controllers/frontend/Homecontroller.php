<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }
    public function product()
    {
        return view('frontend.products');
    }
}
