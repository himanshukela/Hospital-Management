<?php
$con = mysql_connect("localhost","root","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("hos", $con);


if ($_POST['submitted']==1) {  
    $errorMsg = ""; // error messages variable  
    if (!empty($_POST['username'])){  // check if title was entered
        $title = $_POST['username']; 
    }  
    else{  
        $errorMsg = "You must enter username";  // and if not - add error message
    }  
    if ($_POST['password']){  // check if content was entered 
        $textentry = $_POST['password'];  
    }  
    else{  
        if (!empty($errorMsg)){ // if there is already an error, add next error  
            $errorMsg = $errorMsg . " & password";  
        }else{  
            $errorMsg = "You must enter password";  
        }  
    }

	
    $va = 0;
     $error = "Successful!";	
    if (!empty($errorMsg)){    
         $va = 1;                            // if there is errors display them
        echo ' <script type="text/javascript">
             alert("'.$errorMsg.'");	
        </script>
        ';

	echo 
"Press Back To go to login form ";
    }
	
	    
}


if($va == 0)
{
$sql="INSERT INTO Doctor (Name, Salary , Age , Sex , Ssn ,Address , Speciality , Dept , Patients_ssn ,Username , Password)
VALUES

('$_POST[name]', '$_POST[salary]' , '$_POST[age]', '$_POST[sex]', '$_POST[ssn]','$_POST[address]','$_POST[speciality]', '$_POST[dept]' , 'NULL','$_POST[username]','$_POST[password]')";

 if (mysql_query($sql,$con) == TRUE )
  {
	echo ' <script type="text/javascript">
             alert("'.$error.'");
	     setTimeout(function() {
    window.top.location = "index_staff.php";
}, 10);	
        </script>
        ';
	
  }


else if (!mysql_query($sql,$con))
  {

	 $p = 'Error: ' . mysql_error();
 	
	 echo ' <script type="text/javascript">
             alert("'.$p.'");	
        </script>
        ';

  }


}




/*if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

header("location:index_staff.php");
*/
	
mysql_close($con);

?> 
