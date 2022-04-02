!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous"
    >
    <title> Récapituleation </title>
</head>
<body>
<section class="container rounded border p-3 row-2">
    <div class="p-3 mb-5 bg-light rounded">
        Vous y êtes presque <?= htmlspecialchars($_POST['name']) ?> !
    </div>
    <div class="p-3 mb-2 bg-light rounded">
        Vous avez commandé <?= htmlspecialchars($_POST['nbsand']) ?> sandwichs <?= htmlspecialchars($_POST['type']) ?>
        <?php
            $mayo = array_key_exists("mayo", $_POST) ? htmlspecialchars($_POST["mayo"]) : "";
            $harissa = array_key_exists("harissa", $_POST) ? htmlspecialchars($_POST["harissa"]) : "";
            $salade = array_key_exists("salade", $_POST) ? htmlspecialchars($_POST["salade"]) : "";
        ?>
        contenant <?= htmlspecialchars($harissa) ?> <?= htmlspecialchars($salade) ?> <?= htmlspecialchars($mayo) ?>.
    </div>
    <div class="p-3 bg-light rounded">
        Total = <?= (htmlspecialchars($_POST['nbsand']) > 10) ? htmlspecialchars($_POST['nbsand']) * 4 * 0.9 : htmlspecialchars($_POST['nbsand']) * 4 ?> DT
    </div>
    <form action="resa.html" class="form-control">
        <input class="form-control" type="submit" value="Valider">
    </form>
	<?php
		$_FILES['file']['tmp_name'] = uniqid();
	?>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"
>
</script>
</body>
</html>