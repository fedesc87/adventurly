<?php
      

      $id_historia = intval($_GET['historiaId']);

      $id_parent = intval($_GET['parentId']);


			$con = mysqli_connect('localhost','root','','adventurly');
			if (!$con) {
			    die('Could not connect: ' . mysqli_error($con));
			}
			// mysqli_select_db($con,"ajax_demo");
			$sql="CALL get_elecciones_by_parent($id_historia, $id_parent)";
			$elecciones = mysqli_query($con,$sql);
			?>

			<!-- <ul class="actions"> -->
			<?php
			while($row = mysqli_fetch_array($elecciones)) {?>
        <li><a href="#" onclick="executeEleccion(this)" data-eleccion-id="<?php echo $row['id'] ?>" data-consecuencia="<?php echo $row['consecuencia'] ?>" class="button special fit">
           <?php echo $row['decision'] ?></a>
				</li>
				<?php } mysqli_close($con); ?>
			<!-- </ul> -->