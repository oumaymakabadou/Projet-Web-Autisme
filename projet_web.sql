-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 29 déc. 2024 à 23:04
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles_sensibilisation`
--

CREATE TABLE `articles_sensibilisation` (
  `ID` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `liens` text DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles_sensibilisation`
--

INSERT INTO `articles_sensibilisation` (`ID`, `titre`, `contenu`, `liens`, `image`) VALUES
(1, 'Introduction à l\'Autisme', 'Vous venez d’apprendre que votre enfant ou un de vos proches est autiste. Mais de quoi parle-t-on exactement ? « Autisme », « TSA » pour trouble du spectre de l’autisme, « TED » ou troubles envahissant du développement, etc. Abordons les choses simplement pour définir ce qu’est l’autisme.', 'https://www.autismeinfoservice.fr/informer/autisme/definition#:~:text=L\'autisme%20se%20manifeste%20principalement,l\'%C3%A2ge%20de%203%20ans.', 'images/introductionautisme.png'),
(2, 'Qu’est-ce que l’autisme ?', 'L’autisme est un trouble du neurodeveloppement. Il apparaît dès la petite enfance et évolue tout au long de la vie.La dyade autistique\r\nLes caractéristiques de l’autisme sont très variées d’un individu à l’autre. C’est pourquoi on parle de troubles du spectre autistique (TSA) :...', 'https://www.craif.org/quest-ce-que-lautisme-44', 'images/autismequoi.jpeg'),
(3, 'Comprendre l\'autisme', 'Arthur se balance d’avant en arrière depuis de longues minutes. A ses pieds, un dessin. Le même qu’il a réalisé quelques heures plus tôt, et qu’il reproduit inlassablement. Sa mère l’appelle. Il ne réagit pas, comme s’il n’avait pas...', 'https://www.pasteur.fr/fr/journal-recherche/dossiers/comprendre-autisme', 'images/autisme3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `ID` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact_messages`
--

INSERT INTO `contact_messages` (`ID`, `utilisateur_id`, `message`, `email`, `phone`, `subject`, `created_at`, `name`) VALUES
(2, 5, '?', 'oumaymakabadou@gmail.com', '26481863', 'Question', '2024-12-28 21:48:09', 'oumayma kabadou'),
(3, 5, 'comment je peux vous contacter ?', 'oumaymakabadou@gmail.com', '26481863', 'Question', '2024-12-28 21:49:52', 'oumayma kabadou'),
(4, 5, 'comment je peux vous contacter ?', 'oumaymakabadou@gmail.com', '26481863', 'Question', '2024-12-28 21:52:25', 'oumayma kabadou'),
(5, 5, 'comment je peux vous contacter ?', 'oumaymakabadou@gmail.com', '26481863', 'Question', '2024-12-28 21:53:32', 'oumayma kabadou'),
(6, 5, 'comment .. ?', 'oumaymakabadou@gmail.com', '26481863', 'Question', '2024-12-29 17:13:50', 'oumayma kabadou'),
(7, 5, 'comment ???', 'oumaymakabadou@gmail.com', '26481863', 'Question', '2024-12-29 18:48:09', 'oumayma kabadou'),
(8, 7, 'est ce que je peux prendre un rendez vous ?', 'soumaya@gmail.com', '26262287', 'Demande', '2024-12-29 20:04:05', 'soumaya'),
(9, 8, 'est ce que je peux prendre un rendez vous ?', 'emna@gmail.com', '26865201', 'Demande', '2024-12-29 20:15:40', 'emna'),
(10, 8, 'est ce que je peux prendre un rendez vous ?', 'emna@gmail.com', '26865201', 'Demande', '2024-12-29 20:59:56', 'emna');

-- --------------------------------------------------------

--
-- Structure de la table `ressources_à_consulter`
--

CREATE TABLE `ressources_à_consulter` (
  `ID` int(11) NOT NULL,
  `type` enum('vidéo','livre') NOT NULL,
  `titre` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ressources_à_consulter`
--

INSERT INTO `ressources_à_consulter` (`ID`, `type`, `titre`, `url`, `description`, `image_url`) VALUES
(1, 'vidéo', 'J’aide Sam à communiquer avec des mots', 'https://deux-minutes-pour.org/video/jaide-sam-a-communiquer-avec-des-mots/', '\r\nSam ne parle pas encore beaucoup, mais il fait des sons de plus en plus variés et dit quelques mots. Découvrons ensemble les comportements ou activités qui favorisent le développement du langage oral chez un enfant autiste.', 'images/video1.png'),
(2, 'livre', 'Autistes et\r\nnon-autistes Mieux se comprendre', 'https://www.autismemonteregie.org/images/Publications/guide-autistes-et-non-autistes-2023.pdf', '\r\n\"Autistes et non-autistes : Mieux se comprendre\" est un ouvrage ou une initiative qui vise à favoriser la compréhension mutuelle entre les personnes autistes et non-autistes. Il explore les différences de perception, de comportement et de communication entre les deux groupes, tout en promouvant l\'inclusion et la réduction des stéréotypes. L\'objectif est de renforcer l\'empathie et de créer des ponts pour une meilleure cohabitation et coopération dans divers contextes sociaux, scolaires et professionnels. Ce dialogue permet d\'améliorer les interactions et de soutenir l\'autonomie des personnes autistes dans un monde souvent perçu comme complexe.', 'images/livre1.png'),
(3, 'livre', 'Mon enfant\r\nest autiste', 'https://furet.com/media/pdf/feuilletage/9/7/8/2/8/0/7/3/9782807326828.pdf', 'Le livre Mon enfant est autiste est une œuvre qui aborde avec sensibilité et justesse les défis, les émotions, et les joies que vivent les parents d\'enfants atteints de troubles du spectre autistique (TSA). À travers des récits, des témoignages et des conseils pratiques, cet ouvrage éclaire les différentes facettes de l\'autisme, depuis le diagnostic jusqu\'à la gestion quotidienne et les interactions sociales.', 'images/livre2.png'),
(4, 'vidéo', '\r\n\r\n\r\nWEBINAIRE - Aider un enfant autiste à communiquer à la maison et à l’extérieur', 'https://www.youtube.com/watch?v=GmGtl8d2kqo', 'L\'objectif de ce webinaire est de mettre en lumière l’importance de développer la communication chez le jeune enfant autiste dans les différents lieux qu’il côtoie. \r\n\r\nDe nombreux enfants autistes ne parlent pas ou ne comprennent pas l’intérêt d’utiliser le langage pour communiquer leurs besoins. Le trouble de la communication et l’absence de langage sont très déstabilisants pour la famille et l’entourage concerné. Lorsqu’un enfant ne parle pas ou reste inintelligible, un mode de communication alternatif ou augmenté peut être mis en place. L’enfant utilisera alors des signes, des images, des pictogrammes, des outils informatiques ou des objets pour s’exprimer. Pour que ce mode de communication soit efficace, il est essentiel que l’entourage de l’enfant puisse se l’approprier et en comprendre le fonctionnement et la finalité. L’ensemble des aidants deviennent alors partenaires pour faire progresser l’enfant autiste dans sa communication.', 'images/video2.png');

-- --------------------------------------------------------

--
-- Structure de la table `specialistes`
--

CREATE TABLE `specialistes` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `adresse` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `specialistes`
--

INSERT INTO `specialistes` (`ID`, `nom`, `specialite`, `email`, `telephone`, `adresse`, `image`) VALUES
(1, 'Chahinez', 'psychologue', 'chahinez@gmail.com', '26384863', '\r\nRoute Afran km 1 immeuble Erradhouen 3eme étage\r\nSfax Sud 3083 Sfax Tunisie ', 'images/psy.jpg'),
(2, 'Mohammed', 'psychiatre', 'Mohammed@gmail.com', '220068901', '3eme etage derrière le gouvernorat, Bloc A Emna City Rue Hédi Nouira Immeuble Emna City bloc A N.303, Sfax 3027', 'images/psy2.jpg'),
(3, 'Salma', 'psychiatre', 'Salma@gmail.com', '23384600', 'Route gremda km 2,5 complexe médical \"tabib \" à côté polyclinique ibn khaldoun Sfax, 3027', 'images/psy3.jpg'),
(4, 'Adel', 'psychiatre', 'Adel@gmail.com', '94563201', 'PPXQ+587, Sfax', 'images/psy4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `firstName`, `lastName`, `email`, `password`) VALUES
(4, 'Amine', 'Ketata', 'Amineketata@gmail.com', 'fbf103ea2f7402edacf3d54bf7a4ee4a'),
(5, 'Oumayma', 'Kabadou', 'oumaymakabadou@gmail.com', 'db2e10704b0e3156ac6c9465303a0a61'),
(6, 'Raouf', 'Kabado', 'raouf@gmail.com', '4e454acedeff31756a138e623f6f2d1c'),
(7, 'soumaya', 'mziou', 'soumaya@gmail.com', '99c73a1de5f68a836b6f8d32110929ed'),
(8, 'emna', 'koubaa', 'emna@gmail.com', '858a525c7990e574b4533a7101574a05');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles_sensibilisation`
--
ALTER TABLE `articles_sensibilisation`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `ressources_à_consulter`
--
ALTER TABLE `ressources_à_consulter`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `specialistes`
--
ALTER TABLE `specialistes`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`lastName`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles_sensibilisation`
--
ALTER TABLE `articles_sensibilisation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `ressources_à_consulter`
--
ALTER TABLE `ressources_à_consulter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `specialistes`
--
ALTER TABLE `specialistes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD CONSTRAINT `contact_messages_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `fk_utilisateur_id` FOREIGN KEY (`utilisateur_id`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
