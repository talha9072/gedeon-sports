<?php
/**
 * Title: Partnerships Process
 * Slug: gedeon-sports/partnerships-process
 * Categories: gedeon-sports-sections
 * Keywords: process, steps, partnership
 * Description: "How a partnership comes together" — four step cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_steps = gedeon_sports_card_step('01', 'Objectives', 'We start with what your brand wants to achieve.', 'gs-card--loose')
    . gedeon_sports_card_step('02', 'Fit', 'We match athletes, audience and activities to those objectives.', 'gs-card--loose')
    . gedeon_sports_card_step('03', 'Agreed rights &amp; delivery', 'Rights, deliverables and timings are set in writing.', 'gs-card--loose')
    . gedeon_sports_card_step('04', 'Review', 'We report against objectives and review together.', 'gs-card--loose');

$gedeon_sports_inner = gedeon_sports_section_heading('Process', 'How a partnership<br class="gs-br"> comes together')
    . gedeon_sports_block_group('gs-grid gs-grid--4 gs-process', $gedeon_sports_steps);

echo gedeon_sports_block_section('gs-section--surface gs-process-section', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
