<?php
session_start();
if (!isset($_SESSION['ativa'])) {
    header('Location: login.php');
    exit();
}

require_once 'functions.php';

$id = (int)$_GET['id'];

$imovel = buscaUnica($connect, 'imoveis', $id);

if (!$imovel) {
    $_SESSION['mensagem'] = "Erro: Imóvel não encontrado.";
    header('Location: gerenciar_imoveis.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Imóvel</title>
    <link rel="stylesheet" href="css/style_admin.css">
    </head>
<body>
    <div class="container-admin">
        <h1>Painel Administrativo</h1>
        <h2>Editar Imóvel</h2>

        <p>
            <a href="gerenciar_imoveis.php">Voltar para a Lista de Imóveis</a>
        </p>

        <hr>

        <form action="atualizar_imovel.php" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="id" value="<?php echo $imovel['id']; ?>">
            
            <p>
                <label>Título:</label><br>
                <input type="text" name="titulo" size="50" required value="<?php echo htmlspecialchars($imovel['titulo']); ?>">
            </p>
            <p>
                <label>Descrição:</label><br>
                <textarea name="descricao" rows="5" cols="52"><?php echo htmlspecialchars($imovel['descricao']); ?></textarea>
            </p>
            <p>
                <label>Preço (R$):</label><br>
                <input type="number" name="preco" step="0.01" required value="<?php echo $imovel['preco']; ?>">
            </p>
            <p>
                <label>Tipo:</label><br>
                <select name="tipo" required>
                    <option value="venda" <?php echo ($imovel['tipo'] == 'venda') ? 'selected' : ''; ?>>Venda</option>
                    <option value="aluguel" <?php echo ($imovel['tipo'] == 'aluguel') ? 'selected' : ''; ?>>Aluguel</option>
                </select>
            </p>
            <p>
                <label>Localização:</label><br>
                <input type="text" name="localizacao" size="50" required value="<?php echo htmlspecialchars($imovel['localizacao']); ?>">
            </p>
            <p>
                <label>Área (m²):</label><br>
                <input type="number" name="area" required value="<?php echo $imovel['area']; ?>">
            </p>
            <p>
                <label>Quartos:</label><br>
                <input type="number" name="quartos" required value="<?php echo $imovel['quartos']; ?>">
            </p>
            <p>
                <label>Banheiros:</label><br>
                <input type="number" name="banheiros" required value="<?php echo $imovel['banheiros']; ?>">
            </p>
            <p>
                <label>Vagas:</label><br>
                <input type="number" name="vagas" required value="<?php echo $imovel['vagas']; ?>">
            </p>
            <p>
            <label>Imagem 1 (Principal):</label><br>
            <img src="../images/uploads/<?php echo htmlspecialchars($imovel['imagem_1']); ?>" width="150"><br>
            <small>Envie uma nova imagem para substituir. Deixe em branco para manter a atual.</small><br>
            <input type="file" name="imagem_1">
            <input type="hidden" name="imagem_1_antiga" value="<?php echo htmlspecialchars($imovel['imagem_1']); ?>">
        </p>
        <p>
            <label>Imagem 2:</label><br>
            <img src="../images/uploads/<?php echo htmlspecialchars($imovel['imagem_2']); ?>" width="150"><br>
            <small>Envie uma nova imagem para substituir. Deixe em branco para manter a atual.</small><br>
            <input type="file" name="imagem_2">
            <input type="hidden" name="imagem_2_antiga" value="<?php echo htmlspecialchars($imovel['imagem_2']); ?>">
        </p>
        <p>
            <label>Imagem 3:</label><br>
            <img src="../images/uploads/<?php echo htmlspecialchars($imovel['imagem_3']); ?>" width="150"><br>
            <small>Envie uma nova imagem para substituir. Deixe em branco para manter a atual.</small><br>
            <input type="file" name="imagem_3">
            <input type="hidden" name="imagem_3_antiga" value="<?php echo htmlspecialchars($imovel['imagem_3']); ?>">
        </p>
            <p>
                <label>
                    <input type="checkbox" name="destaque" value="1" <?php echo ($imovel['destaque'] == 1) ? 'checked' : ''; ?>>
                    Marcar como destaque na página inicial?
                </label>
            </p>
            <p>
                <button type="submit">Atualizar Imóvel</button>
            </p>
        </form>
    </div>
</body>
</html>