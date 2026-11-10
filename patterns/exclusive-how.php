<?php
/**
 * Title: Exclusive How We Work
 * Slug: gedeon-sports/exclusive-how
 * Categories: gedeon-sports-sections
 * Keywords: process, brief, proposal, delivery
 * Description: "One team from brief to finish" — four step cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_steps = gedeon_sports_card_step('01', 'Brief', 'You tell us what you want, for whom and when.', 'gs-card--loose')
    . gedeon_sports_card_step('02', 'Proposal', 'A plan with venue, cars, people and costs, agreed before anything is booked.', 'gs-card--loose')
    . gedeon_sports_card_step('03', 'Delivery', 'Our team runs the day, with specialist partners on the ground.', 'gs-card--loose')
    . gedeon_sports_card_step('04', 'Follow-up', 'Photos, film and a review, plus what we would plan next.', 'gs-card--loose');

$gedeon_sports_inner = gedeon_sports_section_heading('How we work', 'One team from brief to finish')
    . gedeon_sports_block_group('gs-grid gs-grid--4 gs-process', $gedeon_sports_steps);

echo gedeon_sports_block_section('gs-section--surface gs-process-section', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
