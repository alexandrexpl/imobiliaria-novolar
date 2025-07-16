<?php include 'includes/header.php'; ?>
<?php
require_once 'admin/functions.php';

$imoveis_destaque = buscar($connect, 'imoveis', 'destaque = 1', 'id DESC LIMIT 6');
?>

<section class="hero">
    <div class="hero-content">
        <h1>Encontre seu Sonho</h1>
        <p>Para seu estilo de vida</p>
        <a href="venda.php" class="btn">Ver Imóveis</a>
    </div>
</section>

<section class="featured-properties">
    <div class="container">
        <h2>Imóveis em Destaque</h2>
        <div class="properties-grid">
            <?php foreach ($imoveis_destaque as $imovel) : ?>
                
                <a href="<?php echo $imovel['tipo'] == 'venda' ? 'detalhes-venda.php' : 'detalhes-aluguel.php'; ?>?id=<?php echo $imovel['id']; ?>" class="property-card-link">
                    <div class="property-card">
                        <img src="images/uploads/<?php echo htmlspecialchars($imovel['imagem_1']); ?>" alt="<?php echo htmlspecialchars($imovel['titulo']); ?>">
                        <div class="property-card-content">
                            <h3><?php echo htmlspecialchars($imovel['titulo']); ?></h3>
                            <p class="location"><?php echo htmlspecialchars($imovel['localizacao']); ?></p>
                            <p class="price">R$ <?php echo number_format($imovel['preco'], 2, ',', '.'); ?></p>
                        </div>
                    </div>
                </a>

            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <h2>Fale com um Especialista</h2>
        <p>Nossa equipe está pronta para ajudar você a encontrar o imóvel ideal.</p>
        <a href="contato.php" class="btn">Entre em Contato</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>