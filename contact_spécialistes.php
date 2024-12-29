<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

include('connect.php');
$query = "SELECT * FROM specialistes";
$result = $conn->query($query);

if (!$result) {
    die("Erreur de requête: " . $conn->error);
}

$specialistes = $result->fetch_all(MYSQLI_ASSOC);
$email_utilisateur = $_SESSION['email'];

$check_user_query = "SELECT * FROM users WHERE email='$email_utilisateur'";
$check_user_result = $conn->query($check_user_query);

if ($check_user_result->num_rows == 0) {
    echo "Utilisateur introuvable dans la base de données.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $phone = $conn->real_escape_string($phone);
    $subject = $conn->real_escape_string($subject);
    $message = $conn->real_escape_string($message);

    $insert_query = "INSERT INTO contact_messages (utilisateur_id, name, email, phone, subject, message, created_at) 
                     VALUES ((SELECT ID FROM users WHERE email='$email_utilisateur'), '$name', '$email', '$phone', '$subject', '$message', NOW())";

    if ($conn->query($insert_query) === TRUE) {
        $success_message = "Merci pour votre message ! Nous allons vous contacter prochainement.";
    } else {
        $error_message = "Erreur lors de l'envoi du message : " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conseillers et Spécialistes</title>
    <link rel="stylesheet" href="styles.css">
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}
.navbar-list li {
    background: none;
    padding: 0; 
    border: none; 
}

.navbar-list li a {
    color: white; 
    text-decoration: none; 
    font-size: 18px;
    padding: 15px 10px; 
    border-radius: 0; 
    background: none; 
    transition: color 0.3s;
    padding: 12px;
}

.navbar-list li a:hover {
    background-color: #002D6B; 
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

.navbar-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.navbar-list li {
    margin: 0 15px;
}

.navbar-list li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    transition: color 0.3s;
}

.navbar-list li a:hover {
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
.specialistes-section ul {
    display: flex;
    flex-wrap: wrap; 
    gap: 20px; 
    list-style: none; 
    padding: 0;
}

.specialistes-section ul li {
    display: flex;
    flex-direction: row; 
    align-items: center;
    margin-bottom: 15px;
    width: calc(45% - 10px); 
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    background: #f5f5f5;
    transition: background-color 0.3s;
}

.specialistes-section ul li:hover {
    background-color: #e0f7fa; 
}

.specialistes-section ul li img {
    margin-right: 15px; 
    width: 300px;
    height: 300px;
    object-fit: cover;
}

.specialistes-section ul li div {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.specialistes-section ul li div strong {
    font-size: 1.1em;
    font-weight: bold;
    color: #003366; 
}

.specialistes-section ul li div em {
    font-style: italic;
    color: #00796b; 
}

.specialistes-section ul li div p {
    margin: 5px 0;
    color: #555; 
}

.specialistes-section ul li div p strong {
    font-weight: bold;
    color: #333; 
}
        main {
            padding: 10px 50px;
        }

        section {
            background: #fff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            background: #f5f5f5;
        }

        ul li img {
            margin-right: 15px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form label {
            margin-bottom: 5px;
        }

        form input, form textarea, form select {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background: #003366;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background: #002D6B;
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

        .success-message {
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .error-message {
            color: red;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar">
        <ul class="navbar-list">
            <li><a href="homepage.php">Accueil</a></li>
            <li><a href="sensibilisation.php">C'est quoi Autisme ?</a></li>
            <li><a href="ressources.php">Ressources</a></li>
            <li><a href="#">Contact</a></li>
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
    <section class="specialistes-section">
        <h2>Liste des Spécialistes</h2>
        <ul>
            <?php foreach ($specialistes as $specialiste): ?>
                <li>
                    <img src="<?= htmlspecialchars($specialiste['image']) ?>" 
                         alt="<?= htmlspecialchars($specialiste['image']) ?>" 
                         onerror="this.onerror=null;this.src='images/default.jpg';">
                    <div>
                        <strong><?= htmlspecialchars($specialiste['nom']) ?></strong><br>
                        <em><?= htmlspecialchars($specialiste['specialite']) ?></em><br>
                        <strong>Email :</strong> <?= htmlspecialchars($specialiste['email']) ?><br>
                        <strong>Téléphone :</strong> <?= htmlspecialchars($specialiste['telephone']) ?><br>
                        <strong>Adresse :</strong> <?= htmlspecialchars($specialiste['adresse']) ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section>
        <h2>Envoyer un Message</h2>
        <?php if (isset($success_message)) { echo "<p class='success-message'>$success_message</p>"; } ?>
        <?php if (isset($error_message)) { echo "<p class='error-message'>$error_message</p>"; } ?>
        <form action="contact_spécialistes.php" method="post">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            <label for="phone">Téléphone (facultatif) :</label>
            <input type="text" id="phone" name="phone">
            <label for="subject">Objet :</label>
            <select id="subject" name="subject" required>
                <option value="Question">Question</option>
                <option value="Demande">Demande</option>
                <option value="Feedback">Retour</option>
            </select>
            <label for="message">Message :</label>
            <textarea id="message" name="message" required></textarea>
            <input type="submit" value="Envoyer">
        </form>
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
