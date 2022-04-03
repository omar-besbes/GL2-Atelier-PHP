<?php
session_start();
if (!isset($_SESSION['notes'])) {
    $_SESSION['notes'] = [];
}
if (isset($_POST['titre']) && isset($_POST['note'])) {
	$key = uniqid();
	$_SESSION['notes'][] = ['key' => $key, 'titre' => $_POST['titre'], 'note' => $_POST['note']];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="assets/edit_note_black_24dp.svg">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
		  rel="stylesheet"
		  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
		  crossorigin="anonymous"
	>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Google Keep </title>
</head>
<body>
<section class="container-fluid p-5">
	<h1 class="alert text-center">
		Notes
	</h1>

	<div id="notes accordion" class="accordion p-3">

        <?php
		$first = 0;
        foreach ($_SESSION['notes'] as $note):
        ?>

		<div class="accordion-item">
			<h3 id="<?= $note['key'] . '2' ?>" class="accordion-header">
				<button class="accordion-button" type="button"
						data-bs-toggle="collapse"
						data-bs-target="<?= '#' . $note['key'] . '1' ?>"
						aria-expanded=" <?= ($first != 0) ? 'false' : 'true' ?> "
						aria-controls="<?= $note['key'] . '1' ?>"
				>
					<?= $note['titre'] ?>
				</button>
			</h3>
			<div id="<?= $note['key'] . '1' ?>"
				 class="<?= 'accordion-collapse collapse' . ($first != 0) ? '' : 'show' ?>"
				 aria-labelledby="<?= $note['key'] . '2' ?>"
				 data-bs-parent="<?= '#notes accordion' ?>"
			>
				<div class="accordion-body">
                    <?= $note['note'] ?>
				</div>
			</div>
		</div>

        <?php
		$first++;
        endforeach;
        ?>

	</div>

	<form class="form-control p-3 border-0" action="" method="post">
		<div class="form-floating mb-3">
			<input id="titre" type="text" class="form-control mb-3" name="titre" placeholder="Titre" required>
			<label for="titre"> Titre </label>
		</div>
		<div class="form-floating mb-3">
			<textarea id="note" name="note" class="form-control mb-3" rows="2" placeholder="Note" required></textarea>
			<label for="note"> Note </label>
		</div>
		<input type="submit" class="form-control" value="Ajouter">
	</form>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"
>
</script>
</body>
</html>