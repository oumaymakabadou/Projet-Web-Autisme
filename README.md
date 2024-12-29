Description du site : Mon site web sur l'autisme accompagne les parents d'enfants autistes et sensibilise ceux qui souhaitent en savoir plus. Il offre des ressources utiles, une liste de spécialistes et un formulaire pour poser des questions, enregistrées en base de données, avec des réponses envoyées via les coordonnées fournies.

Fonctionnalités :
- Enregistrement et connexion des utilisateurs.
- Page Accueil : Présentation globale du site.
- Page C'est quoi Autisme ? : Page de sensibilisation sur l'autisme contenant des articles dynamiques.
- Page Ressources : Liste dynamique de ressources éducatives (articles, vidéos) pour les parents.
- Page Contact : Liste des spécialistes dynamique et formulaire dynamique pour contacter des experts.

Technologies :

- Frontend : HTML, CSS, JavaScript.
- Backend : PHP.
- Base de données : MySQL.
- Environnement de développement : VS Code, XAMPP.

Tables MySQL :

- users: ID firstName lastName email password
- articles_sensibilisation: ID,titre,contenu,liens,image
- contact_messages: ID, utilisateur_id, message, email, phone, subject, created_at, name
- ressources_à_consulter: ID, type, titre, url, description, image_url
- specialistes: ID, nom, specialite, email, telephone, adresse, image.

Etapes de projet :

1. Préparation
  - Installer XAMPP (pour PHP et MySQL).
  - Configurer VS Code pour écrire du code.
  - Créer une base de données appelée projet_web avec les tables nécessaires.

2. Backend (PHP & MySQL)
  - Connexion à la base de données :
    Créer un fichier connect.php pour se connecter à MYSQL.

3. Frontend (HTML, CSS, JS)
  Créer les pages principales :
  - Accueil : Présentation simple du site.
  - C’est quoi l’autisme ? : Afficher dynamiquement des articles.
  - Ressources : Liste des ressources éducatives.
  - Contact : Formulaire pour poser des questions + liste des spécialistes.
Utiliser CSS pour un design propre.
  Ajouter des effets de base avec JavaScript.

4. Tests
Vérifier chaque fonctionnalité (connexion, affichage dynamique, formulaire de contact).
