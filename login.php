<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body{
            background-image:url('banner_employer.jpg');
            background-size: cover;
        }
        form{
            background-color: #fff;
            margin-top: 6em;
            margin-left: 21em;
            margin-right: 20em;
            padding: 30px;
            box-shadow: 10px 10px 8px 10px #888888;
        }
    </style>
  <title>Login Page</title>
</head>
<body>
	 
  <div class="container">
      <form method="post" action="login.php">
          <?php include('errors.php'); ?>
      <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Email ID</label>
           <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2">
        </div>
        <button type="submit" class="btn btn-primary" name="login_user">Login</button>
        <p style="text-align: center;">New User? <br> Create Account <a href="register.php">Sign Up</a></p>
        </form>
    </div>
</body>
</html>