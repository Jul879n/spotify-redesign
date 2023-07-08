<?php
//widget assets
function spotify_widget() {
    register_sidebar( array(
        'name'          => 'nav',
        'id'            => 'nav0',
        'before_widget' => '<div class="col-12 col-sm-1 navbar-nav m-0 no-ver">',
        'after_widget'  => '</div>',
        'before_title' => '<h3 class="titulo-menu-nav">', //a単adimos contenedores por titulo
        'after_title' => '</h3>' //cerramos los contenedores de titulo
    ) );
    register_sidebar( array(
        'name'          => 'Menu footer 1',
        'id'            => 'footer1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title' => '<h3 class="titulo-menu-nav">', //a単adimos contenedores por titulo
        'after_title' => '</h3>' //cerramos los contenedores de titulo
    ) );
    register_sidebar( array(
        'name'          => 'Menu footer 2',
        'id'            => 'footer2',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title' => '<h3 class="titulo-menu-nav">', //a単adimos contenedores por titulo
        'after_title' => '</h3>' //cerramos los contenedores de titulo
    ) );
     register_sidebar( array(
        'name'          => 'Menu footer 3',
        'id'            => 'footer3',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title' => '<h3 class="titulo-menu-nav">', //a単adimos contenedores por titulo
        'after_title' => '</h3>' //cerramos los contenedores de titulo
    ) );
}

add_action( 'widgets_init', 'spotify_widget' );