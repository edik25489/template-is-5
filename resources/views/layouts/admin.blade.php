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

            @if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        {{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}
                    </a>
                    <ul class="dropdown-menu text-small" style="">
                        <li><a class="dropdown-item" href="{{route('adminUsers')}}">Пользователи</a></li>
                        <li><a class="dropdown-item" href="{{route('adminManagers')}}">Менеджеры</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{route('adminLogout')}}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">Выйти</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endif

        </div>
    </div>
</header>
@yield('content')
<div class="container fixed-bottom">
    <footer class="py-3 my-4">
        <p class="text-center text-body-secondary">© 2024 Company, Inc</p>
    </footer>
</div>
</body>
</html>
