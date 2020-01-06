<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Myblog</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}"  rel="stylesheet">
    <link href="{{ asset('css/minecss.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script language="JavaScript">
        $(document).ready(function() {
            $('.nav-link-collapse').on('click', function() {
                $('.nav-link-collapse').not(this).removeClass('nav-link-show');
                $(this).toggleClass('nav-link-show');
            });
        });

    </script>
</head>
<body>

<div class="col-sm-9" id="app">
    <div class="container">
        @yield('content')
    </div>

</div>


            <!-- Navbar -->
<div class="col-sm-3" id="app">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">MyBlog</a>
        <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarCollapse"
                aria-controls="navbarCollapse"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('admin.index') }}">Панель состояния <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-collapse"
                       href="#"
                       id="hasSubItems"
                       data-toggle="collapse"
                       data-target="#collapseSubItems2"
                       aria-controls="collapseSubItems2"
                       aria-expanded="false">Блог</a>
                    <ul class="nav-second-level collapse" id="collapseSubItems2" data-parent="#navAccordion">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.category.index')}}">
                                <span class="nav-link-text">Категории</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.article.index')}}">
                                <span class="nav-link-text">Материалы</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a
                            class="nav-link nav-link-collapse"
                            href="#"
                            id="hasSubItems"
                            data-toggle="collapse"
                            data-target="#collapseSubItems4"
                            aria-controls="collapseSubItems4"
                            aria-expanded="false"
                    >Управление пользователями</a>
                    <ul class="nav-second-level collapse" id="collapseSubItems4" data-parent="#navAccordion">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.user_managment.user.index')}}">
                                <span class="nav-link-text">Пользователи</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a
                            class="nav-link nav-link-collapse"
                            href="#"
                            id="hasSubItems"
                            data-toggle="collapse"
                            data-target="#collapseSubItems5"
                            aria-controls="collapseSubItems5"
                            aria-expanded="false"
                    >{{ Auth::user()->name }}</a>
                    <ul class="nav-second-level collapse" id="collapseSubItems5" data-parent="#navAccordion">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><span class="nav-link-text">Login</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><span class="nav-link-text">Register</span></a></li>
                        @else
                            <li class="nav-item">
                                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="nav-link-text">
                                                Logout
                                            </span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

</div>



<!-- Scripts -->
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
</body>
</html>
