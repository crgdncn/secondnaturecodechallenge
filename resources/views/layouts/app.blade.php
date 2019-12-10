<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token      --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Code Challenge') }}</title>

    {{-- Fonts  --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Styles --}}
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('images/logo.jpeg')}}" class="widget-company-logo"> {{ config('app.name', 'Widget Code Challenge') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home', [], false) }}">Customers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.show', [Auth::user()->id], false) }}">My Widgets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.edit', [Auth::user()->id], false) }}">My Account</a>
                            </li>

                            @can('manage-widgets', Auth::user())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('widget.index', [], false) }}">Admin</a>
                            </li>
                            @endcan
                            <li class="nav-item">
                                <form id="logout-form" method="POST" action="{{route('logout', [], false)}}">
                                    @csrf
                                </form>
                                <a class="nav-link" href="#"  onclick="logout(); return false;">Logout</a>
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

    {{-- Modal --}}
    <div class="modal fade" id="modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header th-color">
                    <div class="mr-auto">
                        <h4 id="modal-header" class="modal-title">SNCC</h4>
                    </div>
                    <div class="ml-auto">
                        <button id="modal-dismiss-button" type="button" class="close" style="font-size: 1.5em;" data-dismiss="modal">
                            &times;
                        </button>
                    </div>
                </div>
                <div id="modal-body" class="modal-body">
                    <p>Modal Body</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}

    {{-- Scripts --}}
    <script src="{{mix('/js/app.js')}}"></script>
    <script src="{{mix('/js/global.js')}}"></script>
    @stack('scripts')
</body>
</html>
