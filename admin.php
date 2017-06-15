<?php
$pagName = "admin";
require_once("head.php");
require_once('clsUsuario.php');
require_once('clsValidacion.php');

$fp = fopen("usuarios.json","r");
$fs = filesize("usuarios.json");
$jstring = fread($fp,$fs);
$jarray = json_decode($jstring, true);
$transferidos = [];
if ($_POST) {
  $db = new PDO('mysql:host=localhost;dbname=adventurly',
          'root',
          'root');

  foreach ($jarray as $innerArray) {

      $validar = new Validacion();
      $usuario = new Usuario($db);
    	//validamos
    	$errores = array();

    	if(!$validar->validarEmail($innerArray['email'])) {
    		$errores[] = 'El email no es valido';
    	}

    	if(!$validar->validarUsuario($innerArray['name'])) {
    		$errores[] = 'El usuario no es valido';
    	}

      if($usuario->existeUsuarioConEsteEmail($innerArray['email']) == true) {
        $errores[] = 'Los usuarios ya existen en nuestra base de datos';
      }

    	if(empty($errores)) {
        $transferidos[] = $innerArray['email'];
    		$idusuario = $usuario->registrarJSON($innerArray);
      }
  }
}
// $db = new PDO('mysql:host=localhost;dbname=adventurly',
//         'root',
//         'root');//
// $usuario = new Usuario($db);//
// $idusuario = $usuario->registrarUsuario($_POST);
?>
<div class="" style="height: 40vh;background-color: #7f8c8d;color: #16a085;padding: 10px;">
  <h1 style="color:#7f8c8d;">fondo</h1>
</div>
<section id="main" class="container 75%">
  <section class="box special">

<header>
 <h2>Admin Section</h2>
 <p>Seccion para transferir datos JSon a BD</p>
</header>

<form method="post" action="" enctype="multipart/form-data">
  <!-- <div class="row uniform 50%">
    <div class="12u">
      <input type="text" name="name" id="name" value="" placeholder="Nombre" />
    </div>
  </div> -->
 <div class="row uniform">
   <div class="12u">
     <ul class="actions align-center">
       <li><input type="submit" name="submit" value="Transferir"/></li>
     </ul>
     <hr>
   </div>
   <div class="12u">
     <section class='box special'>
       <?php
        echo"<pre>";
        print_r($_POST);
        print_r($transferidos);
       ?>
     </section>
     <hr>
   </div>
 </div>
 <div class="row">
   <?php if ($_POST) {
   echo "<div class='12u align-center' style='height: 20vh;font-weight: 500;background-color: #8e44ad;color: #7f8c8d;padding: 10px;border-radius: 10px;'>";
     echo "<h3 style='color: #e74c3c;font-weight: 500;'>usuarios Transferidos</h3>";
     echo "<section style='height: 20vh;font-weight: 500;background-color: #8e44ad;color: #7f8c8d;padding: 10px;border-radius: 10px;'>";
     echo "<ul style='color: #e74c3c;list-style: none;'>";
        foreach ($errores as $key => $value) {
          echo "<li>" . $value . "</li>";
        }
     echo "</ul>";
     echo "</section>";
     echo "<hr>";
     echo "<section style='font-weight: 500;background-color: #8e44ad;color: #7f8c8d;padding: 10px;border-radius: 10px;'>";
     echo "<ul style='color: #e74c3c;list-style: none;'>";
        foreach ($transferidos as $key => $value) {
          echo "<li>" . $value . "</li>";
        }
     echo "</ul>";
     echo "</section>";
     }
   echo "</div>";
   ?>
 </div>

</form>
</section>
</section>
<?php require_once("footer.php");?>
