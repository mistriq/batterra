<?php
require_once 'includes/config.php';

// Get project ID from URL
$project_id = sanitize_input($_GET['id'] ?? '');

// Load project from JSON
$project = get_project_by_id($project_id);

// Check if project exists
if (!$project) {
    header('HTTP/1.0 404 Not Found');
    include 'includes/header.php';
    echo '<div class="container section"><h1>Projekt nenalezen</h1><p>Požadovaný projekt neexistuje.</p><a href="./projekty.php" class="btn btn-primary">Zpět na projekty</a></div>';
    include 'includes/footer.php';
    exit;
}

$page_title = htmlspecialchars($project['name']);
$page_description = htmlspecialchars($project['short_description']);

include 'includes/header.php';
?>

<section class="project-hero">
    <div class="container">
        <div class="project-header">
            <div class="project-info">
                <h1><?php echo htmlspecialchars($project['name']); ?></h1>
                <div class="project-meta">
                    <div class="meta-item">
                        <span class="meta-label">Lokace</span>
                        <span class="meta-value">
                            <i class="fas fa-map-marker-alt"></i>
                            <?php echo htmlspecialchars($project['location']); ?>
                        </span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Kapacita</span>
                        <span class="meta-value">
                            <i class="fas fa-battery-three-quarters"></i>
                            <?php echo $project['capacity']['power']; ?> <?php echo $project['capacity']['power_unit']; ?> / <?php echo $project['capacity']['energy']; ?> <?php echo $project['capacity']['energy_unit']; ?>
                        </span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Stav</span>
                        <span class="meta-value" style="color: <?php echo $project['status_details']['color']; ?>">
                            <i class="fas <?php echo $project['status_details']['icon']; ?>"></i>
                            <?php echo htmlspecialchars($project['status_details']['name']); ?>
                        </span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Uvedení do provozu</span>
                        <span class="meta-value">
                            <i class="fas fa-calendar"></i>
                            <?php echo format_czech_date($project['timeline']['operation_start']); ?>
                        </span>
                    </div>
                </div>
                <p class="project-description"><?php echo htmlspecialchars($project['description']); ?></p>
            </div>
            
            <div class="project-sidebar">
                <h3>Finanční přehled</h3>
                
                <?php $progress = calculate_project_progress($project['timeline']); ?>
                <div style="margin-bottom: var(--spacing-lg);">
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: <?php echo $progress; ?>%"></div>
                    </div>
                    <div class="text-sm text-gray">Postup projektu: <?php echo $progress; ?>%</div>
                </div>
                
                <div class="project-financials">
                    <div class="financial-item">
                        <span class="financial-label">Celková investice</span>
                        <span class="financial-value"><?php echo format_currency($project['investment']['total']); ?></span>
                    </div>
                    <div class="financial-item">
                        <span class="financial-label">Minimální investice</span>
                        <span class="financial-value"><?php echo format_currency($project['investment']['min_investment']); ?></span>
                    </div>
                    <div class="financial-item">
                        <span class="financial-label">Očekávaná návratnost</span>
                        <span class="financial-value text-primary"><?php echo $project['investment']['expected_return']; ?></span>
                    </div>
                    <div class="financial-item">
                        <span class="financial-label">Doba projektu</span>
                        <span class="financial-value"><?php echo $project['timeline']['project_lifetime']; ?> let</span>
                    </div>
                </div>
                
                <a href="./kontakt.php" class="btn btn-primary" style="width: 100%; margin-top: var(--spacing-lg);">
                    <i class="fas fa-envelope"></i>
                    Investovat
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="grid grid-cols-2 gap-xl">
            <div>
                <h2>Technické specifikace</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="financial-item">
                            <span class="financial-label">Typ baterie</span>
                            <span class="financial-value"><?php echo htmlspecialchars($project['technology']['type']); ?></span>
                        </div>
                        <div class="financial-item">
                            <span class="financial-label">Výrobce</span>
                            <span class="financial-value"><?php echo htmlspecialchars($project['technology']['manufacturer']); ?></span>
                        </div>
                        <div class="financial-item">
                            <span class="financial-label">Počet cyklů</span>
                            <span class="financial-value"><?php echo number_format($project['technology']['cycles']); ?></span>
                        </div>
                        <div class="financial-item">
                            <span class="financial-label">Efektivita</span>
                            <span class="financial-value"><?php echo ($project['technology']['efficiency'] * 100); ?>%</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div>
                <h2>Harmonogram projektu</h2>
                <div class="card">
                    <div class="card-body">
                        <?php 
                        $milestones = [
                            ['date' => $project['timeline']['planning_start'], 'event' => 'Zahájení plánování', 'completed' => true],
                            ['date' => $project['timeline']['construction_start'], 'event' => 'Zahájení výstavby', 'completed' => strtotime($project['timeline']['construction_start']) <= time()],
                            ['date' => $project['timeline']['operation_start'], 'event' => 'Uvedení do provozu', 'completed' => strtotime($project['timeline']['operation_start']) <= time()]
                        ];
                        foreach ($milestones as $milestone): ?>
                        <div style="display: flex; align-items: center; gap: var(--spacing-base); margin-bottom: var(--spacing-base); padding-bottom: var(--spacing-base); border-bottom: 1px solid var(--color-gray-lighter);">
                            <div style="width: 12px; height: 12px; border-radius: 50%; background-color: <?php echo $milestone['completed'] ? 'var(--color-primary)' : 'var(--color-gray-lighter)'; ?>; flex-shrink: 0;"></div>
                            <div style="flex: 1;">
                                <div style="font-weight: var(--font-weight-medium); color: <?php echo $milestone['completed'] ? 'var(--color-dark)' : 'var(--color-gray)'; ?>;">
                                    <?php echo htmlspecialchars($milestone['event']); ?>
                                </div>
                                <div style="font-size: var(--font-size-sm); color: var(--color-gray);">
                                    <?php echo format_czech_date($milestone['date']); ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="section-header">
            <h2>Struktura příjmů</h2>
            <p class="section-subtitle">
                Diverzifikované portfolio příjmů zajišťuje stabilitu výnosů
            </p>
        </div>
        
        <div class="revenue-breakdown">
            <?php foreach ($project['revenue_streams'] as $stream): ?>
                <div class="revenue-item">
                    <div class="revenue-bar" style="width: <?php echo $stream['percentage']; ?>%"></div>
                    <div class="revenue-info">
                        <span class="revenue-label"><?php echo $stream['type']; ?></span>
                        <span class="revenue-percentage"><?php echo $stream['percentage']; ?>%</span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h2>Transparentnost</h2>
            <p class="section-subtitle">
                Každý projekt obsahuje pravidelné reporty pro investory
            </p>
        </div>
        
        <div class="grid grid-cols-3 gap-xl">
            <div class="card">
                <div class="card-body text-center">
                    <div class="benefit-icon" style="margin: 0 auto var(--spacing-base);">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <h3 class="benefit-title">Live dashboard výkonu</h3>
                    <p class="benefit-description">
                        Sledování výkonu bateriového centra v reálném čase
                    </p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body text-center">
                    <div class="benefit-icon" style="margin: 0 auto var(--spacing-base);">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3 class="benefit-title">Měsíční finanční report</h3>
                    <p class="benefit-description">
                        Podrobný přehled výnosů a nákladů
                    </p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body text-center">
                    <div class="benefit-icon" style="margin: 0 auto var(--spacing-base);">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3 class="benefit-title">Přístup ke smlouvám a auditům</h3>
                    <p class="benefit-description">
                        Úplná transparentnost všech dokumentů
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-cta">
    <div class="container">
        <h2>Máte zájem o tento projekt?</h2>
        <p>Domluvte si schůzku s naším týmem a dozvíte se více.</p>
        <div style="display: flex; gap: var(--spacing-lg); justify-content: center;">
            <a href="./kontakt.php" class="btn btn-secondary btn-lg">
                <i class="fas fa-handshake"></i>
                Domluvit schůzku
            </a>
            <a href="./projekty.php" class="btn btn-outline btn-lg">
                <i class="fas fa-arrow-left"></i>
                Další projekty
            </a>
        </div>
    </div>
</section>


<?php include 'includes/footer.php'; ?>