<?php 
	if (is_null($_SESSION["usuario"])) {
		header("Location: index.php", 301);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>MisSeries</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<h1 class="mt-4">Mis Series</h1><br>
		<h2 class="font-weight-bolder"><?= $serie->getTitulo() ?></h2>
		<table>
			<td><a href="index.php?ope=listado&con=serie">Mis series</a></td>
		</table>
		<form action="index.php">
			<input type="hidden" name="con" value="serie" />
			<input type="hidden" name="ope" value="actualizar" />
			<input type="hidden" name="ids" value="<?= $serie->getIds() ?>" />
			<label for="fecha">Fecha de estreno:</label> <input type="date" id="fecha" name="fec" value="<?= $serie->getFecha() ?>"><br>
			<label for="temporadas">Temporadas:</label> <input type="number" id="temporadas" name="tem" value="<?= $serie->getTemporadas() ?>"><br>
			<label for="puntuacion">Puntuación:</label> <input type="number" id="puntuacion" name="pun" value="<?= $serie->getPuntuacion() ?>"><br>
			<label for="puntuacion">Géneros:</label> <?php
				foreach ($listaGeneros as $genero) {
					?>
					<?= $genero->getGenero() ?>
					<?php
						echo ", ";
						}
					?><a href="index.php?ope=gestionar&con=genero&ids=<?= $serie->getIds(); ?>">Gestionar géneros</a><br>
			  <label for="argumento">Argumento:</label><br><textarea type="text" rows="10" cols="125" id="argumento" name="arg"><?= $serie->getArgumento() ?></textarea>
			  <br>
		  <input type="submit" value="Actualizar serie">
		</form> 

	</div>

</body>
</html>