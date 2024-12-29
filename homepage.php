<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Sensibilisation à l'Autisme</title>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background-color: #003366;
    padding: 10px;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    transition: color 0.3s;
}

nav ul li a:hover {
    color: #f4f4f4;
}

.user-info {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 20px;
}

.welcome-message {
    font-size: 1.2em;
    color: white;
}

.logout-button,
.login-button {
    background-color: white;
    color: #003366;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.logout-button:hover,
.login-button:hover {
    background-color: #f0f0f0;
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

.logout-button {
    background-color: white;
    color: #003366;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.logout-button:hover {
    background-color: #f0f0f0;
}

.hero {
    background-image: url('autism.png'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    color: white;
    padding: 100px 20px;
    text-align: center;
}

.hero .welcome-box {
    max-width: 800px;
    margin: 0 auto;
}

.hero h1 {
    font-size: 3em;
}

.hero p {
    font-size: 1.2em;
    margin-bottom: 20px;
}

.hero button {
    background-color: #fff;
    color: #003366;
    font-size: 1.2em;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.hero button:hover {
    background-color: #f0f0f0;
}
.transparent-box {
    background-color: rgba(255, 255, 255, 0.8); 
    padding: 30px;
    border-radius: 10px; 
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); 
}

.transparent-box h1 {
    font-size: 2.5em;
    color: #003366; 
}

.transparent-box p {
    font-size: 1.2em;
    margin-bottom: 20px;
    color: #003366; 
}

.transparent-box button {
    background-color: #003366;
    color: white;
    font-size: 1.2em;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.transparent-box button:hover {
    background-color: #0056b3;
}

.sections {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
        }

        .section-box {
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            text-align: center;
            flex: 1 1 300px;
            max-width: 300px;
            transition: transform 0.3s;
        }

        .section-box:hover {
            transform: translateY(-5px);
        }

        .section-box img {
            max-width: 100px;
            margin-bottom: 20px;
        }

        .section-box h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .section-box p {
            font-size: 1em;
            margin-bottom: 20px;
        }

        .section-box a {
            display: inline-block;
            background-color: #003366;
            color: white;
            padding: 10px 20px; 
            border-radius: 5px; 
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s; 
        }

        .section-box a:hover {
            background-color: #0056b3;
            transform: scale(1.05); 
        }

        body > *:not(.hero) {
            padding-left: 20px;
            padding-right: 20px;
        }

.about-section {
    background-color: rgba(0, 51, 102, 0.8); 
    color: white;
    padding: 40px;
    text-align: center;
    border-radius: 20px;
    margin: 30px; 
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); 
    transition: transform 0.3s, background-color 0.3s; 
    line-height: 1.5;
}

.about-section:hover {
    transform: scale(1.02); 
    background-color: rgba(0, 51, 102, 0.9); 
}

.about-section h2 {
    font-size: 2.5em;
    margin-bottom: 30px;
}

.about-section p {
    font-size: 1.2em;
    max-width: 800px;
    margin: 0 auto;
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
                <li><a href="#">Accueil</a></li>
                <li><a href="sensibilisation.php">C'est quoi Autisme ?</a></li>
                <li><a href="ressources.php">Ressources</a></li>
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
    <div class="hero">
        <div class="welcome-box">
        <div class="transparent-box">
            <h1>Bienvenue sur notre site de sensibilisation à l'autisme</h1>
            <p>Découvrez des informations essentielles et engagez-vous dans notre mission.</p>
            <button onclick="document.getElementById('about-section').scrollIntoView({ behavior: 'smooth' });">
                En savoir plus
            </button>
        </div>
        </div>
    </div>
    <section class="sections">
    <div class="section-box">
        <img src="family.png" alt="Icône Parents">
        <h3>Conseils pour les parents</h3>
        <p>Découvrez des astuces pratiques et des ressources pour accompagner vos enfants.</p>
        <a href="ressources.php">Voir plus</a>
    </div>
    <div class="section-box">
        <img src="awareness.png" alt="Icône Sensibilisation">
        <h3>Sensibilisation à l'autisme</h3>
        <p>Explorez des initiatives et des informations pour mieux comprendre l'autisme.</p>
        <a href="sensibilisation.php">Voir plus</a>
    </div>
    <div class="section-box">
        <img src="public-relations.png" alt="Icône Spécialistes">
        <h3>Contacter des spécialistes</h3>
        <p>Trouvez des professionnels qualifiés pour vous accompagner dans votre parcours.</p>
        <a href="contact_spécialistes.php">Voir plus</a>
    </div>
</section>
<section id="about-section" class="about-section">
        <h2>À propos de nous</h2>
        <p>
            Nous sommes une plateforme dédiée à la sensibilisation sur l'autisme. Notre objectif est 
            d'accompagner les parents, de fournir des informations fiables et de mettre en relation les familles 
            avec des professionnels qualifiés.
        </p>
    </section>
    <!-- Footer -->
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
