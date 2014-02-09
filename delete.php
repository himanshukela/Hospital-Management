<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>Patient Information</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/styles2.css" rel="stylesheet" type="text/css" />
<!--<title>Simple Sign Up Form by PremiumFreeibes.eu</title>-->

<link rel="stylesheet" type="text/css" href="./css/style1.css">
<style>
body
{
background-color:#d0e4fe;
background-image:url('images/background.jpg');
}
</style>

</head>

<body>



<?php

        require_once("dbconnect.php"); //Include Database Connection Script
        session_start();
        
        //Check Fields
        if (empty($_POST["patient_ssn"])) {
          //      echo "Please Fill Out All Fields";
		header("location:receipt1.html");
                exit;
        }
        
        $username = mysql_real_escape_string($_POST["patient_ssn"]); //Escape Username


	
	$sql = "SELECT * FROM Patient WHERE Ssn='$username'";
        $result = mysql_query($sql);
        if (mysql_num_rows($result) == 1) {
                session_register("patient_ssn");
                $_SESSION["patient_ssn"] = $username;

mysql_query("set foreign_key_checks = 0");
mysql_query("delete FROM Patient WHERE Ssn='$username'");
mysql_query("delete FROM Ward WHERE patient_ssn='$username'");
mysql_query("delete FROM Pathology_test WHERE patient_ssn='$username'");
mysql_query("delete FROM Receipt WHERE patient_ssn='$username'");

mysql_query("set foreign_key_checks = 1");        

$error = "Successful";
echo ' <script type="text/javascript">
             alert("'.$error.'");
	     setTimeout(function() {
    window.top.location = "index_staff.php";
}, 10);	
        </script>
        ';
	
	
}
	
?>


</body>
</html>
