@extends('layouts.manager')
@section('title')Покупки@endsection

@section('content')
    <div class="container-md text-center">
        <h3>Заявки на покупку</h3>
    </div>
    <div class="container">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Пользователь</th>
                <th scope="col">Продукт</th>
                <th scope="col">Цена</th>
                <th scope="col">Количество</th>
                <th scope="col">Итого</th>
                <th scope="col">Статус</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>


            </tbody>
        </table>
    </div>
@endsection
