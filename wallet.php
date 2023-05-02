<?php
include("session.php");

?>


<!DOCTYPE html>
<html>
    <head>
    <title>
        Kakeibo-Financial App with Kakeibo System
    </title>
    <meta name="viewport" content="width=device-width , initial-scale=1.0" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link href="wallet.css" rel="stylesheet" type="text/css"/>
    <script src="https://js.stripe.com/v3/"></script>
    </head>
    <body>
        <div class="container">
       
          <div class="navigation" id="navv">
          <!--<button onclick="history.go(-1);"><< Back </button>-->
          <br>
                <ul>
                <span class="icon"><button onclick="history.go(-1);"><< Back </button></span>
                <li>
                        <a href="#" class="titlename">
                            <?php //echo $current_url == "kakeibo.php" ? $active : ''; ?>
                            <span class="title">Kakeibo</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="titlename">
                            <?php //echo $current_url == "kakeibo.php" ? $active : ''; ?>
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title">Home</span>
                        </a>
                    </li>
                    <!--<li>
                        <a href="#" class="titlename">
                            <?php //echo $current_url == "kakeibo-transaction.php" ? $active : ''; ?>
                            <span class="icon"><ion-icon name="card-outline"></ion-icon></span>
                            <span class="title">Transaction History</span>
                        </a>
                    </li>-->
                    <li>
                        <a href="wallet.php" class="titlename">
                            <?php //echo $current_url == "kakeibo-wallet.php" ? $active : ''; ?>
                            <span class="icon"><ion-icon name="wallet-outline"></ion-icon></span>
                            <span class="title">Wallet</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="titlename">
                            <?php //echo $current_url == "kakeibo-achievements.php" ? $active : ''; ?>
                            <span class="icon"><ion-icon name="trophy-outline"></ion-icon></span>
                            <span class="title">Achievements</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="titlename">
                            <?php //echo $current_url == "kakeibo-statistics.php" ? $active : ''; ?>
                            <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
                            <span class="title">Statistics</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="titlename">
                            <?php //echo $current_url == "kakeibo-setting.php" ? $active : ''; ?>
                            <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                            <span class="title">Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php" class="titlename">
                            <?php //echo $current_url == "kakeibo-setting.php" ? $active : ''; ?>
                            <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                            <span class="title">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                    <ion-icon name="menu-outline" class="iconn"></ion-icon>
                    </div>
                    <div class="etitle">
                        <p>Kakeibo E-wallet</p>
                    </div>
                </div>
                <div class="container2">
                    <p>Your card</p>
                 

                    <!-- Button trigger modal -->
                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter" id="btn2">
                        Add card
                        </button>
