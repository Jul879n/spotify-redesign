<?php
function css_base_framework(){
    
    wp_register_style('fuentes', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', 'all');
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', 'all');
    
    wp_register_style('slick', get_template_directory_uri() . '/assets/librerias/css/slick.css', 'all');
    wp_register_style('slick-theme', get_template_directory_uri() . '/assets/librerias/css/slick-theme.css', 'all');
    wp_register_style('iconos', 'https://use.fontawesome.com/releases/v6.4.0/css/all.css');
wp_register_style('estilos', get_template_directory_uri() . '/assets/librerias/css/estilos.css', 'all');
    wp_enqueue_style('fuentes');
    wp_enqueue_style('bootstrap');
    
   wp_enqueue_style('slick');
    wp_enqueue_style('slick-theme');
    wp_enqueue_style('iconos');
    wp_enqueue_style('estilos');
}


add_action('wp_enqueue_scripts', 'css_base_framework');


/*assets styles*/