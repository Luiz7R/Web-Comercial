-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jun-2020 às 02:49
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `web1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `nomeProduto` varchar(255) NOT NULL,
  `precoProduto` int(11) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `precoTotal` int(11) NOT NULL,
  `codigoProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `criado` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`, `endereco`, `usuario_id`, `criado`, `modificado`, `status`) VALUES
(3, 'joao', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-12 21:27:02', '2020-03-12 21:27:02', '1'),
(4, 'joao', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MGGG', 0, '2020-03-12 21:28:03', '2020-03-12 21:28:03', '1'),
(5, 'joao', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-12 21:45:05', '2020-03-12 21:45:05', '1'),
(6, 'joao', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-12 21:45:43', '2020-03-12 21:45:43', '1'),
(7, 'joao', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-12 21:46:20', '2020-03-12 21:46:20', '1'),
(8, 'joao', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-12 21:46:51', '2020-03-12 21:46:51', '1'),
(9, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-12 21:49:25', '2020-03-12 21:49:25', '1'),
(10, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-12 21:50:30', '2020-03-12 21:50:30', '1'),
(11, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-12 21:52:14', '2020-03-12 21:52:14', '1'),
(12, 'joao', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-12 21:55:46', '2020-03-12 21:55:46', '1'),
(13, 'joao', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-12 21:56:22', '2020-03-12 21:56:22', '1'),
(14, 'joao', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-13 19:28:28', '2020-03-13 19:28:28', '1'),
(15, 'caixa', 'teste2@teste.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-20 21:45:54', '2020-03-20 21:45:54', '1'),
(16, 'caixa', 'teste2@teste.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-20 22:01:24', '2020-03-20 22:01:24', '1'),
(17, 'caixa12312', 'joao2223@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-21 13:49:37', '2020-03-21 13:49:37', '1'),
(18, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-21 13:52:32', '2020-03-21 13:52:32', '1'),
(19, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-21 14:01:15', '2020-03-21 14:01:15', '1'),
(20, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-21 14:08:21', '2020-03-21 14:08:21', '1'),
(21, 'joao', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-21 14:19:48', '2020-03-21 14:19:48', '1'),
(22, 'caixasadfsd', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-21 14:20:30', '2020-03-21 14:20:30', '1'),
(23, 'caixaewqe', 'joao@joao.com', '940028922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-21 14:23:48', '2020-03-21 14:23:48', '1'),
(24, 'caix', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-21 14:24:17', '2020-03-21 14:24:17', '1'),
(25, 'caix', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-21 14:26:10', '2020-03-21 14:26:10', '1'),
(26, 'caix', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-21 14:26:45', '2020-03-21 14:26:45', '1'),
(27, 'caix', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-21 14:39:45', '2020-03-21 14:39:45', '1'),
(28, 'caixadsfds', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-21 14:40:32', '2020-03-21 14:40:32', '1'),
(29, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-21 14:41:10', '2020-03-21 14:41:10', '1'),
(30, 'caixarer', 'joaorewrwe@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2020-03-21 15:30:21', '2020-03-21 15:30:21', '1'),
(31, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(32, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(33, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '2024-03-20 00:00:00', '2024-03-20 00:00:00', '1'),
(34, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(35, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(36, 'caixa', 'teste2@teste.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(37, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(38, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(39, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(40, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(41, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(42, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(43, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(44, 'joao', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(45, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(46, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(47, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(48, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(49, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(50, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(51, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(52, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(53, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(54, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(55, 'caxa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(56, 'Exemplo de produto', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(57, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(58, 'caixa', 'teste@teste.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(59, 'caxa', 'teste@teste.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(60, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(61, 'caixa', 'luiz.lorinhow@hotmail.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(62, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(63, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(64, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(65, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(66, 'caix', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(67, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(68, 'caix', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(69, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2024-03-20 00:00:00', '1'),
(70, 'joao3 321', 'joao@joao.com', '940028922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2025-03-20 00:00:00', '1'),
(71, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2025-03-20 00:00:00', '1'),
(72, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2025-03-20 00:00:00', '1'),
(73, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2025-03-20 00:00:00', '1'),
(74, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2025-03-20 00:00:00', '1'),
(75, 'caixa', 'teste@teste.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2029-03-20 00:00:00', '1'),
(76, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2029-03-20 00:00:00', '1'),
(77, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2029-03-20 00:00:00', '1'),
(78, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2029-03-20 00:00:00', '1'),
(79, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2029-03-20 00:00:00', '1'),
(80, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2029-03-20 00:00:00', '1'),
(81, 'Joao', 'joao@joao.com', '940028922', 'Av F , Bairro G - BH', 0, '0000-00-00 00:00:00', '2013-04-20 00:00:00', '1'),
(82, 'Joao', 'joao@joao.com', '940028922', 'Av F , Bairro G - BH', 0, '0000-00-00 00:00:00', '2013-04-20 00:00:00', '1'),
(83, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2016-04-20 00:00:00', '1'),
(84, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(85, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(86, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(87, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(88, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(89, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(90, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(91, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(92, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(93, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(94, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(95, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(96, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(97, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(98, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(99, 'caixa', 'joao1@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2020-04-20 00:00:00', '1'),
(100, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2021-04-20 00:00:00', '1'),
(101, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2021-04-20 00:00:00', '1'),
(102, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2021-04-20 00:00:00', '1'),
(121, 'joao', 'joao@joao.com', '40028922', 'BR-356, 3049 - Belvedere, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2026-04-20 00:00:00', '1'),
(122, 'Teste Cax joao', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2014-05-20 00:00:00', '1'),
(123, 'caixa', 'teste@teste.com', '22222222222', '2222222222222222222', 0, '0000-00-00 00:00:00', '2014-05-20 00:00:00', '1'),
(124, 'caixa', 'teste@teste.com', '22222222222', '2222222222222222222', 0, '0000-00-00 00:00:00', '2014-05-20 00:00:00', '1'),
(125, 'caixa', 'joao@joao.com', '22222222222', '2222222222222222222', 0, '0000-00-00 00:00:00', '2015-05-20 00:00:00', '1'),
(126, 'Exemplo de produto', 'luizmiguel27@yahoo.com.br', '(31) 94002-8922', '2222222222222222222', 0, '0000-00-00 00:00:00', '2015-05-20 00:00:00', '1'),
(127, 'caixa', 'joao@joao.com', '22222222222', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2015-05-20 00:00:00', '1'),
(128, 'caixa', 'maria@maria.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2021-05-20 00:00:00', '1'),
(129, 'caxa', 'maria@maria.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2021-05-20 00:00:00', '1'),
(130, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2021-05-20 00:00:00', '1'),
(131, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2021-05-20 00:00:00', '1'),
(132, 'Chinelo X', 'teste@teste.com', '22222222222', 'Belvedere', 0, '0000-00-00 00:00:00', '2021-05-20 00:00:00', '1'),
(133, 'Chinelo X', 'teste@teste.com', '22222222222', '2222222222222222222', 0, '0000-00-00 00:00:00', '2021-05-20 00:00:00', '1'),
(134, 'joao', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2007-06-20 00:00:00', '1'),
(135, 'caixa', 'joao@joao.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2007-06-20 00:00:00', '1'),
(136, 'joao', 'teste2@teste.com', '940028922', '', 0, '0000-00-00 00:00:00', '2007-06-20 00:00:00', '1'),
(137, 'caixa', 'maria@maria.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2007-06-20 00:00:00', '1'),
(138, 'joao', 'maria@maria.com', '(31) 94002-8922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG', 0, '0000-00-00 00:00:00', '2007-06-20 00:00:00', '1'),
(139, 'maria', '', '', 'Belvedere', 0, '0000-00-00 00:00:00', '2007-06-20 00:00:00', '1'),
(140, 'maria', '', '', 'BR-356, 3049 - Belvedere, Belo Horizonte - MG, 30320-900', 0, '0000-00-00 00:00:00', '2007-06-20 00:00:00', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_pedidos`
--

