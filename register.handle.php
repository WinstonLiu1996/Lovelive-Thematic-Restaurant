<?php

  $username = $_POST['username'];
  $password = $_POST['password'];
  $conpass = $_POST['conpass'];

  $conn = mysqli_connect("localhost:8889", "root", "root", "Restaurant");

  if($password <> $conpass) {
    mysqli_close($conn); 
    echo '<script type="text/javascript">';
    echo 'alert("passwords you input are different, please try again.");';
    echo 'window.location.href = "register.php";';
    echo '</script>';
  };

  $insertsql = "Insert into Customer (CustomerName,PhoneNumber) values ('$username','$password')";
  //echo $insertsql;
  if(mysqli_query($conn,$insertsql)){
     mysqli_close($conn); 
    echo '<script type="text/javascript">';
    echo 'alert("register successfully, please login in your account");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
  } else {
     mysqli_close($conn); 
    echo '<script type="text/javascript">';
    echo 'alert("register unsuccessfully, please try again");';
    echo 'window.location.href = "register.php";';
    echo '</script>';
  }

?>
