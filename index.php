<?php include('server.php') ?>
<?php 
  // session_start(); 

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
 <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
        /* The side navigation menu */
        div .sidebar{
          margin-top:58px;
        }
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

/* Active/current link */
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}
div.content p button{
  margin-top: 70px;
}
/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
.navbar{
  overflow: hidden;
  background-color: #333;
  position: fixed;
  width:100%;
}
.str{
  color:#FF1B1B;
}
    </style>
	<title>Home</title>
</head>
<body>
<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    </div>
  </div>
  </nav>
<div class="sidebar" >
  <a class="active" href="index.php">Jobs</a>
  <a href="appliedjobs.php">Cadidates Applied</a>
  <a href="contact.php">Contact</a>
  <a href="about.php">About</a>
  <a href="index.php?logout='1'"">Logout</a>
</div>
<div class="content">
<p>
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
    Post Job
  </button>
</p>
<div style="min-height: 20px;">
  <div class="collapse collapse-horizontal" id="collapseWidthExample">
    <div class="card card-body" style="width: 300px;">
<form method="POST">
  <div class="mb-3">
    <label for="Company Name" class="form-label">Company Name </label>
    <input type="text" class="form-control" id="" name="cname">
  </div>
  <div class="mb-3">
    <label for="exampleInputPosition" class="form-label">Position</label>
    <input type="text" class="form-control" id="exampleInputPosition" name="position">
  </div>
  <div class="mb-3">
    <label for="Jobdescription" class="form-label">Job Discription</label>
    <input type="text" cols="30"  rows="10" class="form-control" id=""  name="Jdes">
  </div>
  <div class="mb-3">
    <label for="Skills" class="form-label">Skills</label>
    <input type="text" class="form-control" id="Skills" name="skills">
  </div>
  <div class="mb-3">
    <label for="CTC" class="form-label">CTC</label>
    <input type="text" class="form-control" id="CTC" name="CTC">
  </div>
  <button type="submit" class="btn btn-primary" name="submitjob">Post</button>
</form>    </div>
  </div>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Company Name </th>
      <th scope="col">Position</th>
      <th scope="col">CTC</th>
      <th scope="col" colspan=3>Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php $sql="SELECT  `cname`, `position`, `CTC`, `id` FROM `jobs`";
        $result=mysqli_query($db,$sql);
        $nums=mysqli_num_rows($result);
        $i=0;
       while($res = mysqli_fetch_array($result)){
         ?>
         <tr>
         <td><?php echo ++$i; ?></td>
         <td><?php echo $res['cname']; ?></td>
         <td><?php echo $res['position']; ?></td>
         <td><?php echo $res['CTC']; ?></td>
         <td><a href="delete.php?idth=<?php echo $res['id']; ?>" class="btn " data-bs-toggle="tooltip" data-bs-placement="bottom" title="DELETE">
           <i class="fa fa-trash str" aria-hidden="true"></i></a></td>
         </tr>
     <?php
        }
  ?>
  </tbody>
</table>
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
   
    	<p>  </p>
    <?php endif ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
</body>
</html>

