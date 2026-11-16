<?php
/**
 * Header navigation: mark the current page. The menu uses custom links, which WordPress never marks
 * as current, so compare each link with the requested path. A submenu parent (Exclusive) is active
 * on its own page and on every page in its submenu.
 *
 * @package Gedeon_Sports
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Path of the current request, with a trailing slash.
 */
function gedeon_sports_current_path(): string
{
    $path = (string) wp_parse_url((string) ($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput -- compared only.
    return trailingslashit($path ?: '/');
}

/**
 * Does a link URL point at the current page? Links with a #fragment never count.
 */
function gedeon_sports_is_current_url(string $url): bool
{
    if ('' === $url || str_contains($url, '#')) {
        return false;
    }
    $path    = trailingslashit((string) wp_parse_url($url, PHP_URL_PATH) ?: '/');
    $current = gedeon_sports_current_path();
    // Pages outside the menu that belong to a menu item.
    $parents = array('/investor-area/' => '/investors/');
    return $path === $current || (isset($parents[$current]) && $parents[$current] === $path);
}

/**
 * Add aria-current to a rendered link and the current class to its list item.
 */
function gedeon_sports_mark_current(string $html, bool $page = true): string
{
    $html = preg_replace('/<li class="/', '<li class="current-menu-item ', $html, 1);
    if (! $page) {
        return $html;
    }
    return preg_replace('/<a class="wp-block-navigation-item__content"/', '<a class="wp-block-navigation-item__content" aria-current="page"', $html, 1);
}

add_filter(
    'render_block_core/navigation-link',
    static function (string $html, array $block): string {
        return gedeon_sports_is_current_url((string) ($block['attrs']['url'] ?? '')) ? gedeon_sports_mark_current($html) : $html;
    },
    10,
    2
);

add_filter(
    'render_block_core/navigation-submenu',
    static function (string $html, array $block): string {
        $urls = array((string) ($block['attrs']['url'] ?? ''));
        foreach ($block['innerBlocks'] ?? array() as $inner) {
            $urls[] = (string) ($inner['attrs']['url'] ?? '');
        }
        foreach ($urls as $i => $url) {
            if (gedeon_sports_is_current_url($url)) {
                // aria-current only when the parent link itself is this page.
                return gedeon_sports_mark_current($html, 0 === $i);
            }
        }
        return $html;
    },
    10,
    2
);
