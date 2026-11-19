<?php

require_once "../database/connexion.php";

if (!isset($_GET["id_etudiant"])) {
    die("ID manquant.");
}

$id_etudiant = $_GET["id_etudiant"];

$sql = "
    DELETE FROM books
    WHERE id_etudiant = :id_etudiant
";

$statement = $connexion->prepare($sql);

$statement->execute([
    "id_etudiant" => $id_etudiant
]);

header("Location: index.php");
exit;