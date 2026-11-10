<?php
/**
 * Title: Track & Events How It Works
 * Slug: gedeon-sports/track-how
 * Categories: gedeon-sports-sections
 * Keywords: process, brief, plan, event day
 * Description: "From brief to event day" — four step cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_steps = gedeon_sports_card_step('01', 'Brief', 'Guests, date, region and the kind of day you want.', 'gs-card--loose')
    . gedeon_sports_card_step('02', 'Plan', 'Venue, cars, programme and a fixed proposal.', 'gs-card--loose')
    . gedeon_sports_card_step('03', 'Event day', 'Our team on site from arrival to departure.', 'gs-card--loose')
    . gedeon_sports_card_step('04', 'Afterwards', 'Photos, film and a debrief.', 'gs-card--loose');

$gedeon_sports_inner = gedeon_sports_section_heading('How it works', 'From brief to event day')
    . gedeon_sports_block_group('gs-grid gs-grid--4 gs-process', $gedeon_sports_steps);

echo gedeon_sports_block_section('gs-process-section gs-track-how', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
