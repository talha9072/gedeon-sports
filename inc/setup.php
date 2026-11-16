<?php
/**
 * Site setup: creates the pages from the theme patterns, the sample news posts (with their images),
 * the policy pages and the front page / posts page settings. Safe to run again: pages and posts are
 * matched by slug and updated in place.
 *
 * Runs from Tools → Gedeon Sports setup (administrators only), or locally from dump/tools/setup.php.
 *
 * @package Gedeon_Sports
 */

/**
 * Run one or all setup steps and return the plain-text log.
 *
 * @param string $step all|theme|pages|posts|policies.
 */
function gedeon_sports_run_setup(string $step = 'all'): string
{
    if (! in_array($step, array('all', 'theme', 'pages', 'posts', 'policies'), true)) {
        return "unknown step\n";
    }

    ob_start();
    require get_theme_file_path('inc/setup/pages.php');
    require get_theme_file_path('inc/setup/posts.php');
    require get_theme_file_path('inc/setup/policies.php');
    return (string) ob_get_clean();
}

/** Tools → Gedeon Sports setup. */
function gedeon_sports_setup_menu(): void
{
    add_management_page(
        __('Gedeon Sports setup', 'gedeon-sports'),
        __('Gedeon Sports setup', 'gedeon-sports'),
        'manage_options',
        'gedeon-sports-setup',
        'gedeon_sports_setup_screen'
    );
}
add_action('admin_menu', 'gedeon_sports_setup_menu');

/** The setup screen: one button, then the log of what was created or updated. */
function gedeon_sports_setup_screen(): void
{
    if (! current_user_can('manage_options')) {
        return;
    }

    $log = '';
    if (isset($_POST['gedeon_sports_setup']) && check_admin_referer('gedeon_sports_setup')) {
        $log = gedeon_sports_run_setup('all');
    }

    echo '<div class="wrap"><h1>' . esc_html__('Gedeon Sports setup', 'gedeon-sports') . '</h1>';
    echo '<p>' . esc_html__('Creates or updates the site pages from the theme patterns, the sample news posts and their images, the policy pages, and sets the front page and the News page. Existing pages with the same slugs are updated. The default “Sample Page” and “Hello world!” are moved to the trash.', 'gedeon-sports') . '</p>';
    echo '<form method="post">';
    wp_nonce_field('gedeon_sports_setup');
    submit_button(__('Run setup', 'gedeon-sports'), 'primary', 'gedeon_sports_setup');
    echo '</form>';
    if ($log) {
        echo '<h2>' . esc_html__('Log', 'gedeon-sports') . '</h2><pre style="white-space:pre-wrap">' . esc_html($log) . '</pre>';
    }
    echo '</div>';
}
