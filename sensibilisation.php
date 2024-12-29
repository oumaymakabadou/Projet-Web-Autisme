<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("connect.php");
$query = "SELECT * FROM articles_sensibilisation";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensibilisation à l'Autisme</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        h1 {
            color: #003366;
            font-size: 32px;
            text-align: left;
        }
        main {
            padding: 10px 100px;
        }

header {
    background-color: #003366;
    padding: 15px 30px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.navbar-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.navbar-list li {
    margin: 0 20px;
}

.navbar-list li a {
    color: white;
    font-size: 18px;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s, text-shadow 0.3s;
}

.user-info {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 20px;
}

.user-info .welcome-message {
    font-size: 1.2em;
    color: white;
}

.logout-button,
.login-button {
    background-color:rgb(255, 255, 255);
    color: #003366;
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    text-decoration: none;
    transition: background-color 0.3s;
}

        .definition-section {
            text-align: left;
            background-color:rgb(201, 213, 225);
            padding: 30px 20px;
            margin-bottom: 30px;
            border-radius: 8px;
        }

        .definition-section p {
            font-size: 16px;
            color: #555;
            margin-top: 10px;
            line-height: 1.6;
        }
        .articles-section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-bottom: 40px;
        }

        .article-box {
            display: flex;
            flex-direction: column; 
            justify-content: space-between;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            width: 30%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
}

        .article-box img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .article-box h2 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .article-box p {
            font-size: 14px;
            color: #555;
        }

        .article-box a {
            margin: 10px auto 0;
            display: inline-block;
            background-color: #003366;
            padding: 8px 12px;
            width: fit-content;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: block;
            align-items: center;
        }

        .article-box a:hover {
            background-color: #002D6B;
        }
        .parents-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #E8F4FF;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .parents-section .text-content {
            flex: 1;
            text-align: left;
            padding-right: 20px;
        }

        .parents-section .text-content h2 {
            font-size: 24px;
            color: #003366;
            margin-bottom: 15px;
        }

        .parents-section .text-content p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .parents-section .specialistes-link {
            display: inline-block;
            padding: 10px 15px;
            background-color: #003366;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .parents-section .specialistes-link:hover {
            background-color: #002D6B;
        }

        .parents-section .image-content {
            flex: 1;
            text-align: right;
        }

        .article-box img, 
        .parents-section .image-content img {
            width: 100%;
            max-height: 253px;
            object-fit: cover;
            border-radius: 5px;
        }


        footer {
    background-color: #003366;
    color: white;
    padding: 20px 0;
    text-align: center;
}

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
        <nav>
            <ul>
                <li><a href="homepage.php">Accueil</a></li>
                <li><a href="#">C'est quoi l'autisme ?</a></li>
                <li><a href="ressources.php">Ressources</a></li>
                <li><a href="contact_spécialistes.php">Contact</a></li>
            </ul>
            <div class="user-info">
                <?php
                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];
                    $query = mysqli_query($conn, "SELECT firstName, lastName FROM users WHERE email='$email'");
                    if ($row = mysqli_fetch_assoc($query)) {
                        echo '<p class="welcome-message">Hello ' . htmlspecialchars($row['firstName']) . ' ' . htmlspecialchars($row['lastName']) . ' :)</p>';
                        echo '<a href="logout.php" class="logout-button">Déconnexion</a>';
                    }
                } else {
                    echo '<a href="index.php" class="login-button">Connexion</a>';
                }
                ?>
            </div>
        </nav>
    </header>


    <main>
        <h1>C'est quoi Autisme ?</h1>
        <section class="definition-section">
            <h1>Besoin d'aide concernant l'autisme ?</h1>
            <p>
                Vous ou un proche êtes concerné par l'autisme ? Trouver de l'aide est essentiel.  
                Consultez nos ressources pour accéder à des articles de sensibilisation.  
                Ensemble, nous pouvons promouvoir une meilleure compréhension et un soutien adapté pour les personnes autistes.
            </p>
        </section>
        <section class="articles-section">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($article = mysqli_fetch_assoc($result)) {
                    echo '<div class="article-box">';
                    $image = !empty($article['image']) ? htmlspecialchars($article['image']) : 'images/default.jpg';
                    echo '<img src="' . $image . '" alt="' . htmlspecialchars($article['titre']) . '">';
                    echo '<h2>' . htmlspecialchars($article['titre']) . '</h2>';
                    echo '<p>' . nl2br(htmlspecialchars($article['contenu'])) . '</p>';
                    if (!empty($article['liens'])) {
                        echo '<a href="' . htmlspecialchars($article['liens']) . '" target="_blank">Lire plus</a>';
                    }
                    echo '</div>';
                }
            } else {
                echo '<p>Aucun article disponible pour le moment.</p>';
            }
            ?>
        </section>
        <section class="parents-section">
            <div class="text-content">
                <h1>Pour les parents en quête de soutien</h1>
                <p>
                    Être parent d'un enfant autiste peut être un défi, mais vous n'êtes pas seuls.  
                    Nous avons rassemblé une liste de spécialistes prêts à vous accompagner dans ce voyage.  
                    Consultez notre page dédiée pour trouver les professionnels et associations qui peuvent vous apporter l'aide 
                    et les conseils dont vous avez besoin.
                </p>
                <a href="contact_spécialistes.php" class="specialistes-link">Trouver un spécialiste</a>
            </div>
            <div class="image-content">
                <img src="images/doctor.jpg" alt="Parents recherchant du soutien">
            </div>
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
