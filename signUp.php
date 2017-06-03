<?php
$pagName = "Sign In";
require_once("head.php");
//Registro JSon
// if ($_POST)
// {
// 	// $pNombre = $_POST["name"];
// 	// $pMail = $_POST["email"];
// 	//Acá vengo si me enviaron el form
// 	// if (!isset($_SESSION["usuario"])) {
// 	// 	loguear($_POST["email"]);
// 	// }
// 	//Validar
// 	$errores = validarDatos($_POST);
//
// // if ($_FILES) {
// // 	guardarImagen("avatar",$errores);
// // }
// 	// Si no hay errores....
// 	if (empty($errores))
// 	{
// 		$usuario = crearUsuario($_POST);
// 		// Guardar al usuario en un JSON
// 		guardarUsuario($usuario);
// 		// Guarda la imagen
// 		// guardarImagen("avatar",$errores);
// 		//lo logeamos
// 		$usuario = loguear($_POST['email']);
// 		// Reenviarlo a la felicidad
// 		enviarAFelicidad();
// 	}
// }
//
// $fp = fopen($file,"r");
// $fs = filesize($file);
// $jstring = fread($fp,$fs);
// $jarray = json_decode($jstring,true);
require 'clsValidacion.php';
require 'clsUsuario.php';

if($_POST) {

	$validar = new Validacion();

	//validamos

	$errores = array();

	if(!$validar->validarEmail($_POST['email'])) {
		$errores[] = 'El email no es valido';
	}

	if(!$validar->validarPassword($_POST['pass'])) {
		$errores[] = 'La contraseña no es valida';
	}

	if(!$validar->validarUsuario($_POST['name'])) {
		$errores[] = 'El usuario no es valido';
	}
	if ($_POST["cpass"] != $_POST['pass']) {
		$errores[] = 'Las contraseñas no concuerdan';
	}

	if(empty($errores)) {

		$db = new PDO('mysql:host=localhost;dbname=adventurly',
						'root',
						'root');

		$usuario = new Usuario($db);

		$idusuario = $usuario->registrarUsuario($_POST);

		echo "el id es " . $idusuario;

		header("location:exito.php");exit;
	}
}
?>

			<!-- Banner -->
				<section id="banner">
					<h2>Registrate!</h2>
				</section>

			<!-- Main -->
			<section id="main" class="container 75%">
				<section class="box special">

					<header>
						<h2>Asociate Gratis!</h2>
						<p>Unite a la aventura, guardá tu progreso y disfrutá.</p>
					</header>

					<form method="post" action="" enctype="multipart/form-data">
						<div class="row uniform">
							<p>
								<?php if (!empty($errores)) { ?>
									<div class="12u errores">
										<ul>
											<?php foreach ($errores as $error) {
												echo "<li>";
												echo $error;
												echo "</li><br>";
											} ?>
										</ul>
									</div>
								<?php } ?>
							</p>
						</div>
						<div class="row uniform 50%">
							<div class="6u 12u(mobilep)">
								<input type="text" name="name" id="name" value="<?=$pNombre?>" placeholder="Nombre" />
							</div>
							<div class="6u 12u(mobilep)">
								<input type="email" name="email" id="email" value="<?=$pMail?>" placeholder="E-mail" />
							</div>
						</div>
						<!-- Aca va lo del avatar -->
						<!-- <div class="row uniform 50%">
							<div class="12u">
								<label for="avatar"> Subí tu imagen</label>
								<input type="file" name="avatar" id="avatar" value="" placeholder="avatar" />
							</div>
						</div> -->
						<div class="row uniform 50%">
							<div class="12u">
								<input type="password" name="pass" id="password" value="" placeholder="Contraseña" />
							</div>
						</div>
						<div class="row uniform 50%">
							<div class="12u">
								<input type="password" name="cpass" id="passwordCh" value="" placeholder="Confirma Contraseña" />
							</div>
						</div>
						<div class="row uniform">
							<div class="6u 12u(mobilep)">
								<ul class="actions align-center">
									<li><input type="submit" value="Sign Up" /></li>
								</ul>
							</div>
							<div class="6u 12u(mobilep)">
								<ul class="actions align-center">
									<li><input type="submit" value="Sign with Facebook" /></li>
								</ul>
							</div>
						</div>
						<hr>

					</form>

				</section>
			</section>

<?php require_once("footer.php"); ?>
