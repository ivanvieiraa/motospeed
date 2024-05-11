-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 03:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motospeed`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome_categoria`) VALUES
(1, 'Capacetes'),
(2, 'Casacos'),
(3, 'Calças'),
(4, 'Luvas'),
(5, 'Botas');

-- --------------------------------------------------------

--
-- Table structure for table `detalhe_venda`
--

CREATE TABLE `detalhe_venda` (
  `id_venda` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_uni` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nome_marca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nome_marca`) VALUES
(1, 'Alpinestars'),
(2, 'Scorpion'),
(3, 'AGV'),
(4, 'Dainese'),
(6, 'Shoei'),
(7, 'Shark');

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
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
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id_prod`, `nome_prod`, `preco_prod`, `desc_prod`, `foto_prod`, `id_marca`, `id_categoria`, `criado_a`, `alterado_a`, `status`) VALUES
(2, 'Scorpion EXO 520 Air', 199.99, ' Capacete integral confeccionado em policarbonato injetado com homologação ECE 22-06 e projetado especificamente para proporcionar um nível aerodinâmico esportivo aliado ao conforto de um capacete de uso diário. O Exo-520 Evo Air destaca-se por incorporar o protetor solar Speedview® integrado, mecanismo de viseira Ellip-Tech®, interior acolchoado Kwikwick®2 e um sistema de ventilação eficaz.', 'uploads/produtos/scorpion-520air.png', 2, 1, '2024-03-19 17:36:29', '2024-05-09 23:00:42', 1),
(5, 'AGV Pista GP RR', 1499, 'Capacete Agv Pista GP RR E2206 Futuro Carbonio Forgiato. O novo Pista GP RR é homologado de acordo com os regulamentos de corrida da FIM e os novos regulamentos ECE 22.06. A Pista GP RR Futuro Carbonio Forgiato foi fabricada com carcaça e asa PRO Spoiler em carbono forjado exclusivo e detalhes na cor Elettro Iridium. A estrutura de carbono forjado com acabamento fosco torna cada concha e cada PRO Spoiler uma peça única. Os detalhes e a tela na cor exclusiva Elettro Iridium são inspirados na potência silenciosa e limpa do futuro da mobilidade.', 'uploads/produtos/agv-pista.png', 3, 1, '2024-05-09 22:11:19', '2024-05-11 12:42:01', 1),
(8, 'Shark Race-R PRO', 695, 'Capacete Shark Race-R Pro GP 06 Blank Matte Black . Shark evolui seu capacete mais esportivo e equipa o novo Race-R Pro GP 06 com os novos regulamentos ECE 22.06. A casca externa feita com estrutura COVA (fibra de carbono e aramida) oferece excelente desempenho aerodinâmico. Ele tem o recorde de velocidade na MotoGP capturado em 363,6 km/h! O spoiler traseiro destaca-se por melhorar o desempenho aerodinâmico e a estabilidade em alta velocidade. Este é o capacete topo de gama, fruto da experiência da Shark nos mais altos escalões de competição (MotoGP e SBK) com mais de 250 pódios.', 'uploads/produtos/shark.png', 7, 1, '2024-05-09 22:19:50', '2024-05-09 22:20:13', 1),
(9, 'DAINESE AVRO 4 ', 495.99, 'Casaco de pele Dainese Avro 4 Preto Mate / Branco. Casaco desportivo confeccionado em pele bovina de primeira qualidade; destaca-se pelo seu conforto, segurança e design. Possui proteções certificadas nos ombros e cotovelos e inserções de alumínio nos ombros.', 'uploads/produtos/dainese-avro4.png', 4, 2, '2024-05-11 13:33:39', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produtos_tamanhos`
--

CREATE TABLE `produtos_tamanhos` (
  `id_prod` int(11) NOT NULL,
  `tamanho` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `produtos_tamanhos`
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
(9, 'XS', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tamanhos`
--

CREATE TABLE `tamanhos` (
  `tamanho` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tamanhos`
--

INSERT INTO `tamanhos` (`tamanho`) VALUES
('L'),
('M'),
('S'),
('XL'),
('XS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nome`, `apelido`, `email`, `pass`, `data_nasc`, `foto`, `morada`, `codigop`, `adm`, `criado_a`, `alterado_a`, `status`) VALUES
(49, 'Admin', 'Admin', 'motospeed2024@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00', 'uploads/users/mstile-150x150.png', '', '', 1, '2024-04-28 21:50:28', '2024-05-08 17:02:13', 1),
(50, 'Ivan', 'Vieira', 'ivannvieiraa@outlook.pt', '2c42e5cf1cdbafea04ed267018ef1511', '2006-10-07', 'uploads/users/default.png', '', '', 0, '2024-04-28 22:05:41', '2024-05-08 16:13:08', 1),
(52, 'Ariana', 'Cunha', 'arianacunha@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00', 'uploads/users/default.png', '', '', 0, '2024-05-08 16:28:31', '2024-05-08 16:28:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data_venda` date NOT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `detalhe_venda`
--
ALTER TABLE `detalhe_venda`
  ADD KEY `id_venda` (`id_venda`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `produtos_tamanhos`
--
ALTER TABLE `produtos_tamanhos`
  ADD PRIMARY KEY (`id_prod`,`tamanho`);

--
-- Indexes for table `tamanhos`
--
ALTER TABLE `tamanhos`
  ADD PRIMARY KEY (`tamanho`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detalhe_venda`
--
ALTER TABLE `detalhe_venda`
  ADD CONSTRAINT `detalhe_venda_ibfk_1` FOREIGN KEY (`id_venda`) REFERENCES `vendas` (`id_venda`),
  ADD CONSTRAINT `detalhe_venda_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `produtos` (`id_prod`);

--
-- Constraints for table `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`),
  ADD CONSTRAINT `produtos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Constraints for table `produtos_tamanhos`
--
ALTER TABLE `produtos_tamanhos`
  ADD CONSTRAINT `fk_id_prod` FOREIGN KEY (`id_prod`) REFERENCES `produtos` (`id_prod`) ON DELETE CASCADE;

--
-- Constraints for table `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
