<?php
/**
 * Title: Investors Backed By Gedeon Holding
 * Slug: gedeon-sports/investors-backing
 * Categories: gedeon-sports-sections
 * Keywords: holding, capital, network, governance
 * Description: "Gedeon Holding invests alongside" beside the capital, network and governance cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_cards = gedeon_sports_card_text('Capital', 'Annual support for the Vito programme, 2027–2031', 'gs-card--support')
    . gedeon_sports_card_text('Network', 'Owners, business leaders, private investors and family offices', 'gs-card--support')
    . gedeon_sports_card_text('Governance', 'Group oversight of each athlete project', 'gs-card--support');

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-split__copy gs-backing__copy',
    gedeon_sports_eyebrow('Backed by Gedeon Holding', 'red')
    . gedeon_sports_block_h(2, 'gs-title', 'Gedeon Holding<br class="gs-br"> invests alongside')
    . gedeon_sports_block_p('gs-split__lead', 'Gedeon Holding founded Gedeon Sports. It supports the first athlete project with annual capital for each season from 2027 to 2031, and brings the group’s relationship network to every programme.')
)
    . gedeon_sports_block_group('gs-split__aside gs-backing__cards', $gedeon_sports_cards);

echo gedeon_sports_block_section('gs-split gs-backing', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
