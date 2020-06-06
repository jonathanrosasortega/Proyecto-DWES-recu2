<?php 
	if (isset($_SESSION["usuario"])) {
		header("Location: index.php?con=serie&ope=listado", 301);
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
		
		<!-- logotipo -->
		<div class="row">
			<div class="col-sd-12 mx-auto">
				<h1>Mis Series</h1>
				<h2>Registro</h2>
			</div>
		</div>

		<!-- formulario de login -->
		<form action="index.php">
			<input type="hidden" name="con" value="usuario" />
			<input type="hidden" name="ope" value="registro" />

			<!-- Nombre de usuario -->
			<div class="row mt-5 form-group">
				<div class="col-md-12">
					<input class="form-control w-25 mx-auto" type="text" name="usuario" value="<?= $nick??"" ?>" placeholder="Tu nombre de usuario" required />
				</div>
			</div>
			
			<?php
				if ((isset($nickEnUso)) && ($nickEnUso)){
			?>
			<div class="row form-group">
				<div class="col-md-12">
					<div class="alert alert-danger w-25 text-center mx-auto">
					  <b>Ese nombre de usuario ya está en uso. Prueba con otro</b>
					</div>
				</div>
			</div>
			<?php
				}
			?>

			<!-- nombre real -->
			<div class="row form-group">
				<div class="col-md-12">
					<input class="form-control w-25 mx-auto" type="text" name="nombre"  value="<?= $nombre??"" ?>"placeholder="Tu nombre real" required />
				</div>
			</div>

			<!-- e-mail -->
			<div class="row form-group">
				<div class="col-md-12">
					<input class="form-control w-25 mx-auto" type="text" name="email"  value="<?= $email??"" ?>"placeholder="e-mail" required />
				</div>
			</div>

			<?php
				if ((isset($mailEnUso)) && ($mailEnUso)){
			?>
			<div class="row form-group">
				<div class="col-md-12">
					<div class="alert alert-danger w-25 text-center mx-auto">
					  <b>Ya se ha registrado un usuario con esa dirección de email.</b>
					</div>
				</div>
			</div>
			<?php
				}
			?>

			<!-- contraseña -->
			<div class="row form-group">
				<div class="col-md-12">
					<input class="form-control w-25 mx-auto" type="password" name="password" placeholder="Contraseña" required />
				</div>
			</div>

			<!-- Confirmar contraseña -->
			<div class="row form-group">
				<div class="col-md-12">
					<input class="form-control w-25 mx-auto" type="password" name="confirmPassword" placeholder="Confirmar contraseña" required />
				</div>
			</div>

			<?php
				if ((isset($noCoinciden)) && ($noCoinciden)){
			?>
			<div class="row form-group">
				<div class="col-md-12">
					<div class="alert alert-danger w-25 text-center mx-auto">
					  <b>Las contraseñas no coinciden.</b>
					</div>
				</div>
			</div>
			<?php
				}
			?>

			<!-- botón LOGIN -->
			<div class="row form-group">
				<div class="col-md-12 text-center">
					<button class="btn btn-primary w-25" type="submit">Registrarse</button>
				</div>
			</div>

		</form>
		<!-- botón CANCELAR -->
			<div class="row form-group">
				<div class="col-md-12 text-center">
					<a class="btn btn-danger w-25" href="index.php" role="button">Cancelar</a>
				</div>
			</div>
	</div> <!-- container -->

</body>
</html>