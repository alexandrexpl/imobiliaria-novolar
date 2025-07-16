<?php
session_start();
require_once 'functions.php';

if (!isset($_SESSION['ativa'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    deletar($connect, 'contato_mensagens', $id);
    
    $_SESSION['mensagem'] = "Mensagem excluída com sucesso!";

} else {
    $_SESSION['mensagem'] = "Erro: ID da mensagem não fornecido.";
}

header('Location: mensagens.php');
exit();
?>