@extends('layouts.user')
@section('title')Покупки@endsection
@section('content')

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Дата</th>
                <th scope="col">Продукт</th>
                <th scope="col">Количество</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Статус покупки</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($buy as $item)
            <tr class="pt-2">
                <th scope="row">-</th>
                <td>{{\Illuminate\Support\Carbon::parse($item->updated_at)->format('Y-m-d')}}</td>
                <td>{{$item->product->name}}</td>
                <td>{{$item->count}} x {{$item->price}} руб.</td>
                <td>{{$item->total}} руб.</td>
                @if($item->status == 1)
                <td><span class="text-primary">Заказ в обработке</span> </td>
                @elseif($item->status == 2)
                    <td><span class="text-primary">Заказ отправлен</span> </td>
                <td>
                    <form action="{{route('confirmBuy',['cart'=>$item->id])}}"
                          method="post">
                        @csrf
                    <button type="submit" class="btn btn-outline-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        подтвердить получение
                    </button>
                    </form>
                </td>
                @elseif($item->status == 3)
                    <td><span class="text-success">Заказ получен</span> </td>
                    <td>
                        <form action="#" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                                оставить отзыв
                            </button>
                        </form>
                    </td>
                @endif
            </tr>
            @endforeach


            </tbody>
        </table>
    </div>
@endsection
