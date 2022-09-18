@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')




    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>

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
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>052</td>
                                <td>dsadas</td>
                                <td>
                                    <a href="" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <form action="" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
