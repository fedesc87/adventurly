<?php

require_once('clsUsuario.php');
require 'clsValidacion.php';

$fp = fopen("usuarios.json","r");
$fs = filesize("usuarios.json");
$jstring = fread($fp,$fs);
$jarray = json_decode($jstring, true);

if (_POST["admin"] == ) {
  # code...
}
foreach ($jarray as $innerArray) {
  //echo "<pre>";
  //print_r($innerArray);

    $validar = new Validacion();

  	//validamos

  	$errores = array();

  	if(!$validar->validarEmail($innerArray['email'])) {
  		$errores[] = 'El email no es valido';
  	}

  	if(!$validar->validarUsuario($innerArray['name'])) {
  		$errores[] = 'El usuario no es valido';
  	}

  	if(empty($errores)) {

  		$db = new PDO('mysql:host=localhost;dbname=adventurly',
  						'root',
  						'root');

  		$usuario = new Usuario($db);

  		$idusuario = $usuario->registrarJSON($innerArray);

  echo "<br>";
  echo "<hr>";
}

// $db = new PDO('mysql:host=localhost;dbname=adventurly',
//         'root',
//         'root');
//
// $usuario = new Usuario($db);
//
// $idusuario = $usuario->registrarUsuario($_POST);
$pagName = "admin";
require_once("head.php");
?>

 <header>
   <h2>Admin Section</h2>
   <p>Seccion para transferir datos JSon a BD</p>
 </header>
 <form method="post" action="" enctype="multipart/form-data">
 <div class="row uniform">
   <div class="6u 12u(mobilep)">
     <ul class="actions align-center">
       <li><input type="submit" value="Transferir"/></li>
     </ul>
   </div>
   <div class="6u 12u(mobilep)">
     <ul class="actions align-center">
       <li><input type="submit" value="BD a JSon ???"/></li>
     </ul>
   </div>
 </div>
 <hr>

 </form>
 <?php require_once("footer.php"); ?>
