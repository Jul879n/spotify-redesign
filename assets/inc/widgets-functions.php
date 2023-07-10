<?php
//widget assets
function spotify_widget() {
    register_sidebar( array(
        'name'          => 'navbar',
        'id'            => 'navegacion',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title' => '<h3 class="titulo-menu-nav">', //a単adimos contenedores por titulo
        'after_title' => '</h3>' //cerramos los contenedores de titulo
    ) );
    register_sidebar( array(
        'name'          => 'nav central',
        'id'            => 'nav-central',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title' => '<h3 class="titulo-menu-nav">', //a単adimos contenedores por titulo
        'after_title' => '</h3>' //cerramos los contenedores de titulo
    ) );
    register_sidebar( array(
        'name'          => 'nav final',
        'id'            => 'nav-final',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title' => '<h3 class="titulo-menu-nav">', //a単adimos contenedores por titulo
        'after_title' => '</h3>' //cerramos los contenedores de titulo
    ) );
    register_sidebar( array(
        'name'          => 'footer 1',
        'id'            => 'footer1',
        'before_widget' => '<div class="col-12 col-sm-3 mb-2">',
        'after_widget'  => '</div>',
        'before_title' => '<h3 class="text-tema">', //a単adimos contenedores por titulo
        'after_title' => '</h3>' //cerramos los contenedores de titulo
    ) );
    register_sidebar( array(
        'name'          => 'footer 2',
        'id'            => 'footer2',
        'before_widget' => '<div class="col-12 col-sm-3 mb-2">',
        'after_widget'  => '</div>',
        'before_title' => '<h3 class="text-tema">', //a単adimos contenedores por titulo
        'after_title' => '</h3>' //cerramos los contenedores de titulo
    ) );
    register_sidebar( array(
        'name'          => 'footer 3',
        'id'            => 'footer3',
        'before_widget' => '<div class="col-12 col-sm-3 mb-2">',
        'after_widget'  => '</div>',
        'before_title' => '<h3 class="text-tema">', //a単adimos contenedores por titulo
        'after_title' => '</h3>' //cerramos los contenedores de titulo
    ) );
}

add_action( 'widgets_init', 'spotify_widget' );