CREATE TABLE `lista_pedidos` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `nome_cliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantidade` int(5) NOT NULL,
  `sub_total` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `lista_pedidos`
--

INSERT INTO `lista_pedidos` (`id`, `id_pedido`, `id_produto`, `nome_cliente`, `quantidade`, `sub_total`) VALUES
(97, 70, 39, '', 2, 60.00),
(98, 70, 7, '', 2, 2300.00),
(99, 70, 8, '', 1, 1250.00),
(103, 73, 39, '', 5, 150.00),
(104, 73, 8, '', 5, 6250.00),
(105, 73, 7, '', 4, 4600.00),
(106, 74, 1, '', 2, 900.00),
(107, 75, 39, '', 2, 60.00),
(108, 75, 8, '', 4, 5000.00),
(109, 75, 7, '', 5, 5750.00),
(110, 75, 6, '', 6, 4500.00),
(111, 75, 4, '', 44, 55000.00),
(112, 76, 8, '', 2, 2500.00),
(113, 77, 8, '', 5, 6250.00),
(114, 78, 1, '', 5, 2250.00),
(118, 81, 39, '', 5, 150.00),
(122, 84, 6, '', 3, 2250.00),
(123, 84, 5, '', 3, 1050.00),
(124, 85, 1, '', 2, 900.00),
(125, 85, 3, '', 3, 3750.00),
(126, 85, 39, '', 2, 60.00),
(127, 86, 39, '', 2, 60.00),
(128, 86, 1, '', 2, 900.00),
(129, 87, 1, '', 2, 900.00),
(136, 91, 1, '', 2, 900.00),
(137, 92, 1, '', 2, 900.00),
(138, 93, 1, '', 2, 900.00),
(139, 93, 6, '', 2, 1500.00),
(140, 93, 7, '', 2, 2300.00),
(141, 93, 39, '', 2, 60.00),
(142, 93, 5, '', 2, 700.00),
(150, 99, 2, '', 1, 850.00),
(151, 100, 3, '', 1, 1250.00),
(183, 115, 2, '', 1, 850.00),
(184, 115, 3, '', 2, 2500.00),
(185, 115, 4, '', 1, 1250.00),
(186, 115, 1, '', 1, 450.00),
(187, 115, 39, '', 1, 30.00),
(188, 116, 1, '', 1, 450.00),
(189, 116, 2, '', 1, 850.00),
(190, 116, 3, '', 1, 1250.00),
(191, 116, 4, '', 2, 2500.00),
(192, 116, 6, '', 1, 750.00),
(193, 116, 39, '', 1, 30.00),
(194, 117, 1, '', 1, 450.00),
(195, 117, 2, '', 1, 850.00),
(196, 117, 3, '', 2, 2500.00),
(197, 117, 4, '', 1, 1250.00),
(198, 117, 39, '', 1, 30.00),
(199, 117, 8, '', 1, 1250.00),
(200, 118, 8, '', 1, 1250.00),
(201, 119, 3, '', 1, 1250.00),
(203, 5557, 2, '', 1, 850.00),
(204, 5557, 3, '', 1, 1250.00),
(205, 5557, 4, '', 1, 1250.00),
(206, 5557, 6, '', 1, 750.00),
(210, 5560, 2, '', 1, 850.00),
(211, 5561, 1, '', 3, 1350.00),
(212, 5562, 1, '', 1, 450.00),
(213, 5563, 4, '', 1, 1250.00),
(214, 5564, 1, '', 1, 450.00),
(215, 5564, 4, '', 2, 2500.00),
(216, 5565, 2, '', 1, 850.00),
(217, 5565, 1, '', 1, 450.00),
(218, 5565, 39, '', 1, 30.00),
(219, 5565, 7, '', 1, 1150.00),
(220, 5566, 1, '', 1, 450.00),
(221, 5567, 1, '', 1, 450.00),
(222, 5567, 3, '', 1, 1250.00),
(223, 5567, 4, '', 1, 1250.00),
(224, 5568, 1, '', 1, 450.00),
(225, 5568, 3, '', 2, 2500.00),
(226, 5568, 4, '', 1, 1250.00),
(227, 5569, 1, '', 1, 450.00),
(228, 5569, 3, '', 1, 1250.00),
(229, 5569, 4, '', 1, 1250.00),
(230, 5570, 1, '', 1, 450.00),
(231, 5570, 3, '', 1, 1250.00),
(232, 5570, 4, '', 1, 1250.00),
(233, 5571, 2, '', 1, 850.00),
(234, 5571, 3, '', 2, 2500.00),
(235, 5571, 4, '', 2, 2500.00),
(236, 5571, 39, '', 2, 60.00),
(237, 5571, 8, '', 1, 1250.00),
(238, 5571, 1, '', 1, 450.00),
(239, 5572, 2, '', 1, 850.00),
(240, 5572, 6, '', 1, 750.00),
(241, 5573, 2, '', 2, 1700.00),
(242, 5573, 1, '', 1, 450.00),
(243, 5573, 3, '', 1, 1250.00),
(245, 5575, 1, '', 1, 450.00),
(249, 5578, 5, '', 1, 350.00),
(250, 5579, 2, '', 1, 850.00),
(251, 5579, 1, '', 1, 450.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `total` float(10,2) NOT NULL,
  `observacao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `order_date` date NOT NULL,
  `modificado` date NOT NULL,
  `payment_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status_pedido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nome_cliente` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `total`, `observacao`, `order_date`, `modificado`, `payment_status`, `status_pedido`, `nome_cliente`, `usuario_id`) VALUES
(70, 3610.00, '', '2020-03-24', '2024-03-20', 'Cheque', '', '', 3),
(73, 11000.00, 'AirImpact', '2020-03-25', '0000-00-00', 'Dinheiro', '', '', 70),
(74, 900.00, 'AirImpact', '2020-03-25', '0000-00-00', 'Dinheiro', '', '', 71),
(75, 70310.00, 'AirImpact', '2020-03-25', '0000-00-00', 'Cheque', '', '', 3),
(76, 2500.00, 'AirImpact', '2020-03-25', '0000-00-00', 'Dinheiro', '', '', 73),
(77, 6250.00, 'AirImpact', '2020-03-25', '0000-00-00', 'Dinheiro', '', '', 3),
(78, 2250.00, 'AirImpact', '2020-03-29', '0000-00-00', 'Dinheiro', '', '', 75),
(81, 150.00, 'AirImpact', '2020-03-29', '0000-00-00', 'Dinheiro', '', '', 78),
(84, 3300.00, 'AirImpact', '2020-04-13', '0000-00-00', 'Dinheiro', '', '', 81),
(85, 4710.00, 'AirImpact', '2020-04-13', '0000-00-00', 'Dinheiro', '', '', 82),
(86, 960.00, 'AirImpact', '2020-04-16', '0000-00-00', 'Dinheiro', '', '', 83),
(87, 900.00, 'AirImpact', '2020-04-20', '0000-00-00', 'Dinheiro', '', '', 84),
(91, 900.00, 'AirImpact', '2020-04-20', '0000-00-00', 'Dinheiro', '', '', 89),
(92, 900.00, 'AirImpact', '2020-04-20', '0000-00-00', 'Dinheiro', '', '', 91),
(93, 5460.00, 'AirImpact', '2020-04-20', '0000-00-00', 'Cartão', '', '', 3),
(99, 850.00, 'AirImpact', '2020-04-20', '0000-00-00', 'Dinheiro', '', '', 98),
(100, 1250.00, 'AirImpact', '2020-04-20', '0000-00-00', 'Cartão', '', '', 99),
(101, 880.00, 'AirImpact', '2020-04-21', '0000-00-00', 'Dinheiro', '', '', 3),
(102, 880.00, 'AirImpact', '2020-04-21', '0000-00-00', 'Cartão', '', '', 3),
(104, 880.00, 'AirImpact', '2020-04-22', '0000-00-00', 'Dinheiro', '', '', 3),
(105, 900.00, 'AirImpact', '2020-04-22', '0000-00-00', 'Dinheiro', '', '', 3),
(106, 5900.00, 'AirImpact', '2020-04-22', '0000-00-00', 'Dinheiro', '', '', 3),
(107, 5900.00, 'AirImpact', '2020-04-22', '0000-00-00', 'Dinheiro', '', '', 3),
(115, 5080.00, ' Produto : Chinelo X Quantidade : 1\r\n', '2020-04-16', '0000-00-00', 'Cartão', '', '', 3),
(116, 5830.00, ' Produto : Nike AS Quantidade : 1\r\n Produto : Adidas AD Quantidade : 1\r\n Produto : Nike AS-X Quantidade : 1\r\n Produto : Adidas AD-X Quantidade : 2\r\n Produto : Olympikus LY Quantidade : 1', '2020-04-21', '0000-00-00', 'Cartão', '', '', 3),
(117, 6330.00, ' Produto : Nike AS Quantidade : 1 Preço : R$ 450,00\r\n Produto : Adidas AD Quantidade : 1 Preço : R$ 850,00\r\n Produto : Nike AS-X Quantidade : 2 Preço : R$ 2.500,00\r\n Produto : Adidas AD-X Quantidade : 1 Preço : R$ 1.250,00\r\n Produto : Chinelo X Quantidade : 1 Preço : R$ 30,00\r\n Produto : Olympikus LAD-X Quantidade : 1 Preço : R$ 1.250,00\r\n', '2020-04-17', '0000-00-00', 'Cartão', '', '', 3),
(118, 1250.00, ' Produto : Olympikus LAD-X Quantidade : 1 Preço : R$ 1.250,00\r\n', '2020-04-25', '2020-04-26', 'Cartão', '', '', 3),
(119, 1250.00, ' Produto : Nike AS-X Quantidade : 1 Preço : R$ 1.250,00\r\n', '2020-04-26', '2020-04-26', 'Cartão', '', '', 3),
(444, 0.00, 'fdgdfgdfg', '2020-02-25', '0000-00-00', 'Dinheiro', '', '', 3),
(445, 0.00, 'asdasd', '2020-02-28', '0000-00-00', 'Cheque', '', '', 3),
(5557, 4100.00, ' Produto : Adidas AD Quantidade : 1 Preço : R$ 850,00\r\n Produto : Nike AS-X Quantidade : 1 Preço : R$ 1.250,00\r\n Produto : Adidas AD-X Quantidade : 1 Preço : R$ 1.250,00\r\n Produto : Olympikus LY Quantidade : 1 Preço : R$ 750,00\r\n', '2020-05-14', '2020-05-14', 'Cartão', '', '', 3),
(5560, 850.00, ' Produto : Adidas AD Quantidade : 1 Preço : R$ 850,00\r\n', '2020-05-15', '2020-05-15', 'Cartão', '', '', 3),
(5561, 1350.00, ' Produto : Nike AS Quantidade : 3 Preço : R$ 1.350,00\r\n', '2020-05-15', '2020-05-15', 'Dinheiro', '', '', 3),
(5562, 450.00, ' Produto : Nike AS Quantidade : 1 Preço : R$ 450,00\r\n', '2020-05-21', '2020-05-21', 'Cartão', '', '', 4),
(5563, 1250.00, ' Produto : Adidas AD-X Quantidade : 1 Preço : R$ 1.250,00\r\n', '2020-05-21', '2020-05-21', '', '', '', 4),
(5564, 2950.00, ' Produto : Nike AS Quantidade : 1 Preço : R$ 450,00\r\n Produto : Adidas AD-X Quantidade : 2 Preço : R$ 2.500,00\r\n', '2020-05-21', '2020-05-21', 'Cartão', '', '', 4),
(5565, 2480.00, ' Produto : Adidas AD Quantidade : 1 Preço : R$ 850,00\r\n Produto : Nike AS Quantidade : 1 Preço : R$ 450,00\r\n Produto : Chinelo X Quantidade : 1 Preço : R$ 30,00\r\n Produto : Olympikus LAS-X Quantidade : 1 Preço : R$ 1.150,00\r\n', '2020-05-21', '2020-05-21', 'Cartão', '', '', 4),
(5566, 450.00, ' Produto : Nike AS Quantidade : 1 Preço : R$ 450,00\r\n', '2020-05-21', '2020-05-21', 'Cartão', '', '', 4),
(5567, 2950.00, ' Produto : Nike AS Quantidade : 1 Preço : R$ 450,00\r\n Produto : Nike AS-X Quantidade : 1 Preço : R$ 1.250,00\r\n Produto : Adidas AD-X Quantidade : 1 Preço : R$ 1.250,00\r\n', '2020-06-07', '2020-06-07', '', '', '', 3),
(5568, 4200.00, ' Produto : Nike AS Quantidade : 1 Preço : R$ 450,00\r\n Produto : Nike AS-X Quantidade : 2 Preço : R$ 2.500,00\r\n Produto : Adidas AD-X Quantidade : 1 Preço : R$ 1.250,00\r\n', '2020-06-07', '2020-06-07', 'Cartão', '', '', 3),
(5569, 2950.00, ' Produto : Nike AS Quantidade : 1 Preço : R$ 450,00\r\n Produto : Nike AS-X Quantidade : 1 Preço : R$ 1.250,00\r\n Produto : Adidas AD-X Quantidade : 1 Preço : R$ 1.250,00\r\n', '2020-06-07', '2020-06-07', 'Cartão', '', '', 3),
(5570, 2950.00, ' Produto : Nike AS Quantidade : 1 Preço : R$ 450,00\r\n Produto : Nike AS-X Quantidade : 1 Preço : R$ 1.250,00\r\n Produto : Adidas AD-X Quantidade : 1 Preço : R$ 1.250,00\r\n', '2020-06-07', '2020-06-07', 'Cartão', '', '', 4),
(5571, 7610.00, ' Produto : Adidas AD Quantidade : 1 Preço : R$ 850,00\r\n Produto : Nike AS-X Quantidade : 2 Preço : R$ 2.500,00\r\n Produto : Adidas AD-X Quantidade : 2 Preço : R$ 2.500,00\r\n Produto : Chinelo X Quantidade : 2 Preço : R$ 60,00\r\n Produto : Olympikus LAD-X Quantidade : 1 Preço : R$ 1.250,00\r\n Produto : Nike AS Quantidade : 1 Preço : R$ 450,00\r\n', '2020-06-07', '2020-06-07', 'Cartão', '', '', 4),
(5572, 1600.00, ' Produto : Adidas AD Quantidade : 1 Preço : R$ 850,00\r\n Produto : Olympikus LY Quantidade : 1 Preço : R$ 750,00\r\n', '2020-06-07', '2020-06-07', 'Cartão', '', '', 4),
(5573, 3400.00, ' Produto : Adidas AD Quantidade : 2 Preço : R$ 1.700,00\r\n Produto : Nike AS Quantidade : 1 Preço : R$ 450,00\r\n Produto : Nike AS-X Quantidade : 1 Preço : R$ 1.250,00\r\n', '2020-06-07', '2020-06-07', 'Cartão', '', '', 4),
(5575, 450.00, ' Produto : Nike AS Quantidade : 1 Preço : R$ 450,00\r\n', '2020-06-07', '2020-06-07', 'Cartão', '', '', 3),
(5578, 350.00, ' Produto : Olympikus OX Quantidade : 1 Preço : R$ 350,00\r\n', '2020-06-12', '2020-06-12', 'Cartão', '', '', 3),
(5579, 1300.00, ' Produto : Adidas AD Quantidade : 1 Preço : R$ 850,00\r\n Produto : Nike AS Quantidade : 1 Preço : R$ 450,00\r\n', '2020-06-13', '2020-06-13', 'Dinheiro', '', '', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cor` varchar(80) NOT NULL,
  `tamanho` int(2) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
  `tamanhoCalcado` enum('30','31','32','33') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `cor`, `tamanho`, `descricao`, `preco`, `usuario_id`, `qty`, `status`, `tamanhoCalcado`) VALUES
