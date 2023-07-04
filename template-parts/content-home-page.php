<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spotify_template
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="selector-tema">
		<div class="container h-100">
			<div class="row h-100 align-items-center">
				<h1>Selecciona un Tema</h1>
				<div class="col-4 col-sm-4">
					<div id="tema-blanco" class="card cajas-temas">
						<div class="card-body">
							<?php
							$image = get_field('tema_claro');
							if (!empty($image)) : ?>
								<img class="card-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-4 col-sm-4">
					<div id="tema-oscuro" class="card cajas-temas">
						<div class="card-body">
							<?php
							$image = get_field('tema_oscuro');
							if (!empty($image)) : ?>
								<img class="card-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-4 col-sm-4">
					<div id="tema-amoled" class="card cajas-temas">
						<div class="card-body">
							<?php
							$image = get_field('tema_amoled');
							if (!empty($image)) : ?>
								<img class="card-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-12">
					<button id="confirmar" class="disabled btn btn-primary">Confirmar</button>
				</div>
			</div>
		</div>
	</div>
	<div id="fondo" class="container-fluid ">
		<div class="row grid-stack">
			<div id="card-menu" class="grid-stack-item col-12 gs-4" gs-w="3">
				<div id="menu" class="grid-stack-item-content card border-0 tema">
					<div class="card-body pt-0 pb-0 d-flex justify-content-between align-items-center placeholder">
						<span class="spotify text-tema transparente"><i class="fa-brands fa-spotify"></i></span>
						<div class="d-flex transparente">
							<button id="volver" class="ms-2 me-2 btn bg-tema circulo  d-flex justify-content-center align-items-center"><i class=" text-tema fa-solid fa-angle-left"></i></button>
							<button id="adelante" class="ms-2 me-2 btn bg-tema circulo  d-flex justify-content-center align-items-center"><i class="text-tema fa-solid fa-angle-right"></i></button>
							<button data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class="ms-2 me-2 btn bg-tema circulo  d-flex justify-content-center align-items-center"><i class="text-tema fa-solid fa-bars"></i></button>
						</div>

					</div>
				</div>
			</div>
			<div id="registrate" class="grid-stack-item placeholder-glow col-12" gs-w="9">
				<div class="grid-stack-item-content card tema border-0">
					<div class="card-body pt-0 pb-0 placeholder d-flex align-items-center justify-content-between">
						<div class="d-flex flex-column w-75">
							<span class="transparente text-tema nombre-artista efecto-texto text-uppercase">Muestra de spotify</span>
							<span class="transparente text-tema nombre-artista efecto-texto">Registrate para disfrutar de canciones y podcasts sin limites, con anuncios ocasionales. No hace falta tarjeta de crédito.</span>
						</div>
						<span><button class="registrarte btn bg-tema transparente efecto-texto">Registrarte gratis</button></span>
							
					</div>
				</div>
			</div>
			<div id="izquierda" class="grid-stack-item placeholder-glow col-12" gs-w="4" gs-h="5">
				<div id="reproductor" class="grid-stack-item-content card border-0 tema bg-secondary text-tema">
					<div id="info-reproduccion" class="card-body d-flex flex-column align-items-center justify-content-center placeholder">
						<img class="mitad rounded-3 placeholder transparente" src="" alt="">
						<span class="song" style="display: none;" data-src="https://laraya.laboratoriodiseno.cl/spotify/wp-content/uploads/2023/05/Tjarnheden-Farsjon.mp3" data-title="Canción 1"></span>
						<span class="song" style="display: none;" data-src="https://radios.liberaturadio.org/mestiza.ogg" data-title="Canción 2"></span>
						<audio style="display: none;" id="cancion" controls>
							<source src="" type="audio/mp3">
						</audio>
						<form class="mt-3 mitad transparente" action="">
							<div>
								<h5 class="text-tema-titulo efecto-texto" id="titulo-cancion">Canción 1</h5>
								<h6 class="text-tema efecto-texto" id="artista-cancion">Artista 1</h6>
							</div>
							<input class="w-100 border-0 form-range" type="range" name="tiempo-reproduccion" id="tiempo-reproduccion">
							<div class="d-flex justify-content-between">
								<span class="text-tema efecto-texto" id="tiempo-actual">00:00</span>
								<span class="text-tema efecto-texto" id="duracion">00:00</span>
							</div>
							<div class="d-flex justify-content-around" id="botones-izquierda">
								<button class="btn-reproductor btn d-flex justify-content-center align-items-center text-tema mix"><i class="fa-solid fa-shuffle"></i></button>
								<button class="btn-reproductor btn d-flex justify-content-center align-items-center text-tema atras"><i class="fa-solid fa-backward-step"></i></button>
								<button class="btn-reproductor btn d-flex justify-content-center align-items-center text-tema fs-1 play"><i class="fa-solid fa-circle-play"></i></button>
								<button class="btn-reproductor btn d-flex justify-content-center align-items-center text-tema siguiente"><i class="fa-solid fa-forward-step"></i></button>
								<button class="btn-reproductor btn d-flex justify-content-center align-items-center text-tema repetir"><i class="fa-solid fa-repeat"></i></button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div id="principal" class="grid-stack-item placeholder-glow col-12" gs-w="8" gs-h="5">
				<div id="contenido" class="grid-stack-item-content card border-0 tema bg-secondary text-tema ">
					<div class="card-body placeholder container-fluid position-relative">
					<?php include get_template_directory() . '/assets/modulos/modulo-playlists/loop-enfoque.php'; ?>
					</div>
				</div>
			</div>
			<div id="artista" class="grid-stack-item placeholder-glow col-12" gs-w="6" gs-h="4">
				<div class="grid-stack-item-content card border-0 tema bg-secondary">
					<div class="card-body placeholder d-flex align-items-center justify-content-center">
						<h2 class="trasparente no-hay text-tema"><i class="fa-solid fa-compact-disc"></i></h2>
					</div>
				</div>
			</div>
			<div id="info-cancion" class="grid-stack-item placeholder-glow col-12" gs-w="6" gs-h="4">
				<div class="grid-stack-item-content card border-0 tema bg-secondary">
					<div class="card-body placeholder d-flex align-items-center justify-content-center">
						<h2 class="transparente no-hay text-tema"><i class="fa-solid fa-compact-disc"></i></h2>
					</div>
				</div>
			</div>
			<div id="footer" class="grid-stack-item placeholder-glow col-12" gs-w="12" gs-h="3" gs-no-resize="true" gs-no-move="true" gs-locked="true">
				<div class="grid-stack-item-content card border-0 tema bg-secondary">
				<?php get_footer(); ?>
				</div>
			</div>
		</div>
	</div>
</div><!-- #post-<?php the_ID(); ?> -->