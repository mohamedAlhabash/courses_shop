<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function pay($id){
        $register = Register::find($id);
        return view('frontend_views.pay',compact('register'));
    }
    public function thanks($id){
        Register::find($id)->update([
            'status' => 1
        ]);
        return redirect(route('courses_shop.homepage'));
    }
    public function register($slug){
        $course = Course::where('slug',$slug)->first();
        return view('frontend_views.register',compact('course'));
    }
    public function registerSubmet(Request $request,$slug){
       $request->validate([
        'name'=>'required',
        'email'=>'required',
        'mobile'=>'required',
        'gender'=>'required',
       ]);

       $course = Course::where('slug',$slug)->select('id')->first();
       $user = User::where('email',$request->email)->first();
       if(is_null($user)){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile'=> $request->mobile,
            'gender'=> $request->gender
        ]);
       }
    $users = DB::table('registers')
                    ->where('user_id',$user->id)
                    ->first();
    $courses = DB::table('registers')
                    ->where('course_id',$course->id)
                    ->first();

    if(is_null($users)){
        $register = Register::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'status' => 1
        ]);
        return redirect(route('courses_shop.paypage',$register->id));
    }elseif(is_null($courses)){
        $register = Register::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'status' => 1
        ]);
        return redirect(route('courses_shop.paypage',$register->id));
    }else{
        echo 'You Cant register more time';
    }

    }
}

