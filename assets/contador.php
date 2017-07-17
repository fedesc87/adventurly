<?php

if (isset($_POST['request'])) {
  $db = new PDO('mysql:host=localhost;dbname=adventurly',
          'root',
          'root');

  $sql = "SELECT COUNT(id)
          FROM usuarios;";

  $this->db->query($sql);
  return $this->db->query($sql)->fetchColumn();
}

 ?>
