<?php
/*assets scripts*/

function js_script()
{
    // nos aseguramos que no estamos en el area de administracion
    if (!is_admin()) {
        // registramos nuestro script con el nombre "mi-script" y decimos que es dependiente de jQuery para que wordpress se asegure de incluir jQuery antes de este archivo
        // en adicion a las dependencias podemos indicar que este archivo debe ser insertado en el footer del sitio, en el lugar donde se encuente la funcion wp_footer

        // Register the script like this for a theme:

        wp_register_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', true);
        wp_register_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', true);
        wp_register_script('gridstack', 'https://cdnjs.cloudflare.com/ajax/libs/gridstack.js/8.3.0/gridstack-all.min.js', true);
        wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), true);
        wp_register_script('mi-js', get_bloginfo('template_directory') . '/assets/librerias/js/mis-scripts.js', array('jquery'), true);
        wp_register_script('codex', get_bloginfo('template_directory') . '/assets/librerias/js/jquery.codex.js', array('jquery'), true);
        /*encolamos los JS*/
        wp_enqueue_script('bootstrap-js');
        wp_enqueue_script('codex');
        wp_enqueue_script('mi-js');
        wp_enqueue_script('jquery-ui');
        wp_enqueue_script('gridstack');
        wp_enqueue_script('slick');
    }
}
add_action("wp_enqueue_scripts", "js_script", 1);
