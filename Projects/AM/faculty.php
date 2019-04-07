<?php
    include ('config.php');
    session_start();
    if (isset($_SESSION['fid'])) {
      $fid=$_SESSION['fid'];
      $faculty_name=$_SESSION['fname'];
    }
    else{
      header('Location:index.php');
    }
    $subject_n=$_GET['link4'];
    $sql_name="select * from subject where subject_name='".$subject_n."'";
    $result=mysql_query($sql_name);
    $row=mysql_fetch_array($result);
    $subjectid=$row["subject_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript">
    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 800);
    }

    function showPage() {
      document.getElementById("loader").style.display = "none";
      document.getElementById("main_body").style.display = "block";
}
</script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mark My Attendance - Attendance Manager</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
  <style type="text/css">
    #loader {
      position: absolute;
      left: 50%;
      top: 50%;
      z-index: 1;
      width: 150px;
      height: 150px;
      margin: -75px 0 0 -75px;
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      width: 120px;
      height: 120px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
    }
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    #main_body{
      display: none;
    }
  </style>
</head>
<body onload="myFunction()" style="margin:0;">

  <div id="loader"></div>
  <!-- Headers Section -->
  <nav class="navbar navbar-inverse navbar-toggleable-md navbar-light bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Attendance Manager</a>
    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto mt-2 mt-md-0">
         <li class="nav-item">
            <a class="nav-link" href="gpa_calculator.html">GPA Calculator</a>
          </li>
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
                echo $faculty_name;
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
  <div id="main_body">
  

<section id="subjectContent">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
        <tr>         
          <th>Subject Class</th>
          <th>Lectures Conducted</th>
          <th>Batch</th>
          <th>Mark Attendance</th>
        </tr>
        <?php
            include 'config.php';
            $option[]=Array();
            $link3=$_GET['link3'];
            $option[$link3]='Select';
            $link2=$_GET['link2'];
            if ($link2=='') {
              $option[$link3]='Select';
            }
            elseif ($link2=='Theory') {
              $option[$link3]='Theory';
            }
            elseif ($link2=='Practical - A') {
              $option[$link3]='Practical - A';
            }
            elseif ($link2=='Practical - B') {
              $option[$link3]='Practical - B';
            } 
            elseif ($link2=='Practical - C') {
              $option[$link3]='Practical - C';
            }
            elseif ($link2=='Electives - OR') {
              $option[$link3]='Electives - OR';
            }
            elseif ($link2=='Electives - PCD') {
              $option[$link3]='Electives - PCD';
            }
            elseif ($link2=='Electives - HCI') {
              $option[$link3]='Electives - HCI';
            }
            $sql="select * from subject where faculty_id=".$fid;
            $result=mysql_query($sql);
            $num=mysql_num_rows($result);
            $subject_name[]=Array();     
            $j=1;
            for ($i=0; $i <$num ; $i++) { 
                while($row = mysql_fetch_array($result)){
                    $j++;
                    $subject_name[$i]=$row["subject_name"];
                    if ($j==$link3) {
                      echo ' <tr>
                            <td>
                              '.$subject_name[$i].'
                            </td>
                            <td>0</td>
                            <td>
                              <div class="dropdown">
                                <a href="a href="faculty.php?link2=Theory&link3='.$j.'&link4='.$subject_name[$i].'" class="dropdown-toggle" data-toggle="dropdown" >
                                <span id="'.$j.'" class="abc">'.$option[$link3].'</span>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu '.$j.'"" onclick="drop(event);">
                                  <li select value="theory"><a href="faculty.php?link2=Theory&link3='.$j.'&link4='.$subject_name[$i].'">Theory</a></li>
                                  <li class="divider"></li>
                                  <li value="Practical A"><a href="faculty.php?link2=Practical - A&link3='.$j.'&link4='.$subject_name[$i].'">Practical - A</a></li>
                                  <li value="Practical B"><a href="faculty.php?link2=Practical - B&link3='.$j.'&link4='.$subject_name[$i].'">Practical - B</a></li>
                                  <li value="Practical C"><a href="faculty.php?link2=Practical - C&link3='.$j.'&link4='.$subject_name[$i].'">Practical - C</a></li>
                                  <li class="divider"></li>
                                  <li value="Elective PCD"><a href="faculty.php?link2=Electives - PCD&link3='.$j.'&link4='.$subject_name[$i].'">Electives - PCD</a></li>
                                  <li value="Elective OR"><a href="faculty.php?link2=Electives - OR&link3='.$j.'&link4='.$subject_name[$i].'">Electives - OR</a></li>
                                  <li value="Elective HCI"><a href="faculty.php?link2=Electives - HCI&link3='.$j.'&link4='.$subject_name[$i].'">Electives - HCI</a></li>
                                </ul>
                              </div>
                                <script>
                                    $(".'.$j.' a").click(function(){
                                     $("#'.$j.'").text($(this).text());
                                     });
                                </script>
                                  </td>
                                  <td>';
                                  if ($option[$link3]!='Select') {
                                      echo '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="fun()" data-target="#myModal">
                                        Mark attendance
                                      </button>
                                    </td>
                                  </tr>';
                    }
                  }
                    else
                    {
                      echo '<tr>
                              <td>
                                '.$subject_name[$i].'
                              </td>
                              <td>0</td>
                              <td>
                                <div class="dropdown">
                                  <a class="dropdown-toggle" data-toggle="dropdown">  
                                  <span id="'.$j.'" class="abc">Select</span>
                                  <span class="caret"></span></a>
                                  <ul class="dropdown-menu '.$j.'"" onclick="drop(event);">
                                    <li select value="theory"><a href="faculty.php?link2=Theory&link3='.$j.'&link4='.$subject_name[$i].'">Theory</a></li>
                                    <li class="divider"></li>
                                    <li value="Practical A"><a href="faculty.php?link2=Practical - A&link3='.$j.'&link4='.$subject_name[$i].'">Practical - A</a></li>
                                    <li value="Practical B"><a href="faculty.php?link2=Practical - B&link3='.$j.'&link4='.$subject_name[$i].'">Practical - B</a></li>
                                    <li value="Practical C"><a href="faculty.php?link2=Practical - C&link3='.$j.'&link4='.$subject_name[$i].'">Practical - C</a></li>
                                    <li class="divider"></li>
                                    <li value="Elective PCD"><a href="faculty.php?link2=Electives - PCD&link3='.$j.'&link4='.$subject_name[$i].'">Electives - PCD</a></li>
                                    <li value="Elective OR"><a href="faculty.php?link2=Electives - OR&link3='.$j.'&link4='.$subject_name[$i].'">Electives - OR</a></li>
                                    <li value="Elective HCI"><a href="faculty.php?link2=Electives - HCI&link3='.$j.'&link4='.$subject_name[$i].'">Electives - HCI</a></li>
                                  </ul>
                                </div>
                                  <script>
                                      $(".'.$j.' a").click(function(){
                                       $("#'.$j.'").text($(this).text());
                                       });
                                  </script>
                                    </td>
                                    <td>';
                                }
                      }
            } 
        ?>
        </table>
      </div>
    </div>
  </div>
