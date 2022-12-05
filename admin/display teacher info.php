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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin.css">
    <title>Teacher Details</title>
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


    <form>

    </form>
    <br><br>
    <div class="grid text-center">
    <div class="g-col-6 g-col-md-4">
    <h1>Teachers Information</h1>

<table class="center">
  <tr>
    <th>Teacher ID</th>
    <th>Teacher Name</th>
    <th>Phone no.</th>
    <th>Address</th>
    <th>Salary</th>
  </tr>
  <?php
            $sql2 = "select * from eims.teacher_info;";
            $run1=mysqli_query($con,$sql2);
			while($row1=mysqli_fetch_array($run1)) 
            {
				echo "<tr>";
                echo "<td>".$row1['T_id']."</td>";
                echo "<td>".$row1['T_name']."</td>";
                echo "<td>".$row1['phone_no']."</td>";
                echo "<td>".$row1['address']."</td>";
                echo "<td>".$row1['salary']."</td>";
				echo "</tr>";
			}
		?>
     
</table>
    </div>
    </div>



</body>
</html>