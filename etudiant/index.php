
<?php

require_once "../database/connexion.php";

$sql = "
    SELECT
        etudiant.id_etudiant,
        etudiant.nom,
        etudiant.prenom,
        etudiant.email,
        etudiant.date_naissance,
        formation.intitule

    FROM etudiant

    LEFT JOIN formation
        ON etudiant.id_formation = formation.id_formation
";

$statement = $connexion->query($sql);

$etudiants = $statement->fetchAll(
    PDO::FETCH_ASSOC
);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Etudiants</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/pages.css">
</head>

<body class="dashboard-page">

    <div class="page-shell">

    <header class="page-topbar">
        <a class="home-link" href="../index.php">← Accueil</a>
        <span class="page-caption">GESTION / ETUDIANTS</span>
    </header>

    <div class="page-heading">
        <div>
            <div class="eyebrow">ETUDIANTS</div>
            <h1>Liste des étudiants</h1>
            <p>Consultez et gérez les étudiants.</p>
        </div>

        <a class="btn btn-primary" href="create.php">
            Ajouter un étudiant
        </a>
    </div>

    <br><br>

    <div class="content-card">
    <div class="table-wrap">
    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Date naissance</th>
                
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($etudiants as $etudiant) { ?>

                <tr>

                    <td>
                        <?php echo $etudiant["id_etudiant"]; ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($etudiant["nom"]); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($etudiant["prenom"]); ?>
                    </td>

                    <td>
                        <?php echo $etudiant["email"]; ?>
                    </td>

                    <td>
                        <?php echo $etudiant["date_naissance"]; ?>
                    </td>

                  

                    <td>
                        <a href="edit.php?id_etudiant=<?php echo $etudiant["id_etudiant"]; ?>">
                            Modifier
                        </a>

                        |

                        <a href="delete.php?id_etudiant=<?php echo $etudiant["id_etudiant"]; ?>">
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