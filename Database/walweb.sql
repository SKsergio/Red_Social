-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2024 a las 23:29:25
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
(29, 'PublicationPhoto', '1718139766_red-dead-redemption.jpg', 20),
(30, 'PublicationPhoto', '1718140013_roberetjpg.jpg', 20),
(31, 'PublicationPhoto', '1718140489_Full-moon-blue-sea-clouds-night-beautiful-nature-landscape_5120x2880.jpg', 19),
(32, 'PublicationPhoto', '1718140702_unnamed.jpg', 19),
(33, 'PublicationPhoto', '1718140783_bi.jpg', 19),
(34, 'ProfilePhoto', '1718140986_Walter.jpg', 21),
(35, 'CoverPhoto', '1718140986_Full-moon-blue-sea-clouds-night-beautiful-nature-landscape_5120x2880.jpg', 21);

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
(12, 27),
(13, 34);

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
(12, 28),
(13, 35);

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
(21, 23, 13, 13);

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
(3, 'mi primera publicacion', 20, NULL, 29),
(4, 'como me gusta mi pelo', 20, NULL, 30),
(5, 'Bienvenidos a Walpweb', 19, NULL, 31),
(6, 'the dark night una carta de amor al cine', 19, NULL, 32),
(7, 'mi ultimo post :((((', 19, NULL, 33);

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
(23, 'WalterElpro', 'Walpweb8.', 'Walterpapa@gmail.com', '2001-12-09', 'masculino', '77553489', 'Melara', 'Walter');

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
  MODIFY `Id_Foto_Compartida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `fotos_perfil`
--
ALTER TABLE `fotos_perfil`
  MODIFY `id_foto_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `fotos_portada`
--
ALTER TABLE `fotos_portada`
  MODIFY `id_foto_portada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `Id_publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
