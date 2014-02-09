<?php
$con = mysql_connect("localhost","root","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("hos", $con);



$sql="INSERT Expenditure (Exp_id,Amount,exp_type)
VALUES
('$_POST[exp_id]', '$_POST[amount]' , '$_POST[exp_type]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

header("location:index_staff1.php");

	
mysql_close($con);

?> 
