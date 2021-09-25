-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Set-2021 às 20:16
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `minder`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_artigo`
--

CREATE TABLE `tb_artigo` (
  `idArtigo` int(11) NOT NULL COMMENT 'PK - Código identificador do artigo',
  `ArqPDF` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Diretório do PDF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_banca`
--

CREATE TABLE `tb_banca` (
  `idBanca` int(11) NOT NULL COMMENT 'PK - Código identificador da banca',
  `Descricao` varchar(25) DEFAULT NULL COMMENT 'Descrição da banca'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_banca`
--

INSERT INTO `tb_banca` (`idBanca`, `Descricao`) VALUES
(1, 'ENEM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_curiosidade`
--

CREATE TABLE `tb_curiosidade` (
  `idCuriosidade` int(11) NOT NULL COMMENT 'PK - Código identificador da curiosidade',
  `Descricao` varchar(100) DEFAULT NULL COMMENT 'Descrição da curiosidade'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_favorito`
--

CREATE TABLE `tb_favorito` (
  `idFavorito` int(11) NOT NULL COMMENT 'PK - Código identificador da questão favoritada',
  `idQuestao` int(11) NOT NULL COMMENT 'FK - Código identificador da questão',
  `idUsuario` int(11) NOT NULL COMMENT 'FK - Código identificador do usuário'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_questao`
--

CREATE TABLE `tb_questao` (
  `idQuestao` int(11) NOT NULL COMMENT 'PK - Código identificador da questão',
  `idTipoQuestao` int(11) DEFAULT NULL COMMENT 'FK - Código identificador do tipo da questão',
  `idTipoMateria` int(11) DEFAULT NULL COMMENT 'FK - Código identificador do timo da matéria',
  `idTipoAssunto` int(11) DEFAULT NULL COMMENT 'FK - Código identificador do tipo de assunto',
  `idBanca` int(11) NOT NULL COMMENT 'FK - Código identificador da banca',
  `Descricao` text CHARACTER SET utf8 DEFAULT NULL COMMENT 'Descrição da questão',
  `ArqImagem` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Diretório do arquivo de imagem',
  `Ano` varchar(4) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Ano da questão',
  `AlternativaA` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Texto de resposta da alternativa A',
  `AlternativaB` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Texto de resposta da alternativa B',
  `AlternativaC` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Texto de resposta da alternativa C',
  `AlternativaD` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Texto de resposta da alternativa D',
  `AlternativaE` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Texto de resposta da alternativa E',
  `Resposta` tinyint(4) DEFAULT NULL COMMENT 'Resposta correta da questão'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_questao`
--

INSERT INTO `tb_questao` (`idQuestao`, `idTipoQuestao`, `idTipoMateria`, `idTipoAssunto`, `idBanca`, `Descricao`, `ArqImagem`, `Ano`, `AlternativaA`, `AlternativaB`, `AlternativaC`, `AlternativaD`, `AlternativaE`, `Resposta`) VALUES
(3, 1, 1, 1, 1, 'A caixa-d’água de um edifício terá a forma de um paralelepípedo retângulo reto com volume igual a 28 080 litros. Em uma maquete que representa o edifício, a caixa-d’água tem dimensões 2 cm × 3,51 cm × 4 cm.\r\n\r\nDado: 1 dm³ = 1 L.\r\n\r\nA escala usada pelo arquiteto foi', '', '2020', '1 : 10', '1 : 100', '1 : 1000', '1 : 10000', '1 : 100000', 1),
(4, 1, 1, 2, 1, '(Enem 2020). Nos livros Harry Potter, um anagrama do nome do personagem “TOM MARVOLO RIDDLE” gerou a frase “I AM LORD VOLDEMORT”.\r\n\r\nSuponha que Harry quisesse formar todos os anagramas da frase “I AM POTTER”, de tal forma que as vogais e consoantes aparecessem sempre intercaladas, e sem considerar o espaçamento entre as letras.\r\n\r\nNessas condições, o número de anagramas formados é dado por', '', '2019', '9!', '4! 5!', '2 × 4! 5!', '9! / 2', '4! 5! / 2', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_respostasimulado`
--

CREATE TABLE `tb_respostasimulado` (
  `idRespostaUsuario` int(11) NOT NULL COMMENT 'PK - Código identificador da resposta do usuário',
  `idQuestao` int(11) DEFAULT NULL COMMENT 'FK - Código identificador da questão',
  `idUsuario` int(11) DEFAULT NULL COMMENT 'FK - Código identificador do usuário',
  `Descricao` tinyint(4) DEFAULT NULL COMMENT 'Descrição da resposta do usuário'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_simulado`
--

CREATE TABLE `tb_simulado` (
  `idSimulado` int(11) NOT NULL COMMENT 'PK - Código identificador do simulado',
  `idQuestao` int(11) DEFAULT NULL COMMENT 'FK - Código identificador da questão',
  `idTipoMateria` int(11) DEFAULT NULL COMMENT 'FK - Código identificador do tipo da matéria',
  `idTipoAssunto` int(11) DEFAULT NULL COMMENT 'FK - Código identificador do tipo de assunto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipoassunto`
--

CREATE TABLE `tb_tipoassunto` (
  `idTipoAssunto` int(11) NOT NULL COMMENT 'PK - Código identificador do tipo de assunto da questão',
  `idTipoMateria` int(11) NOT NULL COMMENT 'FK - Código identificador da matéria',
  `Descricao` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Descrição do tipo de assunto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_tipoassunto`
--

INSERT INTO `tb_tipoassunto` (`idTipoAssunto`, `idTipoMateria`, `Descricao`) VALUES
(1, 1, 'Geometria Espacial'),
(2, 1, 'Análise Combinatória');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipomateria`
--

CREATE TABLE `tb_tipomateria` (
  `idTipoMateria` int(11) NOT NULL COMMENT 'PK - Código identificador do tipo de matéria',
  `Descricao` varchar(20) DEFAULT NULL COMMENT 'Descrição do tipo de matéria'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_tipomateria`
--

INSERT INTO `tb_tipomateria` (`idTipoMateria`, `Descricao`) VALUES
(1, 'Matemática'),
(2, 'Português'),
(3, 'Física'),
(4, 'Biologia'),
(5, 'Química'),
(6, 'Sociologia'),
(7, 'Filosofia'),
(8, 'História'),
(9, 'Geografia'),
(10, 'Inglês'),
(11, 'Espanhol'),
(12, 'Educação Física');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipoquestao`
--

CREATE TABLE `tb_tipoquestao` (
  `idTipoQuestao` int(11) NOT NULL COMMENT 'PK - Código identificador do tipo da questão',
  `Descricao` varchar(20) DEFAULT NULL COMMENT 'Descrição do tipo da questão'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_tipoquestao`
--

INSERT INTO `tb_tipoquestao` (`idTipoQuestao`, `Descricao`) VALUES
(1, 'Objetiva'),
(2, 'Somatória'),
(3, 'Discursiva');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipousuario`
--

CREATE TABLE `tb_tipousuario` (
  `idTipoUsuario` int(11) NOT NULL COMMENT 'PK - Código identificador do tipo de usuário	',
  `Descricao` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Descrição do tipo de usuário'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_tipousuario`
--

INSERT INTO `tb_tipousuario` (`idTipoUsuario`, `Descricao`) VALUES
(1, 'Administrador'),
(2, 'Usuário comum');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `idUsuario` int(11) NOT NULL COMMENT 'PK - Código identificador do usuário',
  `idTipoUsuario` int(11) DEFAULT NULL COMMENT 'FK - Código identificador do tipo de usuário',
  `Foto` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '	Foto do usuário',
  `Nome` varchar(80) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Nome do usuário',
  `Email` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'E-mail do usuário',
  `Senha` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Senha do usuário',
  `FlgAtivo` char(1) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Usuário ativo: S-Sim/N-Não'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_artigo`
--
ALTER TABLE `tb_artigo`
  ADD PRIMARY KEY (`idArtigo`);

--
-- Índices para tabela `tb_banca`
--
ALTER TABLE `tb_banca`
  ADD PRIMARY KEY (`idBanca`);

--
-- Índices para tabela `tb_curiosidade`
--
ALTER TABLE `tb_curiosidade`
  ADD PRIMARY KEY (`idCuriosidade`);

--
-- Índices para tabela `tb_favorito`
--
ALTER TABLE `tb_favorito`
  ADD PRIMARY KEY (`idFavorito`),
  ADD UNIQUE KEY `tb_Questao_ibfk_3` (`idQuestao`) USING BTREE,
  ADD KEY `tb_Usuario_ibfk_2` (`idUsuario`);

--
-- Índices para tabela `tb_questao`
--
ALTER TABLE `tb_questao`
  ADD PRIMARY KEY (`idQuestao`),
  ADD KEY `tb_TipoQuestao_ibfk_1` (`idTipoQuestao`),
  ADD KEY `tb_idTipoAssunto_ibfk_2` (`idTipoAssunto`),
  ADD KEY `tb_Banca_ibfk_4` (`idBanca`),
  ADD KEY `tb_idTipoMateria_ibfk_3` (`idTipoMateria`) USING BTREE;

--
-- Índices para tabela `tb_respostasimulado`
--
ALTER TABLE `tb_respostasimulado`
  ADD PRIMARY KEY (`idRespostaUsuario`),
  ADD KEY `tb_RespostaSimulado_ibfk_1` (`idQuestao`),
  ADD KEY `tb_RespostaSimulado_ibfk_2` (`idUsuario`);

--
-- Índices para tabela `tb_simulado`
--
ALTER TABLE `tb_simulado`
  ADD PRIMARY KEY (`idSimulado`),
  ADD KEY `tb_Questao_ibfk_1` (`idQuestao`),
  ADD KEY `tb_TipoMateria_ibfk_2` (`idTipoMateria`),
  ADD KEY `tb_TipoAssunto_ibfk_1` (`idTipoAssunto`);

--
-- Índices para tabela `tb_tipoassunto`
--
ALTER TABLE `tb_tipoassunto`
  ADD PRIMARY KEY (`idTipoAssunto`),
  ADD KEY `tb_TipoMateria_ibfk_2` (`idTipoMateria`);

--
-- Índices para tabela `tb_tipomateria`
--
ALTER TABLE `tb_tipomateria`
  ADD PRIMARY KEY (`idTipoMateria`);

--
-- Índices para tabela `tb_tipoquestao`
--
ALTER TABLE `tb_tipoquestao`
  ADD PRIMARY KEY (`idTipoQuestao`);

--
-- Índices para tabela `tb_tipousuario`
--
ALTER TABLE `tb_tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `tb_Usuario_ibfk_1` (`idTipoUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_artigo`
--
ALTER TABLE `tb_artigo`
  MODIFY `idArtigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador do artigo';

--
-- AUTO_INCREMENT de tabela `tb_banca`
--
ALTER TABLE `tb_banca`
  MODIFY `idBanca` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador da banca', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_curiosidade`
--
ALTER TABLE `tb_curiosidade`
  MODIFY `idCuriosidade` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador da curiosidade';

--
-- AUTO_INCREMENT de tabela `tb_favorito`
--
ALTER TABLE `tb_favorito`
  MODIFY `idFavorito` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador da questão favoritada';

--
-- AUTO_INCREMENT de tabela `tb_questao`
--
ALTER TABLE `tb_questao`
  MODIFY `idQuestao` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador da questão', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_respostasimulado`
--
ALTER TABLE `tb_respostasimulado`
  MODIFY `idRespostaUsuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador da resposta do usuário';

--
-- AUTO_INCREMENT de tabela `tb_simulado`
--
ALTER TABLE `tb_simulado`
  MODIFY `idSimulado` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador do simulado';

--
-- AUTO_INCREMENT de tabela `tb_tipoassunto`
--
ALTER TABLE `tb_tipoassunto`
  MODIFY `idTipoAssunto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador do tipo de assunto da questão', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_tipomateria`
--
ALTER TABLE `tb_tipomateria`
  MODIFY `idTipoMateria` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador do tipo de matéria', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_tipoquestao`
--
ALTER TABLE `tb_tipoquestao`
  MODIFY `idTipoQuestao` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador do tipo da questão', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_tipousuario`
--
ALTER TABLE `tb_tipousuario`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador do tipo de usuário	', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador do usuário';

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_favorito`
--
ALTER TABLE `tb_favorito`
  ADD CONSTRAINT `tb_Questao_ibfk_3` FOREIGN KEY (`idQuestao`) REFERENCES `tb_questao` (`idQuestao`),
  ADD CONSTRAINT `tb_Usuario_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`);

--
-- Limitadores para a tabela `tb_questao`
--
ALTER TABLE `tb_questao`
  ADD CONSTRAINT `tb_Banca_ibfk_4` FOREIGN KEY (`idBanca`) REFERENCES `tb_banca` (`idBanca`),
  ADD CONSTRAINT `tb_TipoQuestao_ibfk_1` FOREIGN KEY (`idTipoQuestao`) REFERENCES `tb_tipoquestao` (`idTipoQuestao`),
  ADD CONSTRAINT `tb_idTipoAssunto_ibfk_2` FOREIGN KEY (`idTipoAssunto`) REFERENCES `tb_tipoassunto` (`idTipoAssunto`),
  ADD CONSTRAINT `tb_idTipoMateria_ibfk_3` FOREIGN KEY (`idTipoMateria`) REFERENCES `tb_tipomateria` (`idTipoMateria`);

--
-- Limitadores para a tabela `tb_respostasimulado`
--
ALTER TABLE `tb_respostasimulado`
  ADD CONSTRAINT `tb_Questao_ibfk_2` FOREIGN KEY (`idQuestao`) REFERENCES `tb_questao` (`idQuestao`),
  ADD CONSTRAINT `tb_Usuario_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`);

--
-- Limitadores para a tabela `tb_simulado`
--
ALTER TABLE `tb_simulado`
  ADD CONSTRAINT `tb_Questao_ibfk_1` FOREIGN KEY (`idQuestao`) REFERENCES `tb_questao` (`idQuestao`),
  ADD CONSTRAINT `tb_TipoAssunto_ibfk_2` FOREIGN KEY (`idTipoAssunto`) REFERENCES `tb_tipoassunto` (`idTipoAssunto`),
  ADD CONSTRAINT `tb_TipoMateria_ibfk_3` FOREIGN KEY (`idTipoMateria`) REFERENCES `tb_tipomateria` (`idTipoMateria`);

--
-- Limitadores para a tabela `tb_tipoassunto`
--
ALTER TABLE `tb_tipoassunto`
  ADD CONSTRAINT `tb_TipoMateria_ibfk_2` FOREIGN KEY (`idTipoMateria`) REFERENCES `tb_tipomateria` (`idTipoMateria`);

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `tb_TipoUsuario_ibfk_1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tb_tipousuario` (`idTipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
