<?php
	session_start();
	session_destroy();
 
	if (isset($_COOKIE["user_firstname"]) AND isset($_COOKIE["upassword"])){
		setcookie("user_firstname", '', time() - (3600));
		setcookie("upassword", '', time() - (3600));
	}
 
	header('location:kakeibo_landingpage.html');
?>
	

