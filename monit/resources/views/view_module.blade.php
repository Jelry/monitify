<!DOCTYPE HTML>

<html>
	<head>
		<title>monitify
		</title>
		<link rel="icon" href="images1/pic11.jpg" type="image/icon type">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		{{-- <link rel="stylesheet" href="assets1/css/main.css" /> --}}
		<link href="{{ asset('assets1/css/main.css') }}" rel="stylesheet" type="text/css" >
		{{-- <noscript><link rel="stylesheet" href="assets1/css/noscript.css" /></noscript> --}}
		<noscript><link rel="stylesheet" href=" {{ asset('assets1/css/noscript.css') }}" /></noscript>
	</head>
	<body class="is-preload" >

		<!-- Wrapper-->
			<div id="wrapper">
                <iframe src="/public/{{$data['file']}}" width="100%" height="500"  frameborder="1"></iframe>
                    <a href="{{ asset('/public/'.$data['file']) }}" target="_blank">Click here if the pdf failed to display</a>
               
			</div>
		<!-- Scripts -->
		<script type="text/javascript" src="{{ asset('assets1/js/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets1/js/jquery.scrollex.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets1/js/jquery.scrolly.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets1/js/browser.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets1/js/breakpoints.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets1/js/util.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets1/js/main.js') }}"></script>

	</body>
</html>