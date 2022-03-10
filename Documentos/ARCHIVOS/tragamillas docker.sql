-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-03-2022 a las 09:05:49
-- Versión del servidor: 8.0.26-0ubuntu0.20.04.2
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tragamillas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int NOT NULL,
  `nombre_cat` varchar(200) NOT NULL,
  `edad_min` int NOT NULL,
  `edad_max` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE `entrenador` (
  `sueldo` decimal(3,0) DEFAULT NULL,
  `idUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`sueldo`, `idUsuario`) VALUES
(NULL, 6),
(NULL, 7),
(NULL, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador_grupo`
--

CREATE TABLE `entrenador_grupo` (
  `fecha` date NOT NULL,
  `idGrupo` int NOT NULL,
  `idUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrenador_grupo`
--

INSERT INTO `entrenador_grupo` (`fecha`, `idGrupo`, `idUsuario`) VALUES
('2022-02-22', 1, 6),
('2022-02-22', 2, 6),
('2022-02-22', 3, 6),
('2022-02-22', 4, 7),
('2022-02-22', 5, 7),
('2022-02-22', 6, 7),
('2022-02-22', 7, 8),
('2022-02-22', 8, 8),
('2022-02-22', 9, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipacion`
--

CREATE TABLE `equipacion` (
  `idEquipacion` int NOT NULL,
  `talla` varchar(10) NOT NULL,
  `fechaPeticion` date NOT NULL,
  `idUsuario` int NOT NULL,
  `idIngresoCuotas` int DEFAULT NULL,
  `idOtrosGastos` int DEFAULT NULL,
  `entregado` int NOT NULL DEFAULT '0',
  `idTienda` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipacion`
--

INSERT INTO `equipacion` (`idEquipacion`, `talla`, `fechaPeticion`, `idUsuario`, `idIngresoCuotas`, `idOtrosGastos`, `entregado`, `idTienda`) VALUES
(1, '12-14 años', '2022-02-16', 9, NULL, NULL, 1, 12),
(2, 'XS', '2022-02-16', 10, NULL, NULL, 1, 12),
(4, 'L', '2022-02-16', 11, NULL, NULL, 1, 12),
(6, 'XL', '2022-02-16', 9, NULL, NULL, 1, 12),
(7, '12-14 años', '2022-02-16', 11, NULL, NULL, 1, 12),
(9, 'M', '2022-02-16', 9, NULL, NULL, 1, 12),
(11, 'XS', '2022-02-16', 9, NULL, NULL, 1, 12),
(12, '12-14 años', '2022-02-16', 10, NULL, NULL, 0, 13),
(13, '8-9 años', '2022-02-16', 11, NULL, NULL, 0, 13),
(14, 'L', '2022-02-16', 9, NULL, NULL, 0, 13),
(15, '10-11 años', '2022-02-16', 9, NULL, NULL, 1, 12),
(16, 'XL', '2022-02-16', 10, NULL, NULL, 1, 12),
(18, 'M', '2022-02-16', 9, NULL, NULL, 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `idEvento` int NOT NULL,
  `nombre_evento` varchar(150) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `precio` decimal(3,0) NOT NULL,
  `fecha_ini_even` date NOT NULL,
  `fecha_fin_even` date NOT NULL,
  `idUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `idGrupo` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_ini` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `abierto` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idGrupo`, `nombre`, `fecha_ini`, `fecha_fin`, `abierto`) VALUES
(1, 'GRUPO 1: ATLETISMO GENERAL(BENJAMINES)', NULL, NULL, 1),
(2, 'GRUPO 2: ATLETISMO GENERAL(ALEVINES)', NULL, NULL, 1),
(3, 'GRUPO 3: ATLETISMO GENERAL(INFANTILES)', NULL, NULL, 1),
(4, 'GRUPO 4: PRUEBAS VELOCIDAD', NULL, NULL, 1),
(5, 'GRUPO 5: FONDO Y MEDIOFONDO', NULL, NULL, 1),
(6, 'GRUPO 6: ENTRENAMIENTO 1 DIA', NULL, NULL, 1),
(7, 'GRUPO 7: ESCUELA TRIATLON', NULL, NULL, 1),
(8, 'GRUPO 8: RUNNING ADULTOS INICIACION', NULL, NULL, 1),
(9, 'GRUPO 9: TRAIL ADULTOS AVANZADO', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_socio`
--

CREATE TABLE `grupo_socio` (
  `fecha_inscrip` date NOT NULL,
  `aceptado` tinyint NOT NULL,
  `activo` tinyint NOT NULL,
  `idGrupo` int NOT NULL,
  `idUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo_socio`
--

INSERT INTO `grupo_socio` (`fecha_inscrip`, `aceptado`, `activo`, `idGrupo`, `idUsuario`) VALUES
('2022-02-21', 1, 1, 1, 9),
('2022-02-21', 1, 1, 3, 9),
('2022-02-21', 1, 1, 5, 10),
('2022-02-21', 1, 1, 4, 11),
('2022-02-21', 1, 1, 5, 11),
('2022-02-21', 1, 1, 7, 11),
('2022-02-22', 1, 1, 5, 9),
('2022-02-22', 1, 1, 7, 9),
('2022-02-22', 1, 1, 8, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `g_personal`
--

CREATE TABLE `g_personal` (
  `id_gasto` int NOT NULL,
  `fecha` date NOT NULL,
  `concepto` varchar(200) NOT NULL,
  `importe` decimal(3,0) NOT NULL,
  `idUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idHorario` int NOT NULL,
  `diasemana` varchar(45) NOT NULL,
  `hora_ini` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_grupo`
--

CREATE TABLE `horario_grupo` (
  `idHorario` int NOT NULL,
  `idGrupo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresosActividades`
--

CREATE TABLE `ingresosActividades` (
  `idIngresoActividades` int NOT NULL,
  `fecha` date NOT NULL,
  `concepto` varchar(200) NOT NULL,
  `importe` decimal(3,0) NOT NULL,
  `idExterno` int NOT NULL,
  `idEvento` int NOT NULL,
  `idUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_cuotas`
--

CREATE TABLE `ingreso_cuotas` (
  `idIngresoCuotas` int NOT NULL,
  `fecha` date NOT NULL,
  `concepto` varchar(250) DEFAULT NULL,
  `importe` decimal(3,0) DEFAULT NULL,
  `tipo` varchar(45) NOT NULL,
  `idUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia`
--

CREATE TABLE `licencia` (
  `idLicencia` int NOT NULL,
  `img` varchar(250) NOT NULL,
  `num_licencia` int NOT NULL,
  `fecha_cad_licen` date NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `dorsal` int NOT NULL,
  `idUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otras_entidades`
--

CREATE TABLE `otras_entidades` (
  `idEntidad` int NOT NULL,
  `nombreEntidad` varchar(200) NOT NULL,
  `nif` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros_gastos`
--

CREATE TABLE `otros_gastos` (
  `idOtrosGastos` int NOT NULL,
  `fecha` date NOT NULL,
  `concepto` varchar(200) NOT NULL,
  `importe` decimal(3,0) NOT NULL,
  `idUsuario` int NOT NULL,
  `idEntidad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros_ingresos`
--

CREATE TABLE `otros_ingresos` (
  `idOtrosIngresos` int NOT NULL,
  `fecha` date NOT NULL,
  `concepto` varchar(250) DEFAULT NULL,
  `importe` decimal(3,0) NOT NULL,
  `idEntidad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante_externo`
--

CREATE TABLE `participante_externo` (
  `idExterno` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `fecha_nac` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `dorsal` int NOT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `idEvento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `idPrueba` int NOT NULL,
  `nombre_prueba` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`idPrueba`, `nombre_prueba`) VALUES
(1, 'Pista cubierta'),
(2, 'Pista aire libre'),
(3, 'Campo a traves'),
(4, 'Ruta'),
(5, 'Marcha'),
(6, 'Montaña-Trail'),
(7, 'Salto de altura'),
(8, 'Salto de longitud'),
(9, 'Salto de valla'),
(10, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int NOT NULL,
  `nombreRol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`) VALUES
(1, 'Administrador'),
(2, 'Entrenador'),
(3, 'Socio'),
(4, 'Tienda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id_sesion` varchar(40) NOT NULL,
  `id_usuario` int NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id_sesion`, `id_usuario`, `fecha_inicio`, `fecha_fin`) VALUES
('rqm0surnbs2t7pkuk9svb1eo79', 3, '2022-02-04 09:13:26', '2022-02-08 10:01:28'),
('vrm72s3mketsk0f4qv2lafv51o', 4, '2022-02-04 09:46:39', '2022-02-04 09:46:41'),
('lr5qr1aovq84cpk01v8l7ft95s', 5, '2022-02-04 09:46:53', '2022-02-04 09:46:55'),
('9hh1qj11b95v284n63ib4rhj5t', 7, '2022-02-04 09:47:17', '2022-02-04 09:47:19'),
('tc2bbh4j78eas78k50uffj452s', 6, '2022-02-04 09:47:53', '2022-02-04 09:47:55'),
('u6iq57guhf35ufee2glm8kuebj', 8, '2022-02-04 09:48:21', '2022-02-04 09:48:24'),
('al0r9cmc406nfo8ofnia132qh1', 9, '2022-02-04 09:48:53', '2022-02-04 09:48:55'),
('hs2idscdotq6spjj74hrslh021', 11, '2022-02-04 09:49:15', '2022-02-04 09:49:17'),
('uhoq89avpmm420eto3prmcorhc', 10, '2022-02-04 09:49:53', '2022-02-04 09:49:55'),
('rqqj500t4jm6f54hn0da0risfq', 12, '2022-02-04 09:50:04', '2022-02-04 09:50:06'),
('2deo1gg49smt9224qffpoo46sv', 13, '2022-02-04 09:50:20', '2022-02-04 09:50:22'),
('thil6jfkfpj0idku4ooomhtjcj', 14, '2022-02-04 09:50:40', '2022-02-04 09:50:48'),
('dk4j85m9vnag7sc7opq2f77i3f', 3, '2022-02-04 09:51:07', '2022-02-08 10:01:29'),
('h7moji9a069g92vkd7g7sk3vuq', 3, '2022-02-04 12:33:44', '2022-02-08 10:01:30'),
('bgcdbe54e8fe4028f5qn876089', 3, '2022-02-08 09:10:41', '2022-02-08 09:42:12'),
('emlsb27gpda2sa6co99kltoiu3', 3, '2022-02-08 09:42:22', '2022-02-08 10:28:08'),
('7asart7erfofhbi6pao69p6r3m', 3, '2022-02-08 10:28:14', '2022-02-08 11:49:55'),
('csbbaqrvh6datqa4o5e0tlu30v', 3, '2022-02-08 11:42:57', '2022-02-08 11:48:03'),
('ctc2mh7in4h8hj81lfp4ru8sgl', 3, '2022-02-08 11:48:13', '2022-02-09 13:31:52'),
('d7kdfn6c7hnu2omqtf2n7kobic', 3, '2022-02-09 09:09:41', '2022-02-09 13:31:52'),
('eslffvbf2cp0akgs03vkoojhko', 3, '2022-02-09 10:05:39', '2022-02-09 13:31:53'),
('d1ulc8e4cr6cmrcfo94lj2eifp', 3, '2022-02-09 11:15:59', '2022-02-09 11:18:13'),
('rfemvcj28bcsppdfk1m4cciio8', 7, '2022-02-09 11:18:26', '2022-02-09 11:18:39'),
('9ccjorn48s6gao1hgadbvvoani', 9, '2022-02-09 11:21:18', '2022-02-09 11:21:45'),
('orjbib23f2p95pi0n01goug6c9', 13, '2022-02-09 11:21:56', '2022-02-09 11:22:04'),
('965sqrq6rcgentrl5d5dfmuem6', 3, '2022-02-09 13:31:40', '2022-02-16 13:12:16'),
('vc756j0b154ar649ggkso82jrq', 3, '2022-02-10 09:11:31', '2022-02-10 09:13:45'),
('e4iojclsru329vobp6u5gphjkv', 3, '2022-02-10 09:14:16', '2022-02-16 13:12:19'),
('0gcolcg4d7nb3umdir5e80jkb1', 3, '2022-02-14 09:07:10', '2022-02-14 09:37:24'),
('d379vrki4bsg7qma94d2uf1pif', 3, '2022-02-14 09:37:35', '2022-02-16 13:12:14'),
('8b15ueag394a7i5lo4gjgfmc4m', 3, '2022-02-14 11:05:30', '2022-02-16 13:12:15'),
('et05eogbdr8rd3hqbq3ksm0nfs', 12, '2022-02-16 09:07:23', NULL),
('6gjoha4h1ubsv3vt14ffqcntj8', 7, '2022-02-16 10:13:23', '2022-02-16 10:14:22'),
('f4ll9nlmn8pg3jddv5q1vje5jh', 12, '2022-02-16 10:14:31', '2022-02-16 10:26:17'),
('m5tt5j2tknip8dokfqsqdaldpo', 13, '2022-02-16 10:26:25', '2022-02-16 10:26:31'),
('j14m8k4ihvrak4e92d5936b9hc', 12, '2022-02-16 10:26:39', NULL),
('6si0l2459q0t2sjm6faotse5oi', 13, '2022-02-16 11:15:30', '2022-02-16 11:15:45'),
('5285386hmhmrnl4sjjf7gknc33', 12, '2022-02-16 11:15:52', '2022-02-16 11:22:05'),
('f434j4fb8iigsosbg0kf9n63t9', 13, '2022-02-16 11:22:31', '2022-02-16 11:25:53'),
('r73oledh0ljp6v10o8337hchat', 12, '2022-02-16 11:26:08', '2022-02-16 11:54:59'),
('nqou2h7g0vk323ks7inisum0ur', 7, '2022-02-16 11:56:21', NULL),
('3rts1k4ailipph2jn7r7ht4fk2', 3, '2022-02-16 12:28:43', '2022-02-16 12:28:48'),
('2jn1su2mnqlu0t1jacasnl73gj', 8, '2022-02-16 12:29:06', '2022-02-16 12:34:04'),
('6d06d20q8ojhe591cufji9pdce', 3, '2022-02-16 12:34:09', '2022-02-16 12:35:48'),
('7hidmgi4iu54h7rb69rf9kkjd8', 8, '2022-02-16 12:36:04', '2022-02-16 13:11:53'),
('j91p4gq6a5hut8evb218amoce9', 3, '2022-02-16 13:11:57', '2022-02-16 13:12:37'),
('klhipqaur0vajfato5lbb0bgg2', 3, '2022-02-16 13:12:42', '2022-02-16 13:12:51'),
('lkfe4kdpnnjtjp53101042veh3', 12, '2022-02-16 13:13:32', '2022-02-16 13:13:34'),
('fp98o6ggerl4qc6g0f3g5piqsh', 10, '2022-02-16 13:13:51', '2022-02-16 13:17:14'),
('pvcv09vf11tbi06t0t8ddqdh27', 12, '2022-02-16 13:17:18', '2022-02-16 13:19:23'),
('9flrvqcp9fth2s19mrn5pamq1p', 3, '2022-02-16 13:19:33', '2022-02-16 13:19:35'),
('urodev283ejtj3veb9maek7b3i', 8, '2022-02-16 13:19:50', '2022-02-16 13:20:13'),
('fcm0u3cdd82eq1k2v6du6irkk2', 12, '2022-02-16 13:20:21', '2022-02-16 13:27:39'),
('8rb4r5o12i7iqjsr5n8nekcihc', 8, '2022-02-16 13:29:20', '2022-02-16 13:35:19'),
('oln5gvahtudgvgh7asa4or5kif', 10, '2022-02-16 13:35:28', '2022-02-16 13:38:48'),
('akml8g5rnvkoj7nonpf02ago84', 12, '2022-02-16 13:38:52', '2022-02-16 13:40:23'),
('0okutqvqlnuj8atbmcb2el5in0', 13, '2022-02-16 13:40:35', '2022-02-16 13:46:23'),
('ao15rnkjdv9dagsdtmo5g0e9b8', 8, '2022-02-16 13:47:15', '2022-02-16 13:48:42'),
('muco0v94351kf1nhge4avrlnb9', 10, '2022-02-16 13:48:53', '2022-02-16 13:49:49'),
('ekf7q4ou5s1u3v1kubqivs8fgr', 12, '2022-02-16 13:49:53', '2022-02-16 13:52:37'),
('f339l06gnikid5bpe9hvmj37fq', 3, '2022-02-16 13:55:48', '2022-02-16 13:55:56'),
('q06dohcuts1m0fj9p13qlhod67', 8, '2022-02-16 13:56:09', '2022-02-16 14:04:56'),
('cm0vhqnjh92jhak59ledjh18ls', 12, '2022-02-17 09:12:45', '2022-02-17 09:12:52'),
('dacqb1pdtk0trv4dd78dq867qv', 3, '2022-02-17 09:46:22', NULL),
('e1gsf1lpc2ddqsj112d3jevj4d', 3, '2022-02-17 11:09:38', '2022-02-17 11:37:40'),
('qb00cde9llvg6edkftl6m7hnod', 5, '2022-02-17 11:46:28', '2022-02-17 11:52:19'),
('4g2kacv1qhb6k3fkkb7e2d3rtp', 12, '2022-02-17 11:52:23', '2022-02-17 11:59:09'),
('trffulc29rfg83d0j0cets3k0g', 3, '2022-02-17 11:59:14', '2022-02-17 12:01:51'),
('vep1qrunbugcj8e3o8t393vett', 5, '2022-02-17 12:02:09', '2022-02-17 12:28:48'),
('fguuod8feiiuoq6faieivh2hon', 3, '2022-02-17 12:28:56', '2022-02-17 12:29:02'),
('7k937c4deedsvkob5ug31lhc1d', 5, '2022-02-17 12:29:25', NULL),
('nbf2n73kmv9b6lfj8lq5hmlgvb', 5, '2022-02-18 09:03:18', '2022-02-18 09:26:35'),
('m651k6kndaq4hi7i1g4g2hafle', 8, '2022-02-18 09:26:46', '2022-02-18 09:27:42'),
('8hk9kef0nhabu73ct6i434k2la', 10, '2022-02-18 09:28:17', '2022-02-18 09:28:24'),
('3rd43mujmm560egcfbn1jsaku1', 5, '2022-02-18 09:28:35', '2022-02-18 09:29:47'),
('ofo27p13vt7er705noa2hvnmk0', 6, '2022-02-18 09:30:23', '2022-02-18 09:31:55'),
('qcfir2cvdj5iqhare2d4uv0gvu', 10, '2022-02-18 09:32:00', '2022-02-18 09:32:02'),
('1aaumjgc7k96ta784ti8173bf2', 12, '2022-02-18 09:32:11', '2022-02-18 09:45:58'),
('28oqrbo8a1elm5t8ohb8i88r6u', 12, '2022-02-18 09:46:03', '2022-02-18 09:57:35'),
('7t302cdbepahr0oh5pav8nlup9', 3, '2022-02-18 09:57:41', '2022-02-18 09:57:55'),
('50aph68ffrcg60f3ggl702r8sr', 6, '2022-02-18 09:58:03', '2022-02-18 09:59:02'),
('oqs59fciu7svmi2elvca11tk8q', 10, '2022-02-18 09:59:14', '2022-02-18 09:59:55'),
('pn4nd2g9t0j06lmevqq2dj5hsu', 5, '2022-02-18 10:00:06', '2022-02-18 10:10:07'),
('3jb6uj7ilqj83brnvj7ikvnlc3', 6, '2022-02-18 10:10:14', '2022-02-18 10:13:02'),
('mvelnk8n88psd3jtgp8hkob4rj', 12, '2022-02-18 10:13:07', '2022-02-18 10:13:22'),
('0l9vvhvgtv6p3otq3nmv81nj12', 5, '2022-02-18 10:13:43', '2022-02-18 10:19:46'),
('i9erpva8kpv05dh83etf3c4b27', 6, '2022-02-18 10:19:52', '2022-02-18 10:20:53'),
('k7ub9556vpkad8n8rrm5ct4204', 3, '2022-02-18 10:21:02', NULL),
('5r4f35qcsrs87esjn7lbc1hhts', 12, '2022-02-18 14:34:08', NULL),
('jakqn22e68j6eq1uns53aopq12', 3, '2022-02-21 09:03:19', '2022-02-21 09:19:14'),
('t4puf832c1rvoq6f3uq2e8vvnv', 5, '2022-02-21 09:23:32', NULL),
('hjmociggherh6hnh3ju3olq5g8', 5, '2022-02-21 11:05:42', '2022-02-21 12:02:06'),
('ujd3nk86odgrosub9ppoihec4t', 9, '2022-02-21 12:03:11', NULL),
('mkdmci4p2lijsl12c44udhmq9m', 11, '2022-02-21 12:46:46', NULL),
('7gsfaecmtlbvm40kjt4pa6pf2m', 9, '2022-02-22 09:08:13', '2022-02-22 10:06:32'),
('av9tq5emvcm5ahq590cnr3iuqr', 7, '2022-02-22 10:07:00', '2022-02-22 10:08:34'),
('7uiom93di7m6gsfbu19im134nt', 9, '2022-02-22 10:08:42', '2022-02-22 10:11:06'),
('jgdd8g4fp1eu33sppsasgg6s8c', 7, '2022-02-22 10:11:19', NULL),
('q7hqr7m4hk355rqs01das7spvl', 7, '2022-02-22 11:16:12', '2022-02-22 12:04:26'),
('49hf12l177onqs93iclti9n9kt', 3, '2022-02-22 12:04:37', '2022-02-22 13:51:36'),
('9p95ueem49lkj7h2qmhaudo21r', 7, '2022-02-22 13:54:54', '2022-02-22 14:18:07'),
('6gkbqrhc3aqim44u0qr5fbeqjp', 8, '2022-02-22 14:18:15', '2022-02-22 14:18:50'),
('628ejorinp2fj1ueglhsh0lieh', 7, '2022-02-22 14:19:18', NULL),
('6p5vf3177re97ugks2354qt6qh', 7, '2022-02-23 09:06:42', NULL),
('b04ak254e8vkeul5c68k6blk2k', 9, '2022-02-28 09:45:20', NULL),
('vq3hj59k168nvujpt93jsiiipq', 3, '2022-03-01 09:09:29', '2022-03-01 09:09:31'),
('qfgc7bdrs3nqrgbch1ftssu274', 3, '2022-03-01 09:09:45', '2022-03-01 09:25:41'),
('n3e5vv2iksjimqpj62p2fdeqdb', 3, '2022-03-01 09:26:54', '2022-03-01 09:27:44'),
('c185fepom0amc6m61m8mpl7a0d', 3, '2022-03-01 10:02:10', '2022-03-01 10:10:04'),
('9iej8clvb1b0svadrvfcaar3uq', 3, '2022-03-01 10:10:09', NULL),
('dm48j58ecos6nug91u6tmqu0a9', 3, '2022-03-01 11:11:46', '2022-03-01 11:19:47'),
('q0j6016o83cda7m9duc81vu9ac', 3, '2022-03-01 11:24:56', '2022-03-01 11:54:13'),
('vosaftqa3v0drotjqrbg6jd2rb', 3, '2022-03-01 11:54:18', NULL),
('77udcs8iovji8dont7ii76t0dn', 3, '2022-03-01 13:22:13', '2022-03-01 14:34:38'),
('ohja76jcg2b2heelc5gkjiq3sr', 3, '2022-03-01 14:34:42', NULL),
('8r2qtjkorqdrilrtopodpo4gin', 3, '2022-03-02 09:07:16', '2022-03-02 10:21:29'),
('sspe3ussn0hp9atofirtvh4e1m', 3, '2022-03-02 10:21:33', '2022-03-02 14:28:28'),
('cikkqav6hr3m901e5b66ll5i4b', 5, '2022-03-02 14:28:52', '2022-03-02 14:30:51'),
('ho5qjik5c44i1s621r0drtqv4e', 39, '2022-03-02 14:30:59', '2022-03-02 14:31:04'),
('73t2qc6na5142qjchiv1ucqcq4', 3, '2022-03-02 14:31:09', NULL),
('e723p8d1ku2umphg46qjem726k', 3, '2022-03-03 09:07:48', '2022-03-03 09:07:50'),
('0025h7mqo6ehbs0n9o3c2kabjp', 9, '2022-03-03 09:07:57', '2022-03-03 09:07:59'),
('geks1629o0udfj2bmscfvvsgkq', 12, '2022-03-03 09:08:06', '2022-03-03 09:08:07'),
('8i33uqds8l4kimenk8pf81rj0l', 3, '2022-03-03 09:08:24', '2022-03-03 09:08:45'),
('6qvn6o8j7nnsfsrmjtvi7gcbb3', 3, '2022-03-03 09:09:14', '2022-03-03 09:09:36'),
('l6ag4lrh7lnce1luqgr2j95sb4', 6, '2022-03-03 09:13:02', '2022-03-03 09:14:40'),
('carhl4bcenhpdub66eae1sroec', 7, '2022-03-03 09:14:56', NULL),
('g88v3diulpp6fvskml6gjeldqc', 7, '2022-03-03 12:00:02', NULL),
('b1ndejb25rk67rbopggtacvvek', 7, '2022-03-04 09:04:27', NULL),
('dhsj6qofvsm5jpo58chivasqq2', 7, '2022-03-04 11:20:03', NULL),
('t2upeh677h79tjqpgp2hjc444s', 7, '2022-03-04 13:14:36', NULL),
('t621qrnbdd5nq4iun89bonmg74', 7, '2022-03-09 09:05:10', NULL),
('ja2hjt3j9a81dfgn3c6bdt2k6n', 7, '2022-03-09 13:26:11', '2022-03-09 13:52:05'),
('itbk23tm8hn1j6ikpmbh90ef8o', 6, '2022-03-09 13:52:16', '2022-03-09 13:52:21'),
('s5pa74ucormfsfj1to9gfov2hb', 6, '2022-03-09 13:52:47', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `idUsuario` int NOT NULL,
  `idUsuarioFK` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_categoria`
--

CREATE TABLE `socio_categoria` (
  `fecha` date NOT NULL,
  `idUsuario` int NOT NULL,
  `idCategoria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_evento`
--

CREATE TABLE `socio_evento` (
  `fecha` date NOT NULL,
  `marca` decimal(3,0) NOT NULL,
  `dorsal` int NOT NULL,
  `idUsuario` int NOT NULL,
  `idEvento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_prueba`
--

CREATE TABLE `socio_prueba` (
  `fecha` date NOT NULL,
  `marca` varchar(45) NOT NULL,
  `idUsuario` int NOT NULL,
  `idPrueba` int NOT NULL,
  `idTest` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `socio_prueba`
--

INSERT INTO `socio_prueba` (`fecha`, `marca`, `idUsuario`, `idPrueba`, `idTest`) VALUES
('2022-03-04', '10 seg', 10, 9, 18),
('2022-03-04', '3 seg', 11, 1, 18),
('2022-03-04', '10 seg', 11, 9, 18),
('2022-03-09', '10 seg', 10, 1, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_solicitud_evento`
--

CREATE TABLE `socio_solicitud_evento` (
  `idUsuario` int NOT NULL,
  `idSolicitudEvento` int NOT NULL,
  `idEvento` int NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_evento`
--

CREATE TABLE `solicitud_evento` (
  `idSolicitudEvento` int NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_exter_evento`
--

CREATE TABLE `solicitud_exter_evento` (
  `fecha` date NOT NULL,
  `idExterno` int NOT NULL,
  `idEvento` int NOT NULL,
  `idSolicitudEvento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_ext_solo_socio`
--

CREATE TABLE `solicitud_ext_solo_socio` (
  `idSolicitudSocio` int NOT NULL,
  `idGrupo` int NOT NULL,
  `aceptado` tinyint NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_socio`
--

CREATE TABLE `solicitud_socio` (
  `idSolicitudSocio` int NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `cc` varchar(45) NOT NULL,
  `fecha_nac` date NOT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporada`
--

CREATE TABLE `temporada` (
  `idTemporada` int NOT NULL,
  `fecha_ini_temp` date NOT NULL,
  `fecha_fin_temp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE `test` (
  `idTest` int NOT NULL,
  `nombreTest` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `test`
--

INSERT INTO `test` (`idTest`, `nombreTest`) VALUES
(18, 'Vamonooos'),
(19, 'hola'),
(20, 'funciona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test_prueba`
--

CREATE TABLE `test_prueba` (
  `idTest` int NOT NULL,
  `idPrueba` int NOT NULL,
  `detalles` varchar(30) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `test_prueba`
--

INSERT INTO `test_prueba` (`idTest`, `idPrueba`, `detalles`) VALUES
(18, 1, '400 m'),
(18, 9, '200 m'),
(19, 6, '2 km'),
(20, 5, '1 km');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `apellidoUsuario` varchar(100) NOT NULL,
  `dniUsuario` varchar(9) NOT NULL,
  `cc` varchar(40) NOT NULL,
  `fecha_nac` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `clave` varchar(60) CHARACTER SET utf8mb4 NOT NULL,
  `foto` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `telefono` varchar(12) NOT NULL,
  `activado` tinyint NOT NULL,
  `idRol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `apellidoUsuario`, `dniUsuario`, `cc`, `fecha_nac`, `email`, `clave`, `foto`, `telefono`, `activado`, `idRol`) VALUES
(3, 'Faced', '73104964Q', '1010101010', '2001-07-17', 'angelfaced@hotmail.es', '$2y$10$GWavEHi9DAhb0Ba6QrKtyeLjD8.cT8pbVDchjAkMYBuJhr1Z2FYGC', '', '608586303', 1, 1),
(4, 'Legua', '72321123Q', '2020202020', '2002-03-23', 'javierlegua@hotmail.com', '$2y$10$.cH9HRnmSKGVKF3EPPclOurSaFtiYh3v9pJvAXt2as7vWXJds5Q1a', '', '698234638', 1, 1),
(5, 'Manauta', '32178652P', '3030303030', '2000-05-23', 'raulmanauta@hotmail.com', '$2y$10$pfQcfU05B5UYQAQ1DRblh.3YQ.aWnk0I1RQdo4oA8jxDS57aV7iJS', '', '632894610', 1, 1),
(6, 'Felpudiego', '12345678P', '4040404040', '2001-01-25', 'felpudiego@hotmail.com', '$2y$10$uQmwpkOEy4QhIrfz4.3FL.El2rU3YAD2H6lpMpNwZ.Jt.AQyhzErC', '', '678457632', 1, 2),
(7, 'Magallon', '97531357M', '5050505050', '2002-10-08', 'oscarmagallon@hotmail.com', '$2y$10$uQmwpkOEy4QhIrfz4.3FL.El2rU3YAD2H6lpMpNwZ.Jt.AQyhzErC', '', '890789079', 1, 2),
(8, 'Gil', '74537289P', '6060606060', '2000-04-04', 'gilpablo@hotmail.com', '$2y$10$uQmwpkOEy4QhIrfz4.3FL.El2rU3YAD2H6lpMpNwZ.Jt.AQyhzErC', '', '654321234', 1, 2),
(9, 'Amador', '12378965P', '7070707070', '1979-11-20', 'amadorrivas@hotmail.com', '$2y$10$Kl1wnHpEPTT0Fd8Rli2Apu8o9dZLnGQR/djUPaJsnILPOuQi.k/Bq', '', '645545454', 1, 3),
(10, 'Fermin', '75665566P', '8080808080', '1968-08-15', 'fermintrujillo@hotmail.com', '$2y$10$y3J3H23g6iGxg6JT/9.E/encV57xnSKDTKMozdv/lIei.3Qc/xGCO', '', '607080909', 1, 3),
(11, 'Dj Theo', '87623456P', '9090909090', '1979-10-06', 'teodororivas@hotmail.com', '$2y$10$piEzkSSFGj2wlTTJqFC82Oblpemv40X4LCEy4HfyWJFqYJ7WQJT0y', '', '601928374', 1, 3),
(12, 'Mariscos Recio', '12309854W', '1111111111', '1968-10-20', 'mariscosrecio@elmaralmejorprecio.com', '$2y$10$kc4r1JWQY9EjQsIoZj0/t.hONYiQ7hEH/Pyc.vV8NLNX4PV.pF2du', '', '658000000', 1, 4),
(13, 'Templo Kundalini', '12343256Q', '2222222222', '2019-05-05', 'templokundalini@masajes.com', '$2y$10$XdK6d/GtjD/cBF0cqxUXGuMdShMiYT9mftkSxk..WungFLZljG8q.', '', '908909090', 1, 4),
(14, 'Telespeto', '99999999Z', '3333333333', '2005-06-18', 'telespeto@elpicarodeplaya.com', '$2y$10$klI.0tXMIwakmjLyvgnH9OQBwjLaOk4mffZmblAtP3ugkopHIgk66', '', '976233223', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_temporada`
--

CREATE TABLE `usuario_temporada` (
  `idUsuario` int NOT NULL,
  `idTemporada` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `entrenador_grupo`
--
ALTER TABLE `entrenador_grupo`
  ADD PRIMARY KEY (`fecha`,`idGrupo`,`idUsuario`),
  ADD KEY `idGrupo` (`idGrupo`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `equipacion`
--
ALTER TABLE `equipacion`
  ADD PRIMARY KEY (`idEquipacion`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idIngresoCuotas` (`idIngresoCuotas`),
  ADD KEY `idOtrosGastos` (`idOtrosGastos`),
  ADD KEY `equipacion_ibfk_4` (`idTienda`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idGrupo`);

--
-- Indices de la tabla `grupo_socio`
--
ALTER TABLE `grupo_socio`
  ADD PRIMARY KEY (`fecha_inscrip`,`idUsuario`,`idGrupo`),
  ADD KEY `idGrupo` (`idGrupo`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `g_personal`
--
ALTER TABLE `g_personal`
  ADD PRIMARY KEY (`id_gasto`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idHorario`);

--
-- Indices de la tabla `horario_grupo`
--
ALTER TABLE `horario_grupo`
  ADD PRIMARY KEY (`idHorario`,`idGrupo`),
  ADD KEY `idGrupo` (`idGrupo`);

--
-- Indices de la tabla `ingresosActividades`
--
ALTER TABLE `ingresosActividades`
  ADD PRIMARY KEY (`idIngresoActividades`),
  ADD KEY `idExterno` (`idExterno`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idEvento` (`idEvento`);

--
-- Indices de la tabla `ingreso_cuotas`
--
ALTER TABLE `ingreso_cuotas`
  ADD PRIMARY KEY (`idIngresoCuotas`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD PRIMARY KEY (`idLicencia`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `otras_entidades`
--
ALTER TABLE `otras_entidades`
  ADD PRIMARY KEY (`idEntidad`);

--
-- Indices de la tabla `otros_gastos`
--
ALTER TABLE `otros_gastos`
  ADD PRIMARY KEY (`idOtrosGastos`),
  ADD KEY `idEntidad` (`idEntidad`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `otros_ingresos`
--
ALTER TABLE `otros_ingresos`
  ADD PRIMARY KEY (`idOtrosIngresos`),
  ADD KEY `idEntidad` (`idEntidad`);

--
-- Indices de la tabla `participante_externo`
--
ALTER TABLE `participante_externo`
  ADD PRIMARY KEY (`idExterno`),
  ADD KEY `idEvento` (`idEvento`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`idPrueba`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idUsuarioFK` (`idUsuarioFK`);

--
-- Indices de la tabla `socio_categoria`
--
ALTER TABLE `socio_categoria`
  ADD PRIMARY KEY (`fecha`,`idUsuario`,`idCategoria`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `socio_evento`
--
ALTER TABLE `socio_evento`
  ADD PRIMARY KEY (`idUsuario`,`idEvento`),
  ADD KEY `idEvento` (`idEvento`);

--
-- Indices de la tabla `socio_prueba`
--
ALTER TABLE `socio_prueba`
  ADD PRIMARY KEY (`fecha`,`idUsuario`,`idPrueba`,`idTest`) USING BTREE,
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPrueba` (`idPrueba`),
  ADD KEY `socio_prueba_ibfk_3` (`idTest`);

--
-- Indices de la tabla `socio_solicitud_evento`
--
ALTER TABLE `socio_solicitud_evento`
  ADD PRIMARY KEY (`idUsuario`,`idSolicitudEvento`),
  ADD KEY `idEvento` (`idEvento`),
  ADD KEY `idSolicitudEvento` (`idSolicitudEvento`);

--
-- Indices de la tabla `solicitud_evento`
--
ALTER TABLE `solicitud_evento`
  ADD PRIMARY KEY (`idSolicitudEvento`);

--
-- Indices de la tabla `solicitud_exter_evento`
--
ALTER TABLE `solicitud_exter_evento`
  ADD PRIMARY KEY (`fecha`,`idExterno`),
  ADD KEY `idEvento` (`idEvento`),
  ADD KEY `idSolicitudEvento` (`idSolicitudEvento`),
  ADD KEY `idExterno` (`idExterno`);

--
-- Indices de la tabla `solicitud_ext_solo_socio`
--
ALTER TABLE `solicitud_ext_solo_socio`
  ADD PRIMARY KEY (`idGrupo`,`idSolicitudSocio`),
  ADD KEY `idSolicitudSocio` (`idSolicitudSocio`);

--
-- Indices de la tabla `solicitud_socio`
--
ALTER TABLE `solicitud_socio`
  ADD PRIMARY KEY (`idSolicitudSocio`);

--
-- Indices de la tabla `temporada`
--
ALTER TABLE `temporada`
  ADD PRIMARY KEY (`idTemporada`);

--
-- Indices de la tabla `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`idTest`);

--
-- Indices de la tabla `test_prueba`
--
ALTER TABLE `test_prueba`
  ADD PRIMARY KEY (`idTest`,`idPrueba`),
  ADD KEY `idPrueba` (`idPrueba`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `usuario_temporada`
--
ALTER TABLE `usuario_temporada`
  ADD PRIMARY KEY (`idUsuario`,`idTemporada`),
  ADD KEY `idTemporada` (`idTemporada`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipacion`
--
ALTER TABLE `equipacion`
  MODIFY `idEquipacion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `idGrupo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `g_personal`
--
ALTER TABLE `g_personal`
  MODIFY `id_gasto` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idHorario` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingresosActividades`
--
ALTER TABLE `ingresosActividades`
  MODIFY `idIngresoActividades` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingreso_cuotas`
--
ALTER TABLE `ingreso_cuotas`
  MODIFY `idIngresoCuotas` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `licencia`
--
ALTER TABLE `licencia`
  MODIFY `idLicencia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `otras_entidades`
--
ALTER TABLE `otras_entidades`
  MODIFY `idEntidad` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `otros_gastos`
--
ALTER TABLE `otros_gastos`
  MODIFY `idOtrosGastos` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `otros_ingresos`
--
ALTER TABLE `otros_ingresos`
  MODIFY `idOtrosIngresos` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `participante_externo`
--
ALTER TABLE `participante_externo`
  MODIFY `idExterno` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `idPrueba` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitud_evento`
--
ALTER TABLE `solicitud_evento`
  MODIFY `idSolicitudEvento` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud_socio`
--
ALTER TABLE `solicitud_socio`
  MODIFY `idSolicitudSocio` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temporada`
--
ALTER TABLE `temporada`
  MODIFY `idTemporada` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `test`
--
ALTER TABLE `test`
  MODIFY `idTest` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD CONSTRAINT `entrenador_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `entrenador_grupo`
--
ALTER TABLE `entrenador_grupo`
  ADD CONSTRAINT `entrenador_grupo_ibfk_1` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`),
  ADD CONSTRAINT `entrenador_grupo_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `entrenador` (`idUsuario`);

--
-- Filtros para la tabla `equipacion`
--
ALTER TABLE `equipacion`
  ADD CONSTRAINT `equipacion_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `equipacion_ibfk_2` FOREIGN KEY (`idIngresoCuotas`) REFERENCES `ingreso_cuotas` (`idIngresoCuotas`),
  ADD CONSTRAINT `equipacion_ibfk_3` FOREIGN KEY (`idOtrosGastos`) REFERENCES `otros_gastos` (`idOtrosGastos`),
  ADD CONSTRAINT `equipacion_ibfk_4` FOREIGN KEY (`idTienda`) REFERENCES `usuario` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `entrenador` (`idUsuario`);

--
-- Filtros para la tabla `grupo_socio`
--
ALTER TABLE `grupo_socio`
  ADD CONSTRAINT `grupo_socio_ibfk_1` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`),
  ADD CONSTRAINT `grupo_socio_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `g_personal`
--
ALTER TABLE `g_personal`
  ADD CONSTRAINT `g_personal_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `entrenador` (`idUsuario`);

--
-- Filtros para la tabla `horario_grupo`
--
ALTER TABLE `horario_grupo`
  ADD CONSTRAINT `horario_grupo_ibfk_1` FOREIGN KEY (`idHorario`) REFERENCES `horario` (`idHorario`),
  ADD CONSTRAINT `horario_grupo_ibfk_2` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`);

--
-- Filtros para la tabla `ingresosActividades`
--
ALTER TABLE `ingresosActividades`
  ADD CONSTRAINT `ingresosActividades_ibfk_1` FOREIGN KEY (`idExterno`) REFERENCES `participante_externo` (`idExterno`),
  ADD CONSTRAINT `ingresosActividades_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `socio` (`idUsuario`),
  ADD CONSTRAINT `ingresosActividades_ibfk_3` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`);

--
-- Filtros para la tabla `ingreso_cuotas`
--
ALTER TABLE `ingreso_cuotas`
  ADD CONSTRAINT `ingreso_cuotas_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `socio` (`idUsuario`);

--
-- Filtros para la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD CONSTRAINT `licencia_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `socio` (`idUsuario`);

--
-- Filtros para la tabla `otros_gastos`
--
ALTER TABLE `otros_gastos`
  ADD CONSTRAINT `otros_gastos_ibfk_1` FOREIGN KEY (`idEntidad`) REFERENCES `otras_entidades` (`idEntidad`),
  ADD CONSTRAINT `otros_gastos_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `socio` (`idUsuario`);

--
-- Filtros para la tabla `otros_ingresos`
--
ALTER TABLE `otros_ingresos`
  ADD CONSTRAINT `otros_ingresos_ibfk_1` FOREIGN KEY (`idEntidad`) REFERENCES `otras_entidades` (`idEntidad`);

--
-- Filtros para la tabla `participante_externo`
--
ALTER TABLE `participante_externo`
  ADD CONSTRAINT `participante_externo_ibfk_1` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`);

--
-- Filtros para la tabla `socio`
--
ALTER TABLE `socio`
  ADD CONSTRAINT `socio_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `socio_ibfk_2` FOREIGN KEY (`idUsuarioFK`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `socio_categoria`
--
ALTER TABLE `socio_categoria`
  ADD CONSTRAINT `socio_categoria_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `socio` (`idUsuario`),
  ADD CONSTRAINT `socio_categoria_ibfk_2` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Filtros para la tabla `socio_evento`
--
ALTER TABLE `socio_evento`
  ADD CONSTRAINT `socio_evento_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `socio` (`idUsuario`),
  ADD CONSTRAINT `socio_evento_ibfk_2` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`);

--
-- Filtros para la tabla `socio_prueba`
--
ALTER TABLE `socio_prueba`
  ADD CONSTRAINT `socio_prueba_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `socio_prueba_ibfk_2` FOREIGN KEY (`idPrueba`) REFERENCES `prueba` (`idPrueba`),
  ADD CONSTRAINT `socio_prueba_ibfk_3` FOREIGN KEY (`idTest`) REFERENCES `test` (`idTest`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `socio_solicitud_evento`
--
ALTER TABLE `socio_solicitud_evento`
  ADD CONSTRAINT `socio_solicitud_evento_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `socio` (`idUsuario`),
  ADD CONSTRAINT `socio_solicitud_evento_ibfk_2` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`),
  ADD CONSTRAINT `socio_solicitud_evento_ibfk_3` FOREIGN KEY (`idSolicitudEvento`) REFERENCES `solicitud_evento` (`idSolicitudEvento`);

--
-- Filtros para la tabla `solicitud_exter_evento`
--
ALTER TABLE `solicitud_exter_evento`
  ADD CONSTRAINT `solicitud_exter_evento_ibfk_1` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`),
  ADD CONSTRAINT `solicitud_exter_evento_ibfk_2` FOREIGN KEY (`idSolicitudEvento`) REFERENCES `solicitud_evento` (`idSolicitudEvento`),
  ADD CONSTRAINT `solicitud_exter_evento_ibfk_3` FOREIGN KEY (`idExterno`) REFERENCES `participante_externo` (`idExterno`);

--
-- Filtros para la tabla `solicitud_ext_solo_socio`
--
ALTER TABLE `solicitud_ext_solo_socio`
  ADD CONSTRAINT `solicitud_ext_solo_socio_ibfk_1` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`),
  ADD CONSTRAINT `solicitud_ext_solo_socio_ibfk_2` FOREIGN KEY (`idSolicitudSocio`) REFERENCES `solicitud_socio` (`idSolicitudSocio`);

--
-- Filtros para la tabla `test_prueba`
--
ALTER TABLE `test_prueba`
  ADD CONSTRAINT `test_prueba_ibfk_1` FOREIGN KEY (`idTest`) REFERENCES `test` (`idTest`),
  ADD CONSTRAINT `test_prueba_ibfk_2` FOREIGN KEY (`idPrueba`) REFERENCES `prueba` (`idPrueba`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);

--
-- Filtros para la tabla `usuario_temporada`
--
ALTER TABLE `usuario_temporada`
  ADD CONSTRAINT `usuario_temporada_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuario_temporada_ibfk_2` FOREIGN KEY (`idTemporada`) REFERENCES `temporada` (`idTemporada`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
