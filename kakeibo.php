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
    <link href="kakeibo_dash.css" rel="stylesheet" type="text/css"/>

    <!--calendar-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>

  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'load.php',
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
     var title = prompt("Enter Event Title");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url:"insert.php",
       type:"POST",
       data:{title:title, start:start, end:end},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
      }
     });
    },

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    },

   });
  });
   
  </script>


    <!--calendar-->
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
                        <a href="#" class="titlename">
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
                        <a href="statisticss.php" class="titlename">
                            <?php //echo $current_url == "kakeibo-statistics.php" ? $active : ''; ?>
                            <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
                            <span class="title">Statistics</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php" class="titlename">
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
            
            <!--main container -->
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                        <ion-icon name="menu-outline" class="iconn"></ion-icon>
                    </div>
                        <div class="search">
                            <label>
                                <input type="text" placeholder="Search here">
                                <ion-icon name="search-outline" ></ion-icon>
                            </label>
                        </div>

                        <!--user info container top right -->
                        <div class="user">
                            <a href="profile.php"><img src="<?php echo $userprofile ?>" alt="user-profile-pic" class="img"></a>
                            <br>
                            <div class="user_info"><?php
                          //  session_start();
                            echo"Welcome ".$_SESSION['user_firstname'];
                            //setcookie('user_firstname',$user_firstname,time()+60*60*7);
                            ?></div>
                        </div>

                </div>

                <div class="calendar">
                            <div class="card">
                            <p><a href="index.php">Calendar</a></p>
                           
                            <div id="calendar">
                                <img src="assets/images/calendar.jpg" width="290px" height="300px">
                            </div>
                            
                            </div>
                            
                </div>

                


                <!--cardsss-->
                <a href="piggysaving.php"><div class="cardbox">
                    <!--card 1-->
                    <div class="card">
                        
                        <div>
                            <div class="icon-img">
                                <img src="assets/images/piggy-bank.png" width="40px" height="40px">
                            </div>
                        </div>
                        <div>
                            <div class="piggy-savings">Piggy Savings</div>
                            <div class="total-piggy-score">Total progress : 50%</div>
                        </div>
                    </div></a>
                    <!--card 2-->
                    <div class="card">
                    <a href="savingfordream.php">
                        <div>
                            <div class="icon-img">
                                <img src="assets/images/salary.png" width="40px" height="40px">
                            </div>
                        </div>
                        <div>
                            <div class="dream-savings">Savings for dreams</div>
                            <div class="total-dream-score">Total progress : 50%</div>
                        </div></a>
                    </div>
                    <!-- card 3-->
                    <div class="card">
                        <a href="goals.php">
                        <div>
                            <div class="icon-img">
                                <img src="assets/images/goal.png" width="40px" height="40px">
                            </div>
                        </div>

                        <div>
                            <div class="goals">Your Goals</div>
                            <div class="goal-score">Total progress : 50%</div>
                        </div></a>
                    </div>
                    <!--card 4-->
                    <div class="card">
                        
                        <div>
                            <div class="icon-img">
                                <img src="assets/images/wallet (1).png" width="40px" height="40px">
                            </div>
                        </div>
                        <div>
                            <div class="wallet">Your Wallet</div>
                            <div class="wallet-score">Total amount : Rs.30,000</div>
                        </div>
                    </div>
                </div>

                <div class="cardbox2">
                    <!--card 1-->
                    <div class="card2" id="a">
                        
                    <a href="manage_expense.php" class="notebooklink"><div>
                            <div class="notebook">
                                Notebook A
                            </div>
                        </div>
                    </div></a>
                    <div class="card2" id="b">
                    <a href="notebookb.php" class="notebooklink"><div >
                            <div class="notebook">
                                Notebook B
                            </div>
                        </div></a>
                    </div>
                    <div class="card2" id="c">
                    <a href="#" class="notebooklink"><div>
                            <div class="notebook2">
                                Scan
                            </div>
                        </div>
                        <div>
                            <div class="img2">
                                <img src="assets/images/scan.png" width="26px" height="26px">
                            </div>
                        </div></a>
                    </div>
                    <div class="card2" id="d">
                    <a href="#" class="notebooklink"><div>
                            <div class="notebook2">
                                Send
                            </div>
                        </div>
                        <div>
                            <div class="img2">
                                <img src="assets/images/send-mail.png" width="26px" height="26px">
                            </div>
                        </div></a>
                    </div>
                    
                </div>

                <!--statistic block-->
                <div class="report-block">
                    <div class="statistic">
                        <div class="statistic-header">
                            <h4>Statistical <br>Report</h4>
                                </div>
                            <!--<div class="date-picker">
                                <?php 
                                /*-----for month-----*/
                                /*$selected_month = date('m'); //current month

                                echo '<select id="month" name="month">'."\n";
                                for ($i_month = 1; $i_month <= 12; $i_month++) { 
                                    $selected = ($selected_month == $i_month ? ' selected' : '');
                                    echo '<option value="'.$i_month.'"'.$selected.'>'. date('F', mktime(0,0,0,$i_month)).'</option>'."\n";
                                }
                                /*-----for year-----*/
                               /* echo '</select>'."\n";
                                $year_start  = 1940;
                                $year_end = date('Y'); // current Year
                                $user_selected_year = 1992; // user date of birth year

                                echo '<select id="year" name="year">'."\n";
                                for ($i_year = $year_start; $i_year <= $year_end; $i_year++) {
                                    $selected = ($user_selected_year == $i_year ? ' selected' : '');
                                    echo '<option value="'.$i_year.'"'.$selected.'>'.$i_year.'</option>'."\n";
                                }
                                echo '</select>'."\n";*/

                                $current = new DateTime();
                                $end = new DateTime('2018-04-11');

                                echo '<select>';
                                while ($current > $end) {
                                echo '<option>' . $current->format('M, Y') . '</option>';
                                $current->modify('-1 month');
                                }
                                echo '</select>';
                                ?>
                            </div>-->
                            <div class="rows">
                                        <!--<div class="col-md">
                                            <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title text-center">Yearly Expenses</h5>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="expense_line" height="150"></canvas>
                                            </div>
                                            </div>
                                        </div>-->
                                        <div class="stats">
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
                    

                    <!--transaction-report-->
                    <!--<div class="transaction">
                        <div class="transaction-header">
                            <h4>Transaction History</h4>
                        </div>
                    </div>-->
                </div>

            </div>
        </div>

        <!--for icons-->
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
        </script>

        <!-- Bootstrap core JavaScript -->
        <script src="assets/js/jquery.slim.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/Chart.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    /*$("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });*/
  </script>
  <script>
    feather.replace()
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