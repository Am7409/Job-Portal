<? include('server.php');?>
<?php  
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
		 <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
		  <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                </head>
<body>
         
	<div class="bgimage">
		<div class="menu">
			
			<div class="leftmenu">
				<a href="#" class="head1"><h4> Job Findings </h4></a>
			</div>

			<div class="rightmenu">
				<ul>
					<a href="#" class="head"><li id="fisrtlist"> HOME </li></a>
					<li> <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Work
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
  <a href="index.php"><button class="dropdown-item head" type="button">Recruiter</button></a>
  <a href="carrier.php"><button class="dropdown-item head" type="button">Employee</button></a>
  </div>
</div></li>
					<a href="about.php" class="head"><li> About us</li></a>
					<a href="contact.php" class="head"><li>contact</li></a>
					<a href="login.php" class="head"><li>  Login </li></a>
                    <a href="index.php?logout='1'" class="head"><li>Logout</li></a>
				</ul>
			</div>

		</div>

		<div class="text">
			<h4> DESIGN • DEVELOPMENT • BRANDING </h4>
			<h1> CREATIVE & EXPERIENCED </h1>
			<h3> WE ARE THE ONE OF THE WORLD’S TOP JOBS AGENCIES </h3>
			<a href="index.php"><button id="buttonone"> Recruiter </button></a>
			<a href="carrier.php"><button id="buttontwo"> Employee </button></a>
		</div>

	</div>
    <div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>