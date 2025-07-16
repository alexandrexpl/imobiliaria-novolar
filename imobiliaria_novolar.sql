-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/07/2025 às 03:20
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imobiliaria_novolar`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(180) NOT NULL,
  `senha` varchar(240) NOT NULL,
  `email` varchar(240) NOT NULL,
  `imagem` int(240) NOT NULL,
  `data_cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `email`, `imagem`, `data_cadastro`) VALUES
(1, 'Admin Erick', '2e6f9b0d5885b6010f9167787445617f553a735f', 'adminstrador@novolar.com', 0, '2025-07-14'),
(2, 'Admin Ale', '2e6f9b0d5885b6010f9167787445617f553a735f', 'administrador2@novolar.com', 0, '2025-07-14'),
(3, 'Roberto', '73378a56d33afc78c4151045e473a8c3246e3e33', 'roberto@email.com', 0, '2025-07-14'),
(4, 'Danilo', '0f60cb7138052bd581e2efe84bc72d675863162f', 'Gentili@presidencia.gov.br', 0, '2025-07-14'),
(5, 'Pedro Souza', '0f60cb7138052bd581e2efe84bc72d675863162f', 'pedrosouza@email.com', 0, '2025-07-15'),
(7, 'Cristiano', '8cb2237d0679ca88db6464eac60da96345513964', 'Ronaldo7@goat.com', 0, '2025-07-14'),
(10, 'Neymar Jr', '2e6f9b0d5885b6010f9167787445617f553a735f', 'NJ10@contato.com', 0, '2025-07-14'),
(14, 'Audrey', '2e6f9b0d5885b6010f9167787445617f553a735f', 'akrindges@gmail.com', 0, '2025-07-14'),
(15, 'Erick', '2e6f9b0d5885b6010f9167787445617f553a735f', 'ebkrindges@gmail.com', 0, '2025-07-14'),
(17, 'Maria Eduarda', '2e6f9b0d5885b6010f9167787445617f553a735f', 'meduarda@email.com', 0, '2025-07-14'),
(18, 'Ilda Krindges', '0c99c03f3646bbe13a02333fecd2d474ead7a966', 'gasegasesteio@gmail.com', 0, '2025-07-15'),
(19, 'José', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'necokrindges@gmail.com', 0, '2025-07-16');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
