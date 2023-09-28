<?php
include '../backend/dbconnection.php';
header("Content-Type: application/json");

$stkCallbackResponse = file_get_contents('php://input');
$logFile = "ushrupayresponse.json";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);

$data = json_decode($stkCallbackResponse);
$uniquiId = $data->Body->stkCallback->CheckoutRequestID;
$ResultCode = $data->Body->stkCallback->ResultCode;
$Amount = $data->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$TrdansactionId = $data->Body->stkCallback->CallbackMetadata->Item[1]->Value;
$PhoneNumber = $data->Body->stkCallback->CallbackMetadata->Item[4]->Value;

//CHECK IF TABLE transactions EXISTS IN THE DATABASE
if ($ResultCode == 0) {
  mysqli_query($db, "UPDATE payments SET TransactionID='$TrdansactionId',status='Paid' WHERE 	checkout_request_id = '$uniquiId'");
}
