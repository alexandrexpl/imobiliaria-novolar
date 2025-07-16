<?php session_start(); 
$seguranca = isset($_SESSION['ativa']) ? TRUE : header("location: login.php"); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Painel Admin</title>
        <link rel="stylesheet" href="css/style_admin.css">
    </head>
    <body>
        <div class="container-admin">
            <?php if ($seguranca) { ?>
                
                <h1>Painel administrativo</h1>
                <h3>Bem vindo, <?php echo $_SESSION['nome']; ?>	</h3>

                <nav>
                    <div>
                        <a href="index.php">Painel</a>
                        <a href="users.php">Gerenciar Usuários</a>
                        <a href="gerenciar_imoveis.php">Gerenciar Imóveis</a> 
                        <a href="mensagens.php">Ver Mensagens</a> <a href="logout.php">Sair</a>
                    </div>
                </nav>

            <?php } ?>
        </div>
    </body>
</html> 