<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('frontend_views.index',compact('courses'));
    }
    public function course($slug){
        $course = Course::where('slug',$slug)->first();
        return view('frontend_views.course',compact('course'));
    }
    public function contact(){
        return view('frontend_views.contact');
    }
    public function pay(){
        return view('frontend_views.pay');
    }
    public function register(){
        return view('frontend_views.register');
    }
}
