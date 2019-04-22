<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Vuebnb</title>
		<link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
	</head>

	<body>
		<main class="">
			@yield('content')
		</main>

		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}"></script>

		<!-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js" ></script>
    <script >
        CKEDITOR.replace('article-ckeditor' );
    </script> -->
	</body>

</html>
