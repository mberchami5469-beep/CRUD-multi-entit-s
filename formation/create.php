<?php
require_once "../database/connexion.php";
$sql = "SELECT * FROM formation";
$statement = $connexion->query($sql);
$formation = $statement->fetchAll(PDO::FETCH_ASSOC);
if (
    
     isset($_POST["intitule"])&& isset($_POST["duree_heures"])
    && isset($_POST["niveau"]))
    
 {
      $intitule = $_POST["intitule"];
      $duree_heures = $_POST["duree_heures"];
    $niveau = $_POST["niveau"];


  $sql = "
        INSERT INTO formation ( intitule,duree_heures,niveau)
        VALUES (:intitule,:duree_heures,:niveau)
    ";
$sqlstate=$connexion->prepare($sql);
$sqlstate->execute(["intitule"=>$intitule,"duree_heures"=>$duree_heures,"niveau"=>$niveau]);
header("location:index.php");
exit();
}



?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter étudiant</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/pages.css">
</head>
<body>

    <h1>Ajouter une formation</h1>

    <form method="POST">

       
        <div>
            <label for="intitule">intitule :</label>
            <input type="text" id="intitule" name="intitule" required>
        </div>

        <br>

        <div>
            <label for="duree_heures">duree_heures :</label>
            <input type="text" id="duree_heures" name="duree_heures" required>
        </div>

        <br>

        <div>
            <label for="niveau">niveau :</label>
            <input type="text" id="niveau" name="niveau" required>
        </div>

       


        <button type="submit">Ajouter</button>

    </form>

    <br>

    <a href="index.php">Retour</a>

</body>
</html>