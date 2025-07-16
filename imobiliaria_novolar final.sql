-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/07/2025 às 12:20
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
-- Estrutura para tabela `contato_mensagens`
--

CREATE TABLE `contato_mensagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(25) NOT NULL,
  `mensagem` text NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp(),
  `lido` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contato_mensagens`
--

INSERT INTO `contato_mensagens` (`id`, `nome`, `email`, `telefone`, `mensagem`, `data_envio`, `lido`) VALUES
(2, 'Alexandre Lopes', 'alexandre@email.com', '51987654321', 'Gostaria de agendar uma visita', '2025-07-16 06:41:40', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `tipo` enum('venda','aluguel') NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `area` int(11) NOT NULL,
  `quartos` int(11) NOT NULL,
  `banheiros` int(11) NOT NULL,
  `vagas` int(11) NOT NULL,
  `imagem_1` varchar(255) NOT NULL,
  `imagem_2` varchar(255) NOT NULL,
  `imagem_3` varchar(255) NOT NULL,
  `destaque` tinyint(1) NOT NULL DEFAULT 0,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imoveis`
--

INSERT INTO `imoveis` (`id`, `titulo`, `descricao`, `preco`, `tipo`, `localizacao`, `area`, `quartos`, `banheiros`, `vagas`, `imagem_1`, `imagem_2`, `imagem_3`, `destaque`, `data_cadastro`) VALUES
(2, 'Apartamento Aconchegante com 2 Quartos', 'Venha morar com conforto e segurança! Casa disponível para locação em condomínio fechado de alto padrão em Jundiaí. O imóvel possui 250 m² de área construída, com ambientes amplos e bem iluminados.\r\nSão 4 dormitórios (sendo 2 suítes), sala de estar com lareira, sala de jantar e cozinha em conceito aberto com armários planejados e cooktop. A área externa é o grande destaque, com um delicioso espaço gourmet equipado com churrasqueira e forno de pizza, piscina aquecida e um belo jardim.\r\nO condomínio oferece segurança com portaria 24h, ronda motorizada, salão de festas e quadra poliesportiva.\r\nLocalização estratégica com fácil acesso às rodovias Anhanguera e Bandeirantes.\r\n\r\nObservação: O valor do aluguel já inclui a taxa de condomínio e IPTU.\r\n', 7800.00, 'aluguel', 'Condomínio Reserva da Serra, Jundiaí - SP', 250, 2, 1, 1, 'imovel_687744450b22d3.74592872.png', 'imovel_68777bb7800187.37526977.png', 'imovel_68777bb78017c1.42811413.png', 1, '2025-07-16 05:10:36'),
(4, 'Sala Comercial para Aluguel', 'Excelente sala comercial com 40 m² para locação no coração do Centro da cidade. Perfeita para escritórios, consultórios ou startups que buscam visibilidade e fácil acesso.\r\n\r\nO espaço conta com um salão principal em vão livre, permitindo a criação de diferentes layouts, além de 1 banheiro privativo e uma pequena copa. O piso é em porcelanato e o teto possui rebaixamento em gesso com iluminação já instalada. A sala é bem iluminada, com janelas amplas que oferecem vista para a avenida.\r\n\r\nO edifício é um dos mais modernos da região e oferece total infraestrutura para o seu negócio: portaria com controle de acesso e catracas eletrônicas, segurança 24 horas, 3 elevadores e estacionamento rotativo para clientes. O aluguel dá direito ao uso de 1 vaga de garagem.\r\n\r\nLocalização imbatível, próximo a bancos, cartórios, restaurantes e ao lado de um ponto de ônibus e estação de metrô.\r\n\r\nObservação: O valor do condomínio é de R$ 450,00 (não incluso no aluguel).\r\n', 2500.00, 'aluguel', 'Avenida Rio Branco - Centro, Rio de Janeiro - RJ', 40, 0, 0, 1, 'imovel_68774454e7f916.66890499.png', 'imovel_68777b541c4684.40250449.png', 'imovel_68777b541c5f34.08627251.png', 1, '2025-07-16 05:27:37'),
(8, 'Apartamento Aconchegante com 5 Quartos', 'gdgdgfdvd', 1000000.00, 'venda', 'Rua das Acácias - Vila Mariana, São Paulo - SP', 234, 5, 3, 2, 'imovel_687777ad213901.27125702.png', 'imovel_687777ad2151f5.76691649.png', 'imovel_687777ad217135.43518655.png', 0, '2025-07-16 09:58:05');

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
-- Índices de tabela `contato_mensagens`
--
ALTER TABLE `contato_mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contato_mensagens`
--
ALTER TABLE `contato_mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
