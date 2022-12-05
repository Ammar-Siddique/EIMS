<?php
    session_start();
    if (!$_SESSION["LoginTeacher"])
    {
      header('location:../login/teacher-login.php');
    }
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password);

    if(!$con)
    {
        die("connection to this database failed due to " . mysqli_connect_error());
    }
    $t_id=$_SESSION['LoginTeacher'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="teacher.css">
    <title>Teacher Panel</title>
    <link rel="shortcut icon" href="../Images/fast.png" type="image/x-icon">
</head>
<body>

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
    background-color: darkgreen;
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
    background-color: darkgreen;
    }
    
nav{
  position: sticky; 
     padding: 20px;
    background-color: darkgreen;
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
        <li><a href="teacher.php"><img src="logo.png"></a></li> 
            <li><a href="../login/logout.php"> <button type="button" class="btn btn-danger">Logout</button></a></li>
           
        </nav>
</div>
</div>

<div class="sidebar">
         <a href="teacher.php">Dashboard</a>
         <a href="grading.php">Grading</a>
         <a href="disp_t_attendance.php">Your attendance</a>
         <a href="mark_s_attendance.php">Mark attendance</a>
         <a href="ta request.php">General Queries</a>

</div>


<?php
	
			$query="select * from eims.teacher_info where t_id='$t_id'";
		
		
		
		$run=mysqli_query($con,$query);
		while ($row=mysqli_fetch_array($run)) {
	?>
    
    <div class="grid_container">
        <div class="grid text-center">
        <div class="g-col-6 g-col-md-4">
            <br><br>

   
          <ul>ID: 
          <?php echo $row['T_id'];?></ul>
          <ul>Name:</li>
          <?php echo $row['T_name'];?></ul>
          <ul>Phone#:
          <?php echo $row['phone_no'];?></ul>
          <ul>Address:
          <?php echo $row['address'];?></ul>
          <ul>Salary:
          <?php echo $row['salary'];
            $con->close();}?></ul>

  

        </div>
        </div>
        </div>


    
</body>
</html>