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
	<link rel="stylesheet" href="css/style_admin.css">
</head>
<body>
<?php if ($seguranca) { ?>
	
	<h1>Painel administrativo</h1>
	<h3>Bem vindo, <?php echo $_SESSION['nome']; ?>	</h3>
	<h3> Gerenciador de Usuários </h3>

	<nav>
        <div>
            <a href="index.php">Painel</a>
            <a href="users.php">Gerenciar Usuários</a>
            <a href="gerenciar_imoveis.php">Gerenciar Imóveis</a> 
            <a href="mensagens.php">Ver Mensagens</a> <a href="logout.php">Sair</a>
        </div>
    </nav>

<?php
	$tabela = "usuarios";
	$order = "nome";
	$usuarios = buscar($connect, $tabela, 1, $order);
	inserirUsuarios($connect);

	if (isset($_GET['id'])) { ?>
		<h2> Tem certeza que deseja de deletar o usuário <?php echo $_GET['nome']; ?>?</h2>
		<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $_GET['id']?>">
			<input type="submit" name="deletar" value="Deletar">
		</form>
	<?php } ?>
	<?php
		if (isset($_POST['deletar'])) {
			if ($_SESSION['id'] != $_POST['id']) {
				deletar($connect, "usuarios", $_POST['id']);
			}else{
				echo "Você não pode deletar o próprio Usuário.";
			}
			
		}	
	 ?>

	<form action="" method="post">
		<fieldset>
			<legend>Inserir Usuáiros</legend>
			<input type="text" name="nome" placeholder="Nome" required>
			<input type="email" name="email" placeholder="E-mail" required>
			<input type="password" name="senha" placeholder="Senha" required>
			<input type="password" name="repetesenha" placeholder="Confirme sua senha" required>
			<input type="submit" name="cadastrar" value="Cadastrar">
		</fieldset>
	</form>

	<div class="container">
		<table border="1">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Data Cadastro</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($usuarios as $usuario) : ?>
					<tr>
						<td><?php echo $usuario['id']; ?></td>
						<td><?php echo $usuario['nome']; ?></td>
						<td><?php echo $usuario['email']; ?></td>
						<td><?php echo $usuario['data_cadastro']; ?></td>
						<td>
							<a href="users.php?id=<?php echo
								$usuario['id'];?>&nome=<?php echo 
								$usuario['nome']; ?>">Excluir</a>
							|
							<a href="edit_user.php?id=<?php echo
								$usuario['id'];?>&nome=<?php echo 
								$usuario['nome']; ?>">Atualizar</a>
						</td>
					</tr>		
	</div




				<?php endforeach; ?>
			</tbody>


		</table>



<?php } ?>

</body>
</html> 