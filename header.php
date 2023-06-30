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
			<div id="selector-tema">
				<div class="container h-100">
					<div class="row h-100 mt-5 align-items-center">
						<div class="col-12 col-sm-4">
							<div id="tema-blanco" class="card cajas-temas">
								<div class="card-body">
									<h5 class="card-title">Claro</h5>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-4">
							<div id="tema-oscuro" class="card cajas-temas">
								<div class="card-body">
									<h5 class="card-title">Oscuro</h5>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-4">
							<div id="tema-amoled" class="card cajas-temas">
								<div class="card-body">
									<h5 class="card-title">Amoled</h5>
								</div>
							</div>
						</div>
						<div class="col-12">
							<button id="confirmar" class="disabled btn btn-primary">Confirmar</button>
						</div>
					</div>
				</div>
			</div>
			<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
				<div class="offcanvas-header">
					<h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body">
					...
				</div>
			</div>
		</header><!-- #masthead -->
	</div>