<script>
	function incrustar_hoja_estilos_playlists() {
		var hoja_estilos_url =
			'<?php echo get_site_url() . '/wp-content/themes/spotify-template/assets/modulos/modulo-playlists/modulo-playlist.css'; ?>';
		var hoja_estilos = document.createElement('link');
		hoja_estilos.rel = 'stylesheet';
		hoja_estilos.href = hoja_estilos_url;
		document.head.appendChild(hoja_estilos);
	}
	incrustar_hoja_estilos_playlists();
</script>

<!-- contenido playlists -->
<div class="seccion-canciones container-fluid mb-5" id="canciones" style="position: relative;">
	<div class="row">
		<?php
		$numero = 0;
		$active = true;
		$temp = $wp_query;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$post_per_page = -1; // -1 shows all posts
		$current_page_slug = get_queried_object()->slug;
		$terms = get_the_title();
		$args = array(
			'tax_query' => array(
				array(
					'taxonomy' => 'nombre-playlist',
					'field' => 'slug',
					'terms' => $terms,
				),
			),
		);
		$wp_query = new WP_Query($args);
		if (have_posts()) :
			while ($wp_query->have_posts()) :
				$wp_query->the_post(); ?>
				<?php $numero += 1; ?>
				<div class="container-fluid p-0">
					<div class="row mt-3 lista">
						<div class="col-1 encimera">
							<span><?php echo $numero; ?></span>
							<button class="btn visibilidad" onclick="var audio = document.getElementById('<?php echo get_the_title() ?>play'); if (audio.paused) { audio.play(); this.innerHTML = '<i class=\'fa-solid fa-pause fs-3\'></i>'; } else { audio.pause(); this.innerHTML = '<i class=\'fa-solid fa-play fs-3\'></i>'; }"><i class="fa-solid fa-play fs-3"></i> </button>
							</span>
						</div>
						<div class="col-1 no-ver">
							<img class="img-miniatura" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" alt="..">
						</div>
						<div class="col-11 col-sm-3" id="playList">
							<audio class="oculto" id="<?php echo get_the_title() ?>play" tabindex="0" controls="">
								<source src="<?php the_field('enlace_cancion'); ?>">
							</audio>
							<a class="enlace-cancion" href="<?php the_permalink() ?>"><?php echo get_the_title() ?></a>
							<br>
							<a class="perfil" href="#"><?php the_field('perfil'); ?></a>
						</div>
						<div class="col-2 no-ver">
							<span><?php the_field('album'); ?></span>
						</div>
						<div class="col-3 no-ver">
							<span><?php echo the_content() ?></span>
						</div>
						<div class="col-2 no-ver">
							<span><?php the_excerpt() ?></span>
						</div>
					</div>
				</div>
		<?php endwhile;
		endif;
		wp_reset_query();
		$wp_query = $temp ?>
	</div>
</div>