-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-11-2018 a las 02:37:04
-- Versión del servidor: 5.7.24-0ubuntu0.16.04.1
-- Versión de PHP: 7.2.12-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinarialaravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencionpeluqueria`
--

CREATE TABLE `atencionpeluqueria` (
  `id_paciente` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(5) NOT NULL,
  `descripcion` varchar(240) DEFAULT NULL,
  `id_estilista` varchar(9) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencionv`
--

CREATE TABLE `atencionv` (
  `id` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `descripcion` varchar(240) DEFAULT NULL,
  `paciente` int(4) NOT NULL,
  `veterinario` varchar(45) NOT NULL,
  `diagnostico` varchar(200) DEFAULT NULL,
  `tratamiento` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `atencionv`
--

INSERT INTO `atencionv` (`id`, `fecha_hora`, `descripcion`, `paciente`, `veterinario`, `diagnostico`, `tratamiento`) VALUES
(14, '2018-11-27 23:52:18', 'perdio una pata', 3, '23434354', 'perdio la pata izquierda a la altura de la rodilla', 'antibioticos y vendaje.  El cambio de vendaje debe hacerse cada 12 hs'),
(15, '2018-11-27 23:53:33', 'Vacunacion', 1, '23434354', 'vacunacion anual', 'triple. dosis 10 ml'),
(16, '2018-11-25 19:07:25', 'perdida de liquido', 12, '23434354', 'perdida de liquido por aplastamiento', 'reposo, 5 dias de internacion'),
(17, '2018-11-27 23:51:55', 'infeccion', 4, '23434354', ' infeccion por estreptococos', 'antibiotico x-28 por 1 semana'),
(18, '2018-11-27 23:56:27', 'intoxicacion', 2, '88888874', 'se intoxico con pintura en aerosol y comió pastillas de ribotril', 'internacion y desintoxicacion por 1 semana'),
(19, '2018-11-27 23:54:48', 'Perdida de liquido', 12, '88888874', 'Perdida de liquido por aplastamiento', 'antibioticos y reposo.'),
(21, '2018-11-28 04:19:27', 'ulceraciones en la piel', 9, '88888874', 'alergia, aparentemente comió alimentos en mal estado', 'desintoxicacion con dieta'),
(22, '2018-11-29 01:20:04', 'perdida de extremidad', 16, '88888874', 'perdida de extremidad, se engancho en la jaula y perdio la cuarta extremidad a la altura de la tercera vertebra', 'reposo y observacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `dni` varchar(9) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `localidad` varchar(45) NOT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `altura` int(5) DEFAULT NULL,
  `telefono_area` varchar(6) DEFAULT NULL,
  `telefono_numero` varchar(12) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `comentarios` varchar(200) DEFAULT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`dni`, `nombres`, `apellido`, `localidad`, `calle`, `altura`, `telefono_area`, `telefono_numero`, `correo`, `comentarios`, `activo`) VALUES
('1234', 'asd', 'asd', 'La Plata', 'as', 1, '4', '1', 'aq2@a', 'sdf', 0),
('223434', 'Andres', 'Calamaro', 'La Plata', '66', 666, '222', '345235', 'asdaf@asldkfa.com', 'asdfasd', 1),
('234234', 'Chano', 'Charpentier', 'La Plata', '44', 233, '221', '23423423', 'chano@algo.com', ' ', 1),
('2342342', 'Guido', 'Casca', 'Berisso', 'Brasil', 2342, '222', '234234', 'guido@algo.com', ' ', 1),
('234242', 'Sara', 'Connor', 'La Plata', '1', 333, '221', '2342341232', 'saraconnor@algoa.com', 'adsfasdfas', 1),
('33444888', 'Samanta', 'Farjat', 'La Plata', '10 ', 1254, '221', '3445566', 'samanta@algo.com', 'sin comentarios', 1),
('3425345', 'Natalia', 'De Negri', 'La Plata', 'Genova', 324234, '221', '2342342', 'falkmvas@alco.com', 'sdfafd', 1),
('343523', 'Gustavo', 'Cerati', 'La Plata', '23', 23123, '221', '2342342', 'sodas@algo.com', 'asdfasdfa', 1),
('34444333', 'Victoria', 'Xipolitakis', 'La Plata', '22', 2121, '221', '465465', 'victoria@hotmail.com', 'ddlajsdlfasjdlfk dlajsdlfasjdlfk ', 1),
('4355645', 'Juan', 'Di Natale', 'Berisso', '44 ', 2342, '221', '213451345', 'juan@algo.com', 'ninguno', 1),
('55566677', 'Charly', 'Garcia', 'La Plata', 'New York', 333, '3322', '432345', 'charly@algo.com', 'sdfasdfas', 1),
('8739438', 'Arnaldo', 'Andre', 'La Plata', '66', 2342, '221', '345345', 'arnaldo@algo.com', ' ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`id`, `nombre`, `activo`) VALUES
(1, 'perro', 1),
(2, 'gato', 1),
(3, 'pez', 1),
(4, 'conejo', 1),
(5, 'Mamut', 0),
(6, 'Oso', 1),
(7, 'Cocodrilo', 1),
(8, 'Cobayo', 0),
(9, 'Lechuza', 1),
(10, 'Iguana', 1),
(11, 'Oruga', 1),
(12, 'Araña', 1),
(13, 'Cangrejo', 1),
(14, 'Hamster', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilista`
--

CREATE TABLE `estilista` (
  `dni` varchar(9) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `altura` int(5) DEFAULT NULL,
  `telefono_area` varchar(6) DEFAULT NULL,
  `telefono_numero` varchar(12) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `claveTributaria` varchar(13) DEFAULT NULL,
  `localidad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `id` int(11) NOT NULL,
  `Localidad` varchar(45) NOT NULL,
  `CP` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id`, `Localidad`, `CP`) VALUES
(1, 'La Plata', '1900'),
(2, 'Berisso', '1923');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `raza` int(11) NOT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `tamanio` varchar(15) DEFAULT NULL,
  `peso` varchar(45) DEFAULT NULL,
  `talla` int(3) DEFAULT NULL,
  `cliente` varchar(45) NOT NULL,
  `responsable` varchar(45) DEFAULT NULL,
  `imagen` varchar(50) NOT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `nombres`, `raza`, `sexo`, `tamanio`, `peso`, `talla`, `cliente`, `responsable`, `imagen`, `activo`) VALUES
(1, 'Chispita', 1, 'hembra', 'grande', '22', 1, '34444333', 'no', 'Chispita.jpeg', 1),
(2, 'Brutus', 2, 'macho', 'mediano', '4', 1, '55566677', 'no  hay', 'Brutus.jpg', 1),
(3, 'Rocky', 3, 'indefinido', 'chico', '1', 12, '34444333', NULL, 'Rocky.jpg', 1),
(4, 'Sancho', 4, 'macho', 'grande', '17', 23, '55566677', 'no tiene', 'Sancho.jpg', 1),
(5, 'Cuca', 7, 'hembra', 'grande', '800', 40, '4355645', 'Mario Pergolini', 'Cuca.jpg', 1),
(7, 'Saul', 6, 'macho', 'chico', '12', 2, '34444333', 'Palito Ortega', 'cocker.jpg', 1),
(8, 'Coco', 10, 'macho', 'grande', '500', 10, '33444888', 'Ricardo Iorio', 'cocodrilo.jpeg', 1),
(9, 'Mimicha', 11, 'hembra', 'chico', '2', 1, '234242', 'Jhon Connor', 'mimicha.jpeg', 1),
(10, 'Cuco', 13, 'macho', 'grande', '30', 3, '3425345', 'Guillermo Copola', 'cuco.jpeg', 1),
(11, 'Cacho', 12, 'macho', 'grande', '33', 3, '4355645', 'Mario Pergolini', 'cacho.jpeg', 1),
(12, 'Gus', 15, 'hembra', 'chico', '0', 0, '33444888', 'Natalia De Negri', 'gus.jpeg', 1),
(13, 'Chispita', 16, 'hembra', 'chico', '3', 1, '55566677', 'Palito Ortega', 'chispita2.jpeg', 1),
(14, 'asdfasad', 13, 'asdfas', 'asdfasd', '333', 4, '343523', 'sdfasdfas', 'cocacola.jpeg', 0),
(15, 'asd', 1, 'asd', '234', '4', 1, '223434', 'asd', '', 0),
(16, 'Mika', 18, 'hembra', 'chico', '1', 1, '2342342', 'no', 'mika.jpeg', 1),
(17, 'Fido', 19, 'macho', 'chico', '1', 1, '8739438', 'Luisa Culioc', 'fido.jpeg', 1),
(18, 'Iggy', 17, 'hembra', 'mediano', '2', 1, '2342342', ' ', 'iggy.jpeg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `id` int(11) NOT NULL,
  `especie` varchar(45) NOT NULL,
  `clase` varchar(45) NOT NULL,
  `subclase` varchar(45) DEFAULT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`id`, `especie`, `clase`, `subclase`, `activo`) VALUES
(1, 'perro', 'Boxer', NULL, 1),
(2, 'gato', 'Siames', NULL, 1),
(3, 'pez', 'carpa', 'coi', 1),
(4, 'conejo', 'albino', NULL, 1),
(5, 'Oso', 'pardo', 'del bosque de California', 1),
(6, 'perro', 'Coker', 'spaniel', 1),
(7, 'Oso', 'polar', 'del artico', 1),
(8, 'perro', 'Siberiano', '', 1),
(9, 'Oso', 'pardo', 'grizli', 1),
(10, 'Cocodrilo', 'Cocodrilo', 'del pantano', 1),
(11, 'Lechuza', 'Lechuza', '', 1),
(12, 'perro', 'Ovejero', 'Aleman', 1),
(13, 'perro', 'Ovejero', 'Belga', 1),
(14, 'perro', 'Doberman ', '', 1),
(15, 'Oruga', 'Asphodelus fistulosus', '', 1),
(16, 'gato', 'Egipcio', '', 1),
(17, 'Iguana', 'gecko', 'nada', 1),
(18, 'Araña', 'Pollito', '', 1),
(19, 'Hamster', 'Hamster', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id` int(11) NOT NULL,
  `paciente` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` varchar(5) NOT NULL,
  `hora_finalizacion` varchar(5) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id`, `paciente`, `fecha`, `hora_inicio`, `hora_finalizacion`, `descripcion`, `estado`) VALUES
(1, 2, '2018-12-18', '11:00', '12:30', 'para castracion', 1),
(2, 2, '2018-10-27', '15:00', '15:50', 'para amputacion', 1),
(3, 3, '2018-11-07', '09:00', '10:00', 'se le quebro una aleta', 1),
(4, 4, '2018-10-20', '20:00', '22:00', 'amputacion de pata derecha por infeccion', 1),
(5, 8, '2018-11-21', '12:00', '12:30', 'vacunacion', 1),
(6, 5, '2018-11-17', '11:40', '12:20', 'radiografia', 1),
(7, 10, '2018-12-02', '10:00', '11:00', 'castracion', 1),
(8, 12, '2018-12-04', '16:00', '17:00', 'para reproducción asistida', 1),
(9, 10, '2018-11-29', '17:20', '18:00', 'Vacunacion', 1),
(10, 13, '2018-12-01', '10:00', '11:00', 'consulta', 1),
(11, 11, '2018-12-18', '11:00', '13:00', 'operacion de orejas', 1),
(12, 4, '2018-11-30', '17:00', '17:30', 'consulta', 1),
(13, 16, '2018-12-01', '10:00', '11:00', 'consulta', 1),
(14, 11, '2018-12-01', '12:14', '13:00', 'consulta', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'facundo', 'facundomarcos@live.com.ar', '$2y$10$2VgayKkE4mmjV0bO6ZrI0OhDuDOvcPQVcmVOcgzketmGYO.lkdHLm', 'c6OJkaHc9mywtYWFsIzduOrpKJUQ02JbRmEKPD34Y1LtusAusDe9ZGWJLGb6', '2018-11-07 02:41:00', '2018-11-28 03:23:14'),
(2, 'pepe', 'administrador@live.com.ar', '$2y$10$Knx9.OJ.4wqC.jITwimljuA.YBnWMYbt4TjaqXxhxOz7q18Ekt7/2', 'PMQAmh478OwPU95R2qzAGbr2xyz28PDJ1YwVb4TVCOwrFeNX81Fk3euld4zh', '2018-11-07 03:32:11', '2018-11-27 12:27:30'),
(3, 'Yesi', 'yesica@live.com.ar', '$2y$10$S81Z3QajHEedMvF51oeV6uSGvigwOFgbNrALqwhgJS8LvLQBsfGOa', NULL, '2018-11-27 12:01:46', '2018-11-27 12:01:46'),
(4, 'carlos', 'carlos@live.com.ar', '$2y$10$2thA2QMXFgpwKhwkauwXPu/yXKF/RBisC3uv1pgtv.TcfLumhPsVC', NULL, '2018-11-27 12:02:04', '2018-11-27 12:02:04'),
(5, 'walter', 'walter@live.com.ar', '$2y$10$bwUFhjJEmeZEKvNK/P2Al.iEfWt33lzV8j//DOG5NG8t4lrlk/TTq', NULL, '2018-11-27 12:02:37', '2018-11-27 12:02:37'),
(6, 'hernan', 'hernan@live.com.ar', '$2y$10$BPsW3Skd1dYqRSGEJO.Gv.ZOJy8PMhjolR2EPn4mQcMxBjwkh3R5m', 'qhHBG1SDRNT9fsQc84qwKTzpqapYL4Srs7xWKtLgzukKDXLCCrfuzx8F9lMA', '2018-11-27 12:03:07', '2018-11-27 13:37:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE `veterinario` (
  `dni` varchar(9) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `altura` int(5) DEFAULT NULL,
  `telefono_area` varchar(6) DEFAULT NULL,
  `telefono_numero` varchar(12) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `claveTributaria` varchar(13) DEFAULT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  `especializacion` varchar(45) DEFAULT NULL,
  `matricula` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `veterinario`
--

INSERT INTO `veterinario` (`dni`, `nombres`, `apellido`, `calle`, `altura`, `telefono_area`, `telefono_numero`, `correo`, `claveTributaria`, `localidad`, `especializacion`, `matricula`) VALUES
('23434354', 'Jorge', 'Cutini', '44', 2323, '221', '34234', 'jorge@algo.com', '21231', 'La Plata', NULL, '23423'),
('88888874', 'Raul', 'Portal', '44', 555, '221', '42543', 'raulportal@notidormi.com.ar', '208888745', 'La Plata', 'dermatologo', '23423');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atencionpeluqueria`
--
ALTER TABLE `atencionpeluqueria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Atencion_Peluqueria_1_idx` (`id_paciente`),
  ADD KEY `fk_Atencion_Peluqueria_2_idx` (`id_estilista`);

--
-- Indices de la tabla `atencionv`
--
ALTER TABLE `atencionv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Atencion_veterinaria_1_idx` (`paciente`),
  ADD KEY `fk_Atencion_veterinaria_2_idx` (`veterinario`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `idCliente_UNIQUE` (`dni`),
  ADD KEY `fk_Cliente_1_idx` (`localidad`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `especie_UNIQUE` (`nombre`);

--
-- Indices de la tabla `estilista`
--
ALTER TABLE `estilista`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `idCliente_UNIQUE` (`dni`),
  ADD KEY `fk_Estilista_Localidad1_idx` (`localidad`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idLocalidad_UNIQUE` (`id`),
  ADD UNIQUE KEY `Localidad_UNIQUE` (`Localidad`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idPaciente_UNIQUE` (`id`),
  ADD KEY `fk_Paciente_1_idx` (`cliente`),
  ADD KEY `fk_Paciente_2_idx` (`raza`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_raza_especie_idx` (`especie`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_turno_1_idx` (`paciente`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `idCliente_UNIQUE` (`dni`),
  ADD KEY `fk_Estilista_1_idx` (`localidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atencionpeluqueria`
--
ALTER TABLE `atencionpeluqueria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `atencionv`
--
ALTER TABLE `atencionv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atencionpeluqueria`
--
ALTER TABLE `atencionpeluqueria`
  ADD CONSTRAINT `fk_Atencion_Peluqueria_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Atencion_Peluqueria_2` FOREIGN KEY (`id_estilista`) REFERENCES `estilista` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `atencionv`
--
ALTER TABLE `atencionv`
  ADD CONSTRAINT `fk_Atencion_veterinaria_1` FOREIGN KEY (`paciente`) REFERENCES `paciente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Atencion_veterinaria_2` FOREIGN KEY (`veterinario`) REFERENCES `veterinario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_Cliente_1` FOREIGN KEY (`localidad`) REFERENCES `localidad` (`Localidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estilista`
--
ALTER TABLE `estilista`
  ADD CONSTRAINT `fk_Estilista_Localidad1` FOREIGN KEY (`localidad`) REFERENCES `localidad` (`Localidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk_Paciente_1` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Paciente_2` FOREIGN KEY (`raza`) REFERENCES `raza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `raza`
--
ALTER TABLE `raza`
  ADD CONSTRAINT `fk_raza_especie` FOREIGN KEY (`especie`) REFERENCES `especie` (`nombre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `fk_turno_1` FOREIGN KEY (`paciente`) REFERENCES `paciente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD CONSTRAINT `fk_Veterinario` FOREIGN KEY (`localidad`) REFERENCES `localidad` (`Localidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