(1, 'Nike AS', 'Preto e Branco', 37, 'AirImpact', '450.00', 3, 0, '1', '30'),
(2, 'Adidas AD', 'Preto e Amarelo', 33, 'AirWing', '850.00', 3, 0, '1', '30'),
(3, 'Nike AS-X', 'Azul', 41, 'AirImpact, Vent, AirMX', '1250.00', 3, 0, '1', '30'),
(4, 'Adidas AD-X', 'Amarelo e Preto', 31, 'AirImpact-AD, Vent, AirD', '1250.00', 3, 0, '1', '30'),
(5, 'Olympikus OX', 'Branco ', 44, 'AirImpact, com detalhes preto', '350.00', 3, 0, '1', '30'),
(6, 'Olympikus LY', 'Laranja', 39, 'AirWing', '750.00', 3, 0, '1', '30'),
(7, 'Olympikus LAS-X', 'Cinza', 46, 'AirImpact, Vent, AirM', '1150.00', 3, 0, '1', '30'),
(8, 'Olympikus LAD-X', 'Verde Escuro', 44, 'AirImpact-LD2, Vent, AirD', '1250.00', 3, 0, '1', '30'),
(39, 'Chinelo X', 'Vermelho ', 37, 'com detalhes preto e branco, macio.', '30.00', 3, 0, '1', '30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanhos`
--

CREATE TABLE `tamanhos` (
  `id` int(11) NOT NULL,
  `tamanho` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tamanhos`
--

INSERT INTO `tamanhos` (`id`, `tamanho`) VALUES
(1, 30),
(2, 31),
(3, 32),
(4, 33),
(5, 34),
(6, 35),
(7, 36),
(8, 37),
(9, 38),
(10, 39),
(11, 40),
(12, 41),
(13, 42),
(14, 43),
(15, 44),
(16, 45),
(17, 46),
(18, 47);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(20) NOT NULL,
  `sexo` varchar(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `Telefone` varchar(15) NOT NULL,
  `endereco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `sexo`, `email`, `senha`, `Telefone`, `endereco`) VALUES
(3, 'joao', '111.444.777-33', 'masculino', 'joao@joao.com', 'dccd96c256bc7dd39bae41a405f25e43', '31940028922', 'Av. Presidente Carlos Luz, 3001 - Pampulha, Belo Horizonte - MG, 31250-010'),
(4, 'Maria', '111.444.777-33', 'feminino', 'maria@maria.com', 'dccd96c256bc7dd39bae41a405f25e43', '', 'BR-356, 3049 - Belvedere, Belo Horizonte - MG, 30320-900'),
(9, 'John', '111.444.777-33', 'masculino', 'john@john.com', 'dccd96c256bc7dd39bae41a405f25e43', '', 'BR-356, 3049 - Belvedere, Belo Horizonte - MG, 30320-900'),
(18, 'teste', '111.444.777-33', 'masculino', 'teste@teste.com', 'aa1bf4646de67fd9086cf6c79007026c', '', ''),
(26, 'Pedro Alves Silva', '111.444.777-33', 'masculino', 'pedroalves234@teste.com', '955498290235a50223672a68f46f0e72', '', ''),
(32, 'caixa', '111.444.777-35', 'feminino', 'teste2@testddde.com', '31b5a2a5dc23762d6a35058536169a3e', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lista_pedidos`
--
ALTER TABLE `lista_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`id_pedido`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de tabela `lista_pedidos`
--
ALTER TABLE `lista_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5580;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `lista_pedidos`
--
ALTER TABLE `lista_pedidos`
  ADD CONSTRAINT `lista_pedidos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
