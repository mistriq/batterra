    </main><?php // End of main content ?>
    
    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                        <span class="logo-text">BATTERRA</span>
                        <p class="footer-tagline">
                            Investiční společnost zaměřená na výstavbu a provoz moderních bateriových center.
                        </p>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3 class="footer-title">Navigace</h3>
                    <ul class="footer-links">
                        <li><a href="/o-spolecnosti.php">O společnosti</a></li>
                        <li><a href="/projekty.php">Projekty</a></li>
                        <li><a href="/investicni-model.php">Investiční model</a></li>
                        <li><a href="/transparentnost.php">Transparentnost</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3 class="footer-title">Informace</h3>
                    <ul class="footer-links">
                        <li><a href="/aktuality.php">Aktuality</a></li>
                        <li><a href="/kontakt.php">Kontakt</a></li>
                        <li><a href="/privacy-policy.php">Ochrana osobních údajů</a></li>
                        <li><a href="/terms.php">Obchodní podmínky</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3 class="footer-title">Kontakt</h3>
                    <div class="footer-contact">
                        <p>
                            <strong><?php echo SITE_ADDRESS; ?></strong>
                        </p>
                        <p>
                            <a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>
                        </p>
                        <p>
                            <a href="tel:<?php echo str_replace(' ', '', SITE_PHONE); ?>"><?php echo SITE_PHONE; ?></a>
                        </p>
                    </div>
                    
                    <div class="footer-cta">
                        <a href="/kontakt.php" class="btn btn-secondary">Domluvit schůzku</a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p class="copyright">
                        &copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. Všechna práva vyhrazena.
                    </p>
                    <p class="footer-legal">
                        IČO: XXX XXX XXX | DIČ: CZXXXXXXXX
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Scripts -->
    <script src="/assets/js/main.js"></script>
    <?php if (isset($additional_scripts)) echo $additional_scripts; ?>
</body>
</html>