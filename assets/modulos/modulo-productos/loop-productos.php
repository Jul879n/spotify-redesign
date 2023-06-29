<script>
    function incrustar_hoja_estilos_spotify() {
        var hoja_estilos_url =
            '<?php echo get_site_url() . '/wp-content/themes/spotify-template/assets/modulos/modulo-productos/modulo-productos.css'; ?>';
        var hoja_estilos = document.createElement('link');
        hoja_estilos.rel = 'stylesheet';
        hoja_estilos.href = hoja_estilos_url;
        document.head.appendChild(hoja_estilos);
    }
    incrustar_hoja_estilos_spotify();
</script>
<div id="carrusel-productos">
    <?php
    $args = array(
        'posts_per_page' => 85,
        // Número máximo de publicaciones a mostrar
        'post_type' => 'product',
        // Tipo de publicación a consultar
        'post_status' => 'publish',
        // Estado de la publicación
        'tax_query' => array(
            array(
                'taxonomy' => 'product_visibility',
                // Taxonomía a filtrar
                'field' => 'name',
                // Campo de la taxonomía a comparar
                'terms' => 'featured',
                // Valor de la taxonomía a buscar
                'operator' => 'IN',
                // Operador para comparar términos (puede ser IN, NOT IN, etc.)
            ),
        ),
    );
    $featured_product = new WP_Query($args); // Realizar la consulta de publicaciones
    if ($featured_product->have_posts()) { // Comprobar si hay publicaciones encontradas
        while ($featured_product->have_posts()) :
            $featured_product->the_post();
            // Inicio del bucle para mostrar cada publicación encontrada
    ?>
            <div class="col-6 col-sm-3 mt-2 p-1">
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="card miniatura sombra">
                        <div class="card-body">
                            <?php wc_get_template_part('content', 'product'); ?>
                        </div>
                    </div>
                </div><!-- #post-<?php the_ID(); ?> -->
            </div>
    <?php
        endwhile; // Fin del bucle para mostrar cada publicación
    } else {
        echo __('Lo sentimos no hay productos'); // Mostrar mensaje si no se encuentran productos
    }
    wp_reset_postdata(); // Restablecer los datos de la consulta original
    ?>
</div>