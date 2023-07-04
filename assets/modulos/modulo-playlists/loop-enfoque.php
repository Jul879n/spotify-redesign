<script>
    function incrustar_hoja_estilos_playlists() {
        var hoja_estilos_url =
            '<?php echo get_site_url() . '/wp-content/themes/spotify-redesign/assets/modulos/modulo-playlists/modulo-playlist.css'; ?>';
        var hoja_estilos = document.createElement('link');
        hoja_estilos.rel = 'stylesheet';
        hoja_estilos.href = hoja_estilos_url;
        document.head.appendChild(hoja_estilos);
    }
    incrustar_hoja_estilos_playlists();
</script>

<!-- contenido playlists -->
<div class="seccion-enfoque container">
    <div class="row">
        <h2 class="text-tema-titulo efecto-texto">Enfoque</h2>
        <?php $active = true;
        $temp = $wp_query;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $post_per_page = 6; // -1 shows all posts
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
                <div class="col-6 col-sm-2 transparente">
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <a href="<?php the_permalink() ?>" class="tarjeta loop card card-alto mt-2">
                        <img class="card-img-top" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" alt="<?php echo get_the_title() ?>">
                            <div class="card-body">
                                <span class="card-title text-tema-titulo  efecto-texto">
                                    <?php echo get_the_title() ?>
                                </span>
                            </div>
                        </a>

                    </div><!-- #post-<?php the_ID(); ?> -->
                </div>
        <?php endwhile;
        endif;
        wp_reset_query();
        $wp_query = $temp ?>
    </div>
</div>