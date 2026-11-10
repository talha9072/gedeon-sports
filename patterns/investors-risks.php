<?php
/**
 * Title: Investors Key Risks
 * Slug: gedeon-sports/investors-risks
 * Categories: gedeon-sports-sections
 * Keywords: risks, warning
 * Description: "Key risks" — six risk cards and the risk warning.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_cards = gedeon_sports_card_text('Single-athlete project', 'An athlete project depends on one athlete’s progress, health and commitment.', 'gs-card--risk')
    . gedeon_sports_card_text('Sporting progression', 'Few athletes reach a professional career. Seats and category steps are targets.', 'gs-card--risk')
    . gedeon_sports_card_text('Funding conditions', 'The plan depends on Holding support, sponsorship and later rounds. A season is committed only once it is funded.', 'gs-card--risk')
    . gedeon_sports_card_text('Dilution', 'Investment is raised in planned rounds, so earlier investors’ share falls as later rounds close.', 'gs-card--risk')
    . gedeon_sports_card_text('Agreements with a minor', 'Rights agreements with under-18s can be harder to enforce.', 'gs-card--risk')
    . gedeon_sports_card_text('Illiquid investment', 'Shares in a private company are hard to sell, and no exit or dividend is assured.', 'gs-card--risk');

$gedeon_sports_inner = gedeon_sports_section_heading('Risks', 'Key risks', 'The full risk register, with mitigations, is in the investor area.')
    . gedeon_sports_block_group('gs-grid gs-grid--3 gs-risks', $gedeon_sports_cards)
    . gedeon_sports_warning('Don’t invest unless you’re prepared to lose all the money you invest.', 'This is a high-risk investment, and you’re unlikely to be protected if something goes wrong.', 'gs-risks__warning');

echo gedeon_sports_block_section('gs-section--surface gs-risks-section', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
