<?php
include_once 'conexao.php';
/*
$conexao->prepare("CREATE TABLE  `site1`.`tb_usuarios` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `senha` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;")->execute();

$conexao->prepare("CREATE TABLE `site1`.`tb_livros` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `titulo` varchar(100) NOT NULL,
    `autor` varchar(100) NOT NULL,
    `editora` varchar(100) NOT NULL,
    `ano` int(4) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;")->execute();
/*
$conexao->prepare("CREATE TABLE `site1`.`tb_meus_livros` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `id_usuario` int(11) NOT NULL,
    `id_livro` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;")->execute();
*/
    // `capa` varchar(100) NOT NULL,
$stmt = $conexao->prepare('SELECT * FROM tb_livros');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);
