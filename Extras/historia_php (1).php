<?php
$id = intval($_GET['id']);
$pagName = "Home";
require_once("head.php");
require_once("partial_elecciones.php");
// $id = intval($_GET['id']);
?>
			<!-- Banner -->
				<section id="banner">
					<img src="images/Aventurefy-02.png" alt="Logo de Adventurly">
					<h2>Adventurly</h2>
				</section>
				<section id="main" class="container">
					<section class="box special">
						<header class="major">
							<h2></h2>
						</header>
						<hr id="adventures">
								<section class="box special">
									<?php
									// $q = intval($_GET['q']);
									$con = mysqli_connect('localhost','root','','adventurly');
									if (!$con) {
									    die('Could not connect: ' . mysqli_error($con));
									}
									$sql="SELECT * FROM historia";
									$result = mysqli_query($con,$sql);

									while($row = mysqli_fetch_array($result)) { ?>

									<span class="image featured"><img src="images/historia/<?php echo $row['imagen'] ?>" alt="" /></span>
									<h3><?php echo $row['titulo'] ?></h3>
									<p class="consecuencia"><?php echo $row['intro'] ?></p>
									<!-- <p>En un gran bosque había un lobo malo, y no se que poner.<br>
										<i>Pensá bien que querés hacer, mira si te come el lobo...</i></p> -->
									<hr>
									<?php } mysqli_close($con); ?>

									<?php
									// $q = intval($_GET['q']);
									$con = mysqli_connect('localhost','root','','adventurly');
									if (!$con) {
									    die('Could not connect: ' . mysqli_error($con));
									}
									// mysqli_select_db($con,"ajax_demo");
									$sql="CALL get_elecciones_by_parent($id, 0)";
									$elecciones = mysqli_query($con,$sql);
									?>
									<ul class="actions">
										<?php
									while($row = mysqli_fetch_array($elecciones)) {?>
										<li><a href="#" onclick="executeEleccion(this)" data-eleccion-id="<?php echo $row['id'] ?>" data-consecuencia="<?php echo $row['consecuencia'] ?>" class="button special fit">
											 <?php echo $row['decision'] ?></a>
										</li>
										<?php } mysqli_close($con); ?>
									</ul>
								</section>
					</section>
				</section>
