<?php
session_start();
require_once("funciones.php");
$file = "usuarios.json";
$pNombre = "";
$pMail = "";
if (isset($_SESSION["name"])) {
	// $_POST["name"] = $_SESSION["nombre"];
	// $_POST["email"] = $_SESSION["email"];
	$pNombre = $_SESSION["name"];
	$pMail = $_SESSION["email"];
}
?>
<html>
	<head>
		<link rel="shortcut icon" href="images/Aventurefy-03.ico">
		<title> <?= $pagName ?> | Adventurly </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing">
	  <div id="page-wrapper">

	    <!-- Header -->
	      <header id="header" class="alt">
	        <nav id="nav">
	          <ul>
	            <li><a href="index.php">Home</a></li>
						<?php if (!isset($_SESSION["name"])){
	            echo '<li><a href="logIn.php">Log In</a></li>';
	            echo '<li><a href="signUp.php">Sign Up</a></li>';
						}
						?>
	            <li><a href="faq.php">F.A.Q.</a></li>
	            <?php
	            if (isset($_SESSION["name"])) {?>
	                <li><a href="user.php"><i class="fa fa-user"></i>  <?= $pNombre ?></a></li>
									<li><a href="exit.php"><i class="fa fa-window-close"></i>  Exit </a></li>
	            <?php } ?>
	            <!-- <i class="fa fa-user fa-fw"> -->
	          </ul>
	        </nav>
	      </header>
