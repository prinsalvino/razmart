<?php

$servername = "sql103.epizy.com";
$username = "epiz_27041497";
$password = "TXCr27kaTeN";
$db = "epiz_27041497_razmart";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>