<?php
include("session.php");
//session_start();
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "kakeibo";
$conn = mysqli_connect($servername, $username, $password, $database);
//$user_firstname =$_POST['user_firstname'];
//setcookie('user_firstname',$user_firstname,time()+60*60*7);
$amount= $_POST['amount'];
$cardbankname = $_POST['cardbankname'];
$cardno = $_POST['cardno'];
$cardcvv = $_POST['cardcvv'];
$cardexpirydate = $_POST['cardexpirydate'];
$cardtype = $_POST['cardtype'];

  session_start();

	$_SESSION['user_firstname'];
  setcookie('user_firstname',$user_firstname,time()+60*60*7);
  date_default_timezone_set("Asia/Kolkata");
  $dt = date("Y-m-d");
  $tm = date("H:i:s");

  //echo $dt." ".$tm;

  //$sql = "INSERT INTO card(cardid,cardtype,cardbankname, cardexpirydate,cardcvv,cardno,userid,ewalletid, amount) VALUES (null,'$cardtype','$cardbankname','$cardexpirydate','$cardcvv','$cardno',(select userid from user),(select ewalletid from ewallet),'$amount')";
  $sql = "INSERT INTO card(cardtype,cardbankname,cardexpirydate,cardcvv,cardno,amount,userid) VALUES ('$cardtype','$cardbankname','$cardexpirydate','$cardcvv','$cardno','$amount','$userid')";
  $ch = mysqli_query($conn, $sql);

 /* $sqlq = "INSERT INTO card_user(userid,cardid,amount) values('','','$amount')";
  $chh = mysqli_query($conn, $sqlq);*/
  /*$updtBal = "UPDATE Balance SET Bal = (Bal + $amnt)  WHERE MobileNo = $mobNo";
  mysqli_query($conn, $updtBal);*/

  



  if (!$ch) {
      die(mysqli_error($conn));
  
  }else{
      header('Location: /kakeibo/wallet.php');
      exit;
  }
  
  mysqli_close($conn);
?>
