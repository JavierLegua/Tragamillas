-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 22-03-2022 a las 08:06:34
-- Versión del servidor: 8.0.28
-- Versión de PHP: 8.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

create schema tragamillas;
use tragamillas;

CREATE TABLE `categoria` (
  `idCategoria` int NOT NULL,
  `nombre_cat` varchar(200) NOT NULL,
  `edad_min` int NOT NULL,
  `edad_max` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE `entrenador` (
  `sueldo` decimal(3,0) DEFAULT NULL,
  `idUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `idTienda` int DEFAULT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `equipacion`
--

INSERT INTO `equipacion` (`idEquipacion`, `talla`, `fechaPeticion`, `idUsuario`, `idIngresoCuotas`, `idOtrosGastos`, `entregado`, `idTienda`, `tipo`) VALUES
(1, '12-14 años', '2022-02-16', 9, NULL, NULL, 1, 12, ''),
(2, 'XS', '2022-02-16', 10, NULL, NULL, 1, 12, ''),
(4, 'L', '2022-02-16', 11, NULL, NULL, 1, 12, ''),
(6, 'XL', '2022-02-16', 9, NULL, NULL, 1, 12, ''),
(7, '12-14 años', '2022-02-16', 11, NULL, NULL, 1, 12, ''),
(9, 'M', '2022-02-16', 9, NULL, NULL, 1, 12, ''),
(11, 'XS', '2022-02-16', 9, NULL, NULL, 1, 12, ''),
(12, '12-14 años', '2022-02-16', 10, NULL, NULL, 0, 13, ''),
(13, '8-9 años', '2022-02-16', 11, NULL, NULL, 0, 13, ''),
(14, 'L', '2022-02-16', 9, NULL, NULL, 0, 13, ''),
(15, '10-11 años', '2022-02-16', 9, NULL, NULL, 1, 12, ''),
(16, 'XL', '2022-02-16', 10, NULL, NULL, 1, 12, ''),
(18, 'M', '2022-02-16', 9, NULL, NULL, 1, 12, ''),
(21, '12-14 años', '2022-03-10', 9, NULL, NULL, 0, 12, 'sudadera'),
(22, 'S', '2022-03-15', 11, NULL, NULL, 0, 12, 'manguitos'),
(23, 'XS', '2022-03-16', 10, NULL, NULL, 0, 12, 'manguitos'),
(24, '12-14 años', '2022-03-16', 40, NULL, NULL, 0, 12, 'manguitos'),
(25, 'M', '2022-03-16', 9, NULL, NULL, 0, 12, '1equipacion');

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
  `fecha_fin_even` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idEvento`, `nombre_evento`, `tipo`, `precio`, `fecha_ini_even`, `fecha_fin_even`) VALUES
(1, 'Prueba', 'rww', '12', '2022-12-12', '2022-12-12'),
(3, 'Eventooooooo', 'Salto de vallas', '5', '2022-05-06', '2022-05-06'),
(4, '10k', 'Carrera', '5', '2022-03-12', '2022-03-12'),
(5, 'fecha bien', 'a', '21', '2022-03-14', '2022-03-14'),
(6, 'fecha mal', 'e', '1', '2022-03-03', '2022-03-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_inscripcion`
--

CREATE TABLE `evento_inscripcion` (
  `idEvento` int NOT NULL,
  `idUsuario` int NOT NULL,
  `aceptado` tinyint NOT NULL DEFAULT '0',
  `marca` varchar(9) DEFAULT NULL,
  `dorsal` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `evento_inscripcion`
--

INSERT INTO `evento_inscripcion` (`idEvento`, `idUsuario`, `aceptado`, `marca`, `dorsal`) VALUES
(1, 9, 1, '10', 0),
(3, 9, 1, '5,49 seg', 0),
(3, 10, 0, '7,5 seg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_inscripcion_ext`
--

CREATE TABLE `evento_inscripcion_ext` (
  `idUsuario` int NOT NULL DEFAULT '0',
  `apellidoUsuario` varchar(100) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `cc` varchar(40) NOT NULL,
  `fecha_nac` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` int NOT NULL,
  `idEvento` int NOT NULL,
  `marca` varchar(9) DEFAULT NULL,
  `dorsal` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `evento_inscripcion_ext`
--

INSERT INTO `evento_inscripcion_ext` (`idUsuario`, `apellidoUsuario`, `dni`, `cc`, `fecha_nac`, `email`, `telefono`, `idEvento`, `marca`, `dorsal`) VALUES
(0, 'Externo_prueba', '11111111H', '222222222222222222222222', '2001-02-10', 'A@A.com', 222222222, 3, '3,45 seg', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idHorario` int NOT NULL,
  `diasemana` varchar(45) NOT NULL,
  `hora_ini` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_grupo`
--

CREATE TABLE `horario_grupo` (
  `idHorario` int NOT NULL,
  `idGrupo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `licencia`
--

INSERT INTO `licencia` (`idLicencia`, `img`, `num_licencia`, `fecha_cad_licen`, `tipo`, `dorsal`, `idUsuario`) VALUES
(7, 'Color1.png', 123, '2022-04-27', 'Federada', 2958, 11),
(9, 'favicon.ico', 18765, '2022-04-27', 'Federada', 50, 11),
(10, 'Color4.png', 587, '2022-04-27', 'Escolar', 29, 11),
(11, 'Color4.png', 588, '2022-04-27', 'Escolar', 29, 11),
(14, 'Color4.png', 11, '2022-04-27', 'Escolar', 29, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otras_entidades`
--

CREATE TABLE `otras_entidades` (
  `idEntidad` int NOT NULL,
  `nombreEntidad` varchar(200) NOT NULL,
  `nif` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `idPrueba` int NOT NULL,
  `nombre_prueba` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`) VALUES
(1, 'Administrador'),
(2, 'Entrenador'),
(3, 'Socio'),
(4, 'Tienda'),
(5, 'Externo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id_sesion` varchar(40) NOT NULL,
  `id_usuario` int NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
('s5pa74ucormfsfj1to9gfov2hb', 6, '2022-03-09 13:52:47', NULL),
('d4f95693f3dcc60bf0f1bc8a4dd6b352', 7, '2022-03-10 08:21:42', '2022-03-10 08:23:19'),
('4e7d7d67cdea041a0c35730054e10986', 12, '2022-03-10 08:23:12', '2022-03-10 10:18:44'),
('a8f929b061bbb65ceb3246ad7c5c896a', 3, '2022-03-10 08:23:24', '2022-03-10 08:23:28'),
('5624a6be453f2389938d173bd4cefb2e', 7, '2022-03-10 08:23:36', '2022-03-10 10:16:16'),
('467dec8d1b8ea513bfac2a791ab58279', 12, '2022-03-10 08:38:35', '2022-03-10 08:41:19'),
('d20bc8c5114565ea810f211120aeeef5', 3, '2022-03-10 08:41:22', '2022-03-10 08:41:39'),
('6cbf172011c294fd7214827390637bed', 12, '2022-03-10 08:41:51', '2022-03-10 08:51:10'),
('5bb2203e5428389df3cf79cf17a05319', 7, '2022-03-10 08:51:19', '2022-03-10 10:11:16'),
('e851b22a3c393eab172bac97eff40ee7', 11, '2022-03-10 09:16:03', '2022-03-10 09:19:21'),
('cb4a53a707de4b5fe5e54a219b98f930', 4, '2022-03-10 09:19:25', '2022-03-10 09:22:38'),
('a9726dcb9bb698c24de9c39015b3ea69', 12, '2022-03-10 09:22:44', NULL),
('5402a98cebca63de2e0bed0362727540', 3, '2022-03-10 10:11:22', '2022-03-10 10:19:58'),
('e5a23b44ae7efebf8efc4d78975325d8', 6, '2022-03-10 10:16:38', '2022-03-10 10:18:28'),
('c7708ff38bf8c0859ecbe54a17110330', 7, '2022-03-10 10:18:38', '2022-03-10 10:18:42'),
('7c6b19cb467abe535934c0e82617ae10', 8, '2022-03-10 10:18:54', '2022-03-10 10:20:00'),
('c1fa81bf13217ade135c36380f943346', 7, '2022-03-10 10:20:07', NULL),
('defbe5f3cf8f24ba543a00005c8ff4f7', 7, '2022-03-10 10:20:11', '2022-03-10 10:26:39'),
('b7f776279e946eb1cf14b41cacf1df41', 3, '2022-03-10 10:26:45', '2022-03-10 11:17:03'),
('aa7af5277b69717d977e8d571827a981', 40, '2022-03-10 10:53:16', NULL),
('50ead94127cfe82fc9c2a991f715c567', 40, '2022-03-10 10:53:16', '2022-03-10 10:53:51'),
('8682c1d9bd304989a60cbf83dc1c8ba0', 4, '2022-03-10 10:54:06', '2022-03-10 10:54:56'),
('1a7fdf270418d78fd844ffb8a50bd1a4', 12, '2022-03-10 10:55:33', '2022-03-10 10:55:46'),
('7ec0a96e92f1233ca1a6cf84a7e3d1e1', 7, '2022-03-10 10:57:03', '2022-03-10 11:05:46'),
('23e22d151379a45dbb8b26a7c96c8e13', 11, '2022-03-10 11:05:53', '2022-03-10 11:05:56'),
('5f7da4379709d7decbe9d802afe2e8a7', 12, '2022-03-10 11:06:02', '2022-03-10 11:26:30'),
('9fb7a3beecee41b7e557171a275c74d0', 12, '2022-03-10 11:17:56', '2022-03-10 11:30:19'),
('3f3bf0673a657bc1f672cf64e5d26ce0', 9, '2022-03-10 11:26:44', '2022-03-10 11:28:50'),
('19b3d12d4ed830b06ce0749436481c42', 3, '2022-03-10 11:29:00', '2022-03-10 11:32:24'),
('85525d3d42b768a32b95ed6c33819af3', 7, '2022-03-10 11:32:36', '2022-03-10 11:34:30'),
('b6980ab10bc55334976d4a8fcd9f9cb8', 3, '2022-03-10 12:17:43', NULL),
('227fbbe96df36cd21756b835c2c86d9e', 4, '2022-03-10 12:28:00', '2022-03-10 12:30:42'),
('0ae0ef4c6bfac580678fa345c73961a4', 12, '2022-03-10 12:30:49', '2022-03-10 13:16:25'),
('99f1523eec3cdc776247f4260734d048', 4, '2022-03-10 12:31:30', NULL),
('0de0f7366555c997b9f33be7d5601385', 4, '2022-03-10 13:16:32', '2022-03-10 13:19:08'),
('1078aaf6274bbd922797f570f606c98d', 4, '2022-03-10 13:20:23', '2022-03-10 13:20:49'),
('b0e9c4115be3f6f413fa40823f05a62c', 4, '2022-03-11 08:09:03', '2022-03-11 08:09:20'),
('52f46700c379377d753e803662ea6570', 9, '2022-03-11 08:09:26', '2022-03-11 08:31:51'),
('91e74119b3949440285c666dd3e4a050', 11, '2022-03-11 08:13:47', '2022-03-11 08:15:26'),
('dc29ec5612ccdcec187709bf097a8971', 12, '2022-03-11 08:15:34', '2022-03-11 08:33:55'),
('2bd576a3af68e6026cfda9f1e9e2ecce', 10, '2022-03-11 08:34:23', '2022-03-11 08:49:28'),
('6d9b8aecf5807bb179dcba3dc84dbb61', 7, '2022-03-11 08:49:38', '2022-03-11 08:52:52'),
('719e7e1d867b4e5e1e546f7d12699af6', 3, '2022-03-11 08:54:15', '2022-03-11 11:06:54'),
('4bf3235e498e463a3f1cc06a081b4578', 4, '2022-03-11 09:07:49', '2022-03-11 11:11:00'),
('31722147c9512d85807c3e4e35c84a15', 4, '2022-03-11 09:10:32', NULL),
('6b9fe28102280ccd61f8f6d486a7b8a8', 7, '2022-03-11 11:07:09', '2022-03-11 11:08:37'),
('e3683297cf580f2142d53c247ba1d58d', 7, '2022-03-11 11:08:45', '2022-03-11 11:09:46'),
('c9fdfe70b8cdd559c3e5f70a83c5c744', 9, '2022-03-11 11:10:11', '2022-03-11 12:42:20'),
('aa56ff5d179a4923b689356577f77aac', 11, '2022-03-11 11:11:12', '2022-03-11 11:35:45'),
('66eb572fd90de187834217f3fe70352f', 11, '2022-03-11 11:36:34', '2022-03-11 11:36:50'),
('a74d1dafcf08cd16c7c1a34510716a6a', 4, '2022-03-11 12:12:05', '2022-03-11 12:12:07'),
('869f2a616ea2168419b7f4b8475ed888', 11, '2022-03-11 12:12:14', '2022-03-11 12:13:00'),
('005e16b877ac97e51882e01aaf7b362d', 12, '2022-03-11 12:13:05', NULL),
('f3bd9ccd83d8feaf73b5484117373f11', 3, '2022-03-11 12:31:50', NULL),
('fdd527286c0bd325a72a7ead10fd65ef', 3, '2022-03-11 12:31:57', '2022-03-11 12:37:07'),
('f1ccf213185b5102714b6f24dc42032f', 7, '2022-03-11 12:37:14', '2022-03-11 13:15:09'),
('2818c8d78d4a9a1aefba0e6b72394b11', 7, '2022-03-11 12:44:18', NULL),
('b15390fefa04a23bc8f401863cbc8bbd', 3, '2022-03-11 13:15:14', '2022-03-11 13:31:45'),
('4aa727e1602b5985c7690a6a236ae5a6', 12, '2022-03-11 13:31:52', '2022-03-11 13:35:24'),
('15b4106eb8dfae3750954bf3c2b05b8a', 7, '2022-03-11 13:35:53', '2022-03-11 13:36:01'),
('e3273a3f8db29d2a134f68c1346e4894', 9, '2022-03-11 13:36:07', '2022-03-11 13:36:49'),
('e8cabf26e2ded548867c8eb2b822559c', 12, '2022-03-11 13:37:02', NULL),
('d9fa792e738af33e746e6414f2c8a62a', 7, '2022-03-14 08:04:20', '2022-03-14 08:59:25'),
('7191c10da2cec1c3dc1505118bd5f544', 3, '2022-03-14 08:04:38', NULL),
('daf40432b1360fca14f875aa04822896', 3, '2022-03-14 08:04:43', '2022-03-14 08:32:57'),
('f7878380e4bb5f781308cd37f6f0fc4a', 4, '2022-03-14 08:07:55', '2022-03-14 08:23:55'),
('ec48c2d1bbd6eb32e3f809dbda26847f', 12, '2022-03-14 08:24:02', '2022-03-14 08:24:16'),
('dc1636fdd3e8f190a00a212ff770c339', 7, '2022-03-14 08:24:24', '2022-03-14 08:35:37'),
('aed330265774b27dd3ec249d816cb858', 7, '2022-03-14 08:33:07', '2022-03-14 08:35:53'),
('ef0de9ad57ecad204e193e505714d67c', 11, '2022-03-14 08:35:43', NULL),
('5e46d1fd5f1c247df4964ef6fcf10a24', 9, '2022-03-14 08:36:00', '2022-03-14 08:40:32'),
('503001bf85f064d5345698279d817d17', 7, '2022-03-14 08:40:59', '2022-03-14 08:42:07'),
('0877482fbeb2500a522f8ac2ffb1c3ca', 7, '2022-03-14 08:42:43', NULL),
('e6e87a485f68acb7cf5c5d0380d465f0', 7, '2022-03-14 08:42:59', '2022-03-14 08:51:13'),
('d2696cb6ff0640285049f42800ec8962', 5, '2022-03-14 08:44:24', NULL),
('e921b646a1324e65de7e8c50b1fd9eb5', 9, '2022-03-14 08:51:37', '2022-03-14 08:52:01'),
('3de941d8761258dd2d7f2e75018a5aa2', 7, '2022-03-14 08:52:09', '2022-03-14 09:10:21'),
('501e6a154296985075413dc3248b04c1', 3, '2022-03-14 09:10:26', '2022-03-14 10:06:29'),
('ab68af0fd1a28dc0363cfc1146552eea', 7, '2022-03-14 09:16:55', '2022-03-14 10:08:25'),
('5dac1320a8e3a3613bb96b471bbe4ecf', 6, '2022-03-14 10:08:36', '2022-03-14 10:14:40'),
('54a4e843e1c40483699482ed272c3789', 7, '2022-03-14 10:10:44', '2022-03-14 10:27:29'),
('ea57e6abe79fc26fa6067fe1525bb6cf', 8, '2022-03-14 10:14:49', '2022-03-14 10:16:06'),
('385b1cae543a263254d8eca0c60ba5b3', 10, '2022-03-14 10:16:12', '2022-03-14 10:16:25'),
('661224c7004f2ad65cae65457c2d03a7', 7, '2022-03-14 10:16:50', '2022-03-14 10:16:54'),
('29d57a09ff6e6c38cf1b7fa26ee94f0a', 6, '2022-03-14 10:17:08', '2022-03-14 10:17:13'),
('ce6527890557548ecc881c4aa0482c26', 6, '2022-03-14 10:17:23', '2022-03-14 10:17:27'),
('b77b4f6421711ecd97a2101d05d04b2a', 3, '2022-03-14 10:29:06', '2022-03-14 10:30:53'),
('9b66d719fbf077ac58a6ccf9e21afdd9', 7, '2022-03-14 10:30:59', '2022-03-14 11:02:10'),
('cb74fff9c0f486e44f1c5a6cef12b0be', 4, '2022-03-14 11:01:19', '2022-03-14 11:01:21'),
('fd6542a1c363e12cad78d34d6dfbb1ba', 11, '2022-03-14 11:01:26', '2022-03-14 11:19:30'),
('3478365bf27c67acbcbfa045bd3cf18b', 9, '2022-03-14 11:02:15', '2022-03-14 12:03:08'),
('9482ca047e6af10500d7e2fca88cd01f', 9, '2022-03-14 11:14:32', NULL),
('28be5e0e9697122b8d481173a74c57ba', 4, '2022-03-14 11:19:37', NULL),
('fe08755fadddaa0594dfd25c445527fc', 9, '2022-03-14 12:41:46', '2022-03-14 12:43:18'),
('4d8c1e830511dc3895323a700baf75df', 3, '2022-03-14 13:09:08', NULL),
('e9f4eb8881bee53c1239dbab39bfe851', 5, '2022-03-14 15:55:56', '2022-03-14 16:02:39'),
('2487acfd769f15f0d2b6ce8f6f7958de', 4, '2022-03-14 15:56:27', '2022-03-14 16:02:05'),
('335e97c85ec7d67833d38067d1b67a25', 4, '2022-03-14 16:02:15', '2022-03-14 16:03:11'),
('ddc947f34e5ea3f7fc8451062ee3e97d', 5, '2022-03-14 16:02:44', '2022-03-14 16:03:06'),
('df3d089d7ab5c3ed4f835d4c9e258616', 11, '2022-03-14 16:03:23', '2022-03-14 16:21:41'),
('cb3923f94cbb7e7efe9346b795c8855a', 5, '2022-03-14 16:03:29', '2022-03-14 16:03:38'),
('a05f63f941c8a092eb5e70fdac48147c', 9, '2022-03-14 16:03:43', NULL),
('5b9d72ae860509eba9ba042a506fc972', 4, '2022-03-14 16:21:48', '2022-03-14 16:40:19'),
('7a525a0a5d9982e99fe71864df733aba', 11, '2022-03-14 16:40:24', '2022-03-14 16:46:18'),
('e5488d6f7061eeb7e417bdb757662b5f', 4, '2022-03-14 16:41:29', NULL),
('b5354830e1904d77e74afbaee6a9546a', 4, '2022-03-14 16:46:25', '2022-03-14 16:47:51'),
('4d77e48a542aadf5c3bc5571ef40af90', 9, '2022-03-14 16:48:08', NULL),
('4caad50f716dd14743f5ac0107725101', 3, '2022-03-15 08:06:44', '2022-03-15 08:06:49'),
('79d050e52e07852ce53e1d8640532bca', 9, '2022-03-15 08:07:00', NULL),
('abea0410ba87ee719756f7c8e52d050a', 9, '2022-03-15 08:25:01', NULL),
('337c19bde132695d4d8daa2311f9db2d', 4, '2022-03-15 09:08:59', '2022-03-15 09:09:26'),
('f0a393ab9d7651a6fb426deea4f245ae', 11, '2022-03-15 09:09:31', '2022-03-15 09:23:06'),
('d6d610c17f7327d74b2d2a76bc96e17c', 9, '2022-03-15 09:18:51', '2022-03-15 09:21:16'),
('3522732655affd1762c676b0091579c4', 11, '2022-03-15 09:21:27', '2022-03-15 10:46:41'),
('0db70bc3dffad5b18017b3589d825bef', 11, '2022-03-15 09:23:12', '2022-03-15 10:22:58'),
('14e049faa3683768f76fcf5b55dfb86d', 11, '2022-03-15 09:30:59', NULL),
('526c78c9aa8e59595b602003425f2c49', 11, '2022-03-15 10:08:12', NULL),
('4b9ab4b30e9652ce816279be481d1b26', 11, '2022-03-15 10:18:08', NULL),
('add7f2d43d1cb016c390a764b6d73637', 12, '2022-03-15 10:23:03', '2022-03-15 10:23:37'),
('144384f106e768a5a69bc2079db3fb31', 4, '2022-03-15 10:23:52', '2022-03-15 10:24:34'),
('171dcddcfaa3277f244e148505b7ff55', 7, '2022-03-15 10:24:42', '2022-03-15 10:29:59'),
('4b29c452e330e636d65676db9bc7c880', 4, '2022-03-15 10:59:24', '2022-03-15 10:59:58'),
('cd7c39534318a1362ce32a562c53c787', 11, '2022-03-15 11:00:09', '2022-03-15 11:05:55'),
('1a936d27659b04d8de414252cd6e4516', 4, '2022-03-15 11:06:14', '2022-03-15 11:11:09'),
('59cf10abfe51dbffd9197ccc2b768184', 11, '2022-03-15 11:11:14', '2022-03-15 11:37:17'),
('0ca0f2d2350d8e5a6cceadd02c798485', 4, '2022-03-15 11:17:33', '2022-03-15 11:17:44'),
('cc02cc4fb4117f589c8302001c78f5ed', 7, '2022-03-15 11:17:53', NULL),
('8f2b234677d6a53f3db703e77324abb8', 4, '2022-03-15 11:37:35', '2022-03-15 12:12:34'),
('a7f4bc538b8ffb2bcd9944019d84ab34', 7, '2022-03-15 12:12:42', '2022-03-15 12:13:47'),
('b9d4a11ba513376b9601f46980786d74', 11, '2022-03-15 12:14:01', '2022-03-15 12:17:37'),
('b88fbabbc15234278d313b73c4f79b3b', 9, '2022-03-15 12:17:20', '2022-03-15 12:17:24'),
('ac5b017c051a047ea5f2d5aac055716a', 3, '2022-03-15 12:17:28', '2022-03-15 12:18:19'),
('e4fc49b0ac0bc39094a192c2f8dc24ce', 7, '2022-03-15 12:17:45', '2022-03-15 12:34:54'),
('7a50d799f58230c206f2ab8dc650ba29', 7, '2022-03-15 12:18:24', '2022-03-15 12:23:14'),
('fb94cb3abfd8d3660bf75c98d60e292c', 3, '2022-03-15 12:23:21', '2022-03-15 12:43:31'),
('f898ca9c326ccf22d9c1def7bc26fb0c', 12, '2022-03-15 12:35:04', NULL),
('7ae6d51dfdcff213a1c145ad9a9abf28', 3, '2022-03-15 12:44:01', '2022-03-15 12:53:01'),
('184abe64226eddbf1e825ca69678696c', 3, '2022-03-15 12:54:04', '2022-03-15 13:15:08'),
('b9a8b7298a3c0bdc6713f32e5b175163', 3, '2022-03-15 13:12:07', NULL),
('1e7fb786db5b2177c4903a4f48849259', 7, '2022-03-15 13:15:18', '2022-03-15 13:15:46'),
('6f33cc8c1c77906ee833af6687bf04f4', 9, '2022-03-15 13:16:05', '2022-03-15 13:18:30'),
('4354c0ef5d4b74a53eb778e634a3b2d8', 3, '2022-03-15 13:18:35', '2022-03-15 13:37:28'),
('1983ae7575ff04f8d61ea532db871b9c', 5, '2022-03-15 15:35:58', '2022-03-15 15:36:18'),
('071aab4274b795c3e0089c49fe8ddf0c', 11, '2022-03-15 15:36:32', NULL),
('260e82bd356ef3b7857e57caa4630e32', 11, '2022-03-15 15:37:48', NULL),
('bd742dc03c8c59c4bf3cee46886f911c', 12, '2022-03-15 15:59:22', '2022-03-15 17:18:58'),
('312f86fb92e28276d7c453dc8f2dc9d0', 11, '2022-03-15 16:42:47', NULL),
('c87f43e7563d6c9eafe674b1876bef83', 12, '2022-03-16 08:10:29', '2022-03-16 09:00:01'),
('364f93e8ec3486f49407e43c7b49a8af', 3, '2022-03-16 08:10:46', '2022-03-16 08:12:44'),
('cd2f63cdafed7e1df1aa26958470a6d8', 12, '2022-03-16 08:17:24', '2022-03-16 08:27:47'),
('85401ff3d072aa44676be69eb0b12f49', 3, '2022-03-16 08:27:51', '2022-03-16 08:57:11'),
('1a97b7c719e8732e6a99909390245385', 12, '2022-03-16 08:57:16', '2022-03-16 09:00:15'),
('e3277fa70484b682d1b236adb59e8551', 3, '2022-03-16 09:00:24', '2022-03-16 12:20:22'),
('ad1124f21aa7dac0130bf70dbf0699e1', 4, '2022-03-16 09:01:10', '2022-03-16 09:14:10'),
('cdc94d99513af0fd30ef9812cc64483f', 12, '2022-03-16 09:14:15', '2022-03-16 12:24:47'),
('cf079ecec3942cf4e103c88285ffa32b', 7, '2022-03-16 12:21:51', '2022-03-16 12:21:54'),
('23e7f660ce527c5d1bb62b6ff0399517', 9, '2022-03-16 12:22:02', '2022-03-16 12:22:18'),
('087179bf0c14905716b87156606af02a', 4, '2022-03-16 12:23:35', '2022-03-16 12:23:38'),
('bd289c060eebbdbd672bd2f2cc43b52c', 4, '2022-03-16 12:23:52', '2022-03-16 12:24:16'),
('46388f4f4556c64e2373fa0481aa6c60', 4, '2022-03-16 12:24:20', '2022-03-16 12:24:22'),
('fcd0604587e6692c9f114b838b060ded', 4, '2022-03-16 12:25:05', NULL),
('39af0e2f484a058170a9a0825835d958', 3, '2022-03-16 12:25:57', '2022-03-16 12:25:59'),
('12c31ee4b1eca4948d4890c8859d12af', 5, '2022-03-16 12:26:07', '2022-03-16 12:31:35'),
('1917d3afa957cf98aad2f480f4db370e', 3, '2022-03-16 12:31:42', NULL),
('d0eba10ff51941c7538db047b225ee86', 5, '2022-03-16 12:52:11', NULL),
('76ebc7abc00722d367c53f489647cfc2', 4, '2022-03-16 12:53:47', '2022-03-16 13:31:09'),
('1d852084b5f7090297727c01ad0bcd05', 3, '2022-03-16 12:54:15', NULL),
('51e400d59657e9aca7803f22bf6b22b7', 9, '2022-03-16 16:09:46', '2022-03-16 16:10:00'),
('faca3ea77523e90fd64f406ce631a848', 7, '2022-03-16 16:10:14', NULL),
('33f619fef0a66bc03eb2c874fb7fb7d1', 3, '2022-03-17 10:16:12', NULL),
('39c4c063fae5838fed62d224f2a1a4d0', 4, '2022-03-17 10:50:03', '2022-03-17 10:50:14'),
('2894beff68ad6a963aeae3ddb47386be', 11, '2022-03-17 10:50:21', '2022-03-17 10:52:10'),
('d1c2f0a4ebad25d71aa9e4bf6a665198', 7, '2022-03-17 10:52:17', '2022-03-17 10:54:36'),
('bf67d371265434732854841acf5a9007', 12, '2022-03-17 10:54:42', '2022-03-17 10:56:13'),
('7722509b0d2a7fdc8b2758051e99dd61', 4, '2022-03-17 10:56:19', NULL),
('0969b82d7d9e5460fd1cfb83a9f425f4', 7, '2022-03-17 13:09:38', NULL),
('072149ded131da4aebede161958b6302', 5, '2022-03-17 16:03:28', NULL),
('10ad3da9513e99e1b8e458667a370c22', 4, '2022-03-17 16:18:02', NULL),
('11b113733f65f835b68a61551b8e1a92', 3, '2022-03-18 08:03:09', '2022-03-18 08:06:55'),
('4c11c6a5ad83a4ce0e1e5a6774d81ecc', 7, '2022-03-18 08:08:01', '2022-03-18 08:19:08'),
('00e0e60f724d2e7ba7398d9d4a4e61fb', 3, '2022-03-18 08:08:06', '2022-03-18 11:09:37'),
('ad37debea08d313c45b34428c34690a1', 9, '2022-03-18 08:57:45', '2022-03-18 08:58:44'),
('74ba0df5fab194eebb5bd1fcff2eda6d', 9, '2022-03-18 08:59:33', '2022-03-18 09:01:32'),
('92d206db4c4fd148d9210b7cca8b8f02', 9, '2022-03-18 09:07:05', '2022-03-18 09:08:50'),
('55ea4763bf1a8465737cf9d3d4f3d94d', 7, '2022-03-18 09:09:01', NULL),
('1fefc77605748237fd00d9121ee673f7', 44, '2022-03-18 11:09:41', '2022-03-18 11:09:55'),
('4cb85e408c360560e2a96c98960c8e04', 3, '2022-03-18 11:12:38', '2022-03-18 12:33:14'),
('05af96607cac4b96ce9ea2a49e368d5c', 4, '2022-03-18 12:27:48', '2022-03-18 12:29:08'),
('88a9d3245562fc45fd1c28766c2f7e13', 7, '2022-03-18 12:29:18', '2022-03-18 13:09:20'),
('4b9a0776f6fa891f7982fda68bdd919c', 4, '2022-03-18 13:09:25', '2022-03-21 08:05:39'),
('7f00d3f86dd74e0547f0f5d0aec33033', 3, '2022-03-21 08:05:00', '2022-03-21 08:23:17'),
('a06a9d31dd11f6f52aa8eec7cf9c8795', 3, '2022-03-21 08:06:03', '2022-03-21 08:42:54'),
('ef30cd894dd73fd709d460c6818bf7df', 7, '2022-03-21 08:23:30', '2022-03-21 08:41:16'),
('a78166e3dbf087f6b5759948aa1f0747', 3, '2022-03-21 08:41:55', '2022-03-21 08:53:09'),
('5bc55e0b0a2e6524678388de19dea112', 7, '2022-03-21 08:43:04', '2022-03-21 08:43:46'),
('c76f1b18ac1e4e2d6814ce7e8af7466a', 9, '2022-03-21 08:44:07', '2022-03-21 08:44:33'),
('803da28e4f2c428c92b6f4260b994ec7', 9, '2022-03-21 08:44:46', '2022-03-21 09:03:18'),
('c4b904e6363c4199a25f7222bd2c5311', 7, '2022-03-21 08:53:23', '2022-03-21 09:10:01'),
('aa650d361fd8ff60fc78fae9cad79950', 12, '2022-03-21 09:03:35', NULL),
('cacdeac6cb2f9587f91d0c3dd35d0df3', 9, '2022-03-21 09:10:07', '2022-03-21 09:38:39'),
('543c2e4b657ed98ae2aa29ae4bdedaef', 3, '2022-03-21 09:39:23', '2022-03-21 09:39:28'),
('6d5911f36fc1851c9ebde710f5c2e96c', 9, '2022-03-21 09:39:45', '2022-03-21 11:12:33'),
('90e84d246b9f4b4adc7d4e9172c67566', 9, '2022-03-21 11:12:40', '2022-03-21 11:20:57'),
('18b6596f670a7ccc344731ace11b3e83', 12, '2022-03-21 11:21:02', '2022-03-21 11:28:18'),
('81b5afc098eac16255506dc401e7dc6c', 3, '2022-03-21 11:32:19', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `idUsuario` int NOT NULL,
  `idUsuarioFK` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`idUsuario`, `idUsuarioFK`) VALUES
(9, 9),
(11, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_categoria`
--

CREATE TABLE `socio_categoria` (
  `fecha` date NOT NULL,
  `idUsuario` int NOT NULL,
  `idCategoria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `socio_prueba`
--

INSERT INTO `socio_prueba` (`fecha`, `marca`, `idUsuario`, `idPrueba`, `idTest`) VALUES
('2022-03-04', '10 seg', 10, 9, 18),
('2022-03-04', '3 seg', 11, 1, 18),
('2022-03-04', '10 seg', 11, 9, 18),
('2022-03-09', '10 seg', 10, 1, 18),
('2022-03-10', '2 horas', 11, 5, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_evento`
--

CREATE TABLE `solicitud_evento` (
  `idSolicitudEvento` int NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporada`
--

CREATE TABLE `temporada` (
  `idTemporada` int NOT NULL,
  `fecha_ini_temp` date NOT NULL,
  `fecha_fin_temp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE `test` (
  `idTest` int NOT NULL,
  `nombreTest` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `detalles` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `test_prueba`
--

INSERT INTO `test_prueba` (`idTest`, `idPrueba`, `detalles`) VALUES
(18, 1, '400 m'),
(18, 7, ''),
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
  `nombreUsuario` varchar(50) NOT NULL,
  `dniUsuario` varchar(9) NOT NULL,
  `cc` varchar(40) NOT NULL,
  `fecha_nac` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `clave` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foto` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefono` varchar(12) NOT NULL,
  `activado` tinyint NOT NULL,
  `idRol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `apellidoUsuario`, `nombreUsuario`, `dniUsuario`, `cc`, `fecha_nac`, `email`, `clave`, `foto`, `telefono`, `activado`, `idRol`) VALUES
(0, 'Anonimo', 'Anonimo', '*', '*', '0001-01-01', '*', '*', NULL, '*', 0, 5),
(3, 'Faced', 'Angel', '73104964Q', '1010101010', '2001-07-17', 'angelfaced@hotmail.es', '$2y$10$o9lFtHmkmSVW6gDbra86DuotFB0UEocn.jwMRs7BoP09MfWKg7h/e', '', '608586303', 1, 1),
(4, 'Legua', 'Javier', '72321123Q', '2020202020', '2002-03-23', 'javierlegua14@gmail.com', '$2y$10$I8G3Gl1c3TG4w2nYIWTaw.Y4c/b6jVM40F9/FRGLab6Ng2xJhKZtG', '', '698234638', 1, 1),
(5, 'Manauta', 'Raul', '21746940A', '3030303030', '2000-05-23', 'raulmanauta@hotmail.com', '$2y$10$OKPBBJZPCltc50nPO92nRemQ0GxdGUm9giF6CilE1KXez9rFeDf16', '', '632894610', 1, 1),
(6, 'Felpudiego', 'Diego', '12345678P', '4040404040', '2001-01-25', 'felpudiego@hotmail.com', '$2y$10$uQmwpkOEy4QhIrfz4.3FL.El2rU3YAD2H6lpMpNwZ.Jt.AQyhzErC', '', '678457632', 1, 2),
(7, 'Magallon', 'Oscar', '97531357M', '5050505050', '2002-10-08', 'oscarmagallon@hotmail.com', '$2y$10$uQmwpkOEy4QhIrfz4.3FL.El2rU3YAD2H6lpMpNwZ.Jt.AQyhzErC', '', '890789079', 1, 2),
(8, 'Pablo', 'Gil', '74537289P', '6060606060', '2000-04-04', 'gilpablo@hotmail.com', '$2y$10$uQmwpkOEy4QhIrfz4.3FL.El2rU3YAD2H6lpMpNwZ.Jt.AQyhzErC', '', '654321234', 1, 2),
(9, 'Amador', 'Rivas', '12378965P', '7070707070', '1979-11-20', 'amadorrivas@hotmail.com', '$2y$10$Kl1wnHpEPTT0Fd8Rli2Apu8o9dZLnGQR/djUPaJsnILPOuQi.k/Bq', 'logo_tragamillas.png', '645545454', 1, 3),
(10, 'Fermin', 'Trujillo', '75665566P', '8080808080', '1968-08-15', 'fermintrujillo@hotmail.com', '$2y$10$y3J3H23g6iGxg6JT/9.E/encV57xnSKDTKMozdv/lIei.3Qc/xGCO', '', '607080909', 1, 3),
(11, 'Rivas', 'Teodoro', '87623456P', '9090909090', '1979-10-06', 'teodororivas@hotmail.com', '$2y$10$piEzkSSFGj2wlTTJqFC82Oblpemv40X4LCEy4HfyWJFqYJ7WQJT0y', 'make.jpg', '601928374', 1, 3),
(12, 'Recio', 'Mariscos', '12309854W', '1111111111', '1968-10-20', 'mariscosrecio@elmaralmejorprecio.com', '$2y$10$kc4r1JWQY9EjQsIoZj0/t.hONYiQ7hEH/Pyc.vV8NLNX4PV.pF2du', '', '658000000', 1, 4),
(13, 'Templo Kundalini', 'SL', '12343256Q', '2222222222', '2019-05-05', 'templokundalini@masajes.com', '$2y$10$XdK6d/GtjD/cBF0cqxUXGuMdShMiYT9mftkSxk..WungFLZljG8q.', '', '908909090', 1, 4),
(14, 'Telespeto', 'SL', '99999999Z', '3333333333', '2005-06-18', 'telespeto@elpicarodeplaya.com', '$2y$10$klI.0tXMIwakmjLyvgnH9OQBwjLaOk4mffZmblAtP3ugkopHIgk66', '', '976233223', 1, 4),
(40, 'diego', 'Clase', '73022886W', '564564561456', '2001-01-23', 'omc16@outlook.com', '$2y$10$ezMdWzKZxr/FXT5e/4b2pOU/wNKyOuQ3dTAJzkbht7vWPQmh/fOI6', NULL, '798789978', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_temporada`
--

CREATE TABLE `usuario_temporada` (
  `idUsuario` int NOT NULL,
  `idTemporada` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  ADD PRIMARY KEY (`idEvento`);

--
-- Indices de la tabla `evento_inscripcion`
--
ALTER TABLE `evento_inscripcion`
  ADD PRIMARY KEY (`idEvento`,`idUsuario`),
  ADD KEY `evento_inscripcion_fk_2` (`idUsuario`);

--
-- Indices de la tabla `evento_inscripcion_ext`
--
ALTER TABLE `evento_inscripcion_ext`
  ADD UNIQUE KEY `pk` (`idUsuario`,`dni`,`idEvento`) USING BTREE,
  ADD KEY `fk_1` (`idEvento`);

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
-- Indices de la tabla `socio_prueba`
--
ALTER TABLE `socio_prueba`
  ADD PRIMARY KEY (`fecha`,`idUsuario`,`idPrueba`,`idTest`) USING BTREE,
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPrueba` (`idPrueba`),
  ADD KEY `socio_prueba_ibfk_3` (`idTest`);

--
-- Indices de la tabla `solicitud_evento`
--
ALTER TABLE `solicitud_evento`
  ADD PRIMARY KEY (`idSolicitudEvento`);

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
  MODIFY `idEquipacion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `idLicencia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `idPrueba` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
-- Filtros para la tabla `evento_inscripcion`
--
ALTER TABLE `evento_inscripcion`
  ADD CONSTRAINT `evento_inscripcion_fk_1` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `evento_inscripcion_fk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `evento_inscripcion_ext`
--
ALTER TABLE `evento_inscripcion_ext`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
-- Filtros para la tabla `socio_prueba`
--
ALTER TABLE `socio_prueba`
  ADD CONSTRAINT `socio_prueba_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `socio_prueba_ibfk_2` FOREIGN KEY (`idPrueba`) REFERENCES `prueba` (`idPrueba`),
  ADD CONSTRAINT `socio_prueba_ibfk_3` FOREIGN KEY (`idTest`) REFERENCES `test` (`idTest`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
