<!--
	Created By : Nishit Mehta
	NAME : LOGOUT.PHP
	DATE : 11/03/2017
	Project Name : Attendance Manager
-->
<?php
	session_start();
	session_unset();
	session_destroy();
	header('Location:index.php');
?>