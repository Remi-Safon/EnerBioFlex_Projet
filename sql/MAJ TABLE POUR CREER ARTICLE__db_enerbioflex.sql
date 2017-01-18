-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 17 Janvier 2017 à 20:46
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_enerbioflex`
--

--
-- Contenu de la table `alerte`
--

INSERT INTO `alerte` (`id_alerte`, `frequence`) VALUES
(1, 24),
(2, 168);



--
-- Contenu de la table `statistique`
--

INSERT INTO `statistique` (`id_statistique`, `nb_vues`, `nb_clics`) VALUES
(1, 0, 0);
--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `description`, `voie`, `photo`, `prix`, `date_publication`, `date_peremption`, `id_utilisateur`, `id_ville`, `id_departement`, `id_region`, `id_ressource`, `id_statistique`) VALUES
(1, 'chaise', 'chaise bois mcnzjnuj\r\n', '40 rue chemin', 'http://media.alinea.fr/is/image/Alinea/cellproduct_thumb/ALINEA_21151507_PH_01/emotion/table-de-repas-carree-en-teck-recycle-l145cm---8-convives.jpg', 50, '2017-01-17', '2017-01-27', 1, 2, 1, 27, 2, 1),
(2, 'table', 'table sur 4 pied\r\n', '40 rue chemin', 'http://cdn.maisonsdumonde.com/img/chaise-en-polypropylene-et-chene-bleue-ice-350-8-21-155575_1.jpg', 50, '2017-01-17', '2017-01-27', 1, 2, 1, 27, 2, 1),
(3, 'maison', 'Maison avec des portes', '52 rue Vesinet', 'http://www.macon.arlogis.com/uploads/4/realisations/maison-contemporaine-saone-.jpg', 450000, '2017-01-18', '2017-01-24', 1, 2, 1, 27, 4, 1);




--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `mot_de_passe`, `date_de_naissance`, `numeros_telephone`, `type`, `id_ville`, `est_pro`, `profession`, `nom_entreprise`, `voie`, `photo_profil`, `id_alerte`) VALUES
(1, 'safon', 'remi', 'remisafon@gmail.com', 'test', '2017-01-11', '25849657', 'argiculteur', 2, 1, 'jardinier', 'Truffaut', '40 rue du chemin', 'pokemon', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
