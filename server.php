<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $phone = mysqli_real_escape_string($db, $_POST['Phone_number']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($phone)) { array_push($errors, "Phone Number is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, phone, password) 
  			  VALUES('$username', '$email', '$phone', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($db, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: mainhome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

if(isset($_POST['submitjob'])){
  $cname=mysqli_real_escape_string($db, $_POST['cname']);
  $position=mysqli_real_escape_string($db, $_POST['position']);
  $Jdes=mysqli_real_escape_string($db, $_POST['Jdes']);
  $skills=mysqli_real_escape_string($db, $_POST['skills']);
  $CTC=mysqli_real_escape_string($db, $_POST['CTC']);

  $sql= "INSERT INTO jobs (cname, position, Jdes, skills, CTC) VALUES ('$cname','$position','$Jdes','$skills','$CTC')";
   if(mysqli_query($db, $sql)){
       echo "New job Posted";
   }
   else{
      echo"Error: Failed to post the job $sql. ".mysqli_error($db);
   }
}

if(isset($_POST['apply_but'])){
  $name=mysqli_real_escape_string($db, $_POST['name']);
  $apply=mysqli_real_escape_string($db, $_POST['apply']);
  $qual=mysqli_real_escape_string($db, $_POST['qual']);
  $year=mysqli_real_escape_string($db, $_POST['year']);

  $result= "INSERT INTO candidate ( name, apply , qualification , year ) VALUES ('$name','$apply','$qual','$year')";
   if(mysqli_query($db, $result)){
       echo "New job Applied";
   }
   else{
      echo"Error: Failed to post the job $sql. ".mysqli_error($db);
   }
}

if(isset($_POST['contact_sub'])){
  $name1=mysqli_real_escape_string($db, $_POST['name']);
  $email1=mysqli_real_escape_string($db, $_POST['email']);
  $message=mysqli_real_escape_string($db, $_POST['message']);

  $resultt= "INSERT INTO contact ( name, email, message ) VALUES ('$name1','$email1','$message' )";
   if(mysqli_query($db, $resultt)){
       echo "Thanks for contacting us!!!";
   }
   else{
      echo"Error: Failed to contact us $sql. ".mysqli_error($db);
   }
}

?>