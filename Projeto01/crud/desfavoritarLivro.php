<?php
session_start();
include_once 'conexao.php';
$livroId = $_GET['id'];
$usuarioId = $_SESSION['id'];


$stmt = $conexao->prepare("DELETE FROM tb_meus_livros WHERE livro_id = :id_livro usuario_id = :id_usuario");
$stmt->bindParam(':id_livro', $livroId);
$stmt->bindParam(':id_usuario', $usuarioId);
$stmt->execute();

header('Location: ../pages/painel.php');