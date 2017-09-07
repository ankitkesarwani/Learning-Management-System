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
            header("Location: index.php");
        } else {
            $errormsg = "Error in registering...Please try again later!";
            header("Location: index.php");
        }
    }
  }
?>