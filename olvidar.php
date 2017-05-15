<?php
$pagName = "Log In";
require_once("head.php");


$fp = fopen("usuarios.json","r");
$fs = filesize("usuarios.json");
$jstring = fread($fp,$fs);
$jarray = json_decode($jstring,true);

if ($_POST)
{
	// $pNombre = $_POST["name"];
	$pMail = $_POST["email"];
	//Acá vengo si me enviaron el form

	//Validar
	$errores = validarLogin($_POST);

	// Si no hay errores....
	if (empty($errores))
	{
		$usuario = loguear($_POST['email']);
		// Reenviarlo a la felicidad
		header("location:index.php");exit;
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
					<h2>Te olvidaste tu Contraseña!</h2>
					<p>No te preocupes nosotros nos aventuramos y la buscamos.<br>
					<i>ingresa tu E-Mail y la guiamos ahi cuando la tengamos!</i></p>
				</header>

					<form method="post" action="">

						<div class="row uniform 50%">
							<div class="12u">
								<input type="email" name="email" id="email" value="" placeholder="E-mail" />
							</div>
							<div class="3u 12u(mobilep)">

							</div>
							<div class="6u 12u(mobilep)">
								<ul class="actions align-center">
									<li><input type="submit" value="A buscar!" /></li>
								</ul>
							</div>

						</div>
						<div class="row uniform">
							<p>
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
							</p>
						</div>
					</form>
				</section>
			</section>

			<?php require_once("footer.php"); ?>
