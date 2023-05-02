<?php 
include("session.php");
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "kakeibo";
$conn = mysqli_connect($servername, $username, $password, $database);

    //These variables are collecting form data
$accountnum = $_POST['accountnum'];
$spendoption = $_POST['spendoption'];
$amount = $_POST['amount'];
      
$username = $_SESSION['user_firstname'];
        $sql = "INSERT INTO transaction(userid,ewalletid,amount,spendoption,accountnum) VALUES ('$userid',null,'$amount','$spendoption','$accountnum')";
        $ch = mysqli_query($conn, $sql);
   
    if (!$ch) {
        die(mysqli_error($conn));
    } else {
        header('Location: notebookb.php');
        exit;
    }
    
    mysqli_close($conn);