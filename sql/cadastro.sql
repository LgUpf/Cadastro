-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Mar-2021 às 01:02
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `session`
--

INSERT INTO `session` (`id`, `id_user`, `token`, `date`) VALUES
(28, 5, 'b62850968746d99ce7207669f175c5d934223177', '2021-03-17 01:24:39'),
(29, 5, '44cbd1492bb825990b6e6178927e282e20f71503', '2021-03-18 02:14:59'),
(30, 5, '879bb11bca03b6caf3e975b75cf3be26cf69b920', '2021-03-19 00:31:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `endereco` varchar(30) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`id`, `nome`, `email`, `telefone`, `endereco`, `bairro`, `cidade`) VALUES
(13, 'teste', '', '1111111', 'teste', 'teste', ''),
(14, 'Luis Gustavo ', 'luis@gmail.com.br', '54996963138', 'Rua são marcos n000', 'São José ', ' Passo Fundo'),
(15, 'Grazi ', 'grazi@net.br', '55555555', 'Rua doutor canovas ', 'Parque Farroupilha ', ' Bento'),
(16, 'Lu', 'lusistema@outlook.com', '5430451260', 'Rua Charrua n 333', 'ParqueFarroupilha ', ''),
(17, 'eeeeeeee', 'ppppp@outlook.net', '55555555555', 'eeeeeeeeeeee', 'tttttttttttt', ''),
(18, 'Gustavo', 'gustavo55@gmail.com', '5430451260', 'Rua charrua', 'Sao jose', 'Passo Fundo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(5, 'Admin', 'admin@sistema.com', '$2y$10$/x480IXxZfh7NaNVcYKU8e4YfhbLFSzWFbcbLma3/TXIWPlnAsUfS');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
