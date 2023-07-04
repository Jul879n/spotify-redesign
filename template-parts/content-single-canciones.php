<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spotify_template
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row pt-2'); ?>>
    <div class="col-12 col-sm-6 d-flex flex-column align-items-center">
        <img class="rounded-2 mb-3 w-100" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" alt="..">
        <div class="w-100 d-flex justify-content-around align-items-center">
            <button class="btn d-flex justify-content-center align-items-center text-tema fs-2"><i class="fa-regular fa-heart"></i></button>
            <button class="btn d-flex justify-content-center align-items-center text-tema fs-2"><i class="fa-solid fa-ellipsis"></i></button>
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <span class="text-tema ">Canción</span>
        <h2 class="text-tema-titulo titulo-cancion"><?php echo get_the_title() ?></h2>
        <div class="d-flex flex-column info">
           <a class="text-tema me-2" href="#"><?php the_field('perfil'); ?></a>
            <span class="text-tema me-2"><?php the_field('ano'); ?></span>
            <span class="text-tema me-2"><?php the_excerpt(); ?></span>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->