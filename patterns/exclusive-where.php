<?php
/**
 * Title: Exclusive Where
 * Slug: gedeon-sports/exclusive-where
 * Categories: gedeon-sports-sections
 * Keywords: regions, venues, UK, Croatia, Monaco
 * Description: "Circuits and venues across three regions" — United Kingdom, Croatia and Monaco cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_cards = gedeon_sports_card_image('region-uk.webp', 'A supercar on a country circuit in the UK', 'United Kingdom', 'Historic circuits, private test tracks and country-house venues.', true)
    . gedeon_sports_card_image('region-croatia.webp', 'A supercar on a coastal road in Croatia', 'Croatia', 'Circuit days and coastal road tours along the Adriatic.', true)
    . gedeon_sports_card_image('region-monaco.webp', 'A supercar on the Monaco harbour front at night', 'Monaco', 'Hospitality, Riviera road tours and yacht weekends through the Gedeon Holding network.', true);

$gedeon_sports_inner = gedeon_sports_section_heading('Where', 'Circuits and venues<br class="gs-br"> across three regions')
    . gedeon_sports_block_group('gs-grid gs-grid--3 gs-regions', $gedeon_sports_cards);

echo gedeon_sports_block_section('gs-regions-section', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
