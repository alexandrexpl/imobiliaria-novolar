<?php include 'includes/header.php'; ?>
<?php
require_once 'admin/functions.php';

$imoveis_venda = buscar($connect, 'imoveis', "tipo = 'venda'", "id DESC");
?>

<div class="page-banner">
    <h1>Imóveis à Venda</h1>
</div>

<div class="container main-content">
    <aside class="filter-sidebar">
        <h3><i class="fas fa-search"></i> BUSCA</h3>
        <form>
            <div class="filter-group">
                <label>TIPO DE IMÓVEL</label>
                <div class="checkbox-group">
                    <label><input type="checkbox"> Apartamento</label>
                    <label><input type="checkbox"> Casa</label>
                    <label><input type="checkbox"> Casa em condomínio</label>
                    <label><input type="checkbox"> Sobrado</label>
                </div>
            </div>
            <div class="filter-group">
                <label>VALOR</label>
                <div class="input-group">
                    <input type="text" placeholder="Mín.">
                    <input type="text" placeholder="Máx.">
                </div>
            </div>
            <button type="submit" class="btn" style="width: 100%;">APLICAR FILTROS</button>
        </form>
    </aside>

    <section class="property-listing">
        <div class="listing-grid">
            <?php foreach ($imoveis_venda as $imovel) : ?>

                <a href="detalhes-venda.php?id=<?php echo $imovel['id']; ?>" class="property-card-link">
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
    </section>
</div>

<div class="container">
    <section class="exclusive-section">
        <h2>Planeje seu Investimento</h2>
        <p>Simule o financiamento do seu futuro imóvel.</p>
        <div class="calculator">
            <div class="form-group">
                <label>Valor do Imóvel</label>
                <input type="text" placeholder="R$ 1.000.000">
            </div>
            <div class="form-group">
                <label>Valor da Entrada</label>
                <input type="text" placeholder="R$ 200.000">
            </div>
             <div class="form-group">
                <label>Taxa de Juros (%)</label>
                <input type="text" placeholder="9.5">
            </div>
             <div class="form-group">
                <label>Prazo (em anos)</label>
                <input type="text" placeholder="30">
            </div>
            <div class="form-group full-width">
                 <button class="btn" style="width: 100%;">Calcular (Visual)</button>
            </div>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>