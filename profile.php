<?php
  session_start();
  include_once 'connection.php';
  $student_username = $_SESSION['usr_id'];
  $result = mysqli_query($con, "SELECT courses.course_title FROM `student_courses`, `courses` WHERE student_courses.course_id = courses.course_id AND student_courses.student_username = '$student_username' ");

  $cplusplus = false;
  $java = false;
  $python3 = false;
  $javascript = false;
  $php = false;
  $chash = false;
  $jquery = false;
  $html = false;
  $css = false;
  $sql = false;
  $swift = false;
  $ruby = false;
while ($row = mysqli_fetch_array($result)) {
  if(in_array("C++", $row)) {
    $cplusplus = true;
  }
  if(in_array("JAVA", $row)) {
    $java = true;
  }
  if(in_array("Python 3", $row)) {
    $python3 = true;
  }
  if(in_array("JavaScript", $row)) {
    $javascript = true;
  }
  if(in_array("PHP", $row)) {
    $php = true;
  }
  if(in_array("C#", $row)) {
    $chash = true;
  }
  if(in_array("jQuery", $row)) {
    $jquery = true;
  }
  if(in_array("HTML Fundamentals", $row)) {
    $html = true;
  }
  if(in_array("CSS Fundamentals", $row)) {
    $css = true;
  }
  if(in_array("SQL Tutorial", $row)) {
    $sql = true;
  }
  if(in_array("Swift Fundamentals", $row)) {
    $swift = true;
  }
  if(in_array("Ruby Tutorial", $row)) {
    $ruby = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Profile | Learning: Take it easy</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="index.css">
    <style type="text/css">
      #displayname {
        display: inline;
      }
      #button_inline {
        display: inline-block;
      }
      hr {
        border: 1px solid #ccc;
      }
      #inline_code {
        display: inline;
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
    
    <div class = "text-center container">
      <div class="row">
        <div class="col-sm-12">
          <img src="formal.jpg" alt="Random Name" class="img-circle person" width="70" height="70">
          <div id = "displayname">
            <h3><strong><?php echo $_SESSION['usr_name']; ?></strong></h3>
            <p><strong>Points: </strong>1075XP</p>
          </div>
          <div id = "button_inline">
            <a href="editprofile.php"><button class="btn">EDIT PROFILE</button></a>
            <a href="logout.php"><button class="btn">SIGN OUT</button></a>
          </div>
        </div>
      </div>
    </div><hr>
    <div class = "text-center container">
      <div class="row">
        <div class="col-sm-12">
          <h3>MY COURSES</h3>
        </div>
      </div><br>
      <div class = "row">
        <?php if($cplusplus) {?>
        <div id = "inline_code">
          <img src="Cplusplus.png" alt="Random Name" class="img-circle" width="50" height="50">
        </div>
        <?php }?>
        <?php if($java) {?>
        <div id = "inline_code">
          <img src="java.png" alt="Random Name" class="img-circle" width="50" height="50">
        </div>
        <?php }?>
        <?php if($python3) {?>
        <div id = "inline_code">
          <img src="python3.png" alt="Random Name" class="img-circle" width="50" height="50">
        </div>
        <?php }?>
        <?php if($javascript) {?>
        <div id = "inline_code">
          <img src="javascript.png" alt="Random Name" class="img-circle" width="50" height="50">
        </div>
        <?php }?>
        <?php if($php) {?>
        <div id = "inline_code">
          <img src="php.png" alt="Random Name" class="img-circle" width="50" height="50">
        </div>
        <?php }?>
        <?php if($chash) {?>
        <div id = "inline_code">
          <img src="chash.png" alt="Random Name" class="img-circle" width="50" height="50">
        </div>
        <?php }?>
        <?php if($jquery) {?>
        <div id = "inline_code">
          <img src="jquery.png" alt="Random Name" class="img-circle" width="50" height="50">
        </div>
        <?php }?>
        <?php if($html) {?>
        <div id = "inline_code">
          <img src="html.png" alt="Random Name" class="img-circle" width="50" height="50">
        </div>
        <?php }?>
        <?php if($css) {?>
        <div id = "inline_code">
          <img src="css.png" alt="Random Name" class="img-circle" width="50" height="50">
        </div>
        <?php }?>
        <?php if($sql) {?>
        <div id = "inline_code">
          <img src="sql.png" alt="Random Name" class="img-circle" width="50" height="50">
        </div>
        <?php }?>
        <?php if($swift) {?>
        <div id = "inline_code">
          <img src="swift.png" alt="Random Name" class="img-circle" width="50" height="50">
        </div>
        <?php }?>
        <?php if($ruby) {?>
        <div id = "inline_code">
          <img src="ruby.png" alt="Random Name" class="img-circle" width="50" height="50">
        </div>
        <?php }?>
      </div>
    </div><hr>
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