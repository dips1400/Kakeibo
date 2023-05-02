<?php
include("session.php");
/*
$sql1 = "SELECT saving_amount FROM savings,user WHERE savings.userid = user.userid and user.userid = '$userid'";
$result1 = mysqli_query($conn, $sql1);
*/
$sql2 = "SELECT saving_amount from savings where userid=$userid";
//$result= mysqli_query($conn,$sql2);
$result = $conn->query($sql2);
$row = $result->fetch_assoc();
if($result->num_rows > 0){
    $saving_amount = $row['saving_amount'];
}

$sql3 = "SELECT details,amount_to_save from biggersavings where userid=$userid";
//$result= mysqli_query($conn,$sql2);
$result = $conn->query($sql3);
$row2 = $result->fetch_assoc();
if($result->num_rows > 0){
    $details = $row2['details'];
    $amount_to_save = $row2['amount_to_save'];
   // $updated_amount = $row['updated_amount'];
}

$sql4 = "SELECT finalamt from b_s where userid=$userid";
//$result= mysqli_query($conn,$sql2);
$result = $conn->query($sql4);
$row4 = $result->fetch_assoc();
if($result->num_rows > 0){
    $finalamt = $row4['finalamt'];
   // $updated_amount = $row['updated_amount'];
}


?>

<!DOCTYPE html>
<html>
    <head>
    <title>
        Kakeibo-Financial App with Kakeibo System
    </title>
    <meta name="viewport" content="width=device-width , initial-scale=1.0" >
    <link href="savingsss.css" rel="stylesheet" type="text/css"/>
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
            <div class="piggy-saving">
                <h3>Small savings for your bigger dream</h3>

                <div class="multiple-divs">
                    <div class="div-1">
                        <div class="add-amt">
                            <h4>Add amount to your savings</h4><br>
                                <form action="dreams.php" method="POST">
                                <label for="piggysaving-dtls">Saving details&nbsp;&nbsp;</label>
                                <input type="text" id="cname" name="details" placeholder="For eg: Savings for future dream" style="height: 40px;border: 0.7px light;width:28%"><span>&nbsp;&nbsp;
                                <input type="number" id="expmonth" name="amount_to_save" placeholder="Amount" style="height: 40px;border: 0.7px light;width:20%"></span>&nbsp;&nbsp;
                                <input type="submit" value="Update" onclick="alert('Details Added Successfully!');" class="btn" style="height: 40px;border: 0.7px light;width:12%">
                                </form>
                        </div><br>
                        <div class="only-update">
                        <form action="dream2.php" method="POST">
                            <input type="number" id="expmonth" name="final_amt" placeholder="Add Amount
                            <?php
                            ini_set('display_errors','Off');
                            echo "(Amount < $saving_amount)"; 
                            ?>
                            " style="height: 40px;border: 0.7px light;width:30%"></span>&nbsp;&nbsp;
                            <!--<input type="submit" value="Add amount" onclick="alert('Money Added Successfully!');" class="btn" style="height: 40px;border: 0.7px light;width:12%">-->
                        <input type="submit" value="Add amount"  onclick="alert('Money Added Successfully!');" class="btn" style="height: 40px;border: 0.7px light;width:12%">
                        </form>
                        </div>
                    </div>
                    <div class="div-2">
                            <h4>Your piggy savings</h4><br>
                            <table id="goals">
                                
                                <tr>
                                    <th>Saving name</th>
                                    <th>Amount to be saved</th>
                                    <th>Amount saved till now</th>
                                    <th>Progress</th>
                                </tr>
                                <tr>
                                    <?php ini_set('display_errors','Off'); ?>
                                    <td><?php echo $details;?> </td>
                                    <td><?php echo $amount_to_save;?></td>
                                    <td><?php echo $finalamt; ?></td>
                                
                                    <td>
                                    <div id="myProgress" style="width: 80%;background-color: #ddd;">
                                    <div id="myBar" style="width: <?php echo $percent.'%'; ?>;height: 30px;background-color: #4CAF50;text-align: center;line-height: 30px;color: white;">
                                    <?php echo $percent.'%'; ?>
                                    </div></td>
                                </tr>
                            </table>
                            <!-- Modal content -->
                            <!--<div id="myModal" class="modal">

                                <div class="modal-content">
                                <span class="close">&times;</span>
                                <form action="piggyupdateamount.php" method="POST">
                                <label for="add_amount">Add Amount</label><br><br>
                                <input type="number" id="expmonth" name="updatedamount" placeholder="Amount" style="height: 40px;border: 0.1px light;width:28%"></span>&nbsp;&nbsp;
                                <button value="Add amount" class="btn" style="height: 40px;border: 0.7px light;width:18%;background-color:#39A388;color:#fff;border:none">Add amount</button>
                                </form>
                                </div>

                                </div>-->
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