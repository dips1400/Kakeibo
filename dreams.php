<?php
include("session.php");
//include_once "wallet_info.php";
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "kakeibo";
$conn = mysqli_connect($servername, $username, $password, $database);

$details = $_POST['details'];
$amount_to_save = $_POST['amount_to_save'];

$sql = "INSERT INTO biggersavings(bigsid, details, amount_to_save,userid) VALUES ('$userid','$details','$amount_to_save','$userid')";
$ch = mysqli_query($conn, $sql);


if (!$ch) {
    die(mysqli_error($conn));
} else {
    header('Location: savingfordream.php');
    exit;
}



mysqli_close($conn);