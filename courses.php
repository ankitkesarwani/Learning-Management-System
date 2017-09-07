<?php
  session_start();
  include_once 'connection.php';
  $error_login = false;
  if (isset($_POST['signin'])) {
    $emailorusername = mysqli_real_escape_string($con, $_POST['emailorusername']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $result = mysqli_query($con, "SELECT `student_name`, `student_date_of_birth`, `student_gender`, `student_mobileno`, `student_username`, `student_email`, `student_password` FROM `student_information` WHERE student_username = '$emailorusername' and student_password = '$pass'");

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['usr_id'] = $row['student_username'];
        $_SESSION['usr_name'] = $row['student_name'];
        header("Location: index.php");
    } else {
        $errormsg_login = "Incorrect Email or Password!!!";
    }
  }
?>

<?php
  include_once 'connection.php';
  $error = false;

  if(isset($_POST['register'])) {
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $dob = $_POST['dob'];
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $mobileno = mysqli_real_escape_string($con, $_POST['mobileno']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $name = $fname." ".$lname;

    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    $exist_username = mysqli_query($con,"SELECT * FROM `student_information` where `student_username`= $username");
    $exist_email = mysqli_query($con,"SELECT * FROM `student_information` where `student_email`= $email");
    $check_exist_username = mysqli_num_rows($exist_username);
    $check_exist_email = mysqli_num_rows($exist_email);
    if (!$error) {
        if($exist_email == 1) {
            $errormsg = "This Email is already Registered!!!";
        } else if($exist_username == 1) {
            $errormsg = "Please choose a different Username!!!";
        } else if(mysqli_query($con, "INSERT INTO `student_information`(`student_name`, `student_date_of_birth`, `student_gender`, `student_mobileno`, `student_username`, `student_email`, `student_password`) VALUES ('$name','$dob','$gender','$mobileno','$username','$email','$password')")) {
            $successmsg = "Successfully Registered!!";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
  }
?>

<?php
    error_reporting(0);
    include_once 'connection.php';
    $student_username = $_SESSION['usr_id'];
    if (isset($_POST['cplusplus'])) {
          if(mysqli_query($con, "INSERT INTO `student_courses`(`course_id`, `student_username`) VALUES ('course_cplusplus','$student_username')")) {
              $successmsg_cplusplus = "Successfully Registered!!";
              header("Location: cplusplus.php");
          } else {
              $successmsg_cplusplus = "Error in registering...Please try again later!";
          }
    }
    if (isset($_POST['java'])) {
          if(mysqli_query($con, "INSERT INTO `student_courses`(`course_id`,  `student_username`) VALUES ('course_java','$student_username')")) {
              $successmsg_java = "Successfully Registered!!";
              header("Location: java.php");
          } else {
              $successmsg_java = "Error in registering...Please try again later!";
              //header('Location: index.php');
          }
    }
    if (isset($_POST['python3'])) {
          if(mysqli_query($con, "INSERT INTO `student_courses`(`course_id`, `student_username`) VALUES ('course_python_3','$student_username')")) {
              $successmsg_python3 = "Successfully Registered!!";
              header("Location: python3.php");
          } else {
              $successmsg_python3 = "Error in registering...Please try again later!";
              //header('Location: index.php');
          }
    }

    if (isset($_POST['javascript'])) {
          if(mysqli_query($con, "INSERT INTO `student_courses`(`course_id`, `student_username`) VALUES ('course_javascript','$student_username')")) {
              $successmsg_javascript = "Successfully Registered!!";
              header("Location: javascript.php");
          } else {
              $successmsg_javascript = "Error in registering...Please try again later!";
              //header('Location: index.php');
          }
    }
    if (isset($_POST['php'])) {
          if(mysqli_query($con, "INSERT INTO `student_courses`(`course_id`, `student_username`) VALUES ('course_php','$student_username')")) {
              $successmsg_php = "Successfully Registered!!";
              header("Location: php.php");
          } else {
              $successmsg_php = "Error in registering...Please try again later!";
              //header('Location: index.php');
          }
    }
    if (isset($_POST['chash'])) {
          if(mysqli_query($con, "INSERT INTO `student_courses`(`course_id`, `student_username`) VALUES ('course_chash','$student_username')")) {
              $successmsg_chash = "Successfully Registered!!";
              header("Location: chash.php");
          } else {
              $successmsg_chash = "Error in registering...Please try again later!";
              //header('Location: index.php');
          }
    }

    if (isset($_POST['jquery'])) {
          if(mysqli_query($con, "INSERT INTO `student_courses`(`course_id`, `student_username`) VALUES ('course_jquery','$student_username')")) {
              $successmsg_jquery = "Successfully Registered!!";
              header("Location: jquery.php");
          } else {
              $successmsg_jquery = "Error in registering...Please try again later!";
              //header('Location: index.php');
          }
    }
    if (isset($_POST['html'])) {
          if(mysqli_query($con, "INSERT INTO `student_courses`(`course_id`, `student_username`) VALUES ('course_html','$student_username')")) {
              $successmsg_html = "Successfully Registered!!";
              header("Location: html.php");
          } else {
              $successmsg_html = "Error in registering...Please try again later!";
              //header('Location: index.php');
          }
    }
    if (isset($_POST['css'])) {
          if(mysqli_query($con, "INSERT INTO `student_courses`(`course_id`, `student_username`) VALUES ('course_css','$student_username')")) {
              $successmsg_css = "Successfully Registered!!";
              header("Location: css.php");
          } else {
              $successmsg_css = "Error in registering...Please try again later!";
              //header('Location: index.php');
          }
    }

    if (isset($_POST['sql'])) {
          if(mysqli_query($con, "INSERT INTO `student_courses`(`course_id`, `student_username`) VALUES ('course_sql','$student_username')")) {
              $successmsg_sql = "Successfully Registered!!";
              header("Location: sql.php");
          } else {
              $successmsg_sql = "Error in registering...Please try again later!";
              //header('Location: index.php');
          }
    }
    if (isset($_POST['swift'])) {
          if(mysqli_query($con, "INSERT INTO `student_courses`(`course_id`, `student_username`) VALUES ('course_swift','$student_username')")) {
              $successmsg_swift = "Successfully Registered!!";
              header("Location: swift.php");
          } else {
              $successmsg_swift = "Error in registering...Please try again later!";
              //header('Location: index.php');
          }
    }
    if (isset($_POST['ruby'])) {
          if(mysqli_query($con, "INSERT INTO `student_courses`(`course_id`, `student_username`) VALUES ('course_ruby','$student_username')")) {
              $successmsg_ruby = "Successfully Registered!!";
              header("Location: ruby.php");
          } else {
              $successmsg_ruby = "Error in registering...Please try again later!";
              //header('Location: index.php');
          }
    }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Courses | Learning: Take it easy</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="index.css">
    <style type="text/css">
      /* Icon when the collapsible content is shown */
      .btn:after {
        font-family: "Glyphicons Halflings";
        content: "\e114";
        float: right;
        margin-left: 15px;
      }
      /* Icon when the collapsible content is hidden */
      .btn.collapsed:after {
        content: "\e080";
      }
    </style>
    <script>
      function myFunction1() {
        var change = document.getElementById("toggle1");
        if (change.innerHTML == "less..") {
         change.innerHTML = "more..";
        } else {
         change.innerHTML = "less..";
        }
      }
      function myFunction2() {
        var change = document.getElementById("toggle2");
        if (change.innerHTML == "less..") {
         change.innerHTML = "more..";
        } else {
         change.innerHTML = "less..";
        }
      }
      function myFunction3() {
        var change = document.getElementById("toggle3");
        if (change.innerHTML == "less..") {
         change.innerHTML = "more..";
        } else {
         change.innerHTML = "less..";
        }
      }
      function myFunction4() {
        var change = document.getElementById("toggle4");
        if (change.innerHTML == "less..") {
         change.innerHTML = "more..";
        } else {
         change.innerHTML = "less..";
        }
      }
      function myFunction5() {
        var change = document.getElementById("toggle5");
        if (change.innerHTML == "less..") {
         change.innerHTML = "more..";
        } else {
         change.innerHTML = "less..";
        }
      }
      function myFunction6() {
        var change = document.getElementById("toggle6");
        if (change.innerHTML == "less..") {
         change.innerHTML = "more..";
        } else {
         change.innerHTML = "less..";
        }
      }
      function myFunction7() {
        var change = document.getElementById("toggle7");
        if (change.innerHTML == "less..") {
         change.innerHTML = "more..";
        } else {
         change.innerHTML = "less..";
        }
      }
      function myFunction8() {
        var change = document.getElementById("toggle8");
        if (change.innerHTML == "less..") {
         change.innerHTML = "more..";
        } else {
         change.innerHTML = "less..";
        }
      }
      function myFunction9() {
        var change = document.getElementById("toggle9");
        if (change.innerHTML == "less..") {
         change.innerHTML = "more..";
        } else {
         change.innerHTML = "less..";
        }
      }
      function myFunction10() {
        var change = document.getElementById("toggle10");
        if (change.innerHTML == "less..") {
         change.innerHTML = "more..";
        } else {
         change.innerHTML = "less..";
        }
      }
      function myFunction11() {
        var change = document.getElementById("toggle11");
        if (change.innerHTML == "less..") {
         change.innerHTML = "more..";
        } else {
         change.innerHTML = "less..";
        }
      }
      function myFunction12() {
        var change = document.getElementById("toggle12");
        if (change.innerHTML == "less..") {
         change.innerHTML = "more..";
        } else {
         change.innerHTML = "less..";
        }
      }
    </script>
	</head>
	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
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
                <li><a href="index.php">HOME</a></li>
                <li><a href="courses.php">COURSES</a></li>
                <li><a href="toplearners.php">TOP LEARNERS</a></li>
                <li><a href="index.php">CONTACT</a></li>
                <?php if (isset($_SESSION['usr_id'])) { ?>
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">
                  <img src="formal.jpg" alt="Random Name" class="img-circle" width="25" height="25"> <?php echo $_SESSION['usr_id']; ?><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="profile.php"><i class="fa fa-cog"></i> Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i> Sign-out</a></li>
                  </ul>
                  </li>
                <?php } else { ?>
                  <li><button class="btn" data-toggle="modal" data-target="#myModal" data-dismiss = "modal">SIGN IN</button></li>
                <?php } ?>
                <!--<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
                      <span class="caret"></span>
                    </a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Merchandise</a></li>
                    <li><a href="#">Extras</a></li>
                    <li><a href="#">Media</a></li> 
                  </ul>
                </li>-->
                <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
              </ul>
          </div>
        </div>
    </nav>
    <div id = "courses" class="container text-center">
      <h3>COURSES</h3></br>
      <div class="row text-center">
          <div class="col-sm-4">
            <div class="thumbnail">
            <img src="Cplusplus.png" alt="Random Name" class="img-circle person" width="50" height="50">
            <p><strong><font class = "bdtxt">C++ Tutorial</font></strong></p>
            <small><i>Our C++ tutorial covers basic concepts, data types, arrays, pointers, conditional statements, loops, functions, classes, objects, inheritance, and polymorphism.</i></small>
          </div>
          </div>
          <div class="col-sm-4">
            <div class="thumbnail">
            <img src="java.png" alt="Random Name" class="img-circle person" width="50" height="50">
            <p><strong><font class = "bdtxt">Java Tutorial</font></strong></p>
            <small><i>With our interactive Java course, you’ll learn object-oriented Java programming and have the ability to write clear and valid code in almost no time at all.</i></small>
          </div>
          </div>
          <div class="col-sm-4">
            <div class="thumbnail">
            <img src="python3.png" alt="Random Name" class="img-circle person" width="50" height="50">
            <p><strong><font class = "bdtxt">Python 3 Tutorial</font></strong></p>
            <small><i>Learn Python, one of today's most in-demand programming languages on-the-go! Practice writing Python code, collect points, & show off your skills now!</i></small>
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-sm-4">
              <div class="col-md-12 form-group">
                    <button class="btn pull-center" id = "toggle1" onclick="myFunction1()" data-toggle="collapse" data-target="#cpluspluslearner" type="submit" style = "border-radius:50px;">More..</button>
                    <div id="cpluspluslearner" class="collapse">
                        </br>
                        <ul class = "list-inline">
                          <li><strong>Learners: </strong></li>
                          <li>123,456,789</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Lessons: </strong></li>
                          <li>180</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Quizzes: </strong></li>
                          <li>72</li>
                        </ul>
                        <div class="row">
                          <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                          <div class="col-md-12 form-group">
                            <div class="popup">
                              <?php if (isset($_SESSION['usr_id'])) { ?>
                                <button class="btn pull-center" type="submit" name = "cplusplus" style = "border-radius:50px;">Take This Course</button>
                                <span><?php echo $successmsg_cplusplus; ?></span>
                              <?php } else { ?>
                                <button class="btn pull-center" data-toggle="modal" data-target="#myModal" type="submit" name = "cplusplus" style = "border-radius:50px;">Take This Course</button>
                              <?php } ?>
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
                </div>
          </div>
          <div class="col-sm-4">
              <div class="col-md-12 form-group">
                    <button class="btn pull-center" id = "toggle2" onclick="myFunction2()" data-toggle="collapse" data-target="#javalearner" type="submit" style = "border-radius:50px;">More..</button>
                    <div id="javalearner" class="collapse">
                        </br>
                        <ul class = "list-inline">
                          <li><strong>Learners: </strong></li>
                          <li>123,456,789</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Lessons: </strong></li>
                          <li>180</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Quizzes: </strong></li>
                          <li>72</li>
                        </ul>
                        <div class="row">
                          <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                          <div class="col-md-12 form-group">
                            <div class="popup" onclick="takecourses()">
                              <?php if (isset($_SESSION['usr_id'])) { ?>
                                <button class="btn pull-center" type="submit" name = "java" style = "border-radius:50px;">Take This Course</button>
                                <span class="popuptext" id="myPopup"><?php echo $successmsg_java; ?></span>
                              <?php } else { ?>
                                <button class="btn pull-center" data-toggle="modal" data-target="#myModal" type="submit" name = "java" style = "border-radius:50px;">Take This Course</button>
                              <?php } ?>
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
                </div>
          </div>
          <div class="col-sm-4">
              <div class="col-md-12 form-group">
                    <button class="btn pull-center" id = "toggle3" onclick="myFunction3()" data-toggle="collapse" data-target="#python3learner" type="submit" style = "border-radius:50px;">More..</button>
                    <div id="python3learner" class="collapse">
                        </br>
                        <ul class = "list-inline">
                          <li><strong>Learners: </strong></li>
                          <li>123,456,789</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Lessons: </strong></li>
                          <li>180</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Quizzes: </strong></li>
                          <li>72</li>
                        </ul>
                        <div class="row">
                          <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                          <div class="col-md-12 form-group">
                            <div class="popup" onclick="takecourses()">
                              <?php if (isset($_SESSION['usr_id'])) { ?>
                                <button class="btn pull-center" type="submit" name = "python3" style = "border-radius:50px;">Take This Course</button>
                                <span class="popuptext" id="myPopup"><?php echo $successmsg_python3; ?></span>
                              <?php } else { ?>
                                <button class="btn pull-center" data-toggle="modal" data-target="#myModal" type="submit" name = "python3" style = "border-radius:50px;">Take This Course</button>
                              <?php } ?>
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
                </div>
          </div>
      </div></br>
      <div class="row">
          <div class="col-sm-4">
            <img src="javascript.png" alt="Random Name" class="img-circle person" width="50" height="50">
            <p><strong><font class = "bdtxt">JavaScript Tutorial</font></strong></p>
            <small><i>Learn all the basic features of JavaScript, including making your website more interactive, changing website content, validating forms, and so much more.</i></small>
          </div>
          <div class="col-sm-4">
            <img src="php.png" alt="Random Name" class="img-circle person" width="50" height="50">
            <p><strong><font class = "bdtxt">PHP Tutorial</font></strong></p>
            <small><i>PHP enables you to create dynamic web pages, develop websites, and generate dynamic content. Learn the most widely used web programming language!</i></small>
          </div>
          <div class="col-sm-4">
            <img src="chash.png" alt="Random Name" class="img-circle person" width="50" height="50">
            <p><strong><font class = "bdtxt">C# Tutorial</font></strong></p>
            <small><i>With our interactive C# Tutorial, you will learn C# programming on-the-go! Practice writing C# code, collect points, & show off your skills.</i></small>
          </div>
      </div></br>
      <div class="row">
          <div class="col-sm-4">
              <div class="col-md-12 form-group">
                    <button class="btn pull-center" id = "toggle4" onclick="myFunction4()" data-toggle="collapse" data-target="#javascriptlearner" type="submit" style = "border-radius:50px;">More..</button>
                    <div id="javascriptlearner" class="collapse">
                        </br>
                        <ul class = "list-inline">
                          <li><strong>Learners: </strong></li>
                          <li>123,456,789</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Lessons: </strong></li>
                          <li>180</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Quizzes: </strong></li>
                          <li>72</li>
                        </ul>
                        <div class="row">
                          <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                          <div class="col-md-12 form-group">
                            <div class="popup" onclick="takecourses()">
                              <?php if (isset($_SESSION['usr_id'])) { ?>
                                <button class="btn pull-center" type="submit" name = "javascript" style = "border-radius:50px;">Take This Course</button>
                                <span class="popuptext" id="myPopup"><?php echo $successmsg_javascript; ?></span>
                              <?php } else { ?>
                                <button class="btn pull-center" data-toggle="modal" data-target="#myModal" type="submit" name = "javascript" style = "border-radius:50px;">Take This Course</button>
                              <?php } ?>
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
                </div>
          </div>
          <div class="col-sm-4">
              <div class="col-md-12 form-group">
                    <button class="btn pull-center" id = "toggle5" onclick="myFunction5()" data-toggle="collapse" data-target="#phplearner" type="submit" style = "border-radius:50px;">More..</button>\
                    <div id="phplearner" class="collapse">
                        </br>
                        <ul class = "list-inline">
                          <li><strong>Learners: </strong></li>
                          <li>123,456,789</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Lessons: </strong></li>
                          <li>180</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Quizzes: </strong></li>
                          <li>72</li>
                        </ul>
                        <div class="row">
                          <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                          <div class="col-md-12 form-group">
                            <div class="popup" onclick="takecourses()">
                              <?php if (isset($_SESSION['usr_id'])) { ?>
                                <button class="btn pull-center" type="submit" name = "php" style = "border-radius:50px;">Take This Course</button>
                                <span class="popuptext" id="myPopup"><?php echo $successmsg_php; ?></span>
                              <?php } else { ?>
                                <button class="btn pull-center" data-toggle="modal" data-target="#myModal" type="submit" name = "php" style = "border-radius:50px;">Take This Course</button>
                              <?php } ?>
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
                </div>
          </div>
          <div class="col-sm-4">
              <div class="col-md-12 form-group">
                    <button class="btn pull-center" id = "toggle6" onclick="myFunction6()" data-toggle="collapse" data-target="#chashlearner" type="submit" style = "border-radius:50px;">More..</button>
                    <div id="chashlearner" class="collapse">
                        </br>
                        <ul class = "list-inline">
                          <li><strong>Learners: </strong></li>
                          <li>123,456,789</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Lessons: </strong></li>
                          <li>180</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Quizzes: </strong></li>
                          <li>72</li>
                        </ul>
                        <div class="row">
                          <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                          <div class="col-md-12 form-group">
                            <div class="popup" onclick="takecourses()">
                              <?php if (isset($_SESSION['usr_id'])) { ?>
                                <button class="btn pull-center" type="submit" name = "chash" style = "border-radius:50px;">Take This Course</button>
                                <span class="popuptext" id="myPopup"><?php echo $successmsg_chash; ?></span>
                              <?php } else { ?>
                                <button class="btn pull-center" data-toggle="modal" data-target="#myModal" type="submit" name = "chash" style = "border-radius:50px;">Take This Course</button>
                              <?php } ?>
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
                </div>
          </div>
      </div></br>
      <div class="row">
          <div class="col-sm-4">
            <img src="jquery.png" alt="Random Name" class="img-circle person" width="50" height="50">
            <p><strong><font class = "bdtxt">jQuery Tutorial</font></strong></p>
            <small><i>Learn all the core features of jQuery, including making your website more interactive, creating effects and animations, handling events, and more!</i></small>
          </div>
          <div class="col-sm-4">
            <img src="html.png" alt="Random Name" class="img-circle person" width="50" height="50">
            <p><strong><font class = "bdtxt">HTML Fundamentals</font></strong></p>
            <small><i>This FREE course will teach you how to design a web page using HTML. Complete a series of hands-on exercises and practice while writing real HTML code.</i></small>
          </div>
          <div class="col-sm-4">
            <img src="css.png" alt="Random Name" class="img-circle person" width="50" height="50">
            <p><strong><font class = "bdtxt">CSS Fundamentals</font></strong></p>
            <small><i>Our CSS course will teach you how to control the style & layout of websites. Complete a series of exercises and practice while filling out actual CSS templates.</i></small>
          </div>
      </div></br>
      <div class="row">
          <div class="col-sm-4">
              <div class="col-md-12 form-group">
                    <button class="btn pull-center" id = "toggle7" onclick="myFunction7()" data-toggle="collapse" data-target="#jquerylearner" type="submit" style = "border-radius:50px;">More..</button>
                    <div id="jquerylearner" class="collapse">
                        </br>
                        <ul class = "list-inline">
                          <li><strong>Learners: </strong></li>
                          <li>123,456,789</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Lessons: </strong></li>
                          <li>180</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Quizzes: </strong></li>
                          <li>72</li>
                        </ul>
                        <div class="row">
                          <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                          <div class="col-md-12 form-group">
                            <div class="popup" onclick="takecourses()">
                              <?php if (isset($_SESSION['usr_id'])) { ?>
                                <button class="btn pull-center" type="submit" name = "jquery" style = "border-radius:50px;">Take This Course</button>
                                <span class="popuptext" id="myPopup"><?php echo $successmsg_jquery; ?></span>
                              <?php } else { ?>
                                <button class="btn pull-center" data-toggle="modal" data-target="#myModal" type="submit" name = "jquery" style = "border-radius:50px;">Take This Course</button>
                              <?php } ?>
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
                </div>
          </div>
          <div class="col-sm-4">
              <div class="col-md-12 form-group">
                    <button class="btn pull-center" id = "toggle8" onclick="myFunction8()" data-toggle="collapse" data-target="#htmllearner" type="submit" style = "border-radius:50px;">More..</button>
                    <div id="htmllearner" class="collapse">
                        </br>
                        <ul class = "list-inline">
                          <li><strong>Learners: </strong></li>
                          <li>123,456,789</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Lessons: </strong></li>
                          <li>180</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Quizzes: </strong></li>
                          <li>72</li>
                        </ul>
                        <div class="row">
                          <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                          <div class="col-md-12 form-group">
                            <div class="popup" onclick="takecourses()">
                              <?php if (isset($_SESSION['usr_id'])) { ?>
                                <button class="btn pull-center" type="submit" name = "html" style = "border-radius:50px;">Take This Course</button>
                                <span class="popuptext" id="myPopup"><?php echo $successmsg_html; ?></span>
                              <?php } else { ?>
                                <button class="btn pull-center" data-toggle="modal" data-target="#myModal" type="submit" name = "html" style = "border-radius:50px;">Take This Course</button>
                              <?php } ?>
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
                </div>
          </div>
          <div class="col-sm-4">
              <div class="col-md-12 form-group">
                    <button class="btn pull-center" id = "toggle9" onclick="myFunction9()" data-toggle="collapse" data-target="#csslearner" type="submit" style = "border-radius:50px;">More..</button>
                    <div id="csslearner" class="collapse">
                        </br>
                        <ul class = "list-inline">
                          <li><strong>Learners: </strong></li>
                          <li>123,456,789</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Lessons: </strong></li>
                          <li>180</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Quizzes: </strong></li>
                          <li>72</li>
                        </ul>
                        <div class="row">
                          <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                          <div class="col-md-12 form-group">
                            <div class="popup" onclick="takecourses()">
                              <?php if (isset($_SESSION['usr_id'])) { ?>
                                <button class="btn pull-center" type="submit" name = "css" style = "border-radius:50px;">Take This Course</button>
                                <span class="popuptext" id="myPopup"><?php echo $successmsg_css; ?></span>
                              <?php } else { ?>
                                <button class="btn pull-center" data-toggle="modal" data-target="#myModal" type="submit" name = "css" style = "border-radius:50px;">Take This Course</button>
                              <?php } ?>
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
                </div>
          </div>
      </div></br>
      <div class="row">
          <div class="col-sm-4">
            <img src="sql.png" alt="Random Name" class="img-circle person" width="50" height="50">
            <p><strong><font class = "bdtxt">SQL Tutorial</font></strong></p>
            <small><i>This course covers an array of SQL-related topics, such as retrieving, updating and filtering data; functions and subqueries; creating & updating tables; & many more!</i></small>
          </div>
          <div class="col-sm-4">
            <img src="swift.png" alt="Random Name" class="img-circle person" width="50" height="50">
            <p><strong><font class = "bdtxt">Swift Fundamentals</font></strong></p>
            <small><i>Learn all the main concepts of Swift programming and apply your newly gained knowledge to create your own, fully functioning iOS app!</i></small>
          </div>
          <div class="col-sm-4">
            <img src="ruby.png" alt="ruby Name" class="img-circle person" width="50" height="50">
            <p><strong><font class = "bdtxt">Ruby Tutorial</font></strong></p>
            <small><i>Learn Ruby, one of the most beautiful, artful and yet handy programming languages. Practice writing Ruby code, collect points, & show off your skills now!</i></small>
          </div>
      </div></br>
    <div class="row">
          <div class="col-sm-4">
              <div class="col-md-12 form-group">
                    <button class="btn pull-center" id = "toggle10" onclick="myFunction10()" data-toggle="collapse" data-target="#sqllearner" type="submit" style = "border-radius:50px;">More..</button>
                    <div id="sqllearner" class="collapse">
                        </br>
                        <ul class = "list-inline">
                          <li><strong>Learners: </strong></li>
                          <li>123,456,789</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Lessons: </strong></li>
                          <li>180</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Quizzes: </strong></li>
                          <li>72</li>
                        </ul>
                        <div class="row">
                          <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                          <div class="col-md-12 form-group">
                            <div class="popup" onclick="takecourses()">
                              <?php if (isset($_SESSION['usr_id'])) { ?>
                                <button class="btn pull-center" type="submit" name = "sql" style = "border-radius:50px;">Take This Course</button>
                                <span class="popuptext" id="myPopup"><?php echo $successmsg_sql; ?></span>
                              <?php } else { ?>
                                <button class="btn pull-center" data-toggle="modal" data-target="#myModal" type="submit" name = "sql" style = "border-radius:50px;">Take This Course</button>
                              <?php } ?>
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
                </div>
          </div>
          <div class="col-sm-4">
              <div class="col-md-12 form-group">
                    <button class="btn pull-center" id = "toggle11" onclick="myFunction11()" data-toggle="collapse" data-target="#swiftlearner" type="submit" style = "border-radius:50px;">More..</button>
                    <div id="swiftlearner" class="collapse">
                        </br>
                        <ul class = "list-inline">
                          <li><strong>Learners: </strong></li>
                          <li>123,456,789</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Lessons: </strong></li>
                          <li>180</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Quizzes: </strong></li>
                          <li>72</li>
                        </ul>
                        <div class="row">
                          <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                          <div class="col-md-12 form-group">
                            <div class="popup" onclick="takecourses()">
                              <?php if (isset($_SESSION['usr_id'])) { ?>
                                <button class="btn pull-center" type="submit" name = "swift" style = "border-radius:50px;">Take This Course</button>
                                <span class="popuptext" id="myPopup"><?php echo $successmsg_swift; ?></span>
                              <?php } else { ?>
                                <button class="btn pull-center" data-toggle="modal" data-target="#myModal" type="submit" name = "swift" style = "border-radius:50px;">Take This Course</button>
                              <?php } ?>
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
                </div>
          </div>
          <div class="col-sm-4">
              <div class="col-md-12 form-group">
                    <button class="btn pull-center" id = "toggle12" onclick="myFunction12()" data-toggle="collapse" data-target="#rubylearner" type="submit" style = "border-radius:50px;">More..</button>
                    <div id="rubylearner" class="collapse">
                        </br>
                        <ul class = "list-inline">
                          <li><strong>Learners: </strong></li>
                          <li>123,456,789</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Lessons: </strong></li>
                          <li>180</li>
                        </ul>
                        <ul class = "list-inline">
                          <li><strong>Quizzes: </strong></li>
                          <li>72</li>
                        </ul>
                        <div class="row">
                          <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                          <div class="col-md-12 form-group">
                            <div class="popup" onclick="takecourses()">
                              <?php if (isset($_SESSION['usr_id'])) { ?>
                                <button class="btn pull-center" type="submit" name = "ruby" style = "border-radius:50px;">Take This Course</button>
                                <span><?php echo $successmsg_ruby; ?></span>
                              <?php } else { ?>
                                <button class="btn pull-center" data-toggle="modal" data-target="#myModal" type="submit" name = "ruby" style = "border-radius:50px;">Take This Course</button>
                              <?php } ?>
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
                </div>
          </div>
    <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> SIGN IN</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                        <div class="form-group">
                          <label for="psw"><span class="glyphicon glyphicon-user"></span> Email or Username</label>
                          <input type="text" name = "emailorusername" required class="form-control" id="usrname" placeholder="Enter email or username">
                        </div>
                        <div class="form-group">
                            <label for="usrname"><span class="glyphicon glyphicon-lock"></span> Password</label>
                            <input type="password" name = "pass" required class="form-control" id="pwd" placeholder="Enter password">
                        </div>
                          <button type="submit" name = "signin" class="btn btn-block">SIGN IN 
                            <span class="glyphicon glyphicon-ok"></span>
                          </button>
                      </form>
                      <span class="text-danger"><?php if (isset($errormsg_login)) { echo $errormsg_login; } ?></span>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span> Cancel
                      </button>
                      <p><a data-toggle="modal" href="#myModalRegister" class="btn btn-primary">Not Registered ? Register Now</a></p>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Modal -->
      <div class="modal fade" id="myModalRegister" role="dialog"  data-backdrop="static">
          <div class="modal-dialog">
            <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> REGISTER</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="registrationform">
                        <div class="form-group">
                          <label for="usrname"><span class="glyphicon glyphicon-user"></span> First Name</label>
                          <input type="text" name = "fname" required value="<?php if($error) echo $fname; ?>" class="form-control" id="fname" placeholder="Enter first name">
                          <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                        </div>
                        <div class="form-group">
                          <label for="usrname"><span class="glyphicon glyphicon-user"></span> Last Name</label>
                          <input type="text" name = "lname" required value="<?php if($error) echo $lname; ?>" class="form-control" id="lname" placeholder="Enter last name">
                          <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                        </div>
                        <div class="form-group">
                          <label for="dte"><span class="glyphicon glyphicon-user"></span> Enter Date of Birth</label>
                          <input type="date" name = "dob" required class="form-control" id="dob" placeholder="Enter date of birth">
                        </div>
                        <div class="form-group">
                          <label for="gen"><span class="glyphicon glyphicon-user"></span> Gender</label></br>
                          <input type="radio" name = "gender" id="male" value = "Male"> Male
                          <input type="radio" name = "gender" id="Female" value = "Female"> Female
                        </div>
                        <div class="form-group">
                          <label for="usrname"><span class="glyphicon glyphicon-user"></span> Enter mobile no</label>
                          <input type="text" name = "mobileno" required class="form-control" id="mobileno" placeholder="Enter mobile no">
                        </div>
                        <div class="form-group">
                          <label for="psw"><span class="glyphicon glyphicon-user"></span> Enter username</label>
                          <input type="text" name = "username" required class="form-control" id="usrname" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                          <label for="psw"><span class="glyphicon glyphicon-user"></span> Enter email</label>
                          <input type="text" name = "email" required value="<?php if($error) echo $email; ?>" class="form-control" id="email" placeholder="Enter email">
                          <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="usrname"><span class="glyphicon glyphicon-lock"></span> Enter password</label>
                            <input type="password" name = "password" required class="form-control" id="pwd" placeholder="Enter password">
                            <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                        </div>
                          <button type="submit" name = "register" class="btn btn-block" action = "register.php">REGISTER 
                            <span class="glyphicon glyphicon-ok"></span>
                          </button>
                      </form>
                      <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                      <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span> Cancel
                      </button>
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
		<!-- Footer -->
		<footer class="text-center">
        <div class="container">
        	<a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    			<span class="glyphicon glyphicon-chevron-up"></span>
  			</a><br><br>
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2017</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="https://twitter.com/AnkitKe49055364"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/ankit.kesarwani.98"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="https://www.linkedin.com/in/ankit-kesarwani-298628127/"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
		<script>
			$(document).ready(function() {
  				// Initialize Tooltip
  				$('[data-toggle="tooltip"]').tooltip();
	 	 		// Add smooth scrolling to all links in navbar + footer link
  					$(".navbar a, footer a[href='#myPage']").on('click', function(event) {
  						// Make sure this.hash has a value before overriding default behavior
    					if (this.hash !== "") {
	      					// Prevent default anchor click behavior
      						event.preventDefault();
      						// Store hash
      						var hash = this.hash;
      						// Using jQuery's animate() method to add smooth page scroll
      						// The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      						$('html, body').animate({
        						scrollTop: $(hash).offset().top
      						}, 900, function(){
      						// Add hash (#) to URL when done scrolling (default click behavior)
        					window.location.hash = hash;
      					});
    				} // End if
  				});
			})
		</script>
	</body>
</html>