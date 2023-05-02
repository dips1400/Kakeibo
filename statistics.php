<?php
include("session.php");

$exp_category_dc = mysqli_query($conn, "SELECT expensecategory FROM expenses WHERE userid = '$userid' GROUP BY expensecategory");
  $exp_amt_dc = mysqli_query($conn, "SELECT SUM(expense) FROM expenses WHERE userid = '$userid' GROUP BY expensecategory");

  $exp_date_line = mysqli_query($conn, "SELECT expensedate FROM expenses WHERE userid = '$userid' GROUP BY expensedate");
  $exp_amt_line = mysqli_query($conn, "SELECT SUM(expense) FROM expenses WHERE userid = '$userid' GROUP BY expensedate");

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

    <meta name="viewport" content="width=device-width , initial-scale=1.0" >
    <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Feather JS for Icons -->
  <script src="js/feather.min.js"></script>

    <link href="statistic.css" rel="stylesheet" type="text/css"/>
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
            

            <div class="container2">
        <h3 class="mt-4">Dashboard</h3>

        <h3 class="mt-4">Full-Expense Report</h3>
        <div class="row">
          <div class="col-md">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title text-center">Yearly Expenses</h5>
              </div>
              <div class="card-body">
                <canvas id="expense_line" height="150"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title text-center">Expense Category</h5>
              </div>
              <div class="card-body">
                <canvas id="expense_category_pie" height="150"></canvas>
              </div>
            </div>
          </div>
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
        <script>
    var ctx = document.getElementById('expense_category_pie').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [<?php while ($a = mysqli_fetch_array($exp_category_dc)) {
                    echo '"' . $a['expensecategory'] . '",';
                  } ?>],
        datasets: [{
          label: 'Expense by Category',
          data: [<?php while ($b = mysqli_fetch_array($exp_amt_dc)) {
                    echo '"' . $b['SUM(expense)'] . '",';
                  } ?>],
          backgroundColor: [
            '#6f42c1',
            '#dc3545',
            '#28a745',
            '#007bff',
            '#ffc107',
            '#20c997',
            '#17a2b8',
            '#fd7e14',
            '#e83e8c',
            '#6610f2'
          ],
          borderWidth: 1
        }]
      }
    });

    var line = document.getElementById('expense_line').getContext('2d');
    var myChart = new Chart(line, {
      type: 'line',
      data: {
        labels: [<?php while ($c = mysqli_fetch_array($exp_date_line)) {
                    echo '"' . $c['expensedate'] . '",';
                  } ?>],
        datasets: [{
          label: 'Expense by Month (Whole Year)',
          data: [<?php while ($d = mysqli_fetch_array($exp_amt_line)) {
                    echo '"' . $d['SUM(expense)'] . '",';
                  } ?>],
          borderColor: [
            '#adb5bd'
          ],
          backgroundColor: [
            '#6f42c1',
            '#dc3545',
            '#28a745',
            '#007bff',
            '#ffc107',
            '#20c997',
            '#17a2b8',
            '#fd7e14',
            '#e83e8c',
            '#6610f2'
          ],
          fill: false,
          borderWidth: 2
        }]
      }
    });
  </script>
    </body>
</html>