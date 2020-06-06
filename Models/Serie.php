<?php
	require_once "other/database.php";
	class Serie {
		private $ids;
		private $titulo;
		private $fecha;
		private $temporadas;
		private $puntuacion;
		private $argumento;
		private $plataforma;
		private $poster;

		public function __construct() { }

		// Getters
		public function getIds() {
			return $this->ids;
		}

		public function getTitulo() {
			return $this->titulo;
		}

		public function getFecha() {
			return $this->fecha;
		}

		public function getTemporadas() {
			return $this->temporadas;
		}

		public function getPuntuacion() {
			return $this->puntuacion;
		}

		public function getArgumento() {
			return $this->argumento;
		}

		public function getPlataforma() {
			return $this->plataforma;
		}

		public function getPoster() {
			return $this->poster;
		}
		
		// Setters
		public function setFecha($fec) {
			$this->fecha=$fec;
		}

		public function setTemporadas($tem) {
			$this->temporadas=$tem;
		}

		public function setPuntuacion($pun) {
			$this->puntuacion=$pun;
		}

		public function setArgumento($arg) {
			$this->argumento=$arg;
		}

		//Operación UPDATE
		public function update($idSer, $fec, $tem, $pun, $arg) {
			$serie = new Database();
			/*
			$idSer = $this->ids;
			$fec = $this->fecha;
			$tem = $this->temporadas;
			$pun = $this->puntuacion;
			$arg = $this->argumento;
			*/
			//echo "UPDATE serie SET fecha=\"$fec\", temporadas=$tem, puntuacion=$pun, argumento=\"$arg\" WHERE ids=$idSer;"; //TESTING
			$serie->query("UPDATE serie SET fecha=\"$fec\", temporadas=$tem, puntuacion=$pun, argumento=\"$arg\" WHERE ids=$idSer;");
		}

		// Para el listado
		public function getAllSeries() {
			$db = new Database() ;
	    $db->query("SELECT * FROM serie ;");
	    $series = [] ;
	    while($obj = $db->getObject("Serie")) {
	    	array_push($series, $obj) ;
	    }

	    return $series ;
		}

		//Para la info de UNA serie
		public function getSerieByIds($ids){
			$db = new Database() ;
			$consulta = "SELECT * FROM serie WHERE ids=" . $ids . ";";
			
	    $db->query($consulta);
	    //$serie = [];

	    //$serie->fetch_assoc($db);
	    //$tomatoma = [];
	    //$fila = $tomatoma->mysqli_fetch_assoc("Serie");
	    
	    $serie = $db->getObject("Serie");
	    //array_push($serie, $obj);

	    return $serie;
		}
	}