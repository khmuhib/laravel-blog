@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')



    <div class="container-fluid px-4">
        <h1 class="mt-4">Posts</h1>

        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between pt-4">
                <h5 class="card-title">Edit Post</h5>
                <a href="{{ route('admin.post.list') }}" class="btn btn-primary">Show Post</a>
            </div>
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <div class="">{{$error}}</div>

                    @endforeach
                </div>

                @endif

                <form action="{{ route('admin.post.update', ['id'=>$post->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label>Post Name</label>
                        <input type="text" class="form-control" placeholder="Enter Post Name" name="name" value="{{$post->name}}">
                    </div>
                    <div class="form-group mb-2">
                        <label>Post Slug</label>
                        <input type="text" class="form-control" placeholder="Enter Post Name" name="slug" value="{{$post->slug}}">
                    </div>
                    <div class="form-group mb-2">
                        <label>Post Description</label>
                        <textarea class="form-control" name="description" id="" rows="5" placeholder="Post Description">{{$post->description}}</textarea>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label>Category List</label>
                            <select class="form-select" name="category_id">
                                <option value="{{$post->category->id}}" {{$post->category->id == $post->category_id ? 'selected': ''}}>{{ $post->category->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label>Youtube Link</label>
                        <input type="text" class="form-control" placeholder="Enter Youtube Name" name="yt_iframe" value="{{$post->yt_iframe}}">
                    </div>
                    <div class="form-group mb-2">
                        <label>Meta Title</label>
                        <input type="text" class="form-control" placeholder="Enter Meta Title" name="meta_title" value="{{$post->meta_title}}">
                    </div>
                    <div class="form-group mb-2">
                        <label>Meta Description</label>
                        <textarea class="form-control" name="meta_description" id="" rows="5" placeholder="Meta Description">{{$post->meta_description}}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>Meta Keyword</label>
                        <textarea class="form-control" name="meta_keyword" id="" rows="5" placeholder="Meta Keyword">{{$post->meta_keyword}}</textarea>
                    </div>
                    <div class="row">
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
