<?php
$pagName = "Log In";
$userName = "Fede";
require_once("head.php");
require_once("nav.php");
require_once("funciones.php");
$pNombre = "";
$pApellido = "";
$pMail = "";
$file = "usuarios.json";

if ($_POST)
{
	$pNombre = $_POST["name"];
	$pMail = $_POST["email"];
	//Acá vengo si me enviaron el form

	//Validar
	$errores = validarUsuario($_POST);

	// Si no hay errores....
	if (empty($errores))
	{
		$usuario = crearUsuario($_POST);
		// Guardar al usuario en un JSON
		guardarUsuario($usuario);
		// Reenviarlo a la felicidad
		enviarAFelicidad();
	}
}

$fp = fopen($file,"r");
$fs = filesize($file);
$jstring = fread($fp,$fs);
$jarray = json_decode($jstring,true);

$_POST
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
						<p>Unite a la aventura, guarda tu progreso y Disfruta!.</p>
					</header>

					<form method="post" action="#" enctype="multipart/form-data">
						<div class="row uniform 50%">
							<div class="6u 12u(mobilep)">

								<?php if (!empty($errores)) { ?>
									<div style="width:300px;background-color:red">
										<ul>
											<?php foreach ($errores as $error) { ?>
												<li>
													<?php echo $error ?>
												</li>
											<?php } ?>
										</ul>
									</div>
								<?php } ?>

								<input type="text" name="name" id="name" value="<?=$pNombre?>" placeholder="Nombre" />
							</div>
							<div class="6u 12u(mobilep)">
								<input type="email" name="email" id="email" value="<?=$pMail?>" placeholder="Email" />
							</div>
						</div>
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
									<li><input type="submit" value="Sign In" /></li>
								</ul>
							</div>
							<div class="6u 12u(mobilep)">
								<ul class="actions align-center">
									<li><input type="submit" value="Sign with Facebook" /></li>
								</ul>
							</div>
						</div>
						<div class="row uniform">
							<p>

							</p>
						</div>
					</form>

				</section>
			</section>

<?php require_once("footer.php"); ?>
