<?php include 'includes/header.php'; ?>

<div class="page-banner">
    <h1>Fale Conosco</h1>
</div>

<div class="container">
    <form class="contact-form" action="" method="POST">
        <h2>Envie sua mensagem</h2>
        <p>Preencha o formulário abaixo e nossa equipe entrará em contato em breve.</p>
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