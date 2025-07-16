<?php require_once "functions.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulário de acesso ao site</title>
	<link rel="stylesheet" href="css/style_admin.css">
</head>
<body>
	<div class="container-admin">
		<form action="" method="post">
			<fieldset>
				<legend>Painel de Login</legend>
				<input type="email" name="email" placeholder="Informe seu e-mail" required>
				<input type="password" name="senha" placeholder="Insira sua senha" required>
				<input type="submit" name="acessar" value="Acessar">

			</fieldset>
		</form>
		<?php 
			if (isset($_POST['acessar'])) {
				login($connect);
			}
		?>
	</div>
</body>
</html>