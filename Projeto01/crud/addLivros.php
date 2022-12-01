<?php
session_start();
include_once 'conexao.php';
define ('SITE_ROOT', realpath(dirname(__FILE__)));

if(isset($_POST['adicionar'], $_SESSION['id'])) {
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
    $editora = filter_input(INPUT_POST, 'editora', FILTER_SANITIZE_STRING);
    $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);

    $capa = $_FILES['capa'];
    if($capa['error']) die('Erro ao enviar arquivo');
    if($capa['size'] > 2097152) {
        die('Arquivo muito grande');
    } else {
        $pasta = "\capas";
        $extensoes = array(".png", ".jpg", ".jpeg");
        $extensao = strrchr($capa['name'], ".");
        if(!in_array($extensao, $extensoes)) {
            die('Extensão inválida');
        } else {
            $nome = md5(uniqid(time())) . $extensao;
            $destino = $pasta.'\\'.$nome;
            $uploaded = move_uploaded_file($capa['tmp_name'], SITE_ROOT.$destino);
            if($uploaded) {
                $sql = "INSERT INTO tb_livros (titulo, autor, editora, ano, capa) VALUES (:titulo, :autor, :editora, :ano, :capa)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(':titulo', $titulo);
                $stmt->bindParam(':autor', $autor);
                $stmt->bindParam(':editora', $editora);
                $stmt->bindParam(':ano', $ano);
                $stmt->bindParam(':capa', $destino);
                $stmt->execute();
            } else {
                die('Erro ao enviar arquivo');
            }
        }
    }


    /*$insertLivrosQuery = "INSERT INTO tb_livros (titulo, autor, editora, ano, capa) VALUES (:titulo, :autor, :editora, :ano, :capa)";
    $insert_livros = $conexao->prepare($insertLivrosQuery);
    $insert_livros->bindParam(':titulo', $titulo);
    $insert_livros->bindParam(':autor', $autor);
    $insert_livros->bindParam(':editora', $editora);
    $insert_livros->bindParam(':ano', $ano);
    $insert_livros->bindParam(':capa', $capa);
    $insert_livros->execute();*/
}

?>

<form method="POST" enctype="multipart/form-data">
    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo" placeholder="Título do livro"><br><br>

    <label for="autor">Autor</label>
    <input type="text" name="autor" id="autor" placeholder="Autor do livro"><br><br>

    <label for="editora">Editora</label>
    <input type="text" name="editora" id="editora" placeholder="Editora do livro"><br><br>

    <label for="ano">Ano</label>
    <input type="text" name="ano" id="ano" placeholder="Ano do livro"><br><br>

    <label for="capa">Capa</label>
    <input type="file" name="capa" id="capa" placeholder="Capa do livro"><br><br>
    <input type="submit" name="adicionar" value="Adicionar">
</form>