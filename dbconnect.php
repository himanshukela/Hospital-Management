<?php
mysql_connect("localhost", "root", "password") or die(mysql_error());
//echo "Connected to MySQL<br />";
mysql_select_db("hos") or die(mysql_error());
//echo "Connected to Database";
?>
