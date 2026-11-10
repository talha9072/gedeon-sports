<?php
/**
 * Title: Our Approach Welfare
 * Slug: gedeon-sports/approach-welfare
 * Categories: gedeon-sports-sections
 * Keywords: welfare, safeguarding
 * Description: "Athlete welfare and safeguarding" — four text cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_cards = gedeon_sports_card_text('The family at the table', 'Parents or guardians take part in every plan and agreement for athletes under 18, and the family holds shares in the athlete’s project company.', 'gs-card--welfare')
    . gedeon_sports_card_text('Independent advice', 'Athletes and families take independent legal advice before signing. Every use of name and image is approved in advance.', 'gs-card--welfare')
    . gedeon_sports_card_text('Education and health', 'Schooling, rest and mental health are built into every season plan.', 'gs-card--welfare')
    . gedeon_sports_card_text('Safeguarding', 'Our safeguarding policy applies to every athlete under 18 and is overseen by the board. <a href="' . esc_url(gedeon_sports_url('safeguarding')) . '">Policy →</a>', 'gs-card--welfare');

$gedeon_sports_inner = gedeon_sports_section_heading(
    'Welfare',
    'Athlete welfare and safeguarding',
    'Many athletes start young. Their wellbeing and education come before results.'
)
    . gedeon_sports_block_group('gs-grid gs-grid--4 gs-welfare__cards', $gedeon_sports_cards);

echo gedeon_sports_block_section('gs-section--surface gs-welfare', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
