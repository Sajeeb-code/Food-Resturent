@extends('layouts.app')

@section('content')
<div class="container">
     
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header text-uppercase font-weight-bold">All Category
                     <a href="{{ route('category.create') }}" class="btn btn-md btn-outline-primary float-right">Add Category</a>
                </div>

                <div class="card-body">
                   <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($category) > 0)
                                @foreach ($category as $key=>$item)
                                    <tr>
                                        <th scope="row">{{ $key++ }}</th>
                                        <td>{{ $item->category_name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('category.edit',[$item->id]) }}" class="btn btn-success">Edit</a>
                                         
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                                Delete
                                            </button>
                                                
                                             <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('category.destroy',[$item->id]) }}" method="POST">
                                                        @csrf
                                                        {{  method_field('DELETE') }}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-dark" id="exampleModalLabel">Delete The Item</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-dark">
                                                            Are you sure want to delete it.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-outline-danger">Confirm</button>
                                                            </div>
                                                    
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <h3>Don't have any Category</h3>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
