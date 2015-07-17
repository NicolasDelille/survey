<?php
	include("db.php");
	include("functions.php");

	// Récupération de la moyenne des notes


	$sql = "SELECT AVG(rating)
			FROM rating";

	$sth = $dbh->prepare($sql);
	$sth->execute();
	$average= $sth->fetchColumn();
	
	// echo $average;
	$average_rounded = round($average, 1);
	$average_percent = $average_rounded * 10;

	// Récupération du nombre de recommandations

	$sql = "SELECT count(will_recommend)
			FROM rating
			WHERE will_recommend = 'oui'";

	$sth = $dbh->prepare($sql);
	$sth->execute();
	$count_recommended= $sth->fetchColumn();

	// Récupération du nombre d'aspects 'reactivity'
	$sql = "SELECT count(reactivity)
			FROM rating
			WHERE reactivity = 1";

	$sth = $dbh->prepare($sql);
	$sth->execute();
	$count_reactivity= $sth->fetchColumn();

	// pr($count_reactivity);
	
	// Récupération du nombre d'aspects 'professionalism'
	$sql = "SELECT count(professionalism)
			FROM rating
			WHERE professionalism = 1";

	$sth = $dbh->prepare($sql);
	$sth->execute();
	$count_professionalism= $sth->fetchColumn();

	// pr($count_professionalism);

	// Récupération du nombre d'aspects 'friendliness'
	$sql = "SELECT count(friendliness)
			FROM rating
			WHERE friendliness = 1";

	$sth = $dbh->prepare($sql);
	$sth->execute();
	$count_friendliness= $sth->fetchColumn();
	
	// Récupération du nombre d'aspects 'service_delivery_quality'



	$sql = "SELECT count(service_delivery_quality)
			FROM rating
			WHERE service_delivery_quality = 1";

	$sth = $dbh->prepare($sql);
	$sth->execute();
	$count_service_delivery_quality= $sth->fetchColumn();

	// Récupération des commentaires des clients insatisfaits (note < 5)

	$sql = "SELECT comments
			FROM rating
			WHERE rating < 5";

	$sth = $dbh->prepare($sql);
	$sth->execute();
	$bad_comments= $sth->fetchAll();
	// pr($bad_comments);

	// Récupération des commentaires des clients satisfaits (note < 8)

	$sql = "SELECT comments
			FROM rating
			WHERE rating >= 8";

	$sth = $dbh->prepare($sql);
	$sth->execute();
	$good_comments= $sth->fetchAll();
	// pr($good_comments);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Résultats de l'enquête</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">

		<h2>Note moyenne : <?php echo $average_rounded ?></h2>

		<div class="progress">
  			<div class="progress-bar progress-bar-info" style="width: <?php echo $average_percent?>%"></div>
		</div>


		<h2>Nombre de clients qui ont recommandé : <?php echo $count_recommended ?></h2>

		<h2>Aspects reconnus</h2>

		<p>nombre de réactivité : <?php echo $count_reactivity ?></p>
		<p>nombre de professionnalisme : <?php echo $count_professionalism ?></p>
		<p>nombre de amabilité : <?php echo $count_friendliness ?></p>
		<p>nombre de qualité de service : <?php echo $count_service_delivery_quality ?></p>

		<h2>Commentaires négatifs</h2>

		<?php 
		foreach ($bad_comments as $comments_bad) {
			foreach ($comments_bad as $bad_comment) {
				echo "<p>".$bad_comment."</p>";
			}
		}

		?>

		<h2>Commentaires positifs</h2>

		<?php 
		foreach ($good_comments as $comments_good) {
			foreach ($comments_good as $good_comment) {
				echo "<p>".$good_comment."</p>";
			}
		}

		?>


	</div>
	
</body>
</html>