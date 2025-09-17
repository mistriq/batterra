<?php
require_once 'includes/config.php';

// Check if viewing individual article
$article_id = $_GET['article'] ?? null;

$page_title = $article_id ? '' : 'Aktuality';
$page_description = 'Nejnovější zprávy, tiskové zprávy a informace o projektech Batterra.';

// Sample news data - in production, this would come from a database
$news_items = [
    [
        'id' => 'novy-projekt-brno',
        'title' => 'Nový projekt bateriového centra v Brně',
        'category' => 'Projekty',
        'date' => '2024-04-16',
        'excerpt' => 'V Brně se chystá výstavba nového bateriového centra, které bude mít kapacitu až 50 MWh. Projekt je nyní ve fázi příprav a schvalování.',
        'content' => 'V Brně se chystá výstavba nového bateriového centra, které bude mít kapacitu až 50 MWh. Projekt je nyní ve fázi příprav a schvalování. Očekává se, že výstavba začne v druhé polovině roku 2024 a centrum bude uvedeno do provozu v roce 2026.',
        'image' => null
    ],
    [
        'id' => 'legislativa-bateriova-centra',
        'title' => 'ČR: Legislativa pro bateriová centra',
        'category' => 'Legislativa',
        'date' => '2024-04-08',
        'excerpt' => 'Nově schválený zákon o bateriových centrech přináší změny v povolovacích procesech a pravidlech pro provoz.',
        'content' => 'Nově schválený zákon o bateriových centrech přináší změny v povolovacích procesech a pravidlech pro provoz. Zákon zjednodušuje administrativní procesy a vytváří lepší podmínky pro rozvoj bateriových úložišť v České republice.',
        'image' => null
    ],
    [
        'id' => 'vysledky-q1-2024',
        'title' => 'Tisková zpráva: Výsledky za první čtvrtletí 2024',
        'category' => 'Tiskové zprávy',
        'date' => '2024-04-02',
        'excerpt' => 'Batterra a.s. zveřejnila hospodářské výsledky za první čtvrtletí 2024 se zaměřením na růst a nové investiční příležitosti.',
        'content' => 'Batterra a.s. zveřejnila hospodářské výsledky za první čtvrtletí 2024 se zaměřením na růst a nové investiční příležitosti. Společnost vykázala růst investičních závazků o 35% oproti stejnému období minulého roku.',
        'image' => null
    ],
    [
        'id' => 'ceny-elektriny-klesaji',
        'title' => 'Ceny elektřiny na trhu klesají',
        'category' => 'Trh',
        'date' => '2024-03-25',
        'excerpt' => 'Trh o elektřinou zaznamenává pokles cen, což má dopad na provoz a ekonomiku bateriových center.',
        'content' => 'Trh o elektřinou zaznamenává pokles cen, což má dopad na provoz a ekonomiku bateriových center. Díky našemu diverzifikovanému modelu příjmů však tento pokles nemá zásadní vliv na výnosnost našich projektů.',
        'image' => null
    ],
    [
        'id' => 'konference-energy-storage',
        'title' => 'Batterra na konferenci Energy Storage Summit 2024',
        'category' => 'Události',
        'date' => '2024-03-15',
        'excerpt' => 'Zástupci Batterra představili naše projekty na prestižní konferenci Energy Storage Summit v Praze.',
        'content' => 'Zástupci Batterra představili naše projekty na prestižní konferenci Energy Storage Summit v Praze. Prezentace se zaměřila na inovativní přístupy k optimalizaci výnosů bateriových center.',
        'image' => null
    ],
    [
        'id' => 'nova-technologie-bess',
        'title' => 'Nová generace BESS technologií',
        'category' => 'Technologie',
        'date' => '2024-03-10',
        'excerpt' => 'Představujeme nejnovější technologie bateriových systémů, které budou použity v našich projektech.',
        'content' => 'Představujeme nejnovější technologie bateriových systémů, které budou použity v našich projektech. Nové LFP baterie nabízejí vyšší bezpečnost, delší životnost a lepší ekonomiku provozu.',
        'image' => null
    ]
];

