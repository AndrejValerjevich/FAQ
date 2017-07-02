<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/diplom/diplom/public/css/reset.css"> <!— CSS reset —>
    <link rel="stylesheet" href="/diplom/diplom/public/css/style.css"> <!— Resource style —>
    <script src="/diplom/diplom/public/js/modernizr.js"></script> <!— Modernizr —>
    <title>FAQ</title>
</head>
<body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <ul class="nav navbar-nav navbar-left">
                    @if (Auth::guest())
                        <li><a href="home">Главная</a></li>
                    @else
                        <li><a href="admin">Главная</a></li>
                    @endif
                </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Вход</a></li>
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Выйти
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
        </nav>

        <header>
            <h1>F A Q</h1>
            @if (Auth::guest())
                <a href="ask" class="faq-auth__link"><h3 class="faq-auth">Спросить</h3></a>
            @else
                <a href="answer"><h3 class="faq-auth">Администраторы</h3></a>
            @endif
        </header>
        @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
