<?php include 'includes/header.php'; ?>
<?php
require_once 'admin/functions.php';

$imoveis_aluguel = buscar($connect, 'imoveis', "tipo = 'aluguel'", "id DESC");
?>

<div class="page-banner aluguel-banner">
    <h1>Imóveis para Alugar</h1>
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
            <?php foreach ($imoveis_aluguel as $imovel) : ?>

                <a href="detalhes-aluguel.php?id=<?php echo $imovel['id']; ?>" class="property-card-link">
                    <div class="property-card">
                        <img src="images/uploads/<?php echo htmlspecialchars($imovel['imagem_1']); ?>" alt="<?php echo htmlspecialchars($imovel['titulo']); ?>">
                        <div class="property-card-content">
                            <h3><?php echo htmlspecialchars($imovel['titulo']); ?></h3>
                            <p class="location"><?php echo htmlspecialchars($imovel['localizacao']); ?></p>
                            <p class="price">R$ <?php echo number_format($imovel['preco'], 2, ',', '.'); ?>
                                <span class="condominio">/mês</span>
                            </p>
                        </div>
                    </div>
                </a>

            <?php endforeach; ?>
        </div>
    </section>
</div>

<div class="container">
    <section class="exclusive-section">
        <h2>Guia do Inquilino Perfeito</h2>
        <div class="accordion">
            <details class="accordion-item">
                <summary>Documentos Necessários</summary>
                <div class="accordion-item-content">
                    <ul>
                        <li>RG e CPF (ou CNH)</li>
                        <li>Comprovante de Renda (últimos 3 meses)</li>
                        <li>Comprovante de Residência Atual</li>
                        <li>Certidão de Estado Civil</li>
                    </ul>
                </div>
            </details>
            <details class="accordion-item">
                <summary>Tipos de Garantia</summary>
                <div class="accordion-item-content">
                    <p>Oferecemos diversas opções para facilitar sua locação: Fiador, Seguro Fiança, Título de Capitalização e CredPago.</p>
                </div>
            </details>
            <details class="accordion-item">
                <summary>Dicas para a Vistoria</summary>
                <div class="accordion-item-content">
                   <ul>
                       <li>Verifique o funcionamento de todas as torneiras e chuveiros.</li>
                       <li>Teste todas as tomadas e interruptores.</li>
                       <li>Fotografe o estado da pintura, pisos e janelas.</li>
                       <li>Cheque se há sinais de infiltração ou mofo.</li>
                   </ul>
                </div>
            </details>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>