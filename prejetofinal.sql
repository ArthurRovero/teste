-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Dez-2021 às 00:42
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `prejetofinal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome`) VALUES
(1, 'AÇÃO'),
(2, 'AVENTURA'),
(3, 'RACING'),
(4, 'ESPORTES'),
(5, 'HORROR'),
(6, 'RPG'),
(7, 'RACK\'N SLASH'),
(8, 'FIRST\' P SHOOTER'),
(9, 'MUNDO ABERTO'),
(10, 'SIMULADOR'),
(11, 'ACTION RPG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `preco` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `id_categoria` varchar(30) NOT NULL,
  `Imagem` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `preco`, `descricao`, `id_categoria`, `Imagem`) VALUES
(57, 'God of War PC, Digital Edition', '199.00', 'As aventuras de Claiton recomessaram após sua aposentadoria em outro universo mítico, derrote inimigos sanguinários neste game maravilhoso, e agora tambem disponivel para PC. ', '2', 0x636c6569746f6e2e6a7067),
(58, 'Elden Ring: PS5, PC, Midia Digital', '249.00', 'Jogo mais Hypado da história, depois claro de Cyberpunk 2077, mas diferente deste, Elden Ring vai ser bom, eu juro!', '6', 0x656c64656e72696e672e6a7067),
(59, 'Far Cry 6: PS5, PS4, PC, XBOX Midia Digital', '249.00', 'O vilao de Breaking Bad, agora é o Vilao deste fenomenal Game de tiro em mundo aberto, com sua tropa, derrote a tirania desta ameaça. ', '8', 0x666172637279362e6a7067),
(60, 'Forza Horizon 5: PC, PS5, XBOX Midia Digital', '199.00', 'Embusca da Corrida perfeita, entre nessa aventura na ilha paradisíaca no México e vença todos os seus oponentes com estilo.', '3', 0x666f727a61352e6a7067),
(61, 'PES 202: PS4, XBOX ONE, PC', '220.00', 'É só um jogo de futebol msm, nada de mais!', '4', 0x7065732e6a7067),
(62, 'Assassins Creed Valhalla: PS5, XBOX SS, PC', '239.00', 'Embarque em uma aventura Vicking, faça grandeis feitos na pele de um caçador ', '2', 0x617373617373696e732e6a7067),
(63, 'GTA The Trilogy: PC, PS5, XBOX SS', '299.00', 'Finalmente a Trilogia de jogos da Rockstar mais aclamada em versões Remasterizadas', '9', 0x6774612e6a7067),
(64, 'Outlast: PC, PS4, XBOX ONE', '79.00', 'Jogue até suas calças ficarem pesadas, adentre em um asilo cheio de malucos, cuidado com os Homem Pinto, isso aqui nao é a \"Perlate\" meu parçeru!', '5', 0x6f75746c6173742e6a7067),
(72, 'Forspoken: PS5, Xbox Ss, PC', '349.00', 'Forspoken conta a jornada de Frey precisa usar suas habilidades mágicas recém-descobertas para explorar e enfrentar criaturas monstruosas em busca de um caminho de volta.', '2', 0x666f7273706f6b656e2e6a7067),
(73, 'Dark Souls III: PC, PS4, Xbox One', '129.00', 'Melhor jogo do mundo, pode falar o que for, poem no chinelo só o jogo dos mega drive', '6', 0x4461726b5f536f756c732e6a7067);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_comentarios`
--

CREATE TABLE `tabela_comentarios` (
  `id_tabela_comentario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `horario` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tabela_comentarios`
--

INSERT INTO `tabela_comentarios` (`id_tabela_comentario`, `nome`, `comentario`, `horario`) VALUES
(191, 'kenai', 'aaaaaaa', '2021-12-13 15:07:01'),
(199, 'arthur rovero', 'Site top, nota 2,5', '2021-12-14 01:34:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabloide_interessados`
--

CREATE TABLE `tabloide_interessados` (
  `id_tabloide_interessado` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tabloide_interessados`
--

INSERT INTO `tabloide_interessados` (`id_tabloide_interessado`, `nome`, `email`) VALUES
(1, 'Arthur', 'Arthur@gotmail.com'),
(7, 'joao', 'jaozinr@.com'),
(8, 'Tatiane', 'tatiane.123@htmail.com'),
(10, 'Arthur', 'Arthur@.com'),
(11, 'Daniel', 'soares@cuu.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `whatsapp` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`, `email`, `whatsapp`) VALUES
(38, 'joao_vitor', 'e10adc3949ba59abbe56e057f20f883e', 'jaodositio@hotmail.com', '0'),
(39, 'Jao-do-sitio', 'e10adc3949ba59abbe56e057f20f883e', 'jaozinho@sitioforever.com', '0'),
(40, 'xuxu', '202cb962ac59075b964b07152d234b70', 'xuxu@hot.com', '0'),
(41, 'arthur rovero', 'e10adc3949ba59abbe56e057f20f883e', 'joaodositio@hotmail', '1423567890'),
(42, 'arthurarthurarthurarthurarthur', 'e10adc3949ba59abbe56e057f20f883e', '', '0'),
(43, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '0'),
(44, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '0'),
(45, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '0'),
(46, 'aaaaaaaaaaaa', '451599a5f9afa91a0f2097040a796f3d', 'aaaaa@art.com', '0'),
(47, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '0'),
(48, 'nanco bandai', 'e10adc3949ba59abbe56e057f20f883e', 'nanco.banday@dev.com', '2147483647'),
(49, 'tatiane masseu', 'e10adc3949ba59abbe56e057f20f883e', 'tati.masseu123@gmail.com', '2147483647'),
(50, 'kenai', 'e10adc3949ba59abbe56e057f20f883e', 'kenai@gato.com', '14996713287');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `fk_produto_categoria` (`id_produto`);

--
-- Índices para tabela `tabela_comentarios`
--
ALTER TABLE `tabela_comentarios`
  ADD PRIMARY KEY (`id_tabela_comentario`);

--
-- Índices para tabela `tabloide_interessados`
--
ALTER TABLE `tabloide_interessados`
  ADD PRIMARY KEY (`id_tabloide_interessado`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de tabela `tabela_comentarios`
--
ALTER TABLE `tabela_comentarios`
  MODIFY `id_tabela_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de tabela `tabloide_interessados`
--
ALTER TABLE `tabloide_interessados`
  MODIFY `id_tabloide_interessado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
