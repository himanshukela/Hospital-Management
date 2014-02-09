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
		header("location:index_doctor.php");
                exit;
        }
        
        $username = mysql_real_escape_string($_POST["username"]); //Escape Username
        $password = mysql_real_escape_string($_POST["password"]); //EScape Password
       // $password = sha1($password); //Convert Password To Sha1
	echo "\n";
      //  echo $username;
//	echo $password;	
 //       $sql = "SELECT * FROM Admin WHERE username=&#39;$username&#39; and password=&#39;$password&#39;";	
	$sql = "SELECT * FROM Doctor WHERE username='$username' and password='$password'";
        $result = mysql_query($sql);
        if (mysql_num_rows($result) == 1) {
                session_register("username");
               $_SESSION["username"] = $username;
		
echo "<center>";
echo "<table border='2' align='center'>";
echo "<caption>"."<h1>"."<u>". DOCTOR." ".DETAILS ."</u>"."</h1>"."</caption>";
echo "<tr>";
echo "</tr>";
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>".Name."</td>";	
  echo "<td>" . $row['Name'] . "</td>";
  echo "</tr>";
  echo "<tr>";	
 echo "<tr>";
  echo "<td>".Salary."</td>";	
  echo "<td>" . $row['Salary'] . "</td>";
  echo "</tr>";
  echo "<tr>";	
 echo "<tr>";
  echo "<td>".Age."</td>";	
  echo "<td>" . $row['Age'] . "</td>";
  echo "</tr>";
  echo "<tr>";		
  echo "<td>".Sex."</td>";
  echo "<td>" . $row['Sex'] . "</td>";
  echo "</tr>";
echo "<tr>";		
  echo "<td>".Ssn."</td>";
  echo "<td>" . $row['Ssn'] . "</td>";
  echo "</tr>";
echo "<tr>";		
  echo "<td>".Address."</td>";
  echo "<td>" . $row['Address'] . "</td>";
  echo "</tr>";

echo "<tr>";		
  echo "<td>".Speciality."</td>";
  echo "<td>" . $row['Speciality'] . "</td>";
  echo "</tr>";

echo "<tr>";		
  echo "<td>".Dept_Doctor."</td>";
  echo "<td>" . $row['Dept'] . "</td>";
  echo "</tr>";
  }

echo"<tr>";
echo"</tr>";

$result1 = mysql_query("select * from Department as de , Doctor as d where d.Dept = de.Dept_id and d.username='$username' and d.password='$password'");

	
echo "<tr>";
echo "</tr>";
while($row = mysql_fetch_array($result1))
  {
echo "<tr>";		
  echo "<td>".Dept_name."</td>";
  echo "<td>" . $row['Dept_name'] . "</td>";
  echo "</tr>";	
  echo "<tr>";
  echo "<td>".Dept_id."</td>";	
  echo "<td>" . $row['Dept_id'] . "</td>";
  echo "</tr>";
  echo "<tr>";		
  echo "<td>".Dept_number."</td>";
  echo "<td>" . $row['Dept_number'] . "</td>";
  echo "</tr>";
 
echo "<tr>";		
  echo "<td>".Hod_ssn."</td>";
  echo "<td>" . $row['Hod_ssn'] . "</td>";
  echo "</tr>";
 
  }

echo "</table>";
echo "</center>";

        //       echo "Hello ".$_SESSION["username"]."!";
        //        header("location:doctor_info.php");
		
        }
	else
{
     //   echo "Invalid Username and/or Password.";
	header("location:index_doctor.php");
                
}

?>
</body>
</html>
