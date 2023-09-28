<?php
if ($text == "") {
  $response  = "CON Welcome to USHURU PAY \n";
  $response .= "1. Register Account \n";
  $response .= "0. Exit";
} elseif ($text == "1") {
  echo "CON Please enter your Fullnames:";
} elseif ($infoArray[0] == "1" && $step == 2) {
  $response = "CON Enter your ID Number: \n";
} elseif ($infoArray[0] == "1" && $step == 3) {
  $response = "CON Enter your Date of Birth: \n";
}  elseif ($infoArray[0] == "1" && $step == 4) {
  $response = "CON Enter your Pin: \n";
} elseif ($infoArray[0] == "1" && $step == 5) {
  $response = "CON Confirm your Pin: \n";
} elseif ($infoArray[0] == "1" && $step == 6) {
  $fullname = $infoArray[1];
  $idnumber = $infoArray[2];
  $dob = $infoArray[3];
  $pin = $infoArray[4];
  $confirm_pin = $infoArray[5];
  if($pin != $confirm_pin){
    $response = "END Passwords do not match";
  }else{
     //ADD TO THE DATABASE CITIZEN
  $insert_citizen = mysqli_query($db, "INSERT INTO citizens (fullnames, phonenumber, idnumber, dob, pin) VALUES ('$fullname','$phoneNumber','$idnumber','$dob','$pin')");
  $response = "END Thank you for registering with USHURU PAY";
  }
} elseif ($text == 0) {
  $response = "END Thank you for using USHURU PAY";
}else{
  $response = "END Invalid Option";
}
