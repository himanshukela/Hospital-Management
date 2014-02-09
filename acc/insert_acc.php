<?php


        require_once("../dbconnect.php"); //Include Database Connection Script
        session_start();



	$error = "PLease Enter Proper username and/or password";
        
     $username = mysql_real_escape_string($_POST["username"]); //Escape Username
        $password = mysql_real_escape_string($_POST["password"]); //EScape Password
       	
	$sql = "SELECT * FROM Accountant WHERE username='$username' and password='$password'";
        $result = mysql_query($sql);

	if (mysql_num_rows($result) == 0)
	{
		echo ' <script type="text/javascript">
             alert("'.$error.'");	
        </script>
        ';	

		echo 
"Press Back To go to login form ";

	
	}
 
       else if (mysql_num_rows($result) == 1) {
                session_register("username");
                $_SESSION["username"] = $username;
            //    echo "Hello ".$_SESSION["username"]."!";
                header("location:index_staff1.php");
        }

	
		/*else
{
     //   echo "Invalid Username and/or Password.";
	header("location:index_admin.php");
                
}*/

?>
