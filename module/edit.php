<?php

require_once "../database/connexion.php";

if (!isset($_GET["id_module"])) {
    die("ID manquant.");
}

$id_module = $_GET["id_module"];

$sql = "
    SELECT * FROM module
    WHERE id_module = :id_module
";

$statement = $connexion->prepare($sql);

$statement->execute([
    "id_module" => $id_module
]);

$module = $statement->fetch(
    PDO::FETCH_ASSOC
);

if (!$id_module) {
    die("etudiant non trouve.");
}

$sql = "SELECT id_formation, intitule FROM formation ORDER BY intitule";

$statement = $connexion->query($sql);

$formation = $statement->fetchAll(
    PDO::FETCH_ASSOC
);

if (
    isset($_POST["titre"])
    && isset($_POST["nb_heures"])
    && isset($_POST["id_formation"])
) {

    $titre = $_POST["titre"];
    $nb_heures = $_POST["nb_heures"];
    $id_formation = $_POST["id_formation"];

    $sql = "
        UPDATE module

        SET
            titre = :titre,
            nb_heures = :nb_heures,
            id_formation = :id_formation


        WHERE id_module = :id_module
    ";

    $statement = $connexion->prepare($sql);

    $statement->execute([
        "titre" => $titre,
        "nb_heures" => $nb_heures,
                "id_formation" => $id_formation,

        "id_module" => $id_module
    ]);

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un module</title>
 <link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/pages.css">
</head>
<body>

    <h1>Modifier un module</h1>

    <form method="POST">

        <div>
            <label for="titre">titre :</label>
            <input type="text" id="titre" name="titre"
            value="<?php echo htmlspecialchars($module["titre"]); ?>" required>
        </div>

        <br>

        <div>
            <label for="nb_heures">nb_heures :</label>
            <input type="text" id="nb_heures" name="nb_heures"
            value="<?php echo htmlspecialchars($module["nb_heures"]); ?>" required>
        </div>

        <br>


        <div>
    <label for="id_formation">Formation :</label>
    <select id="id_formation" name="id_formation" required>

        <?php foreach ($formation as $f) { ?>

            <option value="<?php echo $f["id_formation"]; ?>"
            <?php
            if ($f["id_formation"] == $module["id_formation"]) {
                echo "selected";
            }
            ?>>

                <?php echo $f["intitule"]; ?>

            </option>

        <?php } ?>

    </select>
</div>

        <br>

        <button type="submit">Modifier</button>

    </form>

    <br>

    <a href="index.php">Retour</a>

</body>
</html>
