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
    <div class="col-sm-6 col-12 d-flex justify-content-center">
        <img class="rounded-2 mb-3 w-75" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" alt="<?php echo get_the_title() ?>">
    </div>
    <div class="col-12 col-sm-6 d-flex flex-column">
        <span class="text-tema d-flex efecto-texto"><svg role="img" height="24" width="24" aria-hidden="true" class="verificado Svg-sc-ytk21e-0 esyykA b0NcxAbHvRbqgs2S8QDg" viewBox="0 0 24 24" data-encore-id="icon"><path d="M10.814.5a1.658 1.658 0 0 1 2.372 0l2.512 2.572 3.595-.043a1.658 1.658 0 0 1 1.678 1.678l-.043 3.595 2.572 2.512c.667.65.667 1.722 0 2.372l-2.572 2.512.043 3.595a1.658 1.658 0 0 1-1.678 1.678l-3.595-.043-2.512 2.572a1.658 1.658 0 0 1-2.372 0l-2.512-2.572-3.595.043a1.658 1.658 0 0 1-1.678-1.678l.043-3.595L.5 13.186a1.658 1.658 0 0 1 0-2.372l2.572-2.512-.043-3.595a1.658 1.658 0 0 1 1.678-1.678l3.595.043L10.814.5zm6.584 9.12a1 1 0 0 0-1.414-1.413l-6.011 6.01-1.894-1.893a1 1 0 0 0-1.414 1.414l3.308 3.308 7.425-7.425z"></path></svg><?php echo the_excerpt() ?></span>
        <h1 class="text-tema-titulo titulo-cancion efecto-texto"><?php echo get_the_title() ?></h1>
        <span class="text-tema efecto-texto"><?php echo the_content() ?></span>
        <div class="w-100 d-flex justify-content-around align-items-center">
            <button class="btn d-flex justify-content-center align-items-center text-tema fs-2 corazon"><i class="fa-regular fa-heart"></i></button>
            <button class="btn d-flex justify-content-center align-items-center text-tema fs-2"><i class="fa-solid fa-ellipsis"></i></button>
        </div>
    </div>
</div><!-- #post-<?php the_ID(); ?> -->