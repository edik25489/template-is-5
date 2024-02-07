@extends('layouts.first')

@section('title'){{$product->name}}@endsection

@section('content')
    <div class="container-md">
        <div class="card text-center">
            <div class="card-header">
                {{$product->name}}
            </div>
            <div class="card-body">
                <img
                    src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}"
                    class="rounded justify-content-center"
                    alt=""
                    style="width: 250px; height: 250px; object-fit: contain;">
                <h5 class="card-title">Категория: {{$product->category->name}}</h5>
                <p class="card-text">Описание: {{$product->description}}</p>
                <p class="card-text">Цена: {{$product->price}} руб.</p>
            </div>
            <div class="card-footer text-body-secondary">
            </div>
        </div>
    </div>


@endsection
