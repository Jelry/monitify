<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Sign in</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
		
			<div id="wrapper" class="fade-in">
				
				<!-- Intro -->
					<!-- <div id="intro">
						
						<h1>
						Consultinator</h1>
					
					</div> -->

				<!-- Header -->
					<!-- <header id="header">
						<a href="index.html" class="logo">Massively</a>
					</header> -->

				<!-- Nav -->
				

				<!-- Main -->
					<div id="main">

						<!-- Featured Post -->
							<article class="post featured">
								
								<header class="major" style="display:flex;justify-content:center;">
									
									
									<form  action="{{route ('auth.check')}}" method="post" id="myform">
										@if(Session::get('fail'))
                                        <div style="background-color: rgb(231, 79, 79);color:rgb(255, 255, 255);width:14em; padding:1em;border-radius:1em;">
                                            {{Session::get('fail')}}
                                        </div>
                                        @endif
                                        @csrf
										<input type="hidden" name="usertype" value="student">
										<label for=""></label>
										<input type="text" name="username" required  value="{{old('username')}}" placeholder="Username">
										<input type="password" name="password" required placeholder="Password">
										
										<button type="submit">Sign in</button>
										<a href="/reg"style="margin-top:1em;" >I don't have an account</a>
											
											<a href="/">Home</a>
										
									</form>
									
									
								</header>
							
								
							</article>


					</div>

				

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>