// If viewing individual article
if ($article_id) {
    $current_article = null;
    foreach ($news_items as $item) {
        if ($item['id'] === $article_id) {
            $current_article = $item;
            break;
        }
    }
    
    if (!$current_article) {
        header('HTTP/1.0 404 Not Found');
        include 'includes/header.php';
        echo '<div class="container section"><h1>Článek nenalezen</h1><p>Požadovaný článek neexistuje.</p><a href="./aktuality.php" class="btn btn-primary">Zpět na aktuality</a></div>';
        include 'includes/footer.php';
        exit;
    }
    
    $page_title = $current_article['title'];
    $page_description = $current_article['excerpt'];
    
    include 'includes/header.php';
    ?>
    
    <section class="article-hero">
        <div class="container">
            <nav class="breadcrumb">
                <a href="./">Domů</a>
                <span>/</span>
                <a href="./aktuality.php">Aktuality</a>
                <span>/</span>
                <span><?php echo htmlspecialchars($current_article['title']); ?></span>
            </nav>
            
            <div class="article-meta">
                <span class="article-category category-<?php echo strtolower(str_replace(' ', '-', $current_article['category'])); ?>">
                    <?php echo $current_article['category']; ?>
                </span>
                <span class="article-date">
                    <i class="fas fa-calendar"></i>
                    <?php echo format_czech_date($current_article['date']); ?>
                </span>
            </div>
            
            <h1 class="article-title"><?php echo htmlspecialchars($current_article['title']); ?></h1>
        </div>
    </section>
    
    <section class="section">
        <div class="container">
            <div class="article-layout">
                <div class="article-content">
                    <div class="article-text">
                        <?php echo nl2br(htmlspecialchars($current_article['content'])); ?>
                    </div>
                    
                    <div class="article-actions">
                        <a href="./aktuality.php" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i>
                            Zpět na aktuality
                        </a>
                        <button onclick="window.print()" class="btn btn-outline">
                            <i class="fas fa-print"></i>
                            Vytisknout
                        </button>
                    </div>
                </div>
                
                <aside class="article-sidebar">
                    <div class="sidebar-widget">
                        <h3>Související články</h3>
                        <div class="related-articles">
                            <?php
                            $related = array_filter($news_items, function($item) use ($current_article) {
                                return $item['id'] !== $current_article['id'] && 
                                       $item['category'] === $current_article['category'];
                            });
                            $related = array_slice($related, 0, 3);
                            
                            if (empty($related)) {
                                $related = array_filter($news_items, function($item) use ($current_article) {
                                    return $item['id'] !== $current_article['id'];
                                });
                                $related = array_slice($related, 0, 3);
                            }
                            
                            foreach ($related as $related_item): ?>
                            <div class="related-article">
                                <h4>
                                    <a href="?article=<?php echo $related_item['id']; ?>">
                                        <?php echo htmlspecialchars($related_item['title']); ?>
                                    </a>
                                </h4>
                                <div class="related-meta">
                                    <span class="related-date"><?php echo format_czech_date($related_item['date']); ?></span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div class="sidebar-widget">
                        <h3>Kontakt pro média</h3>
                        <p>Pro více informací kontaktujte naše PR oddělení:</p>
                        <div class="contact-info">
                            <p>
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:media@batterra.cz">media@batterra.cz</a>
                            </p>
                            <p>
                                <i class="fas fa-phone"></i>
                                <a href="tel:+420777888999">+420 777 888 999</a>
                            </p>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    
    
    <?php 
    include 'includes/footer.php';
    exit;
}

// Filter by category if provided
$selected_category = $_GET['category'] ?? 'all';
$search_query = $_GET['search'] ?? '';

if ($selected_category !== 'all') {
    $news_items = array_filter($news_items, function($item) use ($selected_category) {
        return strtolower($item['category']) === strtolower($selected_category);
    });
}

if ($search_query) {
    $news_items = array_filter($news_items, function($item) use ($search_query) {
        return stripos($item['title'], $search_query) !== false || 
               stripos($item['excerpt'], $search_query) !== false;
    });
}

// Pagination
$items_per_page = 4;
$total_items = count($news_items);
$total_pages = ceil($total_items / $items_per_page);
$current_page = max(1, min($total_pages, (int)($_GET['page'] ?? 1)));
$offset = ($current_page - 1) * $items_per_page;

$paginated_items = array_slice($news_items, $offset, $items_per_page);

include 'includes/header.php';
?>

