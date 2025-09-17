<?php
require_once 'includes/config.php';

$page_title = 'Projekty';
$page_description = 'Projektujeme a realizujeme česká bateriová centra s důrazem na vysokou kvalitu, bezpečnost a dlouhodobou udržitelnost.';

// Load projects from JSON
$projects = get_all_projects();

include 'includes/header.php';
?>

<section class="page-hero projects-hero">
    <div class="container">
        <h1>Naše projekty</h1>
        <p class="hero-subtitle">
            Projektujeme a realizujeme česká bateriová centra s důrazem na vysokou kvalitu, 
            bezpečnost a dlouhodobou udržitelnost. Každý projekt je optimalizován pro maximální efektivitu.
        </p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="projects-grid scroll-animate stagger-animation">
            <?php foreach ($projects as $project): ?>
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
                        <?php echo $project['capacity']['power']; ?> <?php echo $project['capacity']['power_unit']; ?> / 
                        <?php echo $project['capacity']['energy']; ?> <?php echo $project['capacity']['energy_unit']; ?>
                    </div>
                    
                    <div class="project-meta">
                        <div class="meta-item">
                            <span class="meta-label">Zahájení provozu</span>
                            <span class="meta-value"><?php echo format_czech_date($project['timeline']['operation_start']); ?></span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Investice</span>
                            <span class="meta-value"><?php echo format_currency($project['investment']['total']); ?></span>
                        </div>
                    </div>
                    
                    <p><?php echo htmlspecialchars($project['short_description']); ?></p>
                    
                    <?php $progress = calculate_project_progress($project['timeline']); ?>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="progress-fill" style="--progress-width: <?php echo $progress; ?>%"></div>
                        </div>
                        <div class="progress-label">Postup projektu: <?php echo $progress; ?>%</div>
                    </div>
                    
                    <div class="project-highlights">
                        <div class="highlight-item">
                            <i class="fas fa-chart-line"></i>
                            <span><?php echo $project['investment']['expected_return']; ?></span>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-coins"></i>
                            <span>Min. <?php echo format_currency($project['investment']['min_investment']); ?></span>
                        </div>
                    </div>
                    
                    <a href="./projekt.php?id=<?php echo urlencode($project['id']); ?>" class="btn btn-primary btn-block">
                        <i class="fas fa-arrow-right"></i>
                        Detail projektu
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section bg-gray-light">
    <div class="container">
        <div class="section-header">
            <h2>Stabilita • Provoz • Výnosy</h2>
            <p class="section-subtitle">
                Projektujeme prioritně na českem trhu a vybíráme projekty se střednímu finančnímu rizikemu 
                a stabilním výnosům. Každý projekt prokladáá pravidelné reporty pro uktáníci.
            </p>
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
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="benefit-title">Výnosy</h3>
                <p class="benefit-description">
                    Diverzifikované příjmy a pravidelné výplaty
                </p>
            </div>
        </div>
    </div>
</section>

<section class="contact-cta">
    <div class="container">
        <h2>Máte zájem o investici?</h2>
        <p>Domluvte si schůzku s naším týmem a dozvíte se více.</p>
        <a href="./kontakt.php" class="btn btn-secondary btn-lg">
            Domluvit schůzku
        </a>
    </div>
</section>


<?php include 'includes/footer.php'; ?>