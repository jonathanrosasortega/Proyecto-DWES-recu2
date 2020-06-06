<?php
	require_once "Models/Serie.php";
	require_once "Models/Pertenece.php";
	require_once "Models/Genero.php";
	class PerteneceController{
		public function __construct() {
			session_start();
		}

		public function crear() {
			$per = new Database();
			$ids = $_GET["ids"];
			$idg = $_GET["idg"];
			$per->setIdg();
			$per->setIds();
			$per->insert($ids, $idg);
			// Redirigimos
			$this->getGenerosDeSerie();
		}

		public function borrar() {
			if((isset($_GET["idg"])) && (isset($_GET["ids"]))){
				Pertenece::delete($_GET["idg"], $_GET["ids"]) ;
				// Obtenemos la lista completa de géneros que tiene la serie
				$generos = Genero::getGenerosDeSerie($_GET["ids"], 0);
				// Obtenemos la lista de géneros que no tiene la serie (Para el desplegable)
				$listaGeneros = Genero::getGenerosDeSerie($_GET["ids"], 1);
				$serie = Serie::getSeriebyIds($_GET["ids"]);
				// Redirigimos
				require_once "views/gestionaGeneros.php";
			}
		}
	}