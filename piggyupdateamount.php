<?php
include("session.php");
//include_once "wallet_info.php";
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "kakeibo";
$conn = mysqli_connect($servername, $username, $password, $database);

ini_set('display_errors','Off');

$savings_dtls = $_POST['savings_dtls'];
$saving_amount = $_POST['saving_amount'];
$updated_amount = $_POST['updated_amount'];

$sql = "INSERT INTO savings(savingsid, savings_dtls, saving_amount,userid,updated_amount) VALUES ('$userid','$savings_dtls','$saving_amount','$userid',$updated_amount)";
$ch = mysqli_query($conn, $sql);

if (!$ch) {
    die(mysqli_error($conn));
} else {
    header('Location: piggysaving.php');
    exit;
}



mysqli_close($conn);
