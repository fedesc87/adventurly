<?php
$pagName = "Home";
$userName = "Fede";
require_once("head.php");
require_once("nav.php"); ?>

			<!-- Banner -->
				<section id="banner">
					<h2> </h2>
				</section>

			<!-- Main -->
				<section id="main" class="container">

					<section class="box special">
						<h2>Pagina de usuario</h2>
							<form method="post" action="#">
								<h4>Usuario</h4>
								<div class="row uniform 50%">
									<div class="9u 12u(mobilep)">
										<input type="text" name="nombre" value="" placeholder="<?=$pNombre?>" />
									</div>
									<div class="3u 12u(mobilep)">
										<input type="submit" value="Edit" class="button fit" />
									</div>
								</div>

								<h4>Email</h4>
								<div class="row uniform 50%">
									<div class="9u 12u(mobilep)">
										<input type="email" name="email" value="" placeholder="<?=$pMail?>" />
									</div>
									<div class="3u 12u(mobilep)">
										<input type="submit" value="Edit" class="button fit" />
									</div>
								</div>

								<h4>Contraseña</h4>
								<div class="row uniform 50%">
									<div class="9u 12u(mobilep)">
										<input type="text" name="pass" value="" placeholder="********" />
									</div>
									<div class="3u 12u(mobilep)">
										<input type="submit" value="Edit" class="button fit" />
									</div>
								</div>

								<h4>Imagen</h4>
								<div class="row uniform 50%">
									<div class="9u 12u(mobilep)">
										<input type="text" name="nombre" value="" placeholder="<?= $userName ?>" />
									</div>
									<div class="3u 12u(mobilep)">
										<input type="submit" value="Edit" class="button fit" />
									</div>
								</div>
							</form>



					</section>

				</section>

<?php require_once("footer.php"); ?>
