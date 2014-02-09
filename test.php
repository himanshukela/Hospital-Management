<?php
$con = mysql_connect("localhost","root","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("hos", $con);

$sql="INSERT INTO Pathology_test (Test_id,Patient_ssn,Test_fees,Ecg,X_ray,Urine_test,Blood_test)
VALUES
('$_POST[test_id]', '$_POST[patient_ssn]' , '$_POST[test_fees]', '$_POST[ecg]', '$_POST[x_ray]','$_POST[urine_test]','$_POST[blood_test]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

header("location:index_staff.php");

	
mysql_close($con);
?> 


