<?php

  $mname=$_POST["mname"];
  $mid=$_POST["mid"];
  
  $conn = mysqli_connect("localhost:8889", "root", "root", "Restaurant");
  //echo "UPDATE Manager SET ManagerID='$mid' WHERE ManagerName='$mname' <br>";

  $result=mysqli_query($conn, "UPDATE Manager SET ManagerID='$mid' WHERE ManagerName='$mname'");
  mysqli_close($conn); 
  if ($result){
    echo '<script type="text/javascript">';
    echo 'alert("Selected Manager Updated Successfully with a New ManagerID!");';
    echo 'window.location.href = "manage.php";';
    echo '</script>';

  }
    else{
    echo '<script type="text/javascript">';
    echo 'alert("Login fail, please try again.");';
    echo 'window.location.href = "manage.php";';
    echo '</script>';
    }
?>
