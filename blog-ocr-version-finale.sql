-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 28 sep. 2022 à 00:09
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog-ocr`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `chapo` varchar(255) NOT NULL,
  `contenu` mediumtext NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT current_timestamp(),
  `dateModif` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `chapo`, `contenu`, `auteur`, `dateCreation`, `dateModif`) VALUES
(1, 'La programmation Orientée Objet', 'Vous avez dit POO ?', 'Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.', 'Josselin', '2022-09-09 13:36:31', '0000-00-00 00:00:00'),
(2, 'Le framework Symfony', 'Connais-tu cette Symfony ...', 'Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.', 'Josselin', '2022-09-09 13:48:09', '2022-09-09 13:38:14'),
(3, 'Le top 10 des langages de programmation', 'Retrouvez le classement de PHP ici...', 'Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.', 'Josselin', '2022-09-09 13:48:09', '2022-09-09 13:38:14'),
(4, 'Git ou Github ?', 'Pouvoir créer des dépôts distants...', 'Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.', 'Josselin', '2022-09-09 13:48:09', '2022-09-09 13:38:14'),
(5, 'Les tests unitaires dans le monde du dev', 'Pourquoi les tests unitaires sont indispensables aujourd\'hui', 'Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.', 'Josselin', '2022-09-09 13:48:09', '2022-09-09 13:38:14'),
(6, 'Comment créer un blog réussi', 'Voici les points à suivre pour créer son blog', 'Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.', 'Josselin', '2022-09-09 13:48:09', '2022-09-09 13:38:14'),
(7, 'Le MVC, qu\'est-ce que c\'est?', 'Créez votre propre framework en suivant ces règles ici...', 'Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.', 'Josselin', '2022-09-09 13:48:09', '2022-09-09 13:38:14'),
(8, 'Bootstrap est-il en perte de vitesse ?', 'Le framework CSS subit la concurrence de plein fouet', 'Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.', 'Josselin', '2022-09-09 13:48:09', '2022-09-09 13:38:14'),
(19, 'new titre15', 'et maintenant...', 'lorem ipsum', 'Jojo', '2022-09-20 15:54:31', '2022-09-20 15:54:31'),
(20, 'new titre11', 'et maintenant...', 'lorem ipsum', 'Jojo', '2022-09-20 22:30:48', '2022-09-20 22:30:48'),
(21, 'new titre 35', 'et maintenant...\r\nVivamus suscipit tortor eget felis porttitor volutpat. Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus mag', 'lorem ipsum\r\nVivamus suscipit tortor eget felis porttitor volutpat. Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.\r\n\r\nCurabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec rutrum congue leo eget malesuada.\r\nVivamus suscipit tortor eget felis porttitor volutpat. Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.\r\n\r\nCurabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec rutrum congue leo eget malesuada.Vivamus suscipit tortor eget felis porttitor volutpat. Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.\r\n\r\nCurabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec rutrum congue leo eget malesuada.', 'Jojo', '2022-09-20 22:32:18', '2022-09-27 22:45:55'),
(22, 'new titre 4', 'et maintenant...', 'lorem ipsum', 'Jojo', '2022-09-20 22:35:07', '2022-09-20 22:35:07'),
(23, 'new titre150', 'et maintenant...', 'lorem ipsum', 'Jojo', '2022-09-20 22:36:07', '2022-09-20 22:36:07'),
(25, 'new titre88', 'et maintenant...', 'lorem ipsum', 'Jojo', '2022-09-21 09:01:20', '2022-09-27 22:32:20'),
(26, 'PHP, mon code, ma bataille !', 'la lutte sera longue ...', 'Donec rutrum congue leo eget malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit. Quisque velit nisi, pretium ut lacinia in, elementum id enim.\r\n\r\nCurabitur aliquet quam id dui posuere blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec rutrum congue leo eget malesuada. Curabitur aliquet quam id dui posuere blandit.\r\n\r\nCurabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.', 'Jojo', '2022-09-27 22:34:04', '2022-09-27 22:34:04');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) UNSIGNED NOT NULL,
  `commentaire` mediumtext NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT current_timestamp(),
  `estValide` tinyint(2) NOT NULL DEFAULT 0,
  `utilisateur_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `commentaire`, `dateCreation`, `estValide`, `utilisateur_id`, `article_id`) VALUES
