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

	
$row = mysql_fetch_array($result);


}

?>

<div id="content">
    <div id="leftPan">
      <div id="signup-form">
        
        
       <div id="signup-inner">
          <h2>Update Patient details<br/> </h2>            
            </div>

            
            <form id="send" action="patient.php" method="post" enctype="multipart/form-data">
            	
                <p>
                <label for="name">First Name </label>
                <input id="name" type="text" name="name" value="<?php echo $row['Name']?>" />
                </p>
	
		<p>	
                <label for="sex">Sex</label>
<?php if($row["Sex"]=="male") { ?>

		 <input type="radio" name="sex" value="male" checked="checked">Male 
		<input type="radio" name="sex" value="female">Female  
		</p>
<?php } else {?>

<input type="radio" name="sex" value="male">Male 
		<input type="radio" name="sex" value="female" checked="checked">Female  
		</p>
<?php } ?>
		<p>	
		<label for="ssn">Ssn(Cannot edit it)</label>
                <input id="ssn" type="text" name="ssn" readonly="readonly" value="<?php echo $row['Ssn']?>"/>
                </p-->

		
                <label for="age">Age</label>
                <input id="age" type="int" name="age" value="<?php echo $row['Age']?>" />
                </p>

 		
		<p>
               <label for="address">Address</label>
                <input id="address" type="text" name="address" value="<?php echo $row['Address']?>" />
                </p>   
           
                <!--p>
                <label for="username">Username</label-->
                <input id="username" type="text" name="username" value="<?php echo $row['Username']?>" />
                <!--/p-->

		<p>

                <label for="password">password </label>
                <input id="password" type="password" name="password" value="<?php echo $row['Password']?>" />
                </p>
                
                
                
 <?php 
mysql_query("set foreign_key_checks = 0");
mysql_query("delete FROM Patient WHERE Ssn='$username'");
mysql_query("set foreign_key_checks = 1");
?>      
                
	 <input type="hidden" name="submitted" value="1">  
                <p>

                <button id="submit" type="submit">Update</button>
                </p>
                
            </form>
            
		
            </div>
        
        <!--END #signup-inner -->
        </div>
        
    <!--END #signup-form -->   
    </div>

    </div>";



    <div id="rightPan">
      <div id="news">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><a href="#">s</a></p>
      </div>
      <div id="shows">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
    </div>

    <div class="clear" id="end"></div>

  </div>

 
</div>

</body>
</html>
