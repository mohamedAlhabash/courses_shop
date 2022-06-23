<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::orderBy('id','DESC')->paginate();
        return view('admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.courses.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'content'=>'required',
            'image'=>'required|image',
            'category_id'=>'required'
        ]);

        $ex = $request->file('image')->getClientOriginalExtension();
        $new_image = 'courses_shop .' . time() . ' . ' . $ex;
        $request->file('image')->move(public_path('uploads'),$new_image);

        Course::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'price'=>$request->price,
            'content'=>$request->content,
            'image'=>$new_image,
            'category_id'=>$request->category_id
        ]);
        return redirect(route('admin.courses.index'))->with('success','Courses Added')->with('alert','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $course->validate([
            'name'=>'required',
            'price'=>'required',
            'content'=>'required',
            'image'=>'required|image',
            'category_id'=>'required'
        ]);


        $ex = $course->file('image')->getClientOriginalExtension();
        $new_image = 'courses_shop .' . time() . ' . ' . $ex;
        $course->file('image')->move(public_path('uploads'),$new_image);

        Course::create([
            'name'=>$course->name,
            'slug'=>Str::slug($course->name),
            'price'=>$course->price,
            'content'=>$course->content,
            'image'=>$new_image,
            'category_id'=>$course->category_id
        ]);
        return redirect(route('admin.courses.index'))->with('success','Courses Added')->with('alert','success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect(route('admin.courses.index'))->with('success','Courses Deleted')->with('alert','danger');

    }
}