(1, 'blablabla', '2022-09-12 14:58:51', 1, 11, 7),
(3, 'gdsfsdsgds', '2022-09-17 09:54:59', 1, 10, 2),
(7, 'bughfgfdjhkh', '2022-09-20 12:38:18', 1, 12, 2),
(8, 'fhfrdesmpkj;', '2022-09-20 12:38:23', 1, 12, 2),
(9, 'dsljskljdslqds', '2022-09-20 12:43:06', 1, 12, 2),
(10, 'fgdmflkfdmslkdfmslfds', '2022-09-20 12:43:10', 1, 12, 2),
(12, 'gfqddddffddqs', '2022-09-21 07:03:49', 0, 12, 23),
(13, 'cxsdfsd', '2022-09-26 15:06:07', 0, 10, 25),
(14, 'dsqjkljlsdqk', '2022-09-26 15:07:54', 0, 10, 25),
(15, 'ldjlksqqq', '2022-09-26 15:08:08', 0, 10, 25),
(16, 'ldjlksqqq', '2022-09-26 15:33:00', 0, 10, 25),
(17, 'fgdfdgdfdfd', '2022-09-26 15:46:55', 0, 10, 22),
(18, 'fdsdsdsdsd', '2022-09-26 18:59:09', 0, 10, 25),
(19, 'fdsfdfds', '2022-09-26 18:59:12', 0, 10, 25),
(20, 'fdsdfsfsfsdfsddfs', '2022-09-26 19:01:22', 0, 10, 25),
(21, 'cxfsfdsq', '2022-09-26 19:09:22', 0, 10, 25),
(22, 'dsdfdffsfq', '2022-09-26 19:09:53', 0, 10, 25),
(23, 'dsdfdffsfq', '2022-09-26 19:09:55', 0, 10, 25),
(24, 'dsdfdffsfq', '2022-09-26 19:09:59', 0, 10, 25),
(25, 'dfqqfffqfqsfsq', '2022-09-26 19:10:03', 0, 10, 25),
(26, 'dfqqfffqfqsfsq', '2022-09-26 19:11:08', 0, 10, 25),
(27, 'dfqqfffqfqsfsq', '2022-09-26 19:11:11', 0, 10, 25),
(28, 'cwxcwx', '2022-09-26 19:11:14', 0, 10, 25),
(29, 'cwxcwx', '2022-09-26 19:12:09', 0, 10, 25),
(30, 'dfqqfffqfqsfsq', '2022-09-26 19:12:26', 0, 10, 25),
(31, 'cfdddfs', '2022-09-26 19:12:29', 0, 10, 25),
(32, 'cfdddfs', '2022-09-26 19:12:37', 0, 10, 25),
(33, 'cwxqsc', '2022-09-26 19:12:41', 0, 10, 25),
(34, 'cxww', '2022-09-26 19:13:08', 0, 10, 25),
(35, 'cxww', '2022-09-26 19:13:14', 0, 10, 25),
(36, 'dbxcbxv', '2022-09-26 19:16:01', 0, 10, 23),
(37, 'dbxcbxv', '2022-09-26 19:16:46', 0, 10, 23),
(38, 'dbxcbxv', '2022-09-26 19:18:04', 0, 10, 23),
(39, 'dbxcbxv', '2022-09-26 19:18:07', 0, 10, 23),
(40, 'cwxcxwcwxcwx', '2022-09-26 19:18:11', 0, 10, 23),
(41, 'fddfdsdfsfsd', '2022-09-26 19:47:51', 0, 10, 23),
(42, 'fddsfdfqdfqdfqddfqfdqfqd', '2022-09-26 19:49:03', 0, 10, 23),
(43, 'cvcxcccvx', '2022-09-26 19:49:46', 0, 10, 23),
(44, 'vcvwvcvwcvw', '2022-09-26 19:52:41', 0, 10, 23),
(45, 'dddfdssfd', '2022-09-26 19:53:13', 0, 10, 23),
(46, 'fdsdffdfsd', '2022-09-26 20:43:44', 0, 10, 23),
(47, 'fddsdfsfds', '2022-09-26 20:43:52', 0, 10, 23),
(48, 'cwxxwxwcwx', '2022-09-26 20:45:33', 0, 10, 23),
(49, 'cwxxwxwcwx', '2022-09-26 20:45:53', 0, 10, 23),
(50, 'wcxcxwcwxcwx', '2022-09-26 20:48:02', 0, 10, 23),
(51, 'cxcxcxcww', '2022-09-26 20:48:09', 0, 10, 23),
(52, 'cxwxcwccxw', '2022-09-26 20:48:13', 0, 10, 23),
(53, ' ccvcvcx', '2022-09-26 21:05:02', 0, 10, 23),
(54, ' ccvcvcx', '2022-09-26 21:07:52', 0, 10, 23),
(55, ' ccvcvcx', '2022-09-26 21:07:55', 0, 10, 23),
(56, 'dvxcvccxw', '2022-09-26 21:07:59', 0, 10, 23),
(57, 'sfddfdfs', '2022-09-26 21:26:49', 0, 10, 23),
(58, 'sfddfdfs', '2022-09-26 21:27:13', 0, 10, 23),
(59, 'cxwxfdqqqssx', '2022-09-26 21:27:18', 1, 10, 23),
(63, '   dsqddqq', '2022-09-27 14:23:34', 0, 12, 20),
(64, 'dfkjdkljlkdfs', '2022-09-27 14:36:22', 0, 12, 19);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `message` mediumtext NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT current_timestamp(),
  `estVu` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `email`, `objet`, `message`, `dateCreation`, `estVu`) VALUES
