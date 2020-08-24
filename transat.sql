-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 24 août 2020 à 18:46
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
  `cat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agenda`
--

INSERT INTO `agenda` (`id`, `id_admin`, `date`, `description`, `titre`, `hdeb`, `mdeb`, `hfin`, `mfin`, `lieu`, `type`, `cat`) VALUES
(73, 10, '2020-08-06', 's', 'ssssssssss', 1, 0, 2, 30, 'ddd', 1, 'atelier'),
(72, 10, '2020-08-26', 'dsdsd', 'sqqqq', 1, 0, 3, 0, 'ssssssfsdv', 0, 'event'),
(70, 10, '2020-08-20', 'gregr', 'atelier', 1, 0, 4, 0, 'fddddddd', 0, 'atelier'),
(71, 10, '2020-08-25', 'rrr', 'event', 1, 0, 1, 15, 'eee', 1, 'event');

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `id_admin`, `date`, `categorie`, `article`, `type`) VALUES
(15, 'k', 1, '2020-06-10 12:50:54', 'juridique', '<b>a</b>', ''),
(16, 'z', 1, '2020-06-10 09:03:22', 'juridique', 'l<hr<', ''),
(17, 'ddddddd', 10, '2020-07-10 16:14:20', 'juridique', '<div align=\"center\">ssssssssssssssssssssssssssssssssssssssssssssssssssssss</div><div align=\"right\"><ul><li>sssssssssssssssssssss</li><li>qqqqqqqqqqqqqqq</li><li>xxxxxxxxxxxxxxx</li></ul><h1>vvvvvvvvvvvvvvvvvvvvv</h1><div>sssssssss</div><div><br></div></div>', 'SA'),
(18, '', 10, '2020-07-13 09:27:10', 'juridique', '', 'P');

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
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ressources`
--

INSERT INTO `ressources` (`id`, `titre`, `id_admin`, `date`, `categorie`, `article`, `type`) VALUES
(51, 'dd', 10, '2020-06-10 13:07:13', 'juridique', 'dds<hr><hr>dd<i>ddddddddddd<u>sssssssssss</u></i>', ''),
(50, 'll', 1, '2020-06-10 12:52:03', 'juridique', 'n', ''),
(49, 'eee', 1, '2020-06-09 20:57:31', 'juridique', 'ee<hr><hr>', ''),
(43, 't', 1, '2020-06-09 18:17:50', 'juridique', '<div>kkkkkkkkk<b>jjj</b></div><div><hr><hr></div>', ''),
(44, '', 1, '2020-06-09 20:50:53', 'juridique', 'eeeeeeeeee', ''),
(45, 'f', 1, '2020-06-09 20:52:31', 'juridique', '', 'S'),
(46, '', 1, '2020-06-09 20:54:30', 'juridique', '<hr><hr><hr><hr><hr>', ''),
(47, 'f', 1, '2020-06-09 20:55:01', 'juridique', 'r<hr><hr><hr>rrr<hr><hr><hr><hr><hr><hr><hr><hr>r', ''),
(48, 'llpp', 1, '2020-08-03 11:26:30', 'juridique', '<div align=\"center\"><h1>k<i>nnl\'eeecc<b>ccccccccccccccccc<u>xxxxxxxxxxxxxxx&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; nnnnnnnnnnnnnn</u></b></i></h1></div>', 'S'),
(52, 'test ,yolo', 10, '2020-07-10 16:08:56', 'juridique', '<div align=\"right\">yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyrrrrrrrrrrrrrrrrr**</div><div align=\"right\"><ul><li><h1>tttttttttttttttttttttttttttttttttttttttttttttttttttttttt</h1></li><li><div align=\"justify\"><h1>tttttttttttttttttttttttttttttttttttttttttrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrtttttttttttttttttttttttttttttttttttttttttttttttt</h1></div></li></ul></div>', 'TP'),
(53, 'ddfd', 10, '2020-07-13 14:03:47', 'medical', '<div>ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss<u>ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss</u></div><div><u><br></u></div><div><u><br></u></div><div><u><br></u></div><div><u><br></u></div><div><u><br></u></div><div align=\"center\"><u>ddddddddddddddddddssssssss<br></u></div>', 'SPA'),
(54, 'salut', 10, '2020-07-16 15:18:57', 'medical', '<div align=\"justify\">wesh<u> gros <br></u></div><div align=\"right\">sa fartz<br></div>', 'TA'),
(55, 'hhhh', 10, '2020-07-16 15:49:56', 'juridique', 'nine ninz luftbalon<br>', 'P'),
(56, 'kkk', 10, '2020-07-16 15:51:59', 'juridique', 'kjkjkk', 'A'),
(57, 'jj', 10, '2020-07-16 15:55:10', 'juridique', 'kkk', 'A'),
(58, 'jjj', 10, '2020-07-16 16:05:52', 'medical', 'iuuuuuuuuuuuuuuuuuuuu<u>nnnnnnnnnnn</u>', 'T'),
(59, 'ojkkjkj', 10, '2020-07-16 16:09:24', 'medical', 'kjjjjj jjjjjjjjjj<b>jjjjjjjjjjjjjjjjjjj</b><br>', 'S'),
(60, 'ezeze', 10, '2020-07-18 15:12:37', 'medical', 'rrrrrrrrrrrrr', 'S'),
(61, 'kj', 10, '2020-07-18 15:17:01', 'juridique', 'kkkkkkkkkkkkkkkk', ''),
(62, 'sqqq', 10, '2020-07-18 15:19:13', 'juridique', 'qq', ''),
(63, 'pklklk', 10, '2020-07-18 15:32:32', 'juridique', 'lek,flrkg,kkkkervvvvvvvvvvvvvvvvvvvvvvvvvvvffffffffff', 'A'),
(64, 'pklklk', 10, '2020-07-18 15:34:04', 'juridique', 'lek,flrkg,kkkkervvvvvvvvvvvvvvvvvvvvvvvvvvvffffffffff', 'A'),
(65, 'pklklk', 10, '2020-07-18 15:35:22', 'juridique', 'lek,flrkg,kkkkervvvvvvvvvvvvvvvvvvvvvvvvvvvffffffffff', 'A'),
(66, 'dfdf', 10, '2020-07-18 15:35:51', 'juridique', 'rezrefcv rrtztzcrzr <br>', ''),
(67, 'dfdf', 10, '2020-07-18 15:36:27', 'juridique', 'rezrefcv rrtztzcrzr <br>', ''),
(68, 'sssssss', 10, '2020-07-18 15:37:48', 'juridique', 'rgrgerggrgzergzg', 'A'),
(69, 'k', 10, '2020-07-18 15:38:47', 'juridique', 'kkkkkkkkkkkjjj&nbsp; hhh<br>', 'P'),
(70, 'vfezv', 10, '2020-07-18 15:41:14', 'juridique', 'ezr<b>dddddddddddddddddddddd</b>', ''),
(71, 'vfezv', 10, '2020-07-18 15:47:13', 'juridique', 'ezr<b>dddddddddddddddddddddd</b>', ''),
(72, 'kn k k kj', 10, '2020-07-18 15:48:32', 'juridique', 'lkl,kl,jinkl;,k,k,k;;;;;;;;;;;;;;;;;;;;;;;;;jjjjjjjj<b>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</b>', 'P'),
(73, 'test', 10, '2020-07-31 11:58:29', 'juridique', '<div align=\"center\"><u>test pour aujourdhui</u></div><div align=\"center\"><u><br></u></div><div align=\"center\"><u><br></u></div><div align=\"center\"><u>ppp</u></div><div align=\"right\"><u>voila</u><br></div>', 'STPA');

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
('eb7fdf81fea97a2197b5c822987e6aaf66160564be20fdc77b20cfd185bdbcea', 'P'),
('8f7c0566b6b1e485f2ec77febde16eed7c975e70b9d5ebbb316c6bda3223da80', 'P');

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
