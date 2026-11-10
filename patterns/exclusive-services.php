<?php
/**
 * Title: Exclusive Services
 * Slug: gedeon-sports/exclusive-services
 * Categories: gedeon-sports-sections
 * Keywords: services, track, concierge, club
 * Description: "Three ways to get closer to the track" — Track & Events, Concierge and Club cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_cards = gedeon_sports_card_image('service-track.webp', 'Supercars lined up on a wet circuit at sunset', 'Gedeon Track &amp; Events', 'Track days, client hospitality, launches and supercar tours, planned and run from the first call to the final lap.', true, array('Track &amp; Events', gedeon_sports_url('track')))
    . gedeon_sports_card_image('service-concierge.webp', 'A covered supercar in a private garage', 'Gedeon Concierge', 'One point of contact for your cars, covering servicing, storage, transport and track preparation.', true, array('Concierge', gedeon_sports_url('concierge')))
    . gedeon_sports_card_image('service-club.webp', 'Supercars on a coastal road at sunset', 'Gedeon Club', 'A private members’ club with its own calendar of track days, club races and weekends away.', true, array('Gedeon Club', gedeon_sports_url('club')));

$gedeon_sports_inner = gedeon_sports_section_heading('Services', 'Three ways to get<br class="gs-br"> closer to the track')
    . gedeon_sports_block_group('gs-grid gs-grid--3 gs-services', $gedeon_sports_cards);

echo gedeon_sports_block_section('gs-services-section', $gedeon_sports_inner, array('anchor' => 'services')); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
