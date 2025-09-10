<?php
require_once 'includes/config.php';

// Get project ID from URL
$project_id = sanitize_input($_GET['id'] ?? '');

// Sample project data (replace with database/CMS integration)
$projects = [
    'projekt-a' => [
        'id' => 'projekt-a',
        'name' => 'Projekt A',
        'location' => 'Brno',
        'capacity_mw' => 20,
        'capacity_mwh' => 46,
        'status' => 'Ve výstavbě',
        'expected_operation' => 2026,
        'description' => 'Projekt Brno je jedním z prvních bateriových center v České republice zaměřená na provozování služby avotimizace energii správi síti a optimalizaci přenosů. Republika je zaměřena pro provozování služby avotimizace energii správi síti a optimalizaci přebytků s cash flow, a optimalizaci přebytků s prěkývadati.',
        'detailed_description' => 'Bateriové centrum v Brně představuje strategickou investici do budoucnosti české energetiky. Projekt zahrnuje instalaci moderních lithium-ion baterií s celkovou kapacitou 20 MW / 46 MWh. Centrum bude poskytovat regulační služby pro přenos sourstavě a optimalizovat toky elektřiny v regionální síti. Lokace byla vybrána na základě důkladné analýzy energetických potřeb regionu a dostupnosti síťové infrastruktury.',
        'progress' => 45,
        'investment_amount' => 50000000, // in CZK
        'expected_return_min' => 8,
        'expected_return_max' => 12,
        'financing_status' => 'Otevřeno',
        'technical_specs' => [
            'Typ baterií' => 'Lithium-ion',
            'Výkon' => '20 MW',
            'Kapacita' => '46 MWh',
            'Efektivita' => '92%',
            'Životnost' => '20 let',
            'Servisní dostupnost' => '98%',
        ],
        'financial_details' => [
            'Celková investice' => '50 mil. Kč',
            'Vstupní investice' => '15 mil. Kč',
            'Harmonogram čerpání' => 'Q1 2025 - Q3 2025',
            'Očekávané roční výnosy' => '5-8 mil. Kč',
            'Očekávaná návratnost (IRR)' => '8-12%',
            'Doba návratnosti' => '8-10 let',
            'Exit možnosti' => 'Prodej, refinancování',
        ],
        'timeline' => [
            ['date' => '2024-Q4', 'event' => 'Získání všech povolení', 'completed' => true],
            ['date' => '2025-Q1', 'event' => 'Zahájení výstavby', 'completed' => false],
            ['date' => '2025-Q3', 'event' => 'Instalace baterií', 'completed' => false],
            ['date' => '2025-Q4', 'event' => 'Testovací provoz', 'completed' => false],
            ['date' => '2026-Q1', 'event' => 'Komerční provoz', 'completed' => false],
        ],
    ],
    'projekt-b' => [
        'id' => 'projekt-b',
        'name' => 'Projekt B',
        'location' => 'Ostrova',
        'capacity_mw' => 25,
        'capacity_mwh' => 50,
        'status' => 'Příprava',
        'expected_operation' => 2026,
        'description' => 'Strategicky umístěný projekt v regionu s vysokou poptávkou po regulačních službách a optimalizaci přetoků v síti.',
        'detailed_description' => 'Projekt Ostrova se zaměřuje na poskytování regulačních služeb v oblasti s vysokou penetrací obnovitelných zdrojů. Bateriové centrum bude hrát klíčovou roli při vyrovnávání výkyvů v síti způsobených větrnou a solární energetikou. Lokace byla vybrána na základě analýzy síťových toků a potřeby regulačních služeb v dané oblasti.',
        'progress' => 15,
        'investment_amount' => 75000000,
        'expected_return_min' => 10,
        'expected_return_max' => 14,
        'financing_status' => 'Otevřeno',
        'technical_specs' => [
            'Typ baterií' => 'Lithium-ion',
            'Výkon' => '25 MW',
            'Kapacita' => '50 MWh',
            'Efektivita' => '94%',
            'Životnost' => '20 let',
            'Servisní dostupnost' => '99%',
        ],
        'financial_details' => [
            'Celková investice' => '75 mil. Kč',
            'Vstupní investice' => '20 mil. Kč',
            'Harmonogram čerpání' => 'Q2 2025 - Q4 2025',
            'Očekávané roční výnosy' => '8-12 mil. Kč',
            'Očekávaná návratnost (IRR)' => '10-14%',
            'Doba návratnosti' => '7-9 let',
            'Exit možnosti' => 'Prodej, refinancování, IPO',
        ],
        'timeline' => [
            ['date' => '2025-Q1', 'event' => 'Dokončení projektové dokumentace', 'completed' => false],
            ['date' => '2025-Q2', 'event' => 'Stavební povolení', 'completed' => false],
            ['date' => '2025-Q3', 'event' => 'Zahájení výstavby', 'completed' => false],
            ['date' => '2026-Q1', 'event' => 'Instalace technologií', 'completed' => false],
            ['date' => '2026-Q2', 'event' => 'Uvedení do provozu', 'completed' => false],
        ],
    ],
    'projekt-c' => [
        'id' => 'projekt-c',
        'name' => 'Projekt C',
        'location' => 'Germanyo',
        'capacity_mw' => 30,
        'capacity_mwh' => 60,
        'status' => 'Plánování',
        'expected_operation' => 2027,
        'description' => 'Moderní bateriové centrum s nejnovějšími technologiemi pro maximální efektivitu a dlouhodobou stabilitu provozu.',
        'detailed_description' => 'Projekt Germanyo představuje naši nejambicióznější investici do bateriových technologií. Centrum bude vybaveno nejmodernějšími battery management systémy a bude sloužit jako pilotní projekt pro testování nových provozních strategií. Projekt je navržen s ohledem na budoucí rozšíření a implementaci nových technologií.',
        'progress' => 5,
        'investment_amount' => 90000000,
        'expected_return_min' => 9,
        'expected_return_max' => 13,
        'financing_status' => 'Brzy',
        'technical_specs' => [
            'Typ baterií' => 'Next-gen Lithium-ion',
            'Výkon' => '30 MW',
            'Kapacita' => '60 MWh',
            'Efektivita' => '95%',
            'Životnost' => '25 let',
            'Servisní dostupnost' => '99.5%',
        ],
        'financial_details' => [
            'Celková investice' => '90 mil. Kč',
            'Vstupní investice' => '25 mil. Kč',
            'Harmonogram čerpání' => 'Q1 2026 - Q3 2026',
            'Očekávané roční výnosy' => '10-15 mil. Kč',
            'Očekávaná návratnost (IRR)' => '9-13%',
            'Doba návratnosti' => '8-10 let',
            'Exit možnosti' => 'Strategický prodej, IPO',
        ],
        'timeline' => [
            ['date' => '2025-Q2', 'event' => 'Feasibility studie', 'completed' => false],
            ['date' => '2025-Q4', 'event' => 'Územní plánování', 'completed' => false],
            ['date' => '2026-Q2', 'event' => 'Stavební povolení', 'completed' => false],
            ['date' => '2026-Q4', 'event' => 'Zahájení výstavby', 'completed' => false],
            ['date' => '2027-Q2', 'event' => 'Komerční provoz', 'completed' => false],
        ],
    ],
];

