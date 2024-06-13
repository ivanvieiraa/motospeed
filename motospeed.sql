-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jun-2024 às 23:04
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

--
-- Extraindo dados da tabela `detalhe_venda`
--

INSERT INTO `detalhe_venda` (`id_venda`, `id_prod`, `quantidade`, `tamanho`, `preco_uni`) VALUES
(66, 16, 1, 'M', 420),
(67, 15, 1, 'S', 150),
(68, 5, 1, 'S', 1499),
(68, 17, 1, 'S', 449.9),
(69, 9, 1, 'XL', 495.99),
(69, 16, 1, 'M', 420),
(70, 16, 1, 'M', 420),
(71, 9, 1, 'XL', 495.99),
(72, 21, 1, 'XS', 125),
(73, 11, 1, 'XL', 539),
(74, 26, 1, 'S', 116.99),
(75, 22, 1, 'XS', 95),
(76, 15, 1, 'XL', 150),
(76, 21, 1, 'M', 125),
(77, 5, 1, 'S', 1499),
(78, 5, 1, 'M', 1499),
(78, 5, 1, 'L', 1499),
(79, 25, 1, 'L', 40),
(79, 23, 1, 'M', 80),
(79, 23, 1, 'L', 80),
(80, 2, 1, 'M', 199.99),
(81, 21, 1, 'M', 125),
(82, 2, 1, 'XL', 199.99),
(82, 2, 1, 'M', 199.99),
(82, 9, 1, 'S', 495.99),
(82, 15, 1, 'XL', 150),
(82, 21, 1, 'S', 125),
(82, 27, 1, 'XS', 500),
(82, 29, 1, 'M', 325),
(82, 33, 1, 'XL', 79.95),
(83, 33, 1, 'M', 79.95),
(83, 2, 1, 'M', 199.99),
(84, 13, 2, 'XL', 129),
(84, 5, 1, 'XL', 1499),
(85, 2, 1, 'XS', 199.99),
(86, 8, 1, 'S', 695),
(87, 21, 1, 'M', 125),
(87, 21, 1, 'S', 125),
(87, 17, 1, 'M', 449.9),
(87, 2, 2, 'XS', 199.99),
(87, 2, 1, 'M', 199.99);

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
  `id_subcategoria` int(11) DEFAULT NULL,
  `criado_a` datetime DEFAULT current_timestamp(),
  `alterado_a` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_prod`, `nome_prod`, `preco_prod`, `desc_prod`, `foto_prod`, `id_marca`, `id_subcategoria`, `criado_a`, `alterado_a`, `status`) VALUES
(2, 'Scorpion EXO 520 Air', 199.99, ' Capacete integral confeccionado em policarbonato injetado com homologação ECE 22-06 e projetado especificamente para proporcionar um nível aerodinâmico esportivo aliado ao conforto de um capacete de uso diário. O Exo-520 Evo Air destaca-se por incorporar o protetor solar Speedview® integrado, mecanismo de viseira Ellip-Tech®, interior acolchoado Kwikwick®2 e um sistema de ventilação eficaz.', 'uploads/produtos/scorpion-520air.png', 2, 1, '2024-03-19 17:36:29', '2024-06-10 20:47:16', 1),
(5, 'AGV Pista GP RR', 1499, 'Capacete Agv Pista GP RR E2206 Futuro Carbonio Forgiato. O novo Pista GP RR é homologado de acordo com os regulamentos de corrida da FIM e os novos regulamentos ECE 22.06. A Pista GP RR Futuro Carbonio Forgiato foi fabricada com carcaça e asa PRO Spoiler em carbono forjado exclusivo e detalhes na cor Elettro Iridium. A estrutura de carbono forjado com acabamento fosco torna cada concha e cada PRO Spoiler uma peça única. Os detalhes e a tela na cor exclusiva Elettro Iridium são inspirados na potência silenciosa e limpa do futuro da mobilidade.', 'uploads/produtos/agv-pista.png', 3, 1, '2024-05-09 22:11:19', '2024-06-10 10:09:37', 1),
(8, 'Shark Race-R PRO', 695, 'Capacete Shark Race-R Pro GP 06 Blank Matte Black . Shark evolui seu capacete mais esportivo e equipa o novo Race-R Pro GP 06 com os novos regulamentos ECE 22.06. A casca externa feita com estrutura COVA (fibra de carbono e aramida) oferece excelente desempenho aerodinâmico. Ele tem o recorde de velocidade na MotoGP capturado em 363,6 km/h! O spoiler traseiro destaca-se por melhorar o desempenho aerodinâmico e a estabilidade em alta velocidade. Este é o capacete topo de gama, fruto da experiência da Shark nos mais altos escalões de competição (MotoGP e SBK) com mais de 250 pódios.', 'uploads/produtos/shark.png', 7, 1, '2024-05-09 22:19:50', '2024-06-10 10:09:41', 1),
(9, 'DAINESE AVRO 4 ', 495.99, 'Casaco de pele Dainese Avro 4 Preto Mate / Branco. Casaco desportivo confeccionado em pele bovina de primeira qualidade; destaca-se pelo seu conforto, segurança e design. Possui proteções certificadas nos ombros e cotovelos e inserções de alumínio nos ombros.', 'uploads/produtos/dainese-avro4.png', 4, 3, '2024-05-11 13:33:39', '2024-06-10 10:10:01', 1),
(10, 'DAINESE ELETTRICA AIR', 149.99, ' Jaqueta de verão com forro térmico desmontável. Confeccionada em tecido D-Synth 350, dispõe de forro térmico desmontável para ser usada inclusive durante os dias mais frios. Incorpora proteções compostas desmontáveis certificadas em ombros e cotovelos. ', 'uploads/produtos/dainese-elettrica.png', 4, 4, '2024-05-11 14:50:45', '2024-06-10 10:10:11', 1),
(11, 'SHOEI VFX-WR 06', 539, 'O capacete Shoei VFX-WR 06 é o capacete Off-Road de sucesso que possui a homologação ECE 22-06 junto com avanços tecnológicos e alto desempenho. O capacete VFX-WR 06 caracteriza-se por ser muito leve, resistente e por incorporar o sistema MEDS (Movement Energy Distribution System) que reduz significativamente a energia transmitida ao capacete em caso de impacto. ', 'uploads/produtos/vfc-wr.png', 6, 2, '2024-05-11 14:53:48', '2024-06-10 10:10:37', 1),
(12, 'SHARK Vairal Anger', 259, 'Capacete Shark Varial Anger Preto / Azul / Fúcsia. Fabricado em fibra de vidro, o Varial combina um design agressivo, com detalhes e acabamentos de primeira qualidade.', 'uploads/produtos/varial-anger.png', 7, 2, '2024-05-11 14:55:31', '2024-06-10 10:10:54', 1),
(13, 'AGV X70 FLAKE ', 129, 'Capacete AGV X70 Grey (coleção Legends ). A Agv inventou o capacete a jato de fibra em 1954. O X70 foi projetado no mesmo formato e cores, mas com a tecnologia AGV atual. Caracteriza-se por oferecer uma concha limpa e arredondada e detalhes vintage.', 'uploads/produtos/X70-flake.png', 3, 11, '2024-05-11 14:59:45', '2024-06-10 12:42:51', 1),
(14, 'SHOEI J-CRUISE 2', 425.99, 'O J-Cruise 2 é mais moderno e seguro, e dispõe de um sistema de ventilação e de alguns acolchoados interiores totalmente evoluídos.', 'uploads/produtos/shoei-j-cruise2.png', 6, 11, '2024-05-11 15:02:00', '2024-06-10 12:44:51', 1),
(15, 'SCORPION EXO-230 SR', 150, 'Capacete Scorpion Exo-230 SR Azul Escuro / Branco. Capacete Jet com design moderno, muito prático e funcional para uso urbano. Feito de policarbonato avançado, possui uma grande viseira transparente com predisposição para Pinlock (não incluído) e acolchoamento interno Kwikwick C muito confortável.', 'uploads/produtos/exo-230-sr.png', 2, 11, '2024-05-11 15:03:24', '2024-06-13 20:26:04', 1),
(16, 'ALPINESTARS SUPERTECH S-M8', 420, 'Capacete Alpinestars Supertech S-M8 Radium 2 Preto / Branco. Capacete Alpinestars SM-8 incorpora os últimos avanços tecnológicos e caracteriza-se por ser muito leve, confortável e arejado.', 'uploads/produtos/supertech-sm8.webp', 1, 2, '2024-05-11 15:03:35', '2024-06-10 10:12:39', 1),
(17, 'ALPINESTARS STELLA', 449.9, 'Alpinestars Kira V2 Lady Couro Jaqueta Preto . Jaqueta esportiva com estampa feminina em couro de primeira qualidade. Possui painéis extensíveis estrategicamente colocados para oferecer o máximo de flexibilidade e conforto. Ele incorpora um forro térmico removível e entradas de ar com zíper para se adaptar a diferentes condições climáticas.', 'uploads/produtos/alpine-stella.webp', 1, 3, '2024-05-20 21:55:06', '2024-06-10 10:13:01', 1),
(18, 'ARMURE HAMO', 220, ' Jaqueta esportiva em couro bovino e tecido elástico. Possui forro térmico removível e entradas de ar com zíper para se adaptar às adversidades do clima. Incorpora proteções substituíveis nos ombros e cotovelos e controles deslizantes externos. ', 'uploads/produtos/armure-hamo.webp', 9, 3, '2024-05-20 21:56:51', '2024-06-10 10:13:10', 1),
(19, 'ARMUR MACK', 114.99, 'Armure Mack Jaqueta impermeável para senhora ivory. Jaqueta versátil estilo touring com ajuste específico para mulheres que incorpora uma membrana totalmente impermeável, forro térmico removível e entradas de ar para se adaptar perfeitamente a todos os tipos de condições climáticas.', 'uploads/produtos/armure-mack.webp', 9, 4, '2024-05-20 21:58:21', '2024-06-10 10:13:27', 1),
(20, 'DAINESE ENERGYCA', 320, 'Jaqueta Dainese Energyca Air Tex Preto / Vermelho fluo. Casaco ventilado com um design agressivo, feito de uma combinação de tecido Cordura Comfort muito resistente e grandes painéis de tecido de malha. Possui uma membrana corta-vento removível para se adaptar perfeitamente às condições climáticas de cada momento. ', 'uploads/produtos/dainese-energyca.webp', 4, 4, '2024-05-20 21:59:57', '2024-06-10 10:13:31', 1),
(21, 'DAINESE IMPETO', 125, 'Luva de pele de punho longo, que oferece uma ótima proteção e conforto. São fabricadas a partir de pele de cabra, e têm protetor de espuma de poliuretano nas dobradiças do punho. Destacam-se por oferecer um excelente conforto, sensibilidade e ajuste.', 'uploads/produtos/dainese-impeto.webp', 4, 7, '2024-05-20 22:06:54', '2024-06-10 10:14:05', 1),
(22, 'DAINESE IMPETO', 95, 'Luva de pele de punho longo, que oferece uma ótima proteção e conforto. São fabricadas a partir de pele de cabra, e têm protetor de espuma de poliuretano nas dobradiças do punho. ', 'uploads/produtos/dainese-impetoo.webp', 4, 7, '2024-05-20 22:07:59', '2024-06-10 10:14:08', 1),
(23, 'ALPINESTARS SMX-1', 80, 'Luvas Alpinestars SMX-1 Air V2 Preto / Branco. Luvas curtas de design agressivo confeccionadas em combinação de pele e malha 3D. Estão equipados com a inovadora proteção de carbono da Alpinestars nas dobradiças do punho e reforços em áreas críticas. ', 'uploads/produtos/apline-smx.webp', 1, 8, '2024-05-20 22:08:52', '2024-06-10 10:14:24', 1),
(24, 'ALPINESTARS TOURER', 100.99, 'Luvas Alpinestars Tourer W-7 V2 Drystar Pretas . Luvas impermeáveis e isoladas para uso Touring no inverno e em baixas temperaturas. Confeccionada em mix de couro e tecido Softshell para maior durabilidade e conforto. A membrana impermeável Drystar® oferece respirabilidade e evita a entrada de água e, juntamente com o duplo isolamento Thinsulate™, oferece excelente proteção contra o frio.', 'uploads/produtos/alpine-tourer.webp', 1, 12, '2024-05-20 22:10:57', '2024-06-10 22:35:01', 1),
(25, 'ARMURE KERR', 40, 'Armure Kerr Vented Lady Gloves Preto. Luvas curtas com ajuste específico para mulher, feitas de uma combinação de pele de cabra e malha de poliéster. Eles incorporam proteções de TPU nas articulações.', 'uploads/produtos/armure-kerr.webp', 9, 8, '2024-05-20 22:12:01', '2024-06-10 10:14:39', 1),
(26, 'DAINESE UNRULY', 116.99, 'Luvas Dainese Unruly Ergo-Tek Preto / Vermelho. A construção das costas em malha sem costuras oferece grande elasticidade e liberdade de movimentos, que se combinam com os elevados níveis de segurança garantidos pela proteção dos nós dos dedos com tecnologia Ergo-Tek, concebida para garantir a total mobilidade da mão ao proteger os mais áreas expostas.', 'uploads/produtos/dainese-unruly.webp', 4, 8, '2024-05-20 22:14:28', '2024-06-10 10:14:46', 1),
(27, 'ALPINESTARS TRACK V2 BLACK', 500, 'Calça de couro Alpinestars Track V2 Preto. Calça desportiva confeccionado em couro de primeira qualidade. Possui proteções internas homologadas nos joelhos e quadris, e dois tipos de deslizaderas externas (Sport e DFS) na zona dos joelhos para maior segurança.', 'uploads/produtos/track-v2.avif', 1, 5, '2024-06-05 01:16:47', '2024-06-10 10:15:11', 1),
(28, 'DAINESE CARVE MASTER 3', 404, 'Calças Dainese Carve Master 3 Gore-Tex Preto / Ebony. É a terceira geração do icônico conjunto Carve Master, que se destaca por oferecer excelente conforto em todos os tipos de condições. Calças de alto rendimento e muito confortáveis para uso Sport-Touring.', 'uploads/produtos/dainese-carve_master_3.avif', 4, 6, '2024-06-07 00:15:53', '2024-06-10 10:15:58', 1),
(29, 'SPORT MASTER GORE-TEX', 325, 'Botas Dainese Sport Master Gore-Tex pretas. Projetadas para os pilotos mais exigentes, as botas Sport Master combinam os segmentos de esporte e turismo com a máxima expressão. Feitas de microfibra e tecido D-Stone, as botas Dainese Sport Master Gore-Tex possuem membrana Gore-Tex impermeável e respirável para oferecer excelente desempenho em qualquer condição climática. ', 'uploads/produtos/dainese-sport_master_gore_tex_black_001-0-M-200148481.avif', 4, 9, '2024-06-07 00:16:47', '2024-06-10 10:16:09', 1),
(30, 'ALPINESTARS BOGOTÁ PRO', 269, 'Apinestars Bogotá Pro Drystar Calça Vlaro Cinza / Cinza Escuro / Amarelo Fluo. Calças touring muito versáteis e funcionais, ideais para todo o tipo de condições climatéricas. Incorpora o sistema \"Liner to drop\" que permite diferentes configurações em diferentes condições meteorológicas.', 'uploads/produtos/alpinestars-bogot_pro_drystar_ice_gray_dark_gray_yellow_fluo_9195-2-M-2004767110.avif', 1, 6, '2024-06-07 00:17:37', '2024-06-10 10:16:28', 1),
(31, 'ARMURE AREN WATERPROOF', 160, 'Calça Impermeável Armure Aren Cinzento / Verde / Vermelho. Calças versáteis estilo turismo / aventura com membrana impermeável, forro térmico removível e entradas de ar para se adaptarem perfeitamente a todos os tipos de condições climáticas.', 'uploads/produtos/armure-aren_waterproof_grey_green_red_36-4-M-2002425829.avif', 9, 6, '2024-06-07 00:18:32', '2024-06-10 10:16:43', 1),
(32, 'SHOEI VFX-WR 06', 699, 'Capacete Shoei VFX-WR 06 Jammer TC-1 . O capacete Shoei VFX-WR 06 é o capacete Off-Road de sucesso que possui a homologação ECE 22-06 junto com avanços tecnológicos e alto desempenho. O capacete VFX-WR 06 caracteriza-se por ser muito leve, resistente e por incorporar o sistema MEDS (Movement Energy Distribution System) que reduz significativamente a energia transmitida ao capacete em caso de impacto.', 'uploads/produtos/shoei-vfx_wr_06_jammer_tc_1-2-M-2012593419.avif', 6, 2, '2024-06-10 11:46:16', '2024-06-10 20:50:04', 1),
(33, 'ARMURE RUPERT BLUE', 79.95, 'Calça Armure Rupert Azul. Calça estilo urbano muito confortável e elástico reforçado com fibra de aramida para maior resistência à abrasão. Incorpora protecções de joelho com certificação CE.', 'uploads/produtos/armure-armure_rupert_blue_97-10-M-200150871.avif', 9, 13, '2024-06-10 23:06:32', NULL, 1);

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
(2, 'L', 15),
(2, 'M', 96),
(2, 'S', 123),
(2, 'XL', 342),
(2, 'XS', 143),
(5, 'L', 89),
(5, 'M', 42),
(5, 'S', 89),
(5, 'XL', 89),
(5, 'XS', 90),
(8, 'L', 100),
(8, 'M', 100),
(8, 'S', 99),
(8, 'XL', 100),
(8, 'XS', 100),
(9, 'L', 100),
(9, 'M', 100),
(9, 'S', 99),
(9, 'XL', 98),
(9, 'XS', 100),
(10, 'L', 100),
(10, 'M', 100),
(10, 'S', 100),
(10, 'XL', 100),
(10, 'XS', 100),
(11, 'L', 100),
(11, 'M', 100),
(11, 'S', 100),
(11, 'XL', 99),
(11, 'XS', 100),
(12, 'L', 100),
(12, 'M', 100),
(12, 'S', 100),
(12, 'XL', 100),
(12, 'XS', 100),
(13, 'L', 20),
(13, 'M', 20),
(13, 'S', 20),
(13, 'XL', 18),
(13, 'XS', 20),
(14, 'L', 100),
(14, 'M', 100),
(14, 'S', 100),
(14, 'XL', 100),
(14, 'XS', 100),
(15, 'L', 95),
(15, 'M', 20),
(15, 'S', 99),
(15, 'XL', 98),
(15, 'XS', 100),
(16, 'L', 100),
(16, 'M', 97),
(16, 'S', 100),
(16, 'XL', 100),
(16, 'XS', 100),
(17, 'L', 100),
(17, 'M', 99),
(17, 'S', 99),
(17, 'XL', 100),
(17, 'XS', 100),
(18, 'L', 100),
(18, 'M', 100),
(18, 'S', 100),
(18, 'XL', 100),
(18, 'XS', 100),
(19, 'L', 100),
(19, 'M', 100),
(19, 'S', 100),
(19, 'XL', 100),
(19, 'XS', 100),
(20, 'L', 100),
(20, 'M', 100),
(20, 'S', 100),
(20, 'XL', 100),
(20, 'XS', 100),
(21, 'L', 100),
(21, 'M', 97),
(21, 'S', 98),
(21, 'XL', 100),
(21, 'XS', 500),
(22, 'L', 100),
(22, 'M', 200),
(22, 'S', 100),
(22, 'XL', 100),
(22, 'XS', 99),
(23, 'L', 99),
(23, 'M', 99),
(23, 'S', 100),
(23, 'XL', 100),
(23, 'XS', 100),
(24, 'L', 100),
(24, 'M', 100),
(24, 'S', 100),
(24, 'XL', 100),
(24, 'XS', 100),
(25, 'L', 99),
(25, 'M', 100),
(25, 'S', 100),
(25, 'XL', 100),
(25, 'XS', 100),
(26, 'L', 100),
(26, 'M', 100),
(26, 'S', 99),
(26, 'XL', 100),
(26, 'XS', 100),
(27, 'L', 100),
(27, 'M', 100),
(27, 'S', 50),
(27, 'XL', 100),
(27, 'XS', 99),
(28, 'L', 100),
(28, 'M', 100),
(28, 'S', 100),
(28, 'XL', 100),
(28, 'XS', 100),
(29, 'L', 100),
(29, 'M', 99),
(29, 'S', 100),
(29, 'XL', 100),
(29, 'XS', 100),
(30, 'L', 100),
(30, 'M', 100),
(30, 'S', 100),
(30, 'XL', 100),
(30, 'XS', 100),
(31, 'L', 100),
(31, 'M', 100),
(31, 'S', 100),
(31, 'XL', 100),
(31, 'XS', 100),
(32, 'L', 100),
(32, 'M', 100),
(32, 'S', 100),
(32, 'XL', 100),
(32, 'XS', 100),
(33, 'L', 200),
(33, 'M', 149),
(33, 'S', 100),
(33, 'XL', 49),
(33, 'XS', 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id_subcategoria` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nome_subcategoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `subcategorias`
--

