<!DOCTYPE html>
<html>
    <head>
        <title>Kakeibo login page</title>
        <link href="loginstyle.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--heading-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
        <!--fontawesome -->
        <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-4 img">
                    <p>Spend smart and save more<br>with Kakeibo.</p>
                    <img src="assets/images/login2.png" class="image">
                </div>

            <!-- Force next columns to break to new line at md breakpoint and up -->
            <!--<div class="w-100 d-none d-md-block info">
            </div>-->

                <div class="col-6 col-sm-4 info2">
                    <form action="signupvalidation.php" method="post">

                    <!--<div class="alert alert-danger" role="alert">
                    <?php //echo $_GET['error']; ?>
                    </div>-->
                        <h3>Sign Up</h3>
                        
                        <?php if(isset($_GET['error'])){
                            ?>
                            <p class="error"><?php echo $_GET['error']; ?> </p>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                            <p class="success"><?php echo $_GET['success']; ?></p>
                        <?php } ?>

                        <p class="signn">Already have registered account ? <span id="signupp"><a href="/kakeibo/loginpage.php">Login</a></span></p>
                        <!--<label>User Name</label>-->

                        <input type="text" name="user_firstname" placeholder="First Name " class="username" style="font-style: italic;font-size:medium" pattern="[a-zA-Z]*"><br>

                        <input type="text" name="user_lastname" placeholder="Last Name" class="username" style="font-style: italic;font-size:medium" pattern="[a-zA-Z]*"><br> 

                        <input type="email" name="emailid" placeholder="Email Id" class="username" style="font-style: italic;font-size:medium"><br> 
                        <!--<label>Password</label>-->

                        <input type="password" name="upassword" placeholder="Password" class="password" style="font-style: italic;font-size:medium" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br>

                        <input type="password" name="repassword" placeholder="Re-enter password" class="password" style="font-style: italic;font-size:medium"><br>

                        <button type="submit" name="signup" class="button">SIGN UP</button>
                    </form>
                    <br>
                        <div class="hr">
                            <hr><span>
                            <p>Or continue with</p></span><span><hr class="hr2"></span>
                            <br>
                            <div class="logo"><a href="#" class="google"><img src="/kakeibo/assets/images/google.png"></a>
                            <span><a href="#" class="fb"><img src="/kakeibo/assets/images/facebook.png"></a></span>
                            <span><a href="#" class="apple"><img src="/kakeibo/assets/images/apple-logo.png"></a></span></div>
                        </div>
                </div>
            </div>
        </div>
    </body>
</html>