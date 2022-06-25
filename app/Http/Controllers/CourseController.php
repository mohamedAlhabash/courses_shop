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
        $categories = Category::select(['id','name'])->get();
        return view('admin.courses.edit',compact('course','categories'));
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

        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'content'=>'required',
            // 'image'=>'nullable',
            'category_id'=>'required'
        ]);

        $new_image = $course->image;

        if($request->has('image')){
            $ex = $request->file('image')->getClientOriginalExtension();
            $new_image = 'courses_shop .' . time() . ' . ' . $ex;
            $request->file('image')->move(public_path('uploads'),$new_image);
        }

        $course->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'price'=>$request->price,
            'content'=>$request->content,
            'image'=>$new_image,
            'category_id'=>$request->category_id
        ]);
        return redirect(route('admin.courses.index'))->with('success','Courses Updated')->with('alert','warning');
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
