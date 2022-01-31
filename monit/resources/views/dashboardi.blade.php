<!DOCTYPE HTML>

<html>
	<head>
		<title>Monitify({{$LoggedUserInfo['name']}})</title>
		<link rel="shortcut icon" href="landing_res/images/letter-m-hd-png-capital-letter-m-icon-110699-512.png" type="image/x-icon">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="{{ asset('phantom_resources/assets/css/main.css') }}" rel="stylesheet" >
		<noscript><link rel="stylesheet" href="{{ asset('phantom_resources/assets/css/noscript.css') }}" /></noscript>
		<style>
			.w-5{
				display:none;
			}
		

		</style>
	</head>
	<body class="is-preload">
          <!--modals-->
          <div class="modal" id="modal_1">
            <div class="inner">
                
                <form action="/save_logsheet" method="post" onsubmit="return handleData()">
					@csrf
                    <span class="close_modal_1" style="cursor:default; color: rgb(173, 80, 80);cursor: pointer; font-weight: 900px;  ">Close</span>
                    <label for="">Creating Logsheet</label>
                    <input type="hidden" name="teacher_id" value="{{$LoggedUserInfo['id']}}" >
                    <input type="text" name="what_week" placeholder="What week?" required style="margin-top:0;">
                    <input type="text" name="what_desc" placeholder="Week description (optional)">
                    <label for="" >Date Range</label>
                    <input type="date" name="date_range_start" required> <strong>- to -</strong>
                    <input type="date" name="date_range_end" required> 
                    
                    <br> <br>
                    <label for="">Subject/subjects</label>
					<div class="col-6 col-12-small">
							<div style="visibility:hidden; color:rgb(207, 0, 0); " id="chk_option_error">
							Please select at least one option.
							</div>
						@foreach($subj as $subj)
						
						<input type="checkbox" id="{{$subj['id']}}" name="subjects[]" value="{{$subj['subject_name']}}"> 
						<label for="{{$subj['id']}}">{{$subj['subject_name']}} </label>
						@endforeach
						
					</div> <br>
					<label for="color">Color</label>
					<select name="color" id="">
						<option value="style1">style1 (pink)</option>
						<option value="style2">style2 (cornflower)</option>
						<option value="style3">style3 (blue green)</option>
						<option value="style4">style4 (grape)</option>
						<option value="style5">style5 (lavender)</option>
						<option value="style6">style6 (iris blue)</option>
					</select>
                    <br><br>
                    <input type="submit" value="create" class="small">
                </form>
            </div>
            </div> 
            {{-- end of modal 1 --}}
            <div class="modal" id="modal_2">
                <div class="inner">
                    
                    <div class="table-wrapper">
                        <span class="close_modal_2" style="cursor:default; color: rgb(173, 80, 80);cursor: pointer; font-weight: 900px;  ">Close</span>
                        <table class="alt">
                            <thead>
                                <tr>
                                    <th>Subject Name</th>
                                    <th>Description</th>
                                    <th>Grade Level</th>
                                </tr>
                            </thead>
                            <tbody>
								@foreach($subjj as $subject)

                                <tr>
                                    <td>{{$subject['subject_name']}}</td>
                                    <td>{{$subject['subject_desc']}}</td>
                                    <td>{{$subject['grade_level']}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                          
                        </table>
                    </div>
                </div>
                </div> 
                {{-- end of modal 2 --}}
				<div class="modal" id="modal_3">
					<div class="inner">
						
						<div class="table-wrapper">
							<span class="close_modal_3" style="cursor:default; color: rgb(173, 80, 80);cursor: pointer; font-weight: 900px;  ">Close</span>
							<table class="alt">
								<thead>
									<tr>
										<th>Student Name</th>
										<th>Gender</th>
										<th>Grade Level</th>
									</tr>
								</thead>
								<tbody>
									@foreach($student as $student)
									<tr>
										<td>{{$student['student_name']}}</td>
										<td>{{$student['gender']}}</td>
										<td>{{$student['grade_level']}}</td>
									</tr>
									@endforeach
								</tbody>
							  
							</table>
						</div>
					</div>
					</div> 
					{{-- end of modal 3 --}}
        <!--end of modals-->
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
							<li><a href="/Instructor">My Logsheets</a></li>
							<li><a href="/Profile-">Profile</a></li>
							<li><a href="/Notifications-">Notifications</a></li>
							<li><a href="/Reports">Reports</a></li>
							<li><a href="/logout">Logout</a></li>
						</ul>
					</nav>
              
				<!-- Main -->
					<div id="main" style="margin-top:0;padding-top:0;">
						<div class="inner" style="margin-top:0;padding-top:0;">
							<header>
                                <h1>My Logsheets</h1>
                                <p>Your logsheets are displayed here.</p>
                            </header>
                            {{-- buttons --}}
                            <button class="small" id="create_logsheet">Create LogSheet</button>
                            <button class="small" id="view_my_subjects">My Subjects</button>
                            <button class="small" id="view_class_list">Class List</button>
                            
							<section class="tiles" >
								@foreach($log_sheet as $ls)
								
                                <article class="{{$ls['week_color']}}" >
									
									<span class="image" >
										<img src="phantom_resources/images/pic01.jpg" alt="" />
									</span>
									<a href={{"/logsheet/".$ls['id']}}>
										<h2 >{{$ls['what_week']}}</h2>
										<div class="content" >
											<p>From ({{$ls['date_range_start']}}) to ({{$ls['date_range_end']}})</p>
										</div>
									</a>
								</article>
								@endforeach
								
							</section>
							
						</div>
						<div style="text-align:center;margin-top:3em;">
							{{$log_sheet->links('pagination::tailwind')}}
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
			<script src="{{asset('phantom_resources/assets/js/checkbox_required.js')}}"></script>

	</body>
</html>
