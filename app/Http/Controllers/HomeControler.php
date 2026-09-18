<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeControler extends Controller
{
    public function index()
    {
        return view('blog.index');
    }
    public function about()
    {
        return view('blog.about');
    }
    public function contact()
    {
        return view('blog.contact');
}
public function post()
    {
        return view('blog.post');
    }
}
