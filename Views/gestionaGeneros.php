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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
	
		$(document).ready(function(){

	    $("select.nuevoGen").change(function(){
	        var selected = $(this).children("option:selected").val();
	        if (selected == -1) {
	        	$(".nuevoGenero").show();
	        }
	    });

		});

	</script>
</head>
<body>

	<div class="container">
		<h1 class="mt-4">Mis Series</h1><br>
		<h2 class="font-weight-bolder"><?= $serie->getTitulo() ?></h2>
		<table>
			<td>
				<a href="index.php?ope=listado&con=serie">Mis series</a>
				 | 
				<a href="index.php?ope=info&con=serie&ids=<?= $serie->getIds()  ?>">Volver atrás</a>
			</td>
		</table>
		
		<table class="table table-sm table-borderless">
			<thead class="thead-dark">
				<tr>
					<th>Género</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($generos as $genero) {
				?>
				<tr>
					<td><?= $genero->getGenero() ?></td>
					<td><a href="index.php?ope=borrar&con=pertenece&ids=<?= $serie->getIds() ?>&idg=<?= $genero->getIdg() ?>">Borrar</td>
				</tr>
				<?php
					}
				?>
				<tr>
					<td>
  					<form action="index.php">
  						<select class="nuevoGen" name="idg">
								<option name="idg" value="0">- Selecciona un género</option>
	  						<?php
									foreach ($listaGeneros as $genero2) {
								?>
	    					<option value="<?= $genero2->getIdg() ?>"><?= $genero2->getGenero() ?></option>
	    					<?php
									}
								?>
								<option value="-1">- Nuevo género</option>
	  					</select>
	  					<input type="submit" value="Añadir">
								<br>
								<input type="hidden" name="con" value="genero" />
								<input type="hidden" name="ope" value="crear" />
								<input type="hidden" name="ids" value="<?= $serie->getIds() ?>" /><br>
								<label style="display: none" class="nuevoGenero" for="nuevoGenero">Nombre nuevo género:</label><br>
								<input style="display: none" class="nuevoGenero" type="text" name="nuevoGenero" value="">
  					</form>
					</td>
					<td></td>
				</tr>
			</tbody>
		</table>

	</div>

</body>
</html>