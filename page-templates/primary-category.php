<?php
/*
Template Name: Primary Category
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="hero-container">
  <div class="hero-grid">
    <div class="hero-text">
      <?php the_field('hero_text'); ?>
    </div>
  </div>
</div>
<div class="main-container">
	<div class="main-grid">
		<main class="main-content">
      <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array( 'category_name' => get_field('listed_post_category'), 'posts_per_page' => '5', 'paged' => $paged );
        $wp_query = new WP_Query($args);
      ?>
      <?php if ( $wp_query->have_posts() ) : ?>
        <?php	while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="article-meta">
              <?php $categories = get_the_category();
                if ( ! empty($categories) ) {
                  $cat_slug = esc_html( $categories[0]->slug );
                  $cat_name = esc_html( $categories[0]->name );
                  $image_path = get_template_directory_uri() . '/dist/assets/images/' . $cat_slug . '_hex.svg';
                  if ( get_http_response_code( "$image_path" ) == "200") {
                    $image = file_get_contents( "$image_path" );
                  }
                  //echo '<h1 class="category-name">' . $cat_name . '</h1>';
                }; ?>
                <div class="article-image">
                  <?php if ( ! empty($image) ) {
                    echo $image;
                  }; ?>
                </div>
            </div>
            <div class="article-content">
              <header class="post-title">
                <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                <div class="date"><span><?php the_time('F j, Y'); ?></span></div>
              </header>
              <div class="article-excerpt">
                <?php the_excerpt(); ?>
              </div>
              <footer>
            		<?php
            			wp_link_pages(
            				array(
            					'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
            					'after'  => '</p></nav>',
            				)
            			);
            		?>
            		<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
            	</footer>
            </div>
          </article>
        <?php endwhile; ?>

      <?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; // End have_posts() check. ?>

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

		</main>
		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer();
