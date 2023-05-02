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

            <div class="col-6 col-sm-4 info">
                <form action="loginvalidation.php" method="post">

                    <h3>Login</h3>

                    <?php if (isset($_GET['error'])) { ?>

                        <p class="error"><?/*php echo $_GET['error']; */?>

                        <div class="barerror">
                        <div class="close" onclick="this.parentElement.remove()">X</div>
                        <ion-icon name="close-outline"></ion-icon><p>Invalid User Name or Password</p>
                        </div>
                    </p>
                    <?php } ?>

                    <!--<label>User Name</label>-->

                    <input type="text" name="emailid" placeholder="Email id or User Name " class="username" style="font-style: italic;font-size:medium"><br>

                    <!--<label>Password</label>-->

                    <input type="password" name="upassword" placeholder="Password" class="password" style="font-style: italic;font-size:medium"><br> 

                    <button type="submit" class="button">LOGIN</button>

                    <a href="#" class="pass">Forgot password?</a>
                    <p class="signn">Don't have registered account? <span id="signupp"><a href="/kakeibo/signuppage.php">Sign Up</a></span></p>

                </form>
            </div>
        </div>
     </div>
     <script>
     function bootstrapAlert(){
         
         allow_dismiss:true;
     }
     </script>
    </body>
</html>