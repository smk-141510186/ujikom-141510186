<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Penggajian</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('d/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="{{url('d/css/sb-admin.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('d/font-awesome/css/font-awesome.min.css')}}">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="{{url('http://cdn.oesmith.co.uk/morris-0.4.3.min.css')}}">

    <style type="text/css">
        body{
            background-color: #007acc;
        }
    </style>
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <b><a class="navbar-brand" href="{{url('home')}}"><span class="fa fa-dashboard"></span> Penggajian</a></b>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            @if (Auth::guest())
            <li><a href="{{ url('/login') }}"><span class="fa fa-sign-in"></span> Login</a></li>
            <li><a href="{{ url('/register') }}"><span class="fa fa-plus-square-o"></span> Register</a></li>
            @else
            <li><a href="{{ url('jabatan') }}"><span class="fa fa-briefcase"></span> Jabatan</a></li>
            <li><a href="{{ url('golongan') }}"><span class="fa fa-refresh"></span> Golongan</a></li>
            <li><a href="{{ url('pegawai') }}"><span class="fa fa-users"></span> Pegawai</a></li>
            <li><a href="{{ url('lembur-kategori') }}"><span class="fa fa-clock-o"></span> Kategori Lembur</a></li>
            <li><a href="{{ url('lembur-pegawai') }}"><span class="fa fa-clock-o"></span><span class="fa fa-users"></span> Lembur Pegawai</a></li>
            <li><a href="{{ url('tunjangan') }}"><span class="fa fa-usd"></span> Tunjangan</a></li>
            <li><a href="{{ url('tunjangan-pegawai') }}"><span class="fa fa-usd"></span><span class="fa fa-users"></span> Tunjangan Pegawai</a></li>
            <li><a href="{{ url('penggajian') }}"><span class="fa fa-money"></span> Penggajian</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <span class="fa fa-user"></span>
                     {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <span class="fa fa-sign-out"></span>Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            @endif
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      
    <div id="page-wrapper">
        <div class="col-lg-4">
            @yield('content')
        </div>
    </div>

    </div><!-- /.row -->

    </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="{{url('d/js/jquery-1.10.2.js')}}"></script>
    <script src="{{url('d/js/bootstrap.js')}}"></script>

    <!-- Page Specific Plugins -->
    <script src="{{url('http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js')}}"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="{{url('d/js/morris/chart-data-morris.js')}}"></script>
    <script src="{{url('d/js/tablesorter/jquery.tablesorter.js')}}"></script>
    <script src="{{url('d/js/tablesorter/tables.js')}}"></script>

  </body>
</html>
