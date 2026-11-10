<?php
/**
 * Title: Concierge How It Works
 * Slug: gedeon-sports/concierge-how
 * Categories: gedeon-sports-sections
 * Keywords: process, onboarding, plan, review
 * Description: "A year with Concierge" — four step cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_steps = gedeon_sports_card_step('01', 'Onboarding', 'We record each car, its history and how you use it.', 'gs-card--loose')
    . gedeon_sports_card_step('02', 'Plan', 'A care calendar for the year, agreed with you.', 'gs-card--loose')
    . gedeon_sports_card_step('03', 'Ongoing', 'We book, collect, deliver and report after every visit.', 'gs-card--loose')
    . gedeon_sports_card_step('04', 'Review', 'A yearly review of each car and the plan ahead.', 'gs-card--loose');

$gedeon_sports_inner = gedeon_sports_section_heading('How it works', 'A year with Concierge')
    . gedeon_sports_block_group('gs-grid gs-grid--4 gs-process', $gedeon_sports_steps);

echo gedeon_sports_block_section('gs-section--surface gs-process-section gs-track-how', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
