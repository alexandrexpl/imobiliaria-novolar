<?php
session_start();

$mensagem_feedback = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once 'admin/functions.php';

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    $sql = "INSERT INTO contato_mensagens (nome, email, telefone, mensagem) VALUES (?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $nome, $email, $telefone, $mensagem);

        if ($stmt->execute()) {
            $mensagem_feedback = "<p style='color: green; font-weight: bold;'>Mensagem enviada com sucesso! Entraremos em contato em breve.</p>";
        } else {
            $mensagem_feedback = "<p style='color: red; font-weight: bold;'>Erro ao enviar a mensagem. Tente novamente.</p>";
        }
        $stmt->close();
    }
    $connect->close();
}
include 'includes/header.php';
?>

<div class="page-banner">
    <h1>Fale Conosco</h1>
</div>

<div class="container">
    <form class="contact-form" action="contato.php" method="POST">
        <h2>Envie sua mensagem</h2>
        <p>Preencha o formulário abaixo e nossa equipe entrará em contato em breve.</p>
        
        <?php echo $mensagem_feedback; ?>

        <div class="form-group">
            <label for="nome">Nome Completo</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="tel" id="telefone" name="telefone" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="mensagem">Mensagem</label>
            <textarea id="mensagem" name="mensagem" required></textarea>
        </div>
        <button type="submit" class="btn">Enviar Mensagem</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>