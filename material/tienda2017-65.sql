-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-03-2017 a las 09:42:08
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda2017`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcaracteristica`
--

CREATE TABLE IF NOT EXISTS `tblcaracteristica` (
  `idCaracteristica` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(150) NOT NULL,
  `refPadre` int(11) NOT NULL,
  `intEstado` int(11) NOT NULL,
  `intOrden` int(11) NOT NULL,
  PRIMARY KEY (`idCaracteristica`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `tblcaracteristica`
--

INSERT INTO `tblcaracteristica` (`idCaracteristica`, `strNombre`, `refPadre`, `intEstado`, `intOrden`) VALUES
(1, 'Motor', 0, 1, 1),
(2, 'Cilindrada', 0, 1, 2),
(3, 'Tipo Retrovisor', 0, 1, 3),
(4, 'Cambio de marchas', 0, 1, 4),
(5, 'Automático', 4, 1, 1),
(6, 'Manual', 4, 1, 2),
(7, '200CV', 2, 1, 1),
(8, '300CV', 2, 1, 2),
(9, '400CV', 2, 1, 3),
(10, '500CV', 2, 1, 4),
(11, '1200CV', 2, 1, 5),
(12, 'Diesel', 1, 1, 1),
(13, 'Gasolina', 1, 1, 2),
(14, 'GLP', 1, 1, 3),
(15, 'Standard', 3, 1, 1),
(16, 'Guía láser', 3, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcategoria`
--

CREATE TABLE IF NOT EXISTS `tblcategoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `intEstado` int(11) NOT NULL,
  `refPadre` int(11) NOT NULL,
  `intOrden` int(11) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `tblcategoria`
--

INSERT INTO `tblcategoria` (`idCategoria`, `strNombre`, `intEstado`, `refPadre`, `intOrden`) VALUES
(1, 'Baratos', 1, 0, 1),
(3, 'Outlet', 1, 0, 2),
(4, 'Rápidos', 1, 0, 54),
(5, 'Último modelo', 1, 0, 22222),
(6, 'Volante a la izquierda', 1, 1, 2),
(11, 'Volante a la derecha', 1, 1, 2),
(12, 'Coche Japonés', 1, 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblconfiguracion`
--

CREATE TABLE IF NOT EXISTS `tblconfiguracion` (
  `idConfiguracion` int(11) NOT NULL AUTO_INCREMENT,
  `strTelefono` varchar(50) NOT NULL,
  `strEmail` varchar(50) NOT NULL,
  `strLogo` varchar(50) NOT NULL,
  `intMarcas` int(11) NOT NULL,
  PRIMARY KEY (`idConfiguracion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tblconfiguracion`
--

INSERT INTO `tblconfiguracion` (`idConfiguracion`, `strTelefono`, `strEmail`, `strLogo`, `intMarcas`) VALUES
(1, '+34 654987654', 'jorvidu@gmail.com', 'logo.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmarca`
--

CREATE TABLE IF NOT EXISTS `tblmarca` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `strMarca` varchar(50) NOT NULL,
  `intOrden` int(11) NOT NULL,
  `intEstado` int(11) NOT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tblmarca`
--

INSERT INTO `tblmarca` (`idMarca`, `strMarca`, `intOrden`, `intEstado`) VALUES
(1, 'Peugeot X', 1, 1),
(2, 'Opel', 2, 1),
(3, 'Mercedes', 3, 1),
(4, 'Saab', 4, 1),
(5, 'BMW', 5, 1),
(6, 'Ferrari 23', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblopcion`
--

CREATE TABLE IF NOT EXISTS `tblopcion` (
  `idOpcion` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `refPadre` int(11) NOT NULL DEFAULT '0',
  `intEstado` int(11) NOT NULL,
  `intOrden` int(11) NOT NULL,
  `dblIncremento` double(8,2) NOT NULL,
  PRIMARY KEY (`idOpcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tblopcion`
--

INSERT INTO `tblopcion` (`idOpcion`, `strNombre`, `refPadre`, `intEstado`, `intOrden`, `dblIncremento`) VALUES
(1, 'Color', 0, 1, 1, 0.00),
(2, 'Número de Puertas', 0, 1, 10000, 0.00),
(3, 'Rojo 2', 1, 1, 1, 1.99),
(4, 'Azul', 1, 1, 2, 0.00),
(5, '3', 2, 1, 1, 1000.00),
(6, '5', 2, 1, 2, 1500.00),
(7, 'Plateado', 1, 1, 3, 100.00),
(8, 'Color Opel', 0, 1, 1, 0.00),
(9, 'Gris Opel', 8, 1, 1, 0.00),
(10, 'Beige Opel', 8, 1, 2, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproducto`
--

CREATE TABLE IF NOT EXISTS `tblproducto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `refCategoria1` int(11) NOT NULL,
  `strImagen1` varchar(50) DEFAULT NULL,
  `strDescripcion` text NOT NULL,
  `dblPrecio` double(8,2) NOT NULL,
  `intEstado` int(11) NOT NULL,
  `refMarca` int(11) NOT NULL,
  `refCategoria2` int(11) NOT NULL,
  `refCategoria3` int(11) NOT NULL,
  `refCategoria4` int(11) NOT NULL,
  `refCategoria5` int(11) NOT NULL,
  `strImagen2` varchar(50) DEFAULT NULL,
  `strImagen3` varchar(50) DEFAULT NULL,
  `strImagen4` varchar(50) DEFAULT NULL,
  `strImagen5` varchar(50) DEFAULT NULL,
  `intPrincipal` int(11) NOT NULL DEFAULT '0',
  `intStock` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tblproducto`
--

INSERT INTO `tblproducto` (`idProducto`, `strNombre`, `refCategoria1`, `strImagen1`, `strDescripcion`, `dblPrecio`, `intEstado`, `refMarca`, `refCategoria2`, `refCategoria3`, `refCategoria4`, `refCategoria5`, `strImagen2`, `strImagen3`, `strImagen4`, `strImagen5`, `intPrincipal`, `intStock`) VALUES
(1, 'Opel África', 1, 'coche1.jpg', '<p>Coche grande y espacioso</p>', 9800.00, 1, 2, 6, 0, 0, 0, NULL, NULL, NULL, NULL, 1, 8),
(2, 'Seat América', 1, '', 'Coche muy espacioso', 8100.00, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, 10),
(3, '867', 1, NULL, '87', 87.00, 1, 5, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, 10),
(4, 'xxxx', 1, NULL, '<p>xscwecfwef</p>', 234.00, 1, 6, 6, 3, 0, 0, NULL, NULL, NULL, NULL, 0, 10),
(5, 'Peugueot Frontera', 1, 'coche2.jpg', '<p>Coche muy interesante</p>', 5600.00, 1, 1, 6, 0, 0, 0, NULL, 'sale.png', 'new.png', NULL, 1, 10),
(6, 'Cabriolo', 1, 'coche4.jpg', '<p>Potencia sin control</p>', 50000.00, 1, 6, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 1, 10),
(7, 'f2e', 1, NULL, 'f2f', 24.00, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, 10),
(8, 'Mercedes Calixto', 1, 'coche3.jpg', '<p>Escribir Descripci&oacute;n</p>', 20000.00, 1, 3, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 1, 10),
(9, 'Seat América', 11, NULL, '<p>Coche muy espacioso</p>', 125.00, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, 10),
(10, 'Seat África', 6, '0', '<p>Coche grande y espacioso</p>', 123.00, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductocaracteristica`
--

CREATE TABLE IF NOT EXISTS `tblproductocaracteristica` (
  `idProductocaracteristica` int(11) NOT NULL AUTO_INCREMENT,
  `refProducto` int(11) NOT NULL,
  `refCaracteristica` int(11) NOT NULL,
  `refSeleccionada` int(11) NOT NULL,
  PRIMARY KEY (`idProductocaracteristica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductoopcion`
--

CREATE TABLE IF NOT EXISTS `tblproductoopcion` (
  `idProductoOpcion` int(11) NOT NULL AUTO_INCREMENT,
  `refProducto` int(11) NOT NULL,
  `refOpcion` int(11) NOT NULL,
  PRIMARY KEY (`idProductoOpcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tblproductoopcion`
--

INSERT INTO `tblproductoopcion` (`idProductoOpcion`, `refProducto`, `refOpcion`) VALUES
(6, 1, 2),
(7, 2, 1),
(8, 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

CREATE TABLE IF NOT EXISTS `tblusuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `strEmail` varchar(50) NOT NULL,
  `strPassword` varchar(50) NOT NULL,
  `strNombre` varchar(30) NOT NULL,
  `intNivel` int(11) NOT NULL DEFAULT '0',
  `intEstado` int(11) NOT NULL DEFAULT '1',
  `strImagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `strEmail` (`strEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `tblusuario` (`idUsuario`, `strEmail`, `strPassword`, `strNombre`, `intNivel`, `intEstado`, `strImagen`) VALUES
(1, 'sdfrrdsf@333fsd.com', '26fe0cdfe99bfa306e31733c4e2b17dc', 'Pepe López', 0, 1, 'face2.jpg'),
(2, 'jorvidu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Jorge', 1, 1, ''),
(3, 'wdfdes@fsdf.com', '42be65bff2c5725e883a43de69147c85', '0980', 10, 1, ''),
(4, '345345@dsgftd.comn', 'a06cef7b78ecfb2461fe6ab2ac847fa0', '876', 100, 1, ''),
(5, 'publico@fsdf.com', '4ede4fbf6e52d6dd0f25ad91c016db82', '098', 0, 1, NULL),
(6, 'dksjf@sdfdsf.com', 'df6d2338b2b8fce1ec2f6dda0a630eb0', 'Luis José', 0, 1, 'facerisas.jpg'),
(8, 'wefwf', '5f9a177892f1e4ecb3484ba5a82fb813', 'fewfe', 0, 1, NULL),
(9, 'ergerg@dsfgf.com', '92daa86ad43a42f28f4bf58e94667c95', '09u', 0, 1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
