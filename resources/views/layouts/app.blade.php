<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Quick Review') }}</title>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e5763b0d82.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

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
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
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

    @guest
        @yield('content')
    @else
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <div class="list-group">
                            <a class="list-group-item {{Route::currentRouteName() == 'content.feed' ? 'active' : ''}}"
                               href="{{route('content.feed')}}">Feed </a>
                            <a class="list-group-item {{Route::currentRouteName() == 'content.index' ? 'active' : ''}}"
                               href="{{route('content.index')}}">All Contents </a>
                            <a class="list-group-item {{Route::currentRouteName() == 'content.create' ? 'active' : ''}}"
                               href="{{route('content.create')}}">New Content </a>
                            <a class="list-group-item {{Route::currentRouteName() == 'category.index' ? 'active' : ''}}"
                               href="{{route('category.index')}}">Categories</a>
                            <a class="list-group-item {{Route::currentRouteName() == 'category.create' ? 'active' : ''}}"
                               href="{{route('category.create')}}">New Category</a>
                            <!--
                             <a class="list-group-item" href="">New Tag</a>
                              -->
                            <a class="list-group-item " href="">Pending Reviews</a>

                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                Categories
                            </div>
                            <div class="card-body">
                                ...
                            </div>
                        </div>
                        <!--
                        <div class="card mt-4">
                            <div class="card-header">
                                Tags
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                        -->
                    </div>
                    <div class="col-md-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    @endguest
</div>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
@yield('content-script')
<script>
    $('#editor').summernote({
        height: 500
    });
</script>
</body>
</html>
