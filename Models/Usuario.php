<?php
	require_once "other/Database.php";

	class Usuario {
		private $idu;
		private $usuario; //Nickname
		private $password;
		private $email;
		private $nombre; //Nombre real
		private $perfil;
		private $imagen;

		public function __construct() { }

		//ELIMINAR CUANTO NO SEA NECESARIO
		// Getters
		public function getIdu(){
			return $this->idu;
		}

		public function getUsuario(){
			return $this->usuario;
		}

		public function getPassword(){
			return $this->password;
		}

		public function getEmail(){
			return $this->email;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function getPerfil(){
			return $this->perfil;
		}

		public function getImagen(){
			return $this->imagen;
		}

		// Setters
		public function setIdu($idUsuario) {
			$this->idu=$idUsuario;
		}

		public function setUsuario($username) {
			$this->usuario=$username;
		}

		public function setPassword($clave) {
			$this->password=$clave;
		}

		public function setEmail($correo_e) {
			$this->email=$correo_e;
		}

		public function setNombre($nombreReal) {
			$this->nombre=$nombreReal;
		}

		public function setPerfil($perfil) {
			$this->perfil=$perfil;
		}

		public function setImagen($foto) {
			$this->imagen=$foto;
		}

		//Otras operaciones (SELECT e INSERT, pero no DELETE o UPDATE)
		public function select($username, $clave){ //Para sacar la info de un usuario en concreto
			$db = new Database();

			// buscamos el usuario
			$consulta = "SELECT * FROM usuario WHERE usuario=\"$username\" AND password=\"$clave\";";
			$db->query($consulta);
			$usuario = $db->getObject("Usuario");

			if (!empty($usuario)){ //Si existe...
				return true; //... Se devuelve un true
			}
			return false; //Si no existe, se devuelve un false
		}

		public function nickExiste($nick){ //Para saber si ya existe algún usuario con el mismo nick o email
			$db = new Database();

			$consulta = "SELECT * FROM usuario WHERE usuario=\"$nick\";";			
			$db->query($consulta);
			$existe = $db->getObject("Usuario");

			if (!empty($existe)) { //Si ya existe alguien con ese nombre de usuario
				//echo "El nick ya existe";
				//echo "<pre>". var_dump($nickExiste)."</pre>" ; //Para pruebas
				return true;
			}
			return false; //Si el nick ni el mail están repetidos
		}

		public function mailExiste($mail){ //Para saber si ya existe algún usuario con el mismo nick o email
			$db = new Database();

			$consulta = "SELECT * FROM usuario WHERE email=\"$mail\";";
			$db->query($consulta);
			$existe = $db->getObject("Usuario");

			if (!empty($existe)) { //Si ya existe alguien con ese nombre de usuario
				//echo "El nick ya existe";
				//echo "<pre>". var_dump($nickExiste)."</pre>" ; //Para pruebas
				return true;
			}
			return false; //Si el nick ni el mail están repetidos
		}

		public function insert($username, $nombre_real, $correo_e, $clave) { //Inserta los datos para crear un nuevo usuario
			$dbu = new Database();
			$dbu->query("INSERT INTO usuario (usuario, nombre, email, password) VALUES (\"$username\", \"$nombre_real\", \"$correo_e\", \"$clave\");");
		}
	}
