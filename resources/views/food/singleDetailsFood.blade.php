@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Product Image') }}</div>

                <div class="card-body">
                   <img src="{{ asset('/images') }}/{{ $foods->image }}" class="img-responsibe" width="260" height="250">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Details') }}</div>

                <div class="card-body" >
                   <strong><h2>{{ $foods->food_name }}</h2></strong>
                   <p>{{ $foods->description }}</p>
                   <p><h4>{{ $foods->price }} Taka</h4></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
