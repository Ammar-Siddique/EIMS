<?php
    session_start();
    if (!$_SESSION["LoginAdmin"])
    {
      header('location:../login/admin-login.php');
    }
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password);

    if(!$con)
    {
        die("connection to this database failed due to " . mysqli_connect_error());
    }
    $admin_id=$_SESSION['LoginAdmin'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Admin Panel</title>
    <link rel="shortcut icon" href="../Images/fast.png" type="image/x-icon">
</head>
<body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
<style>
 sidebar {
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
    background-color: maroon;
    color: white;
  }   
.grid_container{ 
  display: flex;
  justify-content:center;
 } 


ul {
text-align: center;
font-size: large;
margin: 15px 15px;
padding:20px;
 border-radius:  40px; 
border: 4px solid #4b4b4b;
background-color: lightgray;



}


nav li{
     width: 20%;
     display: inline-block;
     font-size: 24px;
     text-align: center;
 }
 
nav li a{
     text-decoration: none;
     color: #4b4b4b;
     
 }



nav li a:hover{
    text-decoration: underline;
    background-color: maroon;
    }
    
nav{
   position: sticky; 
    background-color: maroon;
    
}

img{
        max-width: 90%;
    }

.main-nav{ 
  display: flex;
   justify-content:right; 
} 
        </style>

<nav class="main-nav">
<div class="nav text-center">
        <div class="g-col-6 g-col-md-4">
        <li><a href="admin.php"><img src="logo.png"></a></li> 
            <li><a href="../login/logout.php"> <button type="button" class="btn btn-danger">Logout</button></a></li>
           
        </nav>
</div>
</div>

        <div class="sidebar">

            <a href="admin.php">Dashboard</a>       
            <a href="id creation.php" >Create or edit id</a>
            <a href="course upload.php">Course upload</a>
            <a href="generate voucher.php">Voucher Generation</a>
            <a href="job application.php">Job applications</a>
            <a href="display teacher info.php">Teacher info</a>
            <a href="mark_t_attendance.php">Mark teachers attendance</a>
        
</div>
    <?php
	
			$query="select * from eims.admin_info where a_id='$admin_id'";
		
		
		
		$run=mysqli_query($con,$query);
		while ($row=mysqli_fetch_array($run)) {
	?>
    <div class="grid_container">
    
        <div class="grid text-center">
        <div class="g-col-6 g-col-md-4">

        <br>
        <br>
       
          <ul>ID: 
          <?php echo $row['a_id'];?></ul>
          <ul>Name:
          
          <?php echo $row['name'];?></ul>
          <ul>Phone no:
          
          <?php echo $row['phone_no'];?></ul>
          <ul>Address:
          <?php echo $row['address'];?></ul>
          <ul>Email:
          <?php echo $row['email'];
           
            $con->close();}?></ul>
            </div>
           </div>

    
        </div>
      <?php

      ?>




</body>
</html>