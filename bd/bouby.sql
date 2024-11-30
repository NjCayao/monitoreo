-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-11-2024 a las 16:52:10
-- Versión del servidor: 10.11.10-MariaDB
-- Versión de PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bouby`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `image`, `name`, `description`, `created_at`) VALUES
(1, NULL, 'Medicinas', NULL, '2017-03-19 10:42:31'),
(2, NULL, 'Deportivos', NULL, '2017-03-19 10:42:41'),
(3, NULL, 'Alimentos', NULL, '2017-03-19 10:42:53'),
(4, NULL, 'Juguetes', NULL, '2017-03-19 10:44:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `short` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `kind` int(11) NOT NULL,
  `val` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `configuration`
--

INSERT INTO `configuration` (`id`, `short`, `name`, `kind`, `val`) VALUES
(1, 'company_name', 'Nombre de la empresa', 2, 'ORBEZO'),
(2, 'title', 'Titulo del Sistema', 2, 'Sistema de REPORTES'),
(3, 'ticket_title', 'Titulo en el Ticket', 2, 'ORBEZO'),
(4, 'admin_email', 'Email Administracion', 2, 'jhon@escuelaorbezo.com'),
(5, 'report_image', 'Imagen en Reportes', 4, 'g_fernandez_logo1.jpg'),
(6, 'imp-name', 'Nombre Impuesto', 2, 'IGV'),
(7, 'imp-val', 'Valor Impuesto (%)', 2, '18'),
(8, 'currency', 'Simbolo de Moneda', 2, 'S/'),
(9, 'confirmation', 'Confirmacion', 2, '654321'),
(10, 'address', 'Direccion', 2, 'Av. Los Reformistas 187'),
(11, 'phone', 'Telefono', 2, '987985339'),
(12, 'note', 'Nota de factura', 6, 'Este es un momento libre e independiente por la voluntad general de los pueblos ya la causa que Dios defiendeholaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa VIVA CASTILLO!!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `message`
--

INSERT INTO `message` (`id`, `code`, `message`, `user_from`, `user_to`, `is_read`, `created_at`) VALUES
(1, 'gqpANRRUrRp5xT9', 'Hola, mensaje de prueba', 1, 2, 1, '2017-05-14 22:25:48'),
(2, 'gqpANRRUrRp5xT9', 'Si veo tu mensaje', 2, 1, 1, '2017-05-14 22:27:49'),
(3, 'kWVGnZp6rxlYeUb', 'Hola vendedor, como estas', 2, 3, 1, '2017-05-14 22:28:12'),
(4, 'kWVGnZp6rxlYeUb', 'Ya recibÃ­ tu mensaje', 3, 2, 0, '2017-05-14 22:29:18'),
(5, 'RrpnZOpvg9Mawq8', 'Hola vendedor, como estas', 1, 3, 0, '2017-05-15 22:31:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `stock_destination_id` int(11) DEFAULT NULL,
  `operation_from_id` int(11) DEFAULT NULL,
  `q` float NOT NULL,
  `price_in` double DEFAULT NULL,
  `price_out` double DEFAULT NULL,
  `operation_type_id` int(11) NOT NULL,
  `sell_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `is_draft` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `address1` varchar(50) DEFAULT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `phone1` varchar(50) DEFAULT NULL,
  `phone2` varchar(50) DEFAULT NULL,
  `email1` varchar(50) DEFAULT NULL,
  `email2` varchar(50) DEFAULT NULL,
  `is_active_access` tinyint(1) NOT NULL DEFAULT 0,
  `has_credit` tinyint(1) NOT NULL DEFAULT 0,
  `credit_limit` double DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `kind` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `barcode` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `inventary_min` int(11) NOT NULL DEFAULT 10,
  `price_in` float NOT NULL,
  `price_out` float DEFAULT NULL,
  `unit` varchar(255) NOT NULL,
  `presentation` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code_equipo` varchar(50) NOT NULL,
  `horometro_start` float NOT NULL,
  `horometro_end` float NOT NULL,
  `horometro_result` float NOT NULL,
  `km_start` float NOT NULL,
  `km_end` float NOT NULL,
  `km_result` float NOT NULL,
  `fuel` float NOT NULL,
  `hk_fuel` float NOT NULL,
  `front_work` varchar(50) NOT NULL,
  `description_work` varchar(200) NOT NULL,
  `front_work_2` varchar(50) NOT NULL,
  `description_work_2` varchar(200) NOT NULL,
  `front_work_3` varchar(50) NOT NULL,
  `description_work_3` varchar(200) NOT NULL,
  `front_work_4` varchar(50) NOT NULL,
  `description_work_4` varchar(200) NOT NULL,
  `front_work_5` varchar(50) NOT NULL,
  `description_work_5` varchar(200) NOT NULL,
  `observation` varchar(300) NOT NULL,
  `turno` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `report`
--

INSERT INTO `report` (`id`, `user_id`, `code_equipo`, `horometro_start`, `horometro_end`, `horometro_result`, `km_start`, `km_end`, `km_result`, `fuel`, `hk_fuel`, `front_work`, `description_work`, `front_work_2`, `description_work_2`, `front_work_3`, `description_work_3`, `front_work_4`, `description_work_4`, `front_work_5`, `description_work_5`, `observation`, `turno`, `created_at`) VALUES
(106, 24, 'TRACT006', 1255, 0, -1255, 0, 0, 0, 0, 0, 'C01', 'Desbroce y Limpieza', '', '', '', '', '', '', '', '', '', '1', '2023-11-26 17:41:07'),
(107, 1, 'EXC05', 1234, 1238, 4, 0, 0, 0, 80, 1235, 'C05', 'Mejoramiento de caminos existentes', 'C02', 'Excav. de explanaciones materiales sueltos', '', '', '', '', '', '', 'Zapatas rotas', '1', '2024-01-04 10:47:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sell`
--

