-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Jan-2022 às 20:23
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `match`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_alunos`
--

DROP TABLE IF EXISTS `tb_alunos`;
CREATE TABLE IF NOT EXISTS `tb_alunos` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `txt_nome` varchar(70) DEFAULT NULL,
  `txt_email` varchar(70) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `fk_id_status` int(11) DEFAULT NULL,
  `dt_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`pk_id`),
  KEY `fk_id_status` (`fk_id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_alunos`
--

INSERT INTO `tb_alunos` (`pk_id`, `txt_nome`, `txt_email`, `dt_nascimento`, `fk_id_status`, `dt_registro`) VALUES
(1, 'Maria', 'maria@teste.com', '2000-01-12', 1, '2022-01-29 20:29:53'),
(3, 'Milton', 'milton@teste.com', '2006-01-01', 2, '2022-01-30 10:36:00'),
(5, 'Hamilton', 'a@a.com', '1983-01-01', 1, '2022-01-30 12:59:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cursos`
--

DROP TABLE IF EXISTS `tb_cursos`;
CREATE TABLE IF NOT EXISTS `tb_cursos` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `txt_titulo` varchar(70) DEFAULT NULL,
  `txt_descricao` varchar(70) DEFAULT NULL,
  `dt_inicio` date DEFAULT NULL,
  `dt_fim` date DEFAULT NULL,
  `dt_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cursos`
--

INSERT INTO `tb_cursos` (`pk_id`, `txt_titulo`, `txt_descricao`, `dt_inicio`, `dt_fim`, `dt_registro`) VALUES
(2, 'Excel', 'Avançado', '2022-01-21', '2022-02-08', '2022-01-29 20:27:25'),
(3, 'PHP', 'Avançado', '2022-03-01', '2022-03-20', '2022-01-30 10:34:55'),
(4, 'Javascript', 'Intermediario', '2022-01-01', '2022-01-20', '2022-01-30 10:40:11'),
(5, 'POWER BI', 'BASICO', '2022-03-01', '2022-04-01', '2022-01-30 12:15:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_matriculas`
--

DROP TABLE IF EXISTS `tb_matriculas`;
CREATE TABLE IF NOT EXISTS `tb_matriculas` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_curso` int(11) DEFAULT NULL,
  `fk_id_aluno` int(11) DEFAULT NULL,
  `fk_id_usuario` int(11) DEFAULT NULL,
  `dt_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`pk_id`),
  KEY `fk_id_curso` (`fk_id_curso`),
  KEY `fk_id_aluno` (`fk_id_aluno`),
  KEY `fk_id_usuario` (`fk_id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_matriculas`
--

INSERT INTO `tb_matriculas` (`pk_id`, `fk_id_curso`, `fk_id_aluno`, `fk_id_usuario`, `dt_registro`) VALUES
(34, 3, 1, 1, '2022-01-30 12:44:46'),
(36, 5, 1, 1, '2022-01-30 12:45:13'),
(38, 3, 5, 1, '2022-01-30 12:59:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status`
--

DROP TABLE IF EXISTS `tb_status`;
CREATE TABLE IF NOT EXISTS `tb_status` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `txt_status` varchar(70) DEFAULT NULL,
  `dt_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_status`
--

INSERT INTO `tb_status` (`pk_id`, `txt_status`, `dt_registro`) VALUES
(1, 'ATIVADO', '2022-01-29 14:50:37'),
(2, 'DESATIVADO', '2022-01-29 14:50:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `txt_nome` varchar(70) DEFAULT NULL,
  `txt_email` varchar(70) DEFAULT NULL,
  `fk_id_status` int(11) DEFAULT NULL,
  `dt_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`pk_id`),
  KEY `fk_id_status` (`fk_id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`pk_id`, `txt_nome`, `txt_email`, `fk_id_status`, `dt_registro`) VALUES
(1, 'Hamilton', 'hamilton@teste.com', 1, '2022-01-29 20:37:41'),
(5, 'adm', 'adm@a.com', 1, '2022-01-30 13:52:13'),
(6, 'Hamilton', 'adm@a.com', 1, '2022-01-30 13:53:20');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  ADD CONSTRAINT `tb_alunos_ibfk_1` FOREIGN KEY (`fk_id_status`) REFERENCES `tb_status` (`pk_id`);

--
-- Limitadores para a tabela `tb_matriculas`
--
ALTER TABLE `tb_matriculas`
  ADD CONSTRAINT `tb_matriculas_ibfk_1` FOREIGN KEY (`fk_id_curso`) REFERENCES `tb_cursos` (`pk_id`),
  ADD CONSTRAINT `tb_matriculas_ibfk_2` FOREIGN KEY (`fk_id_aluno`) REFERENCES `tb_alunos` (`pk_id`),
  ADD CONSTRAINT `tb_matriculas_ibfk_3` FOREIGN KEY (`fk_id_usuario`) REFERENCES `tb_usuarios` (`pk_id`);

--
-- Limitadores para a tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`fk_id_status`) REFERENCES `tb_status` (`pk_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
