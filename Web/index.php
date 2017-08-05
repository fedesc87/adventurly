<?php
$pagName = "Home";
require_once("head.php");
?>

			<!-- Banner -->
				<section id="banner">
					<img src="images/Aventurefy-02.png" alt="Logo de Adventurly">
					<h2>Adventurly</h2>
					<p>Aventuras interactivas donde vos tomás las deciciones!</p>
					<ul class="actions">
						<li><a href="#cta" class="button special">Anotate</a></li>
						<!-- <li><a href="#adventures" class="button special">Empeza!</a></li> -->
					</ul>
				</section>

			<!-- Main -->
				<section id="main" class="container">

					<section class="box special">
						<header class="major">
							<h2>Las mejores aventuras te esperan
							<br />
							para que crees una experiencia única!</h2>
							<p>Viví excitantes aventuras emocionantes<br />
							donde tus deciciones son lo que más importa.</p>
						</header>
						<hr id="adventures">
						<div class="row">
							<div class="6u 12u(narrower)">

								<section class="box special">
									<span class="image featured"><img src="images/elOrigen.jpg" alt="" /></span>
									<h3>El Origen</h3>
									<p>Toda gran aventura empieza con un héroe y su decición de seguir el camino.<br>
										<i>Esta aventura te va a ayudar a entender el sistema de Adventurly</i></p>
									<hr>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-half-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<ul class="actions">
										<li><a href="elPrincipio.php" class="button special fit">
											<i class="fa fa-tree" aria-hidden="true"></i>
											 Empezá!</a>
										</li>
									</ul>
								</section>

							</div>
							<div class="6u 12u(narrower)">

								<section class="box special">
									<span class="image featured prox"><img src="images/elFin.jpg" alt="" /></span>
									<h3>El Fin</h3>
									<p>Todo termina al fin, Nada puede quedar. Nuestras aventuras pueden terminar pero el aventurero en nosotros no!</p>
									<hr>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>

									<ul class="actions">
										<li><a href="#" class="button fit disabled">Proximamente</a></li>
									</ul>
								</section>

							</div>
						</div>
						<span class="image featured"><img src="images/pic01.jpg" alt="" /></span>
					</section>



				</section>

			<!-- CTA -->
				<section id="cta">

					<h2>Anotate para más!</h2>
					<p>Volvete el primero en jugar y recibí un
						<span class="fa-stack">
							<i class="fa fa-dot-circle-o fa-stack-1x"></i>
							<i class="fa fa-sun-o fa-spin fa-fw fa-stack-2x"></i>
						</span>
						parche exclusivo.</p>

					<form>
						<div class="row uniform 50%">
							<div class="8u 12u(mobilep)">
								<input type="email" name="email" id="email" placeholder="Email" />
							</div>
							<div class="4u 12u(mobilep)">
								<input type="submit" value="Anotate" class="fit" />
							</div>
						</div>
					</form>

				</section>

<?php require_once("footer.php"); ?>
