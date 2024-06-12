-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2024 a las 19:51:32
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `walweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_compartidas`
--

CREATE TABLE `fotos_compartidas` (
  `Id_Foto_Compartida` int(11) NOT NULL,
  `Id_tipo_Foto` varchar(255) DEFAULT NULL,
  `Foto` varchar(1000) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fotos_compartidas`
--

INSERT INTO `fotos_compartidas` (`Id_Foto_Compartida`, `Id_tipo_Foto`, `Foto`, `id_perfil`) VALUES
(25, 'ProfilePhoto', '1717954271_unnamed.jpg', 19),
(26, 'CoverPhoto', '1717954271_biker.jpg', 19),
(27, 'ProfilePhoto', '1717955730_profile_example.jpg', 20),
(28, 'CoverPhoto', '1717955730_shu.jpeg', 20),
(34, 'ProfilePhoto', '1718140986_Walter.jpg', 21),
(35, 'CoverPhoto', '1718140986_Full-moon-blue-sea-clouds-night-beautiful-nature-landscape_5120x2880.jpg', 21),
(36, 'PublicationPhoto', '1718145101_red-dead-redemption.jpg', 21),
(37, 'PublicationPhoto', '1718159308_Walter.jpg', 20),
(38, 'PublicationPhoto', '1718159403_49835.jpg', 20),
(39, 'PublicationPhoto', '1718159777_ichigo.jpg', 21),
(40, 'PublicationPhoto', '1718165793_imag2.jpeg', 19),
(41, 'ProfilePhoto', '1718206951_roberetjpg.jpg', 22),
(42, 'CoverPhoto', '1718206951_obi.jpg', 22),
(43, 'ProfilePhoto', '1718207286_horizon-zero-dawn.jpg', 23),
(44, 'CoverPhoto', '1718207286_work_img2.jpg', 23),
(45, 'ProfilePhoto', '1718207850_raul.jpg', 24),
(46, 'CoverPhoto', '1718207850_vader.jpg', 24),
(47, 'PublicationPhoto', '1718207940_manjar.jpg', 24),
(48, 'ProfilePhoto', '1718209047_luka.jpg', 25),
(49, 'CoverPhoto', '1718209047_Tecnologia (1).jpg', 25),
(50, 'ProfilePhoto', '1718209480_work_img3.jpg', 26),
(51, 'CoverPhoto', '1718209480_work_img1.jpg', 26),
(52, 'ProfilePhoto', '1718209967_mk.jpg', 27),
(53, 'CoverPhoto', '1718209967_batman1.jpg', 27),
(54, 'ProfilePhoto', '1718210878_spiderman1.jpg', 28),
(55, 'CoverPhoto', '1718210878_batman1.jpg', 28),
(56, 'ProfilePhoto', '1718211523_batman2.jfif', 19),
(57, 'CoverPhoto', '1718211523_spiderman1.jpg', 19),
(58, 'ProfilePhoto', '1718212115_spiderman1.jpg', 24),
(59, 'CoverPhoto', '1718212115_batman1.jpg', 24),
(60, 'PublicationPhoto', '1718213038_luka.jpg', 25),
(61, 'PublicationPhoto', '1718214482_vader.jpg', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_perfil`
--

CREATE TABLE `fotos_perfil` (
  `id_foto_perfil` int(11) NOT NULL,
  `id_foto_compartida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fotos_perfil`
--

INSERT INTO `fotos_perfil` (`id_foto_perfil`, `id_foto_compartida`) VALUES
(11, 25),
(21, 25),
(12, 27),
(13, 34),
(14, 41),
(15, 43),
(16, 45),
(22, 45),
(17, 48),
(18, 50),
(19, 52),
(20, 54);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_portada`
--

CREATE TABLE `fotos_portada` (
  `id_foto_portada` int(11) NOT NULL,
  `id_foto_compartida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fotos_portada`
--

INSERT INTO `fotos_portada` (`id_foto_portada`, `id_foto_compartida`) VALUES
(11, 26),
(21, 26),
(12, 28),
(13, 35),
(14, 42),
(15, 44),
(16, 46),
(22, 46),
(17, 49),
(18, 51),
(19, 53),
(20, 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_publicaciones`
--

CREATE TABLE `fotos_publicaciones` (
  `Id_Foto_Compartida` int(11) DEFAULT NULL,
  `Id_publicacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fotos_publicaciones`
--

INSERT INTO `fotos_publicaciones` (`Id_Foto_Compartida`, `Id_publicacion`) VALUES
(36, 8),
(37, 9),
(38, 10),
(39, 11),
(40, 12),
(47, 13),
(60, 14),
(61, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `Codigo_Mensaje` varchar(255) NOT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `id_perfil_salida` int(11) DEFAULT NULL,
  `id_perfil_entrada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_foto_portada` int(11) DEFAULT NULL,
  `id_foto_perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `id_user`, `id_foto_portada`, `id_foto_perfil`) VALUES
(19, 21, 11, 11),
(20, 22, 12, 12),
(21, 23, 13, 13),
(22, 24, 14, 14),
(23, 25, 15, 15),
(24, 26, 16, 16),
(25, 27, 17, 17),
(26, 28, 18, 18),
(27, 29, 19, 19),
(28, 30, 20, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `Id_publicacion` int(11) NOT NULL,
  `mensaje` varchar(400) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `n_reacciones` int(11) DEFAULT NULL,
  `Id_Foto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`Id_publicacion`, `mensaje`, `id_perfil`, `n_reacciones`, `Id_Foto`) VALUES
(8, 'mi primera publicacion', 21, NULL, 36),
(9, 'Foto de mi primito ;)', 20, NULL, 37),
(10, 'Lo mas duro del sistema :v', 20, NULL, 38),
(11, 'Una puerta cerrada es una puerta a la que no puedes entrar...', 21, NULL, 39),
(12, 'Tú voz era tan suave como las notas que el cielo pinta cuando el sol se silencia', 19, NULL, 40),
(13, 'que manjar que me preparo mi novia', 24, NULL, 47),
(14, 'YO', 25, NULL, 60),
(15, 'holaaa es mi segunda publicacion, espero nos saquemos 10 en el proyecto ', 19, NULL, 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reacciones`
--

CREATE TABLE `reacciones` (
  `Id_reaccion` varchar(255) NOT NULL,
  `Nombre_Reaccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reacciones`
--

INSERT INTO `reacciones` (`Id_reaccion`, `Nombre_Reaccion`) VALUES
('Corazon', 'Me encanta'),
('Feliz', 'Me gusta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reacciones_por_publicacion`
--

CREATE TABLE `reacciones_por_publicacion` (
  `Id_reaccion` varchar(255) DEFAULT NULL,
  `Id_publicacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_foto`
--

CREATE TABLE `tipo_foto` (
  `Id_tipo_Foto` varchar(255) NOT NULL,
  `Nombre_Tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_foto`
--

INSERT INTO `tipo_foto` (`Id_tipo_Foto`, `Nombre_Tipo`) VALUES
('CoverPhoto', 'Foto de portada'),
('ProfilePhoto', 'Foto de Perfil'),
('PublicationPhoto', 'Foto de Publicación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `Nombre_Real` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `user`, `password`, `correo`, `fecha_nacimiento`, `genero`, `telefono`, `apellido`, `Nombre_Real`) VALUES
(21, 'Defth_Blank', 'Ninonev9.', 'sergiofloress911@gmail.com', '2005-02-08', 'masculino', '74025895', 'Quintanilla', 'Sergio'),
(22, 'Rewl', 'Bazzel990.', 'RaulLop0z@gmail.com', '1987-08-09', 'masculino', '74023232', 'lopez', 'Raul'),
(23, 'WalterElpro', 'Walpweb8.', 'Walterpapa@gmail.com', '2001-12-09', 'masculino', '77553489', 'Melara', 'Walter'),
(24, 'DiegoRobert', 'Robb890.', 'Roberto7890@gmail.com', '2000-12-23', 'masculino', '77654578', 'Balmore', 'Diego'),
(25, 'Elenaghz', 'user123.', 'Lenhgth78@hotmail.com', '1997-08-09', 'femenina', '8233654', 'Pineda', 'Elena'),
(26, 'Mero_Raul', 'RaulCarck90;', 'Lopezvlls911@gmail.com', '2005-01-19', 'masculino', '12908967', 'Lopez', 'Raul'),
(27, 'Lukas10', 'Ninonev9.', 'Lukskill89@gmail.com', '1979-01-09', 'masculino', '9876549', 'Arenas', 'Santiago'),
(28, 'Allan', 'Ninonev9.', 'Allanpoe90@gmail.com', '2004-01-23', 'masculino', '71025665', 'Rivera', 'Alan'),
(29, 'Dexter888', 'Bazzel990.', 'dexter8882121@gmail.com', '1999-09-18', 'masculino', '99882233', 'Raul', 'Fernando'),
(30, 'Elsalon', 'Elsalon123.', 'gbrocas56@gmail.com', '2004-09-28', 'masculino', '7777777', 'Morales', 'Elias');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuariosperdil`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `usuariosperdil` (
`ID_PERFIL` int(11)
,`ID_USER` int(11)
,`USUARIO` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistadatospublicaciones`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vistadatospublicaciones` (
`Nombre` varchar(255)
,`mensaje` varchar(400)
,`id_perfil` int(11)
,`Id_publicacion` int(11)
,`foto_Publicacion` varchar(1000)
,`Foto_Perfil` varchar(1000)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_foto_perfil`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_foto_perfil` (
`Nombre_Usuario` varchar(255)
,`Foto_Perfil` varchar(1000)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_foto_portada`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_foto_portada` (
`Nombre_Usuario` varchar(255)
,`Foto_Portada` varchar(1000)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `usuariosperdil`
--
DROP TABLE IF EXISTS `usuariosperdil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuariosperdil`  AS SELECT `pf`.`id_perfil` AS `ID_PERFIL`, `us`.`id_user` AS `ID_USER`, `us`.`user` AS `USUARIO` FROM (`perfil` `pf` join `usuario` `us` on(`us`.`id_user` = `pf`.`id_user`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vistadatospublicaciones`
--
DROP TABLE IF EXISTS `vistadatospublicaciones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistadatospublicaciones`  AS SELECT `us`.`user` AS `Nombre`, `pub`.`mensaje` AS `mensaje`, `per`.`id_perfil` AS `id_perfil`, `pub`.`Id_publicacion` AS `Id_publicacion`, `fc`.`Foto` AS `foto_Publicacion`, `fc4`.`Foto` AS `Foto_Perfil` FROM ((((((`publicaciones` `pub` join `perfil` `per` on(`pub`.`id_perfil` = `per`.`id_perfil`)) join `fotos_publicaciones` `ftp` on(`ftp`.`Id_publicacion` = `pub`.`Id_publicacion`)) join `fotos_compartidas` `fc` on(`fc`.`Id_Foto_Compartida` = `ftp`.`Id_Foto_Compartida`)) join `usuario` `us` on(`us`.`id_user` = `per`.`id_user`)) join `fotos_perfil` `fpr` on(`fpr`.`id_foto_perfil` = `per`.`id_foto_perfil`)) join `fotos_compartidas` `fc4` on(`fc4`.`Id_Foto_Compartida` = `fpr`.`id_foto_compartida`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_foto_perfil`
--
DROP TABLE IF EXISTS `vista_foto_perfil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_foto_perfil`  AS SELECT `us`.`user` AS `Nombre_Usuario`, `fc`.`Foto` AS `Foto_Perfil` FROM (((`perfil` `p` join `usuario` `us` on(`p`.`id_user` = `us`.`id_user`)) join `fotos_perfil` `fp` on(`p`.`id_foto_perfil` = `fp`.`id_foto_perfil`)) join `fotos_compartidas` `fc` on(`fc`.`Id_Foto_Compartida` = `fp`.`id_foto_compartida`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_foto_portada`
--
DROP TABLE IF EXISTS `vista_foto_portada`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_foto_portada`  AS SELECT `us`.`user` AS `Nombre_Usuario`, `fc`.`Foto` AS `Foto_Portada` FROM (((`perfil` `p` join `usuario` `us` on(`p`.`id_user` = `us`.`id_user`)) join `fotos_portada` `fp` on(`p`.`id_foto_portada` = `fp`.`id_foto_portada`)) join `fotos_compartidas` `fc` on(`fc`.`Id_Foto_Compartida` = `fp`.`id_foto_compartida`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fotos_compartidas`
--
ALTER TABLE `fotos_compartidas`
  ADD PRIMARY KEY (`Id_Foto_Compartida`),
  ADD KEY `FK_TIPO_IDTYPEFOTO` (`Id_tipo_Foto`),
  ADD KEY `FK_PERFIL_ID_PERFIL1` (`id_perfil`);

--
-- Indices de la tabla `fotos_perfil`
--
ALTER TABLE `fotos_perfil`
  ADD PRIMARY KEY (`id_foto_perfil`),
  ADD KEY `PK_ID_FOTOPERFIL` (`id_foto_compartida`);

--
-- Indices de la tabla `fotos_portada`
--
ALTER TABLE `fotos_portada`
  ADD PRIMARY KEY (`id_foto_portada`),
  ADD KEY `FOTOS_ID_FOTO_PORTADA` (`id_foto_compartida`);

--
-- Indices de la tabla `fotos_publicaciones`
--
ALTER TABLE `fotos_publicaciones`
  ADD KEY `FK_PUBLICIDFOTO` (`Id_Foto_Compartida`),
  ADD KEY `FK_ID_PUVLIC` (`Id_publicacion`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`Codigo_Mensaje`),
  ADD KEY `FK_PERFIL_SALIDA` (`id_perfil_salida`),
  ADD KEY `FK_PERFIL_ENTRADA` (`id_perfil_entrada`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`),
  ADD KEY `FK_USUARIO_IDUSER` (`id_user`),
  ADD KEY `FK_ID_FOTOPORTADA` (`id_foto_portada`),
  ADD KEY `FK_ID_FOTOPERFIL` (`id_foto_perfil`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`Id_publicacion`),
  ADD KEY `PUBLICACION_ID_PERFIL` (`id_perfil`),
  ADD KEY `FK_PUVLICACION_FOTO` (`Id_Foto`);

--
-- Indices de la tabla `reacciones`
--
ALTER TABLE `reacciones`
  ADD PRIMARY KEY (`Id_reaccion`);

--
-- Indices de la tabla `reacciones_por_publicacion`
--
ALTER TABLE `reacciones_por_publicacion`
  ADD KEY `FK_REACCIONES_ID` (`Id_reaccion`),
  ADD KEY `FK_PUBLICACION_ID` (`Id_publicacion`);

--
-- Indices de la tabla `tipo_foto`
--
ALTER TABLE `tipo_foto`
  ADD PRIMARY KEY (`Id_tipo_Foto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fotos_compartidas`
--
ALTER TABLE `fotos_compartidas`
  MODIFY `Id_Foto_Compartida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `fotos_perfil`
--
ALTER TABLE `fotos_perfil`
  MODIFY `id_foto_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `fotos_portada`
--
ALTER TABLE `fotos_portada`
  MODIFY `id_foto_portada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `Id_publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fotos_compartidas`
--
ALTER TABLE `fotos_compartidas`
  ADD CONSTRAINT `FK_PERFIL_ID_PERFIL1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`),
  ADD CONSTRAINT `FK_TIPO_IDTYPEFOTO` FOREIGN KEY (`Id_tipo_Foto`) REFERENCES `tipo_foto` (`Id_tipo_Foto`);

--
-- Filtros para la tabla `fotos_perfil`
--
ALTER TABLE `fotos_perfil`
  ADD CONSTRAINT `PK_ID_FOTOPERFIL` FOREIGN KEY (`id_foto_compartida`) REFERENCES `fotos_compartidas` (`Id_Foto_Compartida`);

--
-- Filtros para la tabla `fotos_portada`
--
ALTER TABLE `fotos_portada`
  ADD CONSTRAINT `FOTOS_ID_FOTO_PORTADA` FOREIGN KEY (`id_foto_compartida`) REFERENCES `fotos_compartidas` (`Id_Foto_Compartida`);

--
-- Filtros para la tabla `fotos_publicaciones`
--
ALTER TABLE `fotos_publicaciones`
  ADD CONSTRAINT `FK_ID_PUVLIC` FOREIGN KEY (`Id_publicacion`) REFERENCES `publicaciones` (`Id_publicacion`),
  ADD CONSTRAINT `FK_PUBLICIDFOTO` FOREIGN KEY (`Id_Foto_Compartida`) REFERENCES `fotos_compartidas` (`Id_Foto_Compartida`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `FK_PERFIL_ENTRADA` FOREIGN KEY (`id_perfil_entrada`) REFERENCES `perfil` (`id_perfil`),
  ADD CONSTRAINT `FK_PERFIL_SALIDA` FOREIGN KEY (`id_perfil_salida`) REFERENCES `perfil` (`id_perfil`);

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `FK_ID_FOTOPERFIL` FOREIGN KEY (`id_foto_perfil`) REFERENCES `fotos_perfil` (`id_foto_perfil`),
  ADD CONSTRAINT `FK_ID_FOTOPORTADA` FOREIGN KEY (`id_foto_portada`) REFERENCES `fotos_portada` (`id_foto_portada`),
  ADD CONSTRAINT `FK_USUARIO_IDUSER` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `FK_PUVLICACION_FOTO` FOREIGN KEY (`Id_Foto`) REFERENCES `fotos_compartidas` (`Id_Foto_Compartida`),
  ADD CONSTRAINT `PUBLICACION_ID_PERFIL` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);

--
-- Filtros para la tabla `reacciones_por_publicacion`
--
ALTER TABLE `reacciones_por_publicacion`
  ADD CONSTRAINT `FK_PUBLICACION_ID` FOREIGN KEY (`Id_publicacion`) REFERENCES `publicaciones` (`Id_publicacion`),
  ADD CONSTRAINT `FK_REACCIONES_ID` FOREIGN KEY (`Id_reaccion`) REFERENCES `reacciones` (`Id_reaccion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
