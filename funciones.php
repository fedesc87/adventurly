<?php
	function validarUsuario($miUsuario)
	{
		$errores = [];

		if (trim($miUsuario["name"]) == "")
		{
			$errores[] = "Falta el name";
		}
		if (trim($miUsuario["pass"]) == "")
		{
			$errores[] = "Falta la pass";
		}
		if (trim($miUsuario["cpass"]) == "")
		{
			$errores[] = "Falta el cpass";
		}
		if ($miUsuario["pass"] != $miUsuario["cpass"])
		{
			$errores[] = "Pass y Cpass son distintas";
		}
		if ($miUsuario["email"] == "")
		{
			$errores[] = "Falta el email";
		}
		if (!filter_var($miUsuario["email"], FILTER_VALIDATE_EMAIL))
		{
			$errores[] = "El mail tiene forma fea";
		}
		if (existeElMail($miUsuario["email"]))
		{
			$errores[] = "Usuario ya registrado";
		}
		return $errores;
	}

	function existeElMail($mail)
	{
		$usuarios = file_get_contents("usuarios.json");

		$usuariosArray = explode(PHP_EOL, $usuarios);

		array_pop($usuariosArray);

		foreach ($usuariosArray as $key => $usuario) {
			$usuarioArray = json_decode($usuario, true);

			if ($mail == $usuarioArray["email"])
			{
				return true;
			}
		}

		return false;
	}

	function guardarUsuario($miUsuario)
	{
		$usuarioJSON = json_encode($miUsuario);

		file_put_contents("usuarios.json", $usuarioJSON . PHP_EOL, FILE_APPEND);
		// chmod("usuarios.json",fileperms("usuarios.json") | 128 + 16 + 2);
	}

	function crearUsuario($miUsuario)
	{
		$usuario = [
			"name" => $miUsuario["name"],
			"email" => $miUsuario["email"],
			"password" => password_hash($miUsuario["pass"], PASSWORD_DEFAULT),
			"id" => traerNuevoId()
		];

		return $usuario;
	}

	function traerNuevoId()
	{
		$usuarios = file_get_contents("usuarios.json");

		$usuariosArray = explode(PHP_EOL, $usuarios);

		//Para quitar el último ENTER
		array_pop($usuariosArray);

		if (count($usuarios) == 0) {
			return 1;
		}

		$ultimoUsuario = $usuariosArray[count($usuariosArray) - 1];
		$ultimoUsuarioArray = json_decode($ultimoUsuario, true);

		return $ultimoUsuarioArray["id"] + 1;
	}

	function enviarAFelicidad()
	{
		// print_r ("usuarios.json");
		// header("location:index.php");exit;
	}
?>

session_start();
if (!isset($_SESSION["usuario"]) && isset($_COOKIE["recordar_usu"])) {
	loguear($_COOKIE["recordar_usu"]);
}
function validarDatos($datos) {
	$errores = [];
	if (trim($datos["nombre"]) === "") {
		$errores["nombre"] = "Che amigo, te falto el nombre";
	}
	if (strlen(trim($datos["username"])) <= 8) {
		$errores["username"] = "Ey, guarda que el username tiene que tener más de 8 caracteres";
	}
	$email = trim($datos["mail"]);
	if ($email === "") {
		$errores["mail"] = "Che amigo, te falto el mail";
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errores["mail"] = "Mal formato de email";
	}
	else if (dameUnoPorMail($email) != NULL) {
		$errores["mail"] = "Ese mail ya existe";
	}
	if (!is_numeric($_POST["edad"])) {
		$errores["edad"] = "La edad debe ser un número";
	}
	$pass = trim($_POST["password"]);
	$cpass = trim($_POST["cpassword"]);
	if ($pass === "") {
		$errores["password"] = "Llena la pass";
	}
	if ($cpass === "") {
		$errores["cpassword"] = "Llena la cpass";
	}
	if ($pass != "" && $cpass != "" && $pass != $cpass) {
		$errores["password"] = "Flaco, hiciste todo mal (con las contraseñas)";
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
				$miArchivo = $miArchivo . "/img/";
				$miArchivo = $miArchivo . $_POST["username"] . "." . $ext;
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
			"nombre" => $datos["nombre"],
			"username" => $datos["username"],
			"mail" => $datos["mail"],
			"edad" => $datos["edad"],
			"password" => password_hash($datos["password"], PASSWORD_DEFAULT),
			"pais" => $datos["pais"]
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
			if ($usuario["mail"] == $mail) {
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
		$email = trim($datos["mail"]);
		if ($email === "") {
			$errores["mail"] = "Che amigo, te falto el mail";
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errores["mail"] = "Mal formato de email";
		}
		else if (dameUnoPorMail($email) == NULL) {
			$errores["mail"] = "Ese mail no existe en nuestra base";
		} else {
			// SIGNIFICA QUE EL USUARIO EXISTE
			$usuario = dameUnoPorMail($email);
			if (!password_verify($datos["password"], $usuario["password"])) {
				$errores["mail"] = "Contraseña invalida";
			}
		}
		return $errores;
	}
	function loguear($mail) {
		$_SESSION["usuario"] = $mail;
	}
