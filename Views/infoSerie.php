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
		<h1 class="mt-4">Mis Series</h1>
		<table>
			<td><a href="index.php?ope=listado&con=serie">Mis series</a></td>
		</table>
		
		<table class="table table-borderless">
			<tbody>
				<tr>
					<td rowspan="7"><img style="height: 250px; width: 169px" src="<?= $serie->getPoster() ?>"></td>
					<td><h3><b><?= $serie->getTitulo() ?></b></h3></td>
				</tr>
				<tr>
					<td><h5><?php if(!is_null($serie->getPlataforma())){
								print_r($serie->getPlataforma());
							} else { ?>
								<b style="color: red">No emitiéndose</b>
							<?php } ?></h5></td>
				</tr>
				<tr>
					<td><b>Fecha de estreno:</b> <?= $serie->getFecha() ?></td>
				</tr>
				<tr>
					<td><b>Temporadas:</b> <?= $serie->getTemporadas() ?></td>
				</tr>
				<tr>
						<td><b>Puntuación:</b> <?= $serie->getPuntuacion() ?></td>
				</tr>
				<tr>
					<td><?= $serie->getArgumento() ?></td>
				</tr>
				<tr>
					<td>
						<?php
							foreach ($listaGeneros as $genero) {
						?>
						<?= $genero->getGenero() ?>

						<?php
							echo ", ";
							}
						?>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<a href="index.php?ope=listado&con=serie">Volver atrás</a>
						 | 
						<a href="index.php?ope=gestionar&con=genero&ids=<?= $serie->getIds(); ?>">Gestionar géneros</a>
						 | 
						<a href="index.php?ope=editar&con=serie&ids=<?= $serie->getIds(); ?>">Editar Serie</a>
					</td>
				</tr>
			</tbody>
		</table>

	</div>

</body>
</html>