<?php
	require_once "other/database.php" ;
	class Pertenece {
		private $idg = null;
		private $ids = null;
		
		public function __construct() { }

		// Getters
		public function getIdg() {
			return $this->idg;
		}

		public function getIds() {
			return $this->ids;
		}

		// Setters
		public function setIds($ids) {
			$this->ids=$ids;
		}

		public function setIdg($idg) {
			$this->idg=$idg;
		}
		
		//Operación INSERT
		public function insert() { 
			$dbg = new Database() ;
			$idSer = $this->ids;
			$idGen = $this->idg;
			//echo "INSERT INTO pertenece (ids, idg) VALUES ($idSer, $idGen) ;"; //TESTING
			$dbg->query("INSERT INTO pertenece (ids, idg) VALUES ($idSer, $idGen) ;");
			//$this->idg = $dbg->getLastId() ;
		}

		public function delete($idg, $ids){ //Borra una combinación serie-género
	    $dbp = new Database() ;
	    $consulta = "DELETE FROM pertenece WHERE idg=$idg AND ids=$ids;";
	    $dbp->query($consulta);
	  }
	}