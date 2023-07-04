<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spotify_template
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
    <div class="col-12 col-sm-3 d-flex flex-column align-items-center">
        <h1 class="text-tema-titulo"><?php echo get_the_title() ?></h1>
        <img class="rounded-2 mb-3" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" alt="..">
        <span class="text-tema"><?php echo the_content() ?></span>
        <div class="w-100 d-flex flex-column">
            <span class="text-tema"><?php the_field('perfil'); ?></span>
            <span class="text-tema"><?php the_field('me_gusta'); ?> me gusta</span>
            <span class="text-tema"><?php the_field('cantidad_canciones'); ?></span>
            <span class="text-tema"><?php the_field('duracion'); ?></span>
        </div>
        <div class="w-100 d-flex justify-content-around align-items-center">
            <button class="btn d-flex justify-content-center align-items-center text-tema fs-2"><i class="fa-regular fa-heart"></i></button>
            <button class="btn d-flex justify-content-center align-items-center text-tema fs-2"><i class="fa-solid fa-ellipsis"></i></button>
        </div>
    </div>
    <div class="col-12 col-sm-9">
        <?php include get_template_directory() . '/assets/modulos/modulo-playlists/loop-canciones.php'; ?>
    </div>
</div><!-- #post-<?php the_ID(); ?> -->