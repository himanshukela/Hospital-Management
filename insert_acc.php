<html>
<head>
<style>
body
{
background-image:url('images/background.jpg');
}
</style>
</head>
<body>
<?php
$con = mysql_connect("localhost","root","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("hos", $con);

$sql="INSERT INTO Doctor (Name, Salary , Age , Sex , Ssn ,Address , Speciality , Dept , Patients_ssn ,Username , Password)
VALUES
('$_POST[name]', 'NULL' , '$_POST[age]', '$_POST[sex]', '$_POST[ssn]','$_POST[address]','$_POST[speciality]', 'NULL' , 'NULL','$_POST[username]','$_POST[password]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
	
mysql_close($con);
?> 
</body>
</html>
