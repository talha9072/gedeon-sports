<?php
/**
 * Title: Home Hero
 * Slug: gedeon-sports/home-hero
 * Categories: gedeon-sports-sections
 * Keywords: hero, home
 * Description: Wide concept-livery photo with the "business behind racing talent" headline. On tablet and mobile the photo sits above the copy.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_media = gedeon_sports_block_group(
    'gs-hero__media',
    gedeon_sports_block_image('gs-hero__image', gedeon_sports_img('home-hero.webp'), 'Formula car in the Gedeon Sports concept livery')
    . gedeon_sports_tag('Concept livery', 'concept', 'gs-hero__tag')
);

$gedeon_sports_copy = gedeon_sports_block_group(
    'gs-hero__copy',
    gedeon_sports_eyebrow('A Gedeon Holding company', 'red')
    . gedeon_sports_block_h(1, 'gs-hero__title', 'The business<br>behind<br><span class="gs-hero__highlight">racing talent.</span>')
    . gedeon_sports_block_p('gs-hero__text', 'Gedeon Sports builds the commercial business around athletes. Each athlete has a dedicated project company that holds their contracts, rights and budget. We bring the sponsors, partners and investors. Specialist sporting partners run development and racing.')
    . gedeon_sports_buttons(
        'gs-hero__buttons',
        array(
            array('Meet our athletes', gedeon_sports_url('athletes')),
            array('Contact us', gedeon_sports_url('contact'), 'secondary'),
        )
    )
);

echo gedeon_sports_block_group( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'gs-hero gs-hero--home',
    $gedeon_sports_media . gedeon_sports_block_group('gs-container', $gedeon_sports_copy),
    'section',
    array('align' => 'full')
);
