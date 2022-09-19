@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')



    <div class="container-fluid px-4">
        <h1 class="mt-4">Users</h1>

        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between pt-4">
                <h5 class="card-title">Edit User</h5>
                <a href="{{ route('admin.user.list') }}" class="btn btn-primary">Show User</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.user.update', ['id'=>$user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label>User Name</label>
                        <input type="text" class="form-control" placeholder="Enter Category Name" name="name"
                            value="{{ $user->name }}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label>User Email</label>
                        <input type="text" class="form-control" placeholder="Enter Category Name" name="name"
                            value="{{ $user->email }}" disabled>
                    </div>
                    <div class="form-group mb-2">
                        <label>User Role</label>
                        <select class="form-select" aria-label="Default select example" name="role_as">

                            <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                            <option value="1" {{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                            <option value="2" {{ $user->role_as == '2' ? 'selected' : '' }}>Blogger</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

@endsection
