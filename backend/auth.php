<?php
//START SESSION
session_start();
// INCLUDE DATABASE CONNECTION FILE
include 'dbconnection.php';

// CHECK IF THE FORM HAS BEEN SUBMITTED

if(isset($_POST['login'])){
    // GET THE FORM DATA
   echo  $username = $_POST['username'];
    echo $password = $_POST['password'];

    // CHECK IF THE USERNAME AND PASSWORD ARE CORRECT
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $sql);

    // IF THE USERNAME AND PASSWORD ARE CORRECT, REDIRECT TO THE DASHBOARD
    if(mysqli_num_rows($result) == 1){
        // SET SESSION VARIABLES
        $_SESSION['username'] = $username;
        header('location: ../home.php?info=Login Successfull');
    }else{
        // IF THE USERNAME AND PASSWORD ARE INCORRECT, REDIRECT BACK TO THE LOGIN PAGE
        header('location: ../index.php?err=Invalid Username or Password');
    }
}