<section class="page-hero news-hero">
    <div class="container">
        <h1>Aktuality</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="news-filters">
            <div class="filter-tabs">
                <a href="?category=all" class="filter-tab <?php echo $selected_category === 'all' ? 'active' : ''; ?>">
                    Vše
                </a>
                <a href="?category=projekty" class="filter-tab <?php echo $selected_category === 'projekty' ? 'active' : ''; ?>">
                    Projekty
                </a>
                <a href="?category=tiskové zprávy" class="filter-tab <?php echo $selected_category === 'tiskové zprávy' ? 'active' : ''; ?>">
                    Tiskové zprávy
                </a>
                <a href="?category=legislativa" class="filter-tab <?php echo $selected_category === 'legislativa' ? 'active' : ''; ?>">
                    Legislativa
                </a>
                <a href="?category=trh" class="filter-tab <?php echo $selected_category === 'trh' ? 'active' : ''; ?>">
                    Trh
                </a>
            </div>
            
            <div class="search-box">
                <form method="GET" action="">
                    <input type="text" 
                           name="search" 
                           placeholder="Hledat..." 
                           value="<?php echo htmlspecialchars($search_query); ?>"
                           class="search-input">
                    <?php if ($selected_category !== 'all'): ?>
                        <input type="hidden" name="category" value="<?php echo htmlspecialchars($selected_category); ?>">
                    <?php endif; ?>
                    <button type="submit" class="search-button">🔍</button>
                </form>
            </div>
        </div>
        
        <div class="news-layout">
            <div class="news-main">
                <?php if (empty($paginated_items)): ?>
                    <div class="no-results">
                        <p>Nebyly nalezeny žádné články odpovídající vašemu výběru.</p>
                    </div>
                <?php else: ?>
                    <div class="news-list">
                        <?php foreach ($paginated_items as $item): ?>
                            <article class="news-item">
                                <div class="news-meta">
                                    <span class="news-category category-<?php echo strtolower(str_replace(' ', '-', $item['category'])); ?>">
                                        <?php echo $item['category']; ?>
                                    </span>
                                    <span class="news-date">
                                        <?php echo format_czech_date($item['date']); ?>
                                    </span>
                                </div>
                                
                                <h2 class="news-title">
                                    <a href="?article=<?php echo $item['id']; ?>">
                                        <?php echo htmlspecialchars($item['title']); ?>
                                    </a>
                                </h2>
                                
                                <p class="news-excerpt">
                                    <?php echo htmlspecialchars($item['excerpt']); ?>
                                </p>
                                
                                <a href="?article=<?php echo $item['id']; ?>" class="read-more">
                                    Číst více →
                                </a>
                            </article>
                        <?php endforeach; ?>
                    </div>
                    
                    <?php if ($total_pages > 1): ?>
                        <div class="pagination">
                            <?php if ($current_page > 1): ?>
                                <a href="?page=<?php echo $current_page - 1; ?>&category=<?php echo $selected_category; ?>&search=<?php echo urlencode($search_query); ?>" 
                                   class="page-link">
                                    ← Předchozí
                                </a>
                            <?php endif; ?>
                            
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <?php if ($i == 1 || $i == $total_pages || ($i >= $current_page - 1 && $i <= $current_page + 1)): ?>
                                    <a href="?page=<?php echo $i; ?>&category=<?php echo $selected_category; ?>&search=<?php echo urlencode($search_query); ?>" 
                                       class="page-link <?php echo $i === $current_page ? 'active' : ''; ?>">
                                        <?php echo $i; ?>
                                    </a>
                                <?php elseif ($i == $current_page - 2 || $i == $current_page + 2): ?>
                                    <span class="page-dots">...</span>
                                <?php endif; ?>
                            <?php endfor; ?>
                            
                            <?php if ($current_page < $total_pages): ?>
                                <a href="?page=<?php echo $current_page + 1; ?>&category=<?php echo $selected_category; ?>&search=<?php echo urlencode($search_query); ?>" 
                                   class="page-link">
                                    Další →
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            
            <aside class="news-sidebar">
                <div class="sidebar-widget">
                    <h3>Odebírejte náš newsletter</h3>
                    <p>Zadejte svou e-mailovou adresu a dostávejte novinky přímo do vaší schránky.</p>
                    <form id="newsletter-form" class="newsletter-form">
                        <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                        <input type="email" 
                               name="email" 
                               placeholder="Emailová adresa" 
                               required 
                               class="form-input">
                        <button type="submit" class="btn btn-primary btn-block">
                            Přihlásit se
                        </button>
                    </form>
                </div>
                
                <div class="sidebar-widget">
                    <h3>Štítky</h3>
                    <div class="tags">
                        <a href="?search=projekty" class="tag">Projekty</a>
                        <a href="?search=legislativa" class="tag">Legislativa</a>
                        <a href="?search=tiskové+zprávy" class="tag">Tiskové zprávy</a>
                        <a href="?search=regulace" class="tag">Regulace</a>
                        <a href="?search=trh" class="tag">Trh</a>
                        <a href="?search=bateriová+centra" class="tag">Bateriová centra</a>
                        <a href="?search=výstavba" class="tag">Výstavba</a>
                    </div>
                </div>
                
                <div class="sidebar-widget">
                    <h3>Archiv</h3>
                    <ul class="archive-list">
                        <li><a href="?month=2024-04">Duben 2024</a></li>
                        <li><a href="?month=2024-03">Březen 2024</a></li>
                        <li><a href="?month=2024-02">Únor 2024</a></li>
                        <li><a href="?month=2024-01">Leden 2024</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>


<?php include 'includes/footer.php'; ?>