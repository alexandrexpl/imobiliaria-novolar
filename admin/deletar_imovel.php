<?php
session_start();
if (!isset($_SESSION['ativa'])) {
    header('Location: login.php');
    exit();
}

require_once 'functions.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];


    $sql_busca_imagens = "SELECT imagem_1, imagem_2, imagem_3 FROM imoveis WHERE id = ?";
    $stmt_busca_imagens = $connect->prepare($sql_busca_imagens);
    $stmt_busca_imagens->bind_param("i", $id);
    $stmt_busca_imagens->execute();
    $resultado = $stmt_busca_imagens->get_result();
    
    if ($resultado->num_rows > 0) {
        $imovel = $resultado->fetch_assoc();

        $imagens_para_deletar = [
            $imovel['imagem_1'],
            $imovel['imagem_2'],
            $imovel['imagem_3']
        ];

        foreach ($imagens_para_deletar as $nome_imagem) {
            if (!empty($nome_imagem)) {
                $caminho_imagem = dirname(__DIR__) . '/images/uploads/' . $nome_imagem;
                if (file_exists($caminho_imagem)) {
                    unlink($caminho_imagem); 
                }
            }
        }
    }
    $stmt_busca_imagens->close();


    deletar($connect, 'imoveis', $id);
    $_SESSION['mensagem'] = "Imóvel excluído com sucesso!";


    $connect->close();

} else {

    $_SESSION['mensagem'] = "Erro: ID do imóvel não fornecido.";
}


header('Location: gerenciar_imoveis.php');
exit();