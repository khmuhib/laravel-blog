@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')



    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>

        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between pt-4">
                <h5 class="card-title">Add Department</h5>
                <a href="{{ route('category') }}" class="btn btn-primary">Show Category</a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <div class="">{{$error}}</div>

                    @endforeach
                </div>

                @endif


                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label>Category Name</label>
                        <input type="text" class="form-control my-2" placeholder="Enter Category Name" name="name">
                    </div>
                    <div class="form-group mb-2">
                        <label>Category slug</label>
                        <input type="text" class="form-control my-2" placeholder="Enter Category Slug" name="slug">
                    </div>
                    <div class="form-group mb-2">
                        <label>Category Description</label>
                        <textarea class="form-control my-2" name="description" placeholder="Enter Category Description"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>Image</label>
                        <input type="file" class="form-control my-2" name="image">
                    </div>
                    <div class="form-group mb-2">
                        <label>Meta Title</label>
                        <input type="text" class="form-control my-2" placeholder="Enter Meta Title" name="meta_title">
                    </div>
                    <div class="form-group mb-2">
                        <label>Meta Description</label>
                        <textarea class="form-control my-2" name="meta_description" placeholder="Enter Meta Description"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>Meta keyword</label>
                        <textarea class="form-control my-2" name="meta_keyword" placeholder="Enter Meta Keyword"></textarea>
                    </div>
                    <h6>Status Mood</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="">Nav Status</label>
                            <input type="checkbox" name="navbar_status">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

@endsection
