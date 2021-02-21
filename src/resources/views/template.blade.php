<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('lib/fontawesome-free/css/all.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/site.css') }}" />
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" />
</head>
<body class="hold-transition sidebar-mini">
  <!-- BEGIN Site Wrapper -->
  <div class="wrapper">
    <!-- BEGIN Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- BEGIN Left Navbar Links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a class="nav-link" href="{{ route('project') }}">O Projeto</a>
        </li>
      </ul>
      <!-- END Left Navbar Links -->
    </nav>
    <!-- END Navbar -->
    <!-- BEGIN Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- BEGIN Brand Logo -->
      <a class="brand-link" href="{{ route('home') }}">
        <span class="brand-text font-weight-light">Laravel v8.x - Projeto 001</span>
      </a>
      <!-- END Brand Logo -->
      <!-- BEGIN Sidebar -->
      <div class="sidebar">
        <!-- BEGIN Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ url('img/users/user1-128x128.jpg') }}" class="img-circle elevation-2" alt="Imagem do Usuário">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ session('LoggedUser')['user_name'] }}</a>
          </div>
        </div>
        <!-- END Sidebar user (optional) -->
        <!-- BEGIN Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">
                <i class="nav-icon fas fa-star"></i><p>Home</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('project') }}">
                <i class="nav-icon fas fa-code"></i><p>O Projeto</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('product-index') }}">
                <i class="nav-icon fas fa-archive"></i><p>Produtos</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('auth-logout') }}">
                <i class="nav-icon fas fa-door-closed"></i><p>Sair</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- END Sidebar Menu -->
      </div>
      <!-- END Sidebar -->
    </aside>

    <!-- BEGIN Content Wrapper -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- END Content Wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.5
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> - <i>All rights reserved.</i>
    </footer>
  </div>
  <!-- END Site Wrapper -->
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/adminlte.min.js') }}"></script>
  <script src="{{ asset('js/site.js') }}"></script>
</body>
</html>
