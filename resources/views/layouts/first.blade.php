<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                <i class="bi bi-1-circle"></i>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-body-emphasis">Категории</a></li>
                <li><a href="#" class="nav-link px-2 link-body-emphasis">Продукты</a></li>
                <li><a href="#" class="nav-link px-2 link-body-emphasis">О нас</a></li>
            </ul>

            @if(\Illuminate\Support\Facades\Auth::guard('user')->check())
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" style="">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('userLogout')}}">Sign out</a></li>
                    </ul>
                </div>
            @else
                <a href="{{route('loginUser')}}" class="link-opacity-25-hover nav-link px-2 link-body-emphasis">Авторизоваться</a>
            @endif

        </div>
    </div>
</header>
    @yield('content')
<div class="container fixed-bottom">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="{{route('adminManagers')}}" class="nav-link px-2 text-body-secondary">Администратор</a></li>
            <li class="nav-item"><a href="{{route('managerBuyer')}}" class="nav-link px-2 text-body-secondary">Менеджер</a></li>
            <li class="nav-item"><a href="{{route('userCart')}}" class="nav-link px-2 text-body-secondary">Пользователь</a></li>
        </ul>
        <p class="text-center text-body-secondary">© 2024 Company, Inc</p>
    </footer>
</div>
</body>
</html>
