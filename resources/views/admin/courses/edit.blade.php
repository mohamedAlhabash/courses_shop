@extends('admin.layouts.master')
@section('content')


<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Courses</h1>
    </div>
    @include('admin.error.error')
<div class="row">
    <div class="col-12">
        <form action="{{route('admin.courses.update',$course->id)}}" method ="POST" enctype="multipart/form-data">
           @method('put') @csrf
           <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$course->name}}">
           </div>
           <div class="mb-3">
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{$course->price}}">
       </div>

       <div class="mb-3">
            <textarea name="content" rows="10" class="form-control" placeholder="Content">{{$course->content}}</textarea>
       </div>

       <div class="mb-3">
            {{-- <label>Image</label> --}}
            <input type="file" name="image" class="form-control">
            <img width="100" src="{{asset('uploads/'.$course->image)}}" alt="">
       </div>

       <div class="mb-3">
            <select name="category_id" class="form-control" >
                <option value="" selected disabled>Select Category</option>
                @foreach ($categories as $category)
                <option {{$category->id == $course->category_id ?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
       </div>

           <button class="btn btn-primary px-5">Update</button>
        </form>
        </div>
    </div>
</div>

@stop
