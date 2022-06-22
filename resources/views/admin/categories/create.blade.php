@extends('admin.layouts.master')
@section('content')


<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Category</h1>
    </div>
    @include('admin.error.error')
<div class="row">
    <div class="col-12">
        <form action="{{route('admin.categories.store')}}" method ="POST">
            @csrf
           <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
           </div>
           <button class="btn btn-info">Add</button>
        </form>
        </div>
    </div>
</div>

@stop
