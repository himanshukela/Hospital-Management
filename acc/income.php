<?php
$con = mysql_connect("localhost","root","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("hos", $con);



$sql="INSERT INTO Income (Income_id,Amount,Income_type)
VALUES
('$_POST[income_id]', '$_POST[amount]' , '$_POST[income_type]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

header("location:index_staff1.php");

	
mysql_close($con);

?> 
