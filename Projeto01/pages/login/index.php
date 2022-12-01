<?php
include_once '../../crud/conexao.php';
if (isset($_SESSION['id'])) {
	// se já estiver logado, redireciona para o painel  
	header('Location: ../painel/index.php');
}
$aviso = "";

if (isset($_POST['email'], $_POST['senha'])) {

	$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_UNSAFE_RAW);

	//verificar se o campo email está em branco
	if (!$email) {
		echo "Preencha seu email";

	} else if (!$senha) {
		echo "Preencha sua senha";
	} else {

		$stm = $conexao->prepare("SELECT * FROM tb_usuarios WHERE email = :email");
		$stm->bindValue(":email", $email);
		$stm->execute();
		$usuario = $stm->fetch(PDO::FETCH_ASSOC);

		if (password_verify($senha, $usuario['senha'])) {
			//se não existir uma sessão, inicia uma
			if (!isset($_SESSION)) {
				session_start();
			}

			//variável continuar válida, por um determinado período
			//de tempo mesmo quando a pessoa troca de pagina
			$_SESSION['id'] = $usuario['id'];
			$_SESSION['nome'] = $usuario['nome'];
			$_SESSION['autenticado'] = true;
			//redirecionar  o usuario para outa pagina
			header("location: ../painel/index.php");

		} else {
			echo "Falha ao logar! E-mail ou senha incorretos";
		}
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Projeto 01 - Login</title>
	<link href="./style.css" rel="stylesheet" />
	<?php include_once '../../includes/head.php'; ?>
</head>

<body>
<?php include_once('../../includes/navbar/navbar.php'); ?>
	<div class="conteudo">
		<h1>Acesse sua conta para utilizar nossos serviços</h1>
		<form method="POST">
			<div class="input-box">
				<input type="text" name="email" placeHolder="Email: ">
			</div>
			<div class="input-box">
				<input type="password" name="senha" placeHolder="Senha: ">
			</div>
			<div class="input-box">
				<input type="submit" value="Entrar">
			</div>
			<a href="../cadastro/cadastro.php">Não tem Conta? Cadastre-se</a>
		</form>
	</div>
</body>

</html>