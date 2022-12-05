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
    $V_id = $_POST['V_id'];
    $roll_no = $_POST['roll_no'];

    $sql = "select * from eims.voucher";
    $run=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($run);
    if($row['voucher_no'] == $V_id && $row['roll_no'] == $roll_no)
    
        {
            $sql1 = "UPDATE eims.`voucher` SET `status` = 'Paid' WHERE `voucher`.`voucher_no` = 2;";

            if($con->query($sql1) == true)
            {

                // Flag for successful insertion
                
                $insert = true;
            }
            else
            {
                echo "ERROR: $sql1 <br> $con->error";
            }
        }
        else
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
    <title>Verify</title>
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
    <br><br>    
    <h2>Verify payment</h2>
    <br>
    <form action="verifytransaction.php" method="post">
        <label for="roll_no">Enter student id:</label>
        <input type="roll_no" id="roll_no" name="roll_no" placeholder="20k0415" required>
        <br><br>

        <label for="V_id">Enter voucher number:</label>
        <input type="number" id="V_id" name="V_id" required>
        <br><br>


        <!-- <input type="submit" value="Verify" name="save"> -->
        <input class= "btn btn-success" type="submit"  value="Verify" name="save" > 

        <?php
        if($flag == true)
        {
            echo "<br><p>Please enter correct information.</p><br>";
        }
        
        if($insert == true){
        echo "<br><p>Status updated.</p>";
        }
    ?>

    </form>
    </div>
    </div>
</body>
</html>