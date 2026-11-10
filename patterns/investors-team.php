<?php
/**
 * Title: Investors Team And Advisers
 * Slug: gedeon-sports/investors-team
 * Categories: gedeon-sports-sections
 * Keywords: team, advisers, people
 * Description: "Team and advisers" — four SAMPLE team cards with placeholder silhouettes.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_cards = gedeon_sports_card_team('Ivan Babić', 'Managing Director', '20 years in motorsport team management and athlete development.')
    . gedeon_sports_card_team('Elena Kovač', 'Commercial Director', 'Sponsorship sales and brand partnerships in sport.')
    . gedeon_sports_card_team('Daniel Price', 'Finance &amp; Investor Relations', 'Private company finance, reporting and governance.')
    . gedeon_sports_card_team('Ana Novak', 'Advisory board', 'Former team principal in junior single-seaters.');

$gedeon_sports_inner = gedeon_sports_section_heading('People', 'Team and advisers', 'Full biographies and track record are in the investor document room.')
    . gedeon_sports_block_group('gs-grid gs-grid--4 gs-team', $gedeon_sports_cards)
    . gedeon_sports_buttons('gs-team__link', array(array('Full team', gedeon_sports_url('about') . '#leadership', 'link')));

echo gedeon_sports_block_section('gs-section--surface gs-team-section', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
