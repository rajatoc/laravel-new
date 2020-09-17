<!doctype html>
<html class="no-js" lang="">

	@include('layouts.header')
	
	<body>
		@yield('content')
		
		@include('layouts.footer')

		@yield('scripts')

	</body>
</html>