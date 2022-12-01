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

  $listLivrosQuery = $conexao->prepare("SELECT * FROM tb_livros");
  $listLivrosQuery->execute();
  $listLivros = $listLivrosQuery->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once '../../includes/head.php'; ?>
  <title>Projeto01 - Categorias</title>
  <link href="./style.css" rel="stylesheet" />
</head>

<body>
  <?php include_once("../../includes/navbar/navbar.php") ?>
  <div class="conteudo">
    <div class="livros">
      <?php foreach ($listLivros as $livro):
              $favorito = in_array($livro['id'], array_column($favoritos, 'id_livro'));
              ?>
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
        <?php if($favorito): ?>
          <button class="btn-add" disabled style="background-color: #FFD700; color: #000">Adicionado</button>
        <?php else: ?>
        <a href="/Projeto01/crud/favoritarLivro.php?livroId=<?= $livro['id'] ?>&usuarioId=<?= $id ?>&action=<?=
                $favorito ? '0' : '1' ?>">
          <button class="btn-add"><?= $favorito ? "Favorito" : "Favoritar" ?></button>
        </a>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <footer>
    <p>Todos os direitos reservados à Emanuelle Ferrazo e Maria Eduarda Maroli</p>
  </footer>
</body>

</html>