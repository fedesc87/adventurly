<?php
	function enviarAFelicidad()
	{
		header("location:exito.php");exit;
	}

// session_start();
// if (!isset($_SESSION["usuario"]) && isset($_POST["email"])) {
// 	loguear($_POST["email"]);
// }

function validarDatos($datos) {
	$errores = [];
	if (trim($datos["name"]) === "") {
		$errores["name"] = "Che amigo, te falto el nombre";
	}
	// if (strlen(trim($datos["username"])) <= 8) {
	// 	$errores["username"] = "Ey, guarda que el username tiene que tener más de 8 caracteres";
	// }
	$email = trim($datos["email"]);
	if ($email === "") {
		$errores["email"] = "Che amigo, te falto el mail";
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errores["email"] = "Mal formato de email";
	}
	else if (dameUnoPorMail($email) != NULL) {
		$errores["email"] = "Ese mail ya existe";
	}
	// if (!is_numeric($_POST["edad"])) {
	// 	$errores["edad"] = "La edad debe ser un número";
	// }
	$pass = trim($_POST["pass"]);
	$cpass = trim($_POST["cpass"]);
	if ($pass === "") {
		$errores["pass"] = "Llena la pass";
	}
	if ($cpass === "") {
		$errores["cpass"] = "Llena la cpass";
	}
	if ($pass != "" && $cpass != "" && $pass != $cpass) {
		$errores["pass"] = "Media pila che.. hiciste todo mal (con las contraseñas)";
	}
	return $errores;
}

function guardarImagen($upload, $errores) {
		if ($_FILES[$upload]["error"] == UPLOAD_ERR_OK)
		{
			$nombre=$_FILES[$upload]["name"];
			$archivo=$_FILES[$upload]["tmp_name"];
			$ext = pathinfo($nombre, PATHINFO_EXTENSION);
			if ($ext != "png" && $ext != "jpg") {
				$errores[] = "No acepto la extension";
			}
			else {
				$miArchivo = dirname(__FILE__);
				$miArchivo = $miArchivo . "/imagenesUser/";
				$miArchivo = $miArchivo . $_POST["name"] . "." . $ext;
				move_uploaded_file($archivo, $miArchivo);
			}
		} else
		{
			$errores[] = "Ey, no pude subir la foto :(";
		}
		return $errores;
	}

	function crearUsuario($datos) {
		$usuario = [
			"name" => $datos["name"],
			// "username" => $datos["username"],
			"email" => $datos["email"],
			// "edad" => $datos["edad"],
			"pass" => password_hash($datos["pass"], PASSWORD_DEFAULT),
			// "pais" => $datos["pais"]
		];
		$usuario["id"] = traerNuevoId();
		return $usuario;
	}

	function traerNuevoId() {
		$archivo = file_get_contents("usuarios.json");
		// Si el archivo estaba vacio devuelvo 1
		if ($archivo == "") {
			return 1;
		}
		// Divido mi archivo por enters
		$usuarios = explode(PHP_EOL, $archivo);
		// Borro la linea del enter vacio
		array_pop($usuarios);
		// Obtengo el ultimo usuario
		$ultimoUsuario = $usuarios[count($usuarios) - 1];
		// Transformo mi ultimo usuario en formoto array
		$ultimoUsuario = json_decode($ultimoUsuario,true);
		// Devuelvo ese id + 1
		return $ultimoUsuario["id"] + 1;
	}

	function guardarUsuario($usuario) {
		$json = json_encode($usuario);
		file_put_contents("usuarios.json", $json . PHP_EOL, FILE_APPEND);
	}

	function dameUnoPorMail($mail) {
		$usuarios = dameTodos();
		foreach ($usuarios as $usuario) {
			if ($usuario["email"] == $mail) {
				return $usuario;
			}
		}
		return NULL;
	}

	function dameTodos() {
		$archivo = file_get_contents("usuarios.json");
		// Lo separo linea por linea
		$usuariosJSON = explode(PHP_EOL, $archivo);
		// Borro el enter vacio
		array_pop($usuariosJSON);
		$usuariosFinal = [];
		foreach ($usuariosJSON as $usuarioJSON) {
			$usuariosFinal[] = json_decode($usuarioJSON,true);
		}
		return $usuariosFinal;
	}

	function dameUnoPorId($id) {
		$usuarios = dameTodos();
		foreach ($usuarios as $usuario) {
			if ($usuario["id"] == $id) {
				return $usuario;
			}
		}
		return NULL;
	}

	function validarLogin($datos) {
		$errores = [];
		$email = trim($datos["email"]);
		if ($email == "") {
			$errores["email"] = "Che amigo, te falto el mail";
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errores["email"] = "Mal formato de email";
		}
		else if (dameUnoPorMail($email) == NULL) {
			$errores["email"] = "Ese mail no existe en nuestra base";
		} else {
			// SIGNIFICA QUE EL USUARIO EXISTE
			$usuario = dameUnoPorMail($email);
			if (!password_verify($datos["pass"], $usuario["pass"])) {
				$errores["email"] = "Contraseña invalida";
			}
		}
		return $errores;
	}

	function loguear($mail) {
		$_SESSION["usuario"] = $mail;
		$usuario = dameUnoPorMail($mail);
		$_SESSION["nombre"] = $usuario["name"];
		$_SESSION["email"] = $usuario["email"];
	}
 ?>
