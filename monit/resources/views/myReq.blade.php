<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>{{$LoggedUserInfo['name']}}'s Lair</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" >
		<noscript><link rel="stylesheet" href=" {{ asset('assets/css/noscript.css') }}" /></noscript>
       
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">

				<!-- Intro -->
					

				<!-- Header -->
				

				<!-- Nav -->
					
			
				<!-- Main -->
					<div id="main">
					
						<!-- Featured Post -->
							<article class="post featured" style="margin-top:0;">
								<nav id="nav">
									<ul class="links">
										<li><a href="/student">Available Schedules</a></li>
										<li class="active"><a href="/myRequests">My Requested Schedules</a></li>
										<li><a href="{{route('auth.logout')}}">Logout</a></li>
										
									</ul>
									
								</nav>
								
							</article>

						<!-- Posts -->
						
					
					 <p style="color:grey;margin-bottom:1.5em;">View the current status of your requested consultations here. Always check this tab, your instrcutor might already accepted your request.</p>
						<section class="posts">
                            
							@foreach($req as $reqme)
							<article>
									<header>
									
										<span class="date">Consultation Request for:</span>
										<h1><a href="#">{{$reqme['instructor_name']}}</a></h1>

									</header>
									
									<span class="date">On:</span>
									 <h2>{{$reqme['day']}} {{$reqme['part_of_the_day']}}</h2>
									 <h1>{{$reqme['time']}}</h1>
									 
									 @if($reqme->status=='accepted')
									<span class="date">Request Status:</span>
									 <h2 style="color:green;"> {{$reqme['status']}}</h2>
									  <span class="date">You can now meet with your instructor</span>
									 @elseif($reqme->status=='rejected')
									 <span class="date">Request Status:</span>
									 <h2 style="color:red;"> {{$reqme['status']}}</h2>
									 @else
									 <span class="date">Request Status:</span>
									 <h2 style="color:#6a2999;"> {{$reqme['status']}}</h2>
									<ul class="actions special">
									
										<li><a href={{"cancel/".$reqme['id']."/".$reqme['avail_id']}} class="button">Cancel the consultation request</a></li>
									</ul>
									 @endif
									
								</article>
							
							@endforeach
							
								
							
							</section>

						<!-- Footer -->
							
					</div>

				<!-- Footer -->
				
				<!-- Copyright -->
                <div id="copyright">
                    <ul><li>Jelry Castro</li></ul>
                </div>

			</div>

		<!-- Scripts -->
			
            <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('assets/js/browser.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('assets/js/util.js') }}"></script>
            <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
			

	</body>
</html>
