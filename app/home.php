<?php
include 'function.php';
if ($text == "") {
  $response  = "CON Welcome $fullnames to USHURU PAY \n";
  $response .= "1. Profile \n";
  $response .= "2. Pay Bill \n";
  $response .= "0. Exit \n";
} elseif ($text == "0") {
  $response = "END Thank you for using USHURU PAY";
} elseif ($text == "1") {
  //ECHO THE USER ACCOUNT DETAILS
  $response  = "CON Your Personal Infomation \n";
  $response .= "ID Number : " . $dob . " \n";
  $response .= "Phone Number : " . $phone . " \n";
  $response .= "Date of Birth : " . $idnumber . " \n";
  $response .= "0. Exit \n";
} elseif ($text == "1*0") {
  $response = "END Thank you for using USHURU PAY";
} elseif ($text == "2") {
  $response  = "CON Reply with : \n";
  $response .= "1. Market Cess\n";
  $response .= "0. Exit \n";
} elseif ($text == "2*0") {
  $response = "END Thank you for using USHURU PAY";
  /*
PROCESSESING MARKET CESS
*/
} elseif ($text == "2*1") {
  $response  = "CON Reply with : \n";
  $response .= "1. Pay Fees\n";
  $response .= "2. Check Status \n";
  $response .= "0. Exit \n";
} elseif ($text == "2*1*0") {
  $response = "END Thank you for using USHURU PAY";
} elseif ($text == "2*1*1") {
  //AMMOUNT TO BE PAID ACCORDING TO THE STALL NUMBER
  $response  = "CON Choose Stall Wing : \n";
  $response .= "1. A \n";
  $response .= "2. B \n";
  $response .= "3. C \n";
  $response .= "4. D \n";
  $response .= "5. E \n";
  $response .= "0. F \n";
} elseif ($text == "2*1*1*0") {
  $response = "END Thank you for using USHURU PAY";
} elseif ($text == "2*1*1*1") {
  $response = "CON Enter Stall Number : ";
} elseif ($text == "2*1*1*2") {
  $response = "CON Enter Stall Number : ";
} elseif ($text == "2*1*1*3") {
  $response = "CON Enter Stall Number : ";
} elseif ($text == "2*1*1*4") {
  $response = "CON Enter Stall Number : ";
} elseif ($text == "2*1*1*5") {
  $response = "CON Enter Stall Number : ";
} elseif ($infoArray[0] == "2" && $step == 5) {
  //REMOVE +254 FROM THE PHONE NUMBER
  $phone = (int)substr($phoneNumber, 1);
  $AccountReference = $infoArray[4];
  $CheckoutRequestID = payment(1, $phone, $AccountReference);
  mysqli_query($db, "INSERT INTO  payments (phone, amount, account_reference, checkout_request_id) VALUES ('$phone', '1', '$AccountReference', '$CheckoutRequestID')");
  $response = "END  Complete Payment of Ksh 100  for Car Stall NO : $infoArray[4]  sent to  $phone, Thank you for using USHURU PAY";
} elseif ($text == "2*1*2") {
  $response = "CON Enter Stall Number : ";
} elseif ($infoArray[0] == "2" && $step == 4) {
  $sn = $infoArray[3];
  $payments_status = mysqli_query($db, "SELECT * FROM payments WHERE account_reference = '$sn'");
  if(mysqli_num_rows($payments_status)){
    $payment_status = mysqli_fetch_array($payments_status);
    $payment = $payment_status['status']; // Function to query payment status
    if ($payment == 'Paid') {
      $response = "END Your payment for Stall NO $sn is complete. Thank you for using USHURU PAY";
    } else {
      $response = "END Your payment for Stall NO $sn is not complete. Please pay to complete your transaction.";
    }
  }else{
    $response = "END The Stall Number $sn does not exist. Please try again.";
  }
} else {
  $response = "END Invalid Option";
}
