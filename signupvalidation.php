<?php 
//session_start(); 
include "db_conn.php";

if (isset($_POST['user_firstname']) && isset($_POST['user_lastname']) && isset($_POST['emailid'])
    && isset($_POST['upassword'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$user_firstname = validate($_POST['user_firstname']);
    $user_lastname = validate($_POST['user_lastname']);
    $emailid = validate($_POST['emailid']);
	$upassword = validate($_POST['upassword']);
	$repassword = validate($_POST['repassword']);
	$user_data = 'user_firstname='. $user_firstname;

	setcookie('user_firstname',$user_firstname,time()+60*60*7);
	session_start();
	$_SESSION['user_firstname'];

	if (empty($user_firstname)) {
		header("Location: signuppage.php?error=User Name is required&$user_data");
	    exit();
	}
	else if(empty($user_lastname)){
        header("Location: signuppage.php?error=Last Name is required&$user_data");
	    exit();
	}
	else if(empty($emailid)){
        header("Location: signuppage.php?error=email is required&$user_data");
	    exit();
	}

	else if(empty($upassword)){
        header("Location: signuppage.php?error=Password is required&$user_data");
	    exit();
	}

	else if(empty($repassword)){
        header("Location: signuppage.php?error=Re-password is required&$user_data");
	    exit();
	}

	else if(strcmp($upassword,$repassword)!=0){
        header("Location: signuppage.php?error=Re-password is invalid&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $upassword = md5($upassword);

	    $sql = "SELECT * FROM user WHERE user_firstname='$user_firstname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signuppage.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO user(user_firstname,user_lastname,emailid,upassword) VALUES('$user_firstname','$user_lastname','$emailid','$upassword')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: loginpage.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signuppage.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signuppage.php");
	exit();
}