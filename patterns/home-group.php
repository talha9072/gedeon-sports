<?php
/**
 * Title: Home Gedeon Holding Group
 * Slug: gedeon-sports/home-group
 * Categories: gedeon-sports-sections
 * Keywords: holding, group, companies
 * Description: The Gedeon Holding logo above the five group company tiles; Gedeon Sports is highlighted.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_companies = array(
    'group'    => 'Gedeon Group',
    'blue'     => 'Gedeon Blue',
    'capital'  => 'Gedeon Capital',
    'sports'   => 'Gedeon Sports',
    'advisory' => 'Gedeon Advisory',
);

$gedeon_sports_tiles = '';
foreach ($gedeon_sports_companies as $gedeon_sports_key => $gedeon_sports_name) {
    $gedeon_sports_tiles .= gedeon_sports_block_group(
        'gs-brand-tile' . ('sports' === $gedeon_sports_key ? ' is-current' : ''),
        gedeon_sports_block_image('gs-brand-tile__logo', gedeon_sports_img('brand-gedeon-' . $gedeon_sports_key . '.webp'), $gedeon_sports_name)
    );
}

$gedeon_sports_inner = gedeon_sports_eyebrow('The Gedeon Holding group', 'red')
    . gedeon_sports_block_image('gs-group__holding', gedeon_sports_img('gedeon-holding-logo.webp'), 'Gedeon Holding')
    . gedeon_sports_block_image('gs-group__connectors', gedeon_sports_img('holding-connectors.svg'))
    . gedeon_sports_block_group('gs-group__tiles', $gedeon_sports_tiles);

echo gedeon_sports_block_section('gs-group', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
