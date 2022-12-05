</section>
	<section class=" bg-light text-center">
		<div class=" w-100 pt-5 m-auto" style="
	width:100%;
	padding-right:15px;
	padding-left:15px;
	margin-right:auto;
	margin-left:auto;
">
<div class="paragraph">
		<h1>CAREERS</h1>
			
	<table class="center">
  		<tr style="background-color: lightgray;">
    	<th>Designation</th>
    	<th>Description</th>
    	<th>Salary</th>
  		</tr>
  	<?php
            $server = "localhost";
			$username = "root";
			$password = "";
			$con = mysqli_connect($server, $username, $password);
			
			if(!$con)
			{
				die("connection to this database failed due to " . mysqli_connect_error());
			}
			$sql2 = "select * from eims.job_application;";
            $run1=mysqli_query($con,$sql2);
			while($row1=mysqli_fetch_array($run1)) 
            {
				echo "<tr>";
                echo "<td>".$row1['designation']."</td>";
                echo "<td>".$row1['description']."</td>";
                echo "<td>".$row1['salary']."</td>";
				echo "</tr>";
			}
	?>
     
	</table>
	<div class="pp">
	<p>To apply, send your resumes at carrers@nu.edu.pk</p>
	</div>
	</div>
</div>	
</section>
