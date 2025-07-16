<?php
session_start();
require_once 'functions.php';

if (!isset($_SESSION['ativa'])) {
    header('Location: login.php');
    exit();
}

function processarUpload($file_info) {
    if (isset($file_info) && $file_info['error'] == 0) {
        $diretorio_upload = dirname(__DIR__) . '/images/uploads/';
        if (!is_dir($diretorio_upload)) {
            mkdir($diretorio_upload, 0755, true);
        }
        $nome_arquivo_original = basename($file_info['name']);
        $extensao = pathinfo($nome_arquivo_original, PATHINFO_EXTENSION);
        $nome_arquivo_unico = uniqid('imovel_', true) . '.' . $extensao;
        $caminho_arquivo = $diretorio_upload . $nome_arquivo_unico;

        if (move_uploaded_file($file_info['tmp_name'], $caminho_arquivo)) {
            return $nome_arquivo_unico; 
        }
    }
    return false; 
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_imagem_1 = processarUpload($_FILES['imagem_1']);
    $nome_imagem_2 = processarUpload($_FILES['imagem_2']);
    $nome_imagem_3 = processarUpload($_FILES['imagem_3']);

    if ($nome_imagem_1 && $nome_imagem_2 && $nome_imagem_3) {
        
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

        $sql = "INSERT INTO imoveis (titulo, descricao, preco, tipo, localizacao, area, quartos, banheiros, vagas, imagem_1, imagem_2, imagem_3, destaque) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $connect->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssdssiiiisssi", $titulo, $descricao, $preco, $tipo, $localizacao, $area, $quartos, $banheiros, $vagas, $nome_imagem_1, $nome_imagem_2, $nome_imagem_3, $destaque);

            if ($stmt->execute()) {
                $_SESSION['mensagem'] = "Imóvel e suas 3 imagens cadastrados com sucesso!";
            } else {
                $_SESSION['mensagem'] = "Erro ao cadastrar imóvel: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $_SESSION['mensagem'] = "Erro ao preparar a consulta: " . $connect->error;
        }

    } else {
        $_SESSION['mensagem'] = "Erro: Falha no upload de uma ou mais imagens.";
    }

    $connect->close();
    header('Location: gerenciar_imoveis.php');
    exit();
}
?>