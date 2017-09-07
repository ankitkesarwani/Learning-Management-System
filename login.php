<?php
  session_start();
  if(isset($_SESSION['usr_id'])) {
    header("Location: index.php");
  }

  include_once 'connection.php';
  $error = false;

  if (isset($_POST['signin'])) {
    $emailorusername = mysqli_real_escape_string($con, $_POST['emailorusername']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $result = mysqli_query($con, "SELECT `student_name`, `student_date_of_birth`, `student_gender`, `student_mobileno`, `student_username`, `student_email`, `student_password` FROM `student_information` WHERE student_username = '$emailorusername' and student_password = '$pass'");

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['usr_id'] = $row['id'];
        $_SESSION['usr_name'] = $row['name'];
        header("Location: index.php");
    } else {
        $errormsg = "Incorrect Email or Password!!!";
    }
  }
?>