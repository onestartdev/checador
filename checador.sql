-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 08:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checador`
--

-- --------------------------------------------------------

--
-- Table structure for table `ed_decision`
--

CREATE TABLE `ed_decision` (
  `id` int(255) NOT NULL,
  `nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ed_decision`
--

INSERT INTO `ed_decision` (`id`, `nombre`) VALUES
(1, 'NO'),
(2, 'SI');

-- --------------------------------------------------------

--
-- Table structure for table `ed_departamentos_usuarios`
--

CREATE TABLE `ed_departamentos_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ed_departamentos_usuarios`
--

INSERT INTO `ed_departamentos_usuarios` (`id`, `nombre`) VALUES
(1, 'ADMINISTRACIÓN'),
(2, 'SUNDIRECCIÓN ADMINISTRATIVA Y FINANZAS'),
(3, 'CONTABILIADAD'),
(4, 'CONTRATACIÓN'),
(5, 'SUNDIRECCIÓN TECNICA'),
(6, 'JURIDICO'),
(7, 'DIRECCIÓN'),
(8, 'COBRANZA');

-- --------------------------------------------------------

--
-- Table structure for table `ed_historial_acciones`
--

CREATE TABLE `ed_historial_acciones` (
  `id` int(255) NOT NULL,
  `accion` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `categoria` varchar(100) CHARACTER SET latin1 NOT NULL,
  `modulo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `usuario` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ip` varchar(20) CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ed_ingresos`
--

