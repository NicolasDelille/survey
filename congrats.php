<?php
	include("db.php");
	include("functions.php");
	session_start();
	// echo $_SESSION['id'];

	if(isset($_SESSION['id'])){
		// echo $_SESSION['id'];
	

	
		$id = $_SESSION['id'];
		// echo $id;

		$sql = "SELECT id, first_name, last_name
				FROM clients
				WHERE :id = id";

			$sth = $dbh->prepare($sql);
			$sth->bindValue(":id", $id);
			$sth->execute();

			$client= $sth->fetch();
	}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Félicitations !</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1 class="text-success">Merci pour votre participation, <?php echo $client['first_name'] ." ". $client['last_name'] ?> !</h1>
	</div>
	
</body>
</html>