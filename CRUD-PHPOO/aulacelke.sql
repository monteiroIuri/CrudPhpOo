-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Jun-2021 às 18:28
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aulacelke`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `msgs_contacts`
--

DROP TABLE IF EXISTS `msgs_contacts`;
CREATE TABLE IF NOT EXISTS `msgs_contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg_title` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `msgs_contacts`
--

INSERT INTO `msgs_contacts` (`id`, `name`, `email`, `msg_title`, `msg_content`, `created`, `modified`) VALUES
(1, 'Cesar', 'cesar@celke.com.br', 'Titulo da mensagem 1', 'Conteúdo da mensagem 1', '2020-06-23 00:00:00', NULL),
(2, 'Kelly', 'kelly@celke.com.br', 'Titulo da mensagem 2', 'Conteúdo da mensagem 2', '2020-06-23 00:00:00', NULL),
(3, 'Iuri', 'iuri@email.com', ' Titulo da mensagem 3', 'Conteúdo da mensagem 3', '2021-06-29 17:50:23', '2021-06-30 15:27:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
