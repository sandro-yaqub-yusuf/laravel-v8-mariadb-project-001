<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LARAVEL v8.x - Projeto 001 - LOGIN</title>
  <link rel="stylesheet" href="{{ asset('lib/fontawesome-free/css/all.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('lib/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/site.css') }}" />
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" />
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="register-logo"><b>LARAVEL v8.x</b> - Projeto 001</div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Efetue seu Login para acesso ao Projeto</p>
        @include('includes.alerts')
        <form id="product_form" class="form-horizontal" method="POST" action="{{ route('auth-loginCheck') }}">
          @csrf
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Digite seu Email...">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Digite sua Senha...">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Lembrar meu Login</label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">LOGAR</button>
            </div>
          </div>
        </form>
        <p class="mb-1">
          <a href="#">Esqueci minha senha</a>
        </p>
        <p class="mb-0">
          <a href="{{ route('auth-register') }}" class="text-center">Cadastrar novo Login</a>
        </p>
      </div>
    </div>
  </div>
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/adminlte.min.js') }}"></script>
  <script src="{{ asset('js/site.js') }}"></script>
</body>
</html>
