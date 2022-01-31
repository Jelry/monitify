<!DOCTYPE HTML>

<html>
	<head>
		<title>Edit
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

				<!-- Nav -->
					<nav id="nav">
						{{-- <img src="images/imglogo1.png" alt="" style="height:1.7em;width:13em"> --}}
						
						<!-- <a href="#work" class="icon solid fa-folder"><span>Psst hehe</span></a>
						<a href="#contact" class="icon solid fa-envelope"><span>Ayaw click</span></a> -->
						
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Me -->
						<article id="home" class="panel intro">
							<header>
								
								<p>
									<form action="/update" method="post" id="myform">
										
										@csrf
										<input type="hidden" name="id" value="{{$subj['id']}}">
										<label for="subject_name" style="background-color:rgb(47, 179, 47);padding:.5em;color:rgb(255, 255, 255);">Edit Subject Name</label>
										<input type="text" name="subject_name" value="{{$subj['subject_name']}}"> 
										<label for="subject_desc" style="background-color:rgb(47, 179, 47);padding:.5em;color:rgb(255, 255, 255);">Edit Subject Description</label>
										<input type="text" name="subject_desc" value="{{$subj['subject_desc']}}">
										<br>
										<input type="submit" id="sss"value="Update">
										<br>
										<a href="/Instructor">Cancel</a>
									</form>
								</p>
							</header>
							
						</article>
					
					
						
						
						
							

					</div>

				<!-- Footer -->
					<!-- <div id="footer">
						<ul class="copyright">
							<li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div> -->

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