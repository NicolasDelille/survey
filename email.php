<?php
	include("db.php");
	include("functions.php");
	session_start();
	
	
	$email = "";

	if(!empty($_POST)){

		$email = $_POST['email'];
		$sql = "SELECT id, email
				FROM clients
				WHERE :email = email";

		$sth = $dbh->prepare($sql);
		$sth->bindValue(":email", $email);
		$sth->execute();

		$client= $sth->fetch();

		pr($client);
		$id = $client['id'];
		$_SESSION['id'] = $id;
		
		header("Location: form.php");



	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vous avez reçu un email</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		
	<h1>Enquête de satisfaction</h1>

	<p class="lead text-info"></p>

	<p class="lead text-info">Bonjour,</p>

	<p class="lead text-info">Dans le but de faire évoluer nos prestations de services...</p>

	<p class="lead text-info">Pour vous connecter à l'enquête, veuillez nous indiquer votre adresse email dans le champ suivant</p>

	<form action="" method="post">
		
		<div class="form-group">

		  <label for="email" class="col-lg-2 control-label">Email</label>
		  
		  <div class="col-lg-10">
		    <input class="form-control" name="email" id="email" placeholder="Email" type="text">
		  </div>

    	</div>
	
	<div class="form-group">

		<div class="col-lg-10 col-lg-offset-2">
			<button type="submit" class="btn btn-primary">Accéder au questionnaire</button>
		</div>
    </div>	

	</form>


	
	
	</div>
</body>
</html>