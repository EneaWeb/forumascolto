<!doctype html>
<html lang="it">
<head>
	@include('frontend.layout.head')
</head>


<body>
<!-- =========================
   PRE LOADER       
============================== -->
<div class="preloader">
  <div class="status">&nbsp;</div>
</div>

@yield('content')

<footer>
	@include('frontend.layout.footer')
</footer> <!-- / END FOOOTER  -->

@include('frontend.layout.foot')
@include('components.alerts')

</body>
</html>