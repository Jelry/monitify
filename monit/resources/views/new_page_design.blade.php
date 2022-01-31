<!DOCTYPE HTML>

<html>
	<head>
		<title>Register
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
						<img src="images/imglogo1.png" alt="" style="height:1.7em;width:13em">
						
						<!-- <a href="#work" class="icon solid fa-folder"><span>Psst hehe</span></a>
						<a href="#contact" class="icon solid fa-envelope"><span>Ayaw click</span></a> -->
						
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Me -->
						<article id="home" class="panel" style=" width:20em;">
							<header >
								
								<div style="text-align: center; width: 20em;">
									Sign up
									</div>
									@if($errors->any())
									<div style="background-color: rgb(212, 69, 69);color:rgb(255, 255, 255);border-radius:1em;text-align:center; margin:1em;padding:1em;">
										{{ implode('', $errors->all(':message')) }}
									</div>
									
									@endif
									<p>
									<form action="{{route ('auth.save')}}" method="post">
										
										@if(Session::get('success'))

                                        <div style="background-color: rgb(74, 212, 69);color:rgb(255, 255, 255); padding:1em;border-radius:1em; margin:1em;padding:1em;">
                                            {{Session::get('success')}}
                                        </div>
								
                                        @endif
										@if(Session::get('fail'))

                                        <div style="background-color: rgb(212, 69, 69);color:rgb(255, 255, 255); padding:1em;border-radius:1em; margin:1em;padding:1em;">
                                            {{Session::get('fail')}}
                                        </div>
								
                                        @endif
										@csrf
										
										<label for="name"><a>Full Name</a></label>
										<input type="text" name="name" class="input" required>
										<label for="email"><a>Email(Gmail)</a></label>
										<input type="text" name="email" class="input" required>
										<label for="phonenumber"><a>Phone Number</a></label>
										<input type="number" name="phonenumber" class="input" required style="border-radius:11px;border-outline:none;border-color:rgb(161, 161, 161);height:1.5em;"> <br>
										<label for="School"><a> Select School</a></label>
										<select  id="school" class="dropdown" name="School" style="width: 10em; " required>
											<option value="Jolencio R. Alberca Elementary School(JRAES)">Jolencio R. Alberca Elementary School(JRAES)</option>
											
											</select>
										 <br> <br>
										 <label for="usertype"><a style="color:red;">*</a>Select User Type <a style="color:red;">*</a></label>
										 <select  id="Utype" class="dropdown" name="usertype" style="width: 10em; " onchange="hehe()" required>
											 <option value="" style="text-align: right;">Select Usertype🔻</option>
											 <option value="teacher">Teacher</option>
											 <option value="student">Student</option>
											 
											 </select>
											 <div id="pop" style="display:none;">
											 <label for="creation_code"><a style="color:red;">*</a><a>Creation Code</a><a style="color:red;">*</a></label>
										<input id="p" type="text" name="creation_code" class="input" required>
											 </div>
											<div id="pop2" style="display:none">
												<select name="grade_level" id="pp" required style="padding:0;padding-left:1em;">
													<option value="">Choose Grade Level 🔻</option>
													<option value="Grade 1">Grade 1</option>
													<option value="Grade 2">Grade 2</option>
													<option value="Grade 3">Grade 3</option>
													<option value="Grade 4">Grade 4</option>
													<option value="Grade 5">Grade 5</option>
													<option value="Grade 6">Grade 6</option>
												 </select>
											</div>
										  <br> <br>
										<label for="username"><a>Username</a></label>
										<input type="text" name="username" class="input" required>
										<label for="password"><a>Password</a></label>
										<input type="password" name="password" class="input" required> <br>
										<input type="submit" name="login" value="Create Account" class="btnLogin">
										</form>
									
					
						<a href="/">Back to login</a>
						</p>
							</header>
							
						</article>
						<article id="work" class="panel ">
							<header>
								
								<p>
									<form action="">
										<h3 style="width:200px">Sign up </h3>
										<!-- <input type="submit" name="login" value="I'm a teacher" class="btnLogin" required> <br> -->
										<div style="margin-bottom: 20px; margin-top: 30px;">
										<a href="#code" class="bbtn">I'm a teacher</a> 
									    </div>
										
										<div>
										<a href="#code" class="bbtn">I'm a student</a>
									    </div>
									<!-- <br><input  type="submit" name="login" value="I'm a student" class="btnLogin" required> -->
									<div style="margin-top: 20px;">
									<a href="#home" >Back to login</a>
								    </div>
									</form>
								</p>
								
							</header>
							
						</article>
						<article id="code" class="panel ">
							<header>
								<form action="">
								<label for="username"><h4>Enter account creation code</h4></label>
								<input type="text" name="username" class="input" required> <br>
								<input type="submit" name="login" value="Submit" class="btnLogin" required>
								</form>
								<div>
									<a href="#req">I don't have a code</a>
								</div>
								<div>
								<a href="#home">Back to login</a>
								</div>
							</header>
							
						</article>
						<article id="req" class="panel ">
							<header>
								<div style="text-align: justify; width: 20em;">
								You don't have a creation code? Don't worry! just enter your full name, email address and an active phone number. We will send you the code once we confirmed your request!
								</div>
								<div >
									<form action="">
										<label for="username"><h4>Full Name</h4></label>
										<input type="text" name="username" class="input" required>
										<label for="username"><h4>Email(Gmail)</h4></label>
										<input type="text" name="username" class="input" required>
										<label for="username"><h4>Phone Number</h4></label>
										<input type="text" name="username" class="input" required> <br>
										<label for="School">Selectt School</label>
										<select  id="school" class="dropdown" name="School" style="width: 10em; " >
											<option value="Green">Jolencio R. Alberca Elementary School(JRAES)</option>
											
											</select>
										 <br>
										
										<input type="submit" name="login" value="Request" class="btnLogin" required>
										</form>
									</div>
						<div>
						<a href="#home">Back to login</a>
						</div>
							</header>
						
						</article>
						<article id="sup" class="panel " style="width:18em;">
							<header>
								
							</header>
						
						</article>
							<!-- <article id="home" class="panel intro">
							
									
								
									<div class="form">
									<form method="POST">
										<h1>Monitify</h1>
									
										<label for="username"><h4>Username</h4></label>
										<input type="text" name="username" class="input" required>
									    <label for="pass"><h4>Password</h4></label>
										<input type="password" name="pass" class="input" required id="pass">
										<input type="checkbox"  class="eyecle">
										<input type="submit" name="login" value="Login" class="btnLogin" required>
										<br>
										<a href="registerOption.php">Register</a>
										
									</form>
									</div>
								
								
							</article> -->

						<!-- Work -->
						
						

						<!-- Contact -->
							

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