@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')



    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>

        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between pt-4">
                <h5 class="card-title">Edit Category</h5>
                <a href="{{ route('category') }}" class="btn btn-primary">Show Department</a>
            </div>
            <div class="card-body">
                <form action="{{ route('category.update', ['id'=>$category->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label>Category Name</label>
                        <input type="text" class="form-control my-2" placeholder="Enter Category Name" name="name" value="{{$category->name}}">
                    </div>
                    <div class="form-group mb-2">
                        <label>Category slug</label>
                        <input type="text" class="form-control my-2" placeholder="Enter Category Slug" name="slug" value="{{$category->slug}}">
                    </div>
                    <div class="form-group mb-2">
                        <label>Category Description</label>
                        <textarea class="form-control my-2" name="description" placeholder="Enter Category Description">{{$category->description}}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>Image</label>
                        <input type="file" class="form-control my-2" name="image">
                    </div>
                    <div class="form-group mb-2">
                        <label>Meta Title</label>
                        <input type="text" class="form-control my-2" placeholder="Enter Meta Title" name="meta_title" {{$category->meta_title}}>
                    </div>
                    <div class="form-group mb-2">
                        <label>Meta Description</label>
                        <textarea class="form-control my-2" name="meta_description" placeholder="Enter Meta Description">{{$category->meta_description }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>Meta keyword</label>
                        <textarea class="form-control my-2" name="meta_keyword" placeholder="Enter Meta Keyword"> {{$category->meta_keyword}}</textarea>
                    </div>
                    <h6>Status Mood</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="">Nav Status</label>
                            <input type="checkbox" name="navbar_status" {{$category->navbar_status == '1'? 'checked':''}}/>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" {{$category->status == '1'? 'checked':''}}/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

@endsection
