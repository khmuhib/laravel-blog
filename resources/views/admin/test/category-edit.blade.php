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
                <form action="" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label>Category Name</label>
                        <input type="text" class="form-control" placeholder="Enter Category Name" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

@endsection
