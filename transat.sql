-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 10 juil. 2020 à 14:16
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `transat`
--
CREATE DATABASE IF NOT EXISTS `transat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `transat`;

-- --------------------------------------------------------

--
-- Structure de la table `administeur`
--

DROP TABLE IF EXISTS `administeur`;
CREATE TABLE IF NOT EXISTS `administeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `statut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administeur`
--

INSERT INTO `administeur` (`id`, `login`, `password`, `statut`) VALUES
(10, 'admin', '81e3c8bcfc8e49179a52aa476184b33ce1f5d8ec2ecde223298ec5493c1d51aa', 0),
(6, 'm', '0393ae44f80a22d9ffa8b8c876e4f3105286d7ec7584c8771bb0cf1850bad7c6', 2),
(7, 'a', '?', 1),
(8, 'p', '818d0690331a42c99c7d020f5bd1811dfa84fcaf2133050b4468272395f1f413', 1),
(9, 'bg', '13a15c6ace039262293756c1ff7803c3ed3521f30acacdf51a477d35e145d0d5', 1);

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `titre` varchar(255) NOT NULL,
  `hdeb` int(11) NOT NULL,
  `mdeb` int(11) NOT NULL,
  `hfin` int(11) NOT NULL,
  `mfin` int(11) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agenda`
--

INSERT INTO `agenda` (`id`, `id_admin`, `date`, `description`, `titre`, `hdeb`, `mdeb`, `hfin`, `mfin`, `lieu`, `type`) VALUES
(21, 10, '2020-06-08', 'rr', 'lll', 15, 0, 14, 0, 'f', 0),
(19, 10, '2020-06-08', 'thrfhrfyhr', 'lundi', 10, 0, 5, 0, 'ggggggggg', 0),
(20, 10, '2020-06-08', 'kkkkkk', 'j', 14, 15, 19, 0, 'l', 0),
(18, 10, '2020-06-09', 'jjjjj', 'mardi', 1, 0, 3, 0, 'lk', 0),
(17, 10, '2020-06-09', 'jjjjj', 'mardi', 1, 0, 3, 0, 'lk', 0),
(16, 10, '2020-06-09', 'jjjjjjjjjj', 'mardi', 1, 0, 0, 0, '', 0),
(14, 10, '2020-06-07', 'w', 'bis', 9, 0, 12, 0, 'vvvvv', 0),
(13, 10, '2020-06-07', 'dddddddddddd', 'dimanch', 8, 0, 10, 0, 'ff', 0),
(15, 10, '2020-06-16', 'eeeeeee', 'mardi', 4, 15, 7, 0, 'rrrrrrr', 0),
(22, 10, '2020-06-09', 'khhhhhhhhhhhhjjjjyyff', 'ppp', 1, 0, 6, 0, 'uuuuu', 0),
(23, 10, '2020-06-13', 'kjnj', 'samdi', 1, 0, 4, 0, 'zzzzzzz', 0),
(25, 10, '2020-01-01', 'azaza', 'aaaaa', 1, 0, 3, 0, 'zzzzzzz', 0),
(26, 10, '2020-01-06', 'zzzz', 'tese', 1, 0, 2, 0, 'ee', 0),
(27, 10, '2020-06-04', 'jjjjjjj', 'hh', 1, 0, 2, 0, 'kj', 0),
(28, 10, '2020-01-30', 'pp', 're', 4, 0, 6, 0, 'ff', 0),
(30, 10, '2020-02-26', 'aaaa', 'aa', 2, 0, 3, 0, 'aaaaaaa', 0),
(31, 10, '2020-05-21', 'zae', 'zzaz', 2, 0, 6, 0, 'fd', 0),
(32, 10, '2020-01-24', 'azazaz', 'mama', 1, 0, 2, 0, 'zz', 0),
(33, 10, '2020-03-20', 'zza', '20 mars', 1, 0, 4, 0, 'zzzzzzz', 0),
(34, 10, '2020-02-13', 'fiels', '13 fev', 2, 0, 5, 0, 'zzz', 0),
(35, 10, '2020-02-28', 'ze', '28 fev', 10, 0, 12, 0, 'e', 0),
(36, 10, '2020-03-02', 'ii', '2 mars', 1, 0, 2, 0, 'e', 0),
(37, 10, '2020-03-10', 'but mama', '10 mars', 1, 0, 3, 0, 'ssssssq', 0),
(38, 10, '2020-03-05', 'zez', '5 mars', 14, 0, 16, 0, 'ee', 0),
(39, 10, '2020-06-08', 'rer', 'lundi 8 mars', 4, 0, 6, 0, 'tt', 0),
(40, 10, '2020-03-09', 'ffs', 'lundi 9 mars', 1, 0, 3, 0, 'ezezx', 0),
(41, 10, '2020-03-08', 'ddd', 'dim 8 mars', 4, 0, 8, 0, 'ded', 0),
(42, 10, '2020-03-07', 'ze', 'but mama', 3, 0, 4, 0, 'eee', 0),
(43, 10, '2020-01-03', 'eeeeeeeeeee', 'rr', 3, 0, 5, 0, 'ezez', 0),
(44, 10, '2020-01-01', 'kkk', 'uki', 14, 0, 15, 0, 'kl', 0),
(45, 10, '2020-12-31', 'rrr', 'test fin jeudi', 4, 0, 7, 0, 'p', 0),
(46, 10, '2021-01-01', 'ezdafze', 'new year bitch', 7, 0, 9, 0, 'ptdr', 0),
(47, 10, '2019-12-31', 'ptp', 'wesh mardi', 2, 0, 4, 0, 'rrr', 0),
(48, 10, '2019-12-31', 'ptp', 'wesh mardi', 2, 0, 4, 0, 'rrr', 0),
(49, 10, '2021-01-01', 'jk', '1 vend 2021', 3, 0, 5, 0, 'fdfd', 0),
(50, 10, '2021-01-04', 'z', 'lundi', 3, 0, 5, 0, 'e', 0),
(51, 10, '2018-12-31', 'cdcd', '31dec 2018', 2, 0, 4, 0, 'putiz', 0),
(52, 10, '2019-01-01', 'zr', 'ptdr', 1, 0, 3, 0, 'rr', 0),
(53, 10, '2019-01-01', 'pdr', 'sem1  mardi 2019', 2, 0, 4, 0, 'c', 0),
(54, 10, '2020-06-18', 'lklkl', 'oo', 1, 0, 3, 0, 'll', 1),
(55, 10, '2020-06-18', 'lklkl', 'oo', 1, 0, 3, 0, 'll', 1),
(65, 10, '2020-06-23', 'zefgs', 'pride', 1, 0, 4, 0, 'opopop', 0),
(64, 10, '2020-06-25', 'ktffffffffffffffff tyyyyyyyyyygh g ', 'réunion', 11, 0, 14, 0, 'ooo', 1);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `id_admin`, `date`, `categorie`, `article`, `type`) VALUES
(15, 'k', 1, '2020-06-10 12:50:54', 'juridique', '<b>a</b>', ''),
(16, 'z', 1, '2020-06-10 09:03:22', 'juridique', 'l<hr<', ''),
(17, 'ddddddd', 10, '2020-07-10 16:14:20', 'juridique', '<div align=\"center\">ssssssssssssssssssssssssssssssssssssssssssssssssssssss</div><div align=\"right\"><ul><li>sssssssssssssssssssss</li><li>qqqqqqqqqqqqqqq</li><li>xxxxxxxxxxxxxxx</li></ul><h1>vvvvvvvvvvvvvvvvvvvvv</h1><div>sssssssss</div><div><br></div></div>', 'SA');

-- --------------------------------------------------------

--
-- Structure de la table `ressources`
--

DROP TABLE IF EXISTS `ressources`;
CREATE TABLE IF NOT EXISTS `ressources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ressources`
--

INSERT INTO `ressources` (`id`, `titre`, `id_admin`, `date`, `categorie`, `article`, `type`) VALUES
(51, 'dd', 10, '2020-06-10 13:07:13', 'juridique', 'dds<hr><hr>dd<i>ddddddddddd<u>sssssssssss</u></i>', ''),
(50, 'll', 1, '2020-06-10 12:52:03', 'juridique', 'n', ''),
(49, 'eee', 1, '2020-06-09 20:57:31', 'juridique', 'ee<hr><hr>', ''),
(43, 't', 1, '2020-06-09 18:17:50', 'juridique', '<div>kkkkkkkkk<b>jjj</b></div><div><hr><hr></div>', ''),
(44, '', 1, '2020-06-09 20:50:53', 'juridique', 'eeeeeeeeee', ''),
(45, 'f', 1, '2020-06-09 20:52:31', 'juridique', '', ''),
(46, '', 1, '2020-06-09 20:54:30', 'juridique', '<hr><hr><hr><hr><hr>', ''),
(47, 'f', 1, '2020-06-09 20:55:01', 'juridique', 'r<hr><hr><hr>rrr<hr><hr><hr><hr><hr><hr><hr><hr>r', ''),
(48, 'llpp', 1, '2020-06-10 12:53:34', 'juridique', '<div align=\"center\">k<i>nnl\'eeecc<b>ccccccccccccccccc<u>xxxxxxxxxxxxxxx</u></b></i><br></div>', ''),
(52, 'test ,yolo', 10, '2020-07-10 16:08:56', 'juridique', '<div align=\"right\">yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyrrrrrrrrrrrrrrrrr**</div><div align=\"right\"><ul><li><h1>tttttttttttttttttttttttttttttttttttttttttttttttttttttttt</h1></li><li><div align=\"justify\"><h1>tttttttttttttttttttttttttttttttttttttttttrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrtttttttttttttttttttttttttttttttttttttttttttttttt</h1></div></li></ul></div>', 'TP');

-- --------------------------------------------------------

--
-- Structure de la table `stat`
--

DROP TABLE IF EXISTS `stat`;
CREATE TABLE IF NOT EXISTS `stat` (
  `ip` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stat`
--

INSERT INTO `stat` (`ip`, `status`) VALUES
('eb7fdf81fea97a2197b5c822987e6aaf66160564be20fdc77b20cfd185bdbcea', 'P');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `videgrenier`
--

DROP TABLE IF EXISTS `videgrenier`;
CREATE TABLE IF NOT EXISTS `videgrenier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `reservation` datetime DEFAULT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `id_reservant` int(11) DEFAULT NULL,
  `catégorie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
