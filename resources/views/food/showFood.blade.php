@extends('layouts.app')

@section('content')
<div class="container">
     
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header text-uppercase font-weight-bold">All Foods

                    <a href="{{ route('food.create') }}" class="btn btn-md btn-outline-primary float-right">Add Foods</a>
                </div>

                <div class="card-body">
                   <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">Iamge</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($foods) > 0)
                                @foreach ($foods as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('/images') }}/{{ $item->image }}" alt="" width="100" >
                                        </td>
                                        <td>{{ $item->food_name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->price }} TK</td>
                                        <td>{{ $item->category->category_name }}</td>
                                        
                                        <td>
                                            <a href="{{ route('food.edit',[$item->id]) }}" class="btn btn-success">Edit</a>
                                         
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                                Delete
                                            </button>
                                                
                                             <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('food.destroy',[$item->id]) }}" method="POST">
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
                            <h3>Don't have any Foods</h3>
                            @endif

                        </tbody>
                    </table>
                    {{ $foods->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
