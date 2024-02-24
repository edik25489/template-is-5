@extends('layouts.manager')
@section('title')Покупки@endsection

@section('content')
    <div class="container-md text-center">
        <h3>Заявки на покупку</h3>
    </div>
    <div class="container-sm">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Дата</th>
                <th scope="col">Пользователь</th>
                <th scope="col">Информация</th>
                <th scope="col">Статус покупки</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($buy as $item)
                <tr class="pt-2">
                    <th scope="row">-</th>
                    <td>{{\Illuminate\Support\Carbon::parse($item->updated_at)->format('Y-m-d')}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>
                        <p>{{$item->product->name}}</p>
                        <p>{{$item->count}} x {{$item->price}} руб.</p>
                        <p>{{$item->total}} руб.</p>
                    </td>
                    @if($item->status == 1)
                        <td><span class="text-primary">Новый заказ</span> </td>
                        <td>
                                    <form action="{{route('confirm',['cart'=>$item->id])}}"
                                          method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                            </svg>
                                            подтвердить
                                        </button>
                                    </form>
                                    <form action="{{route('failure',['cart'=>$item->id])}}"
                                          method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                                            </svg>
                                            отклонить
                                        </button>
                                    </form>

                        </td>
                    @elseif($item->status == 2)
                        <td><span class="text-primary">Заказ в пути</span> </td>
                    @elseif($item->status == 3)
                        <td><span class="text-success">Заказ доставлен</span> </td>
                        <td>
                            <form action="#" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                    отзыв о товаре
                                </button>
                            </form>
                        </td>
                    @elseif($item->status == 4)
                        <td><span class="text-danger">Заказ отклонен</span> </td>
                        <td>
                        </td>
                    @endif
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
@endsection
