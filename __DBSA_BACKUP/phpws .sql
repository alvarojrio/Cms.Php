-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Mar-2015 às 15:26
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpws`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `plan_prod`
--

CREATE TABLE IF NOT EXISTS `plan_prod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) DEFAULT NULL,
  `prod_qnt` varchar(255) DEFAULT NULL,
  `img_prod` varchar(255) DEFAULT NULL,
  `cod_unico` varchar(255) DEFAULT NULL,
  `descricao_prod` varchar(255) DEFAULT NULL,
  `prod_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `plan_prod`
--

INSERT INTO `plan_prod` (`id`, `prod_name`, `prod_qnt`, `img_prod`, `cod_unico`, `descricao_prod`, `prod_time`) VALUES
(6, 'Yii', NULL, NULL, 'I0i0i', '<p> Produto Unico ótimo</p>', '2015-03-21 05:00:29'),
(7, 'Xbox One', NULL, NULL, 'oioioio', '<p> Produto Unico ótimo</p>', '2015-03-21 05:00:28'),
(8, 'Telefone', NULL, NULL, '9090', '<p> Produto Unico ótimo</p>', '2015-03-21 05:00:24'),
(9, 'Xbox', NULL, NULL, '9090', '<p> Produto Unico ótimo</p>', '2015-03-21 05:00:21'),
(10, 'Play 4', NULL, 'nao foi', 't6t6', '<p> Produto Unico ótimo</p>', '2015-03-21 05:00:18'),
(11, 'Carro', NULL, 'nao foi', 'uouououo', '<p> Produto Unico ótimo</p>', '2015-03-21 05:00:06'),
(12, 'Moto', NULL, 'nao foi', 'rrrrrrrrrrrrrrrr', '<p> Produto Unico ótimo</p>', '2015-03-21 05:00:12'),
(13, 'Moto g', NULL, '', 'eeeeeeeeeeeeeeeeeeeeeee', '<p> Produto Unico ótimo</p>', '2015-03-21 05:00:04'),
(14, 'Copos', NULL, '', 'OOOOOOOOOOOO', '<p> Produto Unico ótimo</p>', '2015-03-21 05:00:04'),
(15, 'Monitores', NULL, 'images/2015/03/footer-logo.png', 'OOOOOOOOOOOOOO', '<p> Produto Unico ótimo</p>', '2015-03-21 05:00:03'),
(16, 'Nitendo', NULL, '', '00000000000000000', '<p> Produto Unico ótimo</p>', '2015-03-21 05:00:03'),
(17, 'Mouse', NULL, '', '5555555555555555', '<p> Produto Unico ótimo</p>', '2015-03-21 05:00:02'),
(18, 'Mac book', NULL, 'images/2015/03/header-search-btn.png', 'TTTTTTTTTTTTT', '<p> Produto Unico ótimo</p>', '2015-03-21 05:00:00'),
(19, 'Livros', NULL, '', 'OIOIOI', '<p> Produto Unico ótimo</p>', '2015-03-21 04:59:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio`
--

CREATE TABLE IF NOT EXISTS `relatorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qnt_vendas` varchar(255) DEFAULT NULL,
  `id_prod` varchar(255) DEFAULT NULL,
  `mes` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `relatorio`
--

