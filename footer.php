<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-grid">
          <section class="footer-text">
            <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">
              CC-BY-SA
            </a> 2014–<?php echo date("Y"); ?> Michael A. Castello.
            <?php $footer_query = new WP_Query( 'pagename=footer' );
              while ( $footer_query->have_posts() ) : $footer_query->the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile;
              wp_reset_postdata();
            ?>
          </section>
          <?php dynamic_sidebar( 'footer-widgets' ); ?>
        </div>
    </div>
</footer>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
