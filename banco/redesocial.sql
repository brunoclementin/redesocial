-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 16-Ago-2018 às 14:33
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `textocomentario`, `id_usuario`, `nome_usuario`, `id_post`, `data`) VALUES
(1, 'asdasd', 6, 'bruno', 9, '2018-08-04 16:16:04'),
(2, 'sdfasdfaf', 6, 'bruno', 10, '2018-08-04 16:16:34'),
(3, 'asdasda', 6, 'bruno', 10, '2018-08-04 17:05:52'),
(4, 'asdafasd', 7, 'bruno', 10, '2018-08-05 13:27:17'),
(5, 'quashflakslaksf', 10, 'Brisa', 10, '2018-08-13 14:30:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE IF NOT EXISTS `pergunta` (
  `id_per` int(11) NOT NULL AUTO_INCREMENT,
  `perguntas` varchar(255) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_per`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `pergunta`
--

INSERT INTO `pergunta` (`id_per`, `perguntas`, `data`) VALUES
(6, 'Olá queridão', '2018-08-04 13:00:00'),
(7, 'Quem vigia os vigilantes ?', '2018-08-05 13:00:00'),
(8, 'xablausss', '2018-08-14 23:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id_post`, `id_pergunta`, `texto`, `id_user`, `nome`, `data`) VALUES
(9, 6, 'asdasd', '6', 'bruno', '2018-08-04 14:18:07'),
(10, 6, 'asdf', '6', 'bruno', '2018-08-04 15:55:48'),
(11, 7, 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.\r\n\r\nPorque nós o usamos?\r\nÉ um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de "Conteúdo aqui, conteúdo aqui", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por ''lorem ipsum'' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).\r\n\r\n\r\nDe onde ele vem?\r\nAo contrário do que se acredita, Lorem Ipsum não é simplesmente um texto randômico. Com mais de 2000 anos, suas raízes podem ser encontradas em uma obra de literatura latina clássica datada de 45 AC. Richard McClintock, um professor de latim do Hamasd', '6', 'bruno', '2018-08-05 14:09:40'),
(12, 7, 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.\r\n\r\nPorque nós o usamos?\r\nÉ um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de "Conteúdo aqui, conteúdo aqui", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por ''lorem ipsum'' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).\r\n\r\n\r\nDe onde ele vem?\r\nAo contrário do que se acredita, Lorem Ipsum não é simplesmente um texto randômico. Com mais de 2000 anos, suas raízes podem ser encontradas em uma obra de literatura latina clássica datada de 45 AC. Richard McClintock, um professor de latim do Ham', '6', 'bruno', '2018-08-05 14:09:56'),
(13, 7, 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.\r\n\r\nPorque nós o usamos?\r\nÉ um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de "Conteúdo aqui, conteúdo aqui", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por ''lorem ipsum'' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).\r\n\r\n\r\nDe onde ele vem?\r\nAo contrário do que se acredita, Lorem Ipsum não é simplesmente um texto randômico. Com mais de 2000 anos, suas raízes podem ser encontradas em uma obra de literatura latina clássica datada de 45 AC. Richard McClintock, um professor de latim do Ham', '6', 'bruno', '2018-08-05 14:10:06'),
(14, 7, 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.\r\n\r\nPorque nós o usamos?\r\nÉ um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de "Conteúdo aqui, conteúdo aqui", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por ''lorem ipsum'' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).\r\n\r\n\r\nDe onde ele vem?\r\nAo contrário do que se acredita, Lorem Ipsum não é simplesmente um texto randômico. Com mais de 2000 anos, suas raízes podem ser encontradas em uma obra de literatura latina clássica datada de 45 AC. Richard McClintock, um professor de latim do Ham', '6', 'bruno', '2018-08-05 14:10:14'),
(15, 8, 'asdfasdfa', '10', 'Brisa', '2018-08-14 23:17:13');

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
  `fotocapa` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `password`, `data`, `foto`, `fotocapa`) VALUES
(1, 'bruno', 'email@email.com', '1234', '2018-07-07 00:00:00', '', ''),
(2, 'bruno', 'email@email.com2', '123', '2018-07-15 14:07:04', '', ''),
(5, 'bruno', 'email@email.com3', '123', '2018-07-16 17:39:41', '', ''),
(6, 'bruno', 'email@email.com4', '202cb962ac59075b964b07152d234b70', '2018-07-17 10:46:19', '18fac4f287e769cafd390160bbcd2c1f.jpg', '06db62e9b21e6fc8c5c5237de8e413ee.png'),
(7, 'bruno', 'email@email.com7', '202cb962ac59075b964b07152d234b70', '2018-07-21 12:02:02', '', ''),
(8, 'bruno', 'email@email11.com', '202cb962ac59075b964b07152d234b70', '2018-07-24 19:27:30', '', ''),
(9, 'Jarara', 'email@email1', '202cb962ac59075b964b07152d234b70', '2018-08-06 13:05:22', '', ''),
(10, 'Brisa', 'brisa@brisa', '202cb962ac59075b964b07152d234b70', '2018-08-11 18:43:09', '5067a68872ae5e03de95744515276f0e.jpg', '56c5efba8c0a19abab75566eb4a5b2a3.jpg');

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
