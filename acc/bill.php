<?php
$con = mysql_connect("localhost","root","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("hos", $con);

$var = 0 ;
if ($_POST['submitted']==1) {  
    $errorMsg = ""; // error messages variable  
    if (!empty($_POST['patient_ssn'])){  // check if title was entered
        $title = $_POST['username']; 
    }  
    else{  
        $errorMsg = "You must enter patient_ssn";  // and if not - add error message
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

echo $va;

if($va == 0)
{
$sql="INSERT INTO Receipt (Receipt_id,Patient_ssn,Medicine_fees,Doctor_fees)
VALUES
('$_POST[receipt_id]', '$_POST[patient_ssn]', '$_POST[medicine_fees]', '$_POST[doctor_fees]')";


 if (mysql_query($sql,$con) == TRUE )
  {
	echo ' <script type="text/javascript">
             alert("'.$error.'");
	     setTimeout(function() {
    window.top.location = "index_staff1.php";
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
//header("location:index_staff.php");



/*$sql="INSERT INTO Patient (Name, Sex ,  Ssn , Age, Address ,Username , Password)
VALUES
('$_POST[name]', '$_POST[sex]', '$_POST[ssn]', '$_POST[age]','$_POST[address]','$_POST[username]','$_POST[password]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

header("location:index_staff.php");*/

	
mysql_close($con);
?> 
