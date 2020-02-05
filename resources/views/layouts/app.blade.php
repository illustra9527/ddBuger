<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    @yield('css')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/admin">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest

                    @else

                    <ul class="navbar-nav mr-auto">
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
                        <li><a class="nav-link" href="/">前台</a></li>
                        <li><a class="nav-link" href="/admin/banner">首頁Banner管理</a></li>
                        <li><a class="nav-link" href="/admin/social">社群貼文管理</a></li>
                        <li><a class="nav-link" href="/admin/order">訂單管理</a></li>
                        @endif

                        @if (Auth::user()->role == 'super_admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navBarMenu" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                菜單管理
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navBarMenu">
                                <a class="dropdown-item" href="/admin/product_type">菜單分類</a>
                                <a class="dropdown-item" href="/admin/product">菜單產品</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLocation" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                分店管理
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarLocation">
                                <a class="dropdown-item" href="/admin/location_city">分店城市</a>
                                <a class="dropdown-item" href="/admin/location">分店地點</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarNews" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                最新消息管理
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarNews">
                                <a class="dropdown-item" href="/admin/news_type">最新消息分類</a>
                                <a class="dropdown-item" href="/admin/news">最新消息訊息</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarRecruit" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                徵才管理
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarRecruit">
                                <a class="dropdown-item" href="/admin/recruit_content">徵才條件</a>
                                <a class="dropdown-item" href="/admin/recruit_job">徵才分店</a>
                            </div>
                        </li>

                        <li><a class="nav-link" href="/admin/account">帳號管理</a></li>
                        @endif

                    </ul>
                    @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

{{--     <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script> --}}

    <script>
        $(document).ready(function() {
            $('select').selectpicker();

            /* 解決Bootstrap 上傳檔案後不會出現檔名的問題 */
            $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });


        });


    </script>
    @yield('js')
</body>

</html>
