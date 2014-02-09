<html>
<head>
<style>
body
{
background-color:#d0e4fe;
background-image:url('../images/background.jpg');
}
</style>
</head>
<body>

<h3>
<p style="text-align:right" align="top">
<a href ="../logout.php" style="text-decoration:none">
logout</a>
</p>
</h3>

	<?php

		require_once("../dbconnect.php"); //Include Database Connection Script
		session_start();
		
		//Check Fields
		if (empty($_POST["username"]) || empty($_POST["password"])) {
		  //      echo "Please Fill Out All Fields";
			header("location:index_patient.php");
		        exit;
		}
		
		$username = mysql_real_escape_string($_POST["username"]); //Escape Username
		$password = mysql_real_escape_string($_POST["password"]); //EScape Password
	       // $password = sha1($password); //Convert Password To Sha1
		
		$sql = "SELECT * FROM Patient WHERE username='$username' and password='$password'";
		$result = mysql_query($sql);
		if (mysql_num_rows($result) == 1) {
		        session_register("username");
		        $_SESSION["username"] = $username;



	echo "<center>";
	echo "<table border='2'>";
	echo "<caption>"."<h1>"."<u>".PATIENT." ".DETAILS."</u>"."</h1>"."</caption>";
	echo "<tr>";
	echo "</tr>";
	while($row = mysql_fetch_array($result))
	  {
	  echo "<tr>";
	  echo "<td>".Name."</td>";	
	  echo "<td>" . $row['Name'] . "</td>";
	  echo "</tr>";
	  echo "<tr>";		
	  echo "<td>".Sex."</td>";
	  echo "<td>" . $row['Sex'] . "</td>";
	  echo "</tr>";
	  }

$result1 = mysql_query("SELECT * from Ward as w , Patient as p where p.Ssn = w.Patient_ssn  and p.username='$username' and p.password='$password'");

	
echo "<tr>";
echo "</tr>";
while($row = mysql_fetch_array($result1))
  {	
  echo "<tr>";
  echo "<td>".Ward_number."</td>";	
  echo "<td>" . $row['Ward_number'] . "</td>";
  echo "</tr>";
  echo "<tr>";		
  echo "<td>".Ward_charges."</td>";
  echo "<td>" . $row['Ward_charges'] . "</td>";
  echo "</tr>";
 echo "<tr>";		
  echo "<td>".Ward_status."</td>";
  echo "<td>" . $row['Ward_status'] . "</td>";
  echo "</tr>";
  }


$result2 = mysql_query("select * from Pathology_test as pa , Patient as p where p.Ssn = pa.Patient_ssn and p.username='$username' and p.password='$password' ");

while($row = mysql_fetch_array($result2))
  {	
  echo "<tr>";
  echo "<td>".Test_id."</td>";	
  echo "<td>" . $row['Test_id'] . "</td>";
  echo "</tr>";
  echo "<tr>";		
  echo "<td>".Test_fees."</td>";
  echo "<td>" . $row['Test_fees'] . "</td>";
  echo "</tr>";

 if($row['Ecg'] != NULL)
{	
 echo "<tr>";		
  echo "<td>".Ecg."</td>";
  echo "<td>" . Yes . "</td>";
  echo "</tr>";

}

 if($row['Urine_test'] != NULL)
{	
 echo "<tr>";		
  echo "<td>".Urine_test."</td>";
  echo "<td>" . Yes . "</td>";
  echo "</tr>";

}

if($row['X_ray'] != NULL)
{	
 echo "<tr>";		
  echo "<td>".X_ray."</td>";
  echo "<td>" . Yes . "</td>";
  echo "</tr>";

}

if($row['Blood_test'] != NULL)
{	
 echo "<tr>";		
  echo "<td>".Blood_test."</td>";
  echo "<td>" . Yes . "</td>";
  echo "</tr>";

}

 }

echo "</table>";
echo "</center>"; 


            //    echo "Hello ".$_SESSION["username"]."!";
       //         header("location:patient_info.php");
}
	else
{
     //   echo "Invalid Username and/or Password.";
	header("location:index_patient.php");
                
}

?>
</body>
</html>

