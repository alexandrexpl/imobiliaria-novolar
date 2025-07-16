<?php session_start(); 
$seguranca = isset($_SESSION['ativa']) ? TRUE : header("location: login.php");
require_once "functions.php"; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Painel Admin - Usuários </title>
</head>
<body>
<?php if ($seguranca) { ?>
	
	<h1>Painel administrativo</h1>
	<h3>Bem vindo, <?php echo $_SESSION['nome']; ?>	</h3>
	<h3> Gerenciador de Usuários </h3>

	<nav> 
		<div>
			<a href="index.php">Painel </a>
			<a href="users.php">Gerenciar Usuários </a>
			<a href="logout.php">Sair </a>
		</div>
	</nav>

<?php
	$tabela = "usuarios";
	$order = "nome";
	$usuarios = buscar($connect, $tabela, 1, $order);
?>
	
	<?php if (isset($_GET['id'])) { 
		$id = $_GET['id'];
		$usuario = buscaUnica($connect, $tabela, $id);
		updateUser($connect);
	?>
			<h3>Editando o usuário <?php echo $_GET['nome']; ?></h3>
			
<?php } ?>

	<form action="" method="post">
		<fieldset>
			<legend>Editar Usuáiros</legend>
			<input value="<?php echo $usuario['id']; ?>" type="hidden" name="id" required>
			<input value="<?php echo $usuario['nome']; ?>" type="text" name="nome" placeholder="Nome" required>
			<input value="<?php echo $usuario['email']; ?>"type="email" name="email" placeholder="E-mail" required>
			<input type="password" name="senha" placeholder="Senha">
			<input type="password" name="repetesenha" placeholder="Confirme sua senha">
			<input value="<?php echo $usuario['data_cadastro']; ?>"type="date" name="data_cadastro"> 

			<input type="submit" name="atualizar" value="Atualizar">
		</fieldset>
	</form>


		</table>



<?php } ?>

</body>
</html> 