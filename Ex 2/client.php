<?php

include_once 'Sondage.php';
Sondage::initialize();
$result = "";
if (array_key_exists('voted-'.$_POST['key'], $_COOKIE)) {
	$result = "Refusé";
} else {
	if(isset($_POST['key'])) {
        setcookie("voted-".$_POST['key'], $_POST["evaluation"]);
        $result = "Accepté";
    } else $result = "Erreur";
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="icon" href= <?= ($result == "Accepté") ? "assets/done_black_24dp.svg" : "assets/error_black_24dp.svg" ?> >
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
		  rel="stylesheet"
		  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
		  crossorigin="anonymous"
	>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?= $result ?> </title>
</head>
<body>
<section class="container-fluid mt-5">
	<?php
	if ($result == "Refusé") {
	?>
		<div class="alert alert-danger">
			Votre vote a été refusé. Vous avez déja donné une réponse : <?= $_COOKIE["voted-" . $_POST['key']] ?>
		</div>
	<?php
    } elseif ($result == "Accepté") {
	?>
		<div class="alert alert-success">
			Votre vote a été accepté. Merci !
		</div>
	<?php
    } else {
	?>
		<div class="alert alert-warning">
			Il y a eu une erreur lors de la récupération de votre réponse. Réessayer svp. Si vous continuez à retrouver
			la mêeme erreur, veuillez contacter l'administrateur de la page.
		</div>
	<?php
    }
	?>
</section>
</body>
</html>
