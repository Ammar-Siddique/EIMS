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
$insert = false;
$flag = false;

if(isset($_POST['save']))
    {
        $course_id = $_POST['course_id'];
        $roll_no = $_SESSION['LoginStudent'];
        $course_name = $_POST['course_name'];

        $sql = "select * from eims.courses;";

        if($con->query($sql) == false)
        {
            echo "ERROR: $sql <br> $con->error";
        }

        $run=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($run))
        {
            if($course_id == $row['course_id'] && $course_name == $row['course_name'])
            {
                $sql1 = "INSERT INTO `eims`.`students_courses` (`roll_no`, `course_id`) VALUES ('$roll_no', '$course_id');";

                if($con->query($sql1) == true)
                {

                    // Flag for successful insertion
                    
                    $sql3 = "INSERT INTO `eims`.`marks` (`roll_no`, `course_id`, obtained_marks, total_marks) VALUES ('$roll_no', '$course_id', 0, 0);";
                    if($con->query($sql3) == true)
                    {
                        $insert = true;
                        break;
                    }
                    else
                    {
                        echo "ERROR: $sql3 <br> $con->error";
                    }
                }
                else
                {
                    echo "ERROR: $sql1 <br> $con->error";
                }
            }
        }
        if($insert == false)
        {
            $flag = true;
        }

        

       
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="student.css">
    <title>Register Courses</title>
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
    background-color: rgb(90, 62, 14);
    color: white;
  }  

  .center {
  margin-left: auto;
  margin-right: auto;
  padding: 10px;
  background-color: lightgray ;
  width: 60%;
}

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


    <div class="grid text-center">
    <div class="g-col-6 g-col-md-4"> 
        <br><br>  <br><br> 
    <H2>Available Courses</H2>
    <table class="center">
        <tr>
          <th>Course ID</th>
          <th>Course Name</th>

        </tr>
        <?php
            $sql2 = "select * from eims.courses;";
            $run1=mysqli_query($con,$sql2);
			while($row1=mysqli_fetch_array($run1)) 
            {
				echo "<tr>";
                echo "<td>".$row1['course_id']."</td>";
                echo "<td>".$row1['course_name']."</td>";
				echo "</tr>";
			}
		?>
    </table> 
    <br><br>
      <h2>Register</h2>
    <form action="register course.php" method="POST">

        <label for="course_id">Enter Course id:</label>
        <input type="course_id" id="course_id" name="course_id" required>
        <br><br>

        <label for="course_name">Enter Course name:</label>
        <input type="course_name" id="course_name" name="course_name" required>
        <br><br>

        <input class= "btn btn-primary" type="submit"  value="Register" name="save" >
       
        <?php
        if($flag == true)
        {
            echo "<br><p>This course is not available!</p><br>";
        }
        
        if($insert == true){
        echo "<br><p>Course registered.</p>";
        }
    ?>

    </form>
    </div>
    </div>
</body>
</html>