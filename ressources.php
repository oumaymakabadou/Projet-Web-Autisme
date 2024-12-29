<?php
session_start();
include_once("connect.php");
$type_filtre = isset($_GET['type']) ? $_GET['type'] : '';
$query = "SELECT * FROM ressources_à_consulter";
if ($type_filtre) {
    $query .= " WHERE type = '$type_filtre'";
}

$result = $conn->query($query); 

if (!$result) {
    die("Erreur de requête: " . $conn->error);
}

$ressources = $result->fetch_all(MYSQLI_ASSOC); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conseils pour les Parents</title>
    <link rel="stylesheet" href="style.css">
    <style>

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        }
    h1 {
        color: #003366; 
        font-size: 32px;
        text-align: left;
        }

    .navbar-list li {
        background: none; 
        padding: 0; 
    }

    .navbar-list li a {
        color: white; 
        text-decoration: none; 
        font-size: 18px;
        padding: 10px 10px; 
        border-radius: 0; 
        background: none; 
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 20px;
        background-color: #003366;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .navbar-list {
        display: flex;
        gap: 20px; 
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 10px; 
        position: absolute; 
        top: 20px;
        right: 20px; 
    }

    .welcome-message {
        color: white;
        font-size: 1rem;
        margin: 0;
    }

    .logout-button {
        background-color: white;
        color: #003366;
        padding: 8px 15px;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
        font-size: 14px;
        border: none;
        transition: background-color 0.3s ease;
        cursor: pointer;
    }

    .logout-button:hover {
        background-color: #f0f0f0;
    }

    .login-button {
        background-color: white;
        color: #003366;
        padding: 8px 15px;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .login-button:hover {
        background-color: #f0f0f0;
    }


    main {
        padding: 30px;
        max-width: 1200px;
        margin: 0 auto;
        }

    section {
        background-color: white;
        padding: 20px;
        margin-bottom: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-left: 20px; 
        margin-right: 20px;
        line-height: 1.5; 
        }

    .select-container {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 5px;
    }

    select {
        padding: 10px;
        font-size: 1rem;
        margin-bottom: 30px;
        border-radius: 5px;
        border: 1px solid #ddd;
        background-color: #fff;
        cursor: pointer;
        width: 100%;
        max-width: 300px;
        display: block;
        margin-top: 10px;
        }

    .resource-list ul {
        list-style: none;
        padding: 0;
        }

    ul li {
        background-color: #fff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

    ul li:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

    .resource-title {
        font-size: 1.4em;
        font-weight: bold;
        color: #003366;
        margin-bottom: 10px;
        }

    .resource-type {
        font-weight: bold;
        color: #ffcb77; /* Couleur pour le type */
        }

    .resource-link {
        color: #003366;
        text-decoration: none;
        font-weight: bold;
        }

    .resource-link:hover {
        text-decoration: underline;
        }

    ul li img {
        width: 300px;
        height: 300px;
        margin-left: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

    ul li img:hover {
        transform: scale(1.4);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

    /* Footer */
    footer {
        background-color: #003366;
        color: white;
        padding: 20px 0;
        text-align: center;
    }

    footer .footer-content {
        margin-bottom: 10px;
    }

    footer .footer-bottom p {
        font-size: 0.9em;
    }
    </style>
</head>
<body>

<header>
    <nav class="navbar">
        <ul class="navbar-list">
            <li><a href="homepage.php">Accueil</a></li>
            <li><a href="sensibilisation.php">C'est quoi Autisme ?</a></li>
            <li><a href="#">Ressources</a></li>
            <li><a href="contact_spécialistes.php">Contact</a></li>
        </ul>
        <div class="user-info">
            <?php
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
                $query = mysqli_query($conn, "SELECT firstName, lastName FROM users WHERE email='$email'");
                $row = mysqli_fetch_array($query);
                echo '<p class="welcome-message">Hello ' . $row['firstName'] . ' ' . $row['lastName'] . ' :)</p>';
                echo '<a href="logout.php" class="logout-button">Déconnexion</a>';
            } else {
                echo '<a href="index.php" class="login-button">Connexion</a>';
            }
            ?>
        </div>
    </nav>
</header>

<main>
    <section>
        <h1>Bienvenue sur notre page de ressources pour les parents</h1>
        <p>En tant que parent, il est essentiel de se sentir soutenu et informé pour accompagner au mieux son enfant. Sur cette page, nous vous proposons des ressources éducatives variées, allant des vidéos inspirantes aux livres pratiques, en passant par des articles et des webinaires. Chaque ressource a été soigneusement sélectionnée pour répondre à vos besoins et vous fournir des outils concrets pour aider votre enfant à grandir et s'épanouir dans un environnement adapté à ses besoins.</p>
    </section>
    <section>
    <h2>Ressources à consulter :</h2>
        <div class="select-container">
            <form method="GET" action="">
                <select name="type" onchange="this.form.submit()">
                    <option value="">Sélectionnez un type</option>
                    <option value="Vidéo" <?= $type_filtre == 'Vidéo' ? 'selected' : '' ?>>Vidéo</option>
                    <option value="Livre" <?= $type_filtre == 'Livre' ? 'selected' : '' ?>>Livre</option>
                </select>
            </form>
        </div>
        <ul class="resource-list">
            <?php foreach ($ressources as $ressource): ?>
                <li>
                    <div>
                        <div class="resource-title"><?= htmlspecialchars($ressource['titre']) ?></div>
                        <p><strong>Type :</strong> <?= htmlspecialchars($ressource['type']) ?></p>
                        <p><a href="<?= htmlspecialchars($ressource['url']) ?>" class="resource-link" target="_blank">Consulter la ressource</a></p>
                        <p><strong>Description :</strong> <?= htmlspecialchars($ressource['description']) ?></p>
                    </div>
                    <a href="<?= htmlspecialchars($ressource['url']) ?>" target="_blank">
                        <img src="<?= htmlspecialchars($ressource['image_url']) ?>" alt="Image de la ressource">
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>

<footer>
        <div class="footer-content">
            <p>📞 Téléphone : +216 26 481 863</p>
            <p>✉️ Email : oumayma@sensibilisation-autisme.tn</p>
        </div>
        <div class="footer-bottom">
            <p>© 2024 Sensibilisation à l'Autisme - Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>
