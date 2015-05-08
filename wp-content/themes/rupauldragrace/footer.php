<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $cdn;
?>


            </div>
        </div>
        <footer id="footer">
            <div class="pageWrapper">
                <p>RuPaul’s Drag Race sees America’s drag elite throwing their ‘wigs to the wall’ in a bid to win the coveted title of ‘America’s Next Drag Superstar’  through a variety of jaw-dropping challenges. Its host and creator is 6ft 4 drag icon and philosophical compass RuPaul Charles, famous for catchphrases  like “If you don’t love yourself, how in the hell you gonna love somebody else?” and “You’re born naked and the rest is drag.”</p>
                <p><a href="/terms">Terms &amp; Conditions</a></p>
            </div>
        </footer>
        <script type="text/javascript" src="<?php echo $cdn; ?>/scripts/jquery.fancybox.js"></script>
        <script type="text/javascript" src="<?php echo $cdn; ?>/scripts/site.js"></script>
        <?php wp_footer(); ?>
    </body>
</html>