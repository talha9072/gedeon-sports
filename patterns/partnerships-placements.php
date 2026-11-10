<?php
/**
 * Title: Partnerships Branding Placements
 * Slug: gedeon-sports/partnerships-placements
 * Categories: gedeon-sports-sections
 * Keywords: branding, placements, livery, racewear, helmet
 * Description: "Car, racewear and helmet placements" — the car inventory map and three placement views.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_views = '';
foreach (array('car' => 'Car', 'racewear' => 'Racewear', 'helmet' => 'Helmet') as $gedeon_sports_key => $gedeon_sports_label) {
    $gedeon_sports_views .= gedeon_sports_block_group(
        'gs-view gs-view--' . $gedeon_sports_key,
        gedeon_sports_block_image('gs-view__image', gedeon_sports_img($gedeon_sports_key . '-placements.webp'), $gedeon_sports_label . ' branding placement zones')
        . gedeon_sports_block_p('gs-view__label', $gedeon_sports_label)
    );
}

$gedeon_sports_inner = gedeon_sports_section_heading(
    'Branding placements',
    'Car, racewear and<br class="gs-br"> helmet placements',
    'Placements are confirmed for each season, team and series.'
)
    . gedeon_sports_block_group(
        'gs-inventory',
        gedeon_sports_block_image('gs-inventory__image', gedeon_sports_img('car-branding-inventory.webp'), 'Car branding inventory: airbox and halo, engine cover, rear wing, nose, sidepod, front wing, front endplate and floor edge')
        . gedeon_sports_tag('Concept livery', 'concept', 'gs-inventory__tag')
    )
    . gedeon_sports_block_group('gs-views', $gedeon_sports_views)
    . gedeon_sports_callout('Zones shown are typical. Available inventory is confirmed for each athlete and season, subject to team and series regulations.', 'gs-placements__callout');

echo gedeon_sports_block_section('gs-placements', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
