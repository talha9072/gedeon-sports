<?php
/**
 * Title: Club How To Join
 * Slug: gedeon-sports/club-join
 * Categories: gedeon-sports-sections
 * Keywords: join, apply, membership
 * Description: "Three steps to your first event" — three step cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_steps = gedeon_sports_card_step('01', 'Apply', 'A short application.', 'gs-card--loose')
    . gedeon_sports_card_step('02', 'Meet', 'An introduction with the club team, at a circuit or over dinner.', 'gs-card--loose')
    . gedeon_sports_card_step('03', 'Welcome', 'Your first event and the season calendar.', 'gs-card--loose');

$gedeon_sports_inner = gedeon_sports_section_heading('How to join', 'Three steps to your first event')
    . gedeon_sports_block_group('gs-grid gs-grid--3 gs-process gs-join', $gedeon_sports_steps);

echo gedeon_sports_block_section('gs-process-section gs-track-how gs-join-section', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
