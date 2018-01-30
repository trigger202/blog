<!DOCTYPE html>
<html>
<head>
	<title> Blog - @yield('title')</title>
	@include('layouts.head')
</head>
<body>

	<div class="container">
		@yield('content')

	</div>

		@include('layouts.footer')

</body>
</html>