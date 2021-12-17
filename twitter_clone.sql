-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 17/12/2021 às 17:59
-- Versão do servidor: 10.4.21-MariaDB
-- Versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `twitter_clone`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tweet` varchar(140) NOT NULL,
  `data` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tweets`
--

INSERT INTO `tweets` (`id`, `id_usuario`, `tweet`, `data`) VALUES
(1, 1, 'primeiro tweet', '2021-10-13 15:11:01'),
(3, 1, 'diego ', '2021-10-13 15:33:02'),
(4, 2, 'to tweetando aqui pra ver se vau\r\n', '2021-10-14 10:24:59'),
(5, 2, 'tweet 2\r\n', '2021-10-14 10:25:07'),
(6, 2, 'tweet3', '2021-10-14 10:25:11'),
(7, 2, 'tweet 4', '2021-10-14 10:25:16'),
(8, 1, 'tweet 3', '2021-10-15 09:40:17'),
(9, 1, 'tweet 4', '2021-10-15 09:40:22'),
(10, 1, 'tweet 5', '2021-10-15 09:40:27'),
(11, 1, 'tweet 6', '2021-10-15 09:40:31'),
(12, 1, 'tweet 7', '2021-10-15 09:40:37'),
(13, 1, 'tweet 8', '2021-10-15 09:40:44'),
(14, 1, 'tweet 9\r\n', '2021-10-15 09:40:49'),
(15, 1, 'tweet 10', '2021-10-15 09:40:53'),
(16, 1, 'tweet 11', '2021-10-15 09:40:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Diego Alencar Jacober', 'adm@teste.com.br', '22ac3c5a5bf0b520d281c122d1490650'),
(2, 'Diego_Alencar_Jacober', 'diegoalencar.jacober@gmail.com', '9630'),
(3, 'Alencar', 'diego.jaocber@gmail.com', '3ef815416f775098fe977004015c6193'),
(4, 'Didi_alencar', 'yimomo1864@vhoff.com', '250cf8b51c773f3f8dc8b4be867a9a02'),
(5, 'Diego_Jacober', 'diego.jacober@etec.sp.gov.br', '432f45b44c432414d2f97df0e5743818');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_seguidores`
--

CREATE TABLE `usuarios_seguidores` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_usuario_seguindo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuarios_seguidores`
--

INSERT INTO `usuarios_seguidores` (`id`, `id_usuario`, `id_usuario_seguindo`) VALUES
(3, 1, 4),
(5, 1, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios_seguidores`
--
ALTER TABLE `usuarios_seguidores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios_seguidores`
--
ALTER TABLE `usuarios_seguidores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
