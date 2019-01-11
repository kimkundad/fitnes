<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="This dashboard was created as an example of the flexibility that Architect offers.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    @include('admin.layouts.inc-stylesheet')
    @yield('admin.stylesheet')
</head>
<body >



<div class="app-container app-theme-white body-tabs-shadow fixed-header ">

  <!-- start: search & user box -->
  @include('admin.layouts.inc-header')
  <!-- end: search & user box -->


  <div class="app-main">

  @include('admin.layouts.inc-left-slidebar')

  <div class="app-main__outer">
    <div class="app-main__inner">
  @yield('admin.content')
    </div>
  </div>

  </div>

</div>

<div class="app-drawer-wrapper">

</div>


<!-- jQuery -->
@include('admin.layouts.inc-scripts')
@yield('scripts')



</body>

</html>
