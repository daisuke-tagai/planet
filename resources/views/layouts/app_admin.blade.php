<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'laravel') }}</title> --}}
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

    <!-- Quill -->
    <link rel="stylesheet" href="{{ asset('css/quill.css') }}">
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    


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
                                    <a class="nav-link" href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault();
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
                                    <a class="nav-link" href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault();
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
                    <div class="navbar-nav col-3 text-right py-2">
                        @auth('admin')
                        <p class="py-1 py-md-2">
                            {{ Auth::user()->name }}
                        </p>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        {{-- @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('admin.register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.register') }}">{{ __('Register') }}</a>
        </li>
        @endif --}}

        
            
        @yield('content')

    </div>
</body>
</html>
