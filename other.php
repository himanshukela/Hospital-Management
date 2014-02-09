<?php
$con = mysql_connect("localhost","root","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("hos", $con);



$sql="INSERT INTO Working_staff (Name, Salary , Age , Sex , Ssn ,Address , Dept  ,Username , Password)
VALUES
('$_POST[name]', '$_POST[salary]' , '$_POST[age]', '$_POST[sex]', '$_POST[ssn]','$_POST[address]', '$_POST[dept]' ,'$_POST[username]','$_POST[password]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

header("location:index_staff.php");

	
mysql_close($con);
?> 
