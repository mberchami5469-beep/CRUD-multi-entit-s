<?php

require_once "../database/connexion.php";

if (!isset($_GET["id_module"])) {
    die("ID manquant.");
}

$id_module = $_GET["id_module"];

$sql = "
    DELETE FROM module
    WHERE id_module = :id_module
";

$statement = $connexion->prepare($sql);

$statement->execute([
    "id_module" => $id_module
]);

header("Location: index.php");
exit; 
?>