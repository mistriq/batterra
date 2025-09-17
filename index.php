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
                <a href="./investicni-model.php" class="btn btn-primary btn-lg">
                    Zjistit více o investici
                </a>
                <a href="./kontakt.php" class="btn btn-secondary btn-lg">
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
                <a href="./o-spolecnosti.php" class="btn btn-outline">Více o nás</a>
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
        
        <div class="projects-grid scroll-animate stagger-animation">
            <?php 
            $featured_projects = array_slice(get_all_projects(), 0, 3);
            foreach ($featured_projects as $project): 
            ?>
            <div class="card project-card hover-lift">
                <div class="project-status">
                    <i class="fas <?php echo $project['status_details']['icon'] ?? 'fa-circle'; ?>" 
                       style="color: <?php echo $project['status_details']['color'] ?? '#999'; ?>"></i>
                    <span><?php echo $project['status_details']['name'] ?? $project['status']; ?></span>
                </div>
                <div class="card-body">
                    <h3><?php echo htmlspecialchars($project['name']); ?></h3>
                    <div class="project-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <?php echo htmlspecialchars($project['location']); ?>
                    </div>
                    <div class="project-capacity">
                        <i class="fas fa-battery-three-quarters"></i>
                        <?php echo $project['capacity']['power']; ?> <?php echo $project['capacity']['power_unit']; ?>
                    </div>
                    <p><?php echo htmlspecialchars($project['short_description']); ?></p>
                    <a href="./projekt.php?id=<?php echo urlencode($project['id']); ?>" class="btn btn-outline">
                        <i class="fas fa-arrow-right"></i>&nbsp;Detail projektu
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center">
            <a href="./projekty.php" class="btn btn-primary btn-lg">Všechny projekty</a>
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
        
        <div class="investment-flow scroll-animate">
            <div class="investment-step scroll-animate">
                <div class="investment-step-icon">
                    <i class="fas fa-coins"></i>
                </div>
                <h3 class="investment-step-title">Investice</h3>
                <p class="investment-step-description">
                    Vstupní kapitál, harmonogram čerpání
                </p>
            </div>
                <i class="fas fa-arrow-right"></i>
            <div class="investment-step scroll-animate">
                <div class="investment-step-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="investment-step-title">Provoz</h3>
                <p class="investment-step-description">
                    Optimalizace příjmů, provozní řízení, údržba
                </p>
            </div>
            <i class="fas fa-arrow-right"></i>
            <div class="investment-step scroll-animate">
                <div class="investment-step-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="investment-step-title">Výnosy</h3>
                <p class="investment-step-description">
                    Tržby ze služeb, síté a obchodování s elektřinou
                </p>
            </div>
            <i class="fas fa-arrow-right"></i>
            <div class="investment-step scroll-animate">
                <div class="investment-step-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3 class="investment-step-title">Exit</h3>
                <p class="investment-step-description">
                    Prodej projektu, refinancování, odkup
                </p>
            </div>
        </div>
        
        <div class="investment-benefits scroll-animate stagger-animation">
            <div class="benefit-item">
                <div class="benefit-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="benefit-title">Stabilita</h3>
                <p class="benefit-description">
                    Dlouhodobé projekty s předvídatelnými výnosy
                </p>
            </div>
            <div class="benefit-item">
                <div class="benefit-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="benefit-title">Provoz</h3>
                <p class="benefit-description">
                    Profesionální správa a optimalizace výnosů
                </p>
            </div>
            <div class="benefit-item">
                <div class="benefit-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h3 class="benefit-title">Výnosy</h3>
                <p class="benefit-description">
                    Diverzifikované příjmy a pravidelné výplaty
                </p>
            </div>
        </div>
        
        <br>

        <div class="text-center">
            <a href="./investicni-model.php" class="btn btn-primary btn-lg">
                Chci vědět, jak se mohu zapojit
            </a>
        </div>
    </div>
</section>


<?php include 'includes/footer.php'; ?>