@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')




    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>

        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between pt-4">
                <h5 class="card-title">Add Category</h5>
                <a href="{{ route('category.create') }}" class="btn btn-primary">Add Department</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Meta Title</th>
                                <th>Meta Description</th>
                                <th>Meta Keyword</th>
                                <th>NavBar Status</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Meta Title</th>
                                <th>Meta Description</th>
                                <th>Meta Keyword</th>
                                <th>NavBar Status</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>{{$category->description}}</td>
                                <td>{{$category->meta_title}}</td>
                                <td>{{$category->meta_description}}</td>
                                <td>{{$category->meta_keyword}}</td>
                                <td>{{$category->navbar_status == '1' ? 'Hidden': 'Shown'}}</td>
                                <td>{{$category->status == '1' ? 'Hidden': 'Shown'}}</td>
                                <td>
                                    <img src="{{ asset('uploads/category/'.$category->image) }}" alt="" style="height: 50px; width: 50px">
                                </td>
                                <td>
                                    <a href="" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('category.edit', ['id'=>$category->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('category.delete', ['id'=>$category->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
