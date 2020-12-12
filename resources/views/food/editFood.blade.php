@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header text-uppercase font-weight-bold">Update Category</div>

                <div class="card-body">
                   <form method="POST" action="{{ route('food.update',[$foods->id]) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Foods Name</label>
                            <input type="text" class="form-control @error('food_name') is-invalid @enderror" value="{{ $foods->food_name }}" name="food_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Food Name">
                              @error('food_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Food Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="" cols="30" rows="5" placeholder="description">
                                {{ $foods->description }}
                            </textarea>
                              @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{ $foods->price }}" name="price" id="exampleInputEmail1" aria-describedby="emailHelp" >
                              @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            @php
                                $category = DB::table('categories')->get();
                            @endphp
                            <select name="category_name" id="" class="form-control @error('category_name') is-invalid @enderror">
                                <option disabled selected>Select category</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"
                                         @if($item->id == $foods->cat_id) 
                                            selected 
                                         @endif
                                         >{{ $item->category_name }}</option>
                                @endforeach
                                
                               
                            </select>
                             @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                              
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" class="@error('image') is-invalid @enderror" name="image" id="exampleInputEmail1" aria-describedby="emailHelp" >
                              @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
