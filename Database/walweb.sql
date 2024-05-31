-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2024 a las 17:14:02
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
  `Foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_perfil`
--

CREATE TABLE `foto_perfil` (
  `Id_Foto_Compartida` int(11) DEFAULT NULL,
  `Id_Perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_publicacion`
--

CREATE TABLE `foto_publicacion` (
  `Id_Foto_Compartida` int(11) DEFAULT NULL,
  `Id_Publicacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `Id_mensaje` int(11) NOT NULL,
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
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `Id_publicacion` int(11) NOT NULL,
  `mensaje` varchar(400) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `n_reacciones` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reacciones`
--

CREATE TABLE `reacciones` (
  `Id_reaccion` varchar(255) NOT NULL,
  `Nombre_Reaccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fotos_compartidas`
--
ALTER TABLE `fotos_compartidas`
  ADD PRIMARY KEY (`Id_Foto_Compartida`),
  ADD KEY `FK_TIPO_IDTYPEFOTO` (`Id_tipo_Foto`);

--
-- Indices de la tabla `foto_perfil`
--
ALTER TABLE `foto_perfil`
  ADD KEY `FK_PERFIL_IDPERFIL` (`Id_Perfil`),
  ADD KEY `FK_FOTO_IDFOTO` (`Id_Foto_Compartida`);

--
-- Indices de la tabla `foto_publicacion`
--
ALTER TABLE `foto_publicacion`
  ADD KEY `FK_IDFOTO` (`Id_Foto_Compartida`),
  ADD KEY `FK_PUBLICACION_IDPUBLIC` (`Id_Publicacion`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`Id_mensaje`),
  ADD KEY `FK_PERFIL_SALIDA` (`id_perfil_salida`),
  ADD KEY `FK_PERFIL_ENTRADA` (`id_perfil_entrada`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`),
  ADD KEY `FK_USUARIO_IDUSER` (`id_user`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`Id_publicacion`);

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
  MODIFY `Id_Foto_Compartida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `Id_mensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `Id_publicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fotos_compartidas`
--
ALTER TABLE `fotos_compartidas`
  ADD CONSTRAINT `FK_TIPO_IDTYPEFOTO` FOREIGN KEY (`Id_tipo_Foto`) REFERENCES `tipo_foto` (`Id_tipo_Foto`);

--
-- Filtros para la tabla `foto_perfil`
--
ALTER TABLE `foto_perfil`
  ADD CONSTRAINT `FK_FOTO_IDFOTO` FOREIGN KEY (`Id_Foto_Compartida`) REFERENCES `fotos_compartidas` (`Id_Foto_Compartida`),
  ADD CONSTRAINT `FK_PERFIL_IDPERFIL` FOREIGN KEY (`Id_Perfil`) REFERENCES `perfil` (`id_perfil`);

--
-- Filtros para la tabla `foto_publicacion`
--
ALTER TABLE `foto_publicacion`
  ADD CONSTRAINT `FK_IDFOTO` FOREIGN KEY (`Id_Foto_Compartida`) REFERENCES `fotos_compartidas` (`Id_Foto_Compartida`),
  ADD CONSTRAINT `FK_PUBLICACION_IDPUBLIC` FOREIGN KEY (`Id_Publicacion`) REFERENCES `publicaciones` (`Id_publicacion`);

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
  ADD CONSTRAINT `FK_USUARIO_IDUSER` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);

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
