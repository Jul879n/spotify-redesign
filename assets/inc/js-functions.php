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
        wp_enqueue_script('slick', get_bloginfo('template_directory') . '/assets/librerias/js/slick.min.js', array('jquery'), true);
        wp_register_script('mi-js', get_bloginfo('template_directory') . '/assets/librerias/js/mis-scripts.js', array('jquery'), true);

        /*encolamos los JS*/
        //wp_enqueue_script('titan-js', array('jquery'), true);
        wp_enqueue_script('bootstrap-js');
        wp_enqueue_script('slick');
        wp_enqueue_script('mi-js');
    }
}
add_action("wp_enqueue_scripts", "js_script", 1);
