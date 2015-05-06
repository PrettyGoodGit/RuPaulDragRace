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
                <?php
                // global $winner;
                // if (!$winner) {
                //     if (!is_page('Gallery')) {
                // <p class="small termsLink"><a href="/terms">Terms &amp; Conditions</a></p>
                //     }
                // }
                ?>
            </div>
        </div>
    
        <script type="text/javascript" src="<?php echo $cdn; ?>/scripts/jquery.fancybox.js"></script>
        <script type="text/javascript" src="<?php echo $cdn; ?>/scripts/site.js"></script>
        <?php wp_footer(); ?>
    </body>
</html>