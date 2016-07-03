-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 01-07-2016 a las 12:05:34
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `feligres`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `talmacen`
-- 

CREATE TABLE `talmacen` (
  `idalmacen` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estatus` char(1) default '1',
  PRIMARY KEY  (`idalmacen`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- Volcar la base de datos para la tabla `talmacen`
-- 

INSERT INTO `talmacen` VALUES (3, 'SANTISIMO', '', '1');
INSERT INTO `talmacen` VALUES (4, 'BAU', '', '1');
INSERT INTO `talmacen` VALUES (5, 'EEE', '', '1');
INSERT INTO `talmacen` VALUES (6, 'SDSDSDS', '', '1');
INSERT INTO `talmacen` VALUES (7, 'TE', '', '1');
INSERT INTO `talmacen` VALUES (8, 'LEWIS', '', '1');
INSERT INTO `talmacen` VALUES (9, 'JOTA', '', '1');
INSERT INTO `talmacen` VALUES (10, 'YA', 'YE', '1');
INSERT INTO `talmacen` VALUES (11, 'PERRO', 'GATO', '1');
INSERT INTO `talmacen` VALUES (12, 'CRA', 'CR', '1');
INSERT INTO `talmacen` VALUES (13, '', '', '1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tbautizo`
-- 

CREATE TABLE `tbautizo` (
  `nro_solicitud` int(11) NOT NULL,
  `estado_civil_pare` char(1) collate utf8_spanish2_ci NOT NULL,
  `estado_civil_madre` char(1) collate utf8_spanish2_ci NOT NULL,
  `nombre_madrina` varchar(40) collate utf8_spanish2_ci NOT NULL,
  `apellido_madria` varchar(40) collate utf8_spanish2_ci NOT NULL,
  `nombre_padrino` varchar(40) collate utf8_spanish2_ci NOT NULL,
  `apellido_padrino` varchar(40) collate utf8_spanish2_ci NOT NULL,
  `cedula_nino` char(12) character set utf8 NOT NULL,
  `cedula_padre` char(12) character set utf8 NOT NULL,
  `cedula_madre` char(12) character set utf8 NOT NULL,
  `partida_nacimiento` char(1) collate utf8_spanish2_ci NOT NULL,
  KEY `nro_solicitud` (`nro_solicitud`),
  KEY ` cedula_nino` (`cedula_nino`),
  KEY `cedula_padre` (`cedula_padre`),
  KEY `cedula_madre` (`cedula_madre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- 
-- Volcar la base de datos para la tabla `tbautizo`
-- 

INSERT INTO `tbautizo` VALUES (1, 'C', 'C', 'JUANA', 'GOYO', 'OSCAR', 'ROA', '10455541', '11455541', '12455541', '');
INSERT INTO `tbautizo` VALUES (4, 'C', 'C', 'HOLA', 'CHAO', 'CHAO', 'HOLA', '10455541', '11455541', '12455541', 'S');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tcomunion`
-- 

CREATE TABLE `tcomunion` (
  `nro_solicitud` int(11) NOT NULL,
  `cedula_nino` char(12) character set utf8 NOT NULL,
  `fe_bautizo` char(1) collate utf8_spanish2_ci NOT NULL,
  `cedula_padre` char(12) character set utf8 NOT NULL,
  `e_civil_padre` char(1) collate utf8_spanish2_ci NOT NULL,
  `fecha_mat_civ_padre` date NOT NULL,
  `fecha_mat_igl_padre` date NOT NULL,
  `cedula_madre` char(12) character set utf8 NOT NULL,
  `e_civil_madre` char(1) collate utf8_spanish2_ci NOT NULL,
  `fecha_mat_civ_madre` date NOT NULL,
  `fecha_mat_igl_madre` date NOT NULL,
  `nombre_madrina` varchar(40) collate utf8_spanish2_ci NOT NULL,
  `apellido_madrina` varchar(40) collate utf8_spanish2_ci NOT NULL,
  `nombre_padrino` varchar(40) collate utf8_spanish2_ci NOT NULL,
  `apellido_padrino` varchar(40) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`nro_solicitud`),
  KEY `cedula_nino` (`cedula_nino`),
  KEY `cedula_padre` (`cedula_padre`),
  KEY `cedula_madre` (`cedula_madre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- 
-- Volcar la base de datos para la tabla `tcomunion`
-- 

INSERT INTO `tcomunion` VALUES (2, '21455541', 'S', '22455541', 'C', '2006-07-08', '2013-05-22', '23455541', 'C', '2012-05-23', '2011-09-08', 'GEGEGEGEG', 'EGEGEGEQWGQWEG', 'EGEWGEWGWEG', 'EGEGEWGEG');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tconfirmacion`
-- 

CREATE TABLE `tconfirmacion` (
  `nro_solicitud` int(11) NOT NULL,
  `estudia_o_trabaja` char(1) collate utf8_spanish2_ci NOT NULL,
  `fe_bautismo` char(1) collate utf8_spanish2_ci NOT NULL,
  `cedula_c` char(12) character set utf8 NOT NULL,
  `cedula_madre` char(12) character set utf8 NOT NULL,
  `cedula_padre` char(12) character set utf8 NOT NULL,
  `nombre_madrina` varchar(40) collate utf8_spanish2_ci NOT NULL,
  `apellido_madrina` varchar(40) collate utf8_spanish2_ci NOT NULL,
  `nombre_padrino` varchar(40) collate utf8_spanish2_ci NOT NULL,
  `apellido_padrino` varchar(40) collate utf8_spanish2_ci NOT NULL,
  KEY `nro_solicitud` (`nro_solicitud`),
  KEY `cedula_c` (`cedula_c`),
  KEY `cedula_madre` (`cedula_madre`),
  KEY `cedula_padre` (`cedula_padre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- 
-- Volcar la base de datos para la tabla `tconfirmacion`
-- 

INSERT INTO `tconfirmacion` VALUES (3, 'T', 'S', '7544356', '9544356', '8544356', 'MARIANA', 'BALDOMERO', 'LUIS', 'CORTEZ');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tconstituir_grupo`
-- 

CREATE TABLE `tconstituir_grupo` (
  `id_constitucion` int(11) NOT NULL auto_increment,
  `id_grupo` int(11) NOT NULL,
  `fecha_constitucion` date NOT NULL,
  `observacion` varchar(255) collate utf8_spanish2_ci NOT NULL,
  `estatus` char(1) collate utf8_spanish2_ci NOT NULL default '1',
  `encargado` varchar(20) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id_constitucion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `tconstituir_grupo`
-- 

INSERT INTO `tconstituir_grupo` VALUES (4, 1, '2015-05-09', 'HOLA', '1', '');
INSERT INTO `tconstituir_grupo` VALUES (5, 2, '0000-00-00', 'DFGDFGDFGD', '1', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tconstituir_grupo_detalle`
-- 

CREATE TABLE `tconstituir_grupo_detalle` (
  `id_constitucion_grupo_detalle` int(11) NOT NULL auto_increment,
  `id_constituir_grupo` int(11) NOT NULL,
  `cedula_feligres` char(12) character set utf8 NOT NULL,
  PRIMARY KEY  (`id_constitucion_grupo_detalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `tconstituir_grupo_detalle`
-- 

INSERT INTO `tconstituir_grupo_detalle` VALUES (3, 4, '19455541');
INSERT INTO `tconstituir_grupo_detalle` VALUES (4, 5, '24145391');
INSERT INTO `tconstituir_grupo_detalle` VALUES (5, 5, '19902881');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tfeligres`
-- 

CREATE TABLE `tfeligres` (
  `idfeligres` int(11) NOT NULL auto_increment,
  `cedula` char(12) NOT NULL,
  `estatus` varchar(1) default '1',
  PRIMARY KEY  (`idfeligres`),
  UNIQUE KEY `cedula_UNIQUE` (`cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- 
-- Volcar la base de datos para la tabla `tfeligres`
-- 

INSERT INTO `tfeligres` VALUES (1, '19902881', '1');
INSERT INTO `tfeligres` VALUES (2, '19455541', '1');
INSERT INTO `tfeligres` VALUES (3, '20455541', '1');
INSERT INTO `tfeligres` VALUES (13, '10455541', '1');
INSERT INTO `tfeligres` VALUES (14, '11455541', '1');
INSERT INTO `tfeligres` VALUES (15, '12455541', '1');
INSERT INTO `tfeligres` VALUES (16, '21455541', '1');
INSERT INTO `tfeligres` VALUES (17, '22455541', '1');
INSERT INTO `tfeligres` VALUES (18, '23455541', '1');
INSERT INTO `tfeligres` VALUES (19, '7544356', '1');
INSERT INTO `tfeligres` VALUES (20, '8544356', '1');
INSERT INTO `tfeligres` VALUES (21, '9544356', '1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tgrupo`
-- 

CREATE TABLE `tgrupo` (
  `idgrupo` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) NOT NULL,
  `mision` varchar(45) NOT NULL,
  `vision` varchar(45) NOT NULL,
  `estatus` char(1) default '1',
  PRIMARY KEY  (`idgrupo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `tgrupo`
-- 

INSERT INTO `tgrupo` VALUES (1, '', 'PE', '', '1');
INSERT INTO `tgrupo` VALUES (2, 'CATECUMENOS', 'AA', 'DDD', '1');
INSERT INTO `tgrupo` VALUES (3, 'GRUP', 'LASLA', 'ALSLASL', '1');
INSERT INTO `tgrupo` VALUES (4, 'WEWE', '', '', '1');
INSERT INTO `tgrupo` VALUES (5, 'S', '', '', '1');
INSERT INTO `tgrupo` VALUES (6, 'SE', 'S', 'S', '1');
INSERT INTO `tgrupo` VALUES (7, '', '1', '1', '1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tlista`
-- 

CREATE TABLE `tlista` (
  `idlis` int(11) NOT NULL auto_increment,
  `nomlis` varchar(100) collate utf8_spanish2_ci NOT NULL,
  `estlis` int(11) NOT NULL,
  PRIMARY KEY  (`idlis`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `tlista`
-- 

INSERT INTO `tlista` VALUES (1, 'SEXO', 1);
INSERT INTO `tlista` VALUES (2, 'TIPO ADQUISICION', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tlistavalor`
-- 

CREATE TABLE `tlistavalor` (
  `idlisval` int(11) NOT NULL auto_increment,
  `idlis` int(11) NOT NULL,
  `deslis` varchar(100) collate utf8_spanish2_ci NOT NULL,
  `poslis` int(11) NOT NULL,
  `estlisval` int(11) NOT NULL,
  PRIMARY KEY  (`idlisval`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `tlistavalor`
-- 

INSERT INTO `tlistavalor` VALUES (1, 1, 'MASCULINO', 1, 1);
INSERT INTO `tlistavalor` VALUES (2, 1, 'FEMENINO', 1, 1);
INSERT INTO `tlistavalor` VALUES (3, 2, 'DONACION', 1, 1);
INSERT INTO `tlistavalor` VALUES (4, 2, 'COMPRA', 1, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tmodelo`
-- 

CREATE TABLE `tmodelo` (
  `id` int(11) NOT NULL auto_increment,
  `des` varchar(30) NOT NULL,
  `tipo` date NOT NULL,
  `nro` char(10) NOT NULL,
  `id_com` int(11) NOT NULL,
  `est` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Volcar la base de datos para la tabla `tmodelo`
-- 

INSERT INTO `tmodelo` VALUES (1, 'campo 1', '2016-06-02', 'on', 1, 0);
INSERT INTO `tmodelo` VALUES (2, 'campo 2', '2016-06-03', 'on', 2, 0);
INSERT INTO `tmodelo` VALUES (3, 'campo 3', '2010-06-01', 'on', 2, 1);
INSERT INTO `tmodelo` VALUES (4, '', '2016-06-03', '', 0, 1);
INSERT INTO `tmodelo` VALUES (5, 'campo 4', '2009-03-04', '0', 1, 1);
INSERT INTO `tmodelo` VALUES (6, '123sdasdasdsad', '2016-06-04', '1', 0, 1);
INSERT INTO `tmodelo` VALUES (7, '7445', '2016-06-13', '0', 2, 1);
INSERT INTO `tmodelo` VALUES (8, 'campo5', '2016-06-09', '1', 1, 1);
INSERT INTO `tmodelo` VALUES (9, 'campo6', '2016-06-09', '1', 1, 1);
INSERT INTO `tmodelo` VALUES (10, 'lewis', '2016-06-06', '1', 2, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tmodelocombo`
-- 

CREATE TABLE `tmodelocombo` (
  `id_com` int(11) NOT NULL auto_increment,
  `des` varchar(20) collate utf8_spanish2_ci NOT NULL,
  `id` int(11) NOT NULL,
  `est` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_com`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `tmodelocombo`
-- 

INSERT INTO `tmodelocombo` VALUES (1, 'valor combo1', 4, 1);
INSERT INTO `tmodelocombo` VALUES (2, 'valor combo 2', 3, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tmodelosacramento`
-- 

CREATE TABLE `tmodelosacramento` (
  `id_sacra` int(11) NOT NULL auto_increment,
  `nombre` varchar(20) collate utf8_spanish2_ci NOT NULL,
  `id` int(11) NOT NULL,
  `est` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_sacra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `tmodelosacramento`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tnoticia`
-- 

CREATE TABLE `tnoticia` (
  `id_noticia` int(11) NOT NULL auto_increment,
  `titulo_noticia` varchar(100) collate utf8_spanish2_ci NOT NULL,
  `contenido_noticia` text collate utf8_spanish2_ci NOT NULL,
  `fecha_noticia` datetime NOT NULL,
  `estatus` int(1) NOT NULL default '1',
  PRIMARY KEY  (`id_noticia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=17 ;

-- 
-- Volcar la base de datos para la tabla `tnoticia`
-- 

INSERT INTO `tnoticia` VALUES (10, 'HOLA ', 'COMO ESTAS PANA?<BR>', '2015-05-08 13:09:04', 1);
INSERT INTO `tnoticia` VALUES (11, 'CHAO', 'QUE LO QUE MENOL?<BR>', '2015-05-08 13:09:34', 1);
INSERT INTO `tnoticia` VALUES (12, 'ACTIVOS MIS FELIGRESES', 'MISA A LAS 12:00 AM <BR><BR>#ESTOYFELIZ<BR>#AQUIPROGRAMANDOELAREADENOTICIAS<BR>', '2015-05-08 13:11:12', 1);
INSERT INTO `tnoticia` VALUES (13, 'CURSO PARA APRENDER A SER UN ANGEL', '<OL><OL><OL><LI>SE LINDO CON TUS AMIGOS</LI><LI>COMPARTE TU DINERO CON LOS POBRES</LI></OL></OL></OL><DIV>#ESTOYFELIZ</DIV>', '2015-05-08 13:16:04', 1);
INSERT INTO `tnoticia` VALUES (14, 'HOLA QUE TAL', '<P><STRONG>FINO TODO BIEN</STRONG></P>\r\n\r\n<OL>\r\n	<LI><STRONG>CARLOS</STRONG></LI>\r\n	<LI><STRONG>VARGAS</STRONG></LI>\r\n</OL>\r\n', '2015-05-08 13:35:16', 1);
INSERT INTO `tnoticia` VALUES (15, 'CALIDAD', '<P>HOLA COMO ESTAS FINO CALIDAD</P>\r\n\r\n<UL>\r\n	<LI>UGHGHG</LI>\r\n	<LI>JKHJHJH</LI>\r\n	<LI>JHJHJ</LI>\r\n	<LI>JHJHJH</LI>\r\n	<LI>JJJHJH</LI>\r\n	<LI>KJKJKJ</LI>\r\n</UL>\r\n', '2015-05-08 13:37:22', 1);
INSERT INTO `tnoticia` VALUES (16, 'FUTBOL', '<P>MA&NTILDE;LANA TENEMOS UNA PARTIDA DE FUTBO</P>\r\n', '2016-06-05 20:46:56', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tparroco`
-- 

CREATE TABLE `tparroco` (
  `idparroco` int(11) NOT NULL auto_increment,
  `cedula` varchar(12) NOT NULL,
  `status` char(1) NOT NULL default '1',
  PRIMARY KEY  (`idparroco`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- Volcar la base de datos para la tabla `tparroco`
-- 

INSERT INTO `tparroco` VALUES (1, '19455541', '1');
INSERT INTO `tparroco` VALUES (2, '', '1');
INSERT INTO `tparroco` VALUES (3, '24145', '1');
INSERT INTO `tparroco` VALUES (4, '24145391', '1');
INSERT INTO `tparroco` VALUES (5, 'wdfwf', '1');
INSERT INTO `tparroco` VALUES (6, '24019450', '1');
INSERT INTO `tparroco` VALUES (7, '8585', '1');
INSERT INTO `tparroco` VALUES (8, '7090', '1');
INSERT INTO `tparroco` VALUES (9, '5954780', '1');
INSERT INTO `tparroco` VALUES (10, 'sdsd', '1');
INSERT INTO `tparroco` VALUES (11, '5958', '1');
INSERT INTO `tparroco` VALUES (12, '123', '1');
INSERT INTO `tparroco` VALUES (13, '20', '1');
INSERT INTO `tparroco` VALUES (14, '2020', '1');
INSERT INTO `tparroco` VALUES (15, '123456789', '1');
INSERT INTO `tparroco` VALUES (16, '456789', '1');
INSERT INTO `tparroco` VALUES (17, '321', '1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tpersona`
-- 

CREATE TABLE `tpersona` (
  `cedula` char(12) NOT NULL,
  `nombre` varchar(45) default NULL,
  `apellido` varchar(45) default NULL,
  `sexo` char(1) default NULL,
  `telefono` varchar(45) default NULL,
  `correo` varchar(45) default NULL,
  `direccion` varchar(45) default NULL,
  `edad` varchar(30) NOT NULL,
  `hermanos` varchar(10) NOT NULL,
  `nacimiento` varchar(100) NOT NULL,
  `idcomunidad` int(11) NOT NULL,
  `fecha` varchar(12) NOT NULL,
  `estatus` char(1) NOT NULL default '1',
  PRIMARY KEY  (`cedula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tpersona`
-- 

INSERT INTO `tpersona` VALUES ('19455542', 'PETR', 'VARGAS', 'M', '04160984343', 'CARLOS-VARGAS2011@HOTMAIL.COM', 'URB SAN JOSE II', '4', 'BARQUISIME', '', 0, '09/01/1991', '1');
INSERT INTO `tpersona` VALUES ('19902881', 'EMILY', 'CHIRINOS', 'F', '04160984343', 'EMILY_CHIRINOS@GMAIL.COM', 'BARRIO LA BATALLA', '24', '2', 'ACARIGUA', 0, '1991-02-08', '1');
INSERT INTO `tpersona` VALUES ('20455541', 'ALBERTO', 'VARGAS', 'M', '04165895415', 'ALBERTO@GMAIL.COM', 'DVKJHDKJHV', '24 AñOS', '4', 'LARA', 0, '15/01/1991', '1');
INSERT INTO `tpersona` VALUES ('10455541', 'JULIO', 'GARCIA', 'M', '', '', '', '', '', 'YARACUY', 0, '1999-09-09', '1');
INSERT INTO `tpersona` VALUES ('11455541', 'MARCOS', 'PALENCIA', '', '', '', '', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('12455541', 'MARIANA', 'TOVAR', '', '', '', '', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('21455541', 'ROGER', 'BASTIDAS', 'M', '', '', '', '', '20', 'SAN PABLO', 0, '1991-01-01', '1');
INSERT INTO `tpersona` VALUES ('22455541', 'CARLOS', 'TOVAR', 'M', '02556432123', '', 'EFEFGEFEEG', '', '20', 'SAN PABLO', 0, '1991-01-01', '1');
INSERT INTO `tpersona` VALUES ('23455541', 'EGEGEGEGEGEGEGEG', 'EGEGEGEGEGEG', 'M', '02556432123', '', 'EGAGEGGEG', '', '20', 'SAN PABLO', 0, '1991-01-01', '1');
INSERT INTO `tpersona` VALUES ('7544356', 'LUIS', 'FERNANDEZ', 'M', '0255456765', 'LUISFER@GMAIL.COM', 'URB LOS PRADOS', '24', '', 'en el hospital donde mas', 0, '1991-09-09', '1');
INSERT INTO `tpersona` VALUES ('8544356', 'MARIO', 'LOPEZ', '', '', '', '', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('9544356', 'LUISA', 'RODRIGUEZ', '', '', '', '', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('', 'JOSUE', '', 'm', '', '', '', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('wdfwf', '', '', '', '', '', '', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('24019450', 'nestor', 'infante', 'm', '04223', 'nestorlinfante@gmail.com', 'acarigua', '', '', '', 0, '', '0');
INSERT INTO `tpersona` VALUES ('8585', '', '', '', '', '', '', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('7090', '', '', '', '', '', '', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('5954780', 'jsj', 'sjsjj', 'm', '05412', 'sdjjshdkj', 'sjdjsd', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('sdsd', '', '', '', '', '', '', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('5958', '', '', '', '', '', '', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('123', '', '', '', '', '', '', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('20', '', '', '', '', '', '', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('2020', '', '', '', '', '', '', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('123456789', 'paco', 'perez', 'm', '02452298578', 'lhlfgdf@gmail.com', 'bellas', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('456789', 'titu', 'perez', 'm', '04245229570', 'ljlb', 'bella', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('78910', 'POPO', '', '', '', '', '', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('7654', 'PEP', 'JOTA', 'M', '04245229570', 'ljlb', 'WJFLK', '5', '2', '06/25/2016', 0, '', '1');
INSERT INTO `tpersona` VALUES ('321', 'lele', 'leli', 'm', '035353', '1325', '1ddf', '', '', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('741', 'JOSUE', 'BETANCOURT', '2', '04245229570', 'ljlb_1995@hotmail.com', 'BELLAS ARTE', '2', '11/09/1995', '', 0, '', '1');
INSERT INTO `tpersona` VALUES ('852', 'LKJKHJF', 'GMFYNDRD', '2', '042564', 'kvsdfhgg', 'HJHFHVCGFDG', '2', '06/21/2016', '', 0, '', '1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tproveedor`
-- 

CREATE TABLE `tproveedor` (
  `idproveedor` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `rif` varchar(12) default NULL,
  `razonsocial` varchar(1) default NULL,
  `telefono` varchar(45) default NULL,
  `correo` varchar(45) default NULL,
  `direccion` varchar(100) default NULL,
  `estatus` char(1) NOT NULL default '1',
  PRIMARY KEY  (`idproveedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `tproveedor`
-- 

INSERT INTO `tproveedor` VALUES (1, '', '24655', '', '', '', '', '1');
INSERT INTO `tproveedor` VALUES (2, 'JOSE', '24654', 'D', '', '', '556456', '1');
INSERT INTO `tproveedor` VALUES (3, 'COPOA', 'J343', 'C', '333', 'CC', '33', '1');
INSERT INTO `tproveedor` VALUES (4, 'PROPATRIA', 'J4545', 'D', '02445', 'PROPATETRI@GMAIL.COM', 'PROA AV', '1');
INSERT INTO `tproveedor` VALUES (5, 'AB', 'D', 'D', '', '3', 'Q', '1');
INSERT INTO `tproveedor` VALUES (6, 'PREUBAD', 'J3483411', 'P', '394934', 'PRUEBAD', 'PRUEBAD', '1');
INSERT INTO `tproveedor` VALUES (7, 'JULIANA', '', '', '', '', '', '1');
INSERT INTO `tproveedor` VALUES (8, 'W', '2222222', '2', '', '2222222222222', 'WWWWWWW', '1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tsacramento`
-- 

CREATE TABLE `tsacramento` (
  `idsacramento` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `mision` varchar(100) NOT NULL,
  `vision` varchar(100) NOT NULL,
  `estatus` char(1) default '1',
  PRIMARY KEY  (`idsacramento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `tsacramento`
-- 

INSERT INTO `tsacramento` VALUES (1, '', 'HOLA', '', '1');
INSERT INTO `tsacramento` VALUES (2, 'FFGFGDFG', '', '', '1');
INSERT INTO `tsacramento` VALUES (3, '', 'JIJI', '', '1');
INSERT INTO `tsacramento` VALUES (4, 'AS', 'JEJJ', 'S', '1');
INSERT INTO `tsacramento` VALUES (5, 'LEWISJ', '', '', '1');
INSERT INTO `tsacramento` VALUES (6, 'SDASXCXC', 'DSDFSD', 'SDCSD', '1');
INSERT INTO `tsacramento` VALUES (7, 'JOSUE', 'PEDRO', 'DFKJNFKJ', '1');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tsolicitud_sacramento`
-- 

CREATE TABLE `tsolicitud_sacramento` (
  `nro_solicitud` int(11) NOT NULL,
  `fecha_hora_solicitud` datetime NOT NULL,
  `tipo_sacramento` int(11) NOT NULL,
  `fecha_hora_sacramento` datetime NOT NULL,
  `parroco` char(12) collate utf8_spanish2_ci NOT NULL,
  `estatus` int(1) NOT NULL default '1',
  PRIMARY KEY  (`nro_solicitud`),
  KEY `tipo_sacramento` (`tipo_sacramento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- 
-- Volcar la base de datos para la tabla `tsolicitud_sacramento`
-- 

INSERT INTO `tsolicitud_sacramento` VALUES (1, '2015-05-09 15:05:01', 1, '2015-05-16 14:05:23', '', 1);
INSERT INTO `tsolicitud_sacramento` VALUES (2, '2015-05-09 22:05:36', 2, '2015-05-31 21:05:00', '', 1);
INSERT INTO `tsolicitud_sacramento` VALUES (3, '2015-05-14 17:05:37', 3, '2015-05-31 23:05:42', '', 1);
INSERT INTO `tsolicitud_sacramento` VALUES (4, '2015-05-09 12:05:14', 1, '2015-05-29 16:05:17', '19455541', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuario`
-- 

CREATE TABLE `usuario` (
  `Usuario` varchar(50) NOT NULL,
  `Clave` varchar(50) NOT NULL,
  `Nivel` varchar(20) NOT NULL,
  `IdUsuario` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`IdUsuario`),
  UNIQUE KEY `Usuario` (`Usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- 
-- Volcar la base de datos para la tabla `usuario`
-- 

INSERT INTO `usuario` VALUES ('admin', '1234', 'Administrador', 17);
INSERT INTO `usuario` VALUES ('secretaria', '12345', 'Secretaria', 18);
INSERT INTO `usuario` VALUES ('feligres', '12345', 'Feligres', 19);
INSERT INTO `usuario` VALUES ('wilson', '12', 'Administrador', 20);
INSERT INTO `usuario` VALUES ('administrador', '1234', 'Administrador', 21);

-- 
-- Filtros para las tablas descargadas (dump)
-- 

-- 
-- Filtros para la tabla `tbautizo`
-- 
ALTER TABLE `tbautizo`
  ADD CONSTRAINT `tbautizo_ibfk_5` FOREIGN KEY (`nro_solicitud`) REFERENCES `tsolicitud_sacramento` (`nro_solicitud`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbautizo_ibfk_7` FOREIGN KEY (`cedula_padre`) REFERENCES `tfeligres` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbautizo_ibfk_8` FOREIGN KEY (`cedula_madre`) REFERENCES `tfeligres` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbautizo_ibfk_9` FOREIGN KEY (`cedula_nino`) REFERENCES `tfeligres` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Filtros para la tabla `tcomunion`
-- 
ALTER TABLE `tcomunion`
  ADD CONSTRAINT `tcomunion_ibfk_1` FOREIGN KEY (`cedula_nino`) REFERENCES `tfeligres` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tcomunion_ibfk_2` FOREIGN KEY (`cedula_padre`) REFERENCES `tfeligres` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tcomunion_ibfk_3` FOREIGN KEY (`cedula_madre`) REFERENCES `tfeligres` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tcomunion_ibfk_4` FOREIGN KEY (`nro_solicitud`) REFERENCES `tsolicitud_sacramento` (`nro_solicitud`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Filtros para la tabla `tconfirmacion`
-- 
ALTER TABLE `tconfirmacion`
  ADD CONSTRAINT `tconfirmacion_ibfk_2` FOREIGN KEY (`cedula_c`) REFERENCES `tfeligres` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tconfirmacion_ibfk_3` FOREIGN KEY (`cedula_madre`) REFERENCES `tfeligres` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tconfirmacion_ibfk_4` FOREIGN KEY (`cedula_padre`) REFERENCES `tfeligres` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tconfirmacion_ibfk_5` FOREIGN KEY (`nro_solicitud`) REFERENCES `tsolicitud_sacramento` (`nro_solicitud`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Filtros para la tabla `tsolicitud_sacramento`
-- 
ALTER TABLE `tsolicitud_sacramento`
  ADD CONSTRAINT `tsolicitud_sacramento_ibfk_1` FOREIGN KEY (`tipo_sacramento`) REFERENCES `tsacramento` (`idsacramento`) ON DELETE NO ACTION ON UPDATE NO ACTION;
