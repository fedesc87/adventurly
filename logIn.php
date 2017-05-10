<?php
$pagName = "Log In";
$userName = "Fede";
require_once("head.php");
require_once("nav.php");

$fp = fopen("usuarios.json","r");
$fs = filesize("usuarios.json");
$jstring = fread($fp,$fs);
$jarray = json_decode($jstring,true);

$_POST
?>

			<!-- Banner -->
				<section id="banner">
					<h2>Ingresa!</h2>
				</section>

			<!-- Main -->
			<section id="main" class="container 75%">
				<section class="box special">
				<header>
					<h2>Nos Volvemos a Ver!</h2>
					<p>Segui justo donde dejaste tus aventuras y Gana Parches!</p>
				</header>

					<form method="post" action="">

						<div class="row uniform 50%">
							<div class="12u">
								<input type="text" name="name" id="name" value="" placeholder="Name" />
							</div>

							<div class="12u">
								<input type="password" name="password" id="password" value="" placeholder="Password" />
							</div>

							<div class="6u 12u(mobilep)">
								<a href="#">Te olvidaste tu contraseña?</a>
							</div>

							<div class="6u 12u(mobilep)">
								<input type="checkbox" name="remember" value="remembered" checked>
								<label for="remember"><h4>Recuerdame</h4></label>
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
