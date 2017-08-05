<?php
$pagName = "admin";
require_once("head.php");
require_once('clsUsuario.php');
require_once('clsValidacion.php');

$fp = fopen("usuarios.json","r");
$fs = filesize("usuarios.json");
$jstring = fread($fp,$fs);
$jarray = json_decode($jstring, true);

$errores = array();
$transferidos = [];

if ($_POST) {
  $db = new PDO('mysql:host=localhost;dbname=adventurly',
          'root',
          'root');


  foreach ($jarray as $innerArray) {
      //echo "soy ".$innerArray['email'].'<br>';

      $validar = new Validacion();
      $usuario = new Usuario($db);
    	//validamos

    	if(!$validar->validarEmail($innerArray['email'])) {
    		$errores[] = 'El email no es valido';
    	}

    	if(!$validar->validarUsuario($innerArray['name'])) {
    		$errores[] = $innerArray['name'].' es un usuario no valido';
    	}

      if($usuario->existeUsuarioConEsteEmail($innerArray['email']) == true) {
        //echo "existo papu ".$innerArray['email'].'<br>';
        $errores[] = $innerArray['email'].' ya existen en nuestra base de datos';
      }

    	if(empty($errores)) {
        //echo "me transferi ".$innerArray['email'].'<br>';
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
   <!-- <div class="12u">
     consola para debuggear
     <section class='box special'>
       <?php
        // echo "<h3>Debug console</h3>";
        // echo"<pre>";
        // print_r($_POST);
        // print_r($transferidos);
       ?>
     </section>
     <hr>
   </div> -->
 </div>
 <div class="row">
   <div class="12u align-center">
     <h2 style='color: #e74c3c;font-weight: 500;'>Transferencia de Usuarios</h2>
   </div>

   <div class='12u align-center' style='font-weight: 500;background-color: #8e44ad;color: #7f8c8d;padding: 10px;border-radius: 10px;'>
    <h3 style='color: #e74c3c;font-weight: 500;'>Errores de transferencia</h3>
    <hr style='color: #e74c3c;'>
     <section style='font-weight: 500;background-color: #8e44ad;color: #7f8c8d;padding: 10px;border-radius: 10px;'>
    <?php if ($_POST) {
     echo "<ul style='color: #e74c3c;list-style: none;'>";
        foreach ($errores as $key => $value) {
          echo "<li>" . $value . "</li>";
        }
     echo "</ul>";
     }
     ?>
    </section>

    <h3 style='color: #e74c3c;font-weight: 500;'>Usuarios Transferidos</h3>
    <hr style='color: #e74c3c;'>

    <section style='font-weight: 500;background-color: #8e44ad;color: #7f8c8d;padding: 10px;border-radius: 10px;'>

    <?php if ($_POST) {
     echo "<ul style='color: #e74c3c;list-style: none;'>";
        foreach ($transferidos as $key => $value) {
          echo "<li>" . $value . "</li>";
        }
     echo "</ul>";
   }
    ?>
    </section>
   </div>
 </div>

</form>
</section>
</section>
<?php require_once("footer.php");?>
