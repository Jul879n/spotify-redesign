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
<div class="seccion-enfoque container">
<h2 class="text-tema-titulo efecto-texto">Playlists de Spotify</h2>
    <div id="carrusel-spotify">
       
        <?php $active = true;
        $temp = $wp_query;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $post_per_page = -1; // -1 shows all posts
        $args = array(
            'post_type' => 'playlists',
            'orderby' => 'rand',
            'order' => 'asc',
            'paged' => $paged,
            'posts_per_page' => $post_per_page
        );
        $wp_query = new WP_Query($args);
        if (have_posts()) :
            while ($wp_query->have_posts()) :
                $wp_query->the_post(); ?>
                <div class="col-6 col-sm-2 p-1 transparente">
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <a href="<?php the_permalink() ?>" class="loop">
                            <img class="rounded-2" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" alt="<?php echo get_the_title() ?>">
                            
                        </a>

                    </div><!-- #post-<?php the_ID(); ?> -->
                </div>
        <?php endwhile;
        endif;
        wp_reset_query();
        $wp_query = $temp ?>
    </div>
</div>