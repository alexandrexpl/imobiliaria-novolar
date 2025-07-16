<?php
session_start();
if (!isset($_SESSION['ativa'])) {
    header('Location: login.php');
    exit();
}

require_once 'functions.php';

$mensagens = buscar($connect, 'contato_mensagens', 1, "id DESC");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Mensagens de Contato</title>
    <link rel="stylesheet" href="css/style_admin.css">
</head>
<body>
    <div class="container-admin">
        <h1>Painel Administrativo</h1>
        <h2>Mensagens Recebidas</h2>

        <nav>
            <div>
                <a href="index.php">Painel</a>
                <a href="users.php">Gerenciar Usuários</a>
                <a href="gerenciar_imoveis.php">Gerenciar Imóveis</a> 
                <a href="mensagens.php">Ver Mensagens</a> <a href="logout.php">Sair</a>
            </div>
        </nav>
        
        <?php
        if (isset($_SESSION['mensagem'])) {
            echo "<p style='color: green; font-weight: bold;'>" . htmlspecialchars($_SESSION['mensagem']) . "</p>";
            unset($_SESSION['mensagem']);
        }
        ?>

        <hr>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th class="mensagem-corpo">Mensagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mensagens as $mensagem) : ?>
                <tr>
                    <td><?php echo $mensagem['id']; ?></td>
                    <td><?php echo date('d/m/Y H:i', strtotime($mensagem['data_envio'])); ?></td>
                    <td><?php echo htmlspecialchars($mensagem['nome']); ?></td>
                    <td><?php echo htmlspecialchars($mensagem['email']); ?></td>
                    <td><?php echo htmlspecialchars($mensagem['telefone']); ?></td>
                    <td class="mensagem-corpo"><?php echo nl2br(htmlspecialchars($mensagem['mensagem'])); ?></td>
                    <td>
                        <a href="deletar_mensagem.php?id=<?php echo $mensagem['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir esta mensagem?');">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>