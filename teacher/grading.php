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

    $insert = false;

    if(isset($_POST['save']))
    {
        $roll_no = $_POST['roll_no'];
        $ccode = $_POST['ccode'];
        $omarks = $_POST['omarks'];
        $tmarks = $_POST['tmarks'];
        
        $sql = "UPDATE eims.`marks` SET `obtained_marks` = '$omarks' WHERE `marks`.`roll_no` = '$roll_no' AND `marks`.`course_id` = '$ccode';";

        $sql1 = "UPDATE eims.`marks` SET `total_marks` = '$tmarks' WHERE `marks`.`roll_no` = '$roll_no' AND `marks`.`course_id` = '$ccode';";

        if($con->query($sql) == true)
        {
            if($con->query($sql1) == true)
            {
                $insert = true;
            }
            else
            {
                echo "ERROR: $sql1 <br> $con->error";
            }
        }
        else
        {
            echo "ERROR: $sql <br> $con->error";
        }
    }



    
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
    <title>Assign grades</title>
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
    background-color: darkgreen;
    color: white;
  }   
/* .grid_container{ 
  display: flex;
  justify-content:center;



 }  */

 form{
    display:inline-block;

    border: 4px solid black;
    border-radius:40px;
    padding: 30px;
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
     
      <div class="grid text-center">
        <div class="g-col-6 g-col-md-4">
        <br> 
        <br>
    <form action="grading.php" method="post">
        <h2>Marks Updation</h2>
        <br>

        <label for="roll_no">Enter Student Roll#:</label>
        <input type="roll_no" id="roll_no" name="roll_no" required>
        <br><br>

        <label for="roll_no">Enter Course code:</label>
        <input type="text" id="ccode" name="ccode" required>
        <br><br>

        <label for="marks">Update obtained marks:</label>
        <input type="number" id="omarks" name="omarks" min="0" max="100"  required>
        <br><br>

        <label for="marks">Update total marks:</label>
        <input type="number" id="tmarks" name="tmarks" min="0" max="100"  required>
        <br><br>

        <!-- <input type="submit" value="Update marks" name="save"> -->
        <input class= "btn btn-primary" type="submit"  value="Update marks" name="save" >
        <?php
        if($insert == true){
        echo "<br><p>Marks updated.</p>";
        }
    ?>
    </form>
    </div>
    </div>
</body>
</html>