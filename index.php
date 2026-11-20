
<?php
require_once "database/connexion.php";

$nb_formations = $connexion->query("SELECT COUNT(*) FROM formation")->fetchColumn();
$nb_etudiants  = $connexion->query("SELECT COUNT(*) FROM etudiant")->fetchColumn();
$nb_modules    = $connexion->query("SELECT COUNT(*) FROM module")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centre de formation</title>

    <link rel="stylesheet" href="css/home.css">
</head>

<body class="home-page">

    <div class="home-header">

        <div class="brand-simple">
            STUDENT<span>MANAGER</span>
        </div>

        <div class="header-label">
            CENTRE DE FORMATION
        </div>

    </div>

    <div class="home-intro">

        <div class="welcome">BIENVENUE SUR VOTRE ESPACE</div>

        <h1>Gestion de votre centre de formation</h1>

        <p>
            Une plateforme simple et pratique pour gérer
            les formations, les étudiants et les modules.
            Retrouvez toutes vos informations dans un seul espace.
        </p>

    </div>

    <div class="section-title">

        <h2>Gestion des données</h2>

        <p>Choisissez un espace pour commencer votre travail.</p>

    </div>

    <div class="home-grid">

       

        <div class="quick-card">

            <div class="quick-icon">▣</div>

            <h2>Formations</h2>

            <p>
                Consulter et gérer les formations
                disponibles dans votre centre.
            </p>

            <div class="card-count">
                <?php echo $nb_formations; ?> formations enregistrées
            </div><br>

            <a href="formation/index.php" class="btn">
                Voir les formations →
            </a>

        </div>

       

        <div class="quick-card">

            <div class="quick-icon">♙</div>

            <h2>Étudiants</h2>

            <p>
                Gérer les informations et les inscriptions
                des étudiants.
            </p>

            <div class="card-count">
                <?php echo $nb_etudiants; ?> étudiants enregistrés
            </div><br>

            <a href="etudiant/index.php" class="btn">
                Voir les étudiants →
            </a>

        </div>

       

        <div class="quick-card">

            <div class="quick-icon">▤</div>

            <h2>Modules</h2>

            <p>
                Organiser les modules et consulter
                le nombre d'heures de chaque module.
            </p>

            <div class="card-count">
                <?php echo $nb_modules; ?> modules enregistrés
            </div><br>

            <a href="module/index.php" class="btn">
                Voir les modules →
            </a>

        </div>

    </div>

    <div class="home-footer">

        <span>STUDENT MANAGER</span>

        <span>Projet PHP CRUD</span>

    </div>

</body>
</html>