// Check if project exists
if (!isset($projects[$project_id])) {
    header('HTTP/1.0 404 Not Found');
    include 'includes/header.php';
    echo '<div class="container section"><h1>Projekt nenalezen</h1><p>Požadovaný projekt neexistuje.</p><a href="/projekty.php" class="btn btn-primary">Zpět na projekty</a></div>';
    include 'includes/footer.php';
    exit;
}

$project = $projects[$project_id];

$page_title = htmlspecialchars($project['name']);
$page_description = htmlspecialchars($project['description']);

include 'includes/header.php';
?>

<section class="project-hero">
    <div class="container">
        <div class="project-header">
            <div class="project-info">
                <h1><?php echo htmlspecialchars($project['name']); ?></h1>
                <div class="project-meta">
                    <div class="meta-item">
                        <span class="meta-label">Základní údaje</span>
                        <span class="meta-value"><?php echo htmlspecialchars($project['location']); ?></span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Kapacita</span>
                        <span class="meta-value">
                            <?php echo $project['capacity_mw']; ?> MW / <?php echo $project['capacity_mwh']; ?> MWh
                        </span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Stav</span>
                        <span class="meta-value text-primary"><?php echo htmlspecialchars($project['status']); ?></span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Uvedení do provozu</span>
                        <span class="meta-value"><?php echo $project['expected_operation']; ?></span>
                    </div>
                </div>
                <p class="project-description"><?php echo htmlspecialchars($project['detailed_description']); ?></p>
            </div>
            
            <div class="project-sidebar">
                <h3>Finanční přehled</h3>
                
                <div style="margin-bottom: var(--spacing-lg);">
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: <?php echo $project['progress']; ?>%"></div>
                    </div>
                    <div class="text-sm text-gray">Postup projektu: <?php echo $project['progress']; ?>%</div>
                </div>
                
                <div class="project-financials">
                    <?php foreach ($project['financial_details'] as $label => $value): ?>
                    <div class="financial-item">
                        <span class="financial-label"><?php echo htmlspecialchars($label); ?></span>
                        <span class="financial-value"><?php echo htmlspecialchars($value); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <?php if ($project['financing_status'] === 'Otevřeno'): ?>
                <a href="/kontakt.php" class="btn btn-primary" style="width: 100%; margin-top: var(--spacing-lg);">
                    Investovat
                </a>
                <?php else: ?>
                <div class="btn btn-outline" style="width: 100%; margin-top: var(--spacing-lg); cursor: default; opacity: 0.6;">
                    <?php echo htmlspecialchars($project['financing_status']); ?>
                </div>
                <?php endif; ?>
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
                        <?php foreach ($project['technical_specs'] as $spec => $value): ?>
                        <div class="financial-item">
                            <span class="financial-label"><?php echo htmlspecialchars($spec); ?></span>
                            <span class="financial-value"><?php echo htmlspecialchars($value); ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            
            <div>
                <h2>Harmonogram projektu</h2>
                <div class="card">
                    <div class="card-body">
                        <?php foreach ($project['timeline'] as $milestone): ?>
                        <div style="display: flex; align-items: center; gap: var(--spacing-base); margin-bottom: var(--spacing-base); padding-bottom: var(--spacing-base); border-bottom: 1px solid var(--color-gray-lighter);">
                            <div style="width: 12px; height: 12px; border-radius: 50%; background-color: <?php echo $milestone['completed'] ? 'var(--color-primary)' : 'var(--color-gray-lighter)'; ?>; flex-shrink: 0;"></div>
                            <div style="flex: 1;">
                                <div style="font-weight: var(--font-weight-medium); color: <?php echo $milestone['completed'] ? 'var(--color-dark)' : 'var(--color-gray)'; ?>;">
                                    <?php echo htmlspecialchars($milestone['event']); ?>
                                </div>
                                <div style="font-size: var(--font-size-sm); color: var(--color-gray);">
                                    <?php echo htmlspecialchars($milestone['date']); ?>
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

<section class="section bg-gray-light">
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
                    <div class="benefit-icon" style="margin: 0 auto var(--spacing-base);">💻</div>
                    <h3 class="benefit-title">Live dashboard výkonu</h3>
                    <p class="benefit-description">
                        Sledování výkonu bateriového centra v reálném čase
                    </p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body text-center">
                    <div class="benefit-icon" style="margin: 0 auto var(--spacing-base);">📊</div>
                    <h3 class="benefit-title">Měsíční finanční report</h3>
                    <p class="benefit-description">
                        Podrobný přehled výnosů a nákladů
                    </p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body text-center">
                    <div class="benefit-icon" style="margin: 0 auto var(--spacing-base);">🔒</div>
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
            <a href="/kontakt.php" class="btn btn-secondary btn-lg">
                Domluvit schůzku
            </a>
            <a href="/projekty.php" class="btn btn-outline btn-lg">
                Další projekty
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>