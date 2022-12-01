<?php
session_start();
$id = $_SESSION['id'];
if (isset($id)) { // se ele estiver logado e queira fazer logout
	$_SESSION['autenticado'] = false;
	session_destroy(); // destroi os dados da sessão
} else {
	header("Location: ../login/index.php"); // caso nao esteja logado ele vai pro login
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Projeto 01</title>
	<script src="https://kit.fontawesome.com/ac3ebf4168.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https: //fonts.googleapis.com/css2? family= Roboto:wght@100 & display=swap" rel="stylesheet">
	<!--importando fontes do google fontes-->
	<link href="./style.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--tag para site responsivo-->
	<meta name="description" content="Descrição do meu web site">
	<!--para o google encontrar o site-->
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<meta charset="utf-8" />
</head>

<body>
	<?php include_once('../../includes/navbar/navbar.php'); ?>
	<div class="fabio">
		<h1>Você saiu!</h1>
		<button><a href='/Projeto01/'>Voltar a Página Inicial</a></button>
	</div>
</body>

</html>