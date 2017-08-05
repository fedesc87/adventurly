<?php
$pagName = "Sign Up";
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

	// $validar = new Validacion();
	//
	// //validamos
	//
	// $errores = array();
	//
	// if(!$validar->validarEmail($_POST['email'])) {
	// 	$errores[] = 'El email no es valido';
	// }
	//
	// if(!$validar->validarPassword($_POST['pass'])) {
	// 	$errores[] = 'La contraseña debe tener por lo menos 8 caracteres';
	// }
	//
	// if(!$validar->validarUsuario($_POST['name'])) {
	// 	$errores[] = 'El usuario no es valido';
	// }
	// if ($_POST["cpass"] != $_POST['pass']) {
	// 	$errores[] = 'Las contraseñas no concuerdan';
	// }

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

<script type="text/javascript">
function validateForm() {
	var pass = document.signup.pass.value;
	var cpass = document.signup.cpass.value;
	var email = document.signup.email.value;

	$(email).blur(function(){
		//Estoy perdido (?)
		$.post('clsUsuario.php', function()
		{

		});
		// existeUsuarioConEsteEmail(email)
		alert(email)
	});

	if (pass != cpass) {
		alert('Las contraseñas no coinciden');
		return false;
	}
}
</script>

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

					<form method="post" name="signup" onsubmit="return validateForm()" action="" enctype="multipart/form-data">
						<div class="row uniform">
								<?php if (!empty($errores)) { ?>
									<div class="errores 12u">
											<?php foreach ($errores as $error) {
												echo $error . "<br>";
											} ?>
									</div>
								<?php } ?>
						</div>
						<div class="row uniform 50%">
							<div class="6u 12u(mobilep)">
								<input type="text" name="name" id="name" value="<?=$pNombre?>" placeholder="Nombre" required=""/>
							</div>
							<div class="6u 12u(mobilep)">
								<input type="email" name="email" id="email" value="<?=$pMail?>" placeholder="E-mail" required=""/>
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
								<input type="password" name="pass" id="password" value="" placeholder="Contraseña" required=""/>
							</div>
						</div>
						<div class="row uniform 50%">
							<div class="12u">
								<input type="password" name="cpass" id="passwordCh" value="" placeholder="Confirma Contraseña" required=""/>
							</div>
						</div>
						<div class="row uniform">
							<div class="6u 12u(mobilep)">
								<ul class="actions align-center">
									<li><input type="submit" id="btn-submit" value="Sign Up" /></li>
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
