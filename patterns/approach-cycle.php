<?php
/**
 * Title: Our Approach Operating Cycle
 * Slug: gedeon-sports/approach-cycle
 * Categories: gedeon-sports-sections
 * Keywords: cycle, assess, plan, deliver, review
 * Description: "Assess, plan, deliver, review" — four step cards joined by arrows.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_steps = gedeon_sports_card_step('01', 'Assess', 'An independent assessment of the athlete’s level, fitness and potential.')
    . gedeon_sports_card_step('02', 'Plan', 'A costed season plan with clear sporting and commercial objectives.')
    . gedeon_sports_card_step('03', 'Deliver', 'Coaching, testing and racing with our partners. Sponsorship and content with our team.')
    . gedeon_sports_card_step('04', 'Review', 'Results, spend and partner delivery measured against the plan.');

$gedeon_sports_inner = gedeon_sports_section_heading(
    'Operating cycle',
    'Assess, plan, deliver, review',
    'The same cycle runs every season for every athlete. Each review sets the evidence for<br class="gs-br"> the next stage gate.'
)
    . gedeon_sports_block_group('gs-grid gs-grid--4 gs-cycle', $gedeon_sports_steps);

echo gedeon_sports_block_section('gs-cycle-section', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
