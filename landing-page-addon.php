<?php
/**
 * Plugin Name: Landing Page Addon
 * Description: Elementor addon for landing page widgets
 * Version: 1.0
 * Author: Akash Kumar Bhowmik
 * Text Domain: landing-page-addon
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function lgpa_check_elementor() {
    if ( ! did_action( 'elementor/loaded' ) ) {
        add_action( 'admin_notices', function() {
            ?>
            <div class="notice notice-error">
                <p><?php esc_html_e( 'Landing Page Addon requires Elementor to be installed and activated.', 'landing-page-addon' ); ?></p>
            </div>
            <?php
        });
        return false;
    }
    return true;
}

function lgpa_register_widgets() {
    if ( ! lgpa_check_elementor() ) {
        return;
    }

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
        new \ServicesWidget(),
        new \CounterWidget(),
        new \BlogWidget(),
        // new \TestimonialWidget(),
        // new \ContactFormWidget(),
    ];

    foreach ($widgets as $widget) {
        \Elementor\Plugin::instance()->widgets_manager->register( $widget );
    }
}
add_action('elementor/widgets/register', 'lgpa_register_widgets');

// Enqueue styles & scripts
function lgpa_enqueue_assets() {
    wp_enqueue_style('lgpa-landing-css', plugins_url('assets/css/style.css', __FILE__));
    wp_enqueue_style('bootstrap-css', plugins_url('assets/css/bootstrap.min.css', __FILE__));
    wp_enqueue_style('sass-css', plugins_url('assets/scss/main.css', __FILE__));

    wp_enqueue_script('lgpa-landing-js', plugins_url('assets/js/script.js', __FILE__), ['jquery'], false, true);
    wp_enqueue_script('bootstrap-js', plugins_url('assets/js/bootstrap.min.js', __FILE__), ['jquery'], false, true);
}
add_action('wp_enqueue_scripts', 'lgpa_enqueue_assets');

// Load translations
function lgpa_load_textdomain() {
    load_plugin_textdomain( 'landing-page-addon', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'lgpa_load_textdomain' );
