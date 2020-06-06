<?php
	require_once "other/database.php" ;
	class Genero {
		private $idg;
		private $genero;
		
		public function __construct() { }

		// Getters
		public function getIdg() {
			return $this->idg;
		}

		public function getGenero() {
			return $this->genero;
		}

		// Setters
		public function setGenero($gen) {
			$this->genero=$gen;
		}
		
		//Operación INSERT
		public function insert($genero) { 
			$dbg = new Database();
			//echo "INSERT INTO genero (genero) VALUES (\"$genero\");"; //TESTING
			$dbg->query("INSERT INTO genero (genero) VALUES (\"$genero\");");
			//$this->idg = $dbg->getLastId() ;
		}

		public function getGenerosDeSerie($ids, $opc) {
			$dbg = new Database();
			if ($opc == 0) { //Muestra los géneros de una serie según su ID. Usar en solo en "infoSerie" y en "gestionar géneros"
				$consulta = "SELECT g.idg, g.genero FROM genero g JOIN pertenece p ON (p.idg=g.idg) WHERE p.ids = $ids;";
				$dbg->query($consulta);
		    $generos = [] ;

		    //El listado de géneros de dicha serie, se almacena y envía en $generos
		    while($obj = $dbg->getObject("Genero")) {
		    	array_push($generos, $obj) ;
		    }

		    return $generos ;
			} else { //Muestra TODOS los géneros (idg + genero), que no pertenecen aún a una serie. Usar solo en el desplegable de "gestionar géneros"
				$consulta = "SELECT * FROM genero WHERE idg not in (SELECT g.idg FROM genero g JOIN pertenece p ON (p.idg=g.idg) WHERE p.ids = $ids)";
				$dbg->query($consulta);
		    $notGeneros = [] ;

		    //El listado total de géneros, se almacena y envía en $generos
		    while($obj = $dbg->getObject("Genero")) {
		    	array_push($notGeneros, $obj) ;
		    }

		    return $notGeneros;
			}
		}

		public function getAllGeneros(){
			$dbg = new Database() ;
	    $dbg->query("SELECT * FROM genero;");
	    $listaGeneros = [] ;
	    while($obj = $dbg->getObject("Genero")) {
	    	array_push($listaGeneros, $obj) ;
	    }

	    return $listaGeneros ;
		}

	}