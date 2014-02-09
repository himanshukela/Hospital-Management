<?php include 'in.php';


$sql="INSERT INTO Medicine (Name,Rate,Sample_number,Expiry_date)
VALUES
('$_POST[name]', '$_POST[rate]' , '$_POST[sample_number]', '$_POST[expiry_date]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

header("location:index_staff.php");

	
mysql_close($con);
?> 
