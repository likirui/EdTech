<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EdTech') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!--<a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'EdTech') }}
                </a>-->
                <a class="navbar-brand" href="{{ Auth::check() && Auth::user()->role === 'parent' ? url('/parent/dashboard') : (Auth::check() && Auth::user()->role === 'student' ? url('/student/dashboard') : url('/')) }}">
    {{ config('app.name', 'EdTech') }}
</a>

                  <!-- Add the language switcher here -->
                  @include('language-switcher')
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

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @if ($role === 'parent')
            <!-- Display parent navigation links -->
            <li class="nav-item">
                <a class="nav-link" href="#">Add Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Subjects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Exams Papers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Exam Results</a>
            </li>
        @else
            <!-- Display student navigation links -->
            <li class="nav-item">
                <a class="nav-link" href="#">Subjects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('exams.index') }}">Exams Papers</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('exams.results') }}">Exam Results</a>
            </li>
        @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="bg-light py-4">
        <div style="margin-bottom:0px;" class="container text-center">
            &copy; {{ date('Y') }} {{ config('app.name', 'EdTech') }}. All Rights Reserved.
        </div>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>

<script>
   
    $(document).ready(function () {
    $('.table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'csv'
        ],
    });
});
</script>
</html>
