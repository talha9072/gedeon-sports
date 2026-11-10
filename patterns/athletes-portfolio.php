<?php
/**
 * Title: Our Athletes Portfolio
 * Slug: gedeon-sports/athletes-portfolio
 * Categories: gedeon-sports-sections
 * Keywords: portfolio, stages, filter
 * Description: Stage board (Stage 1–3, Professional), stage filters and the athlete cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_stages = array(
    'Stage 1'      => array('Places from 2029'),
    'Stage 2'      => array('Vito Ćoza', 'since 2026'),
    'Stage 3'      => array('Open place'),
    'Professional' => array('Target'),
);

$gedeon_sports_board = '';
foreach ($gedeon_sports_stages as $gedeon_sports_stage => $gedeon_sports_place) {
    $gedeon_sports_slot = isset($gedeon_sports_place[1])
        ? gedeon_sports_block_group(
            'gs-stage__athlete',
            gedeon_sports_block_p('gs-stage__name', $gedeon_sports_place[0])
            . gedeon_sports_block_p('gs-stage__since', $gedeon_sports_place[1])
        )
        : gedeon_sports_block_p('gs-stage__open', $gedeon_sports_place[0]);

    $gedeon_sports_board .= gedeon_sports_block_group(
        'gs-stage',
        gedeon_sports_block_p('gs-stage__label', $gedeon_sports_stage) . $gedeon_sports_slot
    );
}

$gedeon_sports_filters = array(array('All athletes', '#all', 'filter-active'));
foreach (array('Stage 1' => 'stage-1', 'Stage 2' => 'stage-2', 'Stage 3' => 'stage-3', 'Professional' => 'professional') as $gedeon_sports_label => $gedeon_sports_key) {
    $gedeon_sports_filters[] = array($gedeon_sports_label, '#' . $gedeon_sports_key, 'filter');
}

$gedeon_sports_future = str_replace('gs-card gs-card--future', 'gs-card gs-card--future gs-stage-1', gedeon_sports_card_future());

$gedeon_sports_inner = gedeon_sports_section_heading('Portfolio', 'Where each<br class="gs-br-m"> athlete is today')
    . gedeon_sports_block_group('gs-stages', $gedeon_sports_board)
    . gedeon_sports_block_p('gs-stages__note', 'Stages describe development level. See <a href="' . esc_url(gedeon_sports_url('approach')) . '#stage-gates">stage gates →</a> for the criteria.')
    . gedeon_sports_buttons('gs-filters', $gedeon_sports_filters)
    . gedeon_sports_block_group('gs-grid gs-grid--3 gs-athlete-grid', gedeon_sports_card_athlete_vertical() . $gedeon_sports_future);

echo gedeon_sports_block_section('gs-portfolio', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
