<?php
/**
 * Title: Home What We Do
 * Slug: gedeon-sports/home-what-we-do
 * Categories: gedeon-sports-sections
 * Keywords: services, cards
 * Description: "One company per athlete, one team behind it" with three numbered cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_inner = gedeon_sports_section_heading(
    'What we do',
    'One company<br class="gs-br-m"> per athlete,<br class="gs-br"> one<br class="gs-br-m"> team behind it',
    'We structure each athlete’s career as a business, fund it from several sources and build its commercial value season by season.'
)
    . gedeon_sports_block_group(
        'gs-grid gs-grid--3 gs-what__cards',
        gedeon_sports_card_feature('01', 'Athlete projects', 'A dedicated company for each athlete holds their contracts, commercial rights and programme cash, with the family and investors as shareholders.')
        . gedeon_sports_card_feature('02', 'Sponsorship and partnerships', 'Principal, major and official partners, a business club, brand campaigns, content and appearances, all sold, delivered and reported by our team.')
        . gedeon_sports_card_feature('03', 'Sporting partners', 'Every programme is delivered with specialist partners: a driver manager for career and performance, and a race team for testing, engineering and race weekends.')
    );

echo gedeon_sports_block_section('gs-section--surface gs-what', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
