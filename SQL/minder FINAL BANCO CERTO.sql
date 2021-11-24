-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Nov-2021 às 23:14
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

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sto_ValidaAcesso` (IN `vEmail` VARCHAR(100), IN `vSenha` VARCHAR(50))  NO SQL
BEGIN
    #Valida dados e atualiza o último acesso
    IF EXISTS(SELECT 1
              FROM tb_Usuario
              WHERE Email = vEmail
              AND Senha = MD5(vSenha))
    THEN
        UPDATE tb_Usuario
        SET Email = vEmail
        WHERE Email = vEmail
        AND Senha = MD5(vSenha);
    END IF;

    #Retorna os dados de acesso
    SELECT *
    FROM tb_Usuario
    WHERE Email = vEmail
    AND Senha = MD5(vSenha);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sto_ValidaUsuario` (IN `vEmail` VARCHAR(100))  NO SQL
BEGIN
    SELECT *
    FROM tb_Usuario
    WHERE Email = vEmail;

END$$

DELIMITER ;

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
(1, 'ENEM'),
(2, 'FUVEST'),
(3, 'PUC');

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

--
-- Extraindo dados da tabela `tb_favorito`
--

INSERT INTO `tb_favorito` (`idFavorito`, `idQuestao`, `idUsuario`) VALUES
(22, 3, 1),
(32, 10, 1),
(36, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_notificacao`
--

CREATE TABLE `tb_notificacao` (
  `idNotificacao` int(11) NOT NULL COMMENT 'PK - Código identificador da notificação',
  `idUsuario` int(11) NOT NULL COMMENT 'FK - Código identificador do usuário que vai receber a notificação',
  `Descricao` varchar(200) NOT NULL COMMENT 'Descrição da notificação',
  `Referencia` varchar(300) NOT NULL COMMENT 'Referência da notificação em link',
  `FlgLido` char(1) DEFAULT NULL COMMENT 'Notificação lida: S-Sim/ N-Não'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_notificacao`
--

INSERT INTO `tb_notificacao` (`idNotificacao`, `idUsuario`, `Descricao`, `Referencia`, `FlgLido`) VALUES
(1, 2, 'Olá galeraaa!', 'index', 'N'),
(2, 2, 'Tudo bem?', 'index', 'N'),
(3, 3, 'Tudo bem?', 'index', 'N');

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
  `Resposta` varchar(1) DEFAULT NULL COMMENT 'Resposta correta da questão'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_questao`
--

INSERT INTO `tb_questao` (`idQuestao`, `idTipoQuestao`, `idTipoMateria`, `idTipoAssunto`, `idBanca`, `Descricao`, `ArqImagem`, `Ano`, `AlternativaA`, `AlternativaB`, `AlternativaC`, `AlternativaD`, `AlternativaE`, `Resposta`) VALUES
(3, 1, 1, 1, 1, 'Oi', '', '2020', '1 : 10', '1 : 100', '1 : 1000', '1 : 10000', '1 : 100000', 'A'),
(4, 1, 1, 1, 1, '(ENEM 2019). Nos livros Harry Potter, um anagrama do nome do personagem “TOM MARVOLO RIDDLE” gerou a frase “I AM LORD VOLDEMORT”.\r\n\r\nSuponha que Harry quisesse formar todos os anagramas da frase “I AM POTTER”, de tal forma que as vogais e consoantes aparecessem sempre intercaladas, e sem considerar o espaçamento entre as letras.\r\n\r\nNessas condições, o número de anagramas formados é dado por', '', '2019', '9!', '4! 5!', '2 × 4! 5!', '9! / 2', '4! 5! / 2', 'B'),
(5, 1, 1, 1, 2, '(FUVEST 2018) Para resolver o problema de abastecimento de água, foi decidida, numa reunião do condomínio, a construção de uma nova cisterna. A cisterna atual tem formato cilíndrico, com 3 m de altura e 2 m de diâmetro, e estimou-se que a nova cisterna deverá comportar 81 m³ de água, mantendo o formato cilíndrico e a altura da atual. Após a inauguração da nova cisterna, a antiga será desativada. (Utilize 3,0 como aproximação para π.)\r\n\r\nQual deve ser o aumento, em metros, no raio da cisterna para atingir o volume desejado?', NULL, '2018', '0,5', '1,0', '2,0', '3,5', '8,0', 'C'),
(6, 1, 1, 3, 1, '(ENEM 2020) Calcule o valor da expressão [(3 x 8) + (5)2] ÷ [(5-3) x 4]', NULL, '2020', '3', '7', '15', '25', '49', 'B'),
(7, 1, 1, 3, 1, '(ENEM 2020) Calcule o valor da expressão [(5 + 3) x 12] ÷ [(5- 3) x 4]', NULL, '2020', '6', '8', '12', '16', '24', 'C'),
(8, 1, 1, 3, 1, '(ENEM 2020) Calcule o valor da expressão (25 - 33) x (22 – 2)', NULL, '2020', '5', '10', '15', '18', '25', 'B'),
(9, 1, 1, 4, 1, '(ENEM 2019) Assinale a alternativa verdadeira sobre o número 178973', NULL, '2019', 'O número que representa a dezena do milhar é o 7', 'O número que representa a unidade do milhar é o 9', 'O número que representa a unidade do milhão é o 1', 'O número que representa a centena do milhão é o 1', 'O número que representa a centena é o 8', 'A'),
(10, 1, 1, 4, 1, '(ENEM 2019) Efetuar a operação sem o auxílio da calculadora 1223 + 575 =', NULL, '2019', '1698', '1697', '1798', '1797', NULL, 'C'),
(11, 1, 1, 4, 1, '(ENEM 2019) Efetuar a operação sem o auxílio da calculadora 3528 + 826 =', NULL, '2019', '4384', '4374', '4364', '4354', NULL, 'D'),
(12, 1, 1, 4, 1, '(ENEM 2018) Efetuar a operação sem o auxílio da calculadora 873 + 68 =', NULL, '2018', '931', '941', '951', '961', NULL, 'B'),
(13, 1, 1, 4, 1, '(ENEM 2020) Efetuar a operação sem o auxílio da calculadora 925 - 413 =', NULL, '2020', '412', '512', '522', '612', NULL, 'B'),
(14, 1, 1, 4, 1, '(ENEM 2020) Efetuar a operação sem o auxílio da calculadora 153 – 136 =', NULL, '2020', '14', '15', '16', '17', NULL, 'D'),
(15, 1, 1, 4, 1, '(ENEM 2019) Efetuar a operação sem o auxílio de calculadora 16 x 6 = ', NULL, '2019', '76', '86', '96', '106', NULL, 'C'),
(16, 1, 1, 4, 1, '(ENEM 2018) Efetuar a operação sem auxílio de calculadora: 2609 x 307 =', NULL, '2018', '796903', '796963', '796993', '800903', '800963', 'E'),
(17, 1, 1, 5, 1, '(ENEM 2019) Efetuar a operação sem o auxílio de calculadora – 54 – 43 + 75 =', NULL, '2019', '22', '-22', '20', '-20', NULL, 'B'),
(18, 1, 1, 5, 1, '(ENEM 2019) Efetuar a operação sem o auxílio de calculadora 25 + (– 61) – ( – 54) =', NULL, '2019', '16', '-17', '18', '-19', NULL, 'C'),
(19, 1, 1, 5, 1, '(ENEM 2018) Para encontrarmos o resultado de 200 - 740, podemos:', NULL, '2018', 'Efetuar 740 + 200 e manter o sinal do resultado.', 'Efetuar 740 + 200 e inverter o sinal do resultado.', 'Efetuar 740 - 200 e manter o sinal do resultado.', 'Efetuar 740 - 200 e inverter o sinal do resultado.', NULL, 'D'),
(20, 1, 1, 5, 1, '(ENEM 2018) Efetuar a operação sem o auxílio de calculadora (+ 1495) ÷ (– 23) =', NULL, '2018', '60', '-65', '70', '-75', NULL, 'B'),
(21, 1, 1, 5, 1, '(ENEM 2020) Utilizando a propriedade distributiva, efetuar a operação sem o auxílio de calculadora (+58) x (– 34 – 19) =', NULL, '2020', '3075', '-3074', '-3076', '3073', NULL, 'B'),
(23, 1, 1, 5, 1, '(ENEM 2019) Qual das alternativas abaixo fornece uma informação correta sobre as operações de multiplicação e divisão?', NULL, '2019', 'Ao multiplicarmos ou dividirmos um número negativo por um positivo, o resultado pode ser tanto positivo como negativo.', 'Ao multiplicarmos ou dividirmos um número negativo por um positivo, o resultado é sempre negativo.', 'Ao multiplicarmos ou dividirmos um número negativo por um positivo, o resultado é sempre positivo.', 'Ao multiplicarmos ou dividirmos um número negativo por um positivo, o resultado é nulo.', 'Ao multiplicarmos ou dividirmos um número negativo por um positivo, não se pode saber o sinal do resultado.', 'B'),
(24, 1, 1, 6, 2, '(FUVEST 2019) Os números 14, x e 51 são, respectivamente, diretamente proporcionais aos números 42, 96 e y.\r\nQuais os valores de x e y?\r\n', NULL, '2019', '32 e 153', '64 e 153', '64 e 53', '96 e 51', '16 e 51', 'A'),
(25, 1, 1, 6, 2, '(ENEM 2019) Os números 15, x e 75 são, respectivamente, inversamente proporcionais aos números y, 39 e 13.\r\nQuais os valores de x e y?\r\n', NULL, '2019', '50 e 65', '75 e 39', '25 e 39', '25 e 65', '50 e 75', 'D'),
(26, 1, 1, 6, 2, '(FUVEST 2020) Uma fábrica engarrafa 3000 refrigerantes em 6 horas. Quantas horas levará para engarrafar 4000 refrigerantes?', NULL, '2020', '2 horas', '4 horas', '6 horas', '8 horas', '10 horas', 'D'),
(27, 1, 1, 6, 2, '(FUVEST 2019) Trinta operários constroem uma casa em 120 dias. Em quantos dias quarenta operários construiriam essa casa?', NULL, '2019', '160', '100', '90', '200', '75', 'C'),
(28, 1, 1, 6, 2, '(FUVEST 2019) Um ônibus percorre 1800 km em 6 dias, correndo 12 horas por dia. Quantos quilômetros percorrerá em 10 dias, correndo 14 horas por dia?', NULL, '2019', '3500', '4000', '4500', '5000', '5500', 'A'),
(29, 1, 1, 6, 2, '(FUVEST 2020) Um ciclista percorreu 150 km em 3 dias, pedalando 2 horas, diariamente. Pedalando 4 horas por dia, durante 4 dias, ele percorrerá ____ quilômetros.', NULL, '2020', '300', '350', '400', '450', '500', 'C'),
(30, 1, 2, 7, 1, '(Enem - 2012) “Ele era o inimigo do rei”, nas palavras de seu biógrafo, Lira Neto. Ou, ainda, “um romancista que colecionava desafetos, azucrinava D. Pedro II e acabou inventando o Brasil”. Assim era José de Alencar (1829-1877), o conhecido autor de O guarani e Iracema, tido como o pai do romance no Brasil.\r\n\r\nAlém de criar clássicos da literatura brasileira com temas nativistas, indianistas e históricos, ele foi também folhetinista, diretor de jornal, autor de peças de teatro, advogado, deputado federal e até ministro da Justiça. Para ajudar na descoberta das múltiplas facetas desse personagem do século XIX, parte de seu acervo inédito será digitalizada.\r\n\r\nHistória Viva, n.° 99, 2011.\r\n\r\nCom base no texto, que trata do papel do escritor José de Alencar e da futura digitalização de sua obra, depreende-se que:', NULL, '2012', 'a digitalização dos textos é importante para que os leitores possam compreender seus romances.', 'o conhecido autor de O guarani e Iracema foi importante porque deixou uma vasta obra literária com temática atemporal.', 'a divulgação das obras de José de Alencar, por meio da digitalização, demonstra sua importância para a história do Brasil Imperial.', 'a digitalização dos textos de José de Alencar terá importante papel na preservação da memória linguística e da identidade nacional.', 'o grande romancista José de Alencar é importante porque se destacou por sua temática indianista.', 'D'),
(31, 1, 2, 7, 1, '(Enem - 2012) A substituição do haver por ter em construções existenciais, no português do Brasil, corresponde a um dos processos mais característicos da história da língua portuguesa, paralelo ao que já ocorrera em relação à aplicação do domínio de ter na área semântica de “posse”, no final da fase arcaica.\r\n\r\nMattos e Silva (2001:136) analisa as vitórias de ter sobre haver e discute a emergência de ter existencial, tomando por base a obra pedagógica de João de Barros. Em textos escritos nos anos quarenta e cinquenta do século XVI, encontram-se evidências, embora raras, tanto de ter “existencial”, não mencionado pelos clássicos estudos de sintaxe histórica, quanto de haver como verbo existencial com concordância, lembrado por Ivo Castro, e anotado como “novidade” no século XVIII por Said Ali.\r\n\r\nComo se vê, nada é categórico e um purismo estreito só revela um conhecimento deficiente da língua. Há mais perguntas que respostas. Pode-se conceber uma norma única e prescritiva? É válido confundir o bom uso e a norma com a própria língua e dessa forma fazer uma avaliação crítica e hierarquizante de outros usos e, através deles, dos usuários? Substitui-se uma norma por outra?\r\n\r\nCALLOU, D. A propósito de norma, correção e preconceito linguístico: do presente para o passado, In: Cadernos de Letras da UFF, n.° 36, 2008. Disponível em: www.uff.br. Acesso em: 26 fev. 2012 (adaptado).\r\n\r\nPara a autora, a substituição de “haver” por “ter” em diferentes contextos evidencia que:', NULL, '2012', 'o estabelecimento de uma norma prescinde de uma pesquisa histórica.', 'os estudo clássicos de sintaxe histórica enfatizam a variação e a mudança na língua.', 'a avaliação crítica e hierarquizante dos usos da língua fundamenta a definição da norma.', 'a adoção de uma única norma revela uma atitude adequada para os estudos linguísticos.', 'os comportamentos puristas são prejudiciais à compreensão da constituição linguística.', 'E'),
(32, 1, 2, 7, 2, '(Fuvest - 2013) A essência da teoria democrática é a supressão de qualquer imposição de classe, fundada no postulado ou na crença de que os conflitos e problemas humanos – econômicos, políticos, ou sociais – são solucionáveis pela educação, isto é, pela cooperação voluntária, mobilizada pela opinião pública esclarecida. Está claro que essa opinião pública terá de ser formada à luz dos melhores conhecimentos existentes e, assim, a pesquisa científica nos campos das ciências naturais e das chamadas ciências sociais deverá se fazer a mais ampla, a mais vigorosa, a mais livre, e a difusão desses conhecimentos, a mais completa, a mais imparcial e em termos que os tornem acessíveis a todos.\r\n\r\n(Anísio Teixeira, Educação é um direito. Adaptado.)\r\n\r\nNo trecho “chamadas ciências sociais”, o emprego do termo “chamadas” indica que o autor:', NULL, '2013', 'vê, nas “ciências sociais”, uma panaceia, não uma análise crítica da sociedade.', 'considera utópicos os objetivos dessas ciências.', 'prefere a denominação “teoria social” à denominação “ciências sociais”.', 'discorda dos pressupostos teóricos dessas ciências.', 'utiliza com reserva a denominação “ciências sociais”.', 'E'),
(33, 1, 2, 7, 1, '(Enem - 2013) Adolescentes: mais altos, gordos e preguiçosos.\r\n\r\nA oferta de produtos industrializados e a falta de tempo têm sua parcela de responsabilidade no aumento da silhueta dos jovens. “Os nossos hábitos alimentares, de modo geral, mudaram muito”, observa Vivian Ellinger, presidente da Sociedade Brasileira de Endocrinologia e Metabologia (SBEM), no Rio de Janeiro. Pesquisas mostram que, aqui no Brasil, estamos exagerando no sal e no açúcar, além de tomar pouco leite e comer menos frutas e feijão.\r\n\r\nOutro pecado, velho conhecido de quem exibe excesso de gordura por causa da gula, surge como marca da nova geração: a preguiça. “Cem por cento das meninas que participam do Programa não praticavam nenhum esporte”, revela a psicóloga Cristina Freire, que monitora o desenvolvimento emocional das voluntárias.\r\n\r\nVocê provavelmente já sabe quais são as consequências de uma rotina sedentária e cheia de gordura. “E não é novidade que os obesos têm uma sobrevida menor”, acredita Claudia Cozer, endocrinologista da Associação Brasileira para o Estudo da Obesidade e da Síndrome Metabólica. Mas, se há cinco anos os estudos projetavam um futuro sombrio para os jovens, no cenário atual as doenças que viriam na velhice já são parte da rotina deles. “Os adolescentes já estão sofrendo com hipertensão e diabete”, exemplifica Claudia.\r\n\r\nSobre a relação entre os hábitos da população adolescente e as suas condições de saúde, as informações apresentadas no texto indicam que:', NULL, '2013', 'a falta de atividade física somada a uma alimentação nutricional mente desequilibrada constituem fatores relacionados ao aparecimento de doenças crônicas entre os adolescentes.', 'a diminuição do consumo de alimentos fontes de carboidratos combinada com um maior consumo de alimentos ricos em proteínas contribuíram para o aumento da obesidade entre os adolescentes.', 'a maior participação dos alimentos industrializados e gordurosos na dieta da população adolescente tem tornado escasso o consumo de sais e açúcares, o que prejudica o equilíbrio metabólico.', 'a ocorrência de casos de hipertensão e diabetes entre os adolescentes advém das condições de alimentação, enquanto que na população adulta os fatores hereditários são preponderantes.', ' a prática regular de atividade física é um importante fator de controle da diabetes entre a população adolescente, por provocar um constante aumento da pressão arterial sistólica.', 'A'),
(34, 1, 2, 7, 1, '(Enem - 2017) Os textos publicitários são produzidos para cumprir determinadas funções comunicativas. Os objetivos desse cartaz estão voltados para a conscientização dos brasileiros sobre a necessidade de:', 'img\\enemanunciopublicitario.jpg', '2017', 'as crianças frequentarem a escola regularmente.', 'a formação leitora começar na infância.', 'a alfabetização acontecer na idade certa.', 'a literatura ter o seu mercado consumidor ampliado.', 'as escolas desenvolverem campanhas a favor da leitura.', 'B'),
(37, 1, 2, 7, 3, '(PUC-SP) Da garrafa estilhaçada, no ladrilho já sereno escorre uma coisa espessa que é leite, sangue... não sei. Por entre objetos confusos, mal redimidos da noite, duas cores se procuram, suavemente se tocam, amorosamente se enlaçam, formando um terceiro tom a que chamamos aurora.\r\n\r\n(Carlos Drummond de Andrade)\r\n\r\nNo fragmento anterior, Carlos Drummond de Andrade constrói, poeticamente, a aurora. O que permite visualizar este momento do dia corresponde:', NULL, NULL, 'a objetos confusos mal redimido da noite.', 'à garrafa estilhaçada e ao ladrilho sereno.', 'à aproximação suave de dois corpos.', 'ao enlace amoroso de duas cores.', 'ao fluir espesso do sangue sobre o ladrilho.', 'D'),
(38, 1, 2, 7, 1, '(Enem 2013) Quanto à tirinha acima, é correto afirmar:', 'img\\tirinhamafalda.jpg', '2017', 'A linguagem verbal isoladamente não consegue transmitir a mensagem pretendida.', 'Transmite que faz parte da infância pegar as coisas da mãe para brincar.', 'A frase do primeiro quadrinho não pertence à sequência.', 'A principal mensagem da tirinha é a inocência de Mafalda, que responde à mãe que pegou “só” os cremes de beleza, querendo com isso dizer que não pegou outros tipos de cremes para brincar, como de culi', 'A mãe está brava com Mafalda, por isso, a sua fala está com letras maiúsculas.', 'A'),
(39, 1, 2, 7, 2, '(Enem 2017) A tirinha acima é uma crítica:', 'img\\tirinhamafalda2.jpg', '2017', 'ao fato de os pais não explicarem as coisas corretamente às crianças.', 'quanto à cautela dos pais para que as crianças não distorçam na rua o que ouvem em casa.', 'ao fato de as crianças contarem aos amigos o que os pais falam em casa.', 'à fala das pessoas, que muitas vezes não tem importância.', 'ao fato de Mafalda ter criado uma expectativa no amigo que o desiludiu.', 'D'),
(40, 1, 4, 8, 1, '(Enem 2017) Marque a alternativa incorreta:', NULL, '2017', 'Nos ecossistemas, os organismos interagem com outros.', 'Nos ecossistemas, ocorrem relações ecológicas.', 'Nos ecossistemas, os organismos não interagem com fatores físicos.', 'Recifes de coral são exemplos de ecossistemas aquáticos.', 'Nos ecossistemas, o fluxo de energia possui apenas uma direção.', 'C'),
(41, 1, 4, 8, 1, '(Enem 2018) Considerando os níveis de organização biológica, os ecossistemas estão localizados, do nível mais específico para o mais amplo,', NULL, '2018', 'após a população.', 'após as comunidades.', 'antes dos organismos.', 'antes da população.', 'antes da comunidade.', 'B'),
(42, 1, 4, 8, 2, '(FUVEST 2013) O Manguezal é um ecossistema costeiro que ocorre entre os ambientes terrestre e marítimo, característico de regiões tropicais e subtropicais, sujeito à inundação das marés. O manguezal se enquadra no conceito de ecossistema por:', NULL, '2013', 'Possuir fluxo de energia bidirecional.', 'Ser um sistema fechado e autossuficiente.\r\n\r\n', 'Reunir os organismos em um único nível trófico.', 'Impedir movimentos de imigração e emigração de organismos.', 'Compreender ciclos de materiais entre os componentes bióticos e abióticos.', 'E'),
(43, 1, 4, 8, 2, '(FUVEST 2017) Acerca dos ecossistemas aquáticos, foram feitas as afirmativas abaixo. Identifique com V a(s) verdadeira(s) e com F a(s) falsa(s):\r\n\r\n1- Nos rios, a riqueza de organismos planctônicos é maior do que nos lagos.\r\n\r\n2- Nos mares, a maior diversidade de espécies de vida livre, como os peixes, encontra-se no domínio bentônico.\r\n\r\n3- Nos mares, a zona hadal, com biodiversidade pouco conhecida, é também a mais profunda.\r\n\r\n4- Nos lagos e lagoas, o zooplâncton é formado, principalmente, por protozoários, micro-crustáceos e larvas de diversos organismos.\r\n\r\n5- Nos mares, a maior biomassa de fito-plâncton ocorre na zona litoral.\r\n\r\nA sequência correta é:', NULL, '2017', 'FVFVV.', 'VFVFF.', 'VFVFV.', 'FFVVV.', 'FVFVF.', 'D'),
(44, 1, 4, 8, 3, '(PUC-SP 2018) “As plantas mais abundantes são árvores. Altas, só se ramificam perto do topo, de modo que a fronde é elevada e densa. As folhas das árvores são igualmente amplas, espessas e de cor verde-escura com superfícies ventrais brilhantes. As raízes são superficiais e os troncos costumam ser encorpados perto da base, de modo que fornecem fixação ampla e firme. Há numerosas trepadeiras lenhosas, cipós dependurados das árvores como cabos e epífitas.” O texto anterior descreve o seguinte bioma: ', NULL, '2018', 'Savana Tropical', 'Floresta Tropical ', 'Cerrado', 'Caatinga ', 'Tundra', 'B'),
(45, 1, 4, 8, 2, '(Fuvest-SP 2019) \r\nI. As Florestas Tropicais possuem maior diversidade biológica que as Temperadas. \r\nII. As Florestas Tropicais possuem maior diversidade vegetal e menor diversidade animal que as Savanas. \r\nIII. As Florestas Temperadas possuem maior biomassa que a Tundra. \r\nIV. As Savanas possuem maior biomassa que as Florestas Tropicais. \r\nEstá CORRETO apenas o que se afirma em:', NULL, '2019', 'I e II. ', 'I e III. ', 'I e IV. ', 'II e III.', 'III e IV.', 'B'),
(47, 1, 4, 8, 1, '(Enem 2012) Muitas espécies de plantas lenhosas são encontradas no cerrado brasileiro. Para a sobrevivência nas condições de longos períodos de seca e queimadas periódicas, próprias desse ecossistema, essas plantas desenvolveram estruturas muito peculiares. As estruturas adaptativas mais apropriadas para a sobrevivência desse grupo de plantas nas condições ambientais do referido ecossistema são:', NULL, '2012', 'Cascas finas e sem sulcos ou fendas. ', 'Caules estreitos e retilíneos. ', 'Folhas estreitas e membranosas. ', 'Gemas apicais com densa pilosidade.', 'Raízes superficiais, em geral, aéreas. ', 'D'),
(48, 1, 4, 8, 1, '(Enem 2018) Bioma caracterizado pelo frio constante em que poucas espécies sobrevivem, como musgos, liquens e capins surgidos num rápido verão, onde chegam, de outras regiões, aves migratórias, renas, insetos e roedores que saem da hibernação. Temos nesse trecho uma caracterização de : ', NULL, '2018', 'Pampas da Argentina. ', 'Taiga.', 'Estepes da Rússia.', ' Pradarias dos EUA.', 'Tundra. ', 'E'),
(49, 1, 4, 8, 3, '(PUC 2016) Assinale a alternativa correta quanto aos ecossistemas aquáticos. ', NULL, '2016', 'O plâncton é constituído por organismos que flutuam na superfície da água. ', 'Os produtores aquáticos geralmente possuem uma biomassa maior que a dos consumidores.', 'O nécton é formado por organismos que vivem no fundo d\'água. ', 'Tanto o fito-plâncton como o zoo-plâncton são capazes de realizar fotossíntese. ', 'O bênton é constituído por organismos que nadam ativamente no meio da coluna d\'água.', 'A'),
(50, NULL, NULL, NULL, 1, '“Nos estuários brasileiros desenvolve-se um ecossistema que apresenta plantas típicas como Rhizophora sp com raízes escora e Avicennia sp com pneumatóforos, características que lhes permitem melhor fixação e obtenção de O2 no solo lodoso deste ambiente.” O texto se refere a: ', NULL, '2012', 'cerrado. ', 'caatinga. ', 'mangue.', 'floresta atlântica.', 'floresta de araucária. ', 'C'),
(51, 1, 4, 8, 1, '(Enem 2012) “Nos estuários brasileiros desenvolve-se um ecossistema que apresenta plantas típicas como Rhizophora sp com raízes escora e Avicennia sp com pneumatóforos, características que lhes permitem melhor fixação e obtenção de O2 no solo lodoso deste ambiente.” O texto se refere a:', NULL, '2012', 'cerrado.', 'caatinga. ', 'mangue. ', ' floresta atlântica.', 'floresta de araucária. ', 'C'),
(52, 1, 8, 9, 2, '(FUVEST 2017)  “Para o historiador, todos os acontecimentos, mesmo os remotos, têm atualidade e vida. Mas isso é ainda mais verdadeiro no caso da Revolução Francesa de 1789, que transformou o modo de vida até daqueles que pouco souberam ou sabem sobre ela, até hoje em dia. Não será exagero dizer que ela ajudou a dar forma ao mundo ocidental contemporâneo, moldando as instituições e os ideais que nos animam e que consideramos universais.” (GRESPAN, Jorge. Revolução Francesa e Iluminismo. São Paulo: Contexto, 2003. p. 9.)\r\n\r\nSobre a Revolução Francesa, é correto afirmar.', NULL, '2017', 'A Revolução Francesa ocorreu em meio a uma crise econômica e foi produto de revoltas de burgueses, camponeses e trabalhadores urbanos.', 'A Revolução Francesa é considerada a primeira Revolução Comunista, pois, até hoje, esse sistema molda as instituições no mundo ocidental.', 'Foi uma revolução comandada por Napoleão Bonaparte, que, influenciado pelo Iluminismo, organizou um golpe de estado contra Luiz XVI.', 'A Revolução Francesa foi um movimento caracterizado pelo terror, organizado pelo revolucionário Robespierre, em apoio ao absolutismo de Luiz XVI.', 'Trata-se de uma revolução burguesa, inspirada no iluminismo e comandada por Robespierre, na qual o Czar Nicolau II foi executado na guilhotina.', 'A'),
(53, 1, 8, 9, 1, '(PUC 2018) Estendendo-se entre 1789 e 1799, a Revolução Francesa foi um período de intensa experimentação política e social que transformou de maneira irreversível as ideias e práticas anteriores, estabelecendo, assim, um marco de ruptura na história do mundo ocidental. Sobre esse período, considere as afirmativas abaixo:\r\n\r\nI. A Declaração dos Direitos do Homem e do Cidadão proclamou a liberdade e igualdade naturais dos homens.\r\n\r\nII. A Assembleia Nacional Constituinte aboliu o sistema feudal, eliminando antigos privilégios da nobreza.\r\n\r\nIII. A sanção da Constituição Civil do Clero subordinou a igreja e seus sacerdotes ao Estado.\r\n\r\nIV. Durante a Convenção, a escravidão foi abolida nas colônias francesas.\r\n\r\nASSINALE:', NULL, '2018', 'Se todas as afirmativas estiverem corretas.', 'Se somente as afirmativas I e II estiverem corretas.', 'Se somente as afirmativas I, II e III estiverem corretas.', 'Se somente as afirmativas II e IV estiverem corretas.', 'Se somente as afirmativas I, III e IV estiverem corretas.', 'A'),
(54, 1, 8, 9, 2, '(FUVEST 2013) Sobre a Revolução Francesa, iniciada em 1789, é correto afirmar que:', NULL, '2013', 'foi longamente preparada pelo ciclo revolucionário ocorrido na Inglaterra no século XVII, o que explica o apoio que esse país prestou aos revoltosos franceses.', 'tratou-se, principalmente, de uma revolução cultural, ápice do desenvolvimento do chamado iluminismo.', 'não foi devidamente percebida como um movimento relevante por seus contemporâneos, ganhando importância apenas retrospectivamente, com o início da Revolução de 1848.', 'não implicou mudanças significativas na ordem societária dominante no mundo ocidental.', 'apresentou diferentes fases, desembocando em um contexto monárquico, antirrevolucionário e reacionário, representado pelo Congresso de Viena.', 'E'),
(55, 1, 8, 9, 3, '(PUC 2012) No contexto da Revolução Francesa em 1789, a imagem expressa um conjunto de ações que ficou conhecido como', 'img\\revolucao-francesa', '2012', 'Período do Terror, marco das perseguições aos “inimigos da revolução”, durante a ditadura jacobina.', 'Grande Medo, revolta dos camponeses contra a aristocracia francesa que os submetia ao regime de servidão.', 'Revolução Burguesa, marco inicial da luta da burguesia contra os privilégios da nobreza e do clero na França.', 'Período Napoleônico, marcado pela legitimação da rebelião camponesa no Código Civil para garantir a reforma agrária.', 'Queda da Bastilha, marco da adesão popular ao movimento revolucionário iniciado pelo Terceiro Estado na Assembleia Geral.', 'B'),
(56, 1, 8, 9, 1, '(ENEM 2016)O que representou a reação termidoriana (que aconteceu em 1794)?', NULL, '2016', 'A ascensão dos jacobinos, liderados por Maximilien de Robespierre.', 'O golpe que colocou Napoleão Bonaparte no governo francês.', 'A reação das tropas francesas nas batalhas travadas contra as tropas absolutistas.', 'A reação dos conservadores, que, sob a liderança girondina, derrubaram os jacobinos do poder.', ' A violência do povo contra os membros da família real que ainda estavam vivos.', 'D'),
(57, 1, 8, 9, 1, '(ENEM 2017) A Revolução Francesa foi um marco na história da humanidade e considera-se o estopim que iniciou esse conflito:', NULL, '2017', 'o regicídio de Luís XVI.', 'a tentativa de fuga de Luís XVI e Maria Antonieta.', 'a queda da Bastilha.', 'a invasão da França por tropas austríacas.', 'a convocação dos Estados Gerais.', 'C'),
(58, 1, 8, 9, 2, '(FUVEST 2018) O historiador Eric Hobsbawm afirmou que as grandes exigências da burguesia no contexto revolucionário manifestaram-se por meio da Declaração dos Direitos do Homem e do Cidadão. Esse documento manifestava:', NULL, '2018', 'a oposição da sociedade hierarquizada de privilégios sobre a nobreza.', 'o interesse de construir-se uma sociedade transformada e verdadeiramente igualitária.', 'a defesa das ideias estatizantes que viam no Estado o regulador dos problemas sociais.', 'a defesa de uma monarquia absolutista com a instalação do Estado laico.', 'a defesa das ideias socialistas com a emancipação dos trabalhadores.', 'A'),
(59, 1, 8, 9, 3, '(PUC 2012) A respeito da Revolução Francesa, selecione a alternativa com a afirmação FALSA:', NULL, '2012', 'pouco antes do ciclo revolucionário, a França havia enfrentado colheitas ruins.', 'o rei Luís XVI havia tentado fugir em 1791, sendo capturado próximo da fronteira com a Bélgica.', 'os dois grandes grupos do período revolucionário foram os girondinos e os jacobinos.', 'o período do terror aconteceu sob liderança dos jacobinos.', 'a proposta de Olympe de Gouges, chamada Declaração dos Direitos da Mulher e da Cidadã, foi bem recebida na convenção francesa.', 'E'),
(60, 1, 8, 9, 1, '(ENEM 2013) A Lei dos Suspeitos foi aprovada durante a fase em que os jacobinos estiveram à frente da França. Essa lei determinava:', NULL, '2013', 'todos os austríacos eram considerados traidores.', 'todos os suspeitos de trair a revolução seriam presos.', 'todos os nobres estavam expulsos da França.', 'confisco de 90% dos bens da nobreza francesa.', 'expulsão do clero do território francês.', 'B'),
(61, 1, 8, 9, 2, '(FUVEST 2017) Considera-se que o golpe de 18 de Brumário foi o evento que finalizou o ciclo revolucionário na França. Por meio desse acontecimento, houve: ', NULL, '2017', 'o retorno do absolutismo na França.', 'a ascensão de Napoleão Bonaparte ao poder.', 'a entrega do poder francês aos austríacos.', 'a tomada de Paris pelos sans-cullottes.', 'a apropriação dos fundos da Igreja Católica na França.', 'B'),
(62, 1, 8, 9, 3, '(ENEM 2018) A Revolução Francesa foi um dos momentos mais marcantes no que se refere à mobilização popular. A defesa da igualdade e a luta contra os privilégios da nobreza francesa imortalizaram qual lema revolucionário:', NULL, '2018', 'Paz, pão e terra', 'Liberdade, igualdade e fraternidade', 'Deus, pátria e família', 'Abaixo a burguesia', 'É proibido proibir', 'B'),
(63, 1, 8, 9, 3, '(ENEM 2019) Um dos capítulos da Revolução Francesa foi o decreto da Constituição Civil do Clero, em 1790. Esse documento determinava:', NULL, '2019', 'plena liberdade para a Igreja Católica na França.', 'a expulsão da Igreja Católica da França.', 'a Igreja sob controle do Estado francês.', 'um imposto de 45% sobre todos os rendimentos da Igreja na França.', 'tomar todas as terras da Igreja para promover a reforma agrária.', 'C'),
(65, 2, 1, 2, 1, 'Como não são adeptos da prática de esportes, um grupo de amigos resolveu fazer um torneio de futebol utilizando videogame. Decidiram que cada jogador joga uma única vez com cada um dos outros jogadores. O campeão será aquele que conseguir o maior número de pontos. Observaram que o número de partidas jogadas depende do número de jogadores, como mostra o quadro:\r\nQuantidade de jogadores\r\n2 3 4 5 6 7\r\n\r\nNúmero de partidas\r\n1 3 6 10 15 21\r\n\r\nSe a quantidade de jogadores for 8, quantas partidas serão realizadas?', 'img/questao/11290ca57be3ea5ea267adf1c9e62ed3.', '2017', '64', '56', '49', '36', '28', 'E'),
(66, 2, 1, 2, 2, 'Participam de um torneio de voleibol, 20 times distribuídos em 4 chaves, de 5 times cada.\r\n \r\n\r\nNa 1ª fase do torneio, os times jogam entre si uma única vez (um único turno), todos contra todos em cada chave, sendo que os 2 melhores de cada chave passam para a 2ª fase.\r\n\r\n \r\n\r\nNa 2ª fase, os jogos são eliminatórios; depois de cada partida, apenas o vencedor permanece no torneio.\r\n\r\n \r\n\r\nLogo, o número de jogos necessários até que se apure o campeão do torneio é', 'img/questao/11290ca57be3ea5ea267adf1c9e62ed3.', '2005', '39', '41', '43', '45', '47', 'E'),
(67, 2, 1, 2, 1, 'Doze times se inscreveram em um torneio de futebol amador. O jogo de abertura do torneio foi escolhido da seguinte forma: primeiro foram sorteados 4 times para compor o Grupo A. Em seguida, entre os times do Grupo A, foram sorteados 2 times para realizar o jogo de abertura do torneio, sendo que o primeiro deles jogaria em seu próprio campo, e o segundo seria o time visitante.\r\n \r\n\r\nA quantidade total de escolhas possíveis para o Grupo A e a quantidade total de escolhas dos times do jogo de abertura podem ser calculadas através de', 'img/questao/11290ca57be3ea5ea267adf1c9e62ed3.', '2019', 'uma combinação e um arranjo, respectivamente.', 'um arranjo e uma combinação, respectivamente.', 'um arranjo e uma permutação, respectivamente.', ' duas combinações.', 'dois arranjos.', 'A'),
(68, 2, 8, 9, 1, 'Oi Paulo', 'img/questao/11290ca57be3ea5ea267adf1c9e62ed3.', '2010', 'a', 'a', 'a', 'a', 'a', 'E');

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
-- Estrutura da tabela `tb_respostausuario`
--

CREATE TABLE `tb_respostausuario` (
  `idRespostaUsuario` int(11) NOT NULL COMMENT 'PK - Código identificador da resposta do usuário',
  `idUsuario` int(11) NOT NULL COMMENT 'FK - Código identificador do usuário',
  `idQuestao` int(11) NOT NULL COMMENT 'FK - Código identificador da questão',
  `DataHoraResposta` datetime NOT NULL COMMENT 'Data e hora que o usuário respondeu a questão'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_respostausuario`
--

INSERT INTO `tb_respostausuario` (`idRespostaUsuario`, `idUsuario`, `idQuestao`, `DataHoraResposta`) VALUES
(1, 1, 3, '2021-09-27 17:15:48');

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
(2, 1, 'Análise Combinatória'),
(3, 1, 'Expressões Numéricas'),
(4, 1, 'Op. Número Naturais'),
(5, 1, 'Op. Números Inteiros'),
(6, 1, 'Regra de três'),
(7, 2, 'Inter. De Texto'),
(8, 4, 'Ecossistemas'),
(9, 8, 'Revolução Francesa');

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
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`idUsuario`, `idTipoUsuario`, `Foto`, `Nome`, `Email`, `Senha`, `FlgAtivo`) VALUES
(1, 1, 'img/evelyn.PNG', 'Evelyn ADM', 'eve@gmail.com', '202cb962ac59075b964b07152d234b70', 'S'),
(2, 2, NULL, 'Ana', 'ana@naoexiste.com', '202cb962ac59075b964b07152d234b70', 'S'),
(3, 2, 'dist/img/usuario/user-default.png', 'Evelyn Bittelbrunn', 'evelyn_bittelbrunn@estudante.sc.senai.br', '100f3d3d053395ead33207c1cb8674fe', 'S');

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
-- Índices para tabela `tb_notificacao`
--
ALTER TABLE `tb_notificacao`
  ADD PRIMARY KEY (`idNotificacao`),
  ADD KEY `fk_Usuario` (`idUsuario`);

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
-- Índices para tabela `tb_respostausuario`
--
ALTER TABLE `tb_respostausuario`
  ADD PRIMARY KEY (`idRespostaUsuario`),
  ADD KEY `tb_Usuario` (`idUsuario`),
  ADD KEY `tb_Questao` (`idQuestao`);

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
  MODIFY `idBanca` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador da banca', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_curiosidade`
