<!--
	CREATED By : Nishit Mehta
	NAME : UPDATE.PHP
	DATE : 22/02/2017
	Project Name : Attendance Manager
-->

<?php
	include 'config.php';
	$subject_id= $_GET['link'];
	$fn=$_GET['link1'];
	$fid=$_GET['link2'];
	$lectures_bunked[]=Array();
	$lectures_attended[]=Array();
	$total_lectures[]=Array();
	$percent[]=Array();
	$studentid[]=Array();
	$sql="UPDATE subject SET total_lectures=total_lectures+1 WHERE subject_id=".$subject_id;
	$sql1="UPDATE attendance SET total_lectures=total_lectures+1 WHERE subject_id=".$subject_id;
	$result=mysql_query($sql) or die("ERROR1");
	$result1=mysql_query($sql1) or die("ERROR2");
	if(!empty($_POST['mark'])) {
    foreach($_POST['mark'] as $check) {
			echo $check;
	        $sql2="UPDATE attendance SET lectures_attended=lectures_attended+1 WHERE subject_id=".$subject_id." AND student_id=".$check;
	        $result2=mysql_query($sql2) or die("ERROR3");
    	}
    	$sql3="select * from attendance where subject_id=".$subject_id;
	    $result3=mysql_query($sql3) or die("ERROR4");
	    $num=mysql_num_rows($result3);
	    $j=0;
	   	for ($i=0; $i<$num; $i++) {
	   		while ($row = mysql_fetch_array($result3)) {
	   			$j++;
	   			$studentid[$j]=$row["student_id"];
		   		$lectures_bunked[$j]=$row["lectures_bunked"];
		   		$lectures_attended[$j]=$row["lectures_attended"];
				$total_lectures[$j]=$row["total_lectures"];
				$lectures_bunked[$j]=$total_lectures[$j]-$lectures_attended[$j];
				$percent[$j]=$row["percent"];
				$percent[$j]=($lectures_attended[$j]/$total_lectures[$j])*100;
				$sql4='UPDATE attendance SET lectures_bunked='.$lectures_bunked[$j].',percent='.$percent[$j].' WHERE subject_id='.$subject_id.' AND student_id='.$studentid[$j];
				$result4=mysql_query($sql4) or die("ERROR5");
	   		}
	   	}
	}
	//UPDATE attendance SET lectures_attended=0,lectures_bunked=0,total_lectures=0,percent=0;
	header("Location:faculty.php?link=".$fn."&link1=".$fid."&link2=&link3=1&link4=");
?>