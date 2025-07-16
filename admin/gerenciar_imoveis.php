<?php

session_start();
if (!isset($_SESSION['ativa'])) {
    header('Location: login.php');
    exit();
}

require_once 'functions.php';

$imoveis = buscar($connect, 'imoveis', 1, "id DESC");

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Imóveis</title>
    <link rel="stylesheet" href="css/style_admin.css">
</head>
    <body>
        <div class="container-admin">
            <h1>Painel Administrativo</h1>
            <h2>Gerenciador de Imóveis</h2>

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

            <h3>Adicionar Novo Imóvel</h3>
            <form action="adicionar_imovel.php" method="POST" enctype="multipart/form-data">
                <p>
                    <label>Título:</label><br>
                    <input type="text" name="titulo" size="50" required>
                </p>
                <p>
                    <label>Descrição:</label><br>
                    <textarea name="descricao" rows="5" cols="52"></textarea>
                </p>
                <p>
                    <label>Preço (R$):</label><br>
                    <input type="number" name="preco" step="0.01" required>
                </p>
                <p>
                    <label>Tipo:</label><br>
                    <select name="tipo" required>
                        <option value="venda">Venda</option>
                        <option value="aluguel">Aluguel</option>
                    </select>
                </p>
                <p>
                    <label>Localização:</label><br>
                    <input type="text" name="localizacao" size="50" required>
                </p>
                <p>
                    <label>Área (m²):</label><br>
                    <input type="number" name="area" required>
                </p>
                <p>
                    <label>Quartos:</label><br>
                    <input type="number" name="quartos" required>
                </p>
                <p>
                    <label>Banheiros:</label><br>
                    <input type="number" name="banheiros" required>
                </p>
                <p>
                    <label>Vagas:</label><br>
                    <input type="number" name="vagas" required>
                </p>
                <p>
                    <label>Imagem 1 (Principal):</label><br>
                    <input type="file" name="imagem_1" required>
                </p>
                <p>
                    <label>Imagem 2:</label><br>
                    <input type="file" name="imagem_2" required>
                </p>
                <p>
                    <label>Imagem 3:</label><br>
                    <input type="file" name="imagem_3" required>
                </p>
                <p>
                    <label>
                        <input type="checkbox" name="destaque" value="1">
                        Marcar como destaque na página inicial?
                    </label>
                </p>
                <p>
                    <button type="submit">Cadastrar Imóvel</button>
                </p>
            </form>

            <hr>

            <h2>Imóveis Cadastrados</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagem</th>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Preço (R$)</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($imoveis as $imovel) : ?>
                    <tr>
                        <td><?php echo $imovel['id']; ?></td>
                        <td>
                            <img src="../images/uploads/<?php echo htmlspecialchars($imovel['imagem_1']); ?>" alt="<?php echo htmlspecialchars($imovel['titulo']); ?>">
                        </td>
                        <td><?php echo htmlspecialchars($imovel['titulo']); ?></td>
                        <td><?php echo ucfirst($imovel['tipo']); ?></td>
                        <td><?php echo number_format($imovel['preco'], 2, ',', '.'); ?></td>
                        <td>
                            <a href="editar_imovel.php?id=<?php echo $imovel['id']; ?>">Editar</a> |
                            <a href="deletar_imovel.php?id=<?php echo $imovel['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este imóvel?');">Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>