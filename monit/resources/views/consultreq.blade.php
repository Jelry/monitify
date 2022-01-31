<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Request a Consultation</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" >
		<noscript><link rel="stylesheet" href=" {{ asset('assets/css/noscript.css') }}" /></noscript>
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
									
									<form action="/addreq" method="post">
								
										@csrf
                                        <input type="hidden" name=student_name value="{{$LoggedUserInfo['name']}}">
										<input type="hidden" name="instructor_name" value=" {{$avail['instructor_id']}}">
										<input type="hidden" name="instructor_id" value=" {{$avail['instructor_name']}}">
										<input type="hidden" name="status" value="pending request">
										<input type="hidden" name="day" value=" {{$avail['day']}}">
										<input type="hidden" name="part_of_the_day" value=" {{$avail['part_of_the_day']}}">
										<input type="hidden" name="time" value=" {{$avail['time']}}">
										<input type="hidden" name="avai" value="{{$avail['id']}}">
										<input type="hidden" name="nope" value="no">
										<input type="hidden" name="student_id" value="{{$LoggedUserInfo['id']}}">
                                      <h3 style="color:rgb(22, 173, 22);">Consultation Request</h3>
                                      	@if(Session::get('fail'))
                                        <div style="background-color: rgb(231, 79, 79);color:rgb(255, 255, 255);width:14em; padding:1em;border-radius:1em;">
                                            {{Session::get('fail')}}
                                        </div>
                                        @endif
                                      <h4 style="text-transform:lowercase;">Instructor:</h4>
                                      <h2> {{$avail['instructor_id']}}</h2>
                                      <h4 style="color:rgb(212, 38, 38);">{{$avail['day']}} {{$avail['part_of_the_day']}} {{$avail['time']}}</h4>
                                      <input type="text" name="other_students" style="color: rgb(82, 82, 82);
                                      border:none;
                                      border-bottom: solid grey 1px;outline:none; text-align:center;" placeholder="Other students who will join the consultation. Put none if none." required>
                                      <p style="color:grey;">List the students other than yourself. Use comma(,) to separate.</p>
                                      <input type="text" name="subject" style="color: rgb(82, 82, 82);
                                      border:none;
                                      border-bottom: solid grey 1px;outline:none; text-align:center;" placeholder="Subject(put none if none)" required>
                                      <p style="color:grey;">You can enter a specific subject or you can just enter what the consultation is about.</p>
                                      <input type="text" name="meeting_place" style="color: rgb(82, 82, 82);
                                      border:none;
                                      border-bottom: solid grey 1px;outline:none; text-align:center;" placeholder="Meeting Place (put none if none)" required> <br>
                                      <input type="text" name="message" style="color: rgb(82, 82, 82);
                                      border:none;
                                      border-bottom: solid grey 1px;outline:none; text-align:center;" placeholder="Message for the instructor (put none if none)" required>
                                      <p style="color:grey;">Enter a message for the instructor</p>
                                      <input type="submit">
									  <a href="/student">return</a>
                                    </form>
									
								
								</header>
							
								
							</article>


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
