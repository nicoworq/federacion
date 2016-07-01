<?php


/*
 * SLIDER WORQ
 */

require_once get_template_directory() . '/php/worq-slider.php';


/*
 * AJAX FORM REPORTE
 */

require_once get_template_directory() . '/php/ajax-form-reporte.php';
/*
 * AJAX FORM CONTACTO
 */

require_once get_template_directory() . '/php/ajax-form-contacto.php';

/*
 * AJAX FORM NEWSLETTER
 */

require_once get_template_directory() . '/php/ajax-form-newsletter.php';


/*
 * UPLOAD WIDGET
 */

require_once get_template_directory() . '/php/upload-widget-worq.php';

/*
 * LATEST NEWS WIDGET
 */

require_once get_template_directory() . '/php/latest-news-widget-worq.php';

/*
 * LATEST ACTIVITES WIDGET
 */

require_once get_template_directory() . '/php/latest-activities-widget-worq.php';

/*
 * Newsletter WIDGET
 */

require_once get_template_directory() . '/php/newsletter-widget-worq.php';


/*
 * MOBILE DETECT
 */

require_once get_template_directory() . '/php/mobile-detect.php';



/*
 * UNREGISTER WIDGETS
 */

function remove_widgets() {
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Meta');	
	unregister_widget('WP_Widget_Categories');
	
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Nav_Menu_Widget');
	unregister_widget('WP_Widget_Pages');
}

add_action( 'widgets_init', 'remove_widgets' );


/*
 * JQUERY MIGRATE
 */

add_filter('wp_default_scripts', 'remove_jquery_migrate');

function remove_jquery_migrate(&$scripts) {
    if (!is_admin()) {
        $scripts->remove('jquery');
        $scripts->add('jquery', false, array('jquery-core'), '1.10.2');
    }
}

function my_deregister_scripts() {
    wp_deregister_script('wp-embed');
}

add_action('wp_enqueue_scripts', 'my_deregister_scripts');



/*
 * versionado CSS
 */

// Remove WP Version From Styles	
add_filter('style_loader_src', 'sdt_remove_ver_css_js', 9999);
// Remove WP Version From Scripts
add_filter('script_loader_src', 'sdt_remove_ver_css_js', 9999);

// Function to remove version numbers
function sdt_remove_ver_css_js($src) {
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}



