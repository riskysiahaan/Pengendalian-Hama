<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pengendalian Hama</title>

    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
        .form-control {
            background-color:  #ffffff!important;
        }
    </style>
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('semicolon/css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('semicolon/style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/swiper.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/dark.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/font-icons.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/magnific-popup.css')}}" type="text/css" />

	<link rel="stylesheet" href="{{asset('semicolon/css/components/bs-rating.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/components/bs-filestyle.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('semicolon/css/custom.css')}}" type="text/css" />
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <link href="{{ asset('css/confirm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="col-xl-2">
                        <img src="{{asset('img/icon.jpeg')}}" alt="" class="img-thumbnail img-fluid">
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

            @yield('content')
    </div>
    <script src="{{asset('semicolon/js/jquery.js')}}"></script>
    <script src="{{asset('semicolon/js/plugins.min.js')}}"></script>

    <!-- Footer Scripts ============================================= -->
    <script src="{{asset('semicolon/js/components/star-rating.js')}}"></script>
    <script src="{{asset('semicolon/js/components/bs-filestyle.js')}}"></script>

    <script src="{{asset('semicolon/js/functions.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugin.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/method.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/confirm.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/toastr.js')}}"></script>
    @yield('script')
</body>
</html>
