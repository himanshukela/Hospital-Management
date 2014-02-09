<?php
$con = mysql_connect("localhost","root","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$name = '12';
mysql_select_db("hos", $con);
?>
