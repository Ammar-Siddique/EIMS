<?php
    session_start();
    if (!$_SESSION["LoginAdmin"])
    {
      header('location:../login/admin-login.php');
    }
    $admin_id=$_SESSION['LoginAdmin'];
    $insert = false;
    if(isset($_POST['save']))
    {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con)
    {
        die("connection to this database failed due to " . mysqli_connect_error());
    }
    //echo "Success connecting to the db";
    
    
    $desig = $_POST['Designation'];
    $desc = $_POST['desc'];
    $salary = $_POST['sal'];
    
    $sql = "INSERT INTO `eims`.`job_application` (`designation`, `description`, `salary`, `dt`) VALUES ('$desig', '$desc', '$salary', current_timestamp());";

    if($con->query($sql) == true)
    {
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else
    {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin.css">
    <link rel="shortcut icon" href="../Images/fast.png" type="image/x-icon">
</head>

<body>

<style>
 
 /* body{
    color:lightskyblue;
 } */

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




form{
    display:inline-block;

    border: 4px solid black;
    border-radius:40px;
    padding: 50px;
    margin: 5px;
    text-align: center;
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

    
        <div class="grid text-center">
        <div class="g-col-6 g-col-md-4">
        <br><br><br>    
        <form action="job application.php" method="post">
            <h2>Describe Job</h2>
            <label for="Designation">Designation</label>
            <input type="desc" id="Designation" name="Designation" required>

            <br>
            <br>
            <label for="desc">Description</label>
            <input type="text" id="desc" name="desc" required>
            <br>
            <br>
            <label for="sal">Salary</label>
            <input type="number" id="sal" name="sal" min="0" placeholder="" required>
            <br>
            <br> 
            <input class= "btn btn-primary" type="submit"  value="Submit" name="save" >
            <br>
            <?php
        if($insert == true){
        echo "<br><p>Job posted.</p>";
        }
    ?>

        </form>
    </div>
    </div>

</body>

</html>