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
                                <h1>My Profile</h1>
                                <p></p>
                            </header>
                            {{-- buttons --}}
                            <div calss="inner"> 
								<br>
								<h2>Edit Profile Information</h2> <br>
								<form method="post" action="#">
									<div style="margin-bottom:2em;">
										<div style="width:6em;background-color:grey;height:6em;border-radius:50%;margin-left:2em;margin-bottom:2em;">

										</div>
										<p>Profile Picture</p>
										 <input type="file" name="profile_pic_upload">
									</div>
									<div class="row gtr-uniform">
									
										<div class="col-6 col-12-xsmall">
											<label for="">Name</label>
											<input type="text" name="demo-name" id="demo-name" value="" placeholder="Name" />
										</div>
										<div class="col-6 col-12-xsmall">
											<label for="">Email</label>
											<input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" />
										</div>
										<div class="col-12">
										<input type="number" style="border:none;border-bottom:solid 1px rgb(177, 177, 177);" placeholder="phone number">
										</div>
										<div class="col-6 col-12-xsmall">
											<label for="">Username</label>
											<input type="text" name="demo-name" id="demo-name" value="" placeholder="Username" />
										</div>
										<div class="col-6 col-12-xsmall">
											<label for="">Password</label>
											<input type="password" name="demo-email" id="demo-email" value="" placeholder="password" />
										</div>
										<div class="col-12">
											<ul class="actions">
												<li><input type="submit" value="Save" class="primary" /></li>
												<li><input type="reset" value="Reset" /></li>
											</ul>
										</div>
									</div>
								</form>
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
