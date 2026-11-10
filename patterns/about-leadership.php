<?php
/**
 * Title: About Leadership
 * Slug: gedeon-sports/about-leadership
 * Categories: gedeon-sports-sections
 * Keywords: team, leadership, advisory board
 * Description: "The team" — three team cards and the four-person advisory board (sample content).
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_team = gedeon_sports_card_team('Ivan Babić', 'Managing Director', '20 years in motorsport team management and athlete development. Leads athlete projects and stage gate decisions.')
    . gedeon_sports_card_team('Elena Kovač', 'Commercial Director', 'Sponsorship sales and brand partnerships in sport. Leads partner sales, licensing and delivery.')
    . gedeon_sports_card_team('Daniel Price', 'Finance &amp; Investor Relations', 'Private company finance, reporting and governance. Leads investor reporting and budgets.');

$gedeon_sports_advisors = '';
foreach (
    array(
        array('Ana Novak', 'Motorsport: former junior single-seater team principal'),
        array('Tomislav Jurić', 'Finance and private investment'),
        array('Sarah Whitfield', 'Sports law and athlete contracts'),
        array('Luka Marić', 'Sponsorship and media'),
    ) as $gedeon_sports_advisor
) {
    $gedeon_sports_advisors .= gedeon_sports_block_group(
        'gs-card gs-card--advisor',
        gedeon_sports_block_h(4, 'gs-card__title', $gedeon_sports_advisor[0])
        . gedeon_sports_block_p('gs-card__text', $gedeon_sports_advisor[1])
    );
}

$gedeon_sports_inner = gedeon_sports_section_heading('Leadership', 'The team')
    . gedeon_sports_block_group('gs-grid gs-grid--3 gs-team gs-leadership', $gedeon_sports_team)
    . gedeon_sports_block_h(3, 'gs-advisors__title', 'Advisory board')
    . gedeon_sports_block_group('gs-grid gs-grid--4 gs-advisors', $gedeon_sports_advisors);

echo gedeon_sports_block_section('gs-leadership-section', $gedeon_sports_inner, array('anchor' => 'leadership')); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
