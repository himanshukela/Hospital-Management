<?php
$con = mysql_connect("localhost","root","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("hos", $con);



$sql="INSERT INTO Ward (Ward_number,Ward_charges,Patient_ssn,Ward_status)
VALUES
('$_POST[ward_number]', '$_POST[ward_charges]' , '$_POST[patient_ssn]', '$_POST[ward_status]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

header("location:index_staff.php");

	
mysql_close($con);
?> 
