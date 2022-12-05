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
    $flag = false;
    if (isset($_POST['sub'])) 
    {
        $count=$_POST['count'];
	    for ($i=0; $i < $count; $i++) {  
		$date=date("d-m-y");
		$que="insert into eims.student_attendance(roll_no,attendance,course_id,date)values('".$_POST['roll_no'][$i]."','".$_POST['attendance'][$i]."','".$_POST['course_id'][$i]."','$date')";
	    $run2=mysqli_query($con,$que);
	    if ($run2) {
			//echo "Insert Successfully";
      $flag = true;
		}	
		//else{
			//echo " Insert Not Successfully";
		//}
	}
    
    }

    if($flag == true)
    {
      echo "Insert Successfully";
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
    <link rel="stylesheet" href="teacher.css">
    <title>Mark Student attendance</title>
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
    background-color: darkgreen;
    color: white;
  }  

  .center {
  margin-left: auto;
  margin-right: auto;
  padding: 10px;
  background-color: lightgray  ;
  width: 60%;
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

form{
    display:inline-block;

    border: 4px solid black;
    border-radius:40px;
    padding: 50px;
    margin: 5px;
    text-align: center;
    background-color: lightgray;
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
    
      <br><br>
    <div class="grid text-center">
    <div class="g-col-6 g-col-md-4">  
    <h2>Select your course</h2>
    <form action="mark_s_attendance.php" method="post">
        <label for="course_id">Select course:</label>
        <select id="course_id" name="course_id" required>
        <?php
			$query="select distinct(course_id) from eims.courses;";
	        $run=mysqli_query($con,$query);
		    while($row=mysqli_fetch_array($run)) 
            {
			echo	"<option value=".$row['course_id'].">".$row['course_id']."</option>";
			}
		?>
        </select>
        <br><br>
        <input class="btn btn-success" type="submit" name="submit" value="Select">
    </form>

    <br>
    <h2>Mark attendance</h2>
    <table class="center">
        <tr>
            <th>Course ID</th>
            <th>Student Name</th>
            <th>Add Attendance</th>
        </tr>
        <?php
                $count = 0;
                $conn=mysqli_connect("localhost","root","");
              
              if (isset($_POST['submit'])) 
              {
                $course_id = $_POST['course_id'];
                $sql = "select roll_no, course_id from eims.students_courses where course_id = '$course_id';";
                $run1=mysqli_query($conn,$sql);
                while ($row1=mysqli_fetch_array($run1)) {
                    $count++;?>
        <form action="mark_s_attendance.php" method="post" >
           
        <tr>
            <td><?php echo $row1['course_id'] ?></td>
		    <input type="hidden" name="course_id[]" value=<?php echo $row1['course_id'] ?> >
            <?php $roll_no=$row1['roll_no']; ?>
			<td><?php echo $row1['roll_no'] ?></td>
			<input type="hidden" name="roll_no[]" value=<?php echo $row1['roll_no'] ?>>
            <td>Present<input type="checkbox" name="attendance[]" value="1" >Absent<input type="checkbox" name="attendance[]" value="0"></td>
            <input type="hidden" name="count" value="<?php echo $count?>"><?php }}?>
        </tr>

        <input class="btn btn-primary" type="submit" name="sub">

        </form>
    </table>
    </div>
    </div>	

</body>
</html>