@extends('layouts.auth')

@section('title')Регистрация@endsection

@section('content')
    <form action="{{route('register')}}" method="post">
        @csrf
        <h1 class="mt-5 h3 fw-normal">Регистрация пользователя</h1>
        <div class="mt-1">
            <label for="exampleInputName" class="form-label">Введите имя пользователя</label>
            <input name="name" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
            <div id="nameHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
        </div>
        <div class="mt-1">
            <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
        </div>
        <div class="mt-2">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="w-100 mt-3 btn btn-primary">Отправить</button>
    </form>
@endsection
