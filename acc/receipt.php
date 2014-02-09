<html>
<body>

<h3>
<p style="text-align:right" align="top">
<a href ="../logout.php" style="text-decoration:none">
logout</a>
</p>
</h3>

<?php

        require_once("../dbconnect.php"); //Include Database Connection Script
        session_start();
        
        //Check Fields
        if (empty($_POST["patient_ssn"])) {
          //      echo "Please Fill Out All Fields";
		header("location:receipt.html");
                exit;
        }
        
        $username = mysql_real_escape_string($_POST["patient_ssn"]); //Escape Username
       
	$sql = "SELECT * FROM Receipt WHERE patient_ssn='$username'";
        $result = mysql_query($sql);
        if (mysql_num_rows($result) == 1) {
                session_register("patient_ssn");
                $_SESSION["patient_ssn"] = $username;



echo "<center>";
echo "<table border='0'>";
echo "<caption>" . RECEIPT_DETAILS ."</caption>";
echo "<tr>";
echo "</tr>";
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>".Receipt_id."</td>";	
  echo "<td>" . $row['Receipt_id'] . "</td>";
  echo "</tr>";
  echo "<tr>";		
  echo "<td>".Ssn."</td>";
  echo "<td>" . $row['Patient_ssn'] . "</td>";
  echo "</tr>";

$f1 = $row['Medicine_fees'];
echo "<tr>";		
  echo "<td>".Medicine_fees."</td>";
  echo "<td>" . $row['Medicine_fees'] . "</td>";
  echo "</tr>";

$f2 = $row['Doctor_fees'];
echo "<tr>";		
  echo "<td>".Doctor_fees."</td>";
  echo "<td>" . $row['Doctor_fees'] . "</td>";
  echo "</tr>";

  }

$result1 = mysql_query(" select w.Ward_charges from Ward as w , Patient as p , Receipt as r  where r.Patient_ssn = '$username' AND r.Patient_ssn = p .Ssn AND p.Ssn = w.Patient_ssn");

	
echo "<tr>";
echo "</tr>";
while($row = mysql_fetch_array($result1))
  {	
$f3 = $row['Ward_charges'];
  echo "<tr>";		
  echo "<td>".Ward_charges."</td>";
  echo "<td>" . $row['Ward_charges'] . "</td>";
  echo "</tr>";
 
  }


$result2 = mysql_query( " select t.Test_fees from Pathology_test as t, Patient as p , Receipt as r  where r.Patient_ssn = '$username' and r.Patient_ssn = p .Ssn AND p.Ssn = t.Patient_ssn  ");

while($row = mysql_fetch_array($result2))
  {	
   
$f4 = $row['Test_fees'];
  echo "<tr>";		
  echo "<td>".Test_fees."</td>";
  echo "<td>" . $row['Test_fees'] . "</td>";
  echo "</tr>";

 }

$total = $f1 + $f2 + $f3 + $f4;
echo "</table>";
echo "</center>"; 

echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";

echo "<h3 text align = center >";
echo "TOTAL FEES :- " ;
echo "$total";
echo "</h3>";

        
}
	else
{
    
	header("location:receipt.html");
                
}

?>
</body>
</html>

