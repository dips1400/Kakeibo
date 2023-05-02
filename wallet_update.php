<?php
include("session.php");
//include_once "wallet_info.php";
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "kakeibo";
$conn = mysqli_connect($servername, $username, $password, $database);

//setcookie('user_firstname',$user_firstname,time()+60*60*7);
$amount = $_REQUEST['amount'];
$amount2 = $_POST['amount2'];
$wsource2 = $_POST['wsource2'];

$tot = (int)$amount + (int)$amount2;

  //session_start();

	$username = $_SESSION['user_firstname'];

    $sql1 = "UPDATE table ewallet SET  wbalance = $tot where userid=$userid";
    $chh = mysqli_query($conn, $sql1);

    if (!$chh) {
        die(mysqli_error($conn));
    } else {
        header('Location: wallet.php');
        exit;
    }

    
    mysqli_close($conn);