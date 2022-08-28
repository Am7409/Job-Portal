<?php include('server.php') ?>
<?php 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      .navbar{
      overflow: hidden;
      background-color: #333;
      position: fixed;
      width:100%;
      }
      h1, p{
          color: #fff;
      }
      .jobs{
          border: 1px solid black;
          box-shadow:5px 5px 4px 5px grey;
          margin: 10px;
          padding: 10px;
      }
      .jobs:hover{
          border: 2px solid black;
          box-shadow:6px 6px 5px 6px grey;
      }
      .st{
        padding-left:1200px;
      }
    </style>
<!-- CSS only -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body style="margin:0; padding:0;">
 <div class="row mr-0">
     <div class="col-12 container-fluid">
        <div class="jumbotron jumbotron-fluid" style="background-image: url('banner-home.png'); background-size:cover;)">
            <div class="container">
                <h1 class="display-4" style="color:#EFE2BA"><b>Job Portal</b></h1>
                <p class="lead">Best Jobs available your skills</p>
                <p class="st"><a href="index.php?logout='1'" style="color: #EFE2BA;">Logout</a></p>
            </div>
        </div>   
     </div>
 </div>
 <div class="row m-0">
 <?php $sql="SELECT * FROM `jobs`";
        $result=mysqli_query($db,$sql);
        $nums=mysqli_num_rows($result);
        $i=0;
       while($res = mysqli_fetch_array($result)){
         ?>
         <div class="col-md-4">
             <div class="jobs">
                 <h3 style="text-align: center;"><?php echo $res['position']; ?></h3>
                 <h5 style="text-align: center;"><?php echo $res['cname']; ?></h5>
                 <p style="color:black; text-align:justify;"><?php echo $res['Jdes']; ?></p>
                 <p style="color:black;"><b>Skills Required:</b><?php echo $res['skills']; ?></p>
                 <p style="color:black;"><b>CTC:</b><?php echo $res['CTC']; ?></p>
                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Apply Now
                 </button>
             </div>
         </div>
     <?php
        }
  ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apply for Job </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-x"></i></button>
      </div>
      <div class="modal-body">
      <div class="content">
    <div class="card card-body" style="width: 300px;">
<form method="POST">
  <div class="mb-3">
    <label for="Name" class="form-label">Name </label>
    <input type="text" class="form-control" id="" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputapplying" class="form-label">Applaying for</label>
    <input type="text" class="form-control" id="exampleInputPosition" name="apply">
  </div>
  <div class="mb-3">
    <label for="Qulification" class="form-label">Qualifications</label>
    <input type="text" cols="30"  rows="10" class="form-control" id=""  name="qual">
  </div>
  <div class="mb-3">
    <label for="Year" class="form-label">Year passout</label>
    <input type="text" class="form-control" id="Skills" name="year">
  </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="apply_but">Apply</button>
        </form>  
    </div>
    </div>
  </div>
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
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>