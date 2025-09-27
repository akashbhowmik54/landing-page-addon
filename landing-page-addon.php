<?php
/**
 * Plugin Name: Landing Page Addon
 * Description: Elementor addon for landing page widgets
 * Version: 1.0
 * Author: Akash Kumar Bhowmik
 */

if ( ! defined('ABSPATH') ) exit;

// Include widgets
function lgpa_register_widgets() {
    require_once(__DIR__ . '/includes/widgets/hero.php');
    require_once(__DIR__ . '/includes/widgets/about.php');
    require_once(__DIR__ . '/includes/widgets/services.php');
    require_once(__DIR__ . '/includes/widgets/counter.php');
    require_once(__DIR__ . '/includes/widgets/blog.php');
    require_once(__DIR__ . '/includes/widgets/testimonial.php');
    require_once(__DIR__ . '/includes/widgets/contact-form.php');

    $widgets = [
        new \HeroWidget(),
        new \AboutWidget(),
        // new \ServicesWidget(),
        // new \CounterWidget(),
        // new \BlogWidget(),
        // new \TestimonialWidget(),
        // new \ContactFormWidget(),
    ];

    foreach ($widgets as $widget) {
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type($widget);
    }
}
add_action('elementor/widgets/widgets_registered', 'lgpa_register_widgets');

// Enqueue styles & scripts
function lgpa_enqueue_assets() {
    wp_enqueue_style('lgpa-landing-css', plugins_url('assets/css/style.css', __FILE__));
    wp_enqueue_script('lgpa-landing-js', plugins_url('assets/js/script.js', __FILE__), ['jquery'], false, true);
}
add_action('wp_enqueue_scripts', 'lgpa_enqueue_assets');
