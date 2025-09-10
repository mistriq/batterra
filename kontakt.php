<?php
require_once 'includes/config.php';

$page_title = 'Kontakt';
$page_description = 'Chcete se dozvědět více o investicích do bateriových center? Jsme připraveni s vámi mluvit.';

include 'includes/header.php';
?>

<section class="contact-hero">
    <div class="container">
        <h1>Kontakt</h1>
        <p>
            Chcete se dozvědět více o investicích do bateriových center? 
            Jsme připraveni s vámi mluvit.
        </p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="contact-content">
            <div class="contact-info">
                <h3>Přímé kontakty</h3>
                
                <div class="contact-method">
                    <div class="contact-icon">📧</div>
                    <div class="contact-details">
                        <div class="contact-label">E-mail</div>
                        <a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>
                    </div>
                </div>
                
                <div class="contact-method">
                    <div class="contact-icon">📞</div>
                    <div class="contact-details">
                        <div class="contact-label">Telefon</div>
                        <a href="tel:<?php echo str_replace(' ', '', SITE_PHONE); ?>"><?php echo SITE_PHONE; ?></a>
                    </div>
                </div>
                
                <div class="contact-method">
                    <div class="contact-icon">📍</div>
                    <div class="contact-details">
                        <div class="contact-label">Adresa</div>
                        <div><?php echo SITE_ADDRESS; ?></div>
                    </div>
                </div>
                
                <h4>Máte zájem o konkrétní projekt?</h4>
                <p>Domluvte si schůzku s naším týmem.</p>
                <a href="#contact-form" class="btn btn-primary">Domlubit schůzku</a>
            </div>
            
            <div class="contact-form">
                <form id="contact-form" method="POST">
                    <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                    
                    <div class="form-group">
                        <label for="name" class="form-label">Jméno a příjmení *</label>
                        <input type="text" id="name" name="name" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">E-mail *</label>
                        <input type="email" id="email" name="email" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone" class="form-label">Telefon (volitelné)</label>
                        <input type="tel" id="phone" name="phone" class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <label for="message" class="form-label">Zpráva *</label>
                        <textarea id="message" name="message" class="form-textarea" required 
                                  placeholder="Popište prosím váš zájem a my vám co nejdříve odpovíme..."></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="flex items-center gap-sm">
                            <input type="checkbox" name="privacy_consent" required>
                            <span class="text-sm text-gray">
                                Souhlasím se zpracováním osobních údajů dle 
                                <a href="/privacy-policy.php" class="text-primary">zásad ochrany osobních údajů</a> *
                            </span>
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label class="flex items-center gap-sm">
                            <input type="checkbox" name="newsletter_consent">
                            <span class="text-sm text-gray">
                                Chci dostávat novinky o projektech Batterra e-mailem
                            </span>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-lg">
                        Odeslat zprávu
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="contact-cta">
    <div class="container">
        <h2>Máte zájem o konkrétní projekt?</h2>
        <p>Domluvte si schůzku s naším týmem.</p>
        <a href="#contact-form" class="btn btn-secondary btn-lg">
            Domlubit schůzku
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>