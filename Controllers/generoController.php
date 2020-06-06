<?php
	require_once "Models/Serie.php";
	require_once "Models/Genero.php";
	require_once "Models/Pertenece.php";
	class GeneroController{
		public function __construct() {
			session_start();
		}

		public function gestionar() {
			// Obtenemos la lista completa de géneros que tiene la serie
			$generos = Genero::getGenerosDeSerie($_GET["ids"], 0);
			// Obtenemos la lista de géneros que no tiene la serie (Para el desplegable)
			$listaGeneros = Genero::getGenerosDeSerie($_GET["ids"], 1);
			//Obtenemos los datos de la serie (Para el ID y el nombre)
			$serie = Serie::getSeriebyIds($_GET["ids"]);
//			$ids = $_GET["ids"];
			// Cargamos la vista
			require_once "views/gestionaGeneros.php";
		}

		public function crear() {
			if ($_GET["idg"] > 0) { //Para crear una asociación género/serie 
				//echo "idg vale " . $_GET["idg"] . ", pero ids vale " . $_GET["ids"]; //Testing
				$per = new Pertenece();
				$per->setIds($_GET["ids"]);
				$per->setIdg($_GET["idg"]);
				$per->insert();

				$generos = Genero::getGenerosDeSerie($_GET["ids"], 0);
				$listaGeneros = Genero::getGenerosDeSerie($_GET["ids"], 1);
				$serie = Serie::getSeriebyIds($_GET["ids"]);
				// Redirigimos
				require_once "views/gestionaGeneros.php";
			} else { //Para crear un nuevo género
				$gen = new Genero();
				//echo "nuevoGenero tiene el valor " . $_GET["nuevoGenero"]; //Testing
				$gen->insert($_GET["nuevoGenero"]);
				
				$generos = Genero::getGenerosDeSerie($_GET["ids"], 0);
				$listaGeneros = Genero::getGenerosDeSerie($_GET["ids"], 1);
				$serie = Serie::getSeriebyIds($_GET["ids"]);
				// Redirigimos
				require_once "views/gestionaGeneros.php";
			}

		}
	}