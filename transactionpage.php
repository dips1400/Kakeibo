<!DOCTYPE html>
<html>
    <head>
    <title>
        Kakeibo-Financial App with Kakeibo System
    </title>
    <meta name="viewport" content="width=device-width , initial-scale=1.0" >
    <link href="transaction.css" rel="stylesheet" type="text/css"/>
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

        </script>
    </body>
</html>