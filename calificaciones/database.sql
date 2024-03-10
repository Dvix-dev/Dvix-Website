create database biblioteca;

use biblioteca;

CREATE TABLE `libros` (
  `id` int(11) NOT NULL auto_increment,
  `titulo` varchar(100) NOT NULL,
  `paginas` int(3) NOT NULL,
  `autor` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);