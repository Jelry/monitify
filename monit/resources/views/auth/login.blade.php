<!DOCTYPE HTML>

<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	
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
									
									
                                    <form action="{{route ('auth.check')}}" method="post" id="myform">
                           
                          

                                        @if(Session::get('fail'))
                                        <div>
                                            {{Session::get('fail')}}
                                        </div>
                                        @endif
                                        @csrf
                                        <input type="hidden" name="usertype" value="student">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" required  value="{{old('username')}}"> <br>
                                        <label for="password">Password</label>
                                        <input type="password" name="password" required><br>
                                        <button type="submit">Login</button><br>
                                        <a href="{{route ('auth.register')}}">I don't have an account</a>
                                        <span>@error('username'){{$message}}@enderror</span>
                                        <span>@error('password'){{$message}}@enderror</span>
                                        
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