-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 04-Ago-2018 às 21:20
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `redesocial`
--
CREATE DATABASE IF NOT EXISTS `redesocial` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `redesocial`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `textocomentario` varchar(5000) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `id_post` int(11) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `textocomentario`, `id_usuario`, `nome_usuario`, `id_post`, `data`) VALUES
(1, 'asdasd', 6, 'bruno', 9, '2018-08-04 16:16:04'),
(2, 'sdfasdfaf', 6, 'bruno', 10, '2018-08-04 16:16:34'),
(3, 'asdasda', 6, 'bruno', 10, '2018-08-04 17:05:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE IF NOT EXISTS `pergunta` (
  `id_per` int(11) NOT NULL AUTO_INCREMENT,
  `perguntas` varchar(255) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_per`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `pergunta`
--

INSERT INTO `pergunta` (`id_per`, `perguntas`, `data`) VALUES
(6, 'Olá queridão', '2018-08-04 13:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_pergunta` int(11) NOT NULL,
  `texto` varchar(5000) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `fk_per_post` (`id_pergunta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id_post`, `id_pergunta`, `texto`, `id_user`, `nome`, `data`) VALUES
(9, 6, 'asdasd', '6', 'bruno', '2018-08-04 14:18:07'),
(10, 6, 'asdf', '6', 'bruno', '2018-08-04 15:55:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `data` datetime NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `password`, `data`, `foto`) VALUES
(1, 'bruno', 'email@email.com', '1234', '2018-07-07 00:00:00', ''),
(2, 'bruno', 'email@email.com2', '123', '2018-07-15 14:07:04', ''),
(5, 'bruno', 'email@email.com3', '123', '2018-07-16 17:39:41', ''),
(6, 'bruno', 'email@email.com4', '202cb962ac59075b964b07152d234b70', '2018-07-17 10:46:19', '18fac4f287e769cafd390160bbcd2c1f.jpg'),
(7, 'bruno', 'email@email.com7', '202cb962ac59075b964b07152d234b70', '2018-07-21 12:02:02', ''),
(8, 'bruno', 'email@email11.com', '202cb962ac59075b964b07152d234b70', '2018-07-24 19:27:30', '');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_per_post` FOREIGN KEY (`id_pergunta`) REFERENCES `pergunta` (`id_per`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
