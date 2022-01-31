<!DOCTYPE HTML>

<html>
	<head>
		<title>Monitify({{$LoggedUserInfo['name']}})</title>
		<link rel="shortcut icon" href="landing_res/images/letter-m-hd-png-capital-letter-m-icon-110699-512.png" type="image/x-icon">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="{{ asset('phantom_resources/assets/css/main.css') }}" rel="stylesheet" >
		<noscript><link rel="stylesheet" href="{{ asset('phantom_resources/assets/css/noscript.css') }}" /></noscript>
	</head>
	<body class="is-preload">
          <!--modals-->
          <div class="modal" id="modal_1">
            <div class="inner">
                
                <form action="">
                    <span class="close_modal_1" style="cursor:default; color: rgb(173, 80, 80);cursor: pointer; font-weight: 900px;  ">Close</span>
                    <label for="">Creating Logsheet</label>
                    
                    <input type="text" placeholder="What week?" required>
                    <input type="text" placeholder="Week description (optional)">
                    <label for="">Date Range</label>
                    <input type="date" required> <strong>- to -</strong>
                    <input type="date" required> 
                    
                    <br> <br>
                    <label for="">Subject/subjects</label>
					
                    <a style="color:rgb(3, 99, 105);cursor:pointer;" id="specify_subjects">Specify-</a>
					<a>or</a>
					<a  style="color:rgb(20, 117, 0);cursor:pointer;" id="include_all_subjects">-Include all</a>
                    
					<input type="text" placeholder="type the specific subject/subjects here" id="specify_subject_input" style="display:block;" required>
							{{-- hidden input for the subject id's --}}
                    <input type="text" disabled value="all subjects will be displayed here" id="include_all_here" style="display:none;" required>
                    <br> 
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
                                <tr>
                                    <td>subject1</td>
                                    <td>Ante turpis integer aliquet porttitor.</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>subject2</td>
                                    <td>Vis ac commodo adipiscing arcu aliquet.</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>subject Three</td>
                                    <td> Morbi faucibus arcu accumsan lorem.</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>subject Four</td>
                                    <td>Vitae integer tempus condimentum.</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>subject Five</td>
                                    <td>Ante turpis integer aliquet porttitor.</td>
                                    <td>2</td>
                                </tr>
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
									<tr>
										<td>student1</td>
										<td>Ante turpis integer aliquet porttitor.</td>
										<td>2</td>
									</tr>
									<tr>
										<td>student2</td>
										<td>Vis ac commodo adipiscing arcu aliquet.</td>
										<td>2</td>
									</tr>
									<tr>
										<td>student Three</td>
										<td> Morbi faucibus arcu accumsan lorem.</td>
										<td>2</td>
									</tr>
									<tr>
										<td>student Four</td>
										<td>Vitae integer tempus condimentum.</td>
										<td>2</td>
									</tr>
									<tr>
										<td>student Five</td>
										<td>Ante turpis integer aliquet porttitor.</td>
										<td>2</td>
									</tr>
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
                                <h1>My Subjects</h1>
                                <p>Your subjects are displayed here open a subject by clicking it.</p>
                            </header>
                            {{-- buttons --}}
							<div calss="inner"> 
								<br>
								<section class="tiles" >
									@foreach($gls as $gls)
									
									<article class="style3" >
										
										<span class="image" >
											<img src="phantom_resources/images/pic01.jpg" alt="" />
										</span>
										<a href={{"/logsheet/".$gls['id']}}>
											<h2 >{{$gls['subject_name']}}</h2>
											<div class="content" >
												<p>({{$gls['subject_desc']}})</p>
											</div>
										</a>
									</article>
									@endforeach
									
								</section>
								
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
