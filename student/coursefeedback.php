<?php
    session_start();
    if (!$_SESSION["LoginStudent"])
    {
      header('location:../login/student-login.php');
    }
    
    $insert = false;
    $flag = false;
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
    
    
    $roll_no = $_POST['roll_no'];
    $ccode = $_POST['ccode'];
    $fb = $_POST['fb'];
    
    $sql1 = "INSERT INTO `eims`.`course_feedback` (`roll_no`, `course_id`, `feedback`) VALUES ('$roll_no', '$ccode', '$fb');";

    $sql = "select * from eims.students_courses;";

    $run=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run))
    {
        if($ccode == $row['course_id'] && $roll_no == $row['roll_no'])
        {
            if($con->query($sql1) == true)
            {
        // echo "Successfully inserted";

        // Flag for successful insertion
                $insert = true;
                break;
            }
            else
            {
                echo "ERROR: $sql <br> $con->error";
            }
        }
    }
    if($insert == false)
    {
        $flag = true;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="student.css">
    
    <title>Course Feedback Form</title>
    <link rel="shortcut icon" href="../Images/fast.png" type="image/x-icon">
</head>

<style>
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
    background-color: rgb(90, 62, 14);
    color: white;
  }   
.grid_container{ 
  display: flex;
  justify-content:center;



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

<body>

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
         <!-- <a href="verifytransaction.php">Verify payment</a> -->
         <a href="coursefeedback.php">Send feedback</a>
      </div>

    <div class="grid text-center">
    <div class="g-col-6 g-col-md-4">
        <br><br>
        <h2>Send Feedback</h2>
        <form action="coursefeedback.php" method="post">

            <label for="roll_no">Student ID</label>
            <input type="text" id="roll_no" name="roll_no" required>
            <br>
            <br>
            <label for="ccode">Course Code</label>
            <input type="text" id="ccode" name="ccode" required>
            <br>
            <br>
            <label for="feedback">Feedback</label>
            <textarea id="fb" name="fb" rows="4" cols="50" placeholder="Description" required></textarea>
            <br>
            <input type="submit" value="Submit" name="save">

        </form>
        <?php
        if($flag == true)
        {
            echo "<br><p>Please register in this course to give feedback on it.</p><br>";
        }
        
        if($insert == true){
        echo "<br><p>Feedback submitted.</p>";
        }
    ?>
    </form>
    </div>
    </div>
</body>
</html>