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
$result=mysql_query("Show TABLES");
echo "Select the table:-";
echo "<form  method='post'>";
echo "<select name='table_name'>";
while($row=mysql_fetch_array($result))
{
	echo "<option value=" . $row[mysql_field_name($result,0)] . ">" . $row[mysql_field_name($result,0)] . "</option>";
}
echo "</select>";
echo "<p/>";
//echo "Action: ";
/*echo "<select namie='action'>
<option value='view'> View Records</option>
<option value='add'> Add Records</option>
</select>";*/
echo "<input type='hidden' name='db_name' value=" . $_POST["db_name"] . ">";
echo "<input type='submit' value='View Records' name='View Records' onclick='javascript: form.action=\"view_table.php\";' >";
if($_SESSION["username"]=="admin_jrs")
echo "<input type='submit' value='Edit Permissions' name='Select Permissions' onclick='javascript: form.action=\"select_permissions.php\";' >";
echo "</form>";

mysql_close($con);
?>
</html>
</body>
