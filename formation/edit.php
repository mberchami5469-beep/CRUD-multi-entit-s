
<?php

require_once "../database/connexion.php";

if (!isset($_GET["id_formation"])) {
    die("ID manquant.");
}

$id_formation = $_GET["id_formation"];

$sql = "
    SELECT * FROM formation
    WHERE id_formation = :id_formation
";

$statement = $connexion->prepare($sql);

$statement->execute([
    "id_formation" => $id_formation
]);

$formation = $statement->fetch(
    PDO::FETCH_ASSOC
);

if (!$formation) {
    die("formation non trouve.");
}



if (
    isset($_POST["intitule"])
    && isset($_POST["duree_heures"])
    && isset($_POST["niveau"])
   
) {

    $intitule = $_POST["intitule"];
    $duree_heures = $_POST["duree_heures"];
    $niveau = $_POST["niveau"];
    

    $sql = "
        UPDATE formation

        SET
            intitule = :intitule,
            duree_heures = :duree_heures,
            niveau = :niveau
          


        WHERE id_formation = :id_formation
    ";

    $statement = $connexion->prepare($sql);

    $statement->execute([
        "intitule"     => $intitule,
        "duree_heures" => $duree_heures,
        "niveau"       => $niveau,
        "id_formation" => $id_formation
        
    ]);

    header("Location: index.php");
    exit;
}

?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un étudiant</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/pages.css">
</head>
<body>

    <h1>Modifier une formation</h1>

    <form method="POST">

        <div>
            <label for="nom">intitule :</label>
            <input type="text" id="intitule" name="intitule"
            value="<?php echo htmlspecialchars($formation["intitule"]); ?>" required>
        </div>

        <br>

        <div>
            <label for="prenom">duree_heures :</label>
            <input type="text" id="duree_heures" name="duree_heures"
            value="<?php echo htmlspecialchars($formation["duree_heures"]); ?>" required>
        </div>

        <br>

        <div>
            <label for="date_naissance">niveau :</label>
            <input type="text" id="niveau" name="niveau"
            value="<?php echo $formation["niveau"]; ?>" required>
        </div>

        <br>

      

        <button type="submit">Modifier</button>

    </form>

    <br>

    <a href="index.php">Retour</a>

</body>
</html>