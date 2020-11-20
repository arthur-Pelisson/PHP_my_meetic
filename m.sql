-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 25 Juillet 2018 à 14:10
-- Version du serveur :  5.7.22-0ubuntu0.16.04.1
-- Version de PHP :  7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `my_meetic`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `sexe` enum('Homme','Femme','Nerd','Hapach helicopter') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ban` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `nom`, `prenom`, `date_de_naissance`, `sexe`, `ville`, `email`, `password`, `ban`) VALUES
(58, 'arthur', 'arthur', '1995-07-12', 'Homme', 'lyon', 'azertyuiop', '2c42f62f948cc723fdd90bcc1611b146', 1),
(59, 'cocote', 'pelisson', '1990-02-02', 'Homme', 'lyon', 'arthur.pelisson@epitech.eu', 'b5094288dec454502346b3508215e8e2', 1),
(60, 'arthur', 'pelisson', '1990-12-01', 'Homme', 'lyon', 'toitoile@hotmail.fr', 'b5094288dec454502346b3508215e8e2', 1),
(61, 'amauri', 'bachar', '0124-03-12', 'Homme', 'lyon', 'tarace', 'b5094288dec454502346b3508215e8e2', 1),
(62, 'cocote', 'lafay', '1962-10-20', 'Femme', 'lyon', 'anelyse@coucou.com', 'b5094288dec454502346b3508215e8e2', 1),
(63, 'tarzan', 'desbois', '1995-02-20', 'Homme', 'lyon', 'bonjour', '$2y$10$y08bPRDAE7kI2cdVwv8bZu3psng3P2lSoJPRdjGLCnNSgynR/vHmm', 1),
(64, 'tarzan', 'desbois', '1995-02-20', 'Nerd', 'lyon', 'ok', '$2y$10$f7dyzyMJwaK3Rbwg2r6U0ez9UVxgKQrgppZjis3v/HMcoPmARyrPK', 1),
(65, 'bazard', 'grenier', '0995-02-20', 'Nerd', 'lyon', 'giroud', '$2y$10$r9VjQvGkGwgrZfZ2viXgtuyrVM6rFFyEiVUSmoO1XtoglZRX0y6gu', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
