<!DOCTYPE HTML>

<html>
	<head>
		<title>Monitify({{$LoggedUserInfo['name']}})</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="{{ asset('phantom_resources/assets/css/main.css') }}" rel="stylesheet" >
		<noscript><link rel="stylesheet" href="{{ asset('phantom_resources/assets/css/noscript.css') }}" /></noscript>
	</head>
	<body class="is-preload">
         
		<!-- Wrapper -->
     
			<div id="wrapper" style="padding-top:0;transform:scale(1.0,1.0);">

				<!-- Header -->
					<header id="header">
						

							<!-- Logo -->
							

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="/student">My Subjects</a></li>
							<li><a href="/Profile">Profile</a></li>
							<li><a href="/Notifications">Notifications</a></li>
							
							<li><a href="/logout">Logout</a></li>
						</ul>
					</nav>
              
				<!-- Main -->
					<div id="main" style="margin-top:0;padding-top:0;">
						<div class="inner" style="margin-top:0;padding-top:0;">
							<header>
                                <h1>Notifications</h1>
                                <p>	</p>
                            </header>
                            {{-- buttons --}}
							<div calss="inner"> 
								<br>
								 <br>
								<div class="table-wrapper">
									<table class="alt">
										<thead>
											<tr>
												<th>From</th>
												<th>Re:</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Notification One</td>
												<td>Ante turpis integer aliquet porttitor.</td>
												<td>Open</td>
											</tr>
											<tr>
												<td>Notification Two</td>
												<td>Vis ac commodo adipiscing arcu aliquet.</td>
												<td>Open</td>
											</tr>
											<tr>
												<td>Notification Three</td>
												<td> Morbi faucibus arcu accumsan lorem.</td>
												<td>Open</td>
											</tr>
											<tr>
												<td>Notification Four</td>
												<td>Vitae integer tempus condimentum.</td>
												<td>Open</td>
											</tr>
											<tr>
												<td>Notification Five</td>
												<td>Ante turpis integer aliquet porttitor.</td>
												<td>Open</td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<td colspan="2"></td>
												<td>100.00</td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
                            
							
						</div>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
						
							
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved</li><li>Monitify: 2022</a></li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="{{asset('phantom_resources/assets/js/jquery.min.js')}}"></script>
			<script src="{{asset('phantom_resources/assets/js/browser.min.js')}}"></script>
			<script src="{{asset('phantom_resources/assets/js/breakpoints.min.js')}}"></script>
			<script src="{{asset('phantom_resources/assets/js/util.js')}}"></script>
			<script src="{{asset('phantom_resources/assets/js/main.js')}}"></script>
            <script src="{{asset('phantom_resources/assets/js/modal_1.js')}}"></script>
            <script src="{{asset('phantom_resources/assets/js/modal_2.js')}}"></script>
			<script src="{{asset('phantom_resources/assets/js/modal_3.js')}}"></script>
			<script src="{{asset('phantom_resources/assets/js/include_all_subjects.js')}}"></script>

	</body>
</html>
