<?php
    session_start();
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="login";
    
  //create connection
  $conn = new mysqli($servername,$username,"",$dbname); 
  //check connection
  if($conn->connect_error){
    die("connection failed.".$conn->connect_error);
  }
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user = $_POST['username'];
    $pass =$_POST['password'];
    
//Prepare and bind
 $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
 $stmt->bind_param("ss", $user, $pass); 
 $stmt->execute(); $result = $stmt->get_result();


    if($result -> num_rows >0){
        $_SESSION['username']=$user;
        header("location: dashboard.php");
    }
    else{
        echo"Invaild username or password";
    }
  }
  $conn->close();
  ?>
