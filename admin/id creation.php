
<?php
    session_start();
    if (!$_SESSION["LoginAdmin"])
    {
      header('location:../login/admin-login.php');
    }
    $admin_id=$_SESSION['LoginAdmin'];
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con)
    {
        die("connection to this database failed due to " . mysqli_connect_error());
    }
    $insert = false;
    $insert1 = false;
    $insert2 = false;
    //these are flags which is used to display msg insertion/deletion completed after successful data manipulation
    if(isset($_POST['save2']))
    {
        $roll_no = $_POST['roll_no'];
        $name = $_POST['name'];
        $department = $_POST['department'];
        $date_of_birth = $_POST['date_of_birth'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone_no'];
        $password = md5($roll_no);

        $sql = "INSERT INTO `eims`.`student_info` (`roll_no`, `name`, `department`, `date_of_birth`, `address`, `phone_no`, `password`, `dt`) VALUES ('$roll_no', '$name', '$department', '$date_of_birth', '$address', '$phone_no', '$password', current_timestamp());";

        if($con->query($sql) == true)
        {

        // Flag for successful insertion
            $insert = true;
        }
        else
        {
            echo "ERROR: $sql <br> $con->error";
        }

       
    }

    if(isset($_POST['save1']))
    {
        $tid =  $_POST['T_id'];
        $tname = $_POST['T_name'];
        $salary = $_POST['salary'];
        $address1 = $_POST['address1'];
        $phone_no1 = $_POST['phone_no1'];
        $password1 = md5($tid);

        $sql1 = "INSERT INTO `eims`.`teacher_info` (`T_id`, `T_name`, `phone_no`, `address`, `salary`, `password`) VALUES ('$tid', '$tname', '$phone_no1', '$address1', '$salary', '$password1');";

        if($con->query($sql1) == true)
        {

        // Flag for successful insertion
            $insert1 = true;
        }
        else
        {
            echo "ERROR: $sql1 <br> $con->error";
        }


    }

    if(isset($_POST['save3']))
    {
        $selected = $_POST['identity'];
        $id = $_POST['id'];

        if($selected == 'Teacher')
        {
            $sql2 = "DELETE FROM eims.teacher_info WHERE `teacher_info`.`t_id` = '$id';";
        }
        else if($selected == 'Student')
        {
            $sql2 = "DELETE FROM eims.student_info WHERE `student_info`.`roll_no` = '$id'";
        }

        if($con->query($sql2) == true)
        {

        // Flag for successful insertion
            $insert2 = true;
        }
        else
        {
            echo "ERROR: $sql2 <br> $con->error";
        }

    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <title>ID Manipulation</title>
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

.add_student_id{
    display:inline-block;

    border: 4px solid black;
    border-radius:40px;
    padding: 10px;
    margin: 5px;
    text-align: center;
    background-color: lightgray;
}

.add_teacher_id{
    display:inline-block;
    
    border: 4px solid black;
    border-radius:40px;
    padding: 10px;
    margin: 5px;
    text-align: center;
    background-color: lightgray;
}

.delete_id{
    display:inline-block;
    
    border: 4px solid black;
    border-radius:40px;
    padding: 10px;
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



    <form action="id creation.php" method="post">    
    
    <div class="grid text-center">
    <div class="g-col-6 g-col-md-4">
    
    <div class="add_teacher_id ">
    <h2>Add teacher</h2>
        <label for="T_id">Enter Teacher ID:</label>
        <input type="T_id" id="T_id" name="T_id" required>
        <br><br>

        <label for="T_name">Enter Teacher Name:</label>
        <input type="T_name" id="T_name" name="T_name" placeholder="Abdul Ahad" required>
        <br><br>

        <label for="phone_no1">Enter Contact#:</label>
        <input type="tel" id="phone_no1" name="phone_no1" placeholder="090078601" pattern="[0-9]{11}" required>
        <br><br>

        <label for="address1">Enter address:</label>
        <input type="address1" id="address1" name="address1" required>
        <br><br>

        
        <label for="salary">Enter Salary:</label>
        <input type="number" id="salary" name="salary" required>
        <br><br>

        <input class= "btn btn-primary" type="submit"  value="Create" name="save1" >
        <?php
        if($insert1 == true){
        echo "<br><p>Insertion completed.</p>";
        }
    ?>
    </div>
    </div>
    </div>
    </form>

    <!-- <div class="grid text-center">
        <div class="g-col-6 g-col-md-4"> -->
    
    <form action="id creation.php" method="post">
        
        <div class="grid text-center">
        <div class="g-col-6 g-col-md-4">
        <div class="add_student_id">
        <h2>Add student</h2>
            <label for="roll_no">Enter Roll#:</label>
            <input type="rollno" id="roll_no" name="roll_no" required>
            <br><br>
            
            <label for="name">Enter Student name:</label>
            <input type="name" id="name" name="name"  placeholder="Zaki Imran" required>
            <br><br>
            
            <label for="department">Enter Department:</label>
            <input type="department" id="department" name="department" required>
            <br><br>

            <label for="date_of_birth">Enter Date of birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>
            <br><br>

            <label for="address">Enter Address:</label>
            <input type="address" id="address" name="address" required>
            <br><br>

            <label for="phone_no">Enter Contact#:</label>
            <input type="tel" id="phone_no" name="phone_no" placeholder="090078601" pattern="[0-9]{11}" required>
            <br><br>

            <input class= "btn btn-primary" type="submit"  value="Create" name="save2" >
        </div>
        </div>
        </div>
    </form>

    <?php
        if($insert == true){
        echo "<br><p>Insertion completed.</p>";
        }
    ?>
    
        <br>
        <form action="id creation.php" method="post">
            
            <div class="grid text-center">
            <div class="g-col-6 g-col-md-4">
            <div class="delete_id">
            <h2>Delete ID</h2>
            <label for="identity">Select:</label>
            <select id="identity" name="identity">
                <option value="Teacher">Teacher</option>
                <option value="Student">Student</option>
            </select>
            
            <br><br>

            <label for="id">Enter ID:</label>
            <input type="id" id="id" name="id" required>
            <br><br>

            <input class= "btn btn-danger" type="submit"  value="Delete" name="save3" >
        </form>

    </div>
    </div>
    </div>
    <?php
        if($insert2 == true){
        echo "<br><p>Deletion completed.</p>";
        }
    ?>
</body>
</html>