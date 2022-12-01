CREATE DATABASE IF NOT EXISTS `Projeto01_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Projeto01_db`;

DROP TABLE IF EXISTS `Projeto01_db`.`tb_usuarios`;
CREATE TABLE  `Projeto01_db`.`tb_usuarios` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `senha` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Projeto01_db`.`tb_livros`;
CREATE TABLE `Projeto01_db`.`tb_livros` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `titulo` varchar(100) NOT NULL,
    `autor` varchar(100) NOT NULL,
    `editora` varchar(100) NOT NULL,
    `ano` int(4) NOT NULL,    
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Projeto01_db`.`tb_meus_livros`;
CREATE TABLE `Projeto01_db`.`tb_meus_livros` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `id_usuario` int(11) NOT NULL,
    `id_livro` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `id_usuario` (`id_usuario`),
    KEY `id_livro` (`id_livro`),
    CONSTRAINT `tb_meus_livros_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id`),
    CONSTRAINT `tb_meus_livros_ibfk_2` FOREIGN KEY (`id_livro`) REFERENCES `tb_livros` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
