<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="assets/how_to_vote_black_24dp.svg" rel="icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
		  rel="stylesheet"
		  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
		  crossorigin="anonymous"
	>
	<title> Enquête de statisfaction </title>
</head>
<body>
<section class="container mt-4">
	<form action="client.php" class="form-control p-4" method="post">
		<div class="mb-3"> Votre évaluation du cours : </div>
		<section class="mb-3">
			<?php
			include_once 'Sondage.php';
//			$key = $_POST['key'];
			$key = Sondage::newInstance(['Bon', 'Moyen', 'Mauvais']);
			foreach (Sondage::getInstance($key)->getChoices() as $choice) {
			?>
				<div class="form-check">
					<label class="form-check-label">
						<input name="evaluation" value=<?= $choice ?> type="radio" class="form-check-input">
                        <?= $choice ?>
					</label>
				</div>
			<?php } ?>
		</section>
		<input name="key" value="<?= $key ?>" type="hidden">
		<input value="Voter" type="submit" class="form-control">
	</form>
</section>
</body>
</html>
