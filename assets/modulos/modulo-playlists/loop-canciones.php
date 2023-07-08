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
							<span class="text-tema"><?php echo $numero; ?></span>
						</div>
						<div class="col-1">
							<img class="img-miniatura" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" alt="..">
						</div>
						<div class="col-11 col-sm-3" id="playList">
						<span class="song" data-src="<?php the_field('enlace_cancion'); ?>" data-title="<?php echo get_the_title() ?>" data-artista="<?php the_field('perfil'); ?>" data-img="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>"></span>
							<a class="enlace-cancion text-tema-titulo" href="<?php the_permalink() ?>"><?php echo get_the_title() ?></a>
							<br>
							<a class="perfil text-tema" href="<?php echo get_home_url(); ?>/artistas/<?php echo str_replace(' ', '-', get_field('perfil')); ?>"><?php the_field('perfil'); ?></a>
						</div>
						<div class="col-2">
							<span class="text-tema"><?php the_field('album'); ?></span>
						</div>
						<div class="col-3">
							<span class="text-tema"><?php echo the_content() ?></span>
						</div>
						<div class="col-2">
							<span class="text-tema"><?php the_excerpt() ?></span>
						</div>
					</div>
				</div>
		<?php endwhile;
		endif;
		wp_reset_query();
		$wp_query = $temp ?>
	</div>
</div>