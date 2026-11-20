
<?php

require_once "../database/connexion.php";

$sql = "
    SELECT
        module.id_module,
        module.titre,
        module.nb_heures,
       
        formation.intitule

    FROM module

   LEFT JOIN formation
        ON module.id_formation = formation.id_formation
";

$statement = $connexion->query($sql);

$module = $statement->fetchAll(
    PDO::FETCH_ASSOC
);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modules</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/pages.css">
</head>

<body class="dashboard-page">

    <div class="page-shell">

    <header class="page-topbar">
        <a class="home-link" href="../index.php">← Accueil</a>
        <span class="page-caption">GESTION / Modules</span>
    </header>

    <div class="page-heading">
        <div>
            <div class="eyebrow">Modules</div>
            <h1>Liste des Modules</h1>
            <p>Consultez et gérez les Modules.</p>
        </div>

        <a class="btn btn-primary" href="create.php">
            Ajouter un Module
        </a>
    </div>

    <br><br>

    <div class="content-card">
    <div class="table-wrap">
    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>titre</th>
                <th>nb_heures</th>
            
                
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($module as $m) { ?>

                <tr>

                    <td>
                        <?php echo $m["id_module"]; ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($m["titre"]); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($m["nb_heures"]); ?>
                    </td>

                  

                  

                    <td>
                        <a href="edit.php?id_module=<?php echo $m["id_module"]; ?>">
                            Modifier
                        </a>

                        |

                        <a href="delete.php?id_module=<?php echo $m["id_module"]; ?>">
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