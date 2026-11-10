<?php
/**
 * Title: Our Approach Responsibilities
 * Slug: gedeon-sports/approach-responsibilities
 * Categories: gedeon-sports-sections
 * Keywords: responsibilities, parties, partners
 * Description: "Who does what" — Gedeon Sports, driver manager, race team and the family.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_cards = gedeon_sports_card_list('01', 'Gedeon Sports', array('Project company and governance', 'Sponsorship sales and delivery', 'Licensed products and content', 'Investor relations and reporting'))
    . gedeon_sports_card_list('02', 'Driver manager', array('Career planning', 'Coaching and performance', 'Category and team choices', 'Readiness for each step'))
    . gedeon_sports_card_list('03', 'Race team', array('Testing programme', 'Engineering and data', 'Race weekend delivery', 'Itemised season quotes'))
    . gedeon_sports_card_list('04', 'The family', array('Shareholder in the project company', 'Consent for name and image', 'Welfare and education', 'Part of every plan review'));

$gedeon_sports_inner = gedeon_sports_section_heading(
    'Responsibilities',
    'Who does what',
    'Each programme brings together four parties, with responsibilities set out in<br class="gs-br"> written agreements.'
)
    . gedeon_sports_block_group('gs-grid gs-grid--4 gs-parties', $gedeon_sports_cards);

echo gedeon_sports_block_section('gs-section--surface gs-responsibilities', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
