
<?php

require_once "../database/connexion.php";

$sql = "
    SELECT
        formation.id_formation,
        formation.intitule,
        formation.duree_heures,
        formation.niveau
        
    FROM formation

";

$statement = $connexion->query($sql);

$formation = $statement->fetchAll(
    PDO::FETCH_ASSOC
);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Formation</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/pages.css">
</head>

<body class="dashboard-page">

    <div class="page-shell">

    <header class="page-topbar">
        <a class="home-link" href="../index.php">← Accueil</a>
        <span class="page-caption">GESTION / FORMATION</span>
    </header>

    <div class="page-heading">
        <div>
            <div class="eyebrow">FORMATIONS</div>
            <h1>Liste des formation</h1>
            <p>Consultez et gérez les formation.</p>
        </div>

        <a class="btn btn-primary" href="create.php">
            Ajouter un formation
        </a>
    </div>

    <br><br>

    <div class="content-card">
    <div class="table-wrap">
    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>intitule</th>
                <th>duree_heures</th>
                <th>niveau</th>
                
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($formation as $f) { ?>

                <tr>

                    <td>
                        <?php echo $f["id_formation"]; ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($f["intitule"]); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($f["duree_heures"]); ?>
                    </td>

                    <td>
                        <?php echo $f["niveau"]; ?>
                    </td>

                   
                  

                    <td>
                        <a href="edit.php?id_formation=<?php echo $f["id_formation"]; ?>">
                            Modifier
                        </a>

                        |

                        <a href="delete.php?id_formation=<?php echo $f["id_formation"]; ?>">
                            Supprimer
                        </a>
                    </td>

                </tr>

            <?php } ?>

        </tbody>

    </table>
    </div>
    </div>

    </div>

</body>
</html>