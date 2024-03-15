-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Mar-2024 às 18:58
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_fanfic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fanfic`
--

CREATE TABLE `fanfic` (
  `id_fanfic` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `sinopse` text NOT NULL,
  `text` text NOT NULL,
  `nome_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `fanfic`
--

INSERT INTO `fanfic` (`id_fanfic`, `imagem`, `titulo`, `sinopse`, `text`, `nome_user`) VALUES
(5, '../../Resources/Assets/Uploads/OIP.jfif', 'teste', 'Loren ipsun dolor sit anet, consectetur adipisci elit, sed eiusnod tenpor incidunt ut labore et dolore nagna aliqua.', 'Loren ipsun dolor sit anet, consectetur labore et dolore nagna aliqua.', 'Wesley');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_cad`
--

CREATE TABLE `log_cad` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `log_cad`
--

INSERT INTO `log_cad` (`id`, `nome`, `email`, `senha`) VALUES
(2, 'Wesley', 'wesley@gmail.com', '12345');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `fanfic`
--
ALTER TABLE `fanfic`
  ADD PRIMARY KEY (`id_fanfic`);

--
-- Índices para tabela `log_cad`
--
ALTER TABLE `log_cad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fanfic`
--
ALTER TABLE `fanfic`
  MODIFY `id_fanfic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `log_cad`
--
ALTER TABLE `log_cad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
