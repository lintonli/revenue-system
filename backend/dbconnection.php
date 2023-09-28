<?php
//APP LIVE URL live or dev
define('APP_STATUS', 'dev');
//CONNECTION TO THE DATABASE

//CHECK IF THE APP IS LIVE
if (APP_STATUS == 'live') {
    $db = mysqli_connect('localhost', 'kariukij_ussd_user', 'qzv02XlG@znV', 'kariukij_ussdapp');
} else {
    $db = mysqli_connect('localhost', 'root', '', 'ushurupay');
}

//CHECKING IF THE CONNECTION IS SUCCESSFUL

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
