@extends('layouts.first')

@section('title')Главная страница@endsection

@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-2">
            @foreach($product as $item)
                <div class="col">
                    <div class="card shadow-sm">
                        <a class="d-flex justify-content-center" href="{{route('product',['product'=>$item->id])}}">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($item->image)}}" alt=""
                                 style="height: 200px; object-fit: contain;">
                        </a>

                        <div class="card-body">
                            <h3>{{$item->name}}</h3>
                            <p class="card-text text-truncate">{{$item->description}}</p>
                            <p class="card-text"><strong>Категория: </strong>{{$item->category->name}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                @if(\Illuminate\Support\Facades\Auth::guard('user')->check())
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-outline-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708"/>
                                            </svg>
                                        </a>
                                        <a href="#" class="btn btn-outline-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                            </svg>
                                        </a>
                                    </div>
                                @else
                                    <p class="text-muted">
                                        <small>Авторизуйтесь</small>
                                    </p>
                                @endif

                                <p class="text-muted"><strong>Цена: </strong>{{$item->price}} руб.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center align-items-center mt-3">
            <ul class="pagination">
                {{$product->links()}}
            </ul>
        </div>
    </div>
@endsection
