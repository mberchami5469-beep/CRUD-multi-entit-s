<?php
require_once "../database/connexion.php";
$sql = "SELECT * FROM formation";
$statement = $connexion->query($sql);
$formation = $statement->fetchAll(PDO::FETCH_ASSOC);
if (
    
     isset($_POST["nom"])&& isset($_POST["prenom"])
    && isset($_POST["email"])&& isset($_POST["date_naissance"])
    && isset($_POST["id_formation"])
    
) {

  
    $nom = $_POST["nom"];
      $prenom = $_POST["prenom"];
    $email = $_POST["email"];
      $date_naissance = $_POST["date_naissance"];
    $id_formation = $_POST["id_formation"];

    $sql = "
        INSERT INTO etudiant ( nom,prenom,email,date_naissance,id_formation)
        VALUES (:nom,:prenom,:email,:date_naissance,:id_formation)
    ";
$sqlstate=$connexion->prepare($sql);
$sqlstate->execute(["nom"=>$nom,"prenom"=>$prenom,"email"=>$email,"date_naissance"=>$date_naissance,"id_formation"=>$id_formation]);
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

    <h1>Ajouter un étudiant</h1>

    <form method="POST">

       
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>

        <br>

        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>

        <br>

        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>

        <br>

        <div>
            <label for="date_naissance">Date de naissance :</label>
            <input type="date" id="date_naissance" name="date_naissance" required>
        </div>

        <br>

        <div>
    <label for="id_formation">Formation :</label>
    <select id="id_formation" name="id_formation" required>

        <?php foreach ($formation as $f) { ?>

            <option value="<?php echo $f["id_formation"]; ?>">
                <?php echo $f["intitule"]; ?>
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