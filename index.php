<?php
require_once 'includes/config.php';

$page_title = '';
$page_description = 'Batterra je česká investiční společnost zaměřená na výstavbu a provoz moderních bateriových center. 100% transparentnost.';

include 'includes/header.php';
?>

<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Investice do budoucnosti energetiky</h1>
            <p class="hero-subtitle">
                Batterra je česká investiční společnost zaměřená na výstavbu a provoz moderních bateriových center. 
                Naším cílem je poskytnout investorům stabilní výnosy při 100% transparentnosti.
            </p>
            <div class="hero-cta">
                <a href="/investicni-model.php" class="btn btn-primary btn-lg">
                    Zjistit více o investici
                </a>
                <a href="/kontakt.php" class="btn btn-secondary btn-lg">
                    Domluvit schůzku
                </a>
            </div>
        </div>
    </div>
</section>

<section class="about-preview">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>O společnosti</h2>
                <p>
                    Batterra a.s. je česká investiční společnost zaměřená na výstavbu a provoz moderních bateriových center. 
                    Našim cílem je poskytnout investorům stabilní výnosy při 100% transparentnosti.
                </p>
                <p>
                    Projektujeme a realizujemy bateriová centra s důrazem na vysokou kvalitu, bezpečnost a dlouhodobou 
                    udržitelnost. Každý náš projekt prochází důkladnou analýzou a je optimalizován pro maximální efektivitu.
                </p>
                <a href="/o-spolecnosti.php" class="btn btn-outline">Více o nás</a>
            </div>
            <div class="about-stats">
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Transparentnost</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">6</span>
                    <span class="stat-label">Plánovaných projektů</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">200MW</span>
                    <span class="stat-label">Celková kapacita</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">2026</span>
                    <span class="stat-label">Zahájení provozu</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="projects-preview">
    <div class="container">
        <div class="section-header">
            <h2>Projekty</h2>
            <p class="section-subtitle">
                Projektujeme a realizujme česká bateriová centra s důrazem na vysokou kvalitu, 
                bezpečnost a dlouhodobou udržitelnost. Každý projekt je optimalizován pro maximální efektivitu.
            </p>
        </div>
        
        <div class="projects-grid">
            <div class="card project-card">
                <div class="card-body">
                    <h3>Projekt A</h3>
                    <div class="project-location">Brno</div>
                    <div class="project-capacity">20 MW</div>
                    <p>
                        Projekt Průhonice je jeden z prvních bateriových center v České republice. 
                        Je zaměřen na poskytování služeb avotrimizace energii.
                    </p>
                    <a href="/projekt.php?id=projekt-a" class="btn btn-outline">Detail projektu</a>
                </div>
            </div>
            
            <div class="card project-card">
                <div class="card-body">
                    <h3>Projekt B</h3>
                    <div class="project-location">Ostrova</div>
                    <div class="project-capacity">50 MWh</div>
                    <p>
                        Strategicky umístěný projekt v regionu s vysokou poptávkou 
                        po regulačních službách a optimalizaci přetoků v síti.
                    </p>
                    <a href="/projekt.php?id=projekt-b" class="btn btn-outline">Detail projektu</a>
                </div>
            </div>
            
            <div class="card project-card">
                <div class="card-body">
                    <h3>Projekt C</h3>
                    <div class="project-location">Germanyo</div>
                    <div class="project-capacity">30 MW</div>
                    <p>
                        Moderní bateriové centrum s nejnovějšími technologiemi 
                        pro maximální efektivitu a dlouhodobou stabilitu provozu.
                    </p>
                    <a href="/projekt.php?id=projekt-c" class="btn btn-outline">Detail projektu</a>
                </div>
            </div>
        </div>
        
        <div class="text-center">
            <a href="/projekty.php" class="btn btn-primary btn-lg">Všechny projekty</a>
        </div>
    </div>
</section>

<section class="investment-model-preview">
    <div class="container">
        <div class="section-header">
            <h2>Investiční model</h2>
            <p class="section-subtitle">
                Náš investiční model je jednoduchý, srozumitelný a 100% transparentní.
            </p>
        </div>
        
        <div class="investment-flow">
            <div class="investment-step active">
                <div class="investment-step-icon">💰</div>
                <h3 class="investment-step-title">Investice</h3>
                <p class="investment-step-description">
                    Vstupní kapitál, harmonogram čerpání
                </p>
            </div>
            <div class="investment-arrow"></div>
            <div class="investment-step">
                <div class="investment-step-icon">⚡</div>
                <h3 class="investment-step-title">Provoz</h3>
                <p class="investment-step-description">
                    Optimalizace příjmů, provozní řízení, údržba
                </p>
            </div>
            <div class="investment-arrow"></div>
            <div class="investment-step">
                <div class="investment-step-icon">📈</div>
                <h3 class="investment-step-title">Výnosy</h3>
                <p class="investment-step-description">
                    Tržby ze služeb, síté a obchodování s elektřinou
                </p>
            </div>
            <div class="investment-arrow"></div>
            <div class="investment-step">
                <div class="investment-step-icon">🎯</div>
                <h3 class="investment-step-title">Exit</h3>
                <p class="investment-step-description">
                    Prodej projektu, refinancování, odkup
                </p>
            </div>
        </div>
        
        <div class="investment-benefits">
            <div class="benefit-item">
                <div class="benefit-icon">⏱️</div>
                <h3 class="benefit-title">Stabilita</h3>
                <p class="benefit-description">
                    Dlouhodobý projekt s reálnými výnosy
                </p>
            </div>
            <div class="benefit-item">
                <div class="benefit-icon">🔧</div>
                <h3 class="benefit-title">Provoz</h3>
                <p class="benefit-description">
                    Optimalizace příjmů a účinnosti
                </p>
            </div>
            <div class="benefit-item">
                <div class="benefit-icon">💎</div>
                <h3 class="benefit-title">Výnosy</h3>
                <p class="benefit-description">
                    Výnosy, nákrazy cash flow
                </p>
            </div>
        </div>
        
        <div class="text-center">
            <a href="/investicni-model.php" class="btn btn-primary btn-lg">
                Chci vědět, jak se mohu zapojit
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>