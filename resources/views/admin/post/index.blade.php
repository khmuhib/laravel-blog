@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')




    <div class="container-fluid px-4">
        <h1 class="mt-4">Posts</h1>

        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between pt-4">
                <h5 class="card-title">Post List</h5>
                <a href="{{ route('admin.post.create') }}" class="btn btn-primary">Add Post</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Youtube Link</th>
                                <th>Meta Title</th>
                                <th>Meta Description</th>
                                <th>Meta Keyword</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Youtube Link</th>
                                <th>Meta Title</th>
                                <th>Meta Description</th>
                                <th>Meta Keyword</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->name}}</td>
                                <td>{{$post->slug}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>{{$post->description}}</td>
                                <td>{{$post->yt_iframe}}</td>
                                <td>{{$post->meta_title}}</td>
                                <td>{{$post->meta_description}}</td>
                                <td>{{$post->meta_keyword}}</td>
                                <td>{{$post->status == '1' ? 'Hidden': 'Shown'}}</td>
                                <td>
                                    <a href="" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admin.post.edit', ['id'=>$post->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.post.delete', ['id'=>$post->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
