<?php
session_start();
require_once 'functions.php';

// Segurança: verifica se o usuário está logado
if (!isset($_SESSION['ativa'])) {
    header('Location: login.php');
    exit();
}

// Função auxiliar para processar cada upload durante a atualização
function processarUploadUpdate($file_info, $imagem_antiga) {
    // Se um novo arquivo foi enviado e não houve erro
    if (isset($file_info) && $file_info['error'] == 0) {
        $diretorio_upload = dirname(__DIR__) . '/images/uploads/';
        
        // Apaga a imagem antiga para não deixar lixo no servidor
        $caminho_imagem_antiga = $diretorio_upload . $imagem_antiga;
        if (!empty($imagem_antiga) && file_exists($caminho_imagem_antiga)) {
            unlink($caminho_imagem_antiga);
        }

        // Salva a nova imagem com nome único
        $nome_arquivo_original = basename($file_info['name']);
        $extensao = pathinfo($nome_arquivo_original, PATHINFO_EXTENSION);
        $nome_arquivo_unico = uniqid('imovel_', true) . '.' . $extensao;
        $caminho_arquivo = $diretorio_upload . $nome_arquivo_unico;

        if (move_uploaded_file($file_info['tmp_name'], $caminho_arquivo)) {
            return $nome_arquivo_unico; // Retorna o nome do NOVO arquivo
        }
    }
    // Se nenhum arquivo novo foi enviado, ou se houve erro no upload, retorna o nome do arquivo ANTIGO
    return $imagem_antiga;
}


// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe todos os dados do formulário
    $id = (int)$_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $tipo = $_POST['tipo'];
    $localizacao = $_POST['localizacao'];
    $area = (int)$_POST['area'];
    $quartos = (int)$_POST['quartos'];
    $banheiros = (int)$_POST['banheiros'];
    $vagas = (int)$_POST['vagas'];
    $destaque = isset($_POST['destaque']) ? 1 : 0;

    // Processa cada uma das 3 imagens, decidindo se mantém a antiga ou usa a nova
    $nome_imagem_1 = processarUploadUpdate($_FILES['imagem_1'], $_POST['imagem_1_antiga']);
    $nome_imagem_2 = processarUploadUpdate($_FILES['imagem_2'], $_POST['imagem_2_antiga']);
    $nome_imagem_3 = processarUploadUpdate($_FILES['imagem_3'], $_POST['imagem_3_antiga']);
    
    // Prepara a consulta SQL UPDATE com as colunas corretas
    $sql = "UPDATE imoveis SET titulo = ?, descricao = ?, preco = ?, tipo = ?, localizacao = ?, area = ?, quartos = ?, banheiros = ?, vagas = ?, imagem_1 = ?, imagem_2 = ?, imagem_3 = ?, destaque = ? WHERE id = ?";
    
    $stmt = $connect->prepare($sql);

    if ($stmt) {
        // A string de tipos agora tem 14 itens (13 colunas para atualizar + o id no final para o WHERE)
        $stmt->bind_param("ssdssiiiisssii", $titulo, $descricao, $preco, $tipo, $localizacao, $area, $quartos, $banheiros, $vagas, $nome_imagem_1, $nome_imagem_2, $nome_imagem_3, $destaque, $id);

        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Imóvel atualizado com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao atualizar o imóvel: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $_SESSION['mensagem'] = "Erro ao preparar a atualização: " . $connect->error;
    }

    $connect->close();
    header('Location: gerenciar_imoveis.php');
    exit();
}
?>