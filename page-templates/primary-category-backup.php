<main class="main-content">
  <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array( 'category_name' => get_field('listed_post_category'), 'posts_per_page' => '5', 'paged' => $paged );
    $wp_query = new WP_Query($args);
  ?>
  <?php if ( $wp_query->have_posts() ) : ?>
    <?php	while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
      <div class="cell post-cell">
        <div id="post-<?php the_ID(); ?>" <?php post_class('blogpost-entry'); ?>>
          <header class="post-title">
            <div class="auto cell">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); the_category(); ?></a></h3>
            </div>
          <div class="date"><span><?php the_time('F j, Y'); ?></span></div>
          </header>
            <div class="entry-content">
              <?php the_excerpt(); ?>
            </div>

        </div>
      </div>
    <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
  <?php else : ?>
    <p><?php esc_html_e( 'Nothing here (yet).' ); ?></p>
  <?php endif; ?>
  <div class="cell auto">
    <?php /* Display navigation to next/previous pages when applicable */ ?>
    <?php
    if ( function_exists( 'foundationpress_pagination' ) ) :
      foundationpress_pagination();
    elseif ( is_paged() ) :
    ?>
      <nav id="post-nav">
        <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
        <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
      </nav>
    <?php endif; ?>
  </div>
</main>
