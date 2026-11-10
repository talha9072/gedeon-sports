<?php
/**
 * Title: 404 Notice
 * Slug: gedeon-sports/notice-404
 * Categories: gedeon-sports-sections
 * Keywords: 404, not found
 * Description: Full-screen "Page not found" message.
 * Inserter: no
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_notice( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    '404',
    'Page not found',
    'The page you are looking for may have been moved, renamed or is no longer available.',
    true
);