--
ALTER TABLE `tb_curiosidade`
  MODIFY `idCuriosidade` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador da curiosidade';

--
-- AUTO_INCREMENT de tabela `tb_favorito`
--
ALTER TABLE `tb_favorito`
  MODIFY `idFavorito` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador da questão favoritada', AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `tb_notificacao`
--
ALTER TABLE `tb_notificacao`
  MODIFY `idNotificacao` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador da notificação', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_questao`
--
ALTER TABLE `tb_questao`
  MODIFY `idQuestao` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador da questão', AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de tabela `tb_respostasimulado`
--
ALTER TABLE `tb_respostasimulado`
  MODIFY `idRespostaUsuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador da resposta do usuário';

--
-- AUTO_INCREMENT de tabela `tb_respostausuario`
--
ALTER TABLE `tb_respostausuario`
  MODIFY `idRespostaUsuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador da resposta do usuário', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_simulado`
--
ALTER TABLE `tb_simulado`
  MODIFY `idSimulado` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador do simulado';

--
-- AUTO_INCREMENT de tabela `tb_tipoassunto`
--
ALTER TABLE `tb_tipoassunto`
  MODIFY `idTipoAssunto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador do tipo de assunto da questão', AUTO_INCREMENT=10;

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
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador do usuário', AUTO_INCREMENT=4;

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
-- Limitadores para a tabela `tb_notificacao`
--
ALTER TABLE `tb_notificacao`
  ADD CONSTRAINT `fk_Usuario` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`);

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
-- Limitadores para a tabela `tb_respostausuario`
--
ALTER TABLE `tb_respostausuario`
  ADD CONSTRAINT `tb_Questao` FOREIGN KEY (`idQuestao`) REFERENCES `tb_questao` (`idQuestao`),
  ADD CONSTRAINT `tb_Usuario` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`);

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
