@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($categories as $item)
           
            <div class="col-md-12">
                <h2 style="color: blueviolet">{{ $item->category_name }}</h2>
                <div class="jumbotron">
                    <div class="row">
                        @foreach (App\Models\Food::where('cat_id',$item->id)->get() as $food)
                            <div class="col-md-3">
                                <img src="{{ asset('images') }}/{{ $food->image }}" alt="" width="200" height="155">
                                <p class="text-center">{{ $food->food_name }}
                                    <span>{{ $food->price }} TK</span>

                                </p>
                                <p class="text-center">
                                    <a href="{{ route('food.view',[$food->id]) }}" class="btn btn-outline-success">View</a>
                                </p>
                                

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
