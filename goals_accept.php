<?php
include("session.php");
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "kakeibo";
$conn = mysqli_connect($servername, $username, $password, $database);
//session_start();
$goal_name = $_POST['goal_name'];
$amount = $_POST['amount'];
$id = $_REQUEST['id'];
$sql = "INSERT INTO goals(goal_name,amount,userid,id) VALUES('$goal_name',$amount,'$userid','$id')";
$ch = mysqli_query($conn, $sql);

if (!$ch) {
        die(mysqli_error($conn));
    } else {
        header('Location: goals.php');

        exit;
    }

    
    mysqli_close($conn);

