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
  error_reporting(0);
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
        if($check_exist_email == 1) {
            $errormsg = "This Email is already Registered!!!";
        } else if($check_exist_username == 1) {
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
              header('Location: cplusplus.php');
          } else {
              $successmsg_cplusplus = "Error in registering...Please try again later!";
              //header('Location: index.php');
          }
    }
    if (isset($_POST['java'])) {
          if(mysqli_query($con, "INSERT INTO `student_courses`(`course_id`, `student_username`) VALUES ('course_java','$student_username')")) {
              $successmsg_java = "Successfully Registered!!";
              header('Location: java.php');
          } else {
              $successmsg_java = "Error in registering...Please try again later!";
              //header('Location: index.php');
          }
    }
    if (isset($_POST['python3'])) {
          if(mysqli_query($con, "INSERT INTO `student_courses`(`course_id`, `student_username`) VALUES ('course_python_3','$student_username')")) {
              $successmsg_python3 = "Successfully Registered!!";
              header('Location: python3.php');
          } else {
              $successmsg_python3 = "Error in registering...Please try again later!";
              //header('Location: index.php');
          }
    }
?>

<?php
  include_once 'connection.php';
  $feedback_error = false;

  if(isset($_POST['send'])) {
    $name = mysqli_real_escape_string($con, $_POST['feedback_name']);
    $email = mysqli_real_escape_string($con, $_POST['feedback_email']);
    $comment = mysqli_real_escape_string($con, $_POST['comment']);

    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $feedback_error = true;
        $feedback_name_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $feedback_error = true;
        $feedback_email_error = "Please Enter Valid Email ID";
    }
    if (!$error) {
        if(mysqli_query($con, "INSERT INTO `feedback`(`name`, `email_id`, `comments`) VALUES ('$name','$email','$comment')")) {
            $feedbackmsg = "Thank You for your valuable feedback";
        } else {
            $feedbackmsg = "Error in submitting feedback...Please try again later!";
        }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Learning: Take it easy</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="bootstrap.css">
		<link rel="stylesheet" type="text/css" href="fontawesome.css">
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="index.css">
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
        				<li><a href="#home">HOME</a></li>
        				<li><a href="#courses">COURSES</a></li>
        				<li><a href="#toplearners">TOP LEARNERS</a></li>
        				<li><a href="#contact">CONTACT</a></li>
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
		<div class = "bg-1" id = "whole">
			<div id = "home" class = "container">
				<h2>Learn to code for FREE!</h2>
				<p><strong>New social learning is here!</strong></p>
        <?php if (isset($_SESSION['usr_id'])) { ?>
          <a href="courses.php"><button class="btn" style = "width:400px;height:50px;border:2px;border-radius:50px;font-size:20px;">START LEARNING NOW
            <span class="glyphicon glyphicon-ok"></span>
          </button></a>
        <?php } else { ?>
          <button data-toggle="modal" data-target="#myModal" class="btn" style = "width:400px;height:50px;border:2px;border-radius:50px;font-size:20px;">START LEARNING NOW
            <span class="glyphicon glyphicon-ok"></span>
          </button>
        <?php } ?>
			</div>
		</div>
		<div id = "courses" class="container text-center">
			<h3>COURSES</h3></br>
			<div class="row">
    			<div class="col-sm-4">
    				<img src="Cplusplus.png" alt="Random Name" class="img-circle person" width="50" height="50">
    				<p><strong><font class = "bdtxt">C++ Tutorial</font></strong></p>
    				<small><i>Our C++ tutorial covers basic concepts, data types, arrays, pointers, conditional statements, loops, functions, classes, objects, inheritance, and polymorphism.</i></small>
    				<div class="row">
              <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
       					<div class="col-md-12 form-group">
                  <div class="popup" onclick="takecourses()">
                    <?php if (isset($_SESSION['usr_id'])) { ?>
          					   <button class="btn pull-center" type="submit" name = "cplusplus" style = "border-radius:50px;">Take This Course</button>
                      <span class="popuptext" id="myPopup"><?php echo $successmsg_cplusplus; ?></span>
                    <?php } else { ?>
                      <button class="btn pull-center" data-toggle="modal" data-target="#myModal" type="submit" name = "cplusplus" style = "border-radius:50px;">Take This Course</button>
                    <?php } ?>
                  </div>
        				</div>
              </form>
      			</div>
    			</div>
    			<div class="col-sm-4">
    				<img src="java.png" alt="Random Name" class="img-circle person" width="50" height="50">
    				<p><strong><font class = "bdtxt">Java Tutorial</font></strong></p>
    				<small><i>With our interactive Java course, you’ll learn object-oriented Java programming and have the ability to write clear and valid code in almost no time at all.</i></small>
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
    			<div class="col-sm-4">
    				<img src="python3.png" alt="Random Name" class="img-circle person" width="50" height="50">
    				<p><strong><font class = "bdtxt">Python 3 Tutorial</font></strong></p>
    				<small><i>Learn Python, one of today's most in-demand programming languages on-the-go! Practice writing Python code, collect points, & show off your skills now!</i></small>
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
			<a href="courses.php">View All Our Courses</a>
		</div>
		<div class="bg-2">
			<div class="simpletwocontainer">
				<h3 class="text-center"><font id = "lppl">Become a member of our growing community!</font></h3>
        <?php if (isset($_SESSION['usr_id'])) { ?>
          <a href="courses.php"><button type="submit" class="btn btn-block">START LEARNING NOW
            <span class="glyphicon glyphicon-ok"></span>
          </button></a>
        <?php } else { ?>
          <button data-toggle="modal" data-target="#myModal" type="submit" class="btn btn-block">START LEARNING NOW
            <span class="glyphicon glyphicon-ok"></span>
          </button>
        <?php } ?>
			</div>
		</div>
		<div class="bg-1" id = "whole">
			<div id = "toplearners" class="container">
    			<h3 class="text-center"><a href="toplearners.php" id = "link-state">TOP LEARNERS</a></h3>
    			<p class="text-center">YOU ARE IN GOOD COMPANY.</p>
          <ul class="text-center list-inline social-buttons">
            <li><a href="https://twitter.com/AnkitKe49055364"><i class="fa fa-twitter"></i></a>
            </li>
            <li><a href="https://www.facebook.com/ankit.kesarwani.98"><i class="fa fa-facebook"></i></a>
            </li>
            <li><a href="https://www.linkedin.com/in/ankit-kesarwani-298628127/"><i class="fa fa-linkedin"></i></a>
            </li>
          </ul>
				  <div class="row text-center">
					 <div class="col-sm-4">
    					<div class="thumbnail">
    						<img src="vip.jpg" alt="Paris" class = "set-user-img">
    						<p><strong>Vipin Kesarwani</strong></p>
    						<p>Fri. 27 November 2015</p>
                <?php if (isset($_SESSION['usr_id'])) { ?>
                  <button class="btn">See Profile</button>
                <?php } else { ?>
                  <button class="btn" data-toggle="modal" data-target="#myModal">See Profile</button>
                <?php } ?>
    					</div>
  					</div>
					<div class="col-sm-4">
    					<div class="thumbnail">
    						<img src="man.jpg" alt="New York" class = "set-user-img">
    						<p><strong>Manish Kesarwani</strong></p>
    						<p>Sat. 28 November 2015</p>
    						<?php if (isset($_SESSION['usr_id'])) { ?>
                  <button class="btn">See Profile</button>
                <?php } else { ?>
                  <button class="btn" data-toggle="modal" data-target="#myModal">See Profile</button>
                <?php } ?>
    					</div>
					</div>
  				<div class="col-sm-4">
    					<div class="thumbnail">
    						<img src="formal.jpg" alt="San Francisco" class = "set-user-img">
    						<p><strong>Ankit Kesarwani</strong></p>
    						<p>Sun. 29 November 2015</p>
    						<?php if (isset($_SESSION['usr_id'])) { ?>
                  <button class="btn">See Profile</button>
                <?php } else { ?>
                  <button class="btn" data-toggle="modal" data-target="#myModal">See Profile</button>
                <?php } ?>
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
                          <button type="submit" name = "register" class="btn btn-block">REGISTER 
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
		<!-- Container (Contact Section) -->
		<div id="contact" class="container">
  			<h3 class="text-center">Contact</h3>
  			<p class="text-center"><em>We love our fans!</em></p>
			<div class="row">
    			<div class="col-md-4">
      				<p>Fan? Drop a note.</p>
      				<p><span class="glyphicon glyphicon-user"></span> Ankit Kesarwani</p>
      				<p><span class="glyphicon glyphicon-phone"></span> Phone: +91-8349980190</p>
      				<p><span class="glyphicon glyphicon-envelope"></span> Email: kesarwani.ankit48@gmail.com</p>
    			</div>
    			<div class="col-md-8">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="feedbackform">
      				<div class="row">
        				<div class="col-sm-6 form-group">
          					<input class="form-control" id="name" name="feedback_name" placeholder="Name" type="text" required>
        				</div>
        				<div class="col-sm-6 form-group">
          					<input class="form-control" id="email" name="feedback_email" placeholder="Email" type="email" required>
        				</div>
      				</div>
      				<textarea class="form-control" id="comments" name="comment" placeholder="Comment" rows="5"></textarea>
      				</br>
      				<div class="row">
       					<div class="col-md-12 form-group">
          					<button class="btn pull-right" type="submit" name = "send">Send</button>
        				</div>
      				</div>
            </form>
              <span class="text-success"><?php if (isset($feedbackmsg)) { echo $feedbackmsg; } ?></span>
    			</div>
  			</div></br>
  			<h3 class="text-center">From The Blog</h3>  
  			<ul class="nav nav-tabs">
    			<li class="active"><a data-toggle="tab" href="#home">Vipin</a></li>
    			<li><a data-toggle="tab" href="#menu1">Manish</a></li>
    			<li><a data-toggle="tab" href="#menu2">Ankit</a></li>
  			</ul>
	 	 	<div class="tab-content">
    			<div id="home" class="tab-pane fade in active">
      				<h2>Vipin Kesarwani, Mechanical Engineer</h2>
      				<p>Man, we've been on the road for some time now. Looking forward to Learn..</p>
    			</div>
    			<div id="menu1" class="tab-pane fade">
      				<h2>Manish Kesarwani, PSU Officer</h2>
      				<p>Always a pleasure people! Hope you enjoyed it as much as I did. Could I BE.. any more pleased?</p>
    			</div>
    			<div id="menu2" class="tab-pane fade">
      				<h2>Ankit Kesarwani, Full Stack Developer</h2>
      				<p>I mean, sometimes I enjoy the show, but other times I enjoy other things.</p>
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

      // When the user clicks on div, open the popup
      function takecourses() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
      }
		</script>
	</body>
</html>