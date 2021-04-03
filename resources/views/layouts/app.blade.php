<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'laravel') }}</title> --}}
    <link rel="icon" href="{{ url('/img/Planet_logo.png') }}" />
    <title>Planet</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/quill.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//unpkg.com/swiper/swiper-bundle.min.css">
</head>
<body>
    <div id="app">
        <nav class="nav bg-white w-100 w-md-75 mx-auto py-1 border-bottom sticky-top">
            <div class="container">
                <div class="row">
                    <div class="navbar-nav col-3 px-2 py-1">
                        @auth('admin')
                        <div class="d-none d-md-block">
                            <ul class="nav-items d-flex">
                                <li class="nav-item p-2 menubtn">
                                    <a class="nav-link" href="{{ url('/admin/home')}}">admin.home</a>
                                </li>
                                <li class="nav-item p-2 menubtn">
                                    <a class="nav-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                    
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    
                        <div class="login-menu d-md-none">
                            <input id="nav-input-admin" type="checkbox" class="nav-hidden">
                            <label id="menubtn" class="menubtn m-0 p-1" for="nav-input-admin">
                                <img src="{{ url('/img/menu.png') }}" alt="">
                            </label>
                            <ul class="navbar-nav login-menu-item admin-menu px-3 py-2">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ url('/admin/home')}}">admin.home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                    
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @endauth
                    </div>
                    
                    <div class="col-6">
                        <div class="brand-content p-1 mx-auto">
                            <a class="" href="{{ url('/') }}">
                                <img src="{{ url('/img/Planet_top.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    
                    <!-- Right Side Of Navbar -->
                    <div class="navbar-nav col-3 px-2 py-1">
                        @guest
                        <div class="d-none d-md-block">
                            <ul class="nav-items d-flex float-right">
                                <li class="nav-item p-2 menubtn ">
                                    <a class="nav-link " href="{{ route('login') }}">{{ __('ログイン') }}</a>
                                </li>
                                @if (Route::has('register'))
                                <li class="nav-item p-2 menubtn">
                                    <a class="nav-link " href="{{ route('register') }}">{{ __('新規登録') }}</a>
                                </li>
                                @endif
                                <li class="nav-item d-md-none">
                                    <a class="nav-link" href="{{ route('posts.index') }}">ニュース一覧</a>
                                </li>
                                <li class="nav-item d-md-none">
                                    <a class="nav-link" href="{{ route('feature.index') }}">特集一覧</a>
                                </li>
                            </ul>
                        </div>
    
                        <div class="login-menu d-md-none">
                            <input id="nav-input" type="checkbox" class="nav-hidden">
                            <label id="menubtn" class="menubtn m-0 p-1 float-right" for="nav-input">
                                <img src="{{ url('/img/menu.png') }}" alt="">
                            </label>
                            <ul class="navbar-nav login-menu-item px-3 py-2">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('login') }}">{{ __('ログイン') }}</a>
                                </li>
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('register') }}">{{ __('新規登録') }}</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('posts.index') }}">ニュース一覧</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('feature.index') }}">特集一覧</a>
                                </li>
                            </ul>
                        </div>
                        @else
                        <div class="login-menu p-md-2">
                            <input id="nav-input" type="checkbox" class="nav-hidden">
                            <label id="menubtn" class="menubtn m-0 p-1 float-right d-none d-md-block" for="nav-input">
                                {{ Auth::user()->name }}
                            </label>
                            <label id="menubtn" class="menubtn m-0 p-1 float-right d-md-none" for="nav-input">
                                <img src="{{ url('/img/menu.png') }}" alt="">
                            </label>
                            <ul class="navbar-nav login-menu-item px-3 py-2">
                                <li class="nav-item d-md-none mb-2">
                                    <p>{{ Auth::user()->name }}</p>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('posts.create') }}">ニュース投稿</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('feature.index') }}">特集一覧</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('posts.index') }}">ニュース一覧</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                    {{ __('ログアウト') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </li>
                            </ul>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
        
        @yield('content')

        <footer class="footer conteiner text-center py-2">
            <a href="{{ route('info') }}"><i class="fas fa-play-circle mr-1"></i>利用規約</a>
            <p class="">Copyright &copy; 2021 Planet</p>
        </footer>
    </div>
    <script src="//unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      var Swiper = new Swiper('.swiper-container', {
        loop: true,
        centeredSlides:true,
        slidesPerView:1.8,

        autoplay: {
        delay: 3000,
        },

        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },

        pagination: {
        el: '.swiper-pagination',
        clickable: true,
        },

        scrollbar: {
        el: '.swiper-scrollbar',
        draggable: true,
        },
        })
    </script>
</body>
    
</html>
