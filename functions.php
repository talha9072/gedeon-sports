<?php
/**
 * Gedeon Sports theme functions.
 *
 * @package Gedeon_Sports
 */

if (! defined('ABSPATH')) {
    exit;
}

require_once get_theme_file_path('inc/blocks.php');
require_once get_theme_file_path('inc/sections.php');
require_once get_theme_file_path('inc/forms.php');
require_once get_theme_file_path('inc/blog.php');
require_once get_theme_file_path('inc/nav.php');
require_once get_theme_file_path('inc/setup.php');

function gedeon_sports_setup(): void
{
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_editor_style(array('assets/css/frontend.css', 'assets/css/home.css', 'assets/css/pages.css', 'assets/css/approach.css', 'assets/css/investors.css', 'assets/css/area.css', 'assets/css/partnerships.css', 'assets/css/exclusive.css', 'assets/css/about.css', 'assets/css/blog.css', 'assets/css/fit.css', 'assets/css/editor.css'));

    register_block_pattern_category(
        'gedeon-sports-sections',
        array(
            'label' => __('Gedeon Sports Sections', 'gedeon-sports'),
        )
    );
}
add_action('after_setup_theme', 'gedeon_sports_setup');

function gedeon_sports_enqueue_assets(): void
{
    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('gedeon-sports-frontend', get_theme_file_uri('assets/css/frontend.css'), array(), $version);
    wp_enqueue_style('gedeon-sports-home', get_theme_file_uri('assets/css/home.css'), array('gedeon-sports-frontend'), $version);
    wp_enqueue_style('gedeon-sports-pages', get_theme_file_uri('assets/css/pages.css'), array('gedeon-sports-frontend'), $version);
    wp_enqueue_style('gedeon-sports-approach', get_theme_file_uri('assets/css/approach.css'), array('gedeon-sports-pages'), $version);
    wp_enqueue_style('gedeon-sports-investors', get_theme_file_uri('assets/css/investors.css'), array('gedeon-sports-pages'), $version);
    wp_enqueue_style('gedeon-sports-area', get_theme_file_uri('assets/css/area.css'), array('gedeon-sports-pages'), $version);
    wp_enqueue_style('gedeon-sports-partnerships', get_theme_file_uri('assets/css/partnerships.css'), array('gedeon-sports-pages'), $version);
    wp_enqueue_style('gedeon-sports-exclusive', get_theme_file_uri('assets/css/exclusive.css'), array('gedeon-sports-partnerships'), $version);
    wp_enqueue_style('gedeon-sports-about', get_theme_file_uri('assets/css/about.css'), array('gedeon-sports-area', 'gedeon-sports-home'), $version);
    wp_enqueue_style('gedeon-sports-blog', get_theme_file_uri('assets/css/blog.css'), array('gedeon-sports-about'), $version);
    wp_enqueue_style('gedeon-sports-fit', get_theme_file_uri('assets/css/fit.css'), array('gedeon-sports-blog', 'gedeon-sports-exclusive'), $version);

    wp_enqueue_script(
        'gedeon-sports-athlete-filter',
        get_theme_file_uri('assets/js/athlete-filter.js'),
        array(),
        $version,
        array(
            'in_footer' => true,
            'strategy'  => 'defer',
        )
    );
}
add_action('wp_enqueue_scripts', 'gedeon_sports_enqueue_assets');

/**
 * Cache-bust theme images and icons with the theme version, so artwork replaced under the
 * same file name never shows the old version to returning visitors.
 *
 * @param string $url  Resolved file URL.
 * @param string $file Path relative to the theme root.
 */
function gedeon_sports_version_theme_images(string $url, string $file): string
{
    if (! preg_match('#^/?assets/(img|icons)/.+\.[a-z0-9]+$#i', $file)) {
        return $url;
    }

    return add_query_arg('ver', wp_get_theme()->get('Version'), $url);
}
add_filter('theme_file_uri', 'gedeon_sports_version_theme_images', 10, 2);

/**
 * Preload the two self-hosted Latin font files so above-the-fold text renders without a swap.
 */
function gedeon_sports_preload_fonts(): void
{
    foreach (array('titillium-web-700-latin.woff2', 'inter-latin-variable.woff2') as $file) {
        printf(
            '<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
            esc_url(get_theme_file_uri('assets/fonts/' . $file))
        );
    }
}
add_action('wp_head', 'gedeon_sports_preload_fonts', 1);

/**
 * Theme image URL, for patterns.
 *
 * @param string $file File name inside assets/img.
 */
function gedeon_sports_img(string $file): string
{
    return esc_url(get_theme_file_uri('assets/img/' . $file));
}

/**
 * Site pages: one map shared by the header, footer and patterns so every link points to the
 * same page.
 */
function gedeon_sports_url(string $page): string
{
    $paths = array(
        'home'         => '/',
        'athletes'     => '/our-athletes/',
        'approach'     => '/our-approach/',
        'investors'    => '/investors/',
        'investor'     => '/investor-area/',
        'partnerships' => '/partnerships/',
        'exclusive'    => '/exclusive/',
        'track'        => '/track-and-events/',
        'concierge'    => '/concierge/',
        'club'         => '/club/',
        'about'        => '/about-contact/',
        'contact'      => '/about-contact/#contact',
        'company'      => '/company-information/',
        'privacy'      => '/privacy-policy/',
        'safeguarding' => '/safeguarding-policy/',
        'conflicts'    => '/conflicts-of-interest-policy/',
    );

    return home_url($paths[$page] ?? '/');
}

/**
 * Favicons from the design (WordPress / Favicon frames). A Site Icon set under Settings › General
 * takes over, so these only print when none is set.
 */
function gedeon_sports_favicons(): void
{
    if (has_site_icon()) {
        return;
    }
    $base = get_theme_file_uri('assets/icons/site/');
    printf('<link rel="icon" type="image/png" sizes="32x32" href="%s">' . "\n", esc_url($base . 'favicon-32x32.png'));
    printf('<link rel="icon" type="image/png" sizes="16x16" href="%s">' . "\n", esc_url($base . 'favicon-16x16.png'));
    printf('<link rel="apple-touch-icon" sizes="180x180" href="%s">' . "\n", esc_url($base . 'apple-touch-icon.png'));
}
add_action('wp_head', 'gedeon_sports_favicons', 5);

/**
 * Body class with the page slug (gs-page-{slug}), used by the per-page mobile/tablet section spacing
 * in assets/css/fit.css.
 */
add_filter(
    'body_class',
    static function (array $classes): array {
        if (is_singular()) {
            $classes[] = 'gs-page-' . sanitize_html_class((string) get_post_field('post_name', get_queried_object_id()));
        }
        return $classes;
    }
);
