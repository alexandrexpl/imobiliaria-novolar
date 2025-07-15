<?php include 'includes/header.php'; ?>

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
            
            <a href="detalhes-venda.php?id=1" class="property-card-link">
                <div class="property-card">
                    <img src="images/cobertura-luxo-v.png" alt="Imóvel à venda">
                    <div class="property-card-content">
                        <h3>Cobertura de Luxo</h3>
                        <p class="location">Centro, Canoas/RS</p>
                        <p class="price">R$ 2.600.000</p>
                    </div>
                </div>
            </a>

            <a href="detalhes-venda.php?id=2" class="property-card-link">
                <div class="property-card">
                    <img src="images/apartamento-moderno-v.png" alt="Imóvel à venda">
                    <div class="property-card-content">
                        <h3>Apartamento Moderno</h3>
                        <p class="location">Moinhos de Vento, Canoas/RS</p>
                        <p class="price">R$ 1.050.000</p>
                    </div>
                </div>
            </a>

            <a href="detalhes-venda.php?id=3" class="property-card-link">
                 <div class="property-card">
                    <img src="images/apartamento-moderno-v.png" alt="Imóvel à venda">
                    <div class="property-card-content">
                        <h3>Apartamento Moderno</h3>
                        <p class="location">Moinhos de Vento, Canoas/RS</p>
                        <p class="price">R$ 1.050.000</p>
                    </div>
                </div>
            </a>

            <a href="detalhes-venda.php?id=4" class="property-card-link">
                <div class="property-card">
                    <img src="images/apartamento-moderno-v.png" alt="Imóvel à venda">
                    <div class="property-card-content">
                        <h3>Apartamento Moderno</h3>
                        <p class="location">Moinhos de Vento, Canoas/RS</p>
                        <p class="price">R$ 1.050.000</p>
                    </div>
                </div>
            </a>

            <a href="detalhes-venda.php?id=5" class="property-card-link">
                <div class="property-card">
                    <img src="images/cobertura-luxo-v.png" alt="Imóvel à venda">
                    <div class="property-card-content">
                        <h3>Cobertura de Luxo</h3>
                        <p class="location">Centro, Canoas/RS</p>
                        <p class="price">R$ 2.600.000</p>
                    </div>
                </div>
            </a>

            <a href="detalhes-venda.php?id=6" class="property-card-link">
                <div class="property-card">
                    <img src="images/apartamento-moderno-v.png" alt="Imóvel à venda">
                    <div class="property-card-content">
                        <h3>Apartamento Moderno</h3>
                        <p class="location">Moinhos de Vento, Canoas/RS</p>
                        <p class="price">R$ 1.050.000</p>
                    </div>
                </div>
            </a>
            
            <a href="detalhes-venda.php?id=7" class="property-card-link">
                <div class="property-card">
                    <img src="images/apartamento-moderno-v.png" alt="Imóvel à venda">
                    <div class="property-card-content">
                        <h3>Apartamento Moderno</h3>
                        <p class="location">Moinhos de Vento, Canoas/RS</p>
                        <p class="price">R$ 1.050.000</p>
                    </div>
                </div>
            </a>

            <a href="detalhes-venda.php?id=8" class="property-card-link">
                <div class="property-card">
                    <img src="images/apartamento-moderno-v.png" alt="Imóvel à venda">
                    <div class="property-card-content">
                        <h3>Apartamento Moderno</h3>
                        <p class="location">Moinhos de Vento, Canoas/RS</p>
                        <p class="price">R$ 1.050.000</p>
                    </div>
                </div>
            </a>
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