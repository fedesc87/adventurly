<?php
$pagName = "Log In";
require_once("head.php");

//Codigo del JSon
// $fp = fopen("usuarios.json","r");
// $fs = filesize("usuarios.json");
// $jstring = fread($fp,$fs);
// $jarray = json_decode($jstring,true);
//
// if ($_POST)
// {
// 	// $pNombre = $_POST["name"];
// 	$pMail = $_POST["email"];
// 	//Acá vengo si me enviaron el form
//
// 	//Validar
// 	$errores = validarLogin($_POST);
//
// 	// Si no hay errores....
// 	if (empty($errores))
// 	{
// 		$usuario = loguear($_POST['email']);
// 		// Reenviarlo a la felicidad
// 		header("location:index.php");exit;
// 	}
// }
require_once 'clsValidacion.php';
require_once 'clsUsuario.php';

if($_POST) {
	$validar = new Validacion();

	//validamos
	$errores = array();
	if(!$validar->validarPassword($_POST['pass'])) {
		$errores[] = 'La Contraseña no es valida';
	}
	if(!$validar->validarEmail($_POST['email'])) {
		$errores[] = 'El email no es valido';
	}
	if(empty($errores)) {

		$db = new PDO('mysql:host=localhost;dbname=adventurly',
						'root',
						'root');

		$usuario = new Usuario($db);

		$usuario->logeo($_POST);
	}
}
?>

			<!-- Banner -->
				<section id="banner">
					<h2>Ingresa!</h2>
				</section>

			<!-- Main -->
			<section id="main" class="container 75%">
				<section class="box special">
				<header>
					<h2>Nos volvemos a ver!</h2>
					<p>Seguí justo donde dejaste tus aventuras y ganá parches.</p>
				</header>

					<form method="post" action="">
						<div class="row uniform">
							<p>
								<?php if (!empty($errores)) { ?>
									<div class="errores">
										<ul>
											<?php foreach ($errores as $error) {
												echo"<li>";
												echo $error;
												echo "</li>";
											} ?>
										</ul>
									</div>
								<?php } ?>
							</p>
						</div>
						<div class="row uniform 50%">
							<div class="12u">
								<label>Email</label>
								<input type="email" name="email" id="email" value="" placeholder="E-mail" />
							</div>

							<div class="12u">
								<label>Contraseña</label>
								<input type="password" name="pass" id="pass" value="" placeholder="Password" />
							</div>

							<div class="6u 12u(mobilep)">
								<a href="#">Te olvidaste tu contraseña?</a>
							</div>

							<div class="6u 12u(mobilep)">
								<input type="checkbox" name="remember" value="remembered" checked>
								<label for="remember"><h4>Recordame</h4></label>
							</div>

							<div class="6u 12u(mobilep)">
								<ul class="actions align-center">
									<li><input type="submit" value="Log In" /></li>
								</ul>
							</div>
							<div class="6u 12u(mobilep)">
								<ul class="actions align-center">
									<li><input type="submit" value="Log with Facebook"/></li>
								</ul>
							</div>
						</div>
					</form>
				</section>
			</section>

			<?php require_once("footer.php"); ?>
