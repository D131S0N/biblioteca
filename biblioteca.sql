-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Set-2020 às 04:17
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `data_cadastro`) VALUES
(1, 'Dieison', '2020-08-31 20:36:29'),
(2, '2020-09-01 02:17:08', '2020-09-01 02:17:08'),
(3, '2020-09-01 02:21:07', '2020-09-01 02:21:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `isbn13` varchar(15) DEFAULT NULL,
  `editora` varchar(255) DEFAULT NULL,
  `tipo_encadernacao` varchar(50) DEFAULT NULL,
  `idioma` varchar(70) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `edicao` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `paginas` varchar(20) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL,
  `data_lancamento` date DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `isbn13`, `editora`, `tipo_encadernacao`, `idioma`, `descricao`, `edicao`, `autor`, `paginas`, `ativo`, `data_lancamento`, `data_cadastro`) VALUES
(1, 'Harry Potter', '987654321', 'Rocco', '', 'Português', 'teste', '1', 'Dieison', '452', 1, '2020-09-01', '2020-09-04 04:12:46'),
(2, 'Animais Fantasticos', '123456789', 'Rocco', 'Brochura', 'Português', 'teste', '1', 'J.K.', '222', 1, '2020-09-01', '2020-09-04 01:56:05'),
(3, 'Harry Potter e a pedra filosofal', '', 'Rocco', '', '', '', '', 'J.K.', '0', 1, '0000-00-00', '2020-09-04 04:13:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros_alugados`
--

CREATE TABLE `livros_alugados` (
  `id` int(11) NOT NULL,
  `id_livro` int(11) DEFAULT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `data_retirada` datetime DEFAULT NULL,
  `data_devolucao` datetime DEFAULT NULL,
  `em_aberto` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livros_alugados`
--

INSERT INTO `livros_alugados` (`id`, `id_livro`, `id_pessoa`, `id_funcionario`, `data_retirada`, `data_devolucao`, `em_aberto`) VALUES
(1, 1, 1, 1, '2020-09-03 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `idade` int(5) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `email`, `documento`, `idade`, `senha`, `cidade`, `data_cadastro`) VALUES
(1, 'Teste1', 'email@teste.com', '404.081.050-38', 25, '7c222fb2927d828af22f592134e8932480637c0d', 'teste', '2020-09-04 00:01:14');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titulo` (`titulo`),
  ADD KEY `isbn13` (`isbn13`),
  ADD KEY `autor` (`autor`);

--
-- Índices para tabela `livros_alugados`
--
ALTER TABLE `livros_alugados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `livros_alugados`
--
ALTER TABLE `livros_alugados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
