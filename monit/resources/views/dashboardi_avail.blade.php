<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Monitify</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" >
		<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" >
		
		<link rel="icon" href="images/logo2.png">
		<link type="image/gif" rel="icon" href="{{ asset('images/logo2.png') }}">
		<style>
			
		</style>
	</head>
	<body class="is-preload">
		<div id="tabbing" style = "position:absolute;">
			☰
		</div>
		<div id="tabModal" class="modal" style="align-items:center;">
			
				<div id="tabIn"  style="background-color:rgb(255, 255, 255); width:20em;text-align: center;">
					<span class="closeTabbing" style="cursor:default; color: rgb(240, 6, 6);cursor: pointer; font-weight: 900px; border-bottom: 1px solid rgb(185, 19, 19);margin-bottom:5em;"> Exit</span>
					
					<nav id="nav">
						<ul>
							<li><a href="/Instructor" id="top-link"><span class="icon solid fa-home"> My Subjects</span></a></li>
							<li><a href="/Profile-" id="portfolio-link"><span class="icon solid fa-user"> Profile</span></a></li>
							<li><a href="" id="about-link"><span class="icon solid fa-box"> Notifications</span></a></li>
							<li><a href="" id="contact-link"><span class="icon solid fa-envelope"> Reports</span></a></li>
							<li><a href="/logout" id="contact-link"><span class="icon solid fa-key"> Log Out</span></a></li>
						</ul>
					</nav>
				</div>
			
		</div>
		<!-- Header -->
			<div id="header"  style="display:none;">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><img src="{{ asset('images/imglogo1.png') }}" alt="" /></span>
							<h1 id="title"> </h1>
							
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="/Instructor" id="top-link"><span class="icon solid fa-home">My Subjects</span></a></li>
								<li><a href="" id="portfolio-link"><span class="icon solid fa-user">Profile</span></a></li>
								<li><a href="" id="about-link"><span class="icon solid fa-box">Notifications</span></a></li>
								<li><a href="" id="contact-link"><span class="icon solid fa-envelope">Reports</span></a></li>
								<li><a href="/logout" id="contact-link"><span class="icon solid fa-key">Log Out</span></a></li>
							</ul>
						</nav>

				</div>
				
			

			</div>

		<!-- Main -->
			<div id="main" style="margin-left:0;">
			
              <p class="pagename" style="height: 5.8em; font-size: 20px; padding-top: 30px; padding-bottom:1em;background-color:rgb(255, 255, 255)"><strong style="color: rgb(255, 255, 255);">My subjects</strong>  <br> Current Selected Subject: {{$subj['grade_level']}} {{$subj['subject_name']}}</p> 
             
              
			
			   <div style="text-align: center; background-color: rgb(255, 255, 255)55);padding-left: 1em;  width: 100%;padding-top:1em;" id=controls>
				
				<button id="myBtnTable" >Logsheets</button>
				<button id="myBtnMonitoring" >New Log </button>
                <button id="myBtnModule" >Upload Module</button>
                
                <button id="myBtnClass" > Classlist</button>
				<button id="myBtnGraph" > Graph</button>
			   </div>
			   <div id="myControls" style="margin-top:2em;">
				<button  class="icon solid fa-th" > Controls</button>
			   </div>
			   <!-- MODALS -->
			 <!-- modal for control -->
			   <div id="modalcontrol" class="modal">
				   <div class="form">
				<span class="closecontrol" style="cursor:default; color: rgb(228, 81, 81);cursor: pointer; font-weight: 900px;  "> Exit</span>
					<div style="text-align: center; padding-left: 1em;  width: 100%;; padding: 20px;" >
					
					<button id="myBtnTable1" >Logsheets</button>
					<button id="myBtnMonitoring1" >New Log </button>
					<button id="myBtnModule1" >Upload Module</button>
					
					<button id="myBtnClass1" >  Classlist</button>
					<button id="myBtnGraph1" > Graph</button>
				   </div>
				</div>
			   </div>
			 <!-- end of modal for control -->
			   <!-- start of modal for changing table -->
			   			<div id="modalTable" class="modal">
							
								<div class="form">
									<span class="closeTable" style="cursor:default; color: rgb(235, 22, 22);cursor: pointer; font-weight: 900px;  "> Exit</span>
									<div class="line"></div>
										<div> <br>
											Select what week to display in the table
											<form action="/searchh" method="post">
												@csrf
												<input type="hidden" name="subject_id" value="{{$subj['id']}}">
												<input type="hidden" name="no" value="no">
													<select name="week_id" id="" required style="padding:0px;">
														<option value=""  style="text-align: right;">🔻</option>
														@foreach($logweek as $wwek)
														<option value="{{$wwek['id']}}">{{$wwek['week_log']}} ({{$wwek['date_range_start']}} to {{$wwek['date_range_end']}})</option>
														@endforeach
													</select>
													  <input type="submit" value="display" style="margin-top:1.5em;margin-bottom:1.5em;" >
													  {{-- <a href="/student" class="button" style="margin-bottom:1.5em;margin-bottom:1.5em;">Reset Search</a> --}}
												  </form>
										
										</div>
								</div>
						</div>
			    <!-- end of modal for changing table -->
				<!-- start of modal for Uploading new Module -->
						<div id="modalModule" class="modal">
								<div class="form">
									<span class="closeModule" style="cursor:default; color: rgb(226, 17, 17);cursor: pointer; font-weight: 900px;  "> Exit</span>
									<div class="line"></div>
									<div style="margin-top:1em;">
										@if($week_id=='-')
										<p>select a weekly logsheet first</p>
										@else 
										
										<form action="/file_upload" method="post" enctype="multipart/form-data">
											@csrf
											<label for="">Module upload for {{$kew['week_log']}}</label>
											<label for="">Current:
												@if($mc==0)
												
												No module is uploaded for this logsheet
												
												@else

													{{$module['file']}}
													<a href={{"/view_module/".$module['id']}} style="color:rgb(194, 43, 93);text-decoration:underline dotted;" target="_blank">view</a>
													
												@endif
											</label>
											<input type="hidden" name="logweek_id" value="{{$kew['id']}}">
											<input type="hidden" name="subject_id" value="{{$subj['id']}}">
											<input type="file" name="moduleFile" required`>
											<input type="submit" value="upload">
										</form>
						 				
										
										@endif
										
									</div>
								</div>
						</div>
			    <!-- end of modal for Uploading new Module -->
 				<!-- Start of modal for creating new monitoring log sheet -->
				 		<div id="modalMonitor" class="modal">
								<div class="form">
									<span class="closeMonitor" style="cursor:default; color: rgb(230, 18, 18);cursor: pointer; font-weight: 900px;  "> Exit</span>
									<form action="/addweeklog" method="post">
										@csrf
									<div class="line"></div>
										<div style="margin-bottom:.90em;">
											Creating new Weekly log for <strong style="color: rgb(0, 184, 40);">  {{$subj['grade_level']}} {{$subj['subject_name']}}</strong>
										</div>
										<div class="inputfield">
											<input type="hidden" name="subject_id" value="{{$subj['id']}}">
											<input type="hidden" name="teacher_id" value="{{$LoggedUserInfo['id']}}">
											<input type="text" name="what_week" placeholder="enter what week (ex. week1)" required style="margin-bottom:.90em;"> 
											<input type="text" name="week_desc" placeholder="week description(optional)">
											<label for="" style="margin-left:.80em;margin-top:1em;">Date Range</label>
											<div style="display:flex;flex-direction:row;justify-content:space-between;margin-bottom:1em;">
											<input type="date" format="m-d-y" name="date_range_start" required style="transform: scale(.8);">
											to 
											<input type="date" format="m-d-y" name="date_range_end" required style="transform: scale(.8);">
											</div>
										</div>
										<div>
											<input type="submit" name="" id="" value="confirm">
										</div>
									</form>
								</div>
						</div>
				<!-- end of modal for creating new monitoring log sheet -->
				<!-- Start of modal for Classlist -->
						<div id="modalClass" class="modal">
								<div class="form">
									<span class="closeClass" style="cursor:default; color: rgb(224, 12, 12);cursor: pointer; font-weight: 900px;  "> Exit</span>
									<div class="line"></div>
									<form action="/sAdd" method="post">
										@csrf
										<div>
											
											<div id="box">
												<div>
												Add new Student for this subject
											    </div>
												<input type="hidden" name="TS_tracker"value="{{$subj['id']}}">
												<input type="hidden" name="subject_id" value="{{$subj['id']}}">
												<input type="hidden" name="week_id" value="-">
											<input type="text" placeholder="student name" name="student_name" required>
											<input type="submit" name="" id="" value="Add">
											</div>
									</form>
											<div id="box" >
												
												Delete a student
											   <div style="height:25em;overflow-y: scroll;">
												<table  style="margin-top:0;transform: scale(.9);">
													<tr style="color:rgb(29, 160, 29);">	
														<td >Student Name</td>	
														<td></td>
													</tr>
												   @foreach($studi as $sj)  
												   <tr>
													<td>{{$sj['student_name']}}</td>
													<td style="color:rgb(197, 46, 46);">	
														<a href={{"/deleteStud/".$sj['id']."/".$subj['id']."/"."-"}} onclick="return confirm('are you sure you want to delete this student? this action is irreversible')">DELETE</a>
													</td>	   
												</tr>
												   @endforeach
												</table>
											</div>
											</div>
											<div id="box">
												<div>												
													Add everyone from this class into another subject
												</div>

											<input type="submit" value="Add">
											</div>
										</div>
									
								</div>
						</div>
				<!-- end of modal for Classlist -->
				<!-- Start of modal for graph -->
						<div id="modalGraph" class="modal">
								<div class="form">
									<span class="closeGraph" style="cursor:default; color: rgb(230, 18, 18);cursor: pointer; font-weight: 900px;  "> Exit</span>
									<div class="line"></div>
									@if($ihap==0)
									select a weekly logsheet first
									@else
									
											Graph for Grade 1 English week 1 to 5
									<div style="width:100%;display:flex;justify-content:center;padding:1em;">
									<div id="myPie">

									</div>
									</div>
									<div>
									<p>Claimed <a href="" style="color:rgb(24, 153, 24);">{{$claim_count}}/{{$student_count}}</a></p>
									</div>
									@endif
								</div>
						</div>
				<!-- end of modal for graph -->
			  <!-- modal for adding new subject -->
			<div id="myModal" class="modal">
			
				 <div class="modal-content">
					
					 <div class="modalformwrapper">
						
						


						 <div class="form" style="text-align: center; border-radius: 1em;">
							
							 <form action="" method="POST">
								 <div style="border-bottom: solid rgb(223, 223, 223) 1px;">
									<span class="close" style="cursor:default; color: rgb(231, 10, 10);cursor: pointer; font-weight: 900px;  "> Cancel</span>
								 </div>
								
							
								<div class="title">
									
									<h1 style="color:  rgb(0, 160, 61);font-size:larger; padding-top: 2em; padding-bottom: 1em;">Input Subject Details</h1>
									
								</div>
								
								
								 <div class="inputfield" >
									 <label>Subject Name</label>
									 <input type="text" class="input" id="subjectN" placeholder="example: Grade 1 Math..." name="subjectN" required>
								 </div>
								 <div class="inputfield">
									 <label >Subject Description</label>
									 <textarea name="subjectD" id="subjectD" cols="30" rows="5" class="textarea" required></textarea>
								 </div>
								 <div class="inputfield" >
									 <input type="submit" name="myBtn" id="myBtn" class="btn" value="proceed">
								 </div>
								
								 	
							
							 </form>
						 </div>
					 </div>
				 </div>
				
			 </div> 
			
              <!-- end of modal for adding subject -->
			

				<!-- Intro -->
				<section style="padding-top: 30px;" >
					
					<h5 style="transform:scale(.90,.90);text-align:left;margin-left:2em;">{{$subj['grade_level']}} {{$subj['subject_name']}} - 	
						@if($week_id=='-')

						@else 
						<strong style="color:orange;">
						 {{$kew['week_log']}} 
						</strong>
						<strong>
							(
						{{$kew['date_range_start']}}
						to {{$kew['date_range_end']}}
							)(y-m-d)
						</strong>
						{{$kew['week_desc']}}

						@if($mc==0)						
						No module is uploaded for this logsheet						
						@else
						Module:
						{{$module['file']}} 
						<a href={{"/view_module/".$module['id']}} style="color:rgb(194, 43, 93);text-decoration:underline dotted;" target="_blank">view</a>
						@endif
						@endif
						
					</h5>
					<div >
					<div style="position:absolute;left:5em;">
					<p>claimed: 0/26 submitted:0/26</p>
					</div>
					<div class="fortable">
						
						{{-- {{$week_id['week']}} --}}
						
						
						<table id="studentmodule" style="margin-top:0;">
						  <tr>
							<th>Student Name</th>
							<th>Claim Status</th>
							<th>Submission Status</th>
							<th>Online Claiming Status</th>
							<th> Online Submission Status</th>
						  </tr>
						  @foreach($studi as $stud)
						  <tr>
							<td>{{$stud['student_name']}} </td>
							<td>
								{{-- claim --}}
								<div style="display:flex;flex-direction:row;">
									@foreach($wekwew as $w)
									@if($stud['id']==$w['student_id']&&$w['logweek_id']==$kew['id'])
										  {{$w['claim_status']}}
									
									@endif
									@endforeach
									@if($week_id=='-')

									@else 
									
										<form action="/statusC" method="post" >
											@csrf
											<input type="hidden" value="{{$stud['id']}}" name="student_id">
											<input type="hidden" value="{{$kew['id']}}" name="logweek_id">
											<input type="hidden" value="{{$subj['id']}}" name="subject_id">
											
											<button type="submit" style="width:1.5em;padding:1px;background-color:rgb(0, 110, 255);">⦿</button>
										</form>
										<form action="/statusU" method="post">
											@csrf
											<input type="hidden" value="{{$stud['id']}}" name="student_id">
											<input type="hidden" value="{{$kew['id']}}" name="logweek_id">
											<input type="hidden" value="{{$subj['id']}}" name="subject_id">
										
											<button type="submit" style="width:1.5em;padding:1px;background-color:rgb(255, 0, 191);">⦿</button>
										</form>
								
									</div>
									
									@endif
									
								
								

	  
							</td>
							<td> 
							{{-- submission --}}
								
								<div style="display:flex;flex-direction:row;">
									@foreach($wekwew as $w)
									@if($stud['id']==$w['student_id']&&$w['logweek_id']==$kew['id'])
										  {{$w['submission_status']}}
									
									@endif
									@endforeach
									@if($week_id=='-')

									@else 
									
										<form action="/subC" method="post" >
											@csrf
											<input type="hidden" value="{{$stud['id']}}" name="student_id">
											<input type="hidden" value="{{$kew['id']}}" name="logweek_id">
											<input type="hidden" value="{{$subj['id']}}" name="subject_id">
											
											<button type="submit" style="width:1.5em;padding:1px;background-color:rgb(0, 110, 255);">⦿</button>
										</form>
										<form action="/subU" method="post">
											@csrf
											<input type="hidden" value="{{$stud['id']}}" name="student_id">
											<input type="hidden" value="{{$kew['id']}}" name="logweek_id">
											<input type="hidden" value="{{$subj['id']}}" name="subject_id">
										
											<button type="submit" style="width:1.5em;padding:1px;background-color:rgb(255, 0, 191);">⦿</button>
										</form>
								
									</div>
									
									@endif
							</td>
							<td>
							{{-- online claiming --}}
							</td>
							<td>
							{{-- online submission --}}
							</td>
						  </tr>
						  @endforeach
						
						</table>
					  </div>
					</div>
					
				</section>
				
		

		<!-- Footer -->
			<!-- <div id="footer"> -->

				<!-- Copyright -->
					<!-- <ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul> -->

			<!-- </div> -->

		<!-- Scripts -->
			<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
					
			<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('assets/js/browser.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('assets/js/breakpoints.min.js') }}) }}"></script>
			<script type="text/javascript" src="{{ asset('assets/js/util.js') }}"></script>
			<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
			<script type="text/javascript" src="{{ asset('assets/js/control.js') }}"></script>
			<script type="text/javascript" src="{{ asset('assets/js/changetable.js') }}"></script>
			<script type="text/javascript" src="{{ asset('assets/js/uploadmodule.js') }}"></script>
			<script type="text/javascript" src="{{ asset('assets/js/newmonitoring.js') }}"></script>
			<script type="text/javascript" src="{{ asset('assets/js/classlist.js') }}"></script>
			<script type="text/javascript" src="{{ asset('assets/js/graph.js') }}"></script>
			<script type="text/javascript" src="{{ asset('assets/js/opentabbing.js') }}"></script>
			
					
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/deletesubjects.js"></script>
	</body>
</html>