<?php
function payment($money, $phone, $AccountReference)
{
    // YOUR M PESA API KEYS
    $consumerKey = "r4UHWCoW81WAnEPh40wjZasCAjSu1TbQ";
    $consumerSecret = "zdOcNUWTaC1seuUG";
    // ACCESS TOKEN URL
    $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    $headers = ['Content-Type:application/json; charse=tutf8'];
    $curl = curl_init($access_token_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HEADER, FALSE);
    curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
    $result = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $result = json_decode($result);
    $access_token = $result->access_token;
    date_default_timezone_set('Africa/Nairobi');
    $processrequesturl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    $callbackurl = 'https://app.kariukijames.com/app/callback.php';
    $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
    $BusinessShortCode = '174379';
    $Timestamp = date('YmdHis');
    $Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
    $PartyA = $phone;
    $TransactionDesc = 'stkpush test';
    $Amount = $money;
    $stkpushheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $processrequesturl);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader); //setting customer header
    $curl_post_data = array(
        //fill in the request  parameters with valid values
        'BusinessShortCode' => $BusinessShortCode,
        'Password' => $Password,
        'Timestamp' => $Timestamp,
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $Amount,
        'PartyA' => $PartyA,
        'PartyB' => $BusinessShortCode,
        'PhoneNumber' => $PartyA,
        'CallBackURL' => $callbackurl,
        'AccountReference' => $AccountReference,
        'TransactionDesc' => $TransactionDesc
    );
    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);
    $data = json_decode($curl_response);
    return $data->CheckoutRequestID;
}
// $money = 1;
// $phone = '254769385032';
// $AccountReference = 'linton maina';
// echo payment($money, $phone, $AccountReference);