INSERT INTO `relatorio` (`id`, `qnt_vendas`, `id_prod`, `mes`) VALUES
(3, '54', '9', '2015-03-01'),
(8, '11', '10', '2015-01-04'),
(9, '121', '13', '2015-02-01'),
(21, '1', '16', '2015-03-04'),
(22, '3', '19', '2015-04-01'),
(23, '2', '18', '2015-04-01'),
(24, '27', '499', '2015-03-04'),
(28, '2', '6', '2015-03-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ws_categories`
--

CREATE TABLE IF NOT EXISTS `ws_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_parent` int(11) DEFAULT NULL,
  `category_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `category_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `category_content` text CHARACTER SET latin1,
  `category_date` timestamp NULL DEFAULT NULL,
  `category_views` decimal(10,0) DEFAULT NULL,
  `category_last_view` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `ws_categories`
--

INSERT INTO `ws_categories` (`category_id`, `category_parent`, `category_name`, `category_title`, `category_content`, `category_date`, `category_views`, `category_last_view`) VALUES
(1, NULL, 'noticias', 'Notícias', 'Notícias sobre o mundo da tecnologia, esportes, eventos e tudo que aconteceu você encontra aqui! Conteúdo de primeira para você ficar por dentro das últimas! Cidade Online, o seu portal da cidade!', '2014-03-31 10:14:13', '16', '2014-04-02 09:46:37'),
(2, 1, 'aconteceu', 'Aconteceu', 'Fique por dentro das notícias sobre o que aconteceu na sua Cidade Online! Acompanhe diariamente as notícias quentes que acontecem perto de você. Tudo sobre tudo e nossa missão de escrita!', '2014-03-31 10:14:47', '3', '2014-04-01 08:52:13'),
(3, 1, 'eventos', 'Eventos', 'Acompanhe notícias sobre eventos e baladas que rolam perto de você. Confira aqui na sua Cidade Online! Vai ter um show? Um jantar especial? Um Evento comemorativo? Agente cobre tudo e posta de primeira aqui no seu portal de notícias!', '2014-03-31 10:15:29', '6', '2014-04-01 21:37:15'),
(5, 1, 'esportes', 'Esportes', 'Fique por dentro do que rola no seu esporte. Vida saudável? Alimentação? Tudo relacionado aqui no Cidade Online! Veja mais sobre futebol, vôlei, natação, formula 1 e muito mais!', '2014-03-31 10:13:30', '6', '2014-04-01 21:37:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ws_siteviews`
--

CREATE TABLE IF NOT EXISTS `ws_siteviews` (
  `siteviews_id` int(11) NOT NULL AUTO_INCREMENT,
  `siteviews_date` date NOT NULL,
  `siteviews_users` decimal(10,0) NOT NULL,
  `siteviews_views` decimal(10,0) NOT NULL,
  `siteviews_pages` decimal(10,0) NOT NULL,
  PRIMARY KEY (`siteviews_id`),
  KEY `idx_1` (`siteviews_date`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `ws_siteviews`
--

INSERT INTO `ws_siteviews` (`siteviews_id`, `siteviews_date`, `siteviews_users`, `siteviews_views`, `siteviews_pages`) VALUES
(1, '2014-01-08', '9', '19', '183'),
(4, '2014-01-09', '1', '1', '5'),
(5, '2014-01-12', '4', '4', '15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ws_siteviews_agent`
--

CREATE TABLE IF NOT EXISTS `ws_siteviews_agent` (
  `agent_id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `agent_views` decimal(10,0) NOT NULL,
  `agent_lastview` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`agent_id`),
  KEY `idx_1` (`agent_name`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `ws_siteviews_agent`
--

INSERT INTO `ws_siteviews_agent` (`agent_id`, `agent_name`, `agent_views`, `agent_lastview`) VALUES
(1, 'Chrome', '122', '2014-02-12 18:13:03'),
(2, 'Firefox', '68', '2014-02-12 18:13:06'),
(3, 'IE', '55', '2014-02-12 18:13:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ws_siteviews_online`
--

CREATE TABLE IF NOT EXISTS `ws_siteviews_online` (
  `online_id` int(11) NOT NULL AUTO_INCREMENT,
  `online_session` varchar(255) CHARACTER SET latin1 NOT NULL,
  `online_startview` timestamp NULL DEFAULT NULL,
  `online_endview` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `online_ip` varchar(255) CHARACTER SET latin1 NOT NULL,
  `online_url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `online_agent` varchar(255) CHARACTER SET latin1 NOT NULL,
  `agent_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`online_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `ws_siteviews_online`
--

INSERT INTO `ws_siteviews_online` (`online_id`, `online_session`, `online_startview`, `online_endview`, `online_ip`, `online_url`, `online_agent`, `agent_name`) VALUES
(1, 'r56vjtp4b78m9ritae7pf1np86', '2014-01-12 09:30:11', '2014-01-12 11:00:40', '127.0.0.1', '/cursos/ws_php/modulos/10-mvc-conceitos-e-utilizacao/03-construindo-auxiliar-de-visao.php', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', 'Chrome'),
(2, '7cb8i06ak42imogdqbj8u6v130', '2014-01-12 10:40:22', '2014-01-12 11:00:22', '127.0.0.1', '/cursos/ws_php/modulos/10-mvc-conceitos-e-utilizacao/03-construindo-auxiliar-de-visao.php', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0', 'Firefox'),
(3, 'vgdm7251ftruqn64h5t6b26j06', '2014-01-12 10:40:28', '2014-01-12 11:00:30', '127.0.0.1', '/cursos/ws_php/modulos/10-mvc-conceitos-e-utilizacao/03-construindo-auxiliar-de-visao.php', 'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko', 'IE'),
(4, 'l1noajtapf2d90j2mcnkguu0j1', '2014-01-12 10:40:47', '2014-01-12 12:23:30', '127.0.0.1', '/cursos/ws_php/modulos/10-mvc-conceitos-e-utilizacao/03-construindo-auxiliar-de-visao.php', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', 'Chrome'),
(5, 'odot1pd8pj0dstoon8evr8ls65', '2015-03-21 17:46:40', '2015-03-21 18:46:22', '127.0.0.1', '/projeto/', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36', 'Chrome');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ws_users`
--

CREATE TABLE IF NOT EXISTS `ws_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_lastname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_registration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_lastupdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_level` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `ws_users`
--

INSERT INTO `ws_users` (`user_id`, `user_name`, `user_lastname`, `user_email`, `user_password`, `user_registration`, `user_lastupdate`, `user_level`) VALUES
(1, 'Alvaro', 'Junior', 'alvaro@online.com.br', 'e10adc3949ba59abbe56e057f20f883e', '2014-02-11 13:14:04', '2015-02-11 23:30:45', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
