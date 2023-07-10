<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spotify_template
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'spotify-template'); ?></a>

		<header id="masthead" class="site-header">
			<div class="offcanvas offcanvas-end tema menu-offcanvas rounded-2" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
				<div class="offcanvas-header">
					<?php the_custom_logo();?>
					<button type="button" class="btn bg-tema d-flex justify-content-center align-items-center" data-bs-dismiss="offcanvas" aria-label="Close"><i class="text-tema fs-4 fa-solid fa-xmark"></i></button>
				</div>
				<div class="offcanvas-body text-tema">
					<div class="d-flex flex-column h-100 justify-content-between">
						<?php if (is_active_sidebar('navegacion')):
							dynamic_sidebar('navegacion');
						endif; ?>
						<?php if (is_active_sidebar('nav-central')):
							dynamic_sidebar('nav-central');
						endif; ?>
						
						<div class="w-100">
						<?php if (is_active_sidebar('nav-final')):
							dynamic_sidebar('nav-final');
						endif; ?>
						<button class="btn bg-tema w-100"><span class="text-tema"><i class="fa-solid fa-globe me-2"></i> Español de Latinoamérica</span></button>
						</div>
						
					</div>
				</div>
			</div>
		</header><!-- #masthead -->
	</div>