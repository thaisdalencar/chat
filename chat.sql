-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 24/02/2015 às 22:03
-- Versão do servidor: 5.6.14
-- Versão do PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `chat`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `msg`
--

CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `msg` varchar(100) NOT NULL,
  `id_from` int(10) NOT NULL,
  `id_to` int(10) NOT NULL,
  `data_de_envio` varchar(200) NOT NULL,
  `msg_lida` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=234 ;

--
-- Fazendo dump de dados para tabela `msg`
--

INSERT INTO `msg` (`id`, `msg`, `id_from`, `id_to`, `data_de_envio`, `msg_lida`) VALUES
(188, 'ola', 2, 3, '12/08/2014 14:26:41', 0),
(189, 'carlos', 2, 3, '12/08/2014 14:28:05', 0),
(190, 'ana', 2, 1, '12/08/2014 14:28:07', 0),
(191, 'ana > bia', 1, 2, '12/08/2014 14:29:58', 0),
(192, 'ana > carlos', 1, 3, '12/08/2014 14:30:03', 0),
(193, 'carlos > ana', 3, 1, '12/08/2014 14:30:16', 0),
(194, 'carlos > bia', 3, 2, '12/08/2014 14:30:23', 0),
(195, 'bia > ana', 2, 1, '12/08/2014 14:30:36', 0),
(196, 'bia > carlos', 2, 3, '12/08/2014 14:30:41', 0),
(224, 'a', 3, 1, '13/08/2014 16:57:04', 0),
(225, 'a', 3, 2, '13/08/2014 16:57:10', 0),
(226, 'adad', 3, 1, '13/08/2014 16:58:19', 0),
(227, 'aza', 1, 2, '13/08/2014 17:06:19', 1),
(228, 'iajsiajs', 2, 3, '14/08/2014 14:59:56', 0),
(229, 'ola masajs', 2, 3, '14/08/2014 15:00:23', 0),
(230, 'sijaisj', 3, 2, '14/08/2014 15:00:42', 0),
(231, 'ola mundo', 3, 1, '01/09/2014 13:59:07', 1),
(232, 'ola', 3, 1, '28/01/2015 17:58:32', 1),
(233, 'ola mundo', 3, 2, '29/01/2015 12:22:07', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `logado` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome`, `email`, `senha`, `logado`) VALUES
(1, 'ana', 'ana@email.com', '123456', 0),
(2, 'bia', 'bia@email.com', '654321', 0),
(3, 'carlos', 'carlos@email.com', '123456', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
