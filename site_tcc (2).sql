-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 07/09/2025 às 17:49
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `site_tcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `post_id`, `usuario_id`, `conteudo`, `data_criacao`) VALUES
(27, 16, 10, 'Você não está sozinho <3', '2025-05-14 00:26:52'),
(28, 16, 9, 'Vamos ser amigos!', '2025-05-14 00:32:41'),
(29, 17, 9, 'Você é uma mulher forte e corajosa, não desista.', '2025-05-14 00:33:19'),
(31, 19, 13, 'Ofereça apoio emocional sem tentar \"consertar\" tudo. Às vezes, a melhor forma de ajudar é só estar ao lado dela, mostrando que ela não está sozinha.', '2025-05-14 00:40:29'),
(32, 19, 9, 'não se cobre demais. Apoiar alguém com autismo pode ser desafiador, mas o simples fato de você estar buscando entender e ajudar já faz toda a diferença.', '2025-05-14 00:41:19'),
(33, 19, 10, 'Tente se educar sobre o autismo, isso vai ajudar a entender melhor o que ela está passando. Conversar abertamente com ela, perguntar como ela se sente, pode ser muito útil. Lembre-se de que nem todo dia vai ser igual: um dia pode ser mais difícil, e no outro, pode estar tudo bem.', '2025-05-14 00:42:03'),
(34, 20, 16, 'Como você lida com seus hiper-focos? Sou pai de uma jovem autista.', '2025-05-25 14:47:32');

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`id`, `usuario_id`, `conteudo`, `data_criacao`) VALUES
(16, 13, 'Fui diagnosticado com autismo há dois anos, já adolescente. No começo, foi confuso, mas depois tudo começou a fazer sentido, coisas que eu sentia e não entendia. Agora me conheço melhor e sei que não sou \"errado\", só funciono de outro jeito. Ainda é difícil às vezes, mas também é um alívio saber quem eu sou.', '2025-05-14 00:24:12'),
(17, 10, 'Tenho 25 anos e sou uma mulher autista. Muita gente ainda acha que autismo tem \"cara\", e por muito tempo eu tentei me encaixar, mascarando quem eu era. As interações sociais me esgotam, barulhos me sobrecarregam, e entender sutilezas às vezes parece impossível. Mas o mais difícil é ser constantemente mal interpretada, como se eu fosse fria ou distante, quando na verdade sinto tudo profundamente.', '2025-05-14 00:26:05'),
(19, 15, 'Eu sou irmã de uma adolescente autista e, às vezes, sinto que não sei muito bem como lidar com as situações. Ela tem dias em que tudo parece muito difícil, e eu não sei como ajudar sem ser invasiva. Queria saber como posso ser mais paciente, como lidar com as crises dela de maneira que ela se sinta segura e não sobrecarregada. Quero entender melhor o que ela precisa e ser alguém em quem ela possa confiar, sem forçar nada, mas também sem deixá-la sozinha nos momentos mais complicados. Alguma dica de como eu posso apoiar mais ela?', '2025-05-14 00:39:10'),
(20, 9, 'Ser autista não é algo que sempre entendi de cara. Durante muito tempo, tentei me encaixar e esconder coisas que não faziam sentido pra mim. Ao longo dos anos, percebi que meu cérebro funciona de uma maneira única, mas nem sempre as pessoas sabem lidar com isso. Ser adulta autista é ter que enfrentar muitos traumas que a sociedade impõe, seja pela falta de compreensão ou pelo medo de ser vista como estranha. Hoje, aprendi a me aceitar, mas não é fácil. Ainda existe um peso enorme por trás das minhas atitudes e reações.', '2025-05-24 17:05:36');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `bio` text DEFAULT NULL,
  `imagem_perfil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `criado_em`, `bio`, `imagem_perfil`) VALUES
(1, 'raiz', 'raissa.hidalgo@p4ed.com', '$2y$10$9oub76SQr.uJm00dbD.RmO3jshUK.zguNxLdKQo8XupZaKUcgZpvq', '2025-04-06 02:42:40', NULL, NULL),
(3, 'lo', 'lo@lo', '$2y$10$7MOuzkM6dIwuYWEjwz/vnOInu1YHpvEyrcx7yTlQBVzQhTvFf/Pdu', '2025-04-06 02:54:31', NULL, NULL),
(4, 'sisa', 'sisinhafer@gmail.com', '$2y$10$J/e2hJ/WbAh.iE5GT3r16OIZHf/7dD9Cm.DMbG/kGOTvjeEtQDD8G', '2025-04-12 02:58:34', NULL, NULL),
(6, 'lele2.0', 'le@le', '$2y$10$Tp18zEhXHllZhKoMbu4nou70Z3d26jn.zFtq0mmayAe5hxN4QzLnq', '2025-04-18 02:02:29', 'misca musca', NULL),
(7, 'lele', 'lele@le', '$2y$10$l6pTKP11l5wrUK5vZupg8OJvUaIIWpfPhqFIlwkdO6CeyhEfvyQyq', '2025-04-27 23:00:25', NULL, NULL),
(8, 'luli', 'luli@li', '$2y$10$bFE1b9k6mdUdqeFiy1RC3.tPCFxrQbWCHsHlJiGrtQps.3AE81RTy', '2025-04-28 02:47:54', NULL, NULL),
(9, 'Noemi', 'Noemi@gmail.com', '$2y$10$5or2uXWZ7eqEBi/XfL81ee/nlZv2p70YUQ6YCmcnP1Ymck8kbF4zu', '2025-05-09 15:48:01', 'Opa galera.', 'perfil_6831fc181efad.jpeg'),
(10, 'Majuba', 'Maju@gmail.com', '$2y$10$LL89C3nhzrWq6/ujJokZg.JrkRQDtcQ5k69cONqy00D3GwbdcWw5W', '2025-05-09 19:10:49', 'Autista aos 25 anos! :)', 'perfil_6831fca5ab653.jpeg'),
(11, 'bangnaldo', 'bang@naldo', '$2y$10$LSn03j1wQ6dThmWg3p3VVe0rfzTXwFaZwJTvPcY8m2q/VqSlpTegS', '2025-05-09 19:12:08', '', 'perfil_681e53a2d0c29.jpg'),
(12, 'barne', 'barne@silva', '$2y$10$Zx6VXMYlObXgt9culdrcaucHlzhWamA1dTefMSAlbEjffrivK0/8q', '2025-05-09 19:26:49', 'oi', 'perfil_681e5713d20f3.jpg'),
(13, 'Jago', 'jago@gogo', '$2y$10$Kp7nwRq1dtFlxmBLBQGRu.eAzdmKe6/HbYwHcNkKBwpr4bJvHP7Y6', '2025-05-09 22:19:21', 'Sou autista diagnosticado á 2 anos.\r\n', 'perfil_6831fd1452842.jpeg'),
(15, 'Bianca', 'Biancacunha@gmail.com', '$2y$10$7jMnQ.W96ND.BBfs/5OM7.N/oneDjMqTH4/8jrGnZDF5xp5nNbZ5C', '2025-05-14 00:37:12', 'Sou irmã de uma adolescente autista.', 'perfil_6831fd852880b.jpeg'),
(16, 'Barne Silva', 'barnesilva2021@gmail.com', '$2y$10$w24sZX71gMf5vrxWeKSTE.j6dsiLdbxqscp606ZkwN5Y63/VMUfL2', '2025-05-25 14:43:49', 'Sou pai de uma jovem autista.', 'perfil_68332d4576393.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
