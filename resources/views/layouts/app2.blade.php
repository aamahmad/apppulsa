<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
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
          <ul class="nav navbar-nav navbar-left">
            <li><a href="{{ url('home') }}">Dashboard</a></li>
            <li><a href="{{ url('status?q=0') }}"><b>Belum Bayar</b> <span class="badge">
              {{ App\Sell::where('isLunas','!=',1)->count() }}
            </span></a></li>
            <li><a href="{{ url('status?q=0') }}"><b>Laba Hari ini</b> <span class="badge">
              Rp {{ number_format(App\Sell::where('tgl',Carbon\Carbon::now()->format('Y-m-d') )->get()->sum('laba')) }}
            </span></a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
          </ul>
         
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          @if(Auth::check())
          <ul class="nav nav-sidebar sisi">
            <li {{ setActive('home') }} ><a href="{{ url('home') }}">Dashboard</a></li>
          </ul>
          <ul class="nav nav-sidebar sisi">
            <li {{ setActive('sells') }}><a href="{{ url('sells') }}">Penjualan</a></li>
            <li {{ setActive('deposits') }}><a href="{{ url('deposits') }}">Deposit</a></li>
            <li {{ setActive('stocks') }}><a href="{{ url('stocks') }}">Stock</a></li>
          </ul>
          <ul class="nav nav-sidebar sisi">
            <li {{ setActive('customers') }}><a href="{{ url('customers') }}">Pelanggan</a></li>
            <li {{ setActive('downlines') }}><a href="{{ url('downlines') }}">Downline</a></li>
            <li {{ setActive('suppliers') }}><a href="{{ url('suppliers') }}">Sales</a></li>
            <li {{ setActive('categories') }}><a href="{{ url('categories') }}">Category</a></li>
            <li {{ setActive('products') }}><a href="{{ url('products') }}">Produk</a></li>
          </ul>       
          @endif
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        @include('layouts._flash')
        @yield('content')

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
     <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
    
  </body>
</html>
