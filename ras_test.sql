-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 31 mars 2022 à 04:40
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ras_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id_annonce` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `surface` int(11) DEFAULT NULL,
  `piece` int(11) DEFAULT NULL,
  `chambre` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `meuble` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` text,
  `id_pro` int(11) DEFAULT NULL,
  `membre_id_membre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_annonce`),
  KEY `FK_annonce_id_pro` (`id_pro`),
  KEY `FK_annonce_membre_id_membre` (`membre_id_membre`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `type`, `surface`, `piece`, `chambre`, `prix`, `meuble`, `photo`, `description`, `id_pro`, `membre_id_membre`) VALUES
(1, 'appartement', 33, 3, 3, 3, 'sans_meuble', 'image.jfif', ' Nullam non lectus eu lorem porttitor efficitur sit amet ac ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis commodo ultricies magna. Nullam porttitor accumsan nunc at pretium. Integer malesuada, erat et interdum interdum, erat tortor sagittis mauris, id laoreet velit nisi vitae orci. Nullam id urna sed elit tempus accumsan quis non tellus. Cras lobortis commodo odio vel luctus. Etiam placerat nisl eget magna malesuada scelerisque. Interdum et malesuada fames ac ante ipsum primis in faucibus', 1, NULL),
(2, 'appartement', 1, 1, 1, 1, 'sans_meuble', 'image.jfif', ' Nullam non lectus eu lorem porttitor efficitur sit amet ac ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis commodo ultricies magna. Nullam porttitor accumsan nunc at pretium. Integer malesuada, erat et interdum interdum, erat tortor sagittis mauris, id laoreet velit nisi vitae orci. Nullam id urna sed elit tempus accumsan quis non tellus. Cras lobortis commodo odio vel luctus. Etiam placerat nisl eget magna malesuada scelerisque. Interdum et malesuada fames ac ante ipsum primis in faucibus', 1, NULL),
(3, 'appartement', 4, 4, 4, 4, 'sans_meuble', 'image.jfif', ' Nullam non lectus eu lorem porttitor efficitur sit amet ac ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis commodo ultricies magna. Nullam porttitor accumsan nunc at pretium. Integer malesuada, erat et interdum interdum, erat tortor sagittis mauris, id laoreet velit nisi vitae orci. Nullam id urna sed elit tempus accumsan quis non tellus. Cras lobortis commodo odio vel luctus. Etiam placerat nisl eget magna malesuada scelerisque. Interdum et malesuada fames ac ante ipsum primis in faucibus', 1, NULL),
(4, 'appartement', 2, 5, 5, 5, 'sans_meuble', 'image.jfif', ' Nullam non lectus eu lorem porttitor efficitur sit amet ac ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis commodo ultricies magna. Nullam porttitor accumsan nunc at pretium. Integer malesuada, erat et interdum interdum, erat tortor sagittis mauris, id laoreet velit nisi vitae orci. Nullam id urna sed elit tempus accumsan quis non tellus. Cras lobortis commodo odio vel luctus. Etiam placerat nisl eget magna malesuada scelerisque. Interdum et malesuada fames ac ante ipsum primis in faucibus', 2, NULL),
(5, 'appartement', 6, 6, 6, 6, 'meuble', 'image.jfif', ' Nullam non lectus eu lorem porttitor efficitur sit amet ac ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis commodo ultricies magna. Nullam porttitor accumsan nunc at pretium. Integer malesuada, erat et interdum interdum, erat tortor sagittis mauris, id laoreet velit nisi vitae orci. Nullam id urna sed elit tempus accumsan quis non tellus. Cras lobortis commodo odio vel luctus. Etiam placerat nisl eget magna malesuada scelerisque. Interdum et malesuada fames ac ante ipsum primis in faucibus', 2, NULL),
(6, 'appartement', 40, 40, 40, 0, 'sans_meuble', 'image.jfif', ' header(&quot;Location: list_annonce.php?id=&quot;.$_SESSION[\'id_pro\']);', 2, NULL),
(7, 'maison', 34, 34, 34, 34, 'sans_meuble', 'image.jfif', ' Nullam non lectus eu lorem porttitor efficitur sit amet ac ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis commodo ultricies magna. Nullam porttitor accumsan nunc at pretium. Integer malesuada, erat et interdum interdum, erat tortor sagittis mauris, id laoreet velit nisi vitae orci. Nullam id urna sed elit tempus accumsan quis non tellus. Cras lobortis commodo odio vel luctus. Etiam placerat nisl eget magna malesuada scelerisque. Interdum et malesuada fames ac ante ipsum primis in faucibus', 4, NULL),
(8, 'appartement', 22, 22, 22, 22, 'sans_meuble', 'image.jfif', ' Nullam non lectus eu lorem porttitor efficitur sit amet ac ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis commodo ultricies magna. Nullam porttitor accumsan nunc at pretium. Integer malesuada, erat et interdum interdum, erat tortor sagittis mauris, id laoreet velit nisi vitae orci. Nullam id urna sed elit tempus accumsan quis non tellus. Cras lobortis commodo odio vel luctus. Etiam placerat nisl eget magna malesuada scelerisque. Interdum et malesuada fames ac ante ipsum primis in faucibus', 4, NULL),
(9, 'appartement', 56, 12, 23, 23, 'sans_meuble', 'image.jfif', ' Nullam non lectus eu lorem porttitor efficitur sit amet ac ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis commodo ultricies magna. Nullam porttitor accumsan nunc at pretium. Integer malesuada, erat et interdum interdum, erat tortor sagittis mauris, id laoreet velit nisi vitae orci. Nullam id urna sed elit tempus accumsan quis non tellus. Cras lobortis commodo odio vel luctus. Etiam placerat nisl eget magna malesuada scelerisque. Interdum et malesuada fames ac ante ipsum primis in faucibus', 4, NULL),
(10, 'appartement', 180, 5, 3, 1800, 'sans_meuble', 'image.jfif', 'Super', 5, NULL),
(11, 'appartement', 24, 1, 1, 420, 'sans_meuble', 'image.jfif', ' Nullam non lectus eu lorem porttitor efficitur sit amet ac ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis commodo ultricies magna. Nullam porttitor accumsan nunc at pretium. Integer malesuada, erat et interdum interdum, erat tortor sagittis mauris, id laoreet velit nisi vitae orci. Nullam id urna sed elit tempus accumsan quis non tellus. Cras lobortis commodo odio vel luctus. Etiam placerat nisl eget magna malesuada scelerisque. Interdum et malesuada fames ac ante ipsum primis in faucibus', 5, NULL),
(12, 'appartement', 60, 3, 2, 750, 'sans_meuble', 'image.jfif', ' Nullam non lectus eu lorem porttitor efficitur sit amet ac ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis commodo ultricies magna. Nullam porttitor accumsan nunc at pretium. Integer malesuada, erat et interdum interdum, erat tortor sagittis mauris, id laoreet velit nisi vitae orci. Nullam id urna sed elit tempus accumsan quis non tellus. Cras lobortis commodo odio vel luctus. Etiam placerat nisl eget magna malesuada scelerisque. Interdum et malesuada fames ac ante ipsum primis in faucibus', 5, NULL),
(13, 'appartement', 160, 4, 3, 980, 'sans_meuble', 'image.jfif', ' Nullam non lectus eu lorem porttitor efficitur sit amet ac ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis commodo ultricies magna. Nullam porttitor accumsan nunc at pretium. Integer malesuada, erat et interdum interdum, erat tortor sagittis mauris, id laoreet velit nisi vitae orci. Nullam id urna sed elit tempus accumsan quis non tellus. Cras lobortis commodo odio vel luctus. Etiam placerat nisl eget magna malesuada scelerisque. Interdum et malesuada fames ac ante ipsum primis in faucibus', 5, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `nom`, `prenom`, `mail`, `mdp`) VALUES
(1, 'DAOUD', 'AKEB', 'elia-akeb@hotmail.fr', 'edad0d39b57f325ff22f2015b9144b5db0484ced');

