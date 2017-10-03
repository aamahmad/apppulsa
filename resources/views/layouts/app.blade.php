<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    
</head>
<body class="bg">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          @if(Auth::check())
          <ul class="nav navbar-nav">
            <li {{ setActive('home') }}><a href="{{ url('home') }}">Home</a></li>
            <li {{ setActive('customers') }}><a href="{{ url('customers') }}">Pelanggan</a></li>
            <li {{ setActive('suppliers') }}><a href="{{ url('suppliers') }}">Sales</a></li>
            <li {{ setActive('deposits') }}><a href="{{ url('deposits') }}">Deposit</a></li>
            <li {{ setActive('stocks') }}><a href="{{ url('stocks') }}">Stock</a></li>
            <li {{ setActive('categories') }}><a href="{{ url('categories') }}">Category</a></li>
            <li {{ setActive('products') }}><a href="{{ url('products') }}">Produk</a></li>
            <li {{ setActive('sells') }}><a href="{{ url('sells') }}">Penjualan</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
           <li class="dropdown">
                
              <ul class="dropdown-menu">
                <li><a href="{{ url('/settings/profile') }}">Profile</a></li>
              </ul>
            </li>   
            <li>
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
          </ul>

          @endif

        </div><!--/.nav-collapse -->
      </div>
    </nav>

      @include('layouts._flash')
      @yield('content')
   
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