</section>
</div>  
<?php
  include 'config.php';
?>
    <script type="text/javascript">
       function checkAll(ele) {
       var checkboxes = document.getElementsByTagName('input');
       if (ele.checked) {
           for (var i = 0; i < checkboxes.length; i++) {
               if (checkboxes[i].type == 'checkbox') {
                   checkboxes[i].checked = true;
               }
           }
       } else {
           for (var i = 0; i < checkboxes.length; i++) {
               console.log(i)
               if (checkboxes[i].type == 'checkbox') {
                   checkboxes[i].checked = false;
               }
           }
      }
    }
    </script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel">Mark Attendance</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
          <tr>         
            <th>Roll No.</th>
            <th>Student Name</th>
            <th><label>
                  <input type="checkbox" onchange="checkAll(this)" name="chk[]" value="1">
                  Attendance
                </label>
            </th>
          </tr>
          <?php
          echo "<form method=\"POST\" action=\"update.php?link=".$subjectid."&link1=".$faculty_name."&link2=".$fid."\">";
            include 'config.php';
            $v= $_GET['link2'];
            switch ($v) {
              case 'Practical - A':
              $v=1;          
              $sql1="select * from student where batch_code = ".$v;
              break;
              case 'Practical - B':
              $v=2;
              $sql1="select * from student where batch_code = ".$v;
              break;
              case 'Practical - C':
              $v=3;
              $sql1="select * from student where batch_code = ".$v;
              break;
              case 'Electives - PCD':
              $v=3;
              $sql1="select * from student where elective_code = ".$v;
              break;
              case 'Electives - OR':
              $v=1;
              $sql1="select * from student where elective_code = ".$v;
              break;
              case 'Electives - HCI':
              $v=2;
              $sql1="select * from student where elective_code = ".$v;
              break;
              default:
              $sql1="select * from student";
              break;
            }
            $result=mysql_query($sql1);
            $num=mysql_num_rows($result);
            $student_name[]=Array();
            $student_id[]=Array();
            for ($i=0; $i <$num ; $i++){
                while($row = mysql_fetch_array($result)){
                    $student_name[$i]=$row["student_name"];
                    $student_rollno[$i]=$row["student_rollno"];
                    $student_id[$i]=$row["student_id"];
                    echo '<tr>
                            <td>'.$student_rollno[$i].'</td>
                            <td>'.$student_name[$i].'</td>
                            <td>
                                <input class="checkbox" name="mark[]" type="checkbox" value="'.$student_id[$i].'">
                            </td>
                          </tr>';
                }
            }
        ?>
        </table>
      </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">Submit</button>
          </div>
       </form>
    </div>
  </div>
</div>



</table></div></div></div></div></td></tr></table></div></div></div></section>





  <!-- Footer Section -->
  <nav class="navbar fixed-bottom navbar-light bg-faded text-center" style="margin-top:50px;font-size:0.8em;">
    Copyright &copy; 2017 | Design : NKS 
  </nav>


  <script src="js/jquery.min.js"></script>
  <script src="js/teather.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
      $('#myTab a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
    $('#myTab a[href="#teacher"]').tab('show') // Select tab by name
    $('#myTab a:first').tab('show') // Select first tab
    $('#myTab a:last').tab('show') // Select last tab

  </script>
</body>
</html>