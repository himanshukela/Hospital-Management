<?php session_start(); ?>
<html>
<head>
<link href="styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
echo "Welcome, <b>" . $_SESSION["username"] . "</b><p/>";
$con = mysql_connect("localhost","root","password"); 
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("hos",$con);
$table_name=$_POST["table_name"];
//echo $table_name;
//echo $POST["table_name"];
$sql="Select * from " . $table_name;
$result=mysql_query($sql);
if(!$result)
	echo die(mysql_error());
//echo "fine till here.";
//echo mysql_field_name($result,0);
//echo "Select the table:-";
//echo "<form  action='view_table.php' method='post'>";
//echo "<select name='table_name'>";
echo "<table>";
for($i=0;$i<mysql_num_fields($result);$i++)
{
	echo "<th class='spec'>" . mysql_field_name($result,$i) . "</th>";
}
$count=0;
while($row=mysql_fetch_array($result))
{
	$count++;
/*	echo $row["name"] . " " . $row["number"];
	echo "<br/>";*/
	echo "<tr>";
	for($i=0;$i<mysql_num_fields($result);$i++)
	{
		if($count%2==0)
			echo "<td>" . $row[mysql_field_name($result,$i)] . "</td>";
		else
			echo "<td class='alt'>" . $row[mysql_field_name($result,$i)] . "</td>";
	}
//	echo "<tr>";
//	echo "<td>" . $row['name'] . "</td>";
//	echo "<td>" . $row['number'] . "</td>";
	echo "</tr>";
//	echo "<option value=" . $row[mysql_field_name($result,0)] . ">" . $row[mysql_field_name($result,0)] . "</option>";
}
echo "</table>";
//echo "</select>";
//echo "<p/>";
//echo "<input type='submit' value='submit'>";
//echo "</form>";

mysql_close($con);
?>
</html>
</body>
