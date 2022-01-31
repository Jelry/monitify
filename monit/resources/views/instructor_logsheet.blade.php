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
		<style>
		
			
			.tooltip .tooltiptext {
			  visibility: hidden;
			  width: 60px;
			  background-color: black;
			  color: #fff;
			  text-align: center;
			  border-radius: 6px;
			  padding:0;
			
			  /* Position the tooltip */
			  position: absolute;
			  z-index: 1;
			}
			
			.tooltip:hover .tooltiptext {
			  visibility: visible;
			}
			</style>
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
                                    <h2 style="margin-top:3em;">{{$logsheet['what_week']}} <strong>({{$logsheet['date_range_start']}} to {{$logsheet['date_range_end']}})</strong></h2>
                                <p>Subject/s: <strong style="opacity:0;">-</strong> {{$logsheet['subjects']}}  	
								<strong style="margin-left:2em;margin-right:2em;">|</strong> claimed :
								<strong>
									@foreach($log_sheet_data as $lsd)
									@if($lsd['claim_status'] == 'claimed')
									
									@php 
									$how_many_claimed++ 
									@endphp
									
									@endif
									@endforeach
									{{$how_many_claimed}}
								</strong>  out of <strong>{{$student->count()}}</strong>  students <strong style="margin-left:2em;margin-right:2em;">|</strong> submitted: 
								<strong>
								@foreach($log_sheet_data as $lsd)
								@if($lsd['submission_status'] == 'submitted')
								@php 
								$how_many_submitted++ 
								@endphp
								@endif
								@endforeach
								{{$how_many_submitted}}
								</strong>
								out of <strong>{{$student->count()}}</strong>  students
								</p> 
								
                            </header>
                            {{-- buttons --}}
                            <div class="table-wrapper">
                                <table class="alt">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Distribution</th>
                                            <th>Retrieval</th>
                                        </tr>
                                       
                                    </thead>
                                    <tbody>
										@foreach($student as $student)
										
                                        <tr>
                                            <td> @if($student['gender'] == 'Male')<strong style="color:rgb(0, 148, 141);">⦿</strong> @else <strong style="color:rgb(255, 66, 123);">⦿</strong>  @endif - {{$student['student_name']}}</td>
                                            <td>
                                                <form action="/distribute" method="post" style="padding:0;margin:0;">
													@csrf
													
													<input type="hidden" name="student_id" value="{{$student['id']}}">
													<input type="hidden" name="log_sheet_id" value="{{$logsheet['id']}}">
													<input type="hidden" name="claim_status" value="claimed">
													@foreach($log_sheet_data as $lsd)
													@if($lsd['student_id']==$student['id'])
												
													@php
													$naa=$lsd->date_claimed;
													$stud_id=$student->id;
													$log_id=$lsd->log_sheet_id;
													@endphp
													@break
													@else
													{{$naa=''}}
													@php
													$stud_id=0;
													$log_id=0;
													@endphp
													@endif
													@endforeach
                                                    <input type="date" name="date_claimed" style="height:1.5em;outline:none;border:none;background-color:transparent;cursor:" required value="{{$naa}}">
                                                    <input type="submit" value="mark" class="button small" style="height:3em;margin-left:1em;" onclick="return confirm('confirm this change?')">
													<a href={{"/undo_mark/".$stud_id."/".$log_id}} style="margin-left:1em;" class="tooltip" onclick="return confirm('confirm? this action is irreversible')">↩ <span class="tooltiptext">undo</span></a>
													@foreach($log_sheet_data as $lsd)
													@if($lsd['student_id']==$student['id'])
													@if($lsd->claim_status=='claimed')
													<strong style="color:rgb(19, 165, 0);margin-left:1em;">⦿</strong>
													@endif
													
													@endif
													@endforeach
													
                                                </form>
												
												
                                            </td>
                                            <td>
												
												
												<form action="/retrieval" method="post" style="padding:0;margin:0;">
													@csrf
													<input type="hidden" name="student_id" value="{{$student['id']}}">
													<input type="hidden" name="log_sheet_id" value="{{$logsheet['id']}}">
													@foreach($log_sheet_data as $lsd)
													@if($lsd['student_id']==$student['id'])
													
													@php
													$naa_judt=$lsd->date_submitted
													@endphp
													
													@else
													{{$naa=''}}
													@endif
													@endforeach

													@foreach($log_sheet_data as $lsd)
													@if($lsd['student_id']==$student['id'])
													@if($lsd['claim_status']=='claimed')
													@php 
													$disable='';
													$display='';
													@endphp
													
													@break
													@endif
													@else  
													@php 
													$disable='disabled';
													$display='none';
													@endphp
													@endif 
													@endforeach
													<input type="date" name="date_submitted" style="height:1.5em;outline:none;border:none;background-color:transparent;" value="{{$naa_judt}}" required>
													<input type="submit" value="mark" class="button small" style="height:3em;" onclick="return confirm('confirm this change?')" {{$disable}}>
													<a href={{"/undo_mark_sub/".$stud_id."/".$log_id}} style="margin-left:1em;display:{{$display}}" class="tooltip" onclick="return confirm('confirm? this action is irreversible')">↩ <span class="tooltiptext">undo</span></a>
													@foreach($log_sheet_data as $lsd)
													@if($lsd['student_id']==$student['id'])
													@if($lsd['submission_status']=='submitted')
													<strong style="color:rgb(113, 0, 165);margin-left:1em;">⦿</strong>
													@endif
													@endif
													@endforeach
												</form>

												
											
											</td>
                                        </tr>
										@endforeach
                                      
                                    </tbody>
									<tfoot>
										<td>legend: <strong style="color:rgb(0, 148, 141);margin-left:1em;">⦿</strong> - Male <strong style="color:rgb(255, 66, 123);margin-left:1em;">⦿</strong> - Female
										</td>
										<td>
											<strong style="color:rgb(19, 165, 0);margin-left:1em;">⦿</strong> - claimed
											<br> (Date Format: dd-mm-yy )
										</td>
										<td>
											<strong style="color:rgb(113, 0, 165);margin-left:1em;">⦿</strong> - submitted
											<br> (Date Format: dd-mm-yy )
										</td>
									</tfoot>
                                </table>
                            </div>
							
						</div>
						<div style="text-align:center;margin-top:3em;">
							
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
