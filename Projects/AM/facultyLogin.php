<!-- SAVE.PHP
	 Created On : 26/02/2017 -->

<?php
include 'config.php';
$uname=$_POST['username'];

if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])){

	$sql1="select * from faculty where faculty_id='".$uname."' and faculty_pass='".$_POST['password']."' ";
	$result=mysql_query($sql1);
	$num1=mysql_num_rows($result);
 	while($row = mysql_fetch_array($result)){
 		$faculty_name=$row["faculty_name"];
	}
	if ($num1) {
		session_start();
		$_SESSION['fname']=$faculty_name;
		$_SESSION['fid']=$uname;	
		header("Location:faculty.php?link2=&link3=1&link4=");
		//header("Location:faculty.php?link=".$faculty_name."&link1=".$uname."&link2=&link3=1&link4=");
	} else {
		$msg ='Wrong username or password';
		echo $msg;
	}
} 

?>
