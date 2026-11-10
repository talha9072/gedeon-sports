<?php
/**
 * Title: Club Membership
 * Slug: gedeon-sports/club-membership
 * Categories: gedeon-sports-sections
 * Keywords: membership, benefits, coaching, paddock
 * Description: "What members receive" — six benefit cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_cards = gedeon_sports_card_image('club-calendar.webp', 'Supercars lined up on a circuit at sunset', 'Members’ calendar', 'Track days and club races through the season.', true)
    . gedeon_sports_card_image('club-coaching.webp', 'An instructor coaching a driver from the passenger seat', 'Coaching', 'Professional instruction, from first laps to a race licence.', true)
    . gedeon_sports_card_image('club-arrive.webp', 'A driver in a helmet beside a prepared supercar', 'Arrive and drive', 'Prepared cars for members who would rather not bring their own.', true)
    . gedeon_sports_card_image('club-weekends.webp', 'Members on a yacht deck at sunset', 'Weekends away', 'Coastal and yacht weekends through the Gedeon Holding network.', true)
    . gedeon_sports_card_image('club-paddock.webp', 'A race car in the paddock garage', 'Paddock access', 'Hosted visits at our athletes’ race weekends.', true)
    . gedeon_sports_card_image('club-concierge.webp', 'A member walking to a supercar outside a villa at dusk', 'Concierge for members', 'Priority Gedeon Concierge for members’ cars.', true);

$gedeon_sports_inner = gedeon_sports_section_heading('Membership', 'What members receive')
    . gedeon_sports_block_group('gs-grid gs-grid--3 gs-formats gs-benefits', $gedeon_sports_cards);

echo gedeon_sports_block_section('gs-benefits-section', $gedeon_sports_inner, array('anchor' => 'membership')); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
