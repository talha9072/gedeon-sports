<?php
/**
 * Title: About Policies
 * Slug: gedeon-sports/about-policies
 * Categories: gedeon-sports-sections
 * Keywords: policies, safeguarding, conflicts, privacy
 * Description: "How we hold ourselves to account" — three policy cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_cards = '';
foreach (
    array(
        array('Safeguarding policy', 'How we protect athletes under 18: guardian involvement, consent for images and board oversight.'),
        array('Conflicts of interest policy', 'How we act fairly when several of our athletes are considered for the same opportunity, and how related-party fees are approved.'),
        array('Privacy policy', 'How we use personal data from enquiries and the investor area.'),
    ) as $gedeon_sports_policy
) {
    $gedeon_sports_cards .= gedeon_sports_block_group(
        'gs-card gs-card--policy',
        gedeon_sports_block_h(3, 'gs-card__title', $gedeon_sports_policy[0])
        . gedeon_sports_block_p('gs-card__text', $gedeon_sports_policy[1])
        . gedeon_sports_block_p('gs-card__status', 'Available on request')
    );
}

$gedeon_sports_inner = gedeon_sports_section_heading('Policies', 'How we hold ourselves to account')
    . gedeon_sports_block_group('gs-grid gs-grid--3 gs-policies', $gedeon_sports_cards);

echo gedeon_sports_block_section('gs-section--surface gs-policies-section', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
