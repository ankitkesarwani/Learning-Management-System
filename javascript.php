<?php
  session_start();
  include_once 'connection.php';
  $result = mysqli_query($con, "SELECT description FROM `java_chapters` WHERE course_id = 'course_java'");
  $ans = array();
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
     $ans[] =  $row['description'];
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Learning: Take it easy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="courses_display.css">
    <style type="text/css">
      a {
        color: black;
        text-decoration: none !important;
      }
      a:link { color:black; }
      a:hover { color:black; }
      a:active { color: black; }
      #containercolor {
            width: 100%;
      }
    </style>
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="10"c>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
              </button>
              <a class="navbar-brand" href="index.php">LEARNING</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">JAVASCRIPT TUTORIAL</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
              </ul>
          </div>
        </div>
    </nav>
    <div class="container bg-1" id = "containercolor">
        <div class = "text-center">
            <img src="javascript.png" alt="Random Name" class="img-circle" width="90" height="90">
            <h1 id = "hdg">JAVASCRIPT TUTORIAL</h1>
        </div>
    </div>
    <div class="container">
      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <a href="javascript_lessons.php"><div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[0];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div></a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[1];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[2];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[3];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[4];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[5];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[6];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[7];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[8];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[9];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[10];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[11];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[12];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[13];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[14];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[15];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[16];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[17];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[18];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[19];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[20];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[21];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[22];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[23];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[24];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[25];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[26];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[27];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[28];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[29];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[30];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[31];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[32];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[33];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[34];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[35];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[36];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[37];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[38];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[39];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[40];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[41];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[42];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[43];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[44];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[45];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[46];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[47];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[48];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[49];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[50];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[51];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[52];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[53];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[54];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[55];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[56];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[57];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[58];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[59];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body fixed-panel"><?php echo $ans[60];?></div>
                <div class="panel-heading">1 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[61];?></div>
                <div class="panel-heading">5 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[62];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="thumbnail">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body"><?php echo $ans[63];?></div>
                <div class="panel-heading">8 Question
                  <span class = "glyphicon glyphicon-lock pull-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-2">
      <div class="simplecontainer">
        <h3 class="text-center"><font id = "lppl">Learn Playing. Play Learning</font></h3>
      </div>
    </div>
  </body>
</html>