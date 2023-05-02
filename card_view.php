<?php
include("session.php");
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "kakeibo";
$conn = mysqli_connect($servername, $username, $password, $database);
session_start();

	$username = $_SESSION['user_firstname'];
  
    $sql = "SELECT  ewallet(wbalance, source, spend_option) VALUES ($amount,'$wsource','$spend_option')";
    $ch = mysqli_query($conn, $sql);