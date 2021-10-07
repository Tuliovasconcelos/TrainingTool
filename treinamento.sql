-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Set-2021 às 19:42
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `treinamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `formteste`
--

CREATE TABLE `formteste` (
  `id` int(11) NOT NULL,
  `nome_teste` varchar(150) DEFAULT NULL,
  `permissao_id` int(11) NOT NULL,
  `modulo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formteste`
--

INSERT INTO `formteste` (`id`, `nome_teste`, `permissao_id`, `modulo_id`) VALUES
(1, 'testeSisr', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modulos`
--

INSERT INTO `modulos` (`id`, `descricao`) VALUES
(1, 'ModuloMV'),
(2, 'ModuloSisR'),
(3, 'ModuloGeral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `observacoes`
--

CREATE TABLE `observacoes` (
  `id` int(11) NOT NULL,
  `usuario` int(11) DEFAULT NULL,
  `observacao` varchar(5000) DEFAULT NULL,
  `dataObs` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `observacoes`
--

INSERT INTO `observacoes` (`id`, `usuario`, `observacao`, `dataObs`) VALUES
(1, 1, 'Teste', '2021-09-03 11:24:22'),
(2, 1, 'testandoooo', '2021-09-03 11:52:53'),
(3, 1, 'O Roger Ã© cabÃ§o', '2021-09-03 13:28:01'),
(4, 2, 'Testandoooooooooooooooooo 3h', '2021-09-03 13:37:25'),
(5, 1, 'Opa', '2021-09-06 08:19:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `id_formteste` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `descricao`, `id_formteste`) VALUES
(1, 'O que deve ser feito quando há uma guia bloqueada?', 1),
(2, 'Onde é feita a liberação de guias? Existe algum critério a ser respeitado?', 1),
(3, 'O que é necessário para emissão de uma guia de internação?', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pergunta` int(11) DEFAULT NULL,
  `id_teste_feito` int(11) NOT NULL,
  `desc_resposta` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`id`, `id_usuario`, `id_pergunta`, `id_teste_feito`, `desc_resposta`) VALUES
(1, 1, 1, 1, 'Teste'),
(2, 1, 3, 2, 'Aham');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_treinamento`
--

CREATE TABLE `status_treinamento` (
  `id` int(11) NOT NULL,
  `treinamento_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `testes_feitos`
--

CREATE TABLE `testes_feitos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_teste` int(11) DEFAULT NULL,
  `nota` decimal(10,0) DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `data_teste` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `testes_feitos`
--

INSERT INTO `testes_feitos` (`id`, `id_usuario`, `id_teste`, `nota`, `status`, `data_teste`) VALUES
(1, 1, 1, '90', 'P', '2021-09-06 17:56:47'),
(2, 1, 1, '85', 'A', '2021-09-08 07:48:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinamentos`
--

CREATE TABLE `treinamentos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `formteste_id` int(11) DEFAULT NULL,
  `modulo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `permissao` int(11) DEFAULT NULL,
  `setor` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `nomeAvatar` varchar(100) DEFAULT NULL,
  `data_cad` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `permissao`, `setor`, `status`, `nomeAvatar`, `data_cad`) VALUES
(1, 'TÃºlio Vasconcelos Silva', 'tulio', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, 1, 'tulio.png', '2021-09-03 09:16:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  `link` varchar(150) DEFAULT NULL,
  `modulo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `video`
--

INSERT INTO `video` (`id`, `descricao`, `link`, `modulo_id`) VALUES
(1, 'treinamentoAgendar', 'https://www.youtube.com/watch?v=rxBcHPbatmQ', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formteste`
--
ALTER TABLE `formteste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_modulos_form` (`modulo_id`);

--
-- Indexes for table `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `observacoes`
--
ALTER TABLE `observacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_teste` (`id_formteste`);

--
-- Indexes for table `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pergunta` (`id_pergunta`),
  ADD KEY `fk_usuario_resp` (`id_usuario`),
  ADD KEY `fk_teste_feito` (`id_teste_feito`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_treinamento`
--
ALTER TABLE `status_treinamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_treinamento` (`treinamento_id`),
  ADD KEY `fk_usuario` (`usuario_id`);

--
-- Indexes for table `testes_feitos`
--
ALTER TABLE `testes_feitos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userteste` (`id_usuario`),
  ADD KEY `fk_testefeito` (`id_teste`);

--
-- Indexes for table `treinamentos`
--
ALTER TABLE `treinamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_video` (`video_id`),
  ADD KEY `fk_formteste` (`formteste_id`),
  ADD KEY `fk_modulo` (`modulo_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_modulo_video` (`modulo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formteste`
--
ALTER TABLE `formteste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `observacoes`
--
ALTER TABLE `observacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status_treinamento`
--
ALTER TABLE `status_treinamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testes_feitos`
--
ALTER TABLE `testes_feitos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `treinamentos`
--
ALTER TABLE `treinamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `formteste`
--
ALTER TABLE `formteste`
  ADD CONSTRAINT `fk_modulos_form` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`);

--
-- Limitadores para a tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD CONSTRAINT `fk_teste` FOREIGN KEY (`id_formteste`) REFERENCES `formteste` (`id`);

--
-- Limitadores para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `fk_pergunta` FOREIGN KEY (`id_pergunta`) REFERENCES `perguntas` (`id`),
  ADD CONSTRAINT `fk_teste_feito` FOREIGN KEY (`id_teste_feito`) REFERENCES `testes_feitos` (`id`),
  ADD CONSTRAINT `fk_usuario_resp` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `status_treinamento`
--
ALTER TABLE `status_treinamento`
  ADD CONSTRAINT `fk_treinamento` FOREIGN KEY (`treinamento_id`) REFERENCES `treinamentos` (`id`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `testes_feitos`
--
ALTER TABLE `testes_feitos`
  ADD CONSTRAINT `fk_testefeito` FOREIGN KEY (`id_teste`) REFERENCES `formteste` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_userteste` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `treinamentos`
--
ALTER TABLE `treinamentos`
  ADD CONSTRAINT `fk_formteste` FOREIGN KEY (`formteste_id`) REFERENCES `formteste` (`id`),
  ADD CONSTRAINT `fk_modulo` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`),
  ADD CONSTRAINT `fk_video` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`);

--
-- Limitadores para a tabela `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `fk_modulo_video` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
