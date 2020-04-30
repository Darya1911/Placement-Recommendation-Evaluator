<?php
	session_start();
	include('connection.php');
	include('a_config.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $PAGE_TITLE; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
	</head>
	<body>
		<div class="content">
			<?php
				if(isset($_SESSION["type"]))
				{
			?>
						<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
								<i class="fa fa-navicon" style="color: white; "></i>
							</button>
							<div class="collapse navbar-collapse" id="collapsibleNavbar">
								<h1 class="navbar-brand">Stream Analysis</h1>
								<ul class="navbar-nav ml-auto">
									<li class="nav-item">
										<a class="nav-link" href="ManageCourse.php"><i class="fa fa-book"></i> Manage Course</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="ManageStudent.php"><i class='fas fa-users'></i> Manage Student</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="ManageQuestion.php"><i class='fas fa-question'></i> Manage Questions</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="ManageDataset.php"><i class='fa fa-database'></i> Manage Data Sets</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="ExamDetails.php"><i class="fa fa-list"></i> View Exam Details</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="logout.php"><i class="fa fa-angle-right"></i> Logout</a>
									</li>
								</ul>
							</div> 
						</nav>
				<?php
				}
				else
				{
			?>
					<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
							<i class="fa fa-navicon" style="color: white; "></i>
						</button>
						<div class="collapse navbar-collapse" id="collapsibleNavbar">
						
							<h1 class="navbar-brand">Stream Analysis</h1>

							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" id="userhome" href="index.php" id="home"><i class="fa fa-home"></i> Home</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="aboutus.php"><i class="fa fa-users"></i> About Us</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="contactus.php"><i class="fa fa-phone"></i> Contact Us</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="user" href="login.php"><i class="fa fa-lock"></i> Login</a>
								</li>
							</ul>
						</div> 
					</nav>
			<?php
				}
			?>
			

		