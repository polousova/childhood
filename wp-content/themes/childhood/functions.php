<?php
add_action('wp_enqueue_scripts', 'childhood_styles');//добавляем в хук стили
add_action('wp_enqueue_scripts', 'childhood_scripts');//добавлем в хук скрипты

function childhood_styles() {
	wp_enqueue_style( 'childhood-style', get_stylesheet_uri() );
	//wp_enqueue_style( 'header-style', get_template_directory_uri(  ) . '/assets/styles/main.min.css' ); //подключение дополнительных файлов стилей
	// wp_enqueue_style( 'animate-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css' ); //подключение дополнительных стилей через CDN

	//переподключить jQuery
	//wp_deregister_script( 'jquery');
	//wp_deregister_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js');
	//wp_enqueue_script( 'jquery');
};

function childhood_scripts() {
	wp_enqueue_script( 'childhood-scripts', get_template_directory_uri() . '/assets/js/main.min.js', array(), null, true );
};

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 3);
function filter_nav_menu_link_attributes($atts, $item, $args) {
	if ($args->menu === 'Main') {
		$atts['class'] = 'header__nav-item';

		if($item->current) {
			$atts['class'] .= ' header__nav-item-active';
		}
	};

	return $atts;
}

?>