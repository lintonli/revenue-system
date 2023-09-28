<?php
// INITIATE THE CONNECTION TO THE DATABASE
include '../backend/dbconnection.php';
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];
$infoArray = explode("*", $text);
$step = 0;
$step = count($infoArray);

//CHECK IF THE USER IS REGISTERED

$getCitizen = mysqli_query($db, "SELECT * FROM citizens WHERE phonenumber = '$phoneNumber'");
if(mysqli_num_rows($getCitizen) > 0){
  $row = mysqli_fetch_array($getCitizen);
  $fullnames = $row['fullnames'];
  $phone = $row['phonenumber'];
  $idnumber = $row['idnumber'];
  $dob = $row['dob'];
  include 'home.php';
}else{
    //REGISTER THE USER
    include 'register.php';
}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;