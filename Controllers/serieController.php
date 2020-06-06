<?php
	require_once "Models/Serie.php";
	require_once "Models/Genero.php";
	class SerieController{
		public function __construct() {
			session_start();
		}

		public function listado() {
			// Obtenemos la lista completa de series
			$series = Serie::getAllSeries();
			// Cargamosa la vista
			require_once "views/allSeries.php";
		}

		public function info(){
			// Obtenemos los datos de una serie
			$serie = Serie::getSerieByIds($_GET["ids"]);
			//Obtenemos sus géneros
			$listaGeneros = Genero::getGenerosDeSerie($_GET["ids"], 0);
			// Cargamosa la vista
			require_once "views/infoSerie.php";
		}

		public function editar(){
			// Obtenemos los datos de una serie
			$serie = Serie::getSerieByIds($_GET["ids"]);
			//Obtenemos sus géneros
			$listaGeneros = Genero::getGenerosDeSerie($_GET["ids"], 0);
			require_once "views/editSerie.php";
		}

		public function actualizar(){
			$serie = new Serie() ;
			$serieIds = $_GET["ids"];
			$serieFecha = $_GET["fec"];
			$serieTemporadas = $_GET["tem"];
			$seriePuntuacion = $_GET["pun"];
			$serieArgumento = $_GET["arg"];
			$serie->update($serieIds, $serieFecha, $serieTemporadas, $seriePuntuacion, $serieArgumento);
			// Redirigimos
			$this->info();
		}
	}