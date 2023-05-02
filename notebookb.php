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
  
    <link href="notebookb.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
        
            <div class="navigation" id="navv">
                <ul>
                    <li>
                        <a href="#" class="titlename">
                            <span class="icon"></span>
                            <span class="title">Kakeibo</span>
                        </a>
                        
                    </li>
                    <li>
                        <a href="kakeibo.php" class="titlename">
                            <?php //echo $current_url == "kakeibo.php" ? $active : ''; ?>
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="transactionpage.php" class="titlename">
                            <?php //echo $current_url == "kakeibo-transaction.php" ? $active : ''; ?>
                            <span class="icon"><ion-icon name="card-outline"></ion-icon></span>
                            <span class="title">Transaction History</span>
                        </a>
                    </li>
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
                    <li><span class="icon"><button onclick="history.go(-1);"><< Back </button></span>
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
                </div>
                
            </div>

            


            <!--money transfer-->
            <div class="row">
  <div class="col-75">
    <div class="container2">
      <form action="action_page.php" method="POST">

       <!-- <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>-->

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Spend on</label>
            <input type="text" id="cname" name="spendoption" placeholder="Grocery">
            <label for="ccnum">Account number</label>
            <input type="text" id="ccnum" name="accountnum" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Amount</label>
            <input type="number" id="expmonth" name="amount" placeholder="Amount" style="height: 40px;border: 0.7px light;width:100%">
          </div>

        
        <input type="submit" value="Proceed for payment" class="btn">
      </form>
    </div>
  </div>
            </div>

<!--end-->
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

        </script>
    </body>
</html>