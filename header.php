<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

<div class="top-bar-container">
	<header class="site-header" role="banner">
		<?php $data_margin_top = (is_admin_bar_showing()) ? '2' : '0'; ?>

		<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle(); ?>>
			<div class="title-bar-left">
				<button aria-label="<?php _e( 'Main Menu', 'foundationpress' ); ?>" class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
				<span class="site-mobile-title title-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</span>
			</div>
			<?php foundationpress_top_bar_r(); ?>
		</div>

				<nav class="site-navigation top-bar sticky-header" role="navigation">
					<div class="logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php $logodir = get_template_directory_uri() . '/dist/assets/images/logo.svg';
							echo file_get_contents( "$logodir" ); ?>
						</a>
					</div>
					<div class="top-bar-left">
						<?php foundationpress_top_bar_r(); ?>
						<?php wp_nav_menu( array(
								'menu'          	=> 'Conditional Submenu',
								'sub_menu'      	=> true,
								'direct_parent' 	=> true,
								'depth'						=> 1,
								'menu_class'			=> 'conditional-submenu',
								'fallback_cb'			=> '__return_false',
								'container'				=> ''
							) ); ?>
					</div>
					<div class="top-bar-right">
						<div class="search-container">
							<?php get_search_form(); ?>
						</div>
					</div>

					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
					<?php endif; ?>

				</nav>
	</header>
</div>
