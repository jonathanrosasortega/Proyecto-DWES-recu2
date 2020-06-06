<?php
	require_once "Models/Usuario.php";
	class UsuarioController{
		public function __construct() {
			session_start();
		}

		public function logIn(){
			require_once "views/loginUsuario.php";
		}

		public function logueo(){
			$usuario = new Usuario();
			if ($usuario->select($_GET["usuario"], $_GET["password"])) { //Si existe usuario con estos datos
				//echo "<pre>". var_dump($_SESSION["usuario"])."</pre>" ; //Para pruebas
				session_start();
				$_SESSION = [];
				$_SESSION["usuario"] = $_GET["usuario"];
				header("Location: index.php?con=serie&ope=listado", 301);
				exit();
			} else { //Si no existe...
				$error = true;
				//echo "usuario vale " . $_GET["usuario"] . ", pero password vale " . $_GET["password"]; //Testing
				require_once "views/loginUsuario.php";
			}
		}

		public function registrar(){
			require_once "views/registroUsuario.php";
		}

		public function registro(){
			$usuario = new Usuario();
			$yaExiste = new Usuario();
			$nick = $_GET["usuario"];
			$nombre = $_GET["nombre"];
			$email = $_GET["email"];
			$contrasena = $_GET["password"];
			
			//echo "<pre>" . var_dump($yaExiste) . "</pre>";

			if ($yaExiste->nickExiste($nick)) {//Si el nick se repite
				//echo "nick existe";
				$nickEnUso = true;
				require_once "views/registroUsuario.php";
			} elseif ($yaExiste->mailExiste($email)) {//Si el email se repite
				//echo "mail existe";
				$mailEnUso = true;
				require_once "views/registroUsuario.php";
			} elseif ($_GET["password"] != $_GET["confirmPassword"]) {
				//echo "No vale na";
				$noCoinciden = true;
				require_once "views/registroUsuario.php";
			} else { //Se registra si ninguna de las anteriores se activa
				//echo "EIN?";
				$usuario->insert($nick, $nombre, $email, $contrasena);
				$exito = true;
				require_once "views/loginUsuario.php";
			}
		}

		public function logOut(){
			// Vaciando la global $_SESSION
			$_SESSION[] = [] ;
			unset($_SESSION["usuario"]) ;

			// destruimos la sesión
			session_destroy() ;

			// redirigimos al index
			header("Location:index.php", 301);
		}
	}