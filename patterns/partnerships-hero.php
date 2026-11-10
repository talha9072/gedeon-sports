<?php
/**
 * Title: Partnerships Hero
 * Slug: gedeon-sports/partnerships-hero
 * Categories: gedeon-sports-sections
 * Keywords: hero, partnerships, sponsors
 * Description: Split page hero — "Partner with athletes on the way up" beside Vito at the RMC Grand Finals.
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_hero_split( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Partnerships',
    'Partner with<br class="gs-br"> athletes on<br class="gs-br"> the way up',
    'Racing creates the story, and our commercial projects carry it to your customers. Partner with Vito Ćoza for the 2027 season, or with Gedeon Sports across its growing portfolio, with objectives, rights and reporting agreed at the outset.',
    'partnerships-vito-rmc.webp',
    'Vito Ćoza with the Croatian flag at the RMC Grand Finals',
    gedeon_sports_block_p('gs-hero-split__note', 'Commercial partnership is separate from investment in the company.')
    . gedeon_sports_buttons(
        'gs-hero-mark__buttons',
        array(
            array('Partnership enquiry', gedeon_sports_url('contact')),
            array('See packages', '#packages', 'secondary'),
        )
    ),
    'gs-hero-split--partnerships'
);