INSERT INTO `subcategorias` (`id_subcategoria`, `id_categoria`, `nome_subcategoria`) VALUES
(1, 1, 'Corrida'),
(2, 1, 'Motocross'),
(3, 2, 'Cabedal'),
(4, 2, 'Tecido'),
(5, 3, 'Cabedal'),
(6, 3, 'Tecido'),
(7, 4, 'Cabedal'),
(8, 4, 'Tecido'),
(9, 5, 'Cabedal'),
(10, 5, 'Tecido'),
(11, 1, 'Aberto'),
(12, 4, 'Inverno'),
(13, 3, 'Casuais');

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
(4, 'nunovieira280@gmail.com', 'Informação sobre stock', 'Boa tarde, venho por meio pedir que me alertem quando o produto \"DAINESE IMPETO\" fique novamente disponível no tamanho \"M\"...\r\n\r\nEstou bastante interessado neste produto.\r\n\r\nAtenciosamente,\r\nIvan Vieira', 0, '2024-06-10 20:49:02', '2024-06-13 22:00:43'),
(5, 'antonioeric2806@gmail.com', 'Ajuda', 'Boa noite, preciso de ajuda com recuperação da minha password.', 0, '2024-06-11 00:05:59', '2024-06-13 22:00:42'),
(7, 'ivannvieiraa@outlook.pt', 'Ajuda com data de nascimento', 'Boa noite, Enganei-me a introduzir a minha data de nascimento...', 0, '2024-06-12 22:37:37', '2024-06-13 21:59:32');

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
(49, 'Admin', 'Motospeed', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2006-10-07', 'uploads/users/mstile-150x150.png', 'Rua da solidariadade, Lote 16', '1675-269', 1, '2024-04-28 21:50:28', '2024-06-13 21:12:18', 1),
(50, 'Ivan', 'Vieira', 'ivannvieiraa@outlook.pt', 'b7727d252be76bc6d142e19315cfc8fd', '2006-10-07', 'uploads/users/default.png', 'R/C, 1 Andar', '1675-629', 0, '2024-04-28 22:05:41', '2024-06-12 22:43:31', 1),
(59, 'Carolina', 'Alves', 'caroliinalves@gmail.com', '5f3bc5221626b2f8d66261fb07339462', '0000-00-00', 'uploads/users/default.png', '', '', 0, '2024-06-10 20:35:36', '2024-06-13 20:34:29', 1),
(60, 'Tiago', 'Neto', 'tiagoneto381@gmail.com', 'c11845c9a05c8df7b137f49504dd918b', NULL, 'uploads/users/default.png', NULL, NULL, 0, '2024-06-10 23:55:55', NULL, 1),
(61, 'Eric', 'António', 'antonioeric2806@gmail.com', '29988429c481f219b8c5ba8c071440e1', '2006-08-02', 'uploads/users/default.png', 'Rua do lago, Nº9, R/C', '2825-011', 0, '2024-06-11 00:00:14', '2024-06-11 00:04:10', 1),
(62, 'ivan', 'Silva', 'ivan_casilva11@hotmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '1998-09-26', 'uploads/users/default.png', 'Rua 123', '1874-965', 0, '2024-06-12 22:08:58', '2024-06-13 20:37:15', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data_venda` date NOT NULL,
  `total` float DEFAULT NULL,
  `envio` float NOT NULL,
  `nome` varchar(255) NOT NULL,
  `apelido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `morada` varchar(255) NOT NULL,
  `codigop` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `id_user`, `data_venda`, `total`, `envio`, `nome`, `apelido`, `email`, `morada`, `codigop`) VALUES
(66, 50, '2024-05-02', 429.99, 9.99, 'Ivan', 'Vieira', 'ivannvieiraa@outlook.pt', 'R/C, 1 Andar', '1675-629'),
(67, 49, '2024-05-21', 154.99, 4.99, 'Ivan', 'Vieira', 'motospeed2024@gmail.com', 'Rua da solidariadade, Lote 16', '1675-629'),
(68, 49, '2024-05-15', 1953.89, 4.99, 'Ivan', 'Vieira', 'motospeed2024@gmail.com', 'Rua da solidariadade, Lote 16', '1675-629'),
(69, 49, '2024-04-10', 915.99, 0, 'Ivan', 'Vieira', 'motospeed2024@gmail.com', 'Rua da solidariadade, Lote 16', '1675-629'),
(70, 49, '2024-04-16', 420, 0, 'Ivan', 'Vieira', 'motospeed2024@gmail.com', 'Rua da solidariadade, Lote 16', '1675-629'),
(71, 49, '2024-04-15', 495.99, 0, 'Ivan', 'Vieira', 'motospeed2024@gmail.com', 'Rua da solidariadade, Lote 16', '1675-629'),
(72, 49, '2024-03-12', 125, 0, 'Ivan', 'Vieira', 'motospeed2024@gmail.com', 'Rua da solidariadade, Lote 16', '1675-629'),
(73, 50, '2024-03-25', 539, 0, 'Ivan', 'Vieira', 'ivannvieiraa@outlook.pt', 'R/C, 1 Andar', '1675-629'),
(74, 50, '2024-06-06', 116.99, 0, 'Ivan', 'Vieira', 'ivannvieiraa@outlook.pt', 'R/C, 1 Andar', '1675-629'),
(75, 50, '2024-06-06', 95, 0, 'Ivan', 'Vieira', 'ivannvieiraa@outlook.pt', 'R/C, 1 Andar', '1675-629'),
(76, 49, '2024-06-10', 284.99, 9.99, 'Ivan', 'Vieira', 'motospeed2024@gmail.com', 'Rua da solidariadade, Lote 16', '1675-629'),
(77, 49, '2024-06-11', 1503.99, 4.99, 'Ivan', 'Vieira', 'motospeed2024@gmail.com', 'Rua da solidariadade, Lote 16', '1675-629'),
(78, 49, '2024-06-11', 3002.99, 4.99, 'Ivan', 'Vieira', 'motospeed2024@gmail.com', 'Rua da solidariadade, Lote 16', '1675-629'),
(79, 60, '2024-06-11', 204.99, 4.99, 'Tiago', 'Neto', 'tiagoneto@gmail.com', 'Largo da romeira, Nº4', '2805-236'),
(80, 60, '2024-06-11', 209.98, 9.99, 'Tiago', 'Neto', 'tiagoneto381@gmail.com', 'Largo da romeira, Nº4', '2805-236'),
(81, 61, '2024-06-11', 129.99, 4.99, 'Eric', 'António', 'antonioeric2806@gmail.com', 'Rua do lago, Nº9, RC / C', '2825-011'),
(82, 49, '2024-06-11', 2075.92, 0, 'Ivan', 'Vieira', 'motospeed2024@gmail.com', 'Rua da solidariadade, Lote 16', '1675-629'),
(83, 50, '2024-06-11', 279.94, 0, 'Ivan', 'Vieira', 'ivannvieiraa@outlook.pt', 'R/C, 1 Andar', '1675-629'),
(84, 62, '2024-06-12', 1761.99, 4.99, 'ivan', 'Silva', 'ivan_casilva11@hotmail.com', 'R/C, 1 Andar', '2975-299'),
(85, 49, '2024-06-12', 209.98, 9.99, 'Ivan', 'Vieira', 'motospeed2024@gmail.com', 'Rua da solidariadade, Lote 16', '1675-629'),
(86, 62, '2024-06-12', 699.99, 4.99, 'ivan', 'Silva', 'ivan_casilva11@hotmail.com', 'Teste123', '2858-369'),
(87, 49, '2024-06-13', 1304.86, 4.99, 'Ivan', 'Vieira', 'ivannvieiraa@outlook.pt', 'Rua da solidariadade, Lote 20', '1675-629');

-- --------------------------------------------------------

--
-- Estrutura da tabela `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `wishlist`
--

INSERT INTO `wishlist` (`id`, `id_user`, `id_prod`) VALUES
(105, 59, 18);

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
  ADD KEY `fk_produtos_subcategorias` (`id_subcategoria`);

--
-- Índices para tabela `produtos_tamanhos`
--
ALTER TABLE `produtos_tamanhos`
  ADD PRIMARY KEY (`id_prod`,`tamanho`);

--
-- Índices para tabela `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id_subcategoria`),
  ADD KEY `id_categoria` (`id_categoria`);

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
-- Índices para tabela `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_prod` (`id_prod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `suporte`
--
ALTER TABLE `suporte`
  MODIFY `id_suporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de tabela `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

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
  ADD CONSTRAINT `fk_produtos_subcategorias` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategorias` (`id_subcategoria`),
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`);

--
-- Limitadores para a tabela `produtos_tamanhos`
--
ALTER TABLE `produtos_tamanhos`
  ADD CONSTRAINT `fk_id_prod` FOREIGN KEY (`id_prod`) REFERENCES `produtos` (`id_prod`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `subcategorias_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Limitadores para a tabela `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `produtos` (`id_prod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
