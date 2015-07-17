<?php 
	include("db.php");
	include("functions.php");
	session_start();

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
	


	// pr($client);
	$rating_error = "";
	$recommendation_error = "";
	$comments_error = "";
	$aspects_error = "";
	
	

	

	if (!empty($_POST)) {

		// pr($_POST);
	
		// récupération des variables à choix unique

		$rating = $_POST['webtech_quote'];
		if ($rating == "none") {
			$rating_error = "Vous devez répondre à cette question !";
		}

		if(empty($_POST['recommendation'])){
			$recommendation_error = "Vous devez répondre à cette question !";
		}

		$recommendation = $_POST['recommendation'];

		// 
		$comments = strip_tags($_POST['comments']);

		
		// // récupération des variables à choix multiples
		// $aspects = [];
		if(!empty($_POST['aspect'])){
			$aspects = ($_POST['aspect']);
			pr($aspects);
		
		
		if(in_array("reactivity", $aspects)){
			$reactivity = 1;
		}else{
			$reactivity = 0;
		}
		if(in_array("professionalism", $aspects)){
			$professionalism = 1;
		}else{
			$professionalism = 0;
		}
		if(in_array("friendliness", $aspects)){
			$friendliness = 1;
		}else{
			$friendliness = 0;
		}
		if(in_array("service_delivery_quality", $aspects)){
			$service_delivery_quality = 1;
		}else{
			$service_delivery_quality = 0;
		}
		if(in_array("none", $aspects)){
			$none = 1;
		}else{
			$none = 0;
		}

		// echo $reactivity;
		// echo "<br />";
		// echo $professionalism;
		// echo "<br />";
		// echo $friendliness;
		// echo "<br />";
		// echo $service_delivery_quality;
		// echo "<br />";
		// echo $none;

		if($none == 1 && count($aspects)>1){
			$aspects_error = 'Vous ne pouvez pas cocher d\'autre cases que "aucune de ces réponses"';
		}


		}
		
		
		// pr($_POST);
		

		if ($rating_error == "" && $recommendation_error == "" && $aspects_error == "") {
			# code...
		$sql = "INSERT INTO rating(id, client_id, rating, will_recommend, reactivity, professionalism, friendliness, service_delivery_quality, none, comments, date_created) 
				VALUES (NULL,'$id','$rating','$recommendation',$reactivity,$professionalism,$friendliness,$service_delivery_quality,$none,:comments, NOW())";
				

			$sth = $dbh->prepare($sql);
			$sth->bindValue(":comments", $comments);
			$sth->execute();

			header("Location: congrats.php");
			
			$_SESSION['id'] = $id;
		
		}

			// $client= $sth->fetch();

	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Questionnaire de satisfaction</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<form class="form-horizontal" action="form.php" method="post">
			<fieldset>
				<legend>
					<h1>Questionnaire de satisfaction</h1>
					<p class="lead text-success">Bonjour <?php echo $client['first_name'] ." ". $client['last_name'] ?>, </p>
					<p class="lead text-success">Merci de répondre aux questions suivantes.</p>
				</legend>
		
				<div class="form-group">
					<p class="lead text-info">Comment noteriez-vous, sur 10, la qualité du service que vous avez reçu de WebTech2000 ? (10 étant la meilleure évaluation possible)</p>
					<p class="lead text-danger"><?php echo $rating_error?></p>
					
					<div class="col-lg-2">
						<select name="webtech_quote" id="webtech_quote" class="form-control" >
							<option value="none" selected="selected">Note entre 0 et 10</option>
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
					</div>
					
				</div>

				<div class="form-group">
					<p class="lead text-info">Est-ce que vous avez recommandé WebTech2000 à un quelqu'un depuis que vous avez utilisé nos services ?</p>
					<p class="lead text-danger"><?php echo $recommendation_error?></p>

					
					<div class="col-lg-10">
						<div class="radio">
							<label>
								<input type="radio" name="recommendation" value="oui">
								Oui
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="recommendation" value="non">
								Non
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="recommendation" value="maybe">
								Pas encore mais ça viendra
							</label>
						</div>
					</div>
					
				</div>
	

				<div class="form-group">
					
					<p class="lead text-info">Quels sont les aspects que vous avez le plus apprécié dans nos services (plusieurs réponses possibles) ?</p>
					<p class="lead text-danger"><?php echo $aspects_error?></p>

					<div class="col-lg-10">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="aspect[]" value="reactivity">La réactivité
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="aspect[]" value="professionalism">Le professionalisme
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="aspect[]" value="friendliness">L'amabilité
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="aspect[]" value="service_delivery_quality">La qualité des prestations
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="aspect[]" value="none">Aucune de ces réponses
							</label>
						</div>
					</div>
				</div>
				

				<div class="form-group">
					<p class="lead text-info">Si vous avez des commentaires sur les services reçus, des critiques ou des questions, laissez-les ci-dessous !</p>
					
					<div class="col-lg-10">
						<textarea name="comments" id="comments" cols="30" rows="10" class="form-control"></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<button type="reset" class="btn btn-default">Cancel</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
		
			</fieldset>
		</form>
	</div>

	
</body>
</html>