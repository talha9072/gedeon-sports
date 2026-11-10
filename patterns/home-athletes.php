<?php
/**
 * Title: Home Our Athletes
 * Slug: gedeon-sports/home-athletes
 * Categories: gedeon-sports-sections
 * Keywords: athletes, portfolio
 * Description: Vito Ćoza's athlete card beside the Future athletes card, and the All athletes button.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_inner = gedeon_sports_section_heading(
    'Our athletes',
    'Vito Ćoza leads<br class="gs-br-m"> the portfolio',
    'Our first athlete is a three-time karting champion from Croatia. From 2029 the platform adds athletes in other sports, each with their own company, rights agreement<br class="gs-br"> and budget.'
)
    . gedeon_sports_block_group('gs-athletes__cards', gedeon_sports_card_athlete() . gedeon_sports_card_future())
    . gedeon_sports_buttons('gs-athletes__all', array(array('All athletes', gedeon_sports_url('athletes'), 'secondary')));

echo gedeon_sports_block_section('gs-athletes', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
