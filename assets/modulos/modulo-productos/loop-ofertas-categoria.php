<?php
$args = array(
    'posts_per_page' => 5,
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
    while ($featured_product->have_posts()):
        $featured_product->the_post();
        // Inicio del bucle para mostrar cada publicación encontrada
        ?>
        <div class="col-12 col-md-3 card">
            <?php wc_get_template_part('content', 'product'); ?> // Incluir una plantilla específica para mostrar el contenido
            de cada producto
        </div>
        <?php
    endwhile; // Fin del bucle para mostrar cada publicación
} else {
    echo __('Lo sentimos no hay productos'); // Mostrar mensaje si no se encuentran productos
}
wp_reset_postdata(); // Restablecer los datos de la consulta original
?>