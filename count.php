<?php
// session_start();
//ver!!!
// $q = intval($_GET['q']);
// $q = $_GET['q'];

try{
    $pdo = new PDO("mysql:host=localhost;dbname=adventurly", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("No se pudo conectar a la base " . $e->getMessage());
}


try{
  // $sql = $db->query("SELECT COUNT(*) FROM table");
  // $row = $sql->fetch_row();
  // $count = $row[0];

    $sql = "SELECT count(*) FROM usuarios";
    $result = $pdo->query($sql);

    $row = $result->fetch();
    $count = $row[0];
    echo $count;
    // echo "<span>$count</span>";
      // $q = $count;

    } catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// unset($pdo);
?>