<!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Card details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action="card.php" method="POST">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                                <div class="wizard-header">
                                <h4>
                                    ENTER CREDENTIALS <br>
                                </h4>
                                </div>

                                <!--<div class="wizard-navigation">
                                <ul>
                                    <li><a href="#about" data-toggle="tab"></a></li>
                                </ul>

                                </div>-->

                                <div class="tab-content">

                                <div class="col-sm-8 col-sm-offset-2">

                                    <div class="form-group">
                                    <input name="cardbankname" type="text" class="form-control" placeholder="card bank name">
                                    </div>
                                    <div class="form-group">
                                    <input name="cardno" type="Number" class="form-control" placeholder="Card Number">
                                    </div>
                                    <div class="form-group">
                                    <input name="cardcvv" type="Number" class="form-control" placeholder="CVV">
                                    </div>
                                    <div class="form-group">
                                    <input name="cardexpirydate" type="number" class="form-control" placeholder="Expiry Date">
                                    </div>
                                    <div class="form-group">
                                    <input name="cardtype" type="text" class="form-control" placeholder="Card Type">
                                    </div>
                                    <div class="form-group">
                                    <input name="amount" type="Number" class="form-control" placeholder="Amount">
                                    </div>

                                    <div class="col-sm-6 col-sm-offset-3">
                                    <input type="submit" onclick="alert('Card Added Successfully!');"
                                        class="btn btn-info btn-block btn-primary active" value="Submit">
                                    </div>

                                </div>

                                </div>

                            </div>
                        </div>

          </form>
                            </div>
                        </div>



                           

                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleview" id="btn3">
                        View card

                        </button>

                        <div class="modal fade" id="#exampleview" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Card details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action="card_view.php" method="POST">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                                <div class="wizard-header">
                                <h4>
                                    CARD CREDENTIALS <br>
                                </h4>
                                </div>

                                <!--<div class="wizard-navigation">
                                <ul>
                                    <li><a href="#about" data-toggle="tab"></a></li>
                                </ul>

                                </div>-->

                                <div class="tab-content">

                                <div class="col-sm-8 col-sm-offset-2">

                                    <div class="form-group">
                                    <input name="cardbankname" type="text" class="form-control" placeholder="card bank name">
                                    </div>
                                    <div class="form-group">
                                    <input name="cardno" type="Number" class="form-control" placeholder="Card Number">
                                    </div>
                                    <div class="form-group">
                                    <input name="cardcvv" type="Number" class="form-control" placeholder="CVV">
                                    </div>
                                    <div class="form-group">
                                    <input name="cardexpirydate" type="number" class="form-control" placeholder="Expiry Date">
                                    </div>
                                    <div class="form-group">
                                    <input name="cardtype" type="text" class="form-control" placeholder="Card Type">
                                    </div>
                                    <div class="form-group">
                                    <input name="amount" type="Number" class="form-control" placeholder="Amount">
                                    </div>

                                    <div class="col-sm-6 col-sm-offset-3">
                                    <input type="btn" onclick="alert('Card Added Successfully!');"
                                        class="btn btn-info btn-block btn-primary active" value="close">
                                    </div>

                                </div>

                                </div>

                            </div>
                        </div>

          </form>
                            </div>
                        </div>




                        <p class="cardp">Card amount</p>
                        <span><p class="amt"><?php

                            $servername = "localhost:3307";
                            $username = "root";
                            $password = "";
                            $database = "kakeibo";
                            $conn = mysqli_connect($servername, $username, $password, $database);

                            ini_set('display_errors','Off');
                           // session_start();
                            
                           //$amount= $_POST['amount'];
                            $_SESSION['user_firstname'];
                            //$_SESSION['cardid'];
                                /*$sql = "SELECT amount FROM card";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $amount = $row["amount"];*/
                               // echo "$amount";

                               $sql = "SELECT amount FROM card where userid = '$userid'";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $amount = $row['amount'];
                               // echo "$amount";

                            if ($amount>0){
                                
                                echo "$amount";   
                            }
                            else{
                                echo"Add card details to view amount.";
                            }
                         //  $userid = $_REQUEST['userid'];

                         


                               /* $sql = "SELECT amount FROM card_user where userid = cardid";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $amount = $row['amount'];
                                echo "$amount";
                           // $amount = $_POST["amount"];
                           /*if (mysql_num_rows( $row )){
                                echo "<meta http-equiv='refresh' content='0'>";
                                $amount = $row['amount'];
                                $amt = mysqli_query($_REQUEST["amount"],"update card set amount=$amount where cardid=$cardid");
                                echo "$amt";
                            
                            }
                            else{
                                echo"Add card details to view amount.";
                            }*/
                            ?></p></span>
                        </div>
                        



                        <div class="container3">
                            <p>Ewallet Balance</p>
                            <!--<p class="amt"><?php
                            //$sql = "SELECT amount FROM ewallet where ewalletid = userid ";
                           // $result = $conn->query($sql);
                           // echo $row['amount'];
                            
                            ?></p>-->
                        <div class="card_btn">
                            <button type="button" class="btn" data-toggle="modal" data-target="#examplewalletadd" id="btn4">
                        Add wallet
                        </button>

                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleaddmoney" id="btn5">
                        Add money 
                        </button>


                        <div id="myModal" class="modal">

                        <!-- Modal content -->
                            <div class="modal-content">
                               <span class="close">&times;</span>
                              
                                <div class="modal-body" >
                            <form action="wallet_update.php" method="POST">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                                <div class="wizard-header">
                                <h4>
                                    ENTER WALLET MONEY CREDENTIALS <br>
                                </h4>
                                </div>

                                <!--<div class="wizard-navigation">
                                <ul>
                                    <li><a href="#about" data-toggle="tab"></a></li>
                                </ul>

                                </div>-->

                                <div class="tab-content">

                                <div class="col-sm-8 col-sm-offset-2">

                                    <div class="form-group">
                                    <input name="amount2" type="Number" class="form-control" placeholder="Add money to wallet">
                                    </div>
                                    <div class="form-group">
                                    <input name="wsource2" type="text" class="form-control" placeholder="Money source">
                                    </div>            

                                    <div class="col-sm-6 col-sm-offset-3">
                                    <input type="submit" onclick="alert('Money added successfully to wallet!');"
                                        class="btn btn-info btn-block btn-primary active" value="Submit">
                                    </div>

                                </div>

                                </div>
                            </form>
                            </div>
                            </div>

                        </div>

                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter" id="btn6">
                        Use wallet
                        </button>

                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter" id="btn7">
                        View card info
                        </button>

                        <div class="modal fade" id="examplewalletadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Card details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action="wallet_info.php" method="POST">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                                <div class="wizard-header">
                                <h4>
                                    ENTER WALLET CREDENTIALS <br>
                                </h4>
                                </div>

                                <!--<div class="wizard-navigation">
                                <ul>
                                    <li><a href="#about" data-toggle="tab"></a></li>
                                </ul>

                                </div>-->

                                <div class="tab-content">

                                <div class="col-sm-8 col-sm-offset-2">

                                    <div class="form-group">
                                    <input name="amount" type="Number" class="form-control" placeholder="Add Inital Amount">
                                    </div>
                                    <div class="form-group">
                                    <input name="wsource" type="text" class="form-control" placeholder="Wallet source">
                                    </div>
                                    <div class="form-group">
                                    <input name="spend_option" type="text" class="form-control" placeholder="Mostly spend option">
                                    </div>
                                    <!--<div class="form-group">
                                    <input name="cvv" type="Number" class="form-control" placeholder="CVV">
                                    </div>
                                    <div class="form-group">
                                    <input name="expdate" type="Date" class="form-control" placeholder="Expiry Date">
                                    </div>
                                    <div class="form-group">
                                    <input name="cardtype" type="text" class="form-control" placeholder="Card Type">
                                    </div>-->


                                    <div class="col-sm-6 col-sm-offset-3">
                                    <input type="submit" onclick="alert('Wallet Added Successfully!');"
                                        class="btn btn-info btn-block btn-primary active" value="Submit">
                                    </div>

                                </div>

                                </div>

                            </div>
                        </div>

          </form>
                            </div>
                        </div>







                        </div>

                        <div class="card_btn">
                        <!--add money-->
                        <div class="modal fade" id="#exampleaddmoney" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Money details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action="wallet_info.php" method="POST">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                                <div class="wizard-header">
                                <h4>
                                    Add Money to wallet <br>
                                </h4>
                                </div>

                                <!--<div class="wizard-navigation">
                                <ul>
                                    <li><a href="#about" data-toggle="tab"></a></li>
                                </ul>

                                </div>-->

                                <div class="tab-content">

                                <div class="col-sm-8 col-sm-offset-2">

                                    <div class="form-group">
                                    <input name="amount1" type="Number" class="form-control" placeholder="Add Amount">
                                    </div>
                                    <div class="form-group">
                                    <input name="wsource" type="text" class="form-control" placeholder="money source">
                                    </div>
                                    <!--<div class="form-group">
                                    <input name="cvv" type="Number" class="form-control" placeholder="CVV">
                                    </div>
                                    <div class="form-group">
                                    <input name="expdate" type="Date" class="form-control" placeholder="Expiry Date">
                                    </div>
                                    <div class="form-group">
                                    <input name="cardtype" type="text" class="form-control" placeholder="Card Type">
                                    </div>-->


                                    <div class="col-sm-6 col-sm-offset-3">
                                    <input type="submit" onclick="alert('Money Added Successfully!');"
                                        class="btn btn-info btn-block btn-primary active" value="Submit">
                                    </div>

                                </div>

                                </div>

                            </div>
                        </div>

          </form>
                            </div>
                        </div>
                        </div>
                        <!--<p class="walletp">Ewallet amount</p>-->
                        <span><p class="amt">
                <?php

                            $servername = "localhost:3307";
                            $username = "root";
                            $password = "";
                            $database = "kakeibo";
                            $conn = mysqli_connect($servername, $username, $password, $database);

                            ini_set('display_errors','Off');
                           // session_start();
                            
                           //$amount= $_POST['amount'];
                            $_SESSION['user_firstname'];
                            //$_SESSION['cardid'];
                                /*$sql = "SELECT amount FROM card";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $amount = $row["amount"];*/
                               // echo "$amount";

                               $sql = "SELECT wbalance FROM ewallet where userid = '$userid'";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $wbalance = $row['wbalance'];
                               // echo "$amount";

                            if ($amount>0){
                                
                                echo "$wbalance";   
                            }
                            else{
                               // echo"Add wallet details to view amount.";
                            }
                        
                            ?></p></span></p>
                        </div>

                </div>
                
                </div>

        </div>










        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <script>
            //menutoggle
            let toggle= document.querySelector('.toggle');
            let navigation = document.querySelector('.navigation');
            let main = document.querySelector('.main');

            toggle.onclick = function(){
                navigation.classList.toggle('active');
                main.classList.toggle('active')
            }
            /*//add hovering class
            let list = document.querySelectorAll('.navigation ul li');
            function activelink(){
                list.forEach((item) =>
                item.classList.remove('hovered'));
                this.classList.add('hovered');
            }
            list.forEach((item) =>
            item.addEventListener('mouseover',activelink))*/

            // Add active class to the current button (highlight it)
            var header = document.getElementById("navv");
            var titlename = header.getElementsByClassName("titlename");
            for (var i = 0; i < titlename.length; i++) {
            titlename[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
            });
            }

            $(window).load(function () {
                $(".success").click(function(){
                $('.success').show();
                });
                $('.success').click(function(){
                    $('.success').hide();
                });
                $('.popupCloseButton').click(function(){
                    $('.success').hide();
                });
            });


            $(window).load(function () {
                $(".error").click(function(){
                $('.error').show();
                });
                $('.error').click(function(){
                    $('.error').hide();
                });
                $('.popupCloseButton').click(function(){
                    $('.error').hide();
                });
            });
        </script>

<script>
      // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("btn5");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>









      <script>
        var publishable_key = '<?php echo STRIPE_PUBLISHABLE_KEY; ?>';
        </script>
        <script src="card.js"></script>
    </body>
</html>