-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jun-2024 às 18:42
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS motospeed;
CREATE DATABASE motospeed;
USE motospeed;


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
(1, 'CAPACETES'),
(2, 'CASACOS'),
(3, 'CALÇAS'),
(4, 'LUVAS'),
(5, 'BOTAS');

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
(79, 2, 1, 'S', 199.99),
(80, 2, 1, 'M', 199.99),
(80, 2, 2, 'L', 199.99),
(81, 9, 1, 'L', 495.99),
(82, 27, 1, 'S', 500),
(83, 21, 1, 'M', 125),
(84, 29, 1, 'XL', 325),
(84, 12, 1, 'L', 259),
(85, 5, 1, 'XS', 1499);

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
(1, 'ALPINESTARS'),
(2, 'SCORPION'),
(3, 'AGV'),
(4, 'DAINESE'),
(6, 'SHOEI'),
(7, 'SHARK'),
(9, 'ARMURE'),
(14, 'LS2');

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
(2, 'Scorpion EXO 520 Air', 199.99, ' Capacete integral confeccionado em policarbonato injetado com homologação ECE 22-06 e projetado especificamente para proporcionar um nível aerodinâmico esportivo aliado ao conforto de um capacete de uso diário. O Exo-520 Evo Air destaca-se por incorporar o protetor solar Speedview® integrado, mecanismo de viseira Ellip-Tech®, interior acolchoado Kwikwick®2 e um sistema de ventilação eficaz.', 'uploads/produtos/scorpion-520air.png', 2, 1, '2024-03-19 17:36:29', '2024-06-10 10:19:57', 1),
(5, 'AGV Pista GP RR', 1499, 'Capacete Agv Pista GP RR E2206 Futuro Carbonio Forgiato. O novo Pista GP RR é homologado de acordo com os regulamentos de corrida da FIM e os novos regulamentos ECE 22.06. A Pista GP RR Futuro Carbonio Forgiato foi fabricada com carcaça e asa PRO Spoiler em carbono forjado exclusivo e detalhes na cor Elettro Iridium. A estrutura de carbono forjado com acabamento fosco torna cada concha e cada PRO Spoiler uma peça única. Os detalhes e a tela na cor exclusiva Elettro Iridium são inspirados na potência silenciosa e limpa do futuro da mobilidade.', 'uploads/produtos/agv-pista.png', 3, 1, '2024-05-09 22:11:19', '2024-06-19 15:22:00', 1),
(8, 'Shark Race-R PRO', 695, 'Capacete Shark Race-R Pro GP 06 Blank Matte Black . Shark evolui seu capacete mais esportivo e equipa o novo Race-R Pro GP 06 com os novos regulamentos ECE 22.06. A casca externa feita com estrutura COVA (fibra de carbono e aramida) oferece excelente desempenho aerodinâmico. Ele tem o recorde de velocidade na MotoGP capturado em 363,6 km/h! O spoiler traseiro destaca-se por melhorar o desempenho aerodinâmico e a estabilidade em alta velocidade. Este é o capacete topo de gama, fruto da experiência da Shark nos mais altos escalões de competição (MotoGP e SBK) com mais de 250 pódios.', 'uploads/produtos/shark.png', 7, 1, '2024-05-09 22:19:50', '2024-06-10 10:09:41', 1),
(9, 'DAINESE AVRO 4 ', 495.99, 'Casaco de pele Dainese Avro 4 Preto Mate / Branco. Casaco desportivo confeccionado em pele bovina de primeira qualidade; destaca-se pelo seu conforto, segurança e design. Possui proteções certificadas nos ombros e cotovelos e inserções de alumínio nos ombros.', 'uploads/produtos/dainese-avro4.png', 4, 3, '2024-05-11 13:33:39', '2024-06-10 10:10:01', 1),
(10, 'DAINESE ELETTRICA AIR', 149.99, ' Jaqueta de verão com forro térmico desmontável. Confeccionada em tecido D-Synth 350, dispõe de forro térmico desmontável para ser usada inclusive durante os dias mais frios. Incorpora proteções compostas desmontáveis certificadas em ombros e cotovelos. ', 'uploads/produtos/dainese-elettrica.png', 4, 4, '2024-05-11 14:50:45', '2024-06-10 10:10:11', 1),
(11, 'SHOEI VFX-WR 06', 539, 'O capacete Shoei VFX-WR 06 é o capacete Off-Road de sucesso que possui a homologação ECE 22-06 junto com avanços tecnológicos e alto desempenho. O capacete VFX-WR 06 caracteriza-se por ser muito leve, resistente e por incorporar o sistema MEDS (Movement Energy Distribution System) que reduz significativamente a energia transmitida ao capacete em caso de impacto. ', 'uploads/produtos/vfc-wr.png', 6, 2, '2024-05-11 14:53:48', '2024-06-10 10:10:37', 1),
(12, 'SHARK Vairal Anger', 259, 'Capacete Shark Varial Anger Preto / Azul / Fúcsia. Fabricado em fibra de vidro, o Varial combina um design agressivo, com detalhes e acabamentos de primeira qualidade.', 'uploads/produtos/varial-anger.png', 7, 2, '2024-05-11 14:55:31', '2024-06-10 10:10:54', 1),
(13, 'AGV X70 FLAKE ', 129, 'Capacete AGV X70 Grey (coleção Legends ). A Agv inventou o capacete a jato de fibra em 1954. O X70 foi projetado no mesmo formato e cores, mas com a tecnologia AGV atual. Caracteriza-se por oferecer uma concha limpa e arredondada e detalhes vintage.', 'uploads/produtos/X70-flake.png', 3, 11, '2024-05-11 14:59:45', '2024-06-10 12:42:51', 1),
(14, 'SHOEI J-CRUISE 2', 425.99, 'O J-Cruise 2 é mais moderno e seguro, e dispõe de um sistema de ventilação e de alguns acolchoados interiores totalmente evoluídos.', 'uploads/produtos/shoei-j-cruise2.png', 6, 11, '2024-05-11 15:02:00', '2024-06-10 12:44:51', 1),
(15, 'SCORPION EXO-230 SR', 150, 'Capacete Scorpion Exo-230 SR Azul Escuro / Branco. Capacete Jet com design moderno, muito prático e funcional para uso urbano. Feito de policarbonato avançado, possui uma grande viseira transparente com predisposição para Pinlock (não incluído) e acolchoamento interno Kwikwick C muito confortável.', 'uploads/produtos/exo-230-sr.png', 2, 11, '2024-05-11 15:03:24', '2024-06-10 12:44:55', 1),
(16, 'ALPINESTARS SUPERTECH S-M8', 420, 'Capacete Alpinestars Supertech S-M8 Radium 2 Preto / Branco. Capacete Alpinestars SM-8 incorpora os últimos avanços tecnológicos e caracteriza-se por ser muito leve, confortável e arejado.', 'uploads/produtos/supertech-sm8.webp', 1, 2, '2024-05-11 15:03:35', '2024-06-10 10:12:39', 1),
(17, 'ALPINESTARS STELLA', 449.9, 'Alpinestars Kira V2 Lady Couro Jaqueta Preto . Jaqueta esportiva com estampa feminina em couro de primeira qualidade. Possui painéis extensíveis estrategicamente colocados para oferecer o máximo de flexibilidade e conforto. Ele incorpora um forro térmico removível e entradas de ar com zíper para se adaptar a diferentes condições climáticas.', 'uploads/produtos/alpine-stella.webp', 1, 3, '2024-05-20 21:55:06', '2024-06-10 10:13:01', 1),
(18, 'ARMURE HAMO', 220, ' Jaqueta esportiva em couro bovino e tecido elástico. Possui forro térmico removível e entradas de ar com zíper para se adaptar às adversidades do clima. Incorpora proteções substituíveis nos ombros e cotovelos e controles deslizantes externos. ', 'uploads/produtos/armure-hamo.webp', 9, 3, '2024-05-20 21:56:51', '2024-06-10 10:13:10', 1),
(19, 'ARMUR MACK', 114.99, 'Armure Mack Jaqueta impermeável para senhora ivory. Jaqueta versátil estilo touring com ajuste específico para mulheres que incorpora uma membrana totalmente impermeável, forro térmico removível e entradas de ar para se adaptar perfeitamente a todos os tipos de condições climáticas.', 'uploads/produtos/armure-mack.webp', 9, 4, '2024-05-20 21:58:21', '2024-06-10 10:13:27', 1),
(20, 'DAINESE ENERGYCA', 320, 'Jaqueta Dainese Energyca Air Tex Preto / Vermelho fluo. Casaco ventilado com um design agressivo, feito de uma combinação de tecido Cordura Comfort muito resistente e grandes painéis de tecido de malha. Possui uma membrana corta-vento removível para se adaptar perfeitamente às condições climáticas de cada momento. ', 'uploads/produtos/dainese-energyca.webp', 4, 4, '2024-05-20 21:59:57', '2024-06-10 10:13:31', 1),
(21, 'DAINESE IMPETO', 125, 'Luva de pele de punho longo, que oferece uma ótima proteção e conforto. São fabricadas a partir de pele de cabra, e têm protetor de espuma de poliuretano nas dobradiças do punho. Destacam-se por oferecer um excelente conforto, sensibilidade e ajuste.', 'uploads/produtos/dainese-impeto.webp', 4, 7, '2024-05-20 22:06:54', '2024-06-10 10:14:05', 1),
(22, 'DAINESE IMPETO', 95, 'Luva de pele de punho longo, que oferece uma ótima proteção e conforto. São fabricadas a partir de pele de cabra, e têm protetor de espuma de poliuretano nas dobradiças do punho. ', 'uploads/produtos/dainese-impetoo.webp', 4, 7, '2024-05-20 22:07:59', '2024-06-10 10:14:08', 1),
(23, 'ALPINESTARS SMX-1', 80, 'Luvas Alpinestars SMX-1 Air V2 Preto / Branco. Luvas curtas de design agressivo confeccionadas em combinação de pele e malha 3D. Estão equipados com a inovadora proteção de carbono da Alpinestars nas dobradiças do punho e reforços em áreas críticas. ', 'uploads/produtos/apline-smx.webp', 1, 8, '2024-05-20 22:08:52', '2024-06-10 10:14:24', 1),
(24, 'ALPINESTARS TOURER', 100.99, 'Luvas Alpinestars Tourer W-7 V2 Drystar Pretas . Luvas impermeáveis e isoladas para uso Touring no inverno e em baixas temperaturas. Confeccionada em mix de couro e tecido Softshell para maior durabilidade e conforto. A membrana impermeável Drystar® oferece respirabilidade e evita a entrada de água e, juntamente com o duplo isolamento Thinsulate™, oferece excelente proteção contra o frio.', 'uploads/produtos/alpine-tourer.webp', 1, 8, '2024-05-20 22:10:57', '2024-06-10 10:14:34', 1),
(25, 'ARMURE KERR', 40, 'Armure Kerr Vented Lady Gloves Preto. Luvas curtas com ajuste específico para mulher, feitas de uma combinação de pele de cabra e malha de poliéster. Eles incorporam proteções de TPU nas articulações.', 'uploads/produtos/armure-kerr.webp', 9, 8, '2024-05-20 22:12:01', '2024-06-10 10:14:39', 1),
(26, 'DAINESE UNRULY', 116.99, 'Luvas Dainese Unruly Ergo-Tek Preto / Vermelho. A construção das costas em malha sem costuras oferece grande elasticidade e liberdade de movimentos, que se combinam com os elevados níveis de segurança garantidos pela proteção dos nós dos dedos com tecnologia Ergo-Tek, concebida para garantir a total mobilidade da mão ao proteger os mais áreas expostas.', 'uploads/produtos/dainese-unruly.webp', 4, 8, '2024-05-20 22:14:28', '2024-06-10 10:14:46', 1),
(27, 'ALPINESTARS TRACK V2 BLACK', 500, 'Calça de couro Alpinestars Track V2 Preto. Calça desportiva confeccionado em couro de primeira qualidade. Possui proteções internas homologadas nos joelhos e quadris, e dois tipos de deslizaderas externas (Sport e DFS) na zona dos joelhos para maior segurança.', 'uploads/produtos/track-v2.avif', 1, 5, '2024-06-05 01:16:47', '2024-06-10 10:15:11', 1),
(28, 'DAINESE CARVE MASTER 3', 404, 'Calças Dainese Carve Master 3 Gore-Tex Preto / Ebony. É a terceira geração do icônico conjunto Carve Master, que se destaca por oferecer excelente conforto em todos os tipos de condições. Calças de alto rendimento e muito confortáveis para uso Sport-Touring.', 'uploads/produtos/dainese-carve_master_3.avif', 4, 6, '2024-06-07 00:15:53', '2024-06-10 10:15:58', 1),
(29, 'SPORT MASTER GORE-TEX', 325, 'Botas Dainese Sport Master Gore-Tex pretas. Projetadas para os pilotos mais exigentes, as botas Sport Master combinam os segmentos de esporte e turismo com a máxima expressão. Feitas de microfibra e tecido D-Stone, as botas Dainese Sport Master Gore-Tex possuem membrana Gore-Tex impermeável e respirável para oferecer excelente desempenho em qualquer condição climática. ', 'uploads/produtos/dainese-sport_master_gore_tex_black_001-0-M-200148481.avif', 4, 9, '2024-06-07 00:16:47', '2024-06-17 09:09:48', 1),
(30, 'ALPINESTARS BOGOTÁ PRO', 269, 'Apinestars Bogotá Pro Drystar Calça Vlaro Cinza / Cinza Escuro / Amarelo Fluo. Calças touring muito versáteis e funcionais, ideais para todo o tipo de condições climatéricas. Incorpora o sistema \"Liner to drop\" que permite diferentes configurações em diferentes condições meteorológicas.', 'uploads/produtos/alpinestars-bogot_pro_drystar_ice_gray_dark_gray_yellow_fluo_9195-2-M-2004767110.avif', 1, 6, '2024-06-07 00:17:37', '2024-06-10 10:16:28', 1),
(31, 'ARMURE AREN WATERPROOF', 160, 'Calça Impermeável Armure Aren Cinzento / Verde / Vermelho. Calças versáteis estilo turismo / aventura com membrana impermeável, forro térmico removível e entradas de ar para se adaptarem perfeitamente a todos os tipos de condições climáticas.', 'uploads/produtos/armure-aren_waterproof_grey_green_red_36-4-M-2002425829.avif', 9, 6, '2024-06-07 00:18:32', '2024-06-10 10:16:43', 1),
(32, 'SHOEI VFX-WR 06', 699, 'Capacete Shoei VFX-WR 06 Jammer TC-1 . O capacete Shoei VFX-WR 06 é o capacete Off-Road de sucesso que possui a homologação ECE 22-06 junto com avanços tecnológicos e alto desempenho. O capacete VFX-WR 06 caracteriza-se por ser muito leve, resistente e por incorporar o sistema MEDS (Movement Energy Distribution System) que reduz significativamente a energia transmitida ao capacete em caso de impacto.', 'uploads/produtos/shoei-vfx_wr_06_jammer_tc_1-2-M-2012593419.avif', 6, 2, '2024-06-10 11:46:16', NULL, 1),
(36, 'SHARK AERON GP BLANK SP', 971, ' O capacete de corrida mais inovador da Shark, que adapta a sua forma à posição do piloto graças ao seu spoiler e aerodinâmica. O revestimento externo em estrutura COVA (fibra de carbono e aramida) oferece excelente leveza e resistência ao impacto, assim como o protetor de queixo em poliuretano expandido EPU. Destaca-se pelo spoiler traseiro A2S que melhora o desempenho aerodinâmico e a estabilidade em altas velocidades, com redução drástica do efeito vela, turbulência e resistência lateral. Complementa um sistema de ventilação eficiente testado em sistema computacional para uma melhoria aerodinâmica. Fecho de fivela dupla e aprovação ECE 22-06.', 'uploads/produtos/shark-aeron_gp_blank_sp_carbon_white_anthracite_he0300_dwa-3-M-2012948537.avif', 7, 1, '2024-06-21 15:54:25', NULL, 1),
(37, 'LS2 FF805 THUNDER GP FIRE RED', 584, 'Capacete integral de competição com aprovação ECE 22.06. Fabricado em fibra de carbono e com spoiler traseiro para oferecer excelente aerodinâmica. Possui tela grande e muito resistente com preparação para Pinlock® (incluída), avançado sistema de ventilação e forro interno removível e lavável. Possui sistema de extração de emergência. Fecho de fivela dupla.', 'uploads/produtos/ls2-ff805_thunder_gp_fire_red_black_168059932-1-M-2012906725.avif', 14, 1, '2024-06-21 15:56:04', NULL, 1),
(38, 'SHARK D-SKWAL 3 MAYFER', 246, ' É a terceira geração do modelo D-Skwal, homologado de acordo com a nova normativa ECE 22.06. Capacete integral com desenho aerodinâmico fabricado em policarbonato injetado, destaca-se por oferecer excelentes níveis de estabilidade, segurança e conforto. Possui viseira solar interna. O D-Skwal 3 foi projetado para viver sensações puras e intensas. Reforça a dinâmica do seu antecessor pela tensão das suas linhas, que convergem inteiramente para os spoilers aerodinâmicos.', 'uploads/produtos/shark-d_skwal_3_mayfer_white_violet_anthracite_he0926e_wva-3-M-2012198079.avif', 7, 1, '2024-06-21 15:57:16', NULL, 1),
(39, 'AGV K3 E2206 ROSSI WINTER TEST 2018', 280, 'O K3 E2206 é o sucessor do K-3 SV aprovado de acordo com os novos regulamentos ECE 22.06. Seu invólucro externo em resina termoplástica oferece excelente desempenho aerodinâmico em qualquer tipo de direção. Possui Pinlock MaxVision para oferecer uma visão clara sob qualquer condição climática e um visor solar integrado. Este capacete é indicado tanto para aqueles pilotos que priorizam conforto e alto desempenho quanto para aqueles que buscam design e bom custo-benefício.', 'uploads/produtos/agv-k3_e2206_rossi_winter_test_2018_001-2-M-2007183767.avif', 3, 1, '2024-06-21 15:58:22', NULL, 1),
(40, 'SCORPION EXO-R1 EVO AIR BLAZE', 373, 'O Exo-R1 Evo Air é o capacete esportivo integral da Scorpion com aprovação ECE 22.06. Um capacete muito leve e resistente fabricado com estrutura Ultra TCT® (Thermodynamical Composite Technology), que proporciona proteção excepcional contra impactos. Possui acolchoamento interno Kwikwick3, sistema Airfit™ e mecanismo de tela Ellip-Tec® II. Destaca-se pela sua estética desportiva. O Exo-R1 Evo Air é entregue com uma segunda tela escura fumê com predisposição Pinlock® Maxvision.', 'uploads/produtos/scorpion-exo_r1_evo_air_blaze_black_blue_110_441_66_02-1-M-20054206126.avif', 2, 1, '2024-06-21 16:01:01', NULL, 1),
(41, 'ALPINESTARS SUPERTECH S-M10 FAME BLACK CARBON M&G', 700, ' O novo S-M10 é aprovado de acordo com o novo regulamento ECE 22.06. A Alpinestars equipa o Supertech S-M10 com os mais recentes avanços tecnológicos. Caracteriza-se por ser muito leve e destaca-se por incorporar o sistema de proteção MIPS e a inovadora tecnologia A-Head, que permite um ajuste interior muito personalizado. A viseira foi projetada para se soltar em caso de uma possível queda.', 'uploads/produtos/alpinestars-supertech_s_m10_fame_black_carbon_m_g_1902-6-M-201223281.avif', 1, 2, '2024-06-21 16:03:26', NULL, 1),
(42, 'LS2 MX703 X-FORCE FIRESKULL VIOLET', 400, 'Capacete offroad de última geração, ideal para a prática exigente de motocross e possui aprovação ECE 22.06. Fabricado em fibra de carbono de alta leveza e resistência. Sistema de ventilação no queixo e na parte superior. O acolchoamento interior é altamente respirável, antibacteriano e removível para lavagem. Viseira frontal removível e ajustável. Inclui um kit de hidratação. Fecho de fivela dupla.', 'uploads/produtos/ls2-mx703_x_force_fireskull_violet_4670323_74-1-M-2002803425.avif', 14, 2, '2024-06-21 16:04:32', NULL, 1),
(43, 'SCORPION VX-16 EVO AIR WHITE', 134, 'Capacete offroad com design agressivo feito de resina termoplástica com aprovação ECE 22-06. Possui sistema de ajuste Airfit, acolchoamento interno Kwikwick2® e excelente sistema de ventilação. Testado em túnel de vento, este capacete destaca-se por ser muito confortável e silencioso. Fecho de fivela dupla.', 'uploads/produtos/scorpion-cspvx_16evoai_blanco_05-1-M-200542231.avif', 2, 2, '2024-06-21 16:05:24', NULL, 1),
(44, 'ALPINESTARS S-M5 MINERAL', 260, 'O novo SM-5 é aprovado de acordo com o novo regulamento ECE 22.06. É o resultado de desenvolvimento e testes e todos os aspectos foram estudados para fazer um capacete muito seguro e confortável. Fabricado em polímero termoinjetado com espessura variável, caracteriza-se por ser muito leve e arejado. A viseira foi projetada para se soltar em caso de uma possível queda. O novo SM-5 com a nova aprovação 22.06 é mais fácil de colocar e tirar.', 'uploads/produtos/alpinestars-s_m5_mineral_dark_brown_kangaroo_matt_838-2-M-201247661.avif', 1, 2, '2024-06-21 16:08:07', NULL, 1),
(45, 'DAINESE SPORTIVA BLACK-MATT / ANTHRACITE / WHITE', 449, 'Jaqueta esportiva confeccionada em couro bovino Tutu com inserções em tecido stretch S1. Incorpora proteções macias certificadas da Pro-Armor nos ombros e cotovelos e inserções de alumínio nos ombros. Ele também tem entradas de ar laterais e um forro interno Nanofeel. Destaca-se por oferecer excelente liberdade de movimentos.', 'uploads/produtos/dainese-sportiva_black_matt_anthracite_white_26a-1-M-2002546631.avif', 4, 3, '2024-06-21 16:39:04', NULL, 1),
(46, 'ALPINESTARS GP FORCE AIRFLOW BLACK', 449, 'Jaqueta esportiva ventilada em couro bovino de alta qualidade com grandes painéis perfurados e painéis de poliamida HRSF para excelente liberdade de movimentos. Possui forro removível à prova de vento e zíperes de ventilação. Incorpora proteções internas Nucleon Flex Pro nos ombros e cotovelos com certificação CE, sliders Dynamic Friction Shield (DFS) nos ombros com alto desempenho contra impactos e predisposição para montar o sistema de airbag Alpinestars® Tech-Air® 5.', 'uploads/produtos/alpinestars-gp_force_airflow_black_10-2-M-2002590711.avif', 1, 3, '2024-06-21 16:40:37', NULL, 1),
(47, 'DAINESE AIR FRAME 3 TEX', 249, 'Casaco desportivo ideal para o verão. Fabricado com malha respirável e tecido QuickDry, incorpora um forro interno removível à prova de vento que permite maior conforto. Possui proteções compostas removíveis para melhor proteção e bolso com predisposição para montar protetor traseiro (não incluído). Zíper de conexão jaqueta-calça.', 'uploads/produtos/dainese-air_frame_3_tex_black_black_white_17300003_948-12-M-2013247612.avif', 4, 4, '2024-06-21 16:42:14', NULL, 1),
(48, 'ALPINESTARS CHROME SPORT', 179.95, 'Casaco têxtil urbana, estilo suéter, com reforços internos de fibra aramídica para maior resistência. Dispõe de proteções certificadas Bio-Light nos ombros e cotovelos e predisposição para montar um protetor dorsal.', 'uploads/produtos/alpinestars-chrome_sport_black_10-1-M-08580815.avif', 1, 4, '2024-06-21 16:43:32', NULL, 1),
(49, 'ALPINESTARS GUNNER V2 WATERPROOF', 215, 'Casaco versátil e funcional confeccionada em tecido poly-estrutura com reforços estrategicamente localizados para máxima resistência à abrasão. Conta com membrana impermeável, forro térmico removível e ventilação com zíper para poder adaptar-se facilmente às condições climáticas de cada momento. Dispõe de proteções Bio Armor nos ombros e cotovelos e detalhes reflectores para maior segurança.', 'uploads/produtos/alpinestars-gunner_v2_waterproof_black_gray_red_131-0-M-09151715.avif', 1, 4, '2024-06-21 16:44:43', NULL, 1),
(50, 'ALPINESTARS HYDE XT STRETCH DRYSTAR XF', 323, 'O casaco Hyde XT foi concebido para ser usado tanto em estrada como fora de estrada. Fabricado em tecido elástico de camada única com reforços Ripstop em áreas críticas para maior durabilidade. Incorpora a membrana Drystar XF laminada impermeável e respirável da Alpinestars e entradas de ar diretas para excelente fluxo de ar. Possui proteções Nucleon Flex Plus Nível 1 nos ombros e cotovelos. É compatível com o sistema de airbag Alpinestars Tech-Air.', 'uploads/produtos/alpinestars-hyde_xt_stretch_drystar_xf_sand_black_891-1-M-2006423215.avif', 1, 4, '2024-06-21 16:46:08', NULL, 1),
(51, 'ALPINESTARS MM93 LOSAIL V2', 53, 'Curtos, leves e confortáveis, são ideais para a condução urbana. Possuem protetor rígido nas articulações para maior segurança e são compatíveis com o uso de telas sensíveis ao toque.', 'uploads/produtos/alpinestars-mm93_losail_v2_black_red_dark_grey_3574921_1336-1-M-200197881.avif', 1, 8, '2024-06-21 16:53:06', NULL, 1),
(52, 'ARMURE ASTRID VENTED BLACK', 37, 'Luvas curtas de design agressivo, feitas de uma combinação de pele de cabra e malha de poliéster. Eles incorporam protecções TPU nas articulações e na lateral da palma com acabamento em carbono. Eles permitem que você use um dispositivo com visor sensível ao toque sem ter que remover as luvas.', 'uploads/produtos/armure-astrid_vented_black-0-M-200150898.avif', 9, 8, '2024-06-21 16:53:58', NULL, 1),
(53, 'ALPINESTARS SMX-2 AIR CARBON V2 HONDA', 77, 'Confeccionadas em pele de cabra e malha técnica 3D, incorpora a inovadora proteção de carbono de Alpinestars nas dobradiças do punho. Os SMX-2 Air Carbon V2 oferecem excelentes níveis de proteção e uma excelente ventilação.', 'uploads/produtos/alpinestars-smx_2_air_carbon_v2_honda_black_red_13-0-M-0917181.avif', 1, 7, '2024-06-21 16:54:52', NULL, 1),
(54, 'ALPINESTARS FQ20 SMX-1 AIR V2 MONSTER', 85, 'Luvas curtas de design agressivo confeccionadas em combinação de pele e malha 3D. Estão equipados com a inovadora proteção de carbono da Alpinestars nas dobradiças do punho e reforços em áreas críticas. Os SMX-1 Air V2 oferecem excelentes níveis de conforto, leves e uma excelente ventilação.', 'uploads/produtos/alpinestars-fq20_smx_1_air_v2_monster_black_blue_bright_red_green_1261-1-M-201255361.avif', 1, 8, '2024-06-21 16:56:04', '2024-06-21 16:59:56', 1),
(55, 'ALPINESTARS HONDA SP-8 V3', 123, 'Luvas de punho comprido e design muito desportivo, que oferecem ampla cobertura no pulso para evitar a entrada de ar a altas velocidades. Fabricado em couro de cabra e couro sintético que proporciona alta resistência à abrasão e alta durabilidade. Possui pequenas perfurações nas laterais para adequada circulação de ar. Incorpora proteções SP de dupla densidade nos nós dos dedos e reforços na palma. Possui uma ponte de ligação entre o terceiro e o quarto dedos para evitar a sua separação em caso de queda. Possuem fecho elástico que permite um ajuste seguro.', 'uploads/produtos/alpinestars-honda_sp_8_v3_black_bright_red_blue_3558423_1317-2-M-201343031.avif', 1, 7, '2024-06-21 16:56:44', NULL, 1),
(56, 'DAINESE TEMPEST D-DRY LONG', 75, 'Luvas de punho longo, perfeitos para dias chuvosos. Confeccionadas em combinação de tecido com elasticidade com reforços de pele e camurça na palma da mão. Incorporam proteções homologadas Comfortech nas dobradiças do punho. Dispõem de acolchoado térmico e de membrana D-Dry impermeável e respirável.', 'uploads/produtos/tempest_unisex_d_dry_long_black_red_r08-1-M-0752229.avif', 4, 8, '2024-06-21 16:57:46', NULL, 1),
(57, ' ALPINESTARS ANDES AIR DRYSTAR', 197, 'Calças de turismo projetadas para resistir tanto a temperaturas quentes quanto a climas mais frios e chuvosos. Fabricado com malha 2D que garante ótima ventilação. Membrana Drystar® impermeável e respirável. Proteções Nucleon Flex Plus nível 1 nos joelhos. Inserções elásticas na virilha e nos joelhos para maior liberdade de movimentos. Pernas, tornozelos e cintura ajustáveis com velcro. 2 bolsos cargo nas coxas.', 'uploads/produtos/alpinestars-andes_air_drystar_black_3227924_10-1-M-201303531.avif', 1, 5, '2024-06-21 17:01:46', '2024-06-21 17:02:03', 1),
(58, 'ARMURE MILAN VENTED LADY IVORY', 112, 'Calça ventilada tipo Touring com corte específico para mulheres, confeccionada em poliéster 600D com alta resistência à abrasão e cortes. Destaca-se por oferecer painéis de malha ventilada que oferecem boa circulação do ar. Incorpora proteções removíveis com certificação CE nível 2 nos joelhos e predisposição para montar protetor de quadril (não incluído).', 'uploads/produtos/armure-parmmilan_ld_mar_51-4-M-2013290315.avif', 9, 6, '2024-06-21 17:02:50', NULL, 1),
(59, 'DAINESE CLASSIC SLIM BLUE', 174, 'Calças clássicas com ajuste justo para o uso diário. Fabricado em Armalith®, um tecido ultraleve e muito resistente, superior a Cordura ou fibra de aramida. As proteções Pro-Shape 2.0 oferecem segurança e conforto para o dia a dia.', 'uploads/produtos/dainese-classic_slim_blue_008-3-M-2001954318.avif', 4, 6, '2024-06-21 17:03:43', NULL, 1),
(60, 'DAINESE DELTA 4 S/T', 429.95, 'Calça esportiva muito confortável, confeccionada em couro bovino e tecido bielástico S1. Incorpora proteções compostas certificadas na área dos joelhos, controles deslizantes substituíveis e proteções macias nos quadris. Oferece altos níveis de proteção e conforto.', 'uploads/produtos/dainese-delta_4_s_t_black_black-3-M-201273851.avif', 4, 6, '2024-06-21 17:04:37', NULL, 1),
(61, 'DAINESE DELTA 4', 431, 'Calça esportiva muito confortável, confeccionada em couro bovino e tecido bielástico S1. Incorpora proteções compostas certificadas na área dos joelhos, controles deslizantes substituíveis e proteções suaves nos quadris. Oferece altos níveis de proteção e conforto.', 'uploads/produtos/dainese-delta_4_black_white-3-M-2012738412.avif', 4, 5, '2024-06-21 17:05:50', '2024-06-21 17:14:23', 1),
(62, 'DAINESE SUPER SPEED PROFESSIONAL', 529.99, 'Calça esportiva muito confortável, confeccionada em couro bovino e tecido bielástico S1. Incorpora proteções compostas certificadas na área dos joelhos, controles deslizantes substituíveis e proteções macias nos quadris. Oferece altos níveis de proteção e conforto.', 'uploads/produtos/dainese-super_speed_professional_black_white_red_fluo-2-M-201273831.avif', 4, 5, '2024-06-21 17:06:40', NULL, 1),
(63, 'ALPINESTARS MM93 CR-X DRYSTAR', 157.2, 'Sapatilhas criadas para serem usadas tanto em cima da moto, como em atividades urbanas ou para andar na montanha. Incorporam membrana Drystar impermeável e respirável, protetores para os tornozelos, e reforços estrategicamente localizados. As CR-X fornecem um ajuste confortável e um grande volume interno para proporcionar um excelente conforto.', 'uploads/produtos/alpinestars-mm93_cr_x_drystar_black_red_white_132-0-M-200197591.avif', 1, 10, '2024-06-21 17:08:53', NULL, 1),
(64, 'ALPINESTARS TOUCAN GORE-TEX', 386.55, 'Botas técnicas de touring com design inovador, de fechamento com fivelas. Oferecem impermeabilidade e respirabilidade do 100%  (graças à membrana Gore-Tex), uma excelente segurança (graças aos sistemas de proteção integrados), e uma flexibilidade e conforto soberbas, que são as companheiras ideais para viagens longas.', 'uploads/produtos/toucan_gore_tex_black_10-1-M-0668031.avif', 1, 9, '2024-06-21 17:09:30', NULL, 1),
(65, 'ARMURE MACK WATERPROOF', 99.87, 'Botas de cano alto estilo touring feitas principalmente de pele. Incorpora uma membrana totalmente impermeável para adaptar-se perfeitamente a qualquer condição climática. Incorporam reforços estrategicamente localizados e destacam-se por serem muito confortáveis e seguras.', 'uploads/produtos/armure-armure_mack_black_10-0-M-200150991.avif', 9, 9, '2024-06-21 17:10:14', NULL, 1),
(66, 'DAINESE TORQUE 3 OUT', 359, 'Bota desportiva realizada em Microfibra e tecido D-Stone com inserções de TPU para maior aderência. As Botas Dainese Torque 3 Out oferecem altos níveis de segurança, conforto e precisão na condução. Incorporam proteções e reforços estrategicamente localizados e equipados com o sistema D-Axial de TPU, desenhado para reduzir o risco de torções do pé e para protegê-lo contra os choques. Especialmente indicadas para uso desportivo em estrada e pista.', 'uploads/produtos/dainese-torque_3_out_black_fluo_red_628-0-M-2000295310.avif', 4, 9, '2024-06-21 17:11:17', NULL, 1),
(67, 'ALPINESTARS SMX-S', 224, 'Confeccionadas em microfibra, as SMX-S ofrecem-nos um design desportivo e níveis de segurança excepcionais. Leves e confortáveis, oferecem altos níveis de segurança e precisão na condução. Estas botas estão equipados com os últimos avanços no desenvolvimento de calçados da Alpinestars.', 'uploads/produtos/dainese-torque_3_out_black_fluo_red_628-0-M-2000295310.avif', 1, 9, '2024-06-21 17:11:43', NULL, 1),
(68, 'ALPINESTARS FASTER-3 HONDA', 123.89, 'Sapatilhas de design agressivo confeccionadas em microfibra. Incorporam protetores dos tornozelos, e reforços acolchoados estrategicamente localizados e fechamento melhorado. Estas sapatilhas destacam-se por serem muito confortáveis e leves. Têm certificação CE.', 'uploads/produtos/alpinestars-faster_3_honda_black_red_blue_183-0-M-200037211.avif', 1, 9, '2024-06-21 17:12:14', NULL, 1),
(69, 'ARMURE TERROWIN BROWN', 54.25, 'Tênis urbano de estilo casual ideais para uso na cidade. Confeccionadas em couro, possuem reforços na ponta e no calcanhar para maior proteção. Eles têm um fecho de atacar e um zíper lateral.', 'uploads/produtos/armure-terrowin_brown_18-3-M-200242611.avif', 9, 10, '2024-06-21 17:12:43', NULL, 1),
(70, ' DAINESE DYNO PRO D1', 251.96, 'Botas de cano curto e estilo desportivo desenhadas para oferecer um elevado nível de segurança, graças à incorporação de soluções técnicas próprias de botas de competição.', 'uploads/produtos/dainese-dyno_pro_d1_black_anthracite_604-1-M-0707561.avif', 4, 9, '2024-06-21 17:13:23', NULL, 1);

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
(2, 'L', 25),
(2, 'M', 98),
(2, 'S', 0),
(2, 'XL', 20),
(2, 'XS', 100),
(5, 'L', 100),
(5, 'M', 100),
(5, 'S', 99),
(5, 'XL', 100),
(5, 'XS', 99),
(8, 'L', 100),
(8, 'M', 100),
(8, 'S', 100),
(8, 'XL', 100),
(8, 'XS', 100),
(9, 'L', 99),
(9, 'M', 100),
(9, 'S', 100),
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
(12, 'L', 99),
(12, 'M', 100),
(12, 'S', 100),
(12, 'XL', 100),
(12, 'XS', 100),
(13, 'L', 3),
(13, 'M', 12),
(13, 'S', 150),
(13, 'XL', 20),
(13, 'XS', 0),
(14, 'L', 100),
(14, 'M', 100),
(14, 'S', 100),
(14, 'XL', 100),
(14, 'XS', 100),
(15, 'L', 95),
(15, 'M', 50),
(15, 'S', 99),
(15, 'XL', 99),
(15, 'XS', 100),
(16, 'L', 100),
(16, 'M', 97),
(16, 'S', 99),
(16, 'XL', 100),
(16, 'XS', 100),
(17, 'L', 100),
(17, 'M', 100),
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
(21, 'M', 98),
(21, 'S', 100),
(21, 'XL', 100),
(21, 'XS', 500),
(22, 'L', 100),
(22, 'M', 100),
(22, 'S', 100),
(22, 'XL', 100),
(22, 'XS', 99),
(23, 'L', 100),
(23, 'M', 100),
(23, 'S', 100),
(23, 'XL', 100),
(23, 'XS', 100),
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
(26, 'L', 100),
(26, 'M', 100),
(26, 'S', 99),
(26, 'XL', 100),
(26, 'XS', 100),
(27, 'L', 100),
(27, 'M', 100),
(27, 'S', 49),
(27, 'XL', 150),
(27, 'XS', 100),
(28, 'L', 100),
(28, 'M', 100),
(28, 'S', 100),
(28, 'XL', 100),
(28, 'XS', 100),
(29, 'L', 100),
(29, 'M', 100),
(29, 'S', 100),
(29, 'XL', 99),
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
(36, 'L', 100),
(36, 'M', 100),
(36, 'S', 100),
(36, 'XL', 100),
(36, 'XS', 100),
(37, 'L', 100),
(37, 'M', 100),
(37, 'S', 100),
(37, 'XL', 100),
(37, 'XS', 100),
(38, 'L', 100),
(38, 'M', 100),
(38, 'S', 100),
(38, 'XL', 100),
(38, 'XS', 100),
(39, 'L', 100),
(39, 'M', 100),
(39, 'S', 100),
(39, 'XL', 100),
(39, 'XS', 100),
(40, 'L', 100),
(40, 'M', 100),
(40, 'S', 100),
(40, 'XL', 100),
(40, 'XS', 100),
(41, 'L', 100),
(41, 'M', 100),
(41, 'S', 100),
(41, 'XL', 100),
(41, 'XS', 100),
(42, 'L', 100),
(42, 'M', 100),
(42, 'S', 100),
(42, 'XL', 100),
(42, 'XS', 100),
(43, 'L', 100),
(43, 'M', 100),
(43, 'S', 100),
(43, 'XL', 100),
(43, 'XS', 100),
(44, 'L', 100),
(44, 'M', 100),
(44, 'S', 100),
(44, 'XL', 100),
(44, 'XS', 100),
(45, 'L', 100),
(45, 'M', 100),
(45, 'S', 100),
(45, 'XL', 100),
(45, 'XS', 100),
(46, 'L', 100),
(46, 'M', 100),
(46, 'S', 100),
(46, 'XL', 100),
(46, 'XS', 100),
(47, 'L', 100),
(47, 'M', 100),
(47, 'S', 100),
(47, 'XL', 100),
(47, 'XS', 100),
(48, 'L', 100),
(48, 'M', 100),
(48, 'S', 100),
(48, 'XL', 100),
(48, 'XS', 100),
(49, 'L', 100),
(49, 'M', 100),
(49, 'S', 100),
(49, 'XL', 100),
(49, 'XS', 100),
(50, 'L', 100),
(50, 'M', 100),
(50, 'S', 100),
(50, 'XL', 100),
(50, 'XS', 100),
(51, 'L', 100),
(51, 'M', 100),
(51, 'S', 100),
(51, 'XL', 100),
(51, 'XS', 100),
(52, 'L', 100),
(52, 'M', 100),
(52, 'S', 100),
(52, 'XL', 100),
(52, 'XS', 100),
(53, 'L', 100),
(53, 'M', 100),
(53, 'S', 100),
(53, 'XL', 100),
(53, 'XS', 100),
(54, 'L', 100),
(54, 'M', 100),
(54, 'S', 100),
(54, 'XL', 100),
(54, 'XS', 100),
(55, 'L', 100),
(55, 'M', 100),
(55, 'S', 100),
(55, 'XL', 100),
(55, 'XS', 100),
(56, 'L', 100),
(56, 'M', 100),
(56, 'S', 100),
(56, 'XL', 100),
(56, 'XS', 100),
(57, 'L', 100),
(57, 'M', 100),
(57, 'S', 100),
(57, 'XL', 100),
(57, 'XS', 100),
(58, 'L', 100),
(58, 'M', 100),
(58, 'S', 100),
(58, 'XL', 100),
(58, 'XS', 100),
(59, 'L', 100),
(59, 'M', 100),
(59, 'S', 100),
(59, 'XL', 100),
(59, 'XS', 100),
(60, 'L', 100),
(60, 'M', 100),
(60, 'S', 100),
(60, 'XL', 100),
(60, 'XS', 100),
(61, 'L', 100),
(61, 'M', 100),
(61, 'S', 100),
(61, 'XL', 100),
(61, 'XS', 100),
(62, 'L', 100),
(62, 'M', 100),
(62, 'S', 100),
(62, 'XL', 100),
(62, 'XS', 100),
(63, 'L', 100),
(63, 'M', 100),
(63, 'S', 100),
(63, 'XL', 100),
(63, 'XS', 100),
(64, 'L', 100),
(64, 'M', 100),
(64, 'S', 100),
(64, 'XL', 100),
(64, 'XS', 100),
(65, 'L', 100),
(65, 'M', 100),
(65, 'S', 100),
(65, 'XL', 100),
(65, 'XS', 100),
(66, 'L', 100),
(66, 'M', 100),
(66, 'S', 100),
(66, 'XL', 100),
(66, 'XS', 100),
(67, 'L', 100),
(67, 'M', 100),
(67, 'S', 100),
(67, 'XL', 100),
(67, 'XS', 100),
(68, 'L', 100),
(68, 'M', 100),
(68, 'S', 100),
(68, 'XL', 100),
(68, 'XS', 100),
(69, 'L', 100),
(69, 'M', 100),
(69, 'S', 100),
(69, 'XL', 100),
(69, 'XS', 100),
(70, 'L', 100),
(70, 'M', 100),
(70, 'S', 100),
(70, 'XL', 100),
(70, 'XS', 100);

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
(1, 1, 'CORRIDA'),
(2, 1, 'MOTOCROSS'),
(3, 2, 'CABEDAL'),
(4, 2, 'TECIDO'),
(5, 3, 'CABEDAL'),
(6, 3, 'TECIDO'),
(7, 4, 'CABEDAL'),
(8, 4, 'TECIDO'),
(9, 5, 'CABEDAL'),
(10, 5, 'TECIDO'),
(11, 1, 'ABERTOS');

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
(3, 'daniel@gmail.com', 'Ajuda', 'Boa tarde, preciso de alterar a minha data de nascimento...\r\nIntroduzi-a mal quando configurei o meu perfil.\r\nObrigado!', 0, '2024-06-19 15:07:32', '2024-06-21 15:50:34');

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
(61, 'Admin', 'Admin', 'motospeed2024@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00', 'uploads/users/mstile-150x150.png', '', '', 1, '2024-06-19 11:22:38', '2024-06-19 15:19:32', 1),
(75, 'Daniel', 'Lopes', 'daniel@gmail.com', 'aa47f8215c6f30a0dcdb2a36a9f4168e', '0000-00-00', 'uploads/users/default.png', '', '', 0, '2024-06-19 14:26:04', NULL, 1),
(76, 'Leonor', 'Silva', 'leonor@gmail.com', '1c2693eaca570de5421543f0db7551dc', '0000-00-00', 'uploads/users/default.png', '', '', 0, '2024-06-19 14:26:17', NULL, 1),
(77, 'Ana', 'Margarida', 'anamargarida@gmail.com', 'd9c2ef39b4f9bb1e757efa4a7eb7b9e8', '0000-00-00', 'uploads/users/default.png', '', '', 0, '2024-06-19 14:26:37', NULL, 1);

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
(79, 61, '2024-05-08', 204.98, 4.99, 'Admin', 'Admin', 'motospeed2024@gmail.com', '(Morada  do admin)', '1234-123'),
(80, 75, '2024-05-19', 599.97, 0, 'Daniel', 'Lopes', 'daniel@gmail.com', 'Rua do daniel', '1589-956'),
(81, 75, '2024-04-10', 495.99, 0, 'Daniel', 'Lopes', 'daniel@gmail.com', 'Rua do daniel', '1589-956'),
(82, 76, '2024-04-01', 500, 0, 'Leonor', 'Silva', 'leonor@gmail.com', 'Rua da Leonor', '5846-258'),
(83, 76, '2024-06-19', 125, 0, 'Leonor', 'Silva', 'leonor@gmail.com', 'Rua da Leonor', '5846-258'),
(84, 77, '2024-03-19', 584, 0, 'Ana', 'Margarida', 'anamargarida@gmail.com', 'Rua da Ana Margarida', '1026-674'),
(85, 77, '2024-02-12', 1499, 0, 'Ana', 'Margarida', 'anamargarida@gmail.com', 'Rua da Ana Margarida', '1026-674');

-- --------------------------------------------------------

--
-- Estrutura da tabela `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_prod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `wishlist`
--

INSERT INTO `wishlist` (`id`, `id_user`, `id_prod`) VALUES
(6, 61, 2),
(8, 61, 9),
(9, 61, 21),
(10, 61, 29),
(19, 61, 30),
(21, 61, 8);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de tabela `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `suporte`
--
ALTER TABLE `suporte`
  MODIFY `id_suporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de tabela `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `produtos` (`id_prod`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
