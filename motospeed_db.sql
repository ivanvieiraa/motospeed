-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Maio-2024 às 13:53
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `motospeed`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome_categoria`) VALUES
(1, 'Capacetes'),
(2, 'Casacos'),
(3, 'Calças'),
(4, 'Luvas'),
(5, 'Botas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhe_venda`
--

CREATE TABLE `detalhe_venda` (
  `id_venda` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `tamanho` varchar(255) NOT NULL,
  `preco_uni` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nome_marca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nome_marca`) VALUES
(1, 'Alpinestars'),
(2, 'Scorpion'),
(3, 'AGV'),
(4, 'Dainese'),
(6, 'Shoei'),
(7, 'Shark'),
(9, 'Armure');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_prod` int(11) NOT NULL,
  `nome_prod` varchar(150) NOT NULL,
  `preco_prod` float DEFAULT NULL,
  `desc_prod` text NOT NULL,
  `foto_prod` varchar(255) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `criado_a` datetime DEFAULT current_timestamp(),
  `alterado_a` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_prod`, `nome_prod`, `preco_prod`, `desc_prod`, `foto_prod`, `id_marca`, `id_categoria`, `criado_a`, `alterado_a`, `status`) VALUES
(2, 'Scorpion EXO 520 Air', 199.99, ' Capacete integral confeccionado em policarbonato injetado com homologação ECE 22-06 e projetado especificamente para proporcionar um nível aerodinâmico esportivo aliado ao conforto de um capacete de uso diário. O Exo-520 Evo Air destaca-se por incorporar o protetor solar Speedview® integrado, mecanismo de viseira Ellip-Tech®, interior acolchoado Kwikwick®2 e um sistema de ventilação eficaz.', 'uploads/produtos/scorpion-520air.png', 2, 1, '2024-03-19 17:36:29', '2024-05-11 15:22:12', 1),
(5, 'AGV Pista GP RR', 1499, 'Capacete Agv Pista GP RR E2206 Futuro Carbonio Forgiato. O novo Pista GP RR é homologado de acordo com os regulamentos de corrida da FIM e os novos regulamentos ECE 22.06. A Pista GP RR Futuro Carbonio Forgiato foi fabricada com carcaça e asa PRO Spoiler em carbono forjado exclusivo e detalhes na cor Elettro Iridium. A estrutura de carbono forjado com acabamento fosco torna cada concha e cada PRO Spoiler uma peça única. Os detalhes e a tela na cor exclusiva Elettro Iridium são inspirados na potência silenciosa e limpa do futuro da mobilidade.', 'uploads/produtos/agv-pista.png', 3, 1, '2024-05-09 22:11:19', '2024-05-11 12:42:01', 1),
(8, 'Shark Race-R PRO', 695, 'Capacete Shark Race-R Pro GP 06 Blank Matte Black . Shark evolui seu capacete mais esportivo e equipa o novo Race-R Pro GP 06 com os novos regulamentos ECE 22.06. A casca externa feita com estrutura COVA (fibra de carbono e aramida) oferece excelente desempenho aerodinâmico. Ele tem o recorde de velocidade na MotoGP capturado em 363,6 km/h! O spoiler traseiro destaca-se por melhorar o desempenho aerodinâmico e a estabilidade em alta velocidade. Este é o capacete topo de gama, fruto da experiência da Shark nos mais altos escalões de competição (MotoGP e SBK) com mais de 250 pódios.', 'uploads/produtos/shark.png', 7, 1, '2024-05-09 22:19:50', '2024-05-09 22:20:13', 1),
(9, 'DAINESE AVRO 4 ', 495.99, 'Casaco de pele Dainese Avro 4 Preto Mate / Branco. Casaco desportivo confeccionado em pele bovina de primeira qualidade; destaca-se pelo seu conforto, segurança e design. Possui proteções certificadas nos ombros e cotovelos e inserções de alumínio nos ombros.', 'uploads/produtos/dainese-avro4.png', 4, 2, '2024-05-11 13:33:39', '2024-05-11 15:28:02', 1),
(10, 'DAINESE ELETTRICA AIR', 149.99, ' Jaqueta de verão com forro térmico desmontável. Confeccionada em tecido D-Synth 350, dispõe de forro térmico desmontável para ser usada inclusive durante os dias mais frios. Incorpora proteções compostas desmontáveis certificadas em ombros e cotovelos. ', 'uploads/produtos/dainese-elettrica.png', 4, 2, '2024-05-11 14:50:45', '2024-05-14 18:42:50', 1),
(11, 'SHOEI VFX-WR 06', 539, 'O capacete Shoei VFX-WR 06 é o capacete Off-Road de sucesso que possui a homologação ECE 22-06 junto com avanços tecnológicos e alto desempenho. O capacete VFX-WR 06 caracteriza-se por ser muito leve, resistente e por incorporar o sistema MEDS (Movement Energy Distribution System) que reduz significativamente a energia transmitida ao capacete em caso de impacto. ', 'uploads/produtos/vfc-wr.png', 6, 1, '2024-05-11 14:53:48', '2024-05-23 14:49:58', 1),
(12, 'SHARK Vairal Anger', 259, 'Capacete Shark Varial Anger Preto / Azul / Fúcsia. Fabricado em fibra de vidro, o Varial combina um design agressivo, com detalhes e acabamentos de primeira qualidade.', 'uploads/produtos/varial-anger.png', 7, 1, '2024-05-11 14:55:31', '2024-05-31 09:58:08', 1),
(13, 'AGV X70 FLAKE ', 129, 'Capacete AGV X70 Grey (coleção Legends ). A Agv inventou o capacete a jato de fibra em 1954. O X70 foi projetado no mesmo formato e cores, mas com a tecnologia AGV atual. Caracteriza-se por oferecer uma concha limpa e arredondada e detalhes vintage.', 'uploads/produtos/X70-flake.png', 3, 1, '2024-05-11 14:59:45', '2024-05-11 14:59:48', 1),
(14, 'SHOEI J-CRUISE 2', 425.99, 'O J-Cruise 2 é mais moderno e seguro, e dispõe de um sistema de ventilação e de alguns acolchoados interiores totalmente evoluídos.', 'uploads/produtos/shoei-j-cruise2.png', 6, 1, '2024-05-11 15:02:00', NULL, 1),
(15, 'SCORPION EXO-230 SR', 150, 'Capacete Scorpion Exo-230 SR Azul Escuro / Branco. Capacete Jet com design moderno, muito prático e funcional para uso urbano. Feito de policarbonato avançado, possui uma grande viseira transparente com predisposição para Pinlock (não incluído) e acolchoamento interno Kwikwick C muito confortável.', 'uploads/produtos/exo-230-sr.png', 2, 1, '2024-05-11 15:03:24', '2024-05-11 15:20:10', 1),
(16, 'ALPINESTARS SUPERTECH S-M8', 420, 'Capacete Alpinestars Supertech S-M8 Radium 2 Preto / Branco. Capacete Alpinestars SM-8 incorpora os últimos avanços tecnológicos e caracteriza-se por ser muito leve, confortável e arejado.', 'uploads/produtos/supertech-sm8.webp', 1, 1, '2024-05-11 15:03:35', '2024-05-11 15:06:45', 1),
(17, 'ALPINESTARS STELLA', 449.9, 'Alpinestars Kira V2 Lady Couro Jaqueta Preto . Jaqueta esportiva com estampa feminina em couro de primeira qualidade. Possui painéis extensíveis estrategicamente colocados para oferecer o máximo de flexibilidade e conforto. Ele incorpora um forro térmico removível e entradas de ar com zíper para se adaptar a diferentes condições climáticas.', 'uploads/produtos/alpine-stella.webp', 1, 2, '2024-05-20 21:55:06', NULL, 1),
(18, 'ARMURE HAMO', 220, ' Jaqueta esportiva em couro bovino e tecido elástico. Possui forro térmico removível e entradas de ar com zíper para se adaptar às adversidades do clima. Incorpora proteções substituíveis nos ombros e cotovelos e controles deslizantes externos. ', 'uploads/produtos/armure-hamo.webp', 9, 2, '2024-05-20 21:56:51', NULL, 1),
(19, 'ARMUR MACK', 114.99, 'Armure Mack Jaqueta impermeável para senhora ivory. Jaqueta versátil estilo touring com ajuste específico para mulheres que incorpora uma membrana totalmente impermeável, forro térmico removível e entradas de ar para se adaptar perfeitamente a todos os tipos de condições climáticas.', 'uploads/produtos/armure-mack.webp', 9, 2, '2024-05-20 21:58:21', NULL, 1),
(20, 'DAINESE ENERGYCA', 320, 'Jaqueta Dainese Energyca Air Tex Preto / Vermelho fluo. Casaco ventilado com um design agressivo, feito de uma combinação de tecido Cordura Comfort muito resistente e grandes painéis de tecido de malha. Possui uma membrana corta-vento removível para se adaptar perfeitamente às condições climáticas de cada momento. ', 'uploads/produtos/dainese-energyca.webp', 4, 2, '2024-05-20 21:59:57', NULL, 1),
(21, 'DAINESE IMPETO', 125, 'Luva de pele de punho longo, que oferece uma ótima proteção e conforto. São fabricadas a partir de pele de cabra, e têm protetor de espuma de poliuretano nas dobradiças do punho. Destacam-se por oferecer um excelente conforto, sensibilidade e ajuste.', 'uploads/produtos/dainese-impeto.webp', 4, 4, '2024-05-20 22:06:54', NULL, 1),
(22, 'DAINESE IMPETO', 95, 'Luva de pele de punho longo, que oferece uma ótima proteção e conforto. São fabricadas a partir de pele de cabra, e têm protetor de espuma de poliuretano nas dobradiças do punho. ', 'uploads/produtos/dainese-impetoo.webp', 4, 4, '2024-05-20 22:07:59', NULL, 1),
(23, 'ALPINESTARS SMX-1', 80, 'Luvas Alpinestars SMX-1 Air V2 Preto / Branco. Luvas curtas de design agressivo confeccionadas em combinação de pele e malha 3D. Estão equipados com a inovadora proteção de carbono da Alpinestars nas dobradiças do punho e reforços em áreas críticas. ', 'uploads/produtos/apline-smx.webp', 1, 4, '2024-05-20 22:08:52', NULL, 1),
(24, 'ALPINESTARS TOURER', 100.99, 'Luvas Alpinestars Tourer W-7 V2 Drystar Pretas . Luvas impermeáveis e isoladas para uso Touring no inverno e em baixas temperaturas. Confeccionada em mix de couro e tecido Softshell para maior durabilidade e conforto. A membrana impermeável Drystar® oferece respirabilidade e evita a entrada de água e, juntamente com o duplo isolamento Thinsulate™, oferece excelente proteção contra o frio.', 'uploads/produtos/alpine-tourer.webp', 1, 4, '2024-05-20 22:10:57', NULL, 1),
(25, 'ARMURE KERR', 40, 'Armure Kerr Vented Lady Gloves Preto. Luvas curtas com ajuste específico para mulher, feitas de uma combinação de pele de cabra e malha de poliéster. Eles incorporam proteções de TPU nas articulações.', 'uploads/produtos/armure-kerr.webp', 9, 4, '2024-05-20 22:12:01', NULL, 1),
(26, 'DAINESE UNRULY', 116.99, 'Luvas Dainese Unruly Ergo-Tek Preto / Vermelho. A construção das costas em malha sem costuras oferece grande elasticidade e liberdade de movimentos, que se combinam com os elevados níveis de segurança garantidos pela proteção dos nós dos dedos com tecnologia Ergo-Tek, concebida para garantir a total mobilidade da mão ao proteger os mais áreas expostas.', 'uploads/produtos/dainese-unruly.webp', 4, 4, '2024-05-20 22:14:28', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_tamanhos`
--

CREATE TABLE `produtos_tamanhos` (
  `id_prod` int(11) NOT NULL,
  `tamanho` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `produtos_tamanhos`
--

INSERT INTO `produtos_tamanhos` (`id_prod`, `tamanho`, `stock`) VALUES
(2, 'L', 100),
(2, 'M', 400),
(2, 'S', 300),
(2, 'XL', 500),
(2, 'XS', 200),
(8, 'L', 10),
(8, 'M', 20),
(8, 'S', 30),
(8, 'XL', 40),
(8, 'XS', 50),
(9, 'L', 20),
(9, 'M', 30),
(9, 'S', 50),
(9, 'XL', 10),
(9, 'XS', 50),
(10, 'L', 50),
(10, 'M', 50),
(10, 'S', 50),
(10, 'XL', 50),
(10, 'XS', 50),
(11, 'L', 10),
(11, 'M', 20),
(11, 'S', 30),
(11, 'XL', 10),
(11, 'XS', 20),
(12, 'L', 40),
(12, 'M', 170),
(12, 'S', 220),
(12, 'XL', 165),
(12, 'XS', 200),
(13, 'L', 15),
(13, 'M', 20),
(13, 'S', 30),
(13, 'XL', 45),
(13, 'XS', 65),
(14, 'L', 20),
(14, 'M', 30),
(14, 'S', 10),
(14, 'XL', 10),
(14, 'XS', 10),
(16, 'L', 200),
(16, 'M', 200),
(16, 'S', 200),
(16, 'XL', 200),
(16, 'XS', 20),
(17, 'L', 20),
(17, 'M', 30),
(17, 'S', 50),
(17, 'XL', 150),
(17, 'XS', 600),
(18, 'L', 120),
(18, 'M', 120),
(18, 'S', 120),
(18, 'XL', 120),
(18, 'XS', 120),
(19, 'L', 200),
(19, 'M', 200),
(19, 'S', 200),
(19, 'XL', 200),
(19, 'XS', 200),
(20, 'L', 150),
(20, 'M', 800),
(20, 'S', 1200),
(20, 'XL', 600),
(20, 'XS', 200),
(21, 'L', 200),
(21, 'M', 200),
(21, 'S', 200),
(21, 'XL', 300),
(21, 'XS', 500),
(22, 'L', 150),
(22, 'M', 100),
(22, 'S', 25),
(22, 'XL', 300),
(22, 'XS', 500),
(23, 'L', 400),
(23, 'M', 200),
(23, 'S', 140),
(23, 'XL', 70),
(23, 'XS', 52),
(24, 'L', 100),
(24, 'M', 100),
(24, 'S', 100),
(24, 'XL', 100),
(24, 'XS', 100),
(25, 'L', 100),
(25, 'M', 100),
(25, 'S', 100),
(25, 'XL', 100),
(25, 'XS', 100),
(26, 'L', 40),
(26, 'M', 40),
(26, 'S', 40),
(26, 'XL', 40),
(26, 'XS', 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `suporte`
--

CREATE TABLE `suporte` (
  `id_suporte` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `mensagem` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `criado_a` datetime DEFAULT current_timestamp(),
  `atualizado_a` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `suporte`
--

INSERT INTO `suporte` (`id_suporte`, `email`, `assunto`, `mensagem`, `status`, `criado_a`, `atualizado_a`) VALUES
(1, 'tiagoneto381@gmail.com', 'Conta desativada', 'Tentei fazer login e a minha conta foi desativada', 0, '2024-05-29 08:56:02', '2024-05-29 08:59:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanhos`
--

CREATE TABLE `tamanhos` (
  `tamanho` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tamanhos`
--

INSERT INTO `tamanhos` (`tamanho`) VALUES
('L'),
('M'),
('S'),
('XL'),
('XS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `apelido` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `data_nasc` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT 'uploads/users/default.png',
  `morada` varchar(255) DEFAULT NULL,
  `codigop` varchar(9) DEFAULT NULL,
  `adm` tinyint(1) DEFAULT NULL,
  `criado_a` datetime DEFAULT current_timestamp(),
  `alterado_a` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `nome`, `apelido`, `email`, `pass`, `data_nasc`, `foto`, `morada`, `codigop`, `adm`, `criado_a`, `alterado_a`, `status`) VALUES
(49, 'Admin', 'Admin', 'motospeed2024@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00', 'uploads/users/mstile-150x150.png', '', '', 1, '2024-04-28 21:50:28', '2024-05-08 17:02:13', 1),
(50, 'Ivan', 'Vieira', 'ivannvieiraa@outlook.pt', '5788e2b0db1849bbe8ce4f21f63471b6', '2006-10-07', 'uploads/users/default.png', '', '', 0, '2024-04-28 22:05:41', '2024-05-23 14:58:56', 1),
(52, 'Ariana', 'Cunha', 'arianacunha@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00', 'uploads/users/default.png', '', '', 0, '2024-05-08 16:28:31', '2024-05-23 14:58:59', 1),
(57, 'teste', 'teste', 'teste@gmail.com', '698dc19d489c4e4db73e28a713eab07b', '0000-00-00', 'uploads/users/default.png', '', '', 0, '2024-05-31 09:18:43', '2024-05-31 09:58:39', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data_venda` date NOT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `detalhe_venda`
--
ALTER TABLE `detalhe_venda`
  ADD KEY `id_venda` (`id_venda`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Índices para tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices para tabela `produtos_tamanhos`
--
ALTER TABLE `produtos_tamanhos`
  ADD PRIMARY KEY (`id_prod`,`tamanho`);

--
-- Índices para tabela `suporte`
--
ALTER TABLE `suporte`
  ADD PRIMARY KEY (`id_suporte`);

--
-- Índices para tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  ADD PRIMARY KEY (`tamanho`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `suporte`
--
ALTER TABLE `suporte`
  MODIFY `id_suporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `detalhe_venda`
--
ALTER TABLE `detalhe_venda`
  ADD CONSTRAINT `detalhe_venda_ibfk_1` FOREIGN KEY (`id_venda`) REFERENCES `vendas` (`id_venda`),
  ADD CONSTRAINT `detalhe_venda_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `produtos` (`id_prod`),
  ADD CONSTRAINT `fk_id_venda` FOREIGN KEY (`id_venda`) REFERENCES `vendas` (`id_venda`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`),
  ADD CONSTRAINT `produtos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Limitadores para a tabela `produtos_tamanhos`
--
ALTER TABLE `produtos_tamanhos`
  ADD CONSTRAINT `fk_id_prod` FOREIGN KEY (`id_prod`) REFERENCES `produtos` (`id_prod`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
