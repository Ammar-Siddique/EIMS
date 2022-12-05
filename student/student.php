<?php
    session_start();
    if (!$_SESSION["LoginStudent"])
    {
      header('location:../login/student-login.php');
    }
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password);

    if(!$con)
    {
        die("connection to this database failed due to " . mysqli_connect_error());
    }
    $roll_no=$_SESSION['LoginStudent'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="student.css">
    <title>Student Panel</title>
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
    background-color: rgb(90, 62, 14);
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
    background-color: rgb(90, 62, 14);
    }
    
nav{
  position: sticky; 
     padding: 20px;
    background-color: rgb(90, 62, 14);
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
                <li><a href="student.php"><img src="logo.png"></a></li> 
                <li><a href="../login/logout.php"> <button type="button" class="btn btn-danger">Logout</button></a></li>
           
        </nav>
</div>
</div>
        
<div class="sidebar">
        <a href="student.php">Dashboard</a>
        <a href="display marks.php">Marks</a>
        <a href="disp_s_attendance.php">Attendance</a>
         <a href="transcript.php">Transcript</a>
         <a href="register course.php">Register course</a>
         <a href="withdraw course.php">Withdraw course</a>
         <a href="display fee.php">Display Fee</a>
         <a href="coursefeedback.php">Send feedback</a>
         <!-- <a href="verifytransaction.php">Verify payment</a> -->
      </div>
    

      <?php
	
    $query="select * from eims.student_info where roll_no='$roll_no'";



$run=mysqli_query($con,$query);
while ($row=mysqli_fetch_array($run)) {
?>
<div class="grid_container">  
<div class="grid text-center">
        <div class="g-col-6 g-col-md-4">

        <br>
        <br> 
  <ul>ID: 
  <?php echo $row['roll_no'];?></ul>
  <ul>Name:
  <?php echo $row['name'];?></ul>
  <ul>Department:
  <?php echo $row['department'];?></ul>
  <ul>Date of birth:
  <?php echo $row['date_of_birth'];?></ul>
  <ul>Address:
  <?php echo $row['address'];?></ul>
  <ul>Phone#:
  <?php echo $row['phone_no'];
    $con->close();}?></ul>
</div>
</div>
</div>

</body>
</html>