<!-- Created BY : Kshitij Shah
     student.PHP 
     Created On : 15/01/2017 -->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendance Manager</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <script src="js/bootstrap.js"></script>
  <script>$('.dropdown').dropdown();</script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
       include 'config.php';
       session_start();
       if (isset($_SESSION['sap'])) {
          $student_name=$_SESSION['student_name'];
          $sap=$_SESSION['sap'];
       }
       else{
        header('Location:index.php');
       }
       //$sap=$_GET['link1'];
       $sql="select * from attendance where student_id=".$sap;
       $result=mysql_query($sql);
       $num=mysql_num_rows($result);
       $subject_id[]=Array();
       $percent[]=Array();
       for ($i=0; $i <$num ; $i++) { 
        while($row = mysql_fetch_array($result)){
        $i++;
        $subject_id[$i]=$row["subject_id"];
        $percent[$i]=$row["percent"];
        if ($percent[$i]==0) {
          $percent[$i]=100;
          $y=0;
        }
        else{
          $y=100-$percent[$i];
        }
        echo "
        <script type=\"text/javascript\">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var options = {
            pieHole: 1,
            pieSliceTextStyle: {
              color: 'black',
            },
            legend: 'none'
          };
          var chart = new google.visualization.PieChart(document.getElementById('".$subject_id[$i]."'));
          var data = google.visualization.arrayToDataTable([
            ['Present', 'Absent'],
            ['Present',     ".$percent[$i]."],
            ['Absent',     ".$y."],
          ]);
          chart.draw(data, options);
        }</script>";
      }
    }
    ?>
  <style>
    body{
      background-color: #eee;
      color : black !important;
    }
    .subject-box{
      /*background-color: #222;*/
      color:white;
      border:5px solid white;
    }
    .subject_name{
      font-size: 19px;
      color : black !important;

    }
  </style>
  
</head>
<body>


<!-- Headers Section -->
  <nav class="navbar navbar-inverse navbar-toggleable-md navbar-light bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Attendance Manager</a>
    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto mt-2 mt-md-0">
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Get one for my School as well.</a>
          </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="fa fa-user-circle fa-lg"></span>  
              <?php
                echo $student_name;
              ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item disabled" href="#">Profile</a>
              <a class="dropdown-item disabled" href="#">Account Settings</a>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
        </ul>
    </div>
  </nav>

<section>
<div class="container">
  <div class="row">
  <?php
    include 'config.php';
    $sql="select subject.subject_name,attendance.student_id,attendance.subject_id from attendance,subject where attendance.subject_id=subject.subject_id AND student_id=".$sap;
    $result=mysql_query($sql);
    $num=mysql_num_rows($result);
    $subject_name[]=Array();
    $subject_id[]=Array();
    for ($j=$i-1; $j >0 ; $j--) {
      $j++;
     while($row = mysql_fetch_array($result)){
      $subject_name[$i]=$row["subject_name"];
      $subject_id[$i]=$row["subject_id"];
      $j--;
      echo "<div class=\"container subject-box col-md-4\"> 
      <div id=\"".$subject_id[$i]."\" style=\"width: 340px; height: 250px;\"></div>
      <h3>Subject Name:<span class=\"subject_name\">&nbsp&nbsp&nbsp&nbsp<br>".$subject_name[$i]."</span></h3>
    </div>";
    }
  }
  ?>
  </div>
</div>
</section>


</body>
</html>