<?php 
session_start(); 
include "db_conn.php";


if (isset($_POST['emailid']) && isset($_POST['upassword'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$emailid = validate($_POST['emailid']);
	$upassword = validate($_POST['upassword']);

	setcookie('user_firstname',$user_firstname,time()+60*60*7);
	setcookie('upassword',$upassword,time()+60*60*7);
	session_start();
	$_SESSION['user_firstname'];

	if (empty($emailid)) {
		header("Location: loginpage.php?error=User Name or email is required");
	    exit();
	}else if(empty($upassword)){
        header("Location: loginpage.php?error=Password is required");
	    exit();
	}else{
        $upassword = md5($upassword);
		$sql = "SELECT * FROM user WHERE emailid='$emailid' AND upassword='$upassword'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['emailid'] === $emailid && $row['upassword'] === $upassword) {
            	$_SESSION['emailid'] = $row['emailid'];
            	$_SESSION['user_firstname'] = $row['user_firstname'];
            	$_SESSION['userid'] = $row['userid'];
                //echo 'alert("Sucessfully login..!!")';
                
            	header("Location: kakeibo.php");
		        exit();
                $message = "Successful login";
                echo "<script type='text/javascript'>alert('$message');</script>"; 
            }else{
				header("Location: loginpage.php?error=Incorect User name or password");
		        exit();
			}
		}
		else{
			header("Location: loginpage.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: loginpage.php");
	exit();
}