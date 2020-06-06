<?php

	$con = $_GET["con"]??"usuario";
	$ops = $_GET["ope"]??"logIn";

	// Construimos el nombre del controlador
	$name = $con."Controller";

	//Incluimos el controlador
	require_once "controllers/$name.php";

	// Instanciamos el controlador y llamamos el método
	$controlador = new $name() ;

	// Invocamos el método
	$controlador->$ops();