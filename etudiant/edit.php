<?php

require_once "../database/connexion.php";

if (!isset($_GET["id_etudiant"])) {
    die("ID manquant.");
}

$id_etudiant = $_GET["id_etudiant"];

$sql = "
    SELECT * FROM etudiant
    WHERE id_etudiant = :id_etudiant
";

$statement = $connexion->prepare($sql);

$statement->execute([
    "id_etudiant" => $id_etudiant
]);

$etudiant = $statement->fetch(
    PDO::FETCH_ASSOC
);

if (!$etudiant) {
    die("etudiant non trouve.");
}

$sql = "SELECT * FROM formation";

$statement = $connexion->query($sql);

$formation = $statement->fetchAll(
    PDO::FETCH_ASSOC
);

if (
    isset($_POST["nom"])
    && isset($_POST["prenom"])
    && isset($_POST["date_naissance"])
    && isset($_POST["id_formation"])
) {

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $date_naissance = $_POST["date_naissance"];
    $id_formation = $_POST["id_formation"];

    $sql = "
        UPDATE etudiant

        SET
            nom = :nom,
            prenom = :prenom,
            date_naissance = :date_naissance,
            id_formation = :id_formation


        WHERE id_etudiant = :id_etudiant
    ";

    $statement = $connexion->prepare($sql);

    $statement->execute([
        "nom" => $nom,
        "prenom" => $prenom,
        "date_naissance" => $date_naissance,
                "id_formation" => $id_formation,

        "id_etudiant" => $id_etudiant
    ]);

    header("Location: index.php");
    exit;
}

?>
```html
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un étudiant</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/pages.css">
</head>
<body>

    <h1>Modifier un étudiant</h1>

    <form method="POST">

        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom"
            value="<?php echo htmlspecialchars($etudiant["nom"]); ?>" required>
        </div>

        <br>

        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom"
            value="<?php echo htmlspecialchars($etudiant["prenom"]); ?>" required>
        </div>

        <br>

        <div>
            <label for="date_naissance">Date de naissance :</label>
            <input type="date" id="date_naissance" name="date_naissance"
            value="<?php echo $etudiant["date_naissance"]; ?>" required>
        </div>

        <br>

        <div>
    <label for="id_formation">Formation :</label>
    <select id="id_formation" name="id_formation" required>

        <?php foreach ($formation as $f) { ?>

            <option value="<?php echo $f["id_formation"]; ?>"
            <?php
            if ($f["id_formation"] == $etudiant["id_formation"]) {
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
```