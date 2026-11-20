<?php
require_once "../database/connexion.php";
$sql = "SELECT id_formation, intitule FROM formation ORDER BY intitule";
$statement = $connexion->query($sql);
$formation = $statement->fetchAll(PDO::FETCH_ASSOC);
if (
    
     isset($_POST["titre"])&& isset($_POST["nb_heures"])

    && isset($_POST["id_formation"])
    
) {

  
    $titre = $_POST["titre"];
      $nb_heures = $_POST["nb_heures"];
   
    $id_formation = $_POST["id_formation"];

    $sql = "
        INSERT INTO module ( titre,nb_heures,id_formation)
        VALUES (:titre,:nb_heures,:id_formation)
    ";
$sqlstate=$connexion->prepare($sql);
$sqlstate->execute(["titre"=>$titre,"nb_heures"=>$nb_heures,"id_formation"=>$id_formation]);
header("location:index.php");
exit();


}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Modules</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/pages.css">
</head>
<body>

    <h1>Ajouter des Modules</h1>

    <form method="POST">

       
        <div>
            <label for="titre">titre :</label>
            <input type="text" id="titre" name="titre" required>
        </div>

        <br>

        <div>
            <label for="nb_heures">nb_heures :</label>
            <input type="text" id="nb_heures" name="nb_heures" required>
        </div>

        <br>

        

        <div>
    <label for="id_formation">Formation :</label>
    <select id="id_formation" name="id_formation" required>

        <?php foreach ($formation as $f) { ?>

            <option value="<?php echo $f["id_formation"]; ?>">
                <?php echo htmlspecialchars($f["intitule"]); ?>
            </option>

        <?php } ?>

    </select>
</div>

        <button type="submit">Ajouter</button>

    </form>

    <br>

    <a href="index.php">Retour</a>

</body>
</html>