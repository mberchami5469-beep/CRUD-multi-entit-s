<?php

require_once "../database/connexion.php";

if (!isset($_GET["id_formation"])) {
    die("ID manquant.");
}

$id_formation = $_GET["id_formation"];

$sql = "
    DELETE FROM formation
    WHERE id_formation = :id_formation
";

$statement = $connexion->prepare($sql);

$statement->execute([
    "id_formation" => $id_formation
]);

header("Location: index.php");
exit; 
?>