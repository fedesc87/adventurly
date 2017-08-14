<hr id="adventures">
						<div class="row">
						<?php
						// $q = intval($_GET['q']);
						$con = mysqli_connect('localhost','root','','adventurly');
						if (!$con) {
						    die('Could not connect: ' . mysqli_error($con));
						}
						// mysqli_select_db($con,"ajax_demo");
						$sql="SELECT * FROM historia";
						$result = mysqli_query($con,$sql);

						while($row = mysqli_fetch_array($result)) { ?>
							<div class="6u 12u(narrower)">
								<section class="box special">
									<span class="image featured"><img src="images/historia/<?php echo $row['imagen']; ?>" alt="" /></span>
									<h3><<?php echo $row['titulo']; ?></h3>
									<p>Toda gran aventura empieza con un héroe y su decisión de seguir el camino.<br>
										<i>Esta aventura te va a ayudar a entender el sistema de Adventurly</i></p>
									<hr>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-half-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<ul class="actions">
									 <li><a href="historia.php?id=<?php echo $row['id']; ?>" class="button special fit">
											<i class="fa fa-tree" aria-hidden="true"></i>
											 Empezá!</a>
										</li>
									</ul>
								</section>
							</div>
							<?php } mysqli_close($con); ?>