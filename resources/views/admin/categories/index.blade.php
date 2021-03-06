@extends('admin.layouts.master')
@section('content')

<div class="container-fluid">
    @if (session('success'))
    <div class="alert alert-{{session('alert')}} alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Categories</h1>
    </div>
<div class="row">
    <div class="col-12">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            @foreach ($categories as $category)
                <tr>
                    <th>{{$category->id}}</th>
                    <th>{{$category->name}}</th>
                    <th>{{$category->created_at->format('Y - m - d')}}</th>
                    <th>
                        <a class="btn btn-sm btn-primary" href="{{route('admin.categories.edit',$category->id)}}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{route('admin.categories.destroy',$category->id)}}" method="POST">
                            @method('delete')@csrf
                            <button onclick="return confirm('Are you sure!')" class="btn btn-sm btn-danger"><i class="fas fa-times">
                                </i></button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </table>
        {{ $categories->links() }}
      </div>
    </div>
</div>

@stop
