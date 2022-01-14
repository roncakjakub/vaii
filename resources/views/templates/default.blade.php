<!DOCTYPE html >
<html lang="sk">
<head>
    <meta charset="utf-8">
    <title>Autoškola Filip Testovač</title>

    {{--    <meta name="description" content="Autoškola Filip Testovač">--}}
    <meta name="title" content="Autoškola Filip Testovač">
    <meta name="author" content="Jakub Rončák">
    {{--    <meta http-equiv="Cache-control" content=">--}}
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/c5e361ebe1.js" crossorigin="anonymous"></script>
    <link href="http://fonts.cdnfonts.com/css/cardo" rel="stylesheet">
    {{--    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&display=swap"--}}
    {{--          rel="stylesheet"/>--}}
    {{--    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,500,600&display=swap"--}}
    {{--          rel="stylesheet"/>--}}
    <link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet'>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

</head>
<body class="position-relative">
<!-- Header -->

<nav class="navbar navbar-expand-lg static-top navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{asset('img/logo.png')}}" alt="Logo" height="36">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item me-3 text-end">
                    <a class="nav-link ff-mrsw fs-20 @if(in_array(\Illuminate\Support\Facades\Route::currentRouteName(), ['home'])) active @endif"
                       href="{{route('home')}}">Domov</a>
                </li>
                <li class="nav-item me-3 text-end">
                    <a class="nav-link ff-mrsw fs-20 @if(in_array(\Illuminate\Support\Facades\Route::currentRouteName(), ['courses.index'])) active @endif"
                       href="{{route('licence_types.index')}}">Licencie</a>
                </li>
                <li class="nav-item me-3 text-end">
                    <a class="nav-link ff-mrsw fs-20 @if(in_array(\Illuminate\Support\Facades\Route::currentRouteName(), ['contact'])) active @endif"
                       href="{{route('contact')}}">Kontakt</a>
                </li>
                @auth()
                    <li class="nav-item dropdown d-flex align-self-lg-center align-self-end me-3 me-lg-0">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> <span
                                class="d-lg-none ff-mrsw fs-20">Príhlasenie</span> <i
                                class="d-none d-lg-inline-block fa fa-user"></i> </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('admin.courses.index')}}"> Kurzy </a>
                            {{--                            <li><a class="dropdown-item" href="{{route('admin.course_requests.index')}}">--}}
                            {{--                                    Žiadosti </a></li>--}}
                            {{--                            </li>--}}
                            <li><a class="dropdown-item" href="{{route('admin.students.index')}}">
                                    Študenti </a></li>
                            </li>
                            <li><a class="dropdown-item" href="{{route('admin.teachers.index')}}">
                                    Učitelia </a></li>
                            </li>
                            <li><a class="dropdown-item" href="{{route('admin.vehicles.index')}}">
                                    Vozidlá </a></li>
                            </li>
                            <li><a class="dropdown-item" href="{{route('logout')}}"> Odhlásiť sa </a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item d-flex align-self-lg-center align-self-end me-3 me-lg-0">
                        <a class="nav-link" href="{{route('loginForm')}}"><span
                                class="d-lg-none ff-mrsw fs-20">Príhlasenie</span>
                            <i class="d-none d-lg-inline-block fa fa-user"></i></a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
@guest()
    <div class="sub-nav text-white text-center my-shadow ff-mrsw">
        <div class="container">
            Z dôvodu nariadenia vlády SR o zákaze vychádzania. Prevádzka našej autoškoly bude dňom 19.9.2021
            dočasne uzavreta.
            Účastníkov prebiehajúcich kurzov budeme o jazdách včas informovať.
        </div>
    </div>
@endguest
<!-- Content -->
<div id="layout-content" class="layout-content clearfix">
    @yield('content')
</div>
<div class="modal" id="mainModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="mainModalHeader">
                <h5 class="modal-title text-white" id="mainModalTitle">Modal title</h5>

            </div>
            <div class="modal-body" id="mainModalBody">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="mainModalSubmitBtn" class="btn btn-primary">Odoslať</button>
                <button type="button" id="mainModalCloseBtn" class="btn" data-bs-dismiss="modal">Zavrieť
                </button>
            </div>
        </div>
    </div>
</div>

<footer class="ff-crd fs-16 text-center py-3 position-absolute w-100 text-center">
    Jakub Rončák © 2021
</footer>

<script src="{{ asset('js/script.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        }
    });
</script>
@stack('scripts')
</body>
</html>
