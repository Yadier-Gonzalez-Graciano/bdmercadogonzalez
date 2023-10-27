create database `bdmercadoGonzalez`;

use `bdmercadoGonzalez`;

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,  
  PRIMARY KEY  (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `sucursales` (
  `id_sucursales` int(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `numempleados` varchar(100) NOT NULL,
  `numdepartamentos` varchar(100) NOT NULL,
  `suctel` varchar(100) NOT NULL,
  `cantidadproductos` int(2) NOT NULL,
  `tamanosuc` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
    PRIMARY KEY  (`id_sucursales`),
  CONSTRAINT FK_products_1
  FOREIGN KEY (id) REFERENCES usuarios(id)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;