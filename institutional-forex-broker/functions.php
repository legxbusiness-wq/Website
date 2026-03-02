<?php
/**
 * Theme setup and utilities.
 *
 * @package InstitutionalForexBroker
 */

if (! defined('INSTITUTIONAL_FOREX_BROKER_VERSION')) {
    define('INSTITUTIONAL_FOREX_BROKER_VERSION', '1.0.0');
}

function institutional_forex_broker_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_theme_support('automatic-feed-links');
    add_theme_support('block-template-parts');
    add_theme_support('custom-logo', [
        'height'      => 64,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    register_nav_menus([
        'primary' => __('Primary Menu', 'institutional-forex-broker'),
        'footer'  => __('Footer Menu', 'institutional-forex-broker'),
    ]);

    add_editor_style('assets/css/editor.css');
}
add_action('after_setup_theme', 'institutional_forex_broker_setup');

function institutional_forex_broker_enqueue_assets(): void
{
    wp_enqueue_style(
        'institutional-forex-broker-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        INSTITUTIONAL_FOREX_BROKER_VERSION
    );

    wp_enqueue_script(
        'institutional-forex-broker-navigation',
        get_template_directory_uri() . '/assets/js/navigation.js',
        [],
        INSTITUTIONAL_FOREX_BROKER_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'institutional_forex_broker_enqueue_assets');

function institutional_forex_broker_register_pattern_categories(): void
{
    register_block_pattern_category(
        'institutional-forex-broker',
        ['label' => __('Institutional Forex Broker', 'institutional-forex-broker')]
    );
}
add_action('init', 'institutional_forex_broker_register_pattern_categories');

function institutional_forex_broker_widgets_init(): void
{
    register_sidebar([
        'name'          => __('Footer Institutional Note', 'institutional-forex-broker'),
        'id'            => 'footer-institutional-note',
        'description'   => __('Widget area for institutional notices or support details.', 'institutional-forex-broker'),
        'before_widget' => '<section class="widget footer-widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'institutional_forex_broker_widgets_init');
