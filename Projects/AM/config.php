<!-- CONFIG.PHP
	 Created On : 15/01/2017 -->
<?php
$username="root";
$password="";
$host="localhost";
$database="attendance_manager";
$con=mysql_connect("$host","$username","$password") or die("Server Error");
mysql_select_db("$database") or die("Database error");
?>