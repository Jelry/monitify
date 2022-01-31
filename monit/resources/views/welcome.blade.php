<!DOCTYPE HTML>

<html>
	<head>
		<title>Monitify</title>
		<link rel="shortcut icon" href="landing_res/images/letter-m-hd-png-capital-letter-m-icon-110699-512.png" type="image/x-icon">

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="landing_res/assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<h1>Monitify</h1>
			
			</header>

		<!-- Signup Form -->
			<form id="mine" action="{{route ('auth.check')}}" method="post" style="display:flex;flex-direction:column;padding:0;margin:0;width:100%;">
				@if(Session::get('fail'))
				<div style="background-color: rgb(231, 79, 79);color:rgb(255, 255, 255);width:14em; padding:1em;border-radius:1em;">
				{{Session::get('fail')}}
				</div>
				@endif
				@csrf
				<br>
				<p style="">LOGIN</p>
				<input type="hidden" name="usertype" value="student">
				<input type="text" name="username" placeholder="username" required>
				<input type="password" name="password" placeholder="Password" required/>
				<input type="submit" value="login"/> <br>
				<a href="reg" style="text-decoration:none;margin-left:0.2em;">Sign up</a>
			</form>

		<!-- Footer -->
			<footer id="footer">
			
				<ul class="copyright">
					<li>&copy; Monitify.</li><li>Capstone Project by: <a href="#">Combatir, Dapequilla, and Castro</a></li>
				</ul>
			</footer>

		<!-- Scripts -->
			<script src="landing_res/assets/js/main.js"></script>

	</body>
</html>