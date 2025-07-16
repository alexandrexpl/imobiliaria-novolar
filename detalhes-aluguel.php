<?php
include 'includes/header.php';
require_once 'admin/functions.php';

$id_imovel = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id_imovel <= 0) {
    header('Location: aluguel.php');
    exit();
}

$imovel = buscaUnica($connect, 'imoveis', $id_imovel);

if (!$imovel) {
    echo "<div class='container'><p>Imóvel não encontrado.</p></div>";
    include 'includes/footer.php';
    exit();
}
?>

<div class="container property-details-layout">
    <section class="property-gallery">
        <div class="gallery-main-image">
            <img src="images/uploads/<?php echo htmlspecialchars($imovel['imagem_1']); ?>" alt="Vista principal do imóvel: <?php echo htmlspecialchars($imovel['titulo']); ?>">
        </div>
        <div class="gallery-side-image">
             <img src="images/uploads/<?php echo htmlspecialchars($imovel['imagem_2']); ?>" alt="Detalhe do imóvel 1">
        </div>
        <div class="gallery-side-image">
             <img src="images/uploads/<?php echo htmlspecialchars($imovel['imagem_3']); ?>" alt="Detalhe do imóvel 2">
        </div>
    </section>

    <section class="property-main-info">
        <div class="property-title">
            <h1><?php echo htmlspecialchars($imovel['titulo']); ?></h1>
            <p><?php echo htmlspecialchars($imovel['localizacao']); ?></p>
        </div>
        <div class="property-price">
            <p class="main-price">R$ <?php echo number_format($imovel['preco'], 2, ',', '.'); ?></p>
            <p class="sub-price">/mês</p>
        </div>
    </section>

    <section class="property-specs">
        <div class="spec-item">
            <span class="label">TIPO</span><br>
            <span class="value"><?php echo ucfirst(htmlspecialchars($imovel['tipo'])); ?></span>
        </div>
        <div class="spec-item">
            <span class="label">DORMITÓRIOS</span><br>
            <span class="value"><?php echo $imovel['quartos']; ?></span>
        </div>
        <div class="spec-item">
            <span class="label">BANHEIROS</span><br>
            <span class="value"><?php echo $imovel['banheiros']; ?></span>
        </div>
        <div class="spec-item">
            <span class="label">VAGAS</span><br>
            <span class="value"><?php echo $imovel['vagas']; ?></span>
        </div>
        <div class="spec-item">
            <span class="label">ÁREA</span><br>
            <span class="value"><?php echo $imovel['area']; ?> m²</span>
        </div>
    </section>

    <section class="property-description">
        <h2>Descrição</h2>
        <p>
            <?php echo nl2br(htmlspecialchars($imovel['descricao'])); ?>
        </p>
    </section>
</div>

<?php include 'includes/footer.php'; ?>