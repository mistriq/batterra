<?php
require_once 'includes/config.php';

$page_title = 'Investiční model';
$page_description = 'Náš investiční model je jednoduchý, srozumitelný a 100% transparentní. Zjistěte, jak funguje investice do bateriových center.';

include 'includes/header.php';
?>

<section class="page-hero investment-hero">
    <div class="container">
        <h1>Investiční model</h1>
        <p class="hero-subtitle">
            Náš investiční model je jednoduchý, srozumitelný a 100% transparentní.
        </p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="investment-process">
            <div class="process-step scroll-animate">
                <div class="step-icon">
                    <i class="fas fa-coins"></i>
                </div>
                <div class="step-content">
                    <h2>Investice</h2>
                    <p class="step-subtitle">Vstupní kapitál, harmonogram čerpání</p>
                    <ul>
                        <li>Minimální investice od 5 mil. Kč</li>
                        <li>Postupné čerpání dle harmonogramu výstavby</li>
                        <li>Transparentní struktura nákladů</li>
                        <li>Detailní investiční smlouva</li>
                    </ul>
                </div>
            </div>

            <div class="process-arrow">↓</div>

            <div class="process-step scroll-animate">
                <div class="step-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="step-content">
                    <h2>Provoz</h2>
                    <p class="step-subtitle">Optimalizace příjmů, provozní řízení, údržba</p>
                    <ul>
                        <li>Profesionální správa bateriových center</li>
                        <li>24/7 monitoring a řízení</li>
                        <li>Optimalizace výnosů pomocí AI</li>
                        <li>Preventivní údržba a servis</li>
                    </ul>
                </div>
            </div>

            <div class="process-arrow">↓</div>

            <div class="process-step scroll-animate">
                <div class="step-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="step-content">
                    <h2>Výnosy</h2>
                    <p class="step-subtitle">Tržby ze služeb sítě a obchodování s elektřinou</p>
                    <ul>
                        <li>Regulované příjmy z podpůrných služeb</li>
                        <li>Arbitráž na spotovém trhu</li>
                        <li>Dlouhodobé kontrakty (PPA)</li>
                        <li>Pravidelné čtvrtletní výplaty</li>
                    </ul>
                </div>
            </div>

            <div class="process-arrow">↓</div>

            <div class="process-step scroll-animate">
                <div class="step-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <div class="step-content">
                    <h2>Exit</h2>
                    <p class="step-subtitle">Prodej projektu, refinancování, odkup</p>
                    <ul>
                        <li>Plánovaný exit po 7-10 letech</li>
                        <li>Možnost předčasného odkupu</li>
                        <li>Prodej strategickému investorovi</li>
                        <li>Refinancování a pokračování provozu</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="section-header">
            <h2>Klíčové parametry investice</h2>
        </div>
        
        <div class="parameters-grid scroll-animate stagger-animation">
            <div class="parameter-card">
                <h3>Minimální investice</h3>
                <div class="parameter-value">5 mil. Kč</div>
                <p>Vstupní kapitál pro účast v projektu</p>
            </div>
            
            <div class="parameter-card">
                <h3>Očekávaný výnos</h3>
                <div class="parameter-value">8-12% p.a.</div>
                <p>Roční výnos před zdaněním</p>
            </div>
            
            <div class="parameter-card">
                <h3>Doba investice</h3>
                <div class="parameter-value">7-10 let</div>
                <p>Plánovaný investiční horizont</p>
            </div>
            
            <div class="parameter-card">
                <h3>Výplata výnosů</h3>
                <div class="parameter-value">Čtvrtletně</div>
                <p>Pravidelné výplaty z provozu</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h2>Struktura příjmů</h2>
            <p class="section-subtitle">
                Diverzifikované portfolio příjmů zajišťuje stabilitu výnosů
            </p>
        </div>
        
        <div class="revenue-structure">
            <div class="revenue-chart">
                <canvas id="revenueChart" width="400" height="400"></canvas>
            </div>
            
            <div class="revenue-details">
                <div class="revenue-item">
                    <div class="revenue-color" style="background: #1e3c72;"></div>
                    <div class="revenue-info">
                        <h4>Podpůrné služby (40%)</h4>
                        <p>Regulované příjmy za poskytování flexibility přenosové soustavě</p>
                    </div>
                </div>
                
                <div class="revenue-item">
                    <div class="revenue-color" style="background: #2a5298;"></div>
                    <div class="revenue-info">
                        <h4>Spotový trh (35%)</h4>
                        <p>Arbitráž mezi nízkými a vysokými cenami elektřiny</p>
                    </div>
                </div>
                
                <div class="revenue-item">
                    <div class="revenue-color" style="background: #4a7dc7;"></div>
                    <div class="revenue-info">
                        <h4>Dlouhodobé kontrakty (20%)</h4>
                        <p>PPA smlouvy s výrobci obnovitelné energie</p>
                    </div>
                </div>
                
                <div class="revenue-item">
                    <div class="revenue-color" style="background: #7ba7e7;"></div>
                    <div class="revenue-info">
                        <h4>Ostatní služby (5%)</h4>
                        <p>Doplňkové služby a optimalizace</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="section-header">
            <h2>Proces investice</h2>
        </div>
        
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-marker">1</div>
                <div class="timeline-content">
                    <h3>Úvodní konzultace</h3>
                    <p>Seznámení s projektem a investičními podmínkami</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">2</div>
                <div class="timeline-content">
                    <h3>Due diligence</h3>
                    <p>Detailní analýza projektu a dokumentace</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">3</div>
                <div class="timeline-content">
                    <h3>Investiční smlouva</h3>
                    <p>Příprava a podpis investiční dokumentace</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">4</div>
                <div class="timeline-content">
                    <h3>Čerpání kapitálu</h3>
                    <p>Postupné čerpání dle harmonogramu výstavby</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">5</div>
                <div class="timeline-content">
                    <h3>Zahájení provozu</h3>
                    <p>Spuštění bateriového centra a generování výnosů</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">6</div>
                <div class="timeline-content">
                    <h3>Pravidelné výplaty</h3>
                    <p>Čtvrtletní distribuce výnosů investorům</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="features-grid scroll-animate stagger-animation">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>Jasný a přehledný proces</h3>
                <p>Transparentní investiční model s jasně definovanými kroky</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-database"></i>
                </div>
                <h3>Kompletní přístup k údajům v každé fázi</h3>
                <p>Online dashboard s real-time daty o výkonnosti projektu</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Ověřené postupy a konzervativní odhady</h3>
                <p>Realistické projekce založené na zkušenostech z trhu</p>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Chci vědět, jak se mohu zapojit</h2>
            <p>
                Kontaktujte nás pro detailní informace o investičních příležitostech
            </p>
            <a href="/kontakt.php" class="btn btn-primary btn-lg">
                Domluvit schůzku
            </a>
        </div>
    </div>
</section>


<?php include 'includes/footer.php'; ?>