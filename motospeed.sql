-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jun-2024 às 18:05
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

DROP DATABASE IF EXISTS MOTOSPEED;

CREATE DATABASE MOTOSPEED;

USE MOTOSPEED;

--
-- Banco de dados: `motospeed`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `CATEGORIAS` (
  `ID_CATEGORIA` INT(11) NOT NULL,
  `NOME_CATEGORIA` VARCHAR(100) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `CATEGORIAS` (
  `ID_CATEGORIA`,
  `NOME_CATEGORIA`
) VALUES (
  1,
  'Capacetes'
),
(
  2,
  'Casacos'
),
(
  3,
  'Calças'
),
(
  4,
  'Luvas'
),
(
  5,
  'Botas'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhe_venda`
--

CREATE TABLE `DETALHE_VENDA` (
  `ID_VENDA` INT(11) NOT NULL,
  `ID_PROD` INT(11) NOT NULL,
  `QUANTIDADE` INT(11) NOT NULL,
  `TAMANHO` VARCHAR(255) NOT NULL,
  `PRECO_UNI` FLOAT NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Extraindo dados da tabela `detalhe_venda`
--

INSERT INTO `DETALHE_VENDA` (
  `ID_VENDA`,
  `ID_PROD`,
  `QUANTIDADE`,
  `TAMANHO`,
  `PRECO_UNI`
) VALUES (
  79,
  2,
  1,
  'S',
  199.99
),
(
  80,
  2,
  1,
  'M',
  199.99
),
(
  80,
  2,
  2,
  'L',
  199.99
),
(
  81,
  9,
  1,
  'L',
  495.99
),
(
  82,
  27,
  1,
  'S',
  500
),
(
  83,
  21,
  1,
  'M',
  125
),
(
  84,
  29,
  1,
  'XL',
  325
),
(
  84,
  12,
  1,
  'L',
  259
),
(
  85,
  5,
  1,
  'XS',
  1499
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `MARCAS` (
  `ID_MARCA` INT(11) NOT NULL,
  `NOME_MARCA` VARCHAR(100) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `MARCAS` (
  `ID_MARCA`,
  `NOME_MARCA`
) VALUES (
  1,
  'Alpinestars'
),
(
  2,
  'Scorpion'
),
(
  3,
  'AGV'
),
(
  4,
  'Dainese'
),
(
  6,
  'Shoei'
),
(
  7,
  'Shark'
),
(
  9,
  'Armure'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `PRODUTOS` (
  `ID_PROD` INT(11) NOT NULL,
  `NOME_PROD` VARCHAR(150) NOT NULL,
  `PRECO_PROD` FLOAT DEFAULT NULL,
  `DESC_PROD` TEXT NOT NULL,
  `FOTO_PROD` VARCHAR(255) NOT NULL,
  `ID_MARCA` INT(11) NOT NULL,
  `ID_SUBCATEGORIA` INT(11) DEFAULT NULL,
  `CRIADO_A` DATETIME DEFAULT CURRENT_TIMESTAMP(),
  `ALTERADO_A` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(),
  `STATUS` TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `PRODUTOS` (
  `ID_PROD`,
  `NOME_PROD`,
  `PRECO_PROD`,
  `DESC_PROD`,
  `FOTO_PROD`,
  `ID_MARCA`,
  `ID_SUBCATEGORIA`,
  `CRIADO_A`,
  `ALTERADO_A`,
  `STATUS`
) VALUES (
  2,
  'Scorpion EXO 520 Air',
  199.99,
  ' Capacete integral confeccionado em policarbonato injetado com homologação ECE 22-06 e projetado especificamente para proporcionar um nível aerodinâmico esportivo aliado ao conforto de um capacete de uso diário. O Exo-520 Evo Air destaca-se por incorporar o protetor solar Speedview® integrado, mecanismo de viseira Ellip-Tech®, interior acolchoado Kwikwick®2 e um sistema de ventilação eficaz.',
  'uploads/produtos/scorpion-520air.png',
  2,
  1,
  '2024-03-19 17:36:29',
  '2024-06-20 16:59:25',
  1
),
(
  5,
  'AGV Pista GP RR',
  1499,
  'Capacete Agv Pista GP RR E2206 Futuro Carbonio Forgiato. O novo Pista GP RR é homologado de acordo com os regulamentos de corrida da FIM e os novos regulamentos ECE 22.06. A Pista GP RR Futuro Carbonio Forgiato foi fabricada com carcaça e asa PRO Spoiler em carbono forjado exclusivo e detalhes na cor Elettro Iridium. A estrutura de carbono forjado com acabamento fosco torna cada concha e cada PRO Spoiler uma peça única. Os detalhes e a tela na cor exclusiva Elettro Iridium são inspirados na potência silenciosa e limpa do futuro da mobilidade.',
  'uploads/produtos/agv-pista.png',
  3,
  1,
  '2024-05-09 22:11:19',
  '2024-06-19 15:22:00',
  1
),
(
  8,
  'Shark Race-R PRO',
  695,
  'Capacete Shark Race-R Pro GP 06 Blank Matte Black . Shark evolui seu capacete mais esportivo e equipa o novo Race-R Pro GP 06 com os novos regulamentos ECE 22.06. A casca externa feita com estrutura COVA (fibra de carbono e aramida) oferece excelente desempenho aerodinâmico. Ele tem o recorde de velocidade na MotoGP capturado em 363,6 km/h! O spoiler traseiro destaca-se por melhorar o desempenho aerodinâmico e a estabilidade em alta velocidade. Este é o capacete topo de gama, fruto da experiência da Shark nos mais altos escalões de competição (MotoGP e SBK) com mais de 250 pódios.',
  'uploads/produtos/shark.png',
  7,
  1,
  '2024-05-09 22:19:50',
  '2024-06-10 10:09:41',
  1
),
(
  9,
  'DAINESE AVRO 4 ',
  495.99,
  'Casaco de pele Dainese Avro 4 Preto Mate / Branco. Casaco desportivo confeccionado em pele bovina de primeira qualidade; destaca-se pelo seu conforto, segurança e design. Possui proteções certificadas nos ombros e cotovelos e inserções de alumínio nos ombros.',
  'uploads/produtos/dainese-avro4.png',
  4,
  3,
  '2024-05-11 13:33:39',
  '2024-06-10 10:10:01',
  1
),
(
  10,
  'DAINESE ELETTRICA AIR',
  149.99,
  ' Jaqueta de verão com forro térmico desmontável. Confeccionada em tecido D-Synth 350, dispõe de forro térmico desmontável para ser usada inclusive durante os dias mais frios. Incorpora proteções compostas desmontáveis certificadas em ombros e cotovelos. ',
  'uploads/produtos/dainese-elettrica.png',
  4,
  4,
  '2024-05-11 14:50:45',
  '2024-06-10 10:10:11',
  1
),
(
  11,
  'SHOEI VFX-WR 06',
  539,
  'O capacete Shoei VFX-WR 06 é o capacete Off-Road de sucesso que possui a homologação ECE 22-06 junto com avanços tecnológicos e alto desempenho. O capacete VFX-WR 06 caracteriza-se por ser muito leve, resistente e por incorporar o sistema MEDS (Movement Energy Distribution System) que reduz significativamente a energia transmitida ao capacete em caso de impacto. ',
  'uploads/produtos/vfc-wr.png',
  6,
  2,
  '2024-05-11 14:53:48',
  '2024-06-10 10:10:37',
  1
),
(
  12,
  'SHARK Vairal Anger',
  259,
  'Capacete Shark Varial Anger Preto / Azul / Fúcsia. Fabricado em fibra de vidro, o Varial combina um design agressivo, com detalhes e acabamentos de primeira qualidade.',
  'uploads/produtos/varial-anger.png',
  7,
  2,
  '2024-05-11 14:55:31',
  '2024-06-10 10:10:54',
  1
),
(
  13,
  'AGV X70 FLAKE ',
  129,
  'Capacete AGV X70 Grey (coleção Legends ). A Agv inventou o capacete a jato de fibra em 1954. O X70 foi projetado no mesmo formato e cores, mas com a tecnologia AGV atual. Caracteriza-se por oferecer uma concha limpa e arredondada e detalhes vintage.',
  'uploads/produtos/X70-flake.png',
  3,
  11,
  '2024-05-11 14:59:45',
  '2024-06-10 12:42:51',
  1
),
(
  14,
  'SHOEI J-CRUISE 2',
  425.99,
  'O J-Cruise 2 é mais moderno e seguro, e dispõe de um sistema de ventilação e de alguns acolchoados interiores totalmente evoluídos.',
  'uploads/produtos/shoei-j-cruise2.png',
  6,
  11,
  '2024-05-11 15:02:00',
  '2024-06-10 12:44:51',
  1
),
(
  15,
  'SCORPION EXO-230 SR',
  150,
  'Capacete Scorpion Exo-230 SR Azul Escuro / Branco. Capacete Jet com design moderno, muito prático e funcional para uso urbano. Feito de policarbonato avançado, possui uma grande viseira transparente com predisposição para Pinlock (não incluído) e acolchoamento interno Kwikwick C muito confortável.',
  'uploads/produtos/exo-230-sr.png',
  2,
  11,
  '2024-05-11 15:03:24',
  '2024-06-10 12:44:55',
  1
),
(
  16,
  'ALPINESTARS SUPERTECH S-M8',
  420,
  'Capacete Alpinestars Supertech S-M8 Radium 2 Preto / Branco. Capacete Alpinestars SM-8 incorpora os últimos avanços tecnológicos e caracteriza-se por ser muito leve, confortável e arejado.',
  'uploads/produtos/supertech-sm8.webp',
  1,
  2,
  '2024-05-11 15:03:35',
  '2024-06-10 10:12:39',
  1
),
(
  17,
  'ALPINESTARS STELLA',
  449.9,
  'Alpinestars Kira V2 Lady Couro Jaqueta Preto . Jaqueta esportiva com estampa feminina em couro de primeira qualidade. Possui painéis extensíveis estrategicamente colocados para oferecer o máximo de flexibilidade e conforto. Ele incorpora um forro térmico removível e entradas de ar com zíper para se adaptar a diferentes condições climáticas.',
  'uploads/produtos/alpine-stella.webp',
  1,
  3,
  '2024-05-20 21:55:06',
  '2024-06-10 10:13:01',
  1
),
(
  18,
  'ARMURE HAMO',
  220,
  ' Jaqueta esportiva em couro bovino e tecido elástico. Possui forro térmico removível e entradas de ar com zíper para se adaptar às adversidades do clima. Incorpora proteções substituíveis nos ombros e cotovelos e controles deslizantes externos. ',
  'uploads/produtos/armure-hamo.webp',
  9,
  3,
  '2024-05-20 21:56:51',
  '2024-06-10 10:13:10',
  1
),
(
  19,
  'ARMUR MACK',
  114.99,
  'Armure Mack Jaqueta impermeável para senhora ivory. Jaqueta versátil estilo touring com ajuste específico para mulheres que incorpora uma membrana totalmente impermeável, forro térmico removível e entradas de ar para se adaptar perfeitamente a todos os tipos de condições climáticas.',
  'uploads/produtos/armure-mack.webp',
  9,
  4,
  '2024-05-20 21:58:21',
  '2024-06-10 10:13:27',
  1
),
(
  20,
  'DAINESE ENERGYCA',
  320,
  'Jaqueta Dainese Energyca Air Tex Preto / Vermelho fluo. Casaco ventilado com um design agressivo, feito de uma combinação de tecido Cordura Comfort muito resistente e grandes painéis de tecido de malha. Possui uma membrana corta-vento removível para se adaptar perfeitamente às condições climáticas de cada momento. ',
  'uploads/produtos/dainese-energyca.webp',
  4,
  4,
  '2024-05-20 21:59:57',
  '2024-06-10 10:13:31',
  1
),
(
  21,
  'DAINESE IMPETO',
  125,
  'Luva de pele de punho longo, que oferece uma ótima proteção e conforto. São fabricadas a partir de pele de cabra, e têm protetor de espuma de poliuretano nas dobradiças do punho. Destacam-se por oferecer um excelente conforto, sensibilidade e ajuste.',
  'uploads/produtos/dainese-impeto.webp',
  4,
  7,
  '2024-05-20 22:06:54',
  '2024-06-10 10:14:05',
  1
),
(
  22,
  'DAINESE IMPETO',
  95,
  'Luva de pele de punho longo, que oferece uma ótima proteção e conforto. São fabricadas a partir de pele de cabra, e têm protetor de espuma de poliuretano nas dobradiças do punho. ',
  'uploads/produtos/dainese-impetoo.webp',
  4,
  7,
  '2024-05-20 22:07:59',
  '2024-06-10 10:14:08',
  1
),
(
  23,
  'ALPINESTARS SMX-1',
  80,
  'Luvas Alpinestars SMX-1 Air V2 Preto / Branco. Luvas curtas de design agressivo confeccionadas em combinação de pele e malha 3D. Estão equipados com a inovadora proteção de carbono da Alpinestars nas dobradiças do punho e reforços em áreas críticas. ',
  'uploads/produtos/apline-smx.webp',
  1,
  8,
  '2024-05-20 22:08:52',
  '2024-06-10 10:14:24',
  1
),
(
  24,
  'ALPINESTARS TOURER',
  100.99,
  'Luvas Alpinestars Tourer W-7 V2 Drystar Pretas . Luvas impermeáveis e isoladas para uso Touring no inverno e em baixas temperaturas. Confeccionada em mix de couro e tecido Softshell para maior durabilidade e conforto. A membrana impermeável Drystar® oferece respirabilidade e evita a entrada de água e, juntamente com o duplo isolamento Thinsulate™, oferece excelente proteção contra o frio.',
  'uploads/produtos/alpine-tourer.webp',
  1,
  8,
  '2024-05-20 22:10:57',
  '2024-06-10 10:14:34',
  1
),
(
  25,
  'ARMURE KERR',
  40,
  'Armure Kerr Vented Lady Gloves Preto. Luvas curtas com ajuste específico para mulher, feitas de uma combinação de pele de cabra e malha de poliéster. Eles incorporam proteções de TPU nas articulações.',
  'uploads/produtos/armure-kerr.webp',
  9,
  8,
  '2024-05-20 22:12:01',
  '2024-06-10 10:14:39',
  1
),
(
  26,
  'DAINESE UNRULY',
  116.99,
  'Luvas Dainese Unruly Ergo-Tek Preto / Vermelho. A construção das costas em malha sem costuras oferece grande elasticidade e liberdade de movimentos, que se combinam com os elevados níveis de segurança garantidos pela proteção dos nós dos dedos com tecnologia Ergo-Tek, concebida para garantir a total mobilidade da mão ao proteger os mais áreas expostas.',
  'uploads/produtos/dainese-unruly.webp',
  4,
  8,
  '2024-05-20 22:14:28',
  '2024-06-10 10:14:46',
  1
),
(
  27,
  'ALPINESTARS TRACK V2 BLACK',
  500,
  'Calça de couro Alpinestars Track V2 Preto. Calça desportiva confeccionado em couro de primeira qualidade. Possui proteções internas homologadas nos joelhos e quadris, e dois tipos de deslizaderas externas (Sport e DFS) na zona dos joelhos para maior segurança.',
  'uploads/produtos/track-v2.avif',
  1,
  5,
  '2024-06-05 01:16:47',
  '2024-06-10 10:15:11',
  1
),
(
  28,
  'DAINESE CARVE MASTER 3',
  404,
  'Calças Dainese Carve Master 3 Gore-Tex Preto / Ebony. É a terceira geração do icônico conjunto Carve Master, que se destaca por oferecer excelente conforto em todos os tipos de condições. Calças de alto rendimento e muito confortáveis para uso Sport-Touring.',
  'uploads/produtos/dainese-carve_master_3.avif',
  4,
  6,
  '2024-06-07 00:15:53',
  '2024-06-10 10:15:58',
  1
),
(
  29,
  'SPORT MASTER GORE-TEX',
  325,
  'Botas Dainese Sport Master Gore-Tex pretas. Projetadas para os pilotos mais exigentes, as botas Sport Master combinam os segmentos de esporte e turismo com a máxima expressão. Feitas de microfibra e tecido D-Stone, as botas Dainese Sport Master Gore-Tex possuem membrana Gore-Tex impermeável e respirável para oferecer excelente desempenho em qualquer condição climática. ',
  'uploads/produtos/dainese-sport_master_gore_tex_black_001-0-M-200148481.avif',
  4,
  9,
  '2024-06-07 00:16:47',
  '2024-06-20 16:55:48',
  0
),
(
  30,
  'ALPINESTARS BOGOTÁ PRO',
  269,
  'Apinestars Bogotá Pro Drystar Calça Vlaro Cinza / Cinza Escuro / Amarelo Fluo. Calças touring muito versáteis e funcionais, ideais para todo o tipo de condições climatéricas. Incorpora o sistema \"Liner to drop\" que permite diferentes configurações em diferentes condições meteorológicas.',
  'uploads/produtos/alpinestars-bogot_pro_drystar_ice_gray_dark_gray_yellow_fluo_9195-2-M-2004767110.avif',
  1,
  6,
  '2024-06-07 00:17:37',
  '2024-06-10 10:16:28',
  1
),
(
  31,
  'ARMURE AREN WATERPROOF',
  160,
  'Calça Impermeável Armure Aren Cinzento / Verde / Vermelho. Calças versáteis estilo turismo / aventura com membrana impermeável, forro térmico removível e entradas de ar para se adaptarem perfeitamente a todos os tipos de condições climáticas.',
  'uploads/produtos/armure-aren_waterproof_grey_green_red_36-4-M-2002425829.avif',
  9,
  6,
  '2024-06-07 00:18:32',
  '2024-06-10 10:16:43',
  1
),
(
  32,
  'SHOEI VFX-WR 06',
  699,
  'Capacete Shoei VFX-WR 06 Jammer TC-1 . O capacete Shoei VFX-WR 06 é o capacete Off-Road de sucesso que possui a homologação ECE 22-06 junto com avanços tecnológicos e alto desempenho. O capacete VFX-WR 06 caracteriza-se por ser muito leve, resistente e por incorporar o sistema MEDS (Movement Energy Distribution System) que reduz significativamente a energia transmitida ao capacete em caso de impacto.',
  'uploads/produtos/shoei-vfx_wr_06_jammer_tc_1-2-M-2012593419.avif',
  6,
  2,
  '2024-06-10 11:46:16',
  NULL,
  1
),
(
  36,
  'ALPINESTARS FASTER-3 RIDEKNIT',
  166.95,
  ' Sapatilhas de design agressivo confeccionadas principalmente em tecido de malha microfibra. Incorporam protetores dos tornozelos, e reforços acolchoados estrategicamente localizados e fechamento melhorado. Estes chinelos destacam-se por serem muito confortáveis e leves. Têm certificação CE.',
  'uploads/produtos/alpinestars-faster_3_rideknit_black_10-0-M-0928881.avif',
  1,
  10,
  '2024-06-20 16:43:39',
  NULL,
  1
),
(
  37,
  'ALPINESTARS SEKTOR WATERPROOF',
  129.99,
  'Confeccionadas em microfibra, Também Waterproof destacam-se por incorporar uma membrana impermeável. Estes sapatos têm um design agressivo e oferecem excelentes níveis de flexibilidade e conforto.',
  'uploads/produtos/alpinestars-sektor_waterproof_black_10-0-M-0915701.avif',
  1,
  9,
  '2024-06-20 16:45:21',
  NULL,
  1
),
(
  38,
  'ALPINESTARS CHROME',
  149.99,
  'Tênis urbano estilo casual perfeito para uso diário na cidade. Feito em uma combinação de camurça Split. Incorporam reforços e protetores internos na zona do tornozelo para maior durabilidade e proteção. Destacam-se por incorporar um fecho rápido na zona superior.',
  'uploads/produtos/alpinestars-chrome_black_white_bright_red_1304-1-M-2002588618.avif',
  1,
  10,
  '2024-06-20 16:46:31',
  NULL,
  1
),
(
  39,
  'DAINESE NEXUS 2 AIR',
  259.99,
  ' Botas desportivas fabricadas em Microfibra e tecido D-Stone com painéis perfurados estrategicamente localizados para uma melhor ventilação. As botas Dainese Nexus 2 oferecem dois altos níveis de segurança e conforto. Incorporam proteções e reforços estrategicamente localizados e contam com o sistema Axial Distortion Control, desenhado para reduzir o risco de torções do pé para o protege-lo contra golpes. ',
  'uploads/produtos/dainese-nexus_2_black_white_lava_red_a66-0-M-2002422919.avif',
  4,
  9,
  '2024-06-20 16:48:02',
  '2024-06-20 16:55:34',
  0
),
(
  40,
  'ALPINESTARS STELLA SEKTOR LADY',
  109.95,
  ' Confeccionadas em microfibra e especialmente projetadas para a mulher, Também destacam-se por serem muito leves e confortáveis. Estas sapatilhas têm um estilo agressivo e oferecem excelentes níveis de flexibilidade e conforto. Incorporam um fecho rápido com cordões combinado com uma grande cinta de Velcro em torno do tornozelo.',
  'uploads/produtos/alpinestars-stella_sektor_lady_black_fuchsia_1039-5-M-0928941.avif',
  1,
  9,
  '2024-06-20 16:49:51',
  '2024-06-20 16:55:43',
  0
),
(
  41,
  'ARMURE MERIEL WATERPROOF LADY',
  85,
  'Tênis urbano impermeável para mulher, estilo casual ideal para usar na cidade. Confeccionados em couro nobuck de alta resistência, possuem reforços na biqueira e no calcanhar para maior proteção.',
  'uploads/produtos/armure-meriel_waterproof_lady_black-4-M-201276848.avif',
  9,
  10,
  '2024-06-20 16:52:35',
  NULL,
  1
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_tamanhos`
--

CREATE TABLE `PRODUTOS_TAMANHOS` (
  `ID_PROD` INT(11) NOT NULL,
  `TAMANHO` VARCHAR(255) NOT NULL,
  `STOCK` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_GENERAL_CI;

--
-- Extraindo dados da tabela `produtos_tamanhos`
--

INSERT INTO `PRODUTOS_TAMANHOS` (
  `ID_PROD`,
  `TAMANHO`,
  `STOCK`
) VALUES (
  2,
  'L',
  0
),
(
  2,
  'M',
  500
),
(
  2,
  'S',
  200
),
(
  2,
  'XL',
  15
),
(
  2,
  'XS',
  3
),
(
  5,
  'L',
  100
),
(
  5,
  'M',
  100
),
(
  5,
  'S',
  99
),
(
  5,
  'XL',
  100
),
(
  5,
  'XS',
  99
),
(
  8,
  'L',
  100
),
(
  8,
  'M',
  100
),
(
  8,
  'S',
  100
),
(
  8,
  'XL',
  100
),
(
  8,
  'XS',
  100
),
(
  9,
  'L',
  99
),
(
  9,
  'M',
  100
),
(
  9,
  'S',
  100
),
(
  9,
  'XL',
  98
),
(
  9,
  'XS',
  100
),
(
  10,
  'L',
  100
),
(
  10,
  'M',
  100
),
(
  10,
  'S',
  100
),
(
  10,
  'XL',
  100
),
(
  10,
  'XS',
  100
),
(
  11,
  'L',
  100
),
(
  11,
  'M',
  100
),
(
  11,
  'S',
  100
),
(
  11,
  'XL',
  99
),
(
  11,
  'XS',
  100
),
(
  12,
  'L',
  99
),
(
  12,
  'M',
  100
),
(
  12,
  'S',
  100
),
(
  12,
  'XL',
  100
),
(
  12,
  'XS',
  100
),
(
  13,
  'L',
  8
),
(
  13,
  'M',
  12
),
(
  13,
  'S',
  150
),
(
  13,
  'XL',
  15
),
(
  13,
  'XS',
  20
),
(
  14,
  'L',
  100
),
(
  14,
  'M',
  100
),
(
  14,
  'S',
  100
),
(
  14,
  'XL',
  100
),
(
  14,
  'XS',
  100
),
(
  15,
  'L',
  95
),
(
  15,
  'M',
  50
),
(
  15,
  'S',
  99
),
(
  15,
  'XL',
  99
),
(
  15,
  'XS',
  100
),
(
  16,
  'L',
  100
),
(
  16,
  'M',
  97
),
(
  16,
  'S',
  99
),
(
  16,
  'XL',
  100
),
(
  16,
  'XS',
  100
),
(
  17,
  'L',
  100
),
(
  17,
  'M',
  100
),
(
  17,
  'S',
  99
),
(
  17,
  'XL',
  100
),
(
  17,
  'XS',
  100
),
(
  18,
  'L',
  100
),
(
  18,
  'M',
  100
),
(
  18,
  'S',
  100
),
(
  18,
  'XL',
  100
),
(
  18,
  'XS',
  100
),
(
  19,
  'L',
  100
),
(
  19,
  'M',
  100
),
(
  19,
  'S',
  100
),
(
  19,
  'XL',
  100
),
(
  19,
  'XS',
  100
),
(
  20,
  'L',
  100
),
(
  20,
  'M',
  100
),
(
  20,
  'S',
  100
),
(
  20,
  'XL',
  100
),
(
  20,
  'XS',
  100
),
(
  21,
  'L',
  100
),
(
  21,
  'M',
  98
),
(
  21,
  'S',
  100
),
(
  21,
  'XL',
  100
),
(
  21,
  'XS',
  500
),
(
  22,
  'L',
  100
),
(
  22,
  'M',
  100
),
(
  22,
  'S',
  100
),
(
  22,
  'XL',
  100
),
(
  22,
  'XS',
  99
),
(
  23,
  'L',
  100
),
(
  23,
  'M',
  100
),
(
  23,
  'S',
  100
),
(
  23,
  'XL',
  100
),
(
  23,
  'XS',
  100
),
(
  24,
  'L',
  100
),
(
  24,
  'M',
  100
),
(
  24,
  'S',
  100
),
(
  24,
  'XL',
  100
),
(
  24,
  'XS',
  100
),
(
  25,
  'L',
  100
),
(
  25,
  'M',
  100
),
(
  25,
  'S',
  100
),
(
  25,
  'XL',
  100
),
(
  25,
  'XS',
  100
),
(
  26,
  'L',
  100
),
(
  26,
  'M',
  100
),
(
  26,
  'S',
  99
),
(
  26,
  'XL',
  100
),
(
  26,
  'XS',
  100
),
(
  27,
  'L',
  100
),
(
  27,
  'M',
  100
),
(
  27,
  'S',
  49
),
(
  27,
  'XL',
  150
),
(
  27,
  'XS',
  100
),
(
  28,
  'L',
  100
),
(
  28,
  'M',
  100
),
(
  28,
  'S',
  100
),
(
  28,
  'XL',
  100
),
(
  28,
  'XS',
  100
),
(
  29,
  'L',
  100
),
(
  29,
  'M',
  100
),
(
  29,
  'S',
  100
),
(
  29,
  'XL',
  99
),
(
  29,
  'XS',
  100
),
(
  30,
  'L',
  100
),
(
  30,
  'M',
  100
),
(
  30,
  'S',
  100
),
(
  30,
  'XL',
  100
),
(
  30,
  'XS',
  100
),
(
  31,
  'L',
  100
),
(
  31,
  'M',
  100
),
(
  31,
  'S',
  100
),
(
  31,
  'XL',
  100
),
(
  31,
  'XS',
  100
),
(
  32,
  'L',
  100
),
(
  32,
  'M',
  100
),
(
  32,
  'S',
  100
),
(
  32,
  'XL',
  100
),
(
  32,
  'XS',
  100
),
(
  36,
  'L',
  100
),
(
  36,
  'M',
  100
),
(
  36,
  'S',
  100
),
(
  36,
  'XL',
  100
),
(
  36,
  'XS',
  100
),
(
  37,
  'L',
  100
),
(
  37,
  'M',
  100
),
(
  37,
  'S',
  100
),
(
  37,
  'XL',
  100
),
(
  37,
  'XS',
  100
),
(
  38,
  'L',
  100
),
(
  38,
  'M',
  100
),
(
  38,
  'S',
  100
),
(
  38,
  'XL',
  100
),
(
  38,
  'XS',
  100
),
(
  39,
  'L',
  100
),
(
  39,
  'M',
  100
),
(
  39,
  'S',
  100
),
(
  39,
  'XL',
  100
),
(
  39,
  'XS',
  100
),
(
  40,
  'L',
  100
),
(
  40,
  'M',
  100
),
(
  40,
  'S',
  100
),
(
  40,
  'XL',
  100
),
(
  40,
  'XS',
  100
),
(
  41,
  'L',
  100
),
(
  41,
  'M',
  100
),
(
  41,
  'S',
  100
),
(
  41,
  'XL',
  100
),
(
  41,
  'XS',
  100
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategorias`
--

CREATE TABLE `SUBCATEGORIAS` (
  `ID_SUBCATEGORIA` INT(11) NOT NULL,
  `ID_CATEGORIA` INT(11) NOT NULL,
  `NOME_SUBCATEGORIA` VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Extraindo dados da tabela `subcategorias`
--

INSERT INTO `SUBCATEGORIAS` (
  `ID_SUBCATEGORIA`,
  `ID_CATEGORIA`,
  `NOME_SUBCATEGORIA`
) VALUES (
  1,
  1,
  'Corrida'
),
(
  2,
  1,
  'Motocross'
),
(
  3,
  2,
  'Cabedal'
),
(
  4,
  2,
  'Tecido'
),
(
  5,
  3,
  'Cabedal'
),
(
  6,
  3,
  'Tecido'
),
(
  7,
  4,
  'Cabedal'
),
(
  8,
  4,
  'Tecido'
),
(
  9,
  5,
  'Cabedal'
),
(
  10,
  5,
  'Tecido'
),
(
  11,
  1,
  'Aberto'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `suporte`
--

CREATE TABLE `SUPORTE` (
  `ID_SUPORTE` INT(11) NOT NULL,
  `EMAIL` VARCHAR(255) NOT NULL,
  `ASSUNTO` VARCHAR(255) NOT NULL,
  `MENSAGEM` LONGTEXT NOT NULL,
  `STATUS` INT(11) NOT NULL DEFAULT 0,
  `CRIADO_A` DATETIME DEFAULT CURRENT_TIMESTAMP(),
  `ATUALIZADO_A` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP()
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Extraindo dados da tabela `suporte`
--

INSERT INTO `SUPORTE` (
  `ID_SUPORTE`,
  `EMAIL`,
  `ASSUNTO`,
  `MENSAGEM`,
  `STATUS`,
  `CRIADO_A`,
  `ATUALIZADO_A`
) VALUES (
  5,
  'anamargarida@gmail.com',
  'Preciso de ajuda',
  'Enganei-me a inserir a minha data de nascimento... preciso de repô-la.\r\nObrigado',
  0,
  '2024-06-20 17:01:40',
  NULL
),
(
  6,
  'daniel@gmail.com',
  'Feedback',
  'Queria deixar os meus parabéns aos desenvolvedores do site ! Está bastante bonito e de fácil interpretação.\r\n',
  1,
  '2024-06-20 17:03:00',
  '2024-06-20 17:03:18'
),
(
  7,
  'zicky@gmail.com',
  'Informação sobre stock',
  'Gostaria de saber uma previsão para quando o produto \"Scorpion EXO 520 AIR\" voltaria a estar disponível no tamanho L, por favor.\r\n\r\nObrigado',
  2,
  '2024-06-20 17:04:43',
  '2024-06-20 17:05:13'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanhos`
--

CREATE TABLE `TAMANHOS` (
  `TAMANHO` VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE=UTF8_GENERAL_CI;

--
-- Extraindo dados da tabela `tamanhos`
--

INSERT INTO `TAMANHOS` (
  `TAMANHO`
) VALUES (
  'L'
),
(
  'M'
),
(
  'S'
),
(
  'XL'
),
(
  'XS'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `USERS` (
  `ID_USER` INT(11) NOT NULL,
  `NOME` VARCHAR(150) NOT NULL,
  `APELIDO` VARCHAR(150) NOT NULL,
  `EMAIL` VARCHAR(255) NOT NULL,
  `PASS` VARCHAR(255) NOT NULL,
  `DATA_NASC` DATE DEFAULT NULL,
  `FOTO` VARCHAR(255) DEFAULT 'uploads/users/default.png',
  `MORADA` VARCHAR(255) DEFAULT NULL,
  `CODIGOP` VARCHAR(9) DEFAULT NULL,
  `ADM` TINYINT(1) DEFAULT NULL,
  `CRIADO_A` DATETIME DEFAULT CURRENT_TIMESTAMP(),
  `ALTERADO_A` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(),
  `STATUS` TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `USERS` (
  `ID_USER`,
  `NOME`,
  `APELIDO`,
  `EMAIL`,
  `PASS`,
  `DATA_NASC`,
  `FOTO`,
  `MORADA`,
  `CODIGOP`,
  `ADM`,
  `CRIADO_A`,
  `ALTERADO_A`,
  `STATUS`
) VALUES (
  61,
  'Admin',
  'Admin',
  'motospeed2024@gmail.com',
  '21232f297a57a5a743894a0e4a801fc3',
  '0000-00-00',
  'uploads/users/mstile-150x150.png',
  '',
  '',
  1,
  '2024-06-19 11:22:38',
  '2024-06-19 15:19:32',
  1
),
(
  75,
  'Daniel',
  'Lopes',
  'daniel@gmail.com',
  'aa47f8215c6f30a0dcdb2a36a9f4168e',
  '0000-00-00',
  'uploads/users/default.png',
  '',
  '',
  0,
  '2024-06-19 14:26:04',
  '2024-06-20 14:49:43',
  1
),
(
  76,
  'Leonor',
  'Silva',
  'leonor@gmail.com',
  '1c2693eaca570de5421543f0db7551dc',
  '0000-00-00',
  'uploads/users/default.png',
  '',
  '',
  0,
  '2024-06-19 14:26:17',
  NULL,
  1
),
(
  77,
  'Ana',
  'Margarida',
  'anamargarida@gmail.com',
  'd9c2ef39b4f9bb1e757efa4a7eb7b9e8',
  '0000-00-00',
  'uploads/users/default.png',
  '',
  '',
  0,
  '2024-06-19 14:26:37',
  NULL,
  1
),
(
  78,
  'Ariana',
  'Cunha',
  'dababycunhaqp@gmail.com',
  'af5d97f43ff2fb264b7d18042a5c6112',
  '0000-00-00',
  'uploads/users/default.png',
  '',
  '',
  1,
  '2024-06-20 14:43:03',
  '2024-06-20 14:49:48',
  1
),
(
  80,
  'Zicky',
  'Costa',
  'zicky@gmail.com',
  '133be3a67de3e55c0a5d5d6151f49b53',
  '0000-00-00',
  'uploads/users/default.png',
  '',
  '',
  0,
  '2024-06-20 14:47:49',
  '2024-06-20 14:50:01',
  0
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `VENDAS` (
  `ID_VENDA` INT(11) NOT NULL,
  `ID_USER` INT(11) NOT NULL,
  `DATA_VENDA` DATE NOT NULL,
  `TOTAL` FLOAT DEFAULT NULL,
  `ENVIO` FLOAT NOT NULL,
  `NOME` VARCHAR(255) NOT NULL,
  `APELIDO` VARCHAR(255) NOT NULL,
  `EMAIL` VARCHAR(255) NOT NULL,
  `MORADA` VARCHAR(255) NOT NULL,
  `CODIGOP` VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `VENDAS` (
  `ID_VENDA`,
  `ID_USER`,
  `DATA_VENDA`,
  `TOTAL`,
  `ENVIO`,
  `NOME`,
  `APELIDO`,
  `EMAIL`,
  `MORADA`,
  `CODIGOP`
) VALUES (
  79,
  61,
  '2024-05-08',
  204.98,
  4.99,
  'Admin',
  'Admin',
  'motospeed2024@gmail.com',
  '(Morada  do admin)',
  '1234-123'
),
(
  80,
  75,
  '2024-05-19',
  599.97,
  0,
  'Daniel',
  'Lopes',
  'daniel@gmail.com',
  'Rua do daniel',
  '1589-956'
),
(
  81,
  75,
  '2024-04-10',
  495.99,
  0,
  'Daniel',
  'Lopes',
  'daniel@gmail.com',
  'Rua do daniel',
  '1589-956'
),
(
  82,
  76,
  '2024-04-01',
  500,
  0,
  'Leonor',
  'Silva',
  'leonor@gmail.com',
  'Rua da Leonor',
  '5846-258'
),
(
  83,
  76,
  '2024-06-19',
  125,
  0,
  'Leonor',
  'Silva',
  'leonor@gmail.com',
  'Rua da Leonor',
  '5846-258'
),
(
  84,
  77,
  '2024-03-19',
  584,
  0,
  'Ana',
  'Margarida',
  'anamargarida@gmail.com',
  'Rua da Ana Margarida',
  '1026-674'
),
(
  85,
  77,
  '2024-02-12',
  1499,
  0,
  'Ana',
  'Margarida',
  'anamargarida@gmail.com',
  'Rua da Ana Margarida',
  '1026-674'
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `wishlist`
--

CREATE TABLE `WISHLIST` (
  `ID` INT(11) NOT NULL,
  `ID_USER` INT(11) DEFAULT NULL,
  `ID_PROD` INT(11) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_GENERAL_CI;

--
-- Extraindo dados da tabela `wishlist`
--

INSERT INTO `WISHLIST` (
  `ID`,
  `ID_USER`,
  `ID_PROD`
) VALUES (
  6,
  61,
  2
),
(
  8,
  61,
  9
),
(
  9,
  61,
  21
),
(
  10,
  61,
  29
),
(
  19,
  61,
  39
),
(
  20,
  61,
  27
),
(
  21,
  61,
  40
),
(
  22,
  61,
  38
),
(
  23,
  61,
  19
);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `CATEGORIAS` ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Índices para tabela `detalhe_venda`
--
ALTER TABLE `DETALHE_VENDA` ADD KEY `ID_VENDA` (`ID_VENDA`), ADD KEY `ID_PROD` (`ID_PROD`);

--
-- Índices para tabela `marcas`
--
ALTER TABLE `MARCAS` ADD PRIMARY KEY (`ID_MARCA`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `PRODUTOS` ADD PRIMARY KEY (`ID_PROD`), ADD KEY `ID_MARCA` (`ID_MARCA`), ADD KEY `FK_PRODUTOS_SUBCATEGORIAS` (`ID_SUBCATEGORIA`);

--
-- Índices para tabela `produtos_tamanhos`
--
ALTER TABLE `PRODUTOS_TAMANHOS` ADD PRIMARY KEY (`ID_PROD`, `TAMANHO`);

--
-- Índices para tabela `subcategorias`
--
ALTER TABLE `SUBCATEGORIAS` ADD PRIMARY KEY (`ID_SUBCATEGORIA`), ADD KEY `ID_CATEGORIA` (`ID_CATEGORIA`);

--
-- Índices para tabela `suporte`
--
ALTER TABLE `SUPORTE` ADD PRIMARY KEY (`ID_SUPORTE`);

--
-- Índices para tabela `tamanhos`
--
ALTER TABLE `TAMANHOS` ADD PRIMARY KEY (`TAMANHO`);

--
-- Índices para tabela `users`
--
ALTER TABLE `USERS` ADD PRIMARY KEY (`ID_USER`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `VENDAS` ADD PRIMARY KEY (`ID_VENDA`), ADD KEY `ID_USER` (`ID_USER`);

--
-- Índices para tabela `wishlist`
--
ALTER TABLE `WISHLIST` ADD PRIMARY KEY (`ID`), ADD KEY `ID_USER` (`ID_USER`), ADD KEY `ID_PROD` (`ID_PROD`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `CATEGORIAS` MODIFY `ID_CATEGORIA` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `MARCAS` MODIFY `ID_MARCA` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `PRODUTOS` MODIFY `ID_PROD` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `subcategorias`
--
ALTER TABLE `SUBCATEGORIAS` MODIFY `ID_SUBCATEGORIA` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `suporte`
--
ALTER TABLE `SUPORTE` MODIFY `ID_SUPORTE` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `USERS` MODIFY `ID_USER` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `VENDAS` MODIFY `ID_VENDA` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de tabela `wishlist`
--
ALTER TABLE `WISHLIST` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `detalhe_venda`
--
ALTER TABLE `DETALHE_VENDA` ADD CONSTRAINT `DETALHE_VENDA_IBFK_1` FOREIGN KEY (`ID_VENDA`) REFERENCES `VENDAS` (`ID_VENDA`), ADD CONSTRAINT `DETALHE_VENDA_IBFK_2` FOREIGN KEY (`ID_PROD`) REFERENCES `PRODUTOS` (`ID_PROD`), ADD CONSTRAINT `FK_ID_VENDA` FOREIGN KEY (`ID_VENDA`) REFERENCES `VENDAS` (`ID_VENDA`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `PRODUTOS` ADD CONSTRAINT `FK_PRODUTOS_SUBCATEGORIAS` FOREIGN KEY (`ID_SUBCATEGORIA`) REFERENCES `SUBCATEGORIAS` (`ID_SUBCATEGORIA`), ADD CONSTRAINT `PRODUTOS_IBFK_1` FOREIGN KEY (`ID_MARCA`) REFERENCES `MARCAS` (`ID_MARCA`);

--
-- Limitadores para a tabela `produtos_tamanhos`
--
ALTER TABLE `PRODUTOS_TAMANHOS` ADD CONSTRAINT `FK_ID_PROD` FOREIGN KEY (`ID_PROD`) REFERENCES `PRODUTOS` (`ID_PROD`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `subcategorias`
--
ALTER TABLE `SUBCATEGORIAS` ADD CONSTRAINT `SUBCATEGORIAS_IBFK_1` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `CATEGORIAS` (`ID_CATEGORIA`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `VENDAS` ADD CONSTRAINT `VENDAS_IBFK_1` FOREIGN KEY (`ID_USER`) REFERENCES `USERS` (`ID_USER`);

--
-- Limitadores para a tabela `wishlist`
--
ALTER TABLE `WISHLIST` ADD CONSTRAINT `WISHLIST_IBFK_1` FOREIGN KEY (`ID_USER`) REFERENCES `USERS` (`ID_USER`) ON DELETE CASCADE, ADD CONSTRAINT `WISHLIST_IBFK_2` FOREIGN KEY (`ID_PROD`) REFERENCES `PRODUTOS` (`ID_PROD`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;