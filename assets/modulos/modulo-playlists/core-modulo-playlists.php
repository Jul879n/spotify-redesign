<?php  /*  playlists */

function playlists_register()
{

	$labels = array(
		'name' => _x('playlists', 'post type general name'),
		'singular_name' => _x('playlists', 'post type singular name'),
		'add_new' => _x('Agregar playlist', 'slideshow_two item'),
		'add_new_item' => __('Agregar playlist'),
		'edit_item' => __('Editar playlist'),
		'new_item' => __('Nueva playlist'),
		'view_item' => __('Ver el playlist'),
		'search_items' => __('Buscar playlist'),
		'not_found' =>  __('No se encontraron'),
		'not_found_in_trash' => __('No se encontraron en la basura'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable'    => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'exclude_from_search'   => false,
		'capability_type' => 'post',
		'menu_icon'  => 'dashicons-playlist-audio',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'thumbnail', 'excerpt', 'editor'),
		'rewrite' => array('slug' => 'playlists', 'with_front' => false)
	);

	register_post_type('playlists', $args);
}

add_action('init', 'playlists_register');

function categoria_playlists()
{
	// Registro de la taxonomía para playlists
	register_taxonomy(
		'categoria-playlists',
		'playlists',
		array(
			'label' => __('Categoria playlists'), // Cambie la etiqueta
			'rewrite' => array('slug' => 'categoria-playlist'), // Cambie el slug
			'hierarchical' => true,
			'show_admin_column' => true,
			'show_in_quick_edit' => true,
		)
	);

}
add_action('init', 'categoria_playlists');

//canciones
function canciones_register()
{

	$labels = array(
		'name' => _x('canciones', 'post type general name'),
		'singular_name' => _x('canción', 'post type singular name'),
		'add_new' => _x('Agregar canción', 'canción item'),
		'add_new_item' => __('Agregar canción'),
		'edit_item' => __('Editar canción'),
		'new_item' => __('Nueva canción'),
		'view_item' => __('Ver la canción'),
		'search_items' => __('Buscar canciones'),
		'not_found' =>  __('No se encontraron'),
		'not_found_in_trash' => __('No se encontraron en la basura'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable'    => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'exclude_from_search'   => false,
		'capability_type' => 'post',
		'menu_icon'  => 'dashicons-format-audio',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'thumbnail', 'excerpt', 'editor'),
		'rewrite' => array('slug' => 'canciones', 'with_front' => false)
	);

	register_post_type('canciones', $args);
}

add_action('init', 'canciones_register');

function nombre_playlist()
{
	// Registro de la taxonomía para playlists
	register_taxonomy(
		'nombre-playlist',
		'canciones',
		array(
			'label' => __('Nombre playlist'), // Cambie la etiqueta
			'rewrite' => array('slug' => 'nombre-playlist'), // Cambie el slug
			'hierarchical' => true,
			'show_admin_column' => true,
			'show_in_quick_edit' => true,
		)
	);

}
add_action('init', 'nombre_playlist');