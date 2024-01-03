<?php
/*
Plugin Name: Api techsysprogram
Description: Créer des produits sur un autre site via l'API WooCommerce
Author: techsysprogram
Version: 1.1
Plugin URI: https://www.techsysprogram.com/
Author URI: https://www.techsysprogram.com/
*/

if (!defined('ABSPATH')) {
    exit;
}

//aqui el comienzo de short code
function executer_funcion_table_ventas()
{
    // Load plugin files.
    include "principal.php";
}
add_shortcode('short_checkbox', 'executer_funcion_table_ventas');

// Enregistre le script JavaScript
function my_custom_scripts() {
    wp_enqueue_script( 'mon-plugin-script', plugin_dir_url( __FILE__ ) . 'js/code_ex.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_custom_scripts' );

// Enregistre le script JavaScript 2
function my_custom_scripts2() {
    wp_enqueue_script( 'mon-plugin-script2', plugin_dir_url( __FILE__ ) . 'js/code2_ex.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_custom_scripts2' );


// Enregistre le style CSS pour le plugin
function my_custom_style() {
    wp_enqueue_style( 'mon-plugin-style', plugin_dir_url( __FILE__ ) . 'css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_custom_style' );