CREATE TABLE `sell` (
  `id` int(11) NOT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `sell_from_id` int(11) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `operation_type_id` int(11) DEFAULT 2,
  `box_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `d_id` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `cash` double DEFAULT NULL,
  `iva` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `is_draft` tinyint(1) NOT NULL DEFAULT 0,
  `stock_to_id` int(11) DEFAULT NULL,
  `stock_from_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spend`
--

CREATE TABLE `spend` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double DEFAULT NULL,
  `box_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `spend`
--

INSERT INTO `spend` (`id`, `name`, `price`, `box_id`, `created_at`) VALUES
(1, 'Pago odontologÃ­a', 10, NULL, '2017-04-29 09:40:52'),
(2, 'Pago oculista', 12, NULL, '2017-04-29 09:41:32'),
(3, 'Pago a Ginecologo', 380, NULL, '2017-05-14 22:21:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `standby`
--

CREATE TABLE `standby` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_dni` int(11) NOT NULL,
  `user_equipo` int(11) NOT NULL,
  `user_cdgequipo` int(11) NOT NULL,
  `user_celular` int(11) NOT NULL,
  `st_observation` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `standby`
--

INSERT INTO `standby` (`id`, `user_id`, `user_dni`, `user_equipo`, `user_cdgequipo`, `user_celular`, `st_observation`, `created_at`) VALUES
(19, 1, 45434543, 0, 0, 987654321, 'StandBy', '2023-10-11 20:58:08'),
(20, 1, 45434543, 0, 0, 987654321, 'StandBy', '2024-01-04 10:50:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_principal` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id`, `name`, `address`, `phone`, `email`, `is_principal`) VALUES
(1, 'Principal', 'Av. Los Reformistas B - 24', '987985339', 'eabanto2@hotmail.com', 1),
(2, 'Almacen 1', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripciones`
--

CREATE TABLE `suscripciones` (
  `id` int(11) NOT NULL,
  `dni` varchar(15) NOT NULL,
  `name` varchar(25) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `nameEmp` varchar(25) NOT NULL,
  `experiencia` varchar(25) NOT NULL,
  `residencia` varchar(25) NOT NULL,
  `maquinaria` varchar(25) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `suscripciones`
--

INSERT INTO `suscripciones` (`id`, `dni`, `name`, `apellido`, `email`, `phone`, `nameEmp`, `experiencia`, `residencia`, `maquinaria`, `fecha`) VALUES
(1, '47469980', 'sadasda', 'Cayao Fernandez', 'admin@nilcf.com', '982226835', 'Ripconciv', '8', 'Rioja', 'excavadora', '0000-00-00 00:00:00'),
(2, '47469980', 'sadasda', 'Cayao Fernandez', 'admin@nilcf.com', '982226835', 'Ripconciv', '8', 'Rioja', 'excavadora', '0000-00-00 00:00:00'),
(3, '47469980', 'NILSON JHONNY', 'Cayao Fernandez', 'incafarmalg@factumi.com', '982226835', 'Ripconciv', '5', 'Rioja', 'excavadora', '0000-00-00 00:00:00'),
(4, '47469980', 'NILSON JHONNY', 'Cayao Fernandez', 'incafarmalg@factumi.com', '982226835', 'Ripconciv', '5', 'Rioja', 'excavadora', '2023-10-06 23:06:37'),
(5, '47469980', 'NILSON JHONNY', 'Cayao Fernandez', 'incafarmalg@factumi.com', '982226835', 'Ripconciv', '5', 'Rioja', 'excavadora', '0000-00-00 00:00:00'),
(6, '47469980', 'JOSE ALBERTO', 'Cayao Fernandez', 'incafarmalg@factumi.com', '982226835', 'Ripconciv', '6', 'Rioja', 'cargador_frontal', '2023-10-06 23:08:16'),
(7, '47469980', 'Nuevo1', 'Cayao Fernandez', 'jhogave_14@hotmail.com', '982226835', 'Ripconciv', '6', 'Rioja', 'cargador_frontal', '2023-10-06 21:17:55'),
(8, '47469980', 'NILSON JHONNY', 'Cayao Fernandez', 'admin@nilcf.com', '982226835', 'Ripconciv', '9', 'bg', 'excavadora', '2023-10-06 22:18:11'),
(9, '47469980', 'sadasda', 'Cayao Fernandez', 'admin@nilcf.com', '982226835', 'Ripconciv', '4', 'Rioja', 'excavadora', '2023-10-06 22:19:21'),
(10, '47469980', 'NILSON JHONNY', 'Cayao Fernandez', 'incafarmalg@factumi.com', '982226835', 'Ripconciv', '7', 'Rioja', 'cargador_frontal', '2023-10-06 22:22:21'),
(11, '47469980', 'NILSON JHONNY', 'Cayao Fernandez', 'incafarmalg@factumi.com', '982226835', 'Ripconciv', '7', 'Rioja', 'cargador_frontal', '2023-10-06 22:23:12'),
(12, '47469980', 'JOSE ALBERTO', 'Cayao Fernandez', 'jhogave_14@hotmail.com', '982226835', 'Ripconciv', '8', 'Rioja', 'excavadora', '2023-10-06 22:24:18'),
(13, '47469980', 'NILSON JHONNY', 'Cayao Fernandez', 'JHOGAVE_14@HOTMAIL.COM', '982226835', 'Ripconciv', '5', 'Rioja', 'excavadora', '2023-10-06 22:30:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `id` int(11) NOT NULL,
  `dia_inicial_trabajo` date NOT NULL,
  `dia_fin_trabajo` date NOT NULL,
  `dia_inicio_descanso` date NOT NULL,
  `dia_fin_descanso` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `dni` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `equipo` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cdgequipo` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `celular` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `frente_trabajo` int(11) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `kind` int(11) NOT NULL DEFAULT 1,
  `stock_id` int(11) DEFAULT NULL,
  `counter` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `username`, `dni`, `equipo`, `cdgequipo`, `celular`, `frente_trabajo`, `email`, `password`, `image`, `status`, `kind`, `stock_id`, `counter`, `created_at`) VALUES
(1, 'nilson', 'admin', 'admin', '0000000', '', '', '987654321', 3, 'admin@hotmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'chatbot_2.png', 1, 1, NULL, 61, '2023-03-18 14:55:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `spend`
--
ALTER TABLE `spend`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `standby`
--
ALTER TABLE `standby`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `sell`
--
ALTER TABLE `sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `spend`
--
ALTER TABLE `spend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `standby`
--
ALTER TABLE `standby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
