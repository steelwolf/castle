<?php
/*
Template Name: Home
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="hero-container">
  <div class="hero-grid">
    <div class="hero-text-home">
      <?php the_field('hero_text'); ?>
    </div>
  </div>
</div>
<div class="main-container">
	<div class="main-grid">
		<!--<main class="main-content"> -->

      <div class="home-categories">

        <div class="home-category-header">
          <div class="matter-circle">Matter</div>
        </div>
        <?php $query_matter = new WP_Query( array( 'category_name' => 'matter', 'posts_per_page' => '3') ); ?>
        <?php if ( $query_matter->have_posts() ) : ?>
          <?php	while ( $query_matter->have_posts() ) : $query_matter->the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; // End have_posts() check. ?>
        <div class="home-category-footer">
					<?php
						$matter_id = get_ID_by_slug('matter');
					?>
					<h6><a href="<?php echo esc_url( get_page_link($matter_id) ); ?>" title="matter page">See more matter ></a></h6>
				</div>

      </div>

      <div class="home-categories">
        <div class="home-category-header">
          <div class="energy-circle">Energy</div>
        </div>
        <?php $query_energy = new WP_Query( array( 'category_name' => 'energy', 'posts_per_page' => '3') ); ?>
        <?php if ( $query_energy->have_posts() ) : ?>
          <?php	while ( $query_energy->have_posts() ) : $query_energy->the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; // End have_posts() check. ?>
        <div class="home-category-footer">
					<?php
						$energy_id = get_ID_by_slug('energy');
					?>
					<h6><a href="<?php echo esc_url( get_page_link($energy_id) ); ?>" title="energy page">Discover more energy ></a></h6>
				</div>

      </div>

      <div class="home-categories">
        <div class="home-category-header">
          <div class="life-circle">Life</div>
        </div>
        <?php $query_life = new WP_Query( array( 'category_name' => 'life', 'posts_per_page' => '3') ); ?>
        <?php if ( $query_life->have_posts() ) : ?>
          <?php	while ( $query_life->have_posts() ) : $query_life->the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; // End have_posts() check. ?>
        <div class="home-category-footer">
					<?php
						$life_id = get_ID_by_slug('life');
					?>
					<h6><a href="<?php echo esc_url( get_page_link($life_id) ); ?>" title="life page">Experience more life ></a></h6>
				</div>

      </div>
		<!-- </main>-->

	</div>
</div>

<?php get_footer();
