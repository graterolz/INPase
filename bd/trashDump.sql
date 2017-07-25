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