-- --------------------------------------------------------

--
-- Structure de la table `membre_pro`
--

DROP TABLE IF EXISTS `membre_pro`;
CREATE TABLE IF NOT EXISTS `membre_pro` (
  `id_pro` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `siren` int(50) DEFAULT NULL,
  `societe` varchar(255) DEFAULT NULL,
  `mail_pro` varchar(255) DEFAULT NULL,
  `mdp_pro` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre_pro`
--

INSERT INTO `membre_pro` (`id_pro`, `civilite`, `nom`, `siren`, `societe`, `mail_pro`, `mdp_pro`) VALUES
(1, 'Mme', 'AKEB DAOUD', 5645654, 'AKEB&amp;co', 'elia-akeb@hotmail.fr', 'edad0d39b57f325ff22f2015b9144b5db0484ced'),
(2, 'Mme', 'RIPOLL', 54684684, 'LilIbOSS', 'lila@gmail.com', 'edad0d39b57f325ff22f2015b9144b5db0484ced'),
(3, 'Mme', 'lila', 245, 'lililove', 'lila@gmai.com', 'edad0d39b57f325ff22f2015b9144b5db0484ced'),
(4, 'M.', 'Youssef', 7397, 'Youfliw', 'youssef@gmail.com', 'edad0d39b57f325ff22f2015b9144b5db0484ced'),
(5, 'Mme', 'marie', 753902, 'Fayotte', 'fayotte@gmail.com', 'edad0d39b57f325ff22f2015b9144b5db0484ced');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `FK_annonce_id_pro` FOREIGN KEY (`id_pro`) REFERENCES `membre_pro` (`id_pro`),
  ADD CONSTRAINT `FK_annonce_membre_id_membre` FOREIGN KEY (`membre_id_membre`) REFERENCES `membre` (`id_membre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
