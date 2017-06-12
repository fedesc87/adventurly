<?php

require 'clsUsuario.php';

$fp = fopen("usuarios.json","r");
$fs = filesize("usuarios.json");
$jstring = fread($fp,$fs);
$jarray = json_decode($jstring, true);

print_r($jarray);
var_dump($jarray);






// $db = new PDO('mysql:host=localhost;dbname=adventurly',
//         'root',
//         'root');
//
// $usuario = new Usuario($db);
//
// $idusuario = $usuario->registrarUsuario($_POST);


 ?>
