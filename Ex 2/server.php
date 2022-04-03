<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/home_black_24dp.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous"
    >
    <title> Accueil </title>
</head>
<body>
<section class="mt-3 p-3 container-fluid border">
	<div class="text-center">
        Welcome !
    </div>
	<?php
    include 'Sondage.php';
    Sondage::newInstance(['Bon', 'Moyen', 'Mauvais']);
	foreach (Sondage::getAllKeys() as $key) {
	?>
		<article class="container">
			<ul class="list-group list-group-horizontal">
				<li class="list-group-item">
					Sondage
				</li>
				<li class="list-group-item">
					<?= Sondage::getInstance($key)->getNbVoters() ?> personnes ont voté
				</li>
				<li class="list-group-item">
					<form action="form.php" method="post">
						<input type="hidden" name="key" value="<?= $key ?>">
						<input type="submit" value="Lien" class="btn btn-success">
					</form>
				</li>
				<li class="list-group-item">
					Durée : <?= Sondage::getInstance($key)->getLength() ?> seconds
				</li>
				<li class="list-group-item">
					Expiration : <?= date("l jS \of F Y h:i:s A", Sondage::getInstance($key)->getExpirationTime()) ?>
				</li>
			</ul>
		</article>
	<?php } ?>
</section>
</body>
</html>