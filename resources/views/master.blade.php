<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet"  type="text/css"  href="{{ asset('css/bootstrap.min.css') }}" />
<link rel="stylesheet"  type="text/css"  href="{{ asset('css/chosen.css') }}" />
<link href="{{ asset('css/jquery.validation.css') }}" rel="stylesheet">
<link href="{{ asset('css/datepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/chosen.jquery.js') }}"></script>
<script src="{{ asset('js/jquery.validation.js') }}"></script>
<script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
</head>

<body>
<div class="header">
  <div class="row">
    <div class="col-md-6 wel_p">Welcome to Live'D'Tripe</div>
    <div class="col-md-6 tar">
      <div class="drop_menu"> <a href="#" class="d_menu">ADMIN <i class="fa fa-sort-down"></i></a>
        <ul class="topsub-menu">
          <li><a href="#">Menu 01</a></li>
          <li><a href="#">Menu 02 dasdasdsd</a></li>
        </ul>
      </div>
      <a href="{{ url('/auth/logout') }}" class="btn_o"><i class="fa fa-sign-out"></i> Log Out</a> </div>
  </div>
</div>
<div class="content"> 
  <!--Content Left-->
  <div class="c_left">
    <div class="logo"><img src="{{ asset('images/logo.png') }}" alt="logo"></div>
    <ul class="side_menu">     
      <li {{{ (Request::is('country*') ? 'class=active' : '') }}}><a href="{{url('country')}}">Country Management</a></li>
      <li {{{ (Request::is('state*') ? 'class=active' : '') }}}><a href="{{url('state')}}">State Management</a></li>
      <li {{{ (Request::is('city*') ? 'class=active' : '') }}}><a href="{{url('city')}}">City Management</a></li>
      <li {{{ (Request::is('location*') ? 'class=active' : '') }}}><a href="{{url('location')}}">Tour Location Management</a></li>
      <li {{{ (Request::is('tour-category*') ? 'class=active' : '') }}}><a href="{{url('tour-category')}}">Tour Category Management</a></li>
      <li {{{ (Request::is('tour-theme*') ? 'class=active' : '') }}}><a href="{{url('tour-theme')}}">Tour Theme Management</a></li>
      <li {{{ (Request::is('tour-class*') ? 'class=active' : '') }}}><a href="{{url('tour-class')}}">Tour Class Management</a></li>
      <li {{{ (Request::is('hotel*') ? 'class=active' : '') }}}><a href="{{url('hotel')}}">Hotel Management</a></li>
      <li {{{ (Request::is('package*') ? 'class=active' : '') }}}><a href="{{url('package')}}">Package Management</a></li>
      <li {{{ (Request::is('content*') ? 'class=active' : '') }}}><a href="{{url('content')}}">Content Management</a></li>
      <!--<li {{{ (Request::is('customer*') ? 'class=active' : '') }}}><a href="{{url('customer')}}">Customer Management</a></li>-->
    </ul>
  </div>
  <!--Content Right-->
  <div class="c_right">
    @yield('content')
</div>
</div>
<div class="footer"> Copyright©2016</div>
<script>
    $(document).ready(function(){
        $('.delete_link').click(function(){
            var r=confirm('Are you sure to delete?'); if(r==true) {
                $(this).next('.delete_class').submit(); 
            }
        });
    })
</script>    
</body>
</html>
