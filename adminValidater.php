<?php

  include 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username=? AND password=?");
    $stmt->bind_param("ss",$username,$password);

    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){

        $_SESSION['username'] = $username;

        header("Location: admin.php");
         exit(); 
    }else{
       echo "Incorrect Login Credentials!!!!";
    }
    $stmt->close();
?>