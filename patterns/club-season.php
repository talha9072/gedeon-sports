<?php
/**
 * Title: Club The Season
 * Slug: gedeon-sports/club-season
 * Categories: gedeon-sports-sections
 * Keywords: season, calendar, racing
 * Description: "A season in four parts" — four step cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_steps = gedeon_sports_card_step('01', 'Spring opening', 'The first track day and coaching sessions.', 'gs-card--loose')
    . gedeon_sports_card_step('02', 'Summer racing', 'Club race weekends.', 'gs-card--loose')
    . gedeon_sports_card_step('03', 'Riviera weekend', 'Road tour, hospitality and time on the water.', 'gs-card--loose')
    . gedeon_sports_card_step('04', 'Autumn finale', 'The final race day and the members’ dinner.', 'gs-card--loose');

$gedeon_sports_inner = gedeon_sports_section_heading('The season', 'A season in four parts')
    . gedeon_sports_block_group('gs-grid gs-grid--4 gs-process', $gedeon_sports_steps);

echo gedeon_sports_block_section('gs-section--surface gs-process-section gs-track-how', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
