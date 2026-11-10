<?php
/**
 * Title: Track & Events Formats
 * Slug: gedeon-sports/track-formats
 * Categories: gedeon-sports-sections
 * Keywords: formats, track days, hospitality, launches, tours
 * Description: "Events built around your guests" — four format cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_cards = gedeon_sports_card_image('track-format-track.webp', 'Supercars on a circuit at dusk', 'Corporate track days', 'A day on circuit for your team or clients, with tuition at every level.', true)
    . gedeon_sports_card_image('track-format-hosp.webp', 'Guests in a trackside hospitality suite at sunset', 'Client hospitality', 'Race-weekend and circuit hospitality, with paddock access and hosted laps.', true)
    . gedeon_sports_card_image('track-format-launch.webp', 'A supercar under red light at a launch event', 'Launches and<br class="gs-br"> brand events', 'A circuit or private venue as the stage for a car, product or campaign.', true)
    . gedeon_sports_card_image('track-format-tours.webp', 'A supercar on a coastal road at sunset', 'Supercar tours', 'Guided road tours across the UK, the Adriatic coast and the Riviera.', true);

$gedeon_sports_inner = gedeon_sports_section_heading('Formats', 'Events built around your guests')
    . gedeon_sports_block_group('gs-grid gs-grid--4 gs-formats', $gedeon_sports_cards);

echo gedeon_sports_block_section('gs-formats-section', $gedeon_sports_inner, array('anchor' => 'formats')); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
