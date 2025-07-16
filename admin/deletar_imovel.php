<?php
session_start();
if (!isset($_SESSION['ativa'])) {
    header('Location: login.php');
    exit();
}

require_once 'functions.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $sql_busca_imagem = "SELECT imagem_principal FROM imoveis WHERE id = ?";
    $stmt_busca_imagem = $connect->prepare($sql_busca_imagem);
    $stmt_busca_imagem->bind_param("i", $id);
    $stmt_busca_imagem->execute();
    $resultado = $stmt_busca_imagem->get_result();
    
    if ($resultado->num_rows > 0) {
        $imovel = $resultado->fetch_assoc();
        $nome_imagem = $imovel['imagem_principal'];
        
        $caminho_imagem = dirname(__DIR__) . '/images/uploads/' . $nome_imagem;
        if (file_exists($caminho_imagem)) {
            unlink($caminho_imagem);
        }
    }
    $stmt_busca_imagem->close();


    $sql_delete = "DELETE FROM imoveis WHERE id = ?";
    $stmt_delete = $connect->prepare($sql_delete);
    
    if ($stmt_delete) {
        $stmt_delete->bind_param("i", $id);

        if ($stmt_delete->execute()) {
            $_SESSION['mensagem'] = "Imóvel excluído com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao excluir o imóvel: " . $stmt_delete->error;
        }
        $stmt_delete->close();
    } else {
        $_SESSION['mensagem'] = "Erro ao preparar a exclusão: " . $connect->error;
    }

    $connect->close();

} else {
    $_SESSION['mensagem'] = "Erro: ID do imóvel não fornecido.";
}

header('Location: gerenciar_imoveis.php');
exit();
?>