(1, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'hghdg', '2022-09-03 22:58:52', 0),
(2, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'hghdg', '2022-09-04 11:56:28', 0),
(3, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dfd', '2022-09-04 12:39:10', 0),
(4, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfd', '2022-09-04 13:25:34', 0),
(5, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfd', '2022-09-04 13:27:10', 0),
(6, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdfsdfs', '2022-09-04 13:27:18', 0),
(7, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdfsdfs', '2022-09-04 13:28:46', 0),
(8, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfd', '2022-09-04 13:28:55', 0),
(9, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfd', '2022-09-04 13:39:31', 0),
(10, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfd', '2022-09-04 13:39:36', 0),
(11, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfd', '2022-09-04 13:39:57', 0),
(12, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdsfs', '2022-09-04 13:40:09', 0),
(13, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdsfs', '2022-09-04 13:40:26', 0),
(14, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demandedsq', 'dsq', '2022-09-04 13:40:37', 0),
(15, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fds', '2022-09-04 13:42:20', 0),
(16, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fds', '2022-09-04 13:47:18', 0),
(17, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fds', '2022-09-04 13:49:43', 0),
(18, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fds', '2022-09-04 13:51:32', 0),
(19, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fds', '2022-09-04 14:26:48', 0),
(20, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fds', '2022-09-04 14:27:03', 0),
(21, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfd', '2022-09-04 16:10:02', 0),
(22, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfd', '2022-09-04 16:12:20', 0),
(23, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfd', '2022-09-04 16:12:24', 0),
(24, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfd', '2022-09-04 16:12:58', 0),
(25, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fds', '2022-09-04 16:15:02', 0),
(26, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fds', '2022-09-04 16:18:35', 0),
(27, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'fs', 'fds', '2022-09-04 16:19:10', 0),
(28, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'fs', 'fds', '2022-09-04 19:32:14', 0),
(29, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fds', '2022-09-07 07:01:08', 0),
(30, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdfdsdsf', '2022-09-08 15:13:42', 0),
(31, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdfdsdsf', '2022-09-08 15:30:28', 0),
(32, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'dshdkhdkjqhdf\r\nfdljdflkjdslkjql\r\nfdmjfdskljfdsl', '2022-09-11 13:15:15', 0),
(33, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'dshdkhdkjqhdf\r\nfdljdflkjdslkjql\r\nfdmjfdskljfdsl', '2022-09-11 13:17:17', 0),
(34, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'dshdkhdkjqhdf\r\nfdljdflkjdslkjql\r\nfdmjfdskljfdsl', '2022-09-11 13:19:16', 0),
(35, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'dshdkhdkjqhdf\r\nfdljdflkjdslkjql\r\nfdmjfdskljfdsl', '2022-09-11 13:19:19', 0),
(36, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdhdlshfdslk\r\nfldhdlshld', '2022-09-11 13:19:34', 0),
(37, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdhdlshfdslk\r\nfldhdlshld', '2022-09-11 13:26:13', 0),
(38, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'lfdlqlskfqlkjsdlk\r\nfklfqlksjqlkq\r\nfslkfjqslk', '2022-09-11 13:26:29', 0),
(39, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'lfdlqlskfqlkjsdlk\r\nfklfqlksjqlkq\r\nfslkfjqslk', '2022-09-11 13:27:11', 0),
(40, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'lfdlqlskfqlkjsdlk\r\nfklfqlksjqlkq\r\nfslkfjqslk', '2022-09-11 13:27:14', 0),
(41, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdkjlfksdjl\r\nfdfjslkdjs', '2022-09-11 13:27:26', 0),
(42, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdkjlfksdjl\r\nfdfjslkdjs', '2022-09-11 13:29:12', 0),
(43, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdkjlfksdjl\r\nfdfjslkdjs', '2022-09-11 13:37:27', 0),
(44, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdkjlfksdjl\r\nfdfjslkdjs', '2022-09-11 13:37:55', 0),
(45, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'dshdkhdkjqhdf\r\nfdljdflkjdslkjql\r\nfdmjfdskljfdsl', '2022-09-11 13:38:07', 0),
(46, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'dshdkhdkjqhdf\r\nfdljdflkjdslkjql\r\nfdmjfdskljfdsl', '2022-09-11 13:38:12', 0),
(47, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsjlkjs', '2022-09-11 13:38:22', 0),
(48, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsjlkjs', '2022-09-11 13:43:17', 0),
(49, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsjlkjs', '2022-09-11 13:43:25', 0),
(50, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdsfdsds', '2022-09-11 13:43:36', 0),
(51, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdsfdsds', '2022-09-11 16:15:33', 0),
(52, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdsfdsds', '2022-09-11 16:16:19', 0),
(53, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdsfdsds', '2022-09-11 16:16:37', 0),
(54, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdsfdsds', '2022-09-11 16:17:23', 0),
(55, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdsfdsds', '2022-09-11 16:17:44', 0),
(56, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'dsnlskfs\r\nfdnskjldfks', '2022-09-11 16:18:00', 0),
(57, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'dsnlskfs\r\nfdnskjldfks', '2022-09-11 16:18:42', 0),
(58, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfsfdds', '2022-09-11 16:18:54', 0),
(59, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfsfdds', '2022-09-11 16:20:05', 0),
(60, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fsdgsdf', '2022-09-11 16:20:10', 0),
(61, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fsdgsdf', '2022-09-11 16:21:22', 0),
(62, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dsjlkdf', '2022-09-11 16:21:30', 0),
(63, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dsjlkdf', '2022-09-11 16:22:05', 0),
(64, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dsjlkdf', '2022-09-11 16:22:09', 0),
(65, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfdsds', '2022-09-11 16:22:15', 0),
(66, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfdsds', '2022-09-11 18:17:46', 0),
(67, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfdsds', '2022-09-11 18:19:14', 0),
(68, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfdsds', '2022-09-11 18:20:04', 0),
(69, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfdsds', '2022-09-11 18:22:05', 0),
(70, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfdsds', '2022-09-11 18:23:08', 0),
(71, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfdsds', '2022-09-11 18:24:00', 0),
(72, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfdsds', '2022-09-11 18:24:22', 0),
(73, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gfdsds', '2022-09-11 18:25:52', 0),
(74, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'kgjgjh', '2022-09-11 18:26:01', 0),
(75, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'kgjgjh', '2022-09-11 18:38:50', 0),
(76, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdsf', '2022-09-11 18:38:57', 0),
(77, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdsf', '2022-09-11 19:09:42', 0),
(78, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdsfqdqs', '2022-09-11 19:09:48', 0),
(79, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdsfqdqs', '2022-09-11 19:10:34', 0),
(80, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdsfqdqs', '2022-09-11 19:16:04', 0),
(81, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdsfqdqs', '2022-09-11 19:16:07', 0),
(82, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdsfqdqs', '2022-09-11 19:16:40', 0),
(83, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdsfqdqs', '2022-09-11 19:16:44', 0),
(84, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdsfqdqs', '2022-09-11 19:16:56', 0),
(85, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdsfqdqs', '2022-09-11 19:16:59', 0),
(86, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdsfqdqs', '2022-09-11 19:21:33', 0),
(87, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdsfqdqs', '2022-09-11 19:24:38', 0),
(88, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdsfqdqs', '2022-09-11 19:25:05', 0),
(89, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'gdsfqdqs', '2022-09-11 19:29:36', 0),
(90, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'sdfsds', '2022-09-11 19:30:20', 0),
(91, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dgssfs', '2022-09-11 19:56:29', 0),
(92, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dgssfs', '2022-09-11 19:58:20', 0),
(93, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dgssfs', '2022-09-11 19:59:40', 0),
(94, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dgssfs', '2022-09-11 20:00:20', 0),
(95, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dgssfs', '2022-09-11 20:01:00', 0),
(96, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dgssfs', '2022-09-11 20:01:30', 0),
(97, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dgssfs', '2022-09-11 20:02:06', 0),
(98, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dgssfs', '2022-09-11 20:02:17', 0),
(99, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dgssfs', '2022-09-11 20:03:08', 0),
(100, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dgssfs', '2022-09-11 20:09:02', 0),
(101, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dgssfs', '2022-09-11 20:09:56', 0),
(102, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dgssfs', '2022-09-11 20:18:23', 0),
(103, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dgssfs', '2022-09-11 20:20:25', 0),
(104, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dgssfs', '2022-09-11 20:21:50', 0),
(105, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fsddfss', '2022-09-11 20:22:15', 0),
(106, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fsddfss', '2022-09-11 20:22:58', 0),
(107, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fsddfss', '2022-09-11 20:25:09', 0),
(108, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fsddfss', '2022-09-11 20:25:30', 0),
(109, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fsddfss', '2022-09-11 20:26:32', 0),
(110, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdsfs', '2022-09-11 20:26:51', 0),
(111, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdsfs', '2022-09-11 20:27:56', 0),
(112, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'fr', 'fdsfds', '2022-09-11 20:28:13', 0),
(113, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'fr', 'fdsfds', '2022-09-11 20:28:36', 0),
(114, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'fr', 'fdsfds', '2022-09-11 20:28:57', 0),
(115, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'fr', 'fdsfds', '2022-09-11 20:29:17', 0),
(116, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'fr', 'fdsfds', '2022-09-11 20:29:36', 0),
(117, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'fr', 'fdsfds', '2022-09-11 20:32:38', 0),
(118, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'fr', 'fdsfds', '2022-09-11 20:32:54', 0),
(119, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'fr', 'fdsfds', '2022-09-11 20:33:26', 0),
(120, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'fr', 'fdsfds', '2022-09-11 20:41:27', 0),
(121, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdvcx', '2022-09-11 20:41:57', 0),
(122, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdvcx', '2022-09-11 20:42:19', 0),
(123, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdvcx', '2022-09-11 20:42:45', 0),
(124, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'vgds', 'dfsdfs', '2022-09-11 20:48:34', 0),
(125, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'vgds', 'dfsdfs', '2022-09-11 21:09:37', 0),
(126, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsfsds', '2022-09-11 21:09:53', 0),
(127, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsfsds', '2022-09-11 21:10:54', 0),
(128, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsfsds', '2022-09-11 21:12:09', 0),
(129, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsfsds', '2022-09-11 21:12:51', 0),
(130, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'fdfsfsfd', '2022-09-11 21:21:10', 0),
(131, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'fdfsfsfd', '2022-09-11 21:21:36', 0),
(132, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'fdfsfsfd', '2022-09-11 21:21:45', 0),
(133, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'vcwvwxw', '2022-09-11 21:24:03', 0),
(134, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'vcwvwxw', '2022-09-11 21:37:24', 0),
(135, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdsfdsfds', '2022-09-11 21:37:38', 0),
(136, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdsfdsfds', '2022-09-11 21:38:20', 0),
(137, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsdsfdsfds', '2022-09-12 09:00:50', 0),
(138, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dfsfdssdfsdfd', '2022-09-13 09:01:19', 0),
(139, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dfsfdssdfsdfd', '2022-09-13 09:02:39', 0),
(140, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dfsfdssdfsdfd', '2022-09-13 09:06:16', 0),
(141, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dfsfdssdfsdfd', '2022-09-13 09:06:20', 0),
(142, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dfsfdssdfsdfd', '2022-09-13 09:07:24', 0),
(143, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dfsfdssdfsdfd', '2022-09-13 09:07:28', 0),
(144, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dfsfdssdfsdfd', '2022-09-13 09:11:55', 0),
(145, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dfsfdssdfsdfd', '2022-09-13 09:12:35', 0),
(146, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dfsfdssdfsdfd', '2022-09-13 09:32:46', 0),
(147, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dfsfdssdfsdfd', '2022-09-13 09:33:14', 0),
(148, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dfsfdssdfsdfd', '2022-09-13 09:34:00', 0),
(149, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsssdfs', '2022-09-13 09:34:24', 0),
(150, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsssdfs', '2022-09-13 09:36:44', 0),
(151, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fdsssdfs', '2022-09-13 10:51:31', 0),
(152, 'crenn', 'josselin', 'joss@gmail.com', 'demande', 'dsgsfss', '2022-09-13 10:51:53', 0),
(153, 'crenn', 'josselin', 'joss@gmail.com', 'demande', 'fdsfsddffsd', '2022-09-13 10:55:29', 0),
(154, 'crenn', 'josselin', 'joss@gmail.com', 'demande', 'fddhskjdfs\r\nfdsfdslkdsl\r\nfdljdsflhsfd;', '2022-09-13 12:59:16', 0),
(155, 'crenn', 'josselin', 'joss@gmail.com', 'demande', 'fddhskjdfs\r\nfdsfdslkdsl\r\nfdljdsflhsfd;', '2022-09-13 13:07:05', 0),
(156, 'crenn', 'josselin', 'joss@gmail.com', 'demande', 'fddhskjdfs\r\nfdsfdslkdsl\r\nfdljdsflhsfd;', '2022-09-13 13:07:15', 0),
(157, 'crenn', 'josselin', 'joss@gmail.com', 'demande', 'fdfsdkj\r\nfdskjfskljdfq', '2022-09-13 13:30:23', 1),
(160, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'dfsdfs', '2022-09-13 13:39:38', 1),
(161, 'crenn', 'josselin', 'josselincrenn@gmail.com', 'demande', 'fds', '2022-09-13 13:53:10', 1),
(165, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'gsdfs', '2022-09-23 19:56:38', 0),
(166, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'fddsdssd', '2022-09-25 18:49:13', 0),
(167, 'crenn', 'josselin', 'jo@gmail.com', 'demande', 'vwxcvxw', '2022-09-26 18:00:20', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `email`, `password`, `role`, `dateCreation`) VALUES
(10, 'bobo', 'jo@gmail.com', '$2y$10$ModixZjpJqtNNfPBx80nWe5GztUGu2AcBlRrLgwEK18RuZd37fix.', 0, '2022-09-05 16:06:31'),
(11, 'toto', 'toto@gmail.com', '$2y$10$WftidkIkj42t5Tcg5kEx7uJomf0yNQsrEhUv2aa.mp1dwp13tpvWm', 0, '2022-09-07 07:03:15'),
(12, 'jojo', 'jojo@gmail.com', '$2y$10$V5Tg4.HvmSaOWkoDxQpGEulisMfkt3HMR/GCez.5Vxt13jKIUcLFS', 1, '2022-09-12 12:14:40');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
