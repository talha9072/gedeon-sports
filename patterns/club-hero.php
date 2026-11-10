<?php
/**
 * Title: Club Hero
 * Slug: gedeon-sports/club-hero
 * Categories: gedeon-sports-sections
 * Keywords: hero, club, membership
 * Description: Image hero — "A private club for people who drive" over supercars on a coastal road.
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_hero_image( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Gedeon Club',
    'A private club for<br class="gs-br"> people who drive',
    'Gedeon Club is a members’ club with its own season: track days, club races, coaching and weekends away across the UK, Croatia and Monaco. Membership is by application.',
    array(
        array('Apply for membership', gedeon_sports_url('contact')),
        array('What membership includes', '#membership', 'secondary'),
    ),
    'club-hero.webp',
    'Two supercars on a coastal road above a bay at sunset',
    'gs-hero--club'
);