CREATE TABLE `ed_ingresos` (
  `id` int(255) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `usuario` varchar(20) CHARACTER SET latin1 NOT NULL,
  `ip` varchar(20) CHARACTER SET latin1 NOT NULL,
  `navegador` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sistema_operativo` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ed_ingresos`
--

INSERT INTO `ed_ingresos` (`id`, `fecha`, `hora`, `usuario`, `ip`, `navegador`, `sistema_operativo`) VALUES
(1, '2020-05-09', '05:05:27', 'Eduardo', '::1', 'Chrome 81.0.4044.138', 'Windows 10'),
(2, '2020-05-09', '05:05:54', 'Eduardo', '::1', 'Chrome 81.0.4044.138', 'Windows 10'),
(3, '2020-05-09', '18:18:07', 'Eduardo', '::1', 'Chrome 81.0.4044.138', 'Windows 10'),
(4, '2020-05-09', '19:19:59', 'Eduardo', '::1', 'Chrome 81.0.4044.138', 'Windows 10'),
(5, '2020-05-09', '19:19:18', 'Eduardo', '::1', 'Chrome 81.0.4044.138', 'Windows 10'),
(6, '2020-05-09', '19:19:04', 'Eduardo', '::1', 'Chrome 81.0.4044.138', 'Windows 10'),
(7, '2020-05-09', '19:19:37', 'Eduardo', '::1', 'Chrome 81.0.4044.138', 'Windows 10'),
(8, '2020-05-10', '04:04:46', 'Eduardo', '::1', 'Chrome 81.0.4044.138', 'Windows 10'),
(9, '2020-05-10', '05:05:10', 'Eduardo', '::1', 'Chrome 81.0.4044.138', 'Windows 10'),
(10, '2020-05-10', '05:05:52', 'Eduardo', '::1', 'Chrome 81.0.4044.138', 'Windows 10'),
(11, '2020-05-10', '05:05:58', 'Eduardo', '::1', 'Chrome 81.0.4044.138', 'Windows 10');

-- --------------------------------------------------------

--
-- Table structure for table `ed_usuarios`
--

CREATE TABLE `ed_usuarios` (
  `id` int(255) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_termino` date NOT NULL,
  `permisos` int(10) NOT NULL,
  `trabajo_social` int(5) NOT NULL,
  `beneficiados` int(5) NOT NULL,
  `programas` int(5) NOT NULL,
  `cuentas_activas` int(5) NOT NULL,
  `cuentas_finalizadas` int(5) NOT NULL,
  `cuentas_canceladas` int(5) NOT NULL,
  `caja` int(5) NOT NULL,
  `realizar_abono` int(10) NOT NULL,
  `cancelar_pagos` int(2) NOT NULL,
  `juridico` int(5) NOT NULL,
  `mensajes` int(5) NOT NULL,
  `fonhapo` int(5) NOT NULL,
  `fidue` int(5) NOT NULL,
  `control` int(11) NOT NULL,
  `notificaciones` int(2) NOT NULL,
  `cancelar_contratos` int(2) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `reportes` int(5) NOT NULL,
  `estadisticas` int(2) NOT NULL,
  `facturas` int(2) NOT NULL,
  `administrador` int(2) NOT NULL,
  `nombre_completo` varchar(300) NOT NULL,
  `current_signin` datetime NOT NULL,
  `current_navegador` varchar(100) NOT NULL,
  `current_signin_ip` varchar(20) NOT NULL,
  `last_signin` datetime NOT NULL,
  `last_navegador` varchar(100) NOT NULL,
  `last_signin_ip` varchar(20) NOT NULL,
  `estatus` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ed_usuarios`
--

INSERT INTO `ed_usuarios` (`id`, `fecha`, `nombre`, `password`, `fecha_termino`, `permisos`, `trabajo_social`, `beneficiados`, `programas`, `cuentas_activas`, `cuentas_finalizadas`, `cuentas_canceladas`, `caja`, `realizar_abono`, `cancelar_pagos`, `juridico`, `mensajes`, `fonhapo`, `fidue`, `control`, `notificaciones`, `cancelar_contratos`, `departamento`, `reportes`, `estadisticas`, `facturas`, `administrador`, `nombre_completo`, `current_signin`, `current_navegador`, `current_signin_ip`, `last_signin`, `last_navegador`, `last_signin_ip`, `estatus`) VALUES
(1, '2020-05-08', 'Eduardo', '20a2b19d0528f03c2a968670e364a5fb3a752763aece4a2cd37a5b37141f26d2441a7d14497f598e0e24a5e60c32a93f66414ab02337b54756880173759e3cdcPt/qC1ksyDjOlrXx4OskYV5kQNVCuv7pAhud8P7fy4s=', '2021-03-31', 10, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, '1', 2, 2, 2, 2, 'JOSE EDUARDO AGUILAR ARROYO', '2020-05-10 05:46:58', 'Chrome 81.0.4044.138', '::1', '2020-05-08 18:59:59', 'Firefox 75.0', '192.168.2.3', 2),
(2, '2020-05-09', 'roxxana', '6a84a5cce334ef3925ce5397d6d7019015b67adc6c54a21971da18f4e76d29643cf31574821f75fabb31d4e2f77ea64ce74a071ca67b8bc9d3702b26993ed94bPVW6/rTJhZY/DTm787YAV0O5b2J7fJTlBpFzzjj5jqI=', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', 0, 0, 2, 2, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', '', 2),
(3, '2020-05-10', 'demo', '1169214a047d4175f3e907b4f9a4d176d5a19e025d157adab662a4ca54d0dc456742630a11c814b5de3669f0e7ad8e2b911c05e2ab51827ab70c4d2fda724e68sqyboeU8G3Q+x1rHcxhP2hVcysYb3K4emKB0kiqpdR4=', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8', 0, 0, 1, 2, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ed_decision`
--
ALTER TABLE `ed_decision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ed_departamentos_usuarios`
--
ALTER TABLE `ed_departamentos_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ed_historial_acciones`
--
ALTER TABLE `ed_historial_acciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ed_ingresos`
--
ALTER TABLE `ed_ingresos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ed_usuarios`
--
ALTER TABLE `ed_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ed_decision`
--
ALTER TABLE `ed_decision`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ed_departamentos_usuarios`
--
ALTER TABLE `ed_departamentos_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ed_historial_acciones`
--
ALTER TABLE `ed_historial_acciones`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56269;

--
-- AUTO_INCREMENT for table `ed_ingresos`
--
ALTER TABLE `ed_ingresos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ed_usuarios`
--
ALTER TABLE `ed_usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
