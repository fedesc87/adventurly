<?php

class Usuario {


	public $email;
	public $password;
	public $usuario;

	public $db;

	public function __construct($db) {

		$this->db = $db;

	}

	public function existeUsuarioConEsteEmail($e) {

		$sql = "SELECT * FROM usuarios WHERE email = '".$e."'";

		$this->db->query($sql);
		return $this->db->query($sql)->fetchColumn();
		//return $this->db->fetchColumn();
	}

	public function registrarUsuario($arr) {


		$sql = "INSERT INTO usuarios (name, email, pass) VALUES ('".$arr['name']."','".$arr['email']."','".md5($arr['pass'])."')";

		$this->db->query($sql);

		return $this->db->lastInsertId();
	}

	public function registrarJSON($arr) {

		$sql = "INSERT INTO usuarios (name, email, pass) VALUES ('".$arr['name']."','".$arr['email']."','".($arr['pass'])."')";

		$this->db->query($sql);

		return $this->db->lastInsertId();
	}

	public function logeo($arr){
		$sql = "SELECT id, name, email FROM usuarios
		 WHERE email = '".$arr['email']."'
		 and pass = '".md5($arr['pass'])."'";
		 //echo $sql;
		$result = $this->db->query($sql);
		$usuario = $result->fetch(PDO::FETCH_ASSOC);
		//print_r($usuario);

		if($usuario){
			session_start();
			$_SESSION['name']=$usuario['name'];
			$_SESSION['email']=$usuario['email'];
			$_SESSION['id']=$usuario['id'];
			header('location:index.php');
			exit();
		}else{
			// retorno error y muestro en el formulario.
		}

	}

}
