<?php
session_start();
if($_SESSION['username'] == "")
{
	 header("location:index_staff.php");
	exit();
} 
?>


<html>

<head>
<style type="text/css">
		table.db-table 		{ border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
		table.db-table th	{ background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
		table.db-table td	{ padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
	</style>
<style>
body
{
background-color:#d0e4fe;
background-image:url('images/background.jpg');
}
h2
{
text-align:center;
}
p
{
text-align:center;
}
</style>
</head>

<body>

<h2>
Medicines in <font color="red">red</font> are expired
</h2>


<h3 >
<p style="text-align:right">
<?php echo date('Y-m-d - H:ia');
$date = date('Y-m-d'); 
echo "<br />"; 
$weekday = date('l', strtotime($date));
 
echo $weekday; // SHOULD display Wednesday
 ?>
</p>

</h3>

<h3>
<p style="text-align:right" align="top">
<a href ="index_staff.php" style="text-decoration:none">
Go to Admin Page</a>
</p>
</h3>


<?php

/* connect to the db */
$connection = mysql_connect('localhost','root','password');
mysql_select_db('hos',$connection);

	
/*$table = $_POST["tables"];
	  

 echo '<h3>',$table,'</h3>';*/

//echo $table;
  $result2 = mysql_query('SELECT * FROM Medicine' ) or die('cannot show columns from Medicine');

//echo $result2;
 
//echo mysql_num_rows($result2);
$co = 0 ;  
$cou = 0;
$p = array();
if(mysql_num_rows($result2)) 
{
//	echo 'We r here';
	$fields_num = mysql_num_fields($result2);
//echo $fields_num,'<br />';
    echo '<table cellpadding="0" cellspacing="0" class="db-table" align="center">';
echo '<tr>';
for($i=0; $i<$fields_num; $i++)
{
    $field = mysql_fetch_field($result2);
    echo "<th>{$field->name}</th>";
}

//echo '</tr>';
   // echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default<th>Extra</th></tr>';
    while($row2 = mysql_fetch_row($result2)) {
	$co = 0 ;
	$cou++;	  		 
      foreach($row2 as $key=>$value) {
	$co++;
	if($co == 4)
	{
$todays_date = date("Y-m-d"); 
$today = strtotime($todays_date); 
$expiration_date = strtotime($value); 
if ($expiration_date > $today) { $valid = "yes"; } 
else { $valid = "no"; } 

	
if($valid == "no")
{ array_push($p,$cou);}

}

}

}

$co = 0;
$i = 0 ;
$result1 = mysql_query('SELECT * FROM Medicine' ) or die('cannot show columns from Medicine');

echo '</tr>';
  
    while($row1 = mysql_fetch_row($result1)) {
	$co++;
	if($p[$i] == $co)
	  	{
			echo "<tr bgcolor=\"#FF0000\">\n";
			$i++;	
		}
	else{echo '<tr>';}   
     
      foreach($row1 as $key=>$value) {
        echo '<td>',$value,'</td>';
      }
      echo '</tr>';
    }
    echo '</table><br /><br />';
  }

else
{
	echo 'The selected table is empty';
}
?>
<br/>
<br/>
<p>
<a href ="medicine_delete.html" style="text-decoration:none" >
<input type="button" size="123" name="Go" id="Go" value="Delete Medicine" /></a>
</p>
</body>
</html>
