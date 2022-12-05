<?php 
session_start();
    
$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server, $username, $password);

if(!$con)
{
    die("connection to this database failed due to " . mysqli_connect_error());
}

    $insert=false;
    if(isset($_POST["save"]))
    {
        $username=$_POST["a_id"];
        $password=$_POST["password"];

        $query="select * from eims.admin_info where a_id='$username' and password='$password';";
        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0) 
        {
            while ($row=mysqli_fetch_array($result)) 
            {
                
                $_SESSION['LoginAdmin']=$row["a_id"];
                header('Location:../admin/admin.php');
            }
        }
        else
        { 
            $insert=true;
            //header("Location: login.php");
            //echo "Incorrect username/password";
        }
        
    }
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Admin Login - EIMS</title>
        <link rel="shortcut icon" href="../Images/fast.png" type="image/x-icon">
	</head>
	<body class="login-background">
		<?php include('../common/common-header.php') ?>
        <div class="login-div mt-3 rounded">
            <div class="logo-div text-center">
                <img src="../Images/fast.png" alt="" class="align-items-center" width="100" height="100">
            </div>
            <div class="login-padding">
                <h2 class="text-center text-white">ADMIN LOGIN</h2>
                <form class="p-1" action="admin-login.php" method="POST">
                    <div class="form-group">
                        <label><h6>Enter Your ID:</h6></label>
                        <input type="text" name="a_id" placeholder="Enter User ID" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><h6>Enter Password:</h6></label>
                        <input type="Password" name="password" placeholder="Enter Password" class="form-control border-bottom" required>
                        <?php
                        if($insert == true){
                         echo "<br><p>Id Or Password Does Not Match.</p>";
                        }?>
                    </div>
                    <div class="form-group text-center mb-3 mt-4">
                        <input type="submit" name="save" value="LOGIN" class="btn btn-white pl-5 pr-5 ">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>