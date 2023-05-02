<?php
include("db_conn.php");
session_start();
if(!isset($_SESSION["emailid"])){
header("Location: login.php");
exit();
}

$sess_email = $_SESSION["emailid"];
$sql = "SELECT userid, user_firstname, user_lastname, emailid ,profile_path FROM user WHERE emailid = '$sess_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $userid=$row["userid"];
    $firstname = $row["user_firstname"];
    $lastname = $row["user_lastname"];
    $username =$row["user_firstname"]." ".$row["user_lastname"];
    $useremail=$row["emailid"];
    $userprofile="uploads/".$row["profile_path"];
  }
} else {
    $userid="GHX1Y2";
    $username ="Jhon Doe";
    $useremail="mailid@domain.com";
    $userprofile="Uploads/default_profile.png";
}

?>