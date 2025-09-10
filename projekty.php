<?php
require_once 'includes/config.php';

$page_title = 'Projekty';
$page_description = 'Projektujeme a realizujeme česká bateriová centra s důrazem na vysokou kvalitu, bezpečnost a dlouhodobou udržitelnost.';

// Sample project data (replace with database/CMS integration)
$projects = [
    [
        'id' => 'projekt-a',
        'name' => 'Projekt A',
        'location' => 'Brno',
        'capacity_mw' => 20,
        'capacity_mwh' => null,
        'status' => 'Ve výstavbě',
        'expected_operation' => 2026,
        'description' => 'Projekt Brno je jedním z prvních bateriových center v České republice. Je zaměřen na poskytování služeb automatizace energie správi síti a optimalizaci přenosů.',
        'progress' => 45,
        'investment_amount' => '50 mil. Kč',
        'expected_return' => 'IRR 8-12%',
        'financing_status' => 'Otevřeno',
    ],
    [
        'id' => 'projekt-b',
        'name' => 'Projekt B',
        'location' => 'Ostrova',
        'capacity_mw' => null,
        'capacity_mwh' => 50,
        'status' => 'Příprava',
        'expected_operation' => 2026,
        'description' => 'Strategicky umístěný projekt v regionu s vysokou poptávkou po regulačních službách a optimalizaci přetoků v síti.',
        'progress' => 15,
        'investment_amount' => '75 mil. Kč',
        'expected_return' => 'IRR 10-14%',
        'financing_status' => 'Otevřeno',
    ],
    [
        'id' => 'projekt-c',
        'name' => 'Projekt C',
        'location' => 'Germanyo',
        'capacity_mw' => 30,
        'capacity_mwh' => null,
        'status' => 'Plánování',
        'expected_operation' => 2027,
        'description' => 'Moderní bateriové centrum s nejnovějšími technologiemi pro maximální efektivitu a dlouhodobou stabilitu provozu.',
        'progress' => 5,
        'investment_amount' => '90 mil. Kč',
        'expected_return' => 'IRR 9-13%',
        'financing_status' => 'Brzy',
    ],
];

include 'includes/header.php';
?>

<section class="contact-hero">
    <div class="container">
        <h1>Projekty</h1>
        <p>
            Projektujeme a realizujeme česká bateriová centra s důrazem na vysokou kvalitu, 
            bezpečnost a dlouhodobou udržitelnost. Každý projekt je optimalizován pro maximální efektivitu.
        </p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="projects-grid">
            <?php foreach ($projects as $project): ?>
            <div class="card project-card">
                <div class="card-body">
                    <h3><?php echo htmlspecialchars($project['name']); ?></h3>
                    <div class="project-location"><?php echo htmlspecialchars($project['location']); ?></div>
                    <div class="project-capacity">
                        <?php if ($project['capacity_mw']): ?>
                            <?php echo $project['capacity_mw']; ?> MW
                        <?php elseif ($project['capacity_mwh']): ?>
                            <?php echo $project['capacity_mwh']; ?> MWh
                        <?php endif; ?>
                    </div>
                    
                    <div class="project-meta" style="margin-bottom: var(--spacing-lg);">
                        <div class="meta-item">
                            <span class="meta-label">Stav</span>
                            <span class="meta-value text-primary"><?php echo htmlspecialchars($project['status']); ?></span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Uvedení do provozu</span>
                            <span class="meta-value"><?php echo $project['expected_operation']; ?></span>
                        </div>
                    </div>
                    
                    <p><?php echo htmlspecialchars($project['description']); ?></p>
                    
                    <div style="margin-bottom: var(--spacing-lg);">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: <?php echo $project['progress']; ?>%"></div>
                        </div>
                        <div class="text-sm text-gray">Postup projektu: <?php echo $project['progress']; ?>%</div>
                    </div>
                    
                    <div class="project-financials" style="margin-bottom: var(--spacing-lg);">
                        <div class="financial-item">
                            <span class="financial-label">Investiční náklady</span>
                            <span class="financial-value"><?php echo htmlspecialchars($project['investment_amount']); ?></span>
                        </div>
                        <div class="financial-item">
                            <span class="financial-label">Očekávaná návratnost</span>
                            <span class="financial-value text-primary"><?php echo htmlspecialchars($project['expected_return']); ?></span>
                        </div>
                        <div class="financial-item">
                            <span class="financial-label">Financování</span>
                            <span class="financial-value">
                                <?php if ($project['financing_status'] === 'Otevřeno'): ?>
                                    <span style="color: var(--color-primary);"><?php echo $project['financing_status']; ?></span>
                                <?php else: ?>
                                    <?php echo htmlspecialchars($project['financing_status']); ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    
                    <a href="/projekt.php?id=<?php echo urlencode($project['id']); ?>" class="btn btn-outline">
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
                    Výnosy, náklady cash flow
                </p>
            </div>
        </div>
    </div>
</section>

<section class="contact-cta">
    <div class="container">
        <h2>Máte zájem o investici?</h2>
        <p>Domluvte si schůzku s naším týmem a dozvíte se více.</p>
        <a href="/kontakt.php" class="btn btn-secondary btn-lg">
            Domluvit schůzku
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>