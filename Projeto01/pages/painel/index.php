<?php
include_once '../../crud/conexao.php';
session_start();
$nome = $_SESSION['nome'];
$id = $_SESSION['id'];
//var_dump($_SESSION);
if (!isset($id)) { // se não tiver o id na sessão, não está logado
    header("location: ../login/index.php");
} else {
    // se estiver logado, tudo certinhp
    $favoritosQuery = $conexao->prepare("SELECT * FROM tb_meus_livros WHERE id_usuario = :id_usuario");
    $favoritosQuery->bindValue(":id_usuario", $id);
    $favoritosQuery->execute();
    $favoritos = $favoritosQuery->fetchAll(PDO::FETCH_ASSOC);

    $livrosQuery = $conexao->prepare("SELECT * FROM tb_livros");
    $livrosQuery->execute();
    $livros = $livrosQuery->fetchAll(PDO::FETCH_ASSOC);

    $livrosFavoritos = [];
    foreach ($favoritos as $favorito) {
        foreach ($livros as $livro) {
            if ($favorito['id_livro'] == $livro['id']) {
                $livrosFavoritos[] = $livro;
            }
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Projeto 01</title>
    <?php include_once '../../includes/head.php'; ?>
    <link href="./style.css" rel="stylesheet" />
</head>

<body>
    <?php include_once '../../includes/navbar/navbar.php'; ?>

    <div class="conteudo">
        <h2>Favoritos</h2>
        <div class="livros-favoritos">
            <?php foreach ($livrosFavoritos as $livro): ?>
            <div class="livro">
                <div class="capa-livro">
                    <img src="../../crud/<?= $livro['capa'] ?>" alt="Capa do livro <?= $livro['titulo'] ?>" />
                </div>
                <div class="info">
                    <?= $livro['titulo'] ?>
                </div>
                <div class="info">
                    <?= $livro['autor'] ?>
                </div>
                <div class="info">
                    <?= $livro['editora'] ?>
                </div>
                <div class="info">
                    <?= $livro['ano'] ?>
                </div>
                <a
                    href="/Projeto01/crud/favoritarLivro.php?livroId=<?= $livro['id'] ?>&usuarioId=<?= $id ?>&action=<?=0 ?>">
                    <button class="btn-remover">Remover</button>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <footer>
        <p>Todos os direitos reservados à Emanuelle Ferrazzo e Maria Eduarda Maroli</p>
    </footer>
</body>

</html>