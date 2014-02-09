<?php
$con = mysql_connect("localhost","root","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("hos", $con);




$sql="INSERT INTO Department (Dept_id,Dept_number,Dept_name,Hod_ssn)
VALUES
('$_POST[dept_id]' , '$_POST[dept_number]', '$_POST[dept_name]' , '$_POST[hod_ssn]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

header("location:index_staff.php");

	
mysql_close($con);
?> 
