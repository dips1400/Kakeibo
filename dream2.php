<?php
include("session.php");
//include_once "wallet_info.php";
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "kakeibo";
$conn = mysqli_connect($servername, $username, $password, $database);

ini_set('display_errors','Off');
$x=0;
$final_amt = $_POST['final_amt'];
$x += $final_amt;

$sql = "INSERT INTO b_s(bs,bigsid,userid,finalamt) VALUES('$userid','$userid','$userid','$x')";
$ch = mysqli_query($conn, $sql);

if (!$ch) {
    die(mysqli_error($conn));
} else {
    header('Location: savingfordream.php');
    exit;
}



mysqli_close($conn);