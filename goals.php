<?php
include("session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity=
"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
		crossorigin="anonymous">

	<script src=
"https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity=
"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous">
	</script>
	
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity=
"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous">
	</script>
	
	<script src=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity=
"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous">
	</script>
</head>

<body>
	<nav class="navbar navbar-expand-lg
				navbar-light bg-success">
				<span class="icon"><button onclick="history.go(-1);"><< Back </button></span>
		<a class="navbar-brand" href="#">
			<p style="font-size: 30px;">
				Goals Setter
			</p>

		</a>
	</nav>

	<div class="container my-3">
        <form action="goals_accept.php" method="POST">
		<h1>Add your goals here</h1>
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">
					Add a goal
				
				</h5>
				<div class="form-group">
					<textarea class="form-control" name="goal_name"
						id="addTxt" rows="3">
					</textarea>
				</div>
                <div class="form-group">
                        <input name="amount" type="Number" class="form-control" placeholder="Goal amount">
                </div>
				<button class="btn btn-primary"
					id="addBtn" style=
					"background-color:green">
					Add Note
				</button>
			</div>
		</div>
        </form>
		<hr>
		<h2>Your goals</h2>
		<hr>
		
		<div id="notes" class=
			"row container-fluid">
            <?php 
            
            $servername = "localhost:3307";
            $username = "root";
            $password = "";
            $database = "kakeibo";
            $conn = mysqli_connect($servername, $username, $password, $database);
            $sql = "SELECT goal_name,amount FROM goals where userid = '$userid'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
			if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
            $goal_name = $row['goal_name'];             
            echo "$goal_name"; 
			$amount = $row['amount'];

            echo "$amount";
			echo "<br>";
			}
			}
			?>
		</div>
        <div id="notes" class=
			"row container-fluid">
            <?php 
            
            /*$servername = "localhost:3307";
            $username = "root";
            $password = "";
            $database = "kakeibo";
            $conn = mysqli_connect($servername, $username, $password, $database);
            
            $sql = "SELECT amount FROM goals where userid = '$userid'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $amount = $row['amount'];

            echo "$amount";*/ ?>
		</div>
	</div>

	<script src="gfg.js"></script>
</body>

</html>
