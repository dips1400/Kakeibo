<?php
include("session.php");
//include_once "wallet_info.php";
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "kakeibo";
$conn = mysqli_connect($servername, $username, $password, $database);

//ini_set('display_errors','Off');

$updated_amount2 = $_POST['updated_amount2'];
$x = (int)$updated_amount2;
$sql = "SELECT updated_amount from savings where userid=$userid";
$y = (int)$sql;
$amount = $y + $x;

$sql1 = "UPDATE savings set updated_amount = $amount where userid=$userid";
$ch = mysqli_query($conn, $sql1);

if (!$ch) {
    die(mysqli_error($conn));
} else {
    header('Location: piggysaving.php');
    exit;
}

mysqli_close($conn);