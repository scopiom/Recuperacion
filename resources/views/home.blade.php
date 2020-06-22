<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://kit.fontawesome.com/bad7489d5b.js" crossorigin="anonymous"></script>

    <!-- choose a theme file -->
    <link rel="stylesheet" href="/path/to/theme.default.css">
    <!-- load jQuery and tablesorter scripts -->
    <script type="text/javascript" src="/path/to/jquery-latest.js"></script>
    <script type="text/javascript" src="/path/to/jquery.tablesorter.js"></script>

    <!-- tablesorter widgets (optional) -->
    <script type="text/javascript" src="/path/to/jquery.tablesorter.widgets.js"></script>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @section('title')
    <title>Bienvenido</title>
    @endsection
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('/home') }}"><i class="menu-icon fa fa-home"></i>Inicio</a>
                    </li>
                    @if(Auth::user()->rol == 'dif')
                    <li>
                        <a href="{{ url('/subs') }}"><i class="menu-icon fas fa-users"></i>Suscriptores</a>
                    </li>
                    <li>
                        <a href="{{ url('/aut') }}"><i class="menu-icon fas fa-book"></i>Autores</a>
                    </li>
                    @endif
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-spell-check"></i>Propuestas</a>
                        <ul class="sub-menu children dropdown-menu">
                            @if(Auth::user()->rol == 'aut')
                            <li><i class="fas fa-list-ol"></i><a href="{{ url('/prop') }}">Mi lista de propuestas</a></li>
                            @endif
                            @if(Auth::user()->rol == 'dif')
                            <li><i class="fas fa-list-ol"></i><a href="{{ url('/prop-all') }}">Lista de propuestas</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-clipboard-list"></i>Contenidos</a>
                        <ul class="sub-menu children dropdown-menu">
                            @if(Auth::user()->rol == 'aut')
                            <li><i class="fas fa-book-open"></i><a href="{{ url('/cont') }}">Lista de contenidos</a></li>
                            @endif
                            @if(Auth::user()->rol == 'dif')
                            <li><i class="fas fa-book-open"></i><a href="{{ url('/cont-all') }}">Lista de contenidos</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars text-center"></i></a>
                    <a class="navbar-brand col-lg-4" href="/home"><i class="fa fa-home form-control text-center"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="user-area dropdown float-right">
                        @if (Auth::user()->rol == 'dif')
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle" src="{{ asset('images/admin.png') }}">
                            </a>
                        @endif
                        @if (Auth::user()->rol == 'aut')
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle" src="{{ asset('images/user.png') }}">
                            </a>
                        @endif
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Perfil</a>
                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Administración</a>
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-power -off"></i>Cerrar sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @section('content')
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-md-12 prueba">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <blockquote class="blockquote mb-0 text-light text-center">
                                    <h1 class="text-light">{{ Auth::user()->name }} - BIENVENIDO</h1>
                                    <footer class="blockquote-footer text-light">Manejador de contenidos</footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('footer')
        <div class="clearfix"></div>
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Equipo #1
                    </div>
                    <div class="col-sm-6 text-right">
                        Hecho por:
                    </div>
                </div>
            </div>
        </footer>
        @endsection
        <main class="py-4">
            @yield('title')
            @yield('content')
            @yield('footer')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>