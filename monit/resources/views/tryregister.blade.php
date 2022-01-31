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
				<h1>Create Your Account</h1>
			
			</header>

		<!--  Form -->
		@if($errors->any())
				<div style="background-color: rgb(212, 69, 69);color:rgb(255, 255, 255);border-radius:1em;text-align:center; margin:1em;padding:1em;">
				{{ implode('', $errors->all(':message')) }}
				</div>
		@endif
		<form action="{{route ('auth.save')}}" method="post" style="display:flex;flex-direction:column;padding:0;margin:0;width:100%;" id="mine">
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
		
			<input type="text" name="name"  required placeholder="Full Name" style="height:2.3em;">
			<input type="text" name="email" class="input" required placeholder="Email(Gmail)" style="height:2.3em;">
			<input type="number" name="phonenumber" class="input" required style="height:2em;" placeholder="Phone Number">
			<select   name="School" style="height:2.3em;width:20em;margin-bottom:1em;" required>
				<option value="Jolencio R. Alberca Elementary School(JRAES)">Jolencio R. Alberca Elementary School(JRAES)
				</option>
			</select>
			<select id="Utype" name="usertype" style="width: 20em; height:2.3em;background-color: transparent;margin-bottom:1em;" onchange="hehe()" required>
				<option value="">Select Usertype</option>
				<option value="teacher">Teacher</option>
				<option value="student">Student</option>
			</select>
			<div id="pop" style="display:none;">
			
		   		<input id="p" type="text" name="creation_code" class="input" required placeholder="Creation Code" style="height:2.3em;width:20em;">
			</div>
			<div id="pop2" style="display:none">
				<select name="grade_level" id="pp" required style="height:2.3em;width:20em;">
					<option value="">Choose Grade Level 🔻</option>
					<option value="Grade 1">Grade 1</option>
					<option value="Grade 2">Grade 2</option>
					<option value="Grade 3">Grade 3</option>
					<option value="Grade 4">Grade 4</option>
					<option value="Grade 5">Grade 5</option>
					<option value="Grade 6">Grade 6</option>
				 </select>
			</div>
			<input type="text" name="username" class="input" required placeholder="Username" style="height:2.3em;width:20em;">
			<input type="password" name="password" class="input" required placeholder="Password" style="height:2.3em;">
			<input type="submit" name="login" value="Create Account" style="height:2.3em;">
		</form>
	<br>
			<a href="/">Back to login</a>
		<!-- Footer -->
			{{-- <footer id="footer">
			
				<ul class="copyright">
					<li>&copy; Monitify.</li><li>Capstone Project by: <a href="#">Combatir, Dapequilla, and Castro</a></li>
				</ul>
			</footer> --}}

		<!-- Scripts -->
			<script src="landing_res/assets/js/main.js"></script>

	</body>
</html>