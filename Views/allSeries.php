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
			<td> | </td>
			<td><a href="index.php?ope=logOut&con=usuario">Cerrar Sesión</a></td>
		</table>
		<br>

		<table class="table">

			<thead class="thead-dark">			
				<th class="col-6 pt-0 pb-0">titulo</th>
				<th class="col-2 pt-0 pb-0">puntuacion</th>
				<th class="col-3 pt-0 pb-0">plataforma</th>
				<th class="col-1 pt-0 pb-0">Opciones</th>
			</thead>

			<tbody>

				<?php
					foreach ($series as $serie) {
				?>
					  <tr>
							<td class="col-6 pt-0 pb-0"><?= $serie->getTitulo() ?></td>
							<td class="col-2 pt-0 pb-0"><?= $serie->getPuntuacion() ?></td>
							<td class="col-3 pt-0 pb-0"><?php if(!is_null($serie->getPlataforma())){
								print_r($serie->getPlataforma());
							} else { ?>
								<b style="color: red">No emitiéndose</b>
							<?php } ?>
							</td>
							<td class="col-1 pt-0 pb-0"><a href="index.php?ope=info&con=serie&ids=<?= $serie->getIds(); ?>">+Info</a></td>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>

	</div>

</body>
</html>