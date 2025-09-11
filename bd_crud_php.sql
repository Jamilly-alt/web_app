-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Set-2025 às 19:12
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_crud_php`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(30) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `tipo` char(1) NOT NULL,
  `quant_acesso` int(11) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`login`, `senha`, `nome`, `tipo`, `quant_acesso`, `status`) VALUES
('jamillota@gmail.com', '$2y$10$A47nnDoBxsDMCsoEochVFeA60t2mloBiyWmrkA6TsuQnw.LDqNLDS', 'jamilly', 'U', 0, 'A'),
('jamilly@gmail.com', '$2y$10$6EJPkMknzYQFT7nVe4HG..DvATbBDPxuvWT7zuJRElsVlmJjdcy6y', 'jamilly', 'A', 3, 'B'),
('jamillybrito847@gmail.com', '$2y$10$WNdmFef.6qXZ5YlO3zf4tODN4GPepDVh4hmNx/DEhzQs0KKZqo1U.', 'jamilly', 'U', 0, 'A'),
('jamillybrito@gmail.com', '$2y$10$UYw8Q/tiiydhlxxm8bZmZeAGmD35HDh6rBgYQf/oxMO8g9kAmXqV2', 'jamilly', 'A', 0, 'A');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
