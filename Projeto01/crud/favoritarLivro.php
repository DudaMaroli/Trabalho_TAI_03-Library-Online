<?php
session_start();
include_once 'conexao.php';
var_dump($_GET);
if (isset($_GET['livroId'], $_GET['action'], $_SESSION['id'])) {

    $livroId = strVal(filter_input(INPUT_GET, 'livroId', FILTER_SANITIZE_NUMBER_INT));
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_NUMBER_INT);
    $usuarioId = strVal($_SESSION['id']);

    $listar = $conexao->prepare("SELECT * FROM tb_meus_livros WHERE id_livro = :id_livro AND id_usuario = :id_usuario");
    $listar->bindParam(':id_livro', $livroId);
    $listar->bindParam(':id_usuario', $usuarioId);
    $listar->execute();
    $livros = $listar->fetchAll(PDO::FETCH_ASSOC);
    var_dump($livros);
    if (count($livros) == 0 && $action == 1) {
        $inserir = $conexao->prepare("INSERT INTO tb_meus_livros (id_livro, id_usuario) VALUES (:id_livro, :id_usuario)");
        $inserir->bindParam(':id_livro', $livroId);
        $inserir->bindParam(':id_usuario', $usuarioId);
        $inserir->execute();
        echo "Livro favoritado com sucesso!";
    } else {
        if ($action == 0) {
            $deletar = $conexao->prepare("DELETE FROM tb_meus_livros WHERE id_livro = :id_livro AND id_usuario = :id_usuario");
            $deletar->bindParam(':id_livro', $livroId);
            $deletar->bindParam(':id_usuario', $usuarioId);
            $deletar->execute();
            echo "Livro desfavoritado com sucesso!";
        } else {
            echo "Livro já favoritado!";
        }
    }

    header('Location: /Projeto01/pages/painel/index.php');
}