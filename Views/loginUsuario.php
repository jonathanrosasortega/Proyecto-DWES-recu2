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
				<h2>LogIn</h2>
			</div>
		</div>

		<!-- formulario de login -->
		<form action="index.php">
			<input type="hidden" name="con" value="usuario" />
			<input type="hidden" name="ope" value="logueo" />

			<!-- Nombre de usuario -->
			<div class="row mt-5 form-group">
				<div class="col-md-12">
					<input class="form-control w-25 mx-auto" type="text" name="usuario" placeholder="Tu nombre de usuario" required maxlength="10"/>
				</div>
			</div>

			<!-- contraseña -->
			<div class="row form-group">
				<div class="col-md-12">
					<input class="form-control w-25 mx-auto" type="password" name="password" placeholder="Contraseña" required maxlength="10"/>
				</div>
			</div>

			<?php
				if ((isset($error)) && ($error)){
			?>
			<div class="row form-group">
				<div class="col-md-12">
					<div class="alert alert-danger w-25 text-center mx-auto">
					  <b>Usuario o contraseña incorrectas.</b>
					</div>
				</div>
			</div>
			<?php
				}
			?>

			<!-- botón LOGIN -->
			<div class="row form-group">
				<div class="col-md-12 text-center">
					<button class="btn btn-primary w-25" type="submit">Entrar</button>
				</div>
			</div>

		</form>

		<?php
			if ((isset($exito)) && ($exito)){
		?>
			<div class="row form-group">
				<div class="col-md-12">
					<div class="alert alert-primary w-25 text-center mx-auto">
					  <b>Se ha registrado correctamente. Introduzca ahora su usuario y contraseña</b>
					</div>
				</div>
			</div>
		<?php
			} else {
		?>
		<!-- acceso REGISTRO -->
		<div class="row">
			<div class="col-md-12 text-center">
				<a href="index.php?ope=registrar&con=usuario" class="btn btn-link">No tengo cuenta ¡Quiero registrarme!</a>
			</div>
		</div>
		<?php 
			}
		?>
	</div> <!-- container -->

</body>
</html>