<!-- SAVE.PHP
	 Created On : 26/02/2017 -->

<?php
include 'config.php';

$uname=$_POST['username'];
$pass=$_POST['password'];


if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password']))
{
	$sql1="select * from student where student_id='".$_POST['username']."' and student_pass='".$_POST['password']."' ";
	$result=mysql_query($sql1);
	$num1=mysql_num_rows($result);
	while($row = mysql_fetch_array($result)){
 		$student_name=$row["student_name"];
		$student_sap=$row["student_id"];
	}
	if ($num1) {
		session_start();
		$_SESSION['student_name']=$student_name;
		$_SESSION['sap']=$student_sap;	
		header("Location:student.php");
	} else {
		$msg = 'Wrong username or password';
		echo $msg;
	}
}
?>
