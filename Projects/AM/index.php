<!DOCTYPE html>
<?php
	session_start();
	if (isset($_SESSION['fid'])) {
      header('Location:faculty.php?link2=&link3=1&link4=');
	}
	elseif (isset($_SESSION['sap'])) {
		header('Location:student.php');
	}
?>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Mark My Attendance - Attendance Manager</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	<!-- Headers Section -->
	<nav class="navbar navbar-inverse fixed-top navbar-toggleable-md navbar-light bg-inverse">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="#">Attendance Manager</a>
		<div class="collapse navbar-collapse" id="navbarToggler">
		    <ul class="navbar-nav mr-auto mt-2 mt-md-0">
		      <li class="nav-item">
		        <a class="nav-link" href="gpa_calculator.html">GPA Calculator</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">About</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Contact</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link disabled" href="#">Get one for my School as well.</a>
		      </li>
		    </ul>
		</div>
	</nav>

	<!-- Content Section -->
	<div id="loginContent" class="row">
	  	<div class="col-lg-4 col-md-4 col-sm-2 col-xs-0"></div>
	    <div class="col-lg-4 col-md-5 col-sm-8 col-xs-12 text-center">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			  <li class="nav-item" style="width: 50%">
			    <a class="nav-link active" data-toggle="tab" href="#teacher" role="tab">Teacher</a>
			  </li>
			  <li class="nav-item" style="width: 50%">
			    <a class="nav-link" data-toggle="tab" href="#student" role="tab">Student</a>
			  </li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			  <!-- Teacher's Form -->
			  <div class="tab-pane fade show  active" id="teacher" role="tabpanel">
			  		<form action="facultyLogin.php" class="loginForm" id="facultyLoginForm" method="post">
				        <h1 class="text-center">Sign In</h1>
				        <p>Still stuck on Excel to maintain Attendance?</br>Try our Online Attendance Manager</p>
				        <hr>
				        <div class="form-group">
				            <input type="text" class="form-control input-lg" value="" name= "username" id="inputsap" placeholder="Username" required>
				        </div>
				        <div class="form-group">
				            <input type="password" value="" name="password" class="form-control input-lg" id="inputPassword3" placeholder="Password" required>
				        </div>
				        <div class="form-group">
				            <div class="checkbox">
				              <label>
				                <input type="checkbox"> Remember me
				              </label>
				            </div>
				        </div>
				        <div class="form-group text-center">
				            <button type="submit" name="submit" class="btn btn-primary btn-lg">Sign in</button>
				        </div>
				    </form>
			  </div>
			  <!-- Student's Form -->
			  <div class="tab-pane fade" id="student" role="tabpanel">
			  		<form action="studentLogin.php" class="loginForm" id="studentLoginForm" method="post">
				        <h1 class="text-center">Sign In</h1>
				        <p>Need to bunk classes? </br>Check your current attendance right away</p>
				        <hr>	
				        <div class="form-group">
				            <input type="text" class="form-control input-lg" name= "username" id="inputsap" placeholder="Username" required>
				        </div>
				        <div class="form-group">
				            <input type="password" name="password" class="form-control input-lg" id="inputPassword3" placeholder="Password" required>
				        </div>
				        <div class="form-group">
				            <div class="checkbox">
				              <label>
				                <input type="checkbox"> Remember me
				              </label>
				            </div>
				        </div>
				        <div class="form-group text-center">
				            <button type="submit" name="submit" class="btn btn-primary btn-lg">Sign in</button>
				        </div>
				    </form>
			  </div>
			</div>
		</div>
	</div>

	
	<!-- Footer Section -->
	<nav class="navbar fixed-bottom navbar-light bg-faded text-center" style="font-size:0.8em;">
		Copyright &copy; 2017 | Design : NKS 
	</nav>


	<script src="js/jquery.min.js"></script>
	<script src="js/teather.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
	  	$('#myTab a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		})
		$('#myTab a[href="#teacher"]').tab('show') // Select tab by name
		$('#myTab a:first').tab('show') // Select first tab
		$('#myTab a:last').tab('show') // Select last tab
	</script>
</body>
</html>
