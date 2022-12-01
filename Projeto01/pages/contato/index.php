<?php
//variaveis que irão receber os dados
$aviso = "Preencha o formulário";
$nome = "";
$email = "";
$msg = "";

//verificar se os dados estão chegando no BD
//os nomes devem estar iguais ao do banco criado 

if (isset($_POST["nome"], $_POST["email"], $_POST['msg'])) {
    //iniciando a conexao 

    //atribuindo os valores dos inputs para as variáveis   
    //o filter_input, limpa os dados depois de inseridos 
    $nome = filter_input(INPUT_POST, "nome", FILTER_UNSAFE_RAW);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $msg = filter_input(INPUT_POST, "msg", FILTER_UNSAFE_RAW);

    //verificar se o usuário digitou dados invalidos  
    if (!$nome || !$email || !$msg) {
        $aviso = "Dados Inválidos";
    } else {
        $conexao = new PDO("mysql:host=localhost;dbname=site1", "root", "");

        //vai inserir os dados na tabela lá do BD
        $stm = $conexao->prepare('INSERT INTO contato (nome, email, msg) VALUES (:nome, :email, :msg)');
        //bindParam = informar valores dinamicamente para uma requisição 
        //SQL usando PHP, através de uma variável ou constante.
        $stm->bindParam('nome', $nome);
        $stm->bindParam('email', $email);
        $stm->bindParam('msg', $msg);
        $stm->execute();

        $aviso = "Mensagem Enviada com Sucesso";

        //limpar campos qndo a msg for enviada
        $nome = "";
        $email = "";
        $msg = "";

    }

}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Projeto 01 - Contato</title>
    <link href="./style.css" rel="stylesheet" />
    <?php include_once '../../includes/head.php'; ?>
</head>

<body>
    <?php include_once('../../includes/navbar/navbar.php'); ?>
    <!--banner-->
    <section class="banner-principal">
        <div class="overlay"></div>
        <div class="conteudo">
            <form method="POST">
                <div class="formulario">
                    <div class="input-box">
                        <input required type="text" name="nome" value="<?= $nome ?>" placeholder="Nome...">
                    </div>
                    <div class="input-box">
                        <input required type="email" name="email" value="<?= $email ?>" placeholder="Email...">
                    </div>
                    <div class="input-box">
                        <textarea required placeholder="Sua mensagem..." name="msg"><?= $msg ?></textarea>
                    </div>
                    <div class="input-message">
                        <?= $aviso ?>
                    </div>
                </div>
                <div class="input-box">
                    <input type="submit" name="acao" value="Enviar">
                </div>
            </form>

        </div>
    </section>
    <!--extras-->
    <footer>
        <p>Todos os direitos reservados à Emanuelle Ferrazzo e Maria Eduarda Maroli</p>
        <!--center-->
    </footer>
</body>

</html>