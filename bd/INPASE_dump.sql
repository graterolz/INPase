-- productoras
/*
DROP TABLE IF EXISTS `productora`;
CREATE TABLE IF NOT EXISTS `productora` (
	`idprod` int(10) AUTO_INCREMENT NOT NULL,
	`nombre_emp` varchar(50) NOT NULL,
	`direccion` varchar(50) NOT NULL,
	`telefono_emp` varchar(50) NOT NULL,
	`web` varchar(50) NOT NULL,
	`email_emp` varchar(50) NOT NULL,
	`nombre_resp` varchar(50) NOT NULL,
	`email_resp` varchar(50) NOT NULL,
	`telefono_resp` varchar(50) NOT NULL,
	`user` varchar(50) NOT NULL,
	`pass` varchar(50) NOT NULL,
	`fecha_registro` datetime NOT NULL,
	`fecha_edicion` datetime NOT NULL,
	`estado_registro` int(1) NOT NULL,
	PRIMARY KEY (`idprod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `productora`
(`idprod`, `nombre_emp`, `direccion`, `telefono_emp`, `web`, `email_emp`, `nombre_resp`, `email_resp`, `telefono_resp`, `user`, `pass`, `fecha_registro`, `fecha_edicion`, `estado_registro`) VALUES
(NULL, 'Empresa 1', 'empresa1@inpase.com', '999999999', 'S/I', 'S/I', 'Emilio Graterol', 'ejgraterolz@gmail.com', '999999999', 'admin', 'admin', NOW(), NOW(), 1);
*/

-- usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
	`idusu` int(10) AUTO_INCREMENT NOT NULL,
	`idrol` varchar(4) NOT NULL,
	`user` varchar(50) NOT NULL,
	`pass` varchar(50) NOT NULL,
	`fecha_registro` datetime NOT NULL,
	`fecha_edicion` datetime NOT NULL,
	`estado_registro` int(1) NOT NULL,
	PRIMARY KEY (`idusu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `usuario`
(`idusu`, `idrol`, `user`, `pass`, `fecha_registro`, `fecha_edicion` ,`estado_registro`) VALUES
(NULL, 'ADM', 'admin', 'admin', NOW(), NOW(), 1),
(NULL, 'ORGA', 'user1', 'user1', NOW(), NOW(), 1),
(NULL, 'VEND', 'user2', 'user2', NOW(), NOW(), 1),
(NULL, 'PORT', 'user3', 'user3', NOW(), NOW(), 1),
(NULL, 'VEND', 'user4', 'user4', NOW(), NOW(), 1),
(NULL, 'VEND', 'user5', 'user5', NOW(), NOW(), 1);

-- usuario_vendedor
DROP TABLE IF EXISTS `usuario_rol`;
CREATE TABLE IF NOT EXISTS `usuario_rol` (
	`idusu` int(10) NOT NULL,
	`idrol` varchar(4) NOT NULL,
	`nombre` varchar(50) NOT NULL,
	`apellido` varchar(50) NOT NULL,
	`telefono` varchar(50) NOT NULL,
	`direccion` varchar(50) NOT NULL,
	`email` varchar(50) NOT NULL,
	`facebook` varchar(50) NOT NULL,
	`twitter` varchar(50) NOT NULL,
	`url_foto` varchar(50) NOT NULL,
	`fecha_registro` datetime NOT NULL,
	`fecha_edicion` datetime NOT NULL,
	`estado_registro` int(1) NOT NULL,
	PRIMARY KEY (`idusu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `usuario_rol`
(`idusu`, `idrol`, `nombre`, `apellido`, `telefono`, `direccion`, `email`, `facebook`, `twitter`, `url_foto`, `fecha_registro`, `fecha_edicion`, `estado_registro`) VALUES
(3, 'VEND', 'Vendedor', '#1', '999999999', 'Direccion 1.', 'vendedor1@inpase.com', '@vendedor1', '@vendedor1', '.', NOW(), NOW(), 1),
(5, 'VEND', 'Vendedor', '#2', '999999999', 'Direccion 1.', 'vendedor2@inpase.com', '@vendedor2', '@vendedor2', '.', NOW(), NOW(), 1),
(6, 'VEND', 'Vendedor', '#3', '999999999', 'Direccion 1.', 'vendedor3@inpase.com', '@vendedor3', '@vendedor3', '.', NOW(), NOW(), 1),
(4, 'PORT', 'Portero', '#1', '999999999', 'Direccion 1.', 'portero1@inpase.com', '@portero1', '@portero1', '.', NOW(), NOW(), 1);

-- Constraints
-- ALTER TABLE `usuario_vendedor` DROP FOREIGN KEY `usuario_fk`;
-- ALTER TABLE `usuario_vendedor` ADD CONSTRAINT `usuario_fk` FOREIGN KEY (`idusu`) REFERENCES `usuario` (`idusu`) ON DELETE CASCADE ON UPDATE CASCADE; 

-- evento
DROP TABLE IF EXISTS `evento`;
CREATE TABLE IF NOT EXISTS `evento` (
	`ideve` int(10) AUTO_INCREMENT NOT NULL,
	`idprod` int(10) NOT NULL,
	`nombre` varchar(50) NOT NULL,
	`lugar` varchar(50) NOT NULL,
	`fecha` datetime  NOT NULL,	
	`limite_emision` int(10) NOT NULL,
	`fecha_registro` datetime NOT NULL,
	`fecha_edicion` datetime NOT NULL,
	`estado_registro` int(1) NOT NULL,
	PRIMARY KEY (`ideve`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `evento`
(`ideve`, `idprod`, `nombre`, `lugar`, `fecha`, `limite_emision`, `fecha_registro`, `fecha_edicion`, `estado_registro`) VALUES
(NULL, 1, 'Evento 1', 'Centro', NOW(), 24, NOW(), NOW(), 1),
(NULL, 1, 'Evento 2', 'Centro', NOW(), 24, NOW(), NOW(), 1),
(NULL, 1, 'Evento 3', 'Centro', NOW(), 24, NOW(), NOW(), 1);

-- vendedor_evento
DROP TABLE IF EXISTS `evento_vendedor`;
CREATE TABLE IF NOT EXISTS `evento_vendedor` (
	`ideveve` int(10) AUTO_INCREMENT NOT NULL,
	`ideve` int(10) NOT NULL,
	`idusu` int(10) NOT NULL,
	`fecha_registro` datetime NOT NULL,
	`fecha_edicion` datetime NOT NULL,
	`estado_registro` int(1) NOT NULL,
	PRIMARY KEY (`ideveve`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `evento_vendedor`
(`ideveve`, `ideve`, `idusu`, `fecha_registro`, `fecha_edicion`, `estado_registro`) VALUES
(NULL, 1, 3, NOW(), NOW(), 1),
(NULL, 2, 3, NOW(), NOW(), 1),
(NULL, 1, 5, NOW(), NOW(), 1),
(NULL, 1, 4, NOW(), NOW(), 1);

-- evento_usuario
/*DROP TABLE IF EXISTS `evento_portero`;
CREATE TABLE IF NOT EXISTS `evento_portero` (
	`idevepo` int(10) AUTO_INCREMENT NOT NULL,
	`ideve` int(10) NOT NULL,
	`idusu` int(10) NOT NULL,
	`fecha_registro` datetime NOT NULL,
	`fecha_edicion` datetime NOT NULL,
	`estado_registro` int(1) NOT NULL,
	PRIMARY KEY (`idevepo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `evento_portero`
(`idevepo`, `ideve`, `idusu`, `fecha_registro`, `fecha_edicion`, `estado_registro`) VALUES
(NULL, 1, 4, NOW(), NOW(), 1);*/

-- evento_tipo_entrada
DROP TABLE IF EXISTS `evento_tipo_entrada`;
CREATE TABLE IF NOT EXISTS `evento_tipo_entrada` (
	`idevete` int(10) AUTO_INCREMENT,
	`ideve` int(10) NOT NULL,
	`descripcion` varchar(50) NOT NULL,
	`precio` int(10) NOT NULL,
	`cantidad` int(10) NOT NULL,
	`fecha_registro` datetime NOT NULL,
	`fecha_edicion` datetime NOT NULL,
	`estado_registro` int(1) NOT NULL,
	PRIMARY KEY (`idevete`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `evento_tipo_entrada`
(`idevete`, `ideve`, `descripcion`, `precio`, `cantidad`, `fecha_registro`, `fecha_edicion`, `estado_registro`) VALUES
(NULL, 1, 'Pagos', 100, 100, NOW(), NOW(), 1),
(NULL, 1, 'Gratis', 200, 100, NOW(), NOW(), 1),
(NULL, 1, 'Gratis con Horario', 300, 100, NOW(), NOW(), 1),
(NULL, 2, 'Pagos con Consumición', 250, 100, NOW(), NOW(), 1),
(NULL, 2, 'Hombres', 100, 100, NOW(), NOW(), 1),
(NULL, 2, 'Mujeres', 150, 100, NOW(), NOW(), 1);

-- evento_tipo_entrada_vendedor
DROP TABLE IF EXISTS `evento_tipo_entrada_vendedor`;
CREATE TABLE IF NOT EXISTS `evento_tipo_entrada_vendedor` (
	`ideveteve` int(10) AUTO_INCREMENT,
	`ideveve` int(10) NOT NULL,
	`idevete` int(10) NOT NULL,
	`cantidad_entrada` int(10) NOT NULL,
	`fecha_registro` datetime NOT NULL,
	`fecha_edicion` datetime NOT NULL,
	`estado_registro` int(1) NOT NULL,
	PRIMARY KEY (`ideveteve`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `evento_tipo_entrada_vendedor`
(`ideveteve`, `ideveve`, `idevete`, `cantidad_entrada`, `fecha_registro`, `fecha_edicion`, `estado_registro`) VALUES
(NULL, 1, 1, 200, NOW(), NOW(), 1),
(NULL, 1, 2, 100, NOW(), NOW(), 1),
(NULL, 1, 3, 150, NOW(), NOW(), 1),
(NULL, 2, 2, 50, NOW(), NOW(), 1);

-- evento_entrada
DROP TABLE IF EXISTS `evento_entrada`;
CREATE TABLE IF NOT EXISTS `evento_entrada` (
	`ident` int(10) AUTO_INCREMENT,
	/*`ideveve` int(10) NOT NULL,*/
	`ideveteve` int(10) NOT NULL,
	`nombre_comprador` varchar(50) NOT NULL,
	`email_comprador` varchar(50) NOT NULL,
	/*precio_entrada*/
	`estado_entrada` varchar(50) NOT NULL,
	`fecha_registro` datetime NOT NULL,
	`fecha_edicion` datetime NOT NULL,
	`estado_registro` int(1) NOT NULL,
	PRIMARY KEY (`ident`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `evento_entrada`
(`ident`, `ideveteve`, `nombre_comprador`, `email_comprador`, `estado_entrada`, `fecha_registro`, `fecha_edicion`, `estado_registro`) VALUES
(NULL, 1, 'Pedro Q.','demo@demo.com', 'VENDIDA', NOW(), NOW(), 1),
(NULL, 1, 'Carlos M.','demo@demo.com', 'VENDIDA', NOW(), NOW(), 1),
(NULL, 4, 'Andres P.','demo@demo.com', 'VENDIDA', NOW(), NOW(), 1),
(NULL, 4, 'Carla M.','demo@demo.com', 'VENDIDA', NOW(), NOW(), 1);