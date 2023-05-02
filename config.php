<?php
session_start();
 
require_once "vendor/autoload.php";
require_once "db_conn.php";
 
/*use Omnipay\Omnipay;
 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51Kr3vgSGf4CbJOcL3623eXdhEp8s58tCH7hP5yLCS5TN5GaW2KvSW7iltAD76KHraBWx4pqInRVooLeWHglgMdy000MQSr7kaK');
define('STRIPE_SECRET_KEY', 'sk_test_51Kr3vgSGf4CbJOcL35Suut5UWqOQwmxr7pAK7e34QU9dGI5vnU2aPRFAYcsFgfwueF3qmnKiKxwCJClKEy2WyHt400BtVTxg6C');
define('RETURN_URL', 'http://localhost/kakeibo/confirm.php');
define('PAYMENT_CURRENCY', 'INR');
 
$gateway = Omnipay::create('Stripe\PaymentIntents');
$gateway = Omnipay::setApiKey('STRIPE_SECRET_KEY');
$gateway -> setApiKey(STRIPE_SECRET_KEY);*/


// Product Details 
// Minimum amount is $0.50 US 
// Test Stripe API configuration 

define('STRIPE_API_KEY', 'sk_test_51Kr3vgSGf4CbJOcL35Suut5UWqOQwmxr7pAK7e34QU9dGI5vnU2aPRFAYcsFgfwueF3qmnKiKxwCJClKEy2WyHt400BtVTxg6C');  
define('STRIPE_PUBLISHABLE_KEY', 'sk_test_51Kr3vgSGf4CbJOcL35Suut5UWqOQwmxr7pAK7e34QU9dGI5vnU2aPRFAYcsFgfwueF3qmnKiKxwCJClKEy2WyHt400BtVTxg6C'); 

define('STRIPE_SUCCESS_URL', 'http://localhost/stripe/success.php'); 
define('STRIPE_CANCEL_URL', 'http://localhost/stripe/cancel.php'); 

// Database configuration   
define('DB_HOST', 'localhost:3307');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', '');  
define('DB_NAME', 'kakeibo'); 
?>
