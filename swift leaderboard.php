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
    if (!$error) {
        if(mysqli_query($con, "INSERT INTO `student_information`(`student_name`, `student_date_of_birth`, `student_gender`, `student_mobileno`, `student_username`, `student_email`, `student_password`) VALUES ('$name','$dob','$gender','$mobileno','$username','$email','$password')")) {
            $successmsg = "Successfully Registered!!";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Swift Leaderboard | Learning: Take it easy</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="index.css">
    <style type="text/css">
      .name-point-size {
        font-size: 20px;
      }
      hr {
        border: 1px solid #ccc;
      }
    </style>
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
    <div class = "container">
      <div class = "row">
        <div class = "col-sm-4">
          <h3>By Course</h3>
        </div>
        <div class = "col-sm-4">
        </div>
        <div class = "col-sm-4">
          <a href="topLearners.php"><h3>Global Leaderboard</h3></a>
        </div>
      </div>
      <ul class = "list-inline">
        <li><a href="cplusplus leaderboard.php"><img src="Cplusplus.png" alt="Random Name" class="img-circle" width="50" height="50"></a></li>
        <li><a href="java leaderboard.php"><img src="java.png" alt="Random Name" class="img-circle" width="50" height="50"></a></li>
        <li><a href="python3 leaderboard.php"><img src="python3.png" alt="Random Name" class="img-circle" width="50" height="50"></a></li>
        <li><a href="javascript leaderboard.php"><img src="javascript.png" alt="Random Name" class="img-circle" width="50" height="50"></a></li>
        <li><a href="php leaderboard.php"><img src="php.png" alt="Random Name" class="img-circle" width="50" height="50"></a></li>
        <li><a href="chash leaderboard.php"><img src="chash.png" alt="Random Name" class="img-circle" width="50" height="50"></a></li>
        <li><a href="jquery leaderboard.php"><img src="jquery.png" alt="Random Name" class="img-circle" width="50" height="50"></a></li>
        <li><a href="html leaderboard.php"><img src="html.png" alt="Random Name" class="img-circle" width="50" height="50"></a></li>
        <li><a href="css leaderboard.php"><img src="css.png" alt="Random Name" class="img-circle" width="50" height="50"></a></li>
        <li><a href="sql leaderboard.php"><img src="sql.png" alt="Random Name" class="img-circle" width="50" height="50"></a></li>
        <li><a href="swift leaderboard.php"><img src="swift.png" alt="Random Name" class="img-circle" width="50" height="50"></a></li>
        <li><a href="ruby leaderboard.php"><img src="ruby.png" alt="Random Name" class="img-circle" width="50" height="50"></a></li>
      </ul><hr>
      <div class="media">
        <div class="media-left media-middle">
          <img src="formal.jpg" class="media-object" style="width:60px">
        </div>
        <div class="media-body">
          <h3 class="media-heading"> Swift</h3>
          <p> Leaderboard</p>
        </div></br></br>
        <div class = "row">
          <div class = "col-xs-2">
            <p class = "name-point-size">1. </p>
          </div>
          <div class = "col-xs-2">
            <img src="formal.jpg" class="media-object" style="width:40px">
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">Ankit kesarwani</p>
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">65825xp</p>
          </div>
        </div></br>
        <div class = "row">
          <div class = "col-xs-2">
            <p class = "name-point-size">2. </p>
          </div>
          <div class = "col-xs-2">
            <img src="formal.jpg" class="media-object" style="width:40px">
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">Ankit kesarwani</p>
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">65825xp</p>
          </div>
        </div></br>
        <div class = "row">
          <div class = "col-xs-2">
            <p class = "name-point-size">3. </p>
          </div>
          <div class = "col-xs-2">
            <img src="formal.jpg" class="media-object" style="width:40px">
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">Ankit kesarwani</p>
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">65825xp</p>
          </div>
        </div></br>
        <div class = "row">
          <div class = "col-xs-2">
            <p class = "name-point-size">4. </p>
          </div>
          <div class = "col-xs-2">
            <img src="formal.jpg" class="media-object" style="width:40px">
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">Ankit kesarwani</p>
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">65825xp</p>
          </div>
        </div></br>
        <div class = "row">
          <div class = "col-xs-2">
            <p class = "name-point-size">5. </p>
          </div>
          <div class = "col-xs-2">
            <img src="formal.jpg" class="media-object" style="width:40px">
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">Ankit kesarwani</p>
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">65825xp</p>
          </div>
        </div></br>
        <div class = "row">
          <div class = "col-xs-2">
            <p class = "name-point-size">6. </p>
          </div>
          <div class = "col-xs-2">
            <img src="formal.jpg" class="media-object" style="width:40px">
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">Ankit kesarwani</p>
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">65825xp</p>
          </div>
        </div></br>
        <div class = "row">
          <div class = "col-xs-2">
            <p class = "name-point-size">7. </p>
          </div>
          <div class = "col-xs-2">
            <img src="formal.jpg" class="media-object" style="width:40px">
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">Ankit kesarwani</p>
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">65825xp</p>
          </div>
        </div></br>
        <div class = "row">
          <div class = "col-xs-2">
            <p class = "name-point-size">8. </p>
          </div>
          <div class = "col-xs-2">
            <img src="formal.jpg" class="media-object" style="width:40px">
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">Ankit kesarwani</p>
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">65825xp</p>
          </div>
        </div></br>
        <div class = "row">
          <div class = "col-xs-2">
            <p class = "name-point-size">9. </p>
          </div>
          <div class = "col-xs-2">
            <img src="formal.jpg" class="media-object" style="width:40px">
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">Ankit kesarwani</p>
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">65825xp</p>
          </div>
        </div></br>
        <div class = "row">
          <div class = "col-xs-2">
            <p class = "name-point-size">10. </p>
          </div>
          <div class = "col-xs-2">
            <img src="formal.jpg" class="media-object" style="width:40px">
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">Ankit kesarwani</p>
          </div>
          <div class = "col-xs-4">
            <p class = "name-point-size">65825xp</p>
          </div>
        </div>
      </div></br></br>
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