<?php
include("session.php");
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "kakeibo";
$conn = mysqli_connect($servername, $username, $password, $database);

//setcookie('user_firstname',$user_firstname,time()+60*60*7);
$amount = $_POST['amount'];
//$amount1 = $_POST['wbalance'];
$wsource = $_POST['wsource'];
$spend_option = $_POST['spend_option'];

  //session_start();

	$username = $_SESSION['user_firstname'];
  
    $sql = "INSERT INTO ewallet(wbalance, source, spend_option,userid) VALUES ($amount,'$wsource','$spend_option','$userid')";
    $ch = mysqli_query($conn, $sql);

    /*$sql1 = "UPDATE table ewallet SET  wbalance = $total where userid='$userid'";
    $chh = mysqli_query($conn, $sql1);*/

    if (!$ch) {
        die(mysqli_error($conn));
    } else {
        header('Location: wallet.php');
        exit;
    }


    
    mysqli